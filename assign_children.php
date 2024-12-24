<?php
// Include database connection
include_once 'config/connection.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required data is provided
    if (isset($_POST["grade"], $_POST["subject"], $_POST["type"], $_POST["assigned_by"], $_POST["children"], $_POST["lesson_id"], $_POST["due_dates"])) {
        // Extract data from the POST request
        $grade = $_POST["grade"];
        $subject = $_POST["subject"];
        $type = $_POST["type"];
        $assigned_by = $_POST["assigned_by"];
        $children = $_POST["children"];
        $lesson_id = $_POST["lesson_id"]; // Add lesson_id
        $due_dates = $_POST["due_dates"]; // Add due_dates
        $action = "assigned"; 

        // Prepare the SQL statement to check if the assignment already exists
        $stmt_check = $mysqli->prepare("SELECT COUNT(*) FROM assign WHERE grade = ? AND subject = ? AND type = ? AND assigned_by = ? AND assigned_to = ? AND lesson_id = ?");
        $stmt_check->bind_param("ssssss", $grade, $subject, $type, $assigned_by, $assigned_to, $lesson_id);

        // Prepare the SQL statement to insert the assignment
        $stmt_insert = $mysqli->prepare("INSERT INTO assign (grade, subject, type, assigned_by, assigned_to, action, lesson_id, due_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt_insert->bind_param("ssssssss", $grade, $subject, $type, $assigned_by, $assigned_to, $action, $lesson_id, $due_date);

        // Insert a row for each selected child
        foreach ($children as $child) {
            // Set the assigned_to parameter to the current child ID
            $assigned_to = $child;
            // Get the due date for this child
            $due_date = $due_dates[$child];

            // Check if the assignment already exists
            $stmt_check->execute();
            $stmt_check->bind_result($assignment_count);
            $stmt_check->fetch();
            $stmt_check->reset();

            if ($assignment_count == 0) {
                // Assignment does not exist, insert it
                $stmt_insert->execute();
            } else {
                // Assignment already exists, return error message
                echo json_encode(["success" => false, "message" => "Already Assigned."]);
                exit; // Stop further processing
            }
        }

        // Close the prepared statements
        $stmt_check->close();
        $stmt_insert->close();

        // Return success message
        echo json_encode(["success" => true, "message" => "Children assigned successfully."]);

        $query = "SELECT COUNT(lesson_id) AS count FROM assign WHERE assigned_by = $assigned_by";
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
                $badge_to = 'parent';
                $badge_earned = "INSERT INTO badge_earned (uid, badge_category, badge_level, badge_to, datetime) VALUES (?, ?, ?, ?, NOW())";
                $secondTableStmt = $mysqli->prepare($badge_earned);
                $secondTableStmt->bind_param("isss", $assigned_by, $badge_category, $badge_level, $badge_to);
    
                if ($secondTableStmt->execute()) {
                    $badgeMessage = "You Earned Level 1 Badge";
                } else {
                    $badgeMessage = "Failed to insert into second table";
                }
            } else {
                $badgeMessage = "You Already Earned Level 1 Badge";
            }
        }
        if ($mindboosterCount >= 3) {
            if ($mindboosterCount == 3) {
                $badge_category = 'Mindbooster';
                $badge_level = 2;
                $badge_to = 'parent';
                $badge_earned = "INSERT INTO badge_earned (uid, badge_category, badge_level, badge_to, datetime) VALUES (?, ?, ?, ?, NOW())";
                $secondTableStmt = $mysqli->prepare($badge_earned);
                $secondTableStmt->bind_param("isss", $assigned_by, $badge_category, $badge_level, $badge_to);
    
                if ($secondTableStmt->execute()) {
                    $badgeMessage = "You Earned Level 2 Badge";
                } else {
                    $badgeMessage = "Failed to insert into second table";
                }
            } else {
                $badgeMessage = "You Already Earned Level 2 Badge";
            }
        }
        if ($mindboosterCount >= 5) {
            if ($mindboosterCount == 5) {
                $badge_category = 'Mindbooster';
                $badge_level = 3;
                $badge_to = 'parent';
                $badge_earned = "INSERT INTO badge_earned (uid, badge_category, badge_level, badge_to, datetime) VALUES (?, ?, ?, ?, NOW())";
                $secondTableStmt = $mysqli->prepare($badge_earned);
                $secondTableStmt->bind_param("isss", $assigned_by, $badge_category, $badge_level, $badge_to);
    
                if ($secondTableStmt->execute()) {
                    $badgeMessage = "You Earned Level 3 Badge";
                } else {
                    $badgeMessage = "Failed to insert into second table";
                }
            } else {
                $badgeMessage = "You Already Earned Level 3 Badge";
            }
        }
        
    } else {
        // Required data not provided, return error message
        echo json_encode(["success" => false, "message" => "Required data missing."]);
    }
} else {
    // Method not allowed, return error message
    echo json_encode(["success" => false, "message" => "Method not allowed."]);
}
?>
