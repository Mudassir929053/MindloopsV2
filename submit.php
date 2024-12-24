<?php include 'config/connection.php' ?>
<?php
session_start();
$u_id = $_SESSION['uid'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    $user_score = 0;
    $lesson_id = $_POST['lesson_id'];
    $questions = $_SESSION['allquestions'];
    $querycheck = mysqli_query($mysqli, "SELECT  `user_id`, `lesson_id` FROM `score_table` WHERE user_id=$u_id and lesson_id=$lesson_id");

    $row = mysqli_num_rows($querycheck);

    foreach ($questions as $index => $question) {
        $questionId = $question['do_id'];
        $correct_answer = $question['do_correct_answer'];
        $submitted_answer = $_POST['choice' . $index] ?? '';
        if ($submitted_answer === $correct_answer) {
            $score = 1;
            $user_score++;
        } else {
            $score = 0;
        }
        if ($row > 0) {
            $query = "UPDATE score_table set user_id = ?, lesson_id = ?, doitonline_id = ?, mark_answer = ?, score = ? where user_id=$u_id and doitonline_id=$questionId";
        } else {
            // Insert data into the score_table
            $query = "INSERT INTO score_table (user_id, lesson_id, doitonline_id, mark_answer, score) VALUES (?, ?, ?, ?, ?)";
        }
        $stmt = $mysqli->prepare($query);
        // Bind parameters and execute the query
        $stmt->bind_param("iiisi", $u_id, $lesson_id, $questionId, $submitted_answer, $score);
        $stmt->execute();
        $stmt->close();
    }
    $total_questions = count($questions);
    $scoreMessage = "Congratulations!😃 You have successfully completed the test! Your score is $user_score out of $total_questions";

    $query = "SELECT COUNT(DISTINCT lesson_id) AS count FROM score_table WHERE user_id = $u_id";
    $countStmt = $mysqli->prepare($query);
    $countStmt->execute();
    $countResult = $countStmt->get_result();
    $row = $countResult->fetch_assoc();
    $mindboosterCount = $row['count'];

    $badgeMessage = "";

    if ($mindboosterCount >= 1) {
        if ($mindboosterCount == 1) {
            $badge_category = 'Mindbooster';
            $badge_level = 1;
            $badge_to = 'student';
            $badge_earned = "INSERT INTO badge_earned (uid, badge_category, badge_level, badge_to, datetime) VALUES (?, ?, ?, ?, NOW())";
            $secondTableStmt = $mysqli->prepare($badge_earned);
            $secondTableStmt->bind_param("isss", $u_id, $badge_category, $badge_level, $badge_to);

            if ($secondTableStmt->execute()) {
                $badgeMessage = "You Earned Level 1 Badge";
            } else {
                $badgeMessage = "Failed to insert into second table";
            }
        } else {
            $badgeMessage = "You Already Earned Level 1 Badge";
        }
    }
    if ($mindboosterCount >= 10) {
        if ($mindboosterCount == 10) {
            $badge_category = 'Mindbooster';
            $badge_level = 2;
            $badge_to = 'student';
            $badge_earned = "INSERT INTO badge_earned (uid, badge_category, badge_level, badge_to, datetime) VALUES (?, ?, ?, ?, NOW())";
            $secondTableStmt = $mysqli->prepare($badge_earned);
            $secondTableStmt->bind_param("isss", $u_id, $badge_category, $badge_level, $badge_to);

            if ($secondTableStmt->execute()) {
                $badgeMessage = "You Earned Level 2 Badge";
            } else {
                $badgeMessage = "Failed to insert into second table";
            }
        } else {
            $badgeMessage = "You Already Earned Level 2 Badge";
        }
    }
    if ($mindboosterCount >= 50) {
        if ($mindboosterCount == 50) {
            $badge_category = 'Mindbooster';
            $badge_level = 3;
            $badge_to = 'student';
            $badge_earned = "INSERT INTO badge_earned (uid, badge_category, badge_level, badge_to, datetime) VALUES (?, ?, ?, ?, NOW())";
            $secondTableStmt = $mysqli->prepare($badge_earned);
            $secondTableStmt->bind_param("isss", $u_id, $badge_category, $badge_level, $badge_to);

            if ($secondTableStmt->execute()) {
                $badgeMessage = "You Earned Level 3 Badge";
            } else {
                $badgeMessage = "Failed to insert into second table";
            }
        } else {
            $badgeMessage = "You Already Earned Level 3 Badge";
        }
    }
                                                $query2 = "SELECT COUNT(worksheet) as w_count FROM `lesson_table`";
                                                $result2 = $mysqli->query($query2);
                                                $row2 = $result2->fetch_assoc();
                                                $w_count = $row2['w_count'];
                                                if ($mindboosterCount >= $w_count) {
                                                    if ($mindboosterCount == $w_count) {
                                                        $badge_category = 'Mindbooster';
                                                        $badge_level = 4;
                                                        $badge_to = 'student';
                                                        $badge_earned = "INSERT INTO badge_earned (uid, badge_category, badge_level, badge_to, datetime) VALUES (?, ?, ?, ?, NOW())";
                                                        $secondTableStmt = $mysqli->prepare($badge_earned);
                                                        $secondTableStmt->bind_param("isss", $u_id, $badge_category, $badge_level, $badge_to);
                                            
                                                        if ($secondTableStmt->execute()) {
                                                            $badgeMessage = "You Earned Level 4 Badge";
                                                        } else {
                                                            $badgeMessage = "Failed to insert into second table";
                                                        }
                                                    } else {
                                                        $badgeMessage = "You Already Earned Level 4 Badge";
                                                    }
                                                }
    
    // Construct response array
    $response = [
        'scoreMessage' => $scoreMessage,
        'badgeMessage' => $badgeMessage
    ];

    // Return response as JSON
    echo json_encode($response);
} else {
    echo "Error: Method not allowed";
}
?>
