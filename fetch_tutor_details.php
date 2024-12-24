<?php
// Include database connection or initialize database connection here
include_once 'config/connection.php';

// Check if tutor_id is set in POST request
if(isset($_POST['tutor_id'])) {
    // Sanitize the input to prevent SQL injection
    $tutorId = $_POST['tutor_id'];
    
    // Prepare SQL statement to fetch tutor details
    $fetchDetails = "SELECT amount, from_time, to_time, subject, location FROM tutorprofiles WHERE user_id = ?";
    $stmt = $mysqli->prepare($fetchDetails);

    // Check if the prepare statement succeeded
    if($stmt === false) {
        // Handle the error, for example:
        echo json_encode(array('error' => 'Failed to prepare SQL statement'));
        exit(); // Terminate script execution
    }

    $stmt->bind_param('i', $tutorId);
    $stmt->execute();

    // Check for errors in execution
    if($stmt->errno) {
        echo json_encode(array('error' => 'Execution error: ' . $stmt->error));
        exit(); // Terminate script execution
    }

    $result = $stmt->get_result();

    // Check if query was successful
    if($result->num_rows > 0) {
        // Fetch the details
        $row = $result->fetch_assoc();
        $amount = $row['amount'];
        $fromTime = $row['from_time'];
        $toTime = $row['to_time'];
        $subject = $row['subject'];
        $location = $row['location'];

        // Return the details as JSON response
        $response = array(
            'amount' => $amount,
            'from_time' => $fromTime,
            'to_time' => $toTime,
            'subject' => $subject,
            'location' => $location
        );
        echo json_encode($response);
    } else {
        // No tutor found with the provided ID
        echo json_encode(array('error' => 'No tutor found with the provided ID'));
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // Tutor ID not provided in POST request
    echo json_encode(array('error' => 'Tutor ID not provided'));
}
?>
