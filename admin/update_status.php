<?php
include '../config/connection.php'; // Include the database connection file

// Check if the request method is POST and if 'id' is set
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['user_id'])) {
    // Retrieve the user ID from the POST data
    $userId = $_POST['user_id'];
    $status = $_POST['status'];
    
    // Perform database update based on user ID
    // For demonstration purposes, let's toggle the status (from 0 to 1 or vice versa)
    $sql = "UPDATE tutorprofiles SET profile_status = ? WHERE id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("si", $status,$userId);
    $stmt->execute();
    
    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // Fetch the updated status
        $sql = "SELECT profile_status FROM tutorprofiles WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($updatedStatus);
        $stmt->fetch();
        
        // Return the updated status (1 or 0) as JSON
        echo json_encode(['profile_status' => $updatedStatus]);
    } else {
        // Return an error response if the update failed
        http_response_code(500); // Internal Server Error
        echo json_encode(['error' => 'Failed to update status']);
    }
} else {
    // Return an error response if the request method is not POST or user ID is not set
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid request']);
}
?>
