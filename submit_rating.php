<?php
include_once 'config/connection.php';

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Check if POST data is set
if(isset($_POST["rating_data"]) && isset($_POST["magazine_id"]) && isset($_POST["uid"]))
{
    // Sanitize input data to prevent SQL injection
    $magazine_id = $_POST["magazine_id"];
    $uid = $_POST["uid"];
    $user_rating = $_POST["rating_data"];
    $user_review = $_POST["user_review"];
    $datetime = date("Y-m-d H:i:s"); 

    // Check if the review already exists for the given user and magazine
    $checkQuery = "SELECT * FROM review WHERE magazine_id = ? AND uid = ?";
    $checkStmt = $mysqli->prepare($checkQuery);
    $checkStmt->bind_param("ii", $magazine_id, $uid);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if($result->num_rows == 0) {
        // Prepare the SQL statement to insert the review
        $query = "INSERT INTO review (magazine_id, uid, user_rating, user_review, datetime, status) 
                  VALUES (?, ?, ?, ?, ?, 1)";
        
        // Check if the connection is successful and $mysqli is an instance of mysqli
        if($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        if($stmt = $mysqli->prepare($query))
        {
            // Bind parameters to the prepared statement
            $stmt->bind_param("iiiss", $magazine_id, $uid, $user_rating, $user_review, $datetime);

            // Execute the statement
            if($stmt->execute())
            {
                echo "Your Review & Rating Successfully Submitted";

                // Check the count of reviews for the user
                $countQuery = "SELECT COUNT(DISTINCT magazine_id) AS review_count FROM review WHERE uid = ?";
                $countStmt = $mysqli->prepare($countQuery);
                $countStmt->bind_param("i", $uid);
                $countStmt->execute();
                $countResult = $countStmt->get_result();
                $row = $countResult->fetch_assoc();
                $reviewCount = $row['review_count'];
                
                // Insert into second table based on review count
                if ($reviewCount >= 1) {
                    if($reviewCount==1){
                    $badge_category = 'magazine';
                    $badge_level = 1;
                    $badge_to = 'student';
                    $badge_earned = "INSERT INTO badge_earned (uid, badge_category, badge_level,badge_to,datetime) VALUES (?, ?,?,?,?)";
                    $secondTableStmt = $mysqli->prepare($badge_earned);
                    $secondTableStmt->bind_param("isiss", $uid, $badge_category, $badge_level, $badge_to,$datetime);

                    if ($secondTableStmt->execute()) {
                        echo "You Earned Level 1 Badge";
                    } else {
                        echo "Failed to insert into second table.";
                    }
                    }
                    else{
                        echo "You Already Earned Level 1 Badge";
                    }
                    
                }
                else{
                    echo "Give Rating to earn a badge ";
                }
                
                if ($reviewCount >= 12) {
                    // Insert into another table or perform additional actions as needed
                    if($reviewCount==12){
                        $badge_category = 'Magazine';
                        $badge_level = 2;
                        $badge_to = 'student';
                        $badge_earned = "INSERT INTO badge_earned (uid, badge_category, badge_level,badge_to,datetime) VALUES (?, ?,?,?,?)";
                        $secondTableStmt = $mysqli->prepare($badge_earned);
                        $secondTableStmt->bind_param("isiss", $uid, $badge_category, $badge_level, $badge_to,$datetime);
                        if ($secondTableStmt->execute()) {
                            echo "You Earned Level 2 Badge";
                        } else {
                            echo "Failed to insert into second table.";
                        }
                        }
                        else{
                            echo "You Already Earned Level 2 Badge";
                        }
                }
            }
            else
            {
                echo "Failed to submit review and rating.";
            }
        }
        else
        {
            echo "Error: Failed to prepare statement.";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "You have already submitted a review for this magazine.";
    }
}
else
{
    echo "Error: Magazine ID or UID not received.";
}

?>
