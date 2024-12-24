<?php
// Start the session
session_start();

// Check if the user is logged in and the session variable is set
if (!isset($_SESSION['uid'])) {
    // Handle the case when the user is not logged in
    // Redirect the user to the login page or display an error message
    exit("User not logged in. Please log in and try again.");
}

// Include the database connection configuration
include_once 'config/connection.php';

// Get the booking ID and status from the AJAX request
$bookingId = $_POST['booking_id'];
$status = $_POST['status'];

// Update the status in the database
$stmt = $mysqli->prepare("UPDATE bookings SET status = ? WHERE booking_id = ?");
$stmt->bind_param("ii", $status, $bookingId);

if ($stmt->execute()) {
    echo "Status updated successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$mysqli->close();
?>
