<?php
// Start the session
session_start();
// Include the database connection file
include '../config/connection.php';

// Get the user ID from the session
$uid = $_SESSION['uid'];

// SQL query to update the status and deleted date in the video_view table
$sql = "UPDATE video_view SET status = 1, deleted_date = NOW() WHERE viewer_id = '$uid'";

// Execute the SQL query
if ($mysqli->query($sql)) {
    // If the query is successful, display a success message
    echo "History Deleted successfully";
} else {
    // If there's an error, display an error message
    echo "Something went wrong. Please try again";
}
?>
