<?php
// Start the session
session_start();

// Check if the user is logged in and the session variable is set
if (!isset($_SESSION['uid'])) {
    exit("User not logged in. Please log in and try again.");
}

// Include the database connection configuration
include_once 'config/connection.php';

// Sanitize and validate the input data
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$u_id = $_SESSION['uid'];
$childId = sanitizeInput($_POST['childId']);
$childName = sanitizeInput($_POST['childName']);
$tutorId = sanitizeInput($_POST['tutorId']);
$teacherName = sanitizeInput($_POST['teacherName']);
$price = sanitizeInput($_POST['price']);
$fromDate = sanitizeInput($_POST['from']);
$toDate = sanitizeInput($_POST['to']);
$slot = sanitizeInput($_POST['slot']);
$subject = sanitizeInput($_POST['subject']);
$location = sanitizeInput($_POST['location']);
$category = sanitizeInput($_POST['category']);
$selectedDay = sanitizeInput($_POST['selectedDay']);

// Log the received data
error_log("Received data: " . print_r($_POST, true));

// Check if there is already an existing booking for the same child with overlapping dates
$stmt = $mysqli->prepare("
    SELECT * FROM bookings 
    WHERE child_id = ? 
    AND tutor_id = ? 
    AND (
        (from_date <= ? AND to_date >= ?) OR 
        (from_date <= ? AND to_date >= ?) OR 
        (from_date >= ? AND to_date <= ?)
    )
");
$stmt->bind_param("iissssss", $childId, $tutorId, $fromDate, $fromDate, $toDate, $toDate, $fromDate, $toDate);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $response = "Booking already exists for the selected dates. Please wait until the current booking period ends.";
} else {
    // If no overlapping booking, insert the new booking
    $stmt->close();
    $stmt = $mysqli->prepare("INSERT INTO bookings (parent_id, child_name, child_id, tutor_id, price, from_date, to_date, slot, subject, location, category, selected_day, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $status = 0; // Default status value
    $stmt->bind_param("isisisssssssi", $u_id, $childName, $childId, $tutorId, $price, $fromDate, $toDate, $slot, $subject, $location, $category, $selectedDay, $status);
    
    // Log the data being inserted for debugging
    error_log("Inserting data: " . print_r([$u_id, $childName, $childId, $tutorId, $price, $fromDate, $toDate, $slot, $subject, $location, $category, $selectedDay, $status], true));

    if ($stmt->execute()) {
        $response = "Booking successfully stored.";
    } else {
        $response = "Error: " . $stmt->error;
    }
}

// Close the statement and connection
$stmt->close();
$mysqli->close();

// Return the response to the AJAX request
echo $response;
?>
