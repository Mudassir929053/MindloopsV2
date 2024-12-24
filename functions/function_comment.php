<?php
// include('../config/connection.php');
// **************video start comment***************

if (isset($_POST['add_video_comment'])) {
    // Retrieve data from the form
    $u_id = $_POST['u_id'];
    $video_id = $_POST['video_id'];
    $vc_comment = $_POST['vc_comment'];

    // Perform the database insert here
    // Assuming you have a database connection in $mysqli
    $sql = "INSERT INTO `video_comment` (`video_id`, `vc_content`, `created_by`, `approved_vc`) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $approved_vc = 1; // You can adjust this as needed

        $stmt->bind_param("issi", $video_id, $vc_comment, $u_id, $approved_vc);

        if ($stmt->execute()) {
            // Comment added successfully, display a JavaScript alert
            echo "<script>alert('Comment added successfully.'); window.location.href = '$_SERVER[HTTP_REFERER]';</script>";
            exit;
        } else {
            echo "Error inserting comment: " . $stmt->error;
        }
        
        

        $stmt->close();
    } else {
        echo "Error in preparing statement: " . $mysqli->error;
    }
}

//**********************************************************Update Comment********************************* */

if (isset($_POST['update_comment'])) {
    // Retrieve data from the form
    $vc_id = $_POST['vc_id'];
    $vc_content = $_POST['vc_content'];

    // Perform the database update
    $sql = "UPDATE `video_comment` SET `vc_content` = ? WHERE `vc_id` = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("si", $vc_content, $vc_id);

        if ($stmt->execute()) {
            // Redirect back to the same page or wherever you want
            echo "<script>alert('Comment updated successfully.'); window.location.href = '$_SERVER[HTTP_REFERER]';</script>";
            exit;
        } else {
            echo "Error updating comment: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error in preparing statement: " . $mysqli->error;
    }
}

//**********************************************************Delete Comment********************************* */

if (isset($_GET['delete_video_comment'])) {
    $deleteVcId = $_GET['delete_video_comment'];
    $deleteVcSQL = "DELETE FROM `video_comment` WHERE vc_id = ?";
    $stmt = $mysqli->prepare($deleteVcSQL);
    $stmt->bind_param("i", $deleteVcId);

    if ($stmt->execute()) {
        echo "<script>alert('Delete Video comment is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete Video comment is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}
// **************video end comment*****************
?>