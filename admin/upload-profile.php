<?php
require_once '../config/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'assets/uploads/avatar/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Generate a unique file name using timestamp
    $timestamp = time(); // Get the current timestamp
    $filename = $timestamp . '_' . $_FILES['file']['name']; // Combine timestamp and original file name

    $targetFile = $uploadDir . $filename;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        $uploadDate = date('Y-m-d H:i:s');
        $uid = $_SESSION['uid']; // Get the user's ID

        // Update the user's profile_pic in the user_table without prepared statements
       echo $query = "UPDATE user_table SET profile_pic = '$filename' WHERE uid = $uid";
        exit;
        $result = $mysqli->query($query);

        if ($result) {
            echo "<script>alert('Profile picture updated successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "File upload failed.";
    }

}
?>
