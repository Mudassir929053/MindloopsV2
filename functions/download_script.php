<?php
include '../config/connection.php';
// var_dump($_POST);
if (isset($_POST['magazine_id'])) {
    // Get the magazine ID from the form
    $magazine_id = $_POST['magazine_id'];
    $user_id = $_POST['uid'];
    $magazine_path = $_POST['magazine_path'];


    // Insert a record in the magazine_download table using prepared statements
    $insert_query = "INSERT INTO magazine_download (magazine_id, downloaded_by) VALUES (?, ?)";
    
    if ($stmt = $mysqli->prepare($insert_query)) {
        $stmt->bind_param("ii", $magazine_id, $user_id); // Assuming both columns are integers (change types if needed)
        
        if ($stmt->execute()) {
            // Database insertion was successful 
        } else {
            echo 'Error: ' . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo 'Error: ' . $mysqli->error;
    }

    // Close the database connection
    // $mysqli->close();

    // Trigger the download
   echo $file_path = BASE_URL . 'assets/uploads/magazine_pdfs/' . $magazine_path;
//     var_dump($file_path);
// exit;
    // header("Content-disposition: attachment; filename=" . basename($file_path));
    // readfile($file_path);
    // exit();
}

if (isset($_POST['filename'])) {
    $lesson_id = $_POST['lesson_id'];
    $lesson_type = $_POST['lesson_type'];
    $user_id = $_POST['uid'];
    $filename = $_POST['filename'];

    // Sanitize the inputs (assuming $mysqli is your database connection)
    $lesson_id = mysqli_real_escape_string($mysqli, $lesson_id);
    $lesson_type = mysqli_real_escape_string($mysqli, $lesson_type);
    $user_id = mysqli_real_escape_string($mysqli, $user_id);

    // Construct the file URL based on your file directory and filename
    $downloadBaseDir = BASE_URL . '/assets/uploads/lesson/' . $filename;

    // Trigger the download
    // header("Content-disposition: attachment; filename=" . basename($downloadBaseDir));
    // readfile($downloadBaseDir);

    // Insert a record in the lesson_download table
    $insert_query = "INSERT INTO lesson_download (lesson_id, lesson_type, downloaded_by) 
                    VALUES ('$lesson_id', '$lesson_type', '$user_id')";

                    // exit;

    if ($mysqli->query($insert_query) === TRUE) {
        // Database insertion was successful
        echo $downloadBaseDir;
    } else {
        echo 'Error: ' . $insert_query . '<br>' . $mysqli->error;
    }

    // Close the database connection
    $mysqli->close();

    exit(); // Ensure the script stops after download
}

if (isset($_POST['video_id'])) {
    $video_id = $_POST['video_id'];

    // Check if the user is logged in (you need to implement user authentication)
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Store the view data in the database (assuming you have a database connection)
        $view_date = date("Y-m-d H:i:s"); // Current date and time
        $insert_query = "INSERT INTO video_view (video_id, viewer_id, view_date) 
                         VALUES ('$video_id', '$user_id', '$view_date')";

        // Execute the insertion query
        if ($mysqli->query($insert_query) === TRUE) {
            // Insertion was successful
            echo "View recorded";
        } else {
            echo 'Error: ' . $insert_query . '<br>' . $mysqli->error;
        }
    }
}


