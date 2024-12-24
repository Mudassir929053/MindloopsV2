<?php
include 'includes/page-head.php';
// Include necessary files

// Check if grade and subject parameters are provided
if (!isset($_GET['grade']) || !isset($_GET['subject'])) {
    http_response_code(400);
    exit("Error: Grade and subject parameters are required.");
}

// Get the selected grade and subject from the AJAX request
$grade = $_GET['grade'];
$subject = $_GET['subject'];

// Prepare and execute the database query using prepared statements
$stmt = $mysqli->prepare("SELECT * FROM `lesson_table` WHERE `grade_id` = ? AND `subject_id` = ?");
$stmt->bind_param("ii", $grade, $subject);
$stmt->execute();
$result = $stmt->get_result();

// Fetch lessons and store them in an array
$lessons = array();
while ($row = $result->fetch_assoc()) {
    $lessons[] = $row;
}

// Convert lessons array to JSON and output it
// header('Content-Type: application/json');
echo '||||' .json_encode($lessons);

// Close the prepared statement and database connection
$stmt->close();
$mysqli->close();
?>
