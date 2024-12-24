<?php
// Include database connection
include_once 'config/connection.php';

// Check if the request is a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the ID of the record to be reassigned is provided
    if (isset($_POST["assignment_id"])) {
        // Sanitize the input to prevent SQL injection
        $assignment_id = intval($_POST["assignment_id"]); // Convert to integer
        // $assignment_id = $_POST['assignment_id'];
        $due_date = $_POST['due_date'];
        // Prepare the SQL statement to delete the record
        $stmt_delete = $mysqli->prepare("UPDATE assign SET due_date = ? WHERE uni_id = ?");
        $stmt_delete->bind_param("si", $due_date, $assignment_id);

        // Execute the SQL statement to delete the record
        if ($stmt_delete->execute()) {
            // Record deleted successfully
            echo json_encode(["success" => true, "message" => "Record deleted successfully."]);
        } else {
            // Error occurred while deleting the record
            echo json_encode(["success" => false, "message" => "Failed to delete record."]);
        }

        // Close the prepared statement
        $stmt_delete->close();
    } else {
        // ID of the record to be reassigned is missing
        echo json_encode(["success" => false, "message" => "Record ID is missing."]);
    }
} else {
    // Method not allowed, return error message
    echo json_encode(["success" => false, "message" => "Method not allowed."]);
}
?>
