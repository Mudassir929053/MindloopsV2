<?php
include_once 'config/connection.php';

if(isset($_POST["action"]) && $_POST["action"] === 'load_data')  {
    $magazine_id = $_POST["magazine_id"];
    // Load data
    $average_rating = 0;
    $total_review = 0;
    $five_star_review = 0;
    $four_star_review = 0;
    $three_star_review = 0;
    $two_star_review = 0;
    $one_star_review = 0;
    $total_user_rating = 0;
    $review_content = array();

    $query1 = "SELECT review.*, user_table.username 
    FROM review 
    INNER JOIN user_table ON review.uid = user_table.uid 
    WHERE review.magazine_id = $magazine_id AND review.status = 1 
    ORDER BY review.review_id DESC"; 
    $result1 = $mysqli->query($query1);

    while($row = $result1->fetch_assoc()) {
        $review_content[] = array(
            'magazine_id' => $row["magazine_id"],
            'uid' => $row["uid"],
            'username' => $row["username"],
            'user_rating' => $row["user_rating"],
            'user_review' => $row["user_review"],
            'datetime' => date('l jS, F Y h:i:s A', strtotime($row["datetime"]))
        );

        // Increment star review counts
        switch ($row["user_rating"]) {
            case '5':
                $five_star_review++;
                break;
            case '4':
                $four_star_review++;
                break;
            case '3':
                $three_star_review++;
                break;
            case '2':
                $two_star_review++;
                break;
            case '1':
                $one_star_review++;
                break;
        }

        $total_review++;
        $total_user_rating += $row["user_rating"];
    }

    $average_rating = $total_user_rating / $total_review;

    $output = array(
        'average_rating' => number_format($average_rating, 1),
        'total_review' => $total_review,
        'five_star_review' => $five_star_review,
        'four_star_review' => $four_star_review,
        'three_star_review' => $three_star_review,
        'two_star_review' => $two_star_review,
        'one_star_review' => $one_star_review,
        'review_data' => $review_content
    );

    // Return JSON response
    header('Content-Type: application/json'); 
    echo json_encode($output);
} else {
    // Return a message indicating invalid action
    header('Content-Type: application/json');
    echo json_encode(array('error' => 'Invalid action.'));
}
?>
