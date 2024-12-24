<?php
// Start the session
session_start();
// Require the database connection file
require "../config/connection.php";
// Get the user ID from the session
$uid = $_SESSION['uid'];

// Handle adding a comment
if (isset($_POST['add_comment'])) {
    // Extract data from the POST request
    extract($_POST);
    // Escape the comment content to prevent SQL injection
    $content = mysqli_real_escape_string($mysqli, $content);
    // Construct the SQL query to insert the comment
    $insertCommentQuery = "INSERT INTO `community_article_comment` (`comment_article_id`, `comment_content`, `comment_created_by`, `comment_created_date`)
    VALUES ('$article_id', '$content', '$uid', NOW())";
    // Execute the query
    $insertCommentResult = $mysqli->query($insertCommentQuery);
    // Check if the comment was successfully added
    if ($insertCommentResult) {
        echo "comment added";
    } else {
        // Display the SQL query if an error occurred
        echo $insertCommentQuery;
    }
}

// Handle deleting an article
if (isset($_GET['delete_article'])) {
    // Extract data from the GET request
    extract($_GET);
    // Construct the SQL query to delete the article
    $sql = "DELETE FROM `community_article` WHERE article_id='$article_id' and article_created_by='$uid'";
    // Execute the query
    $result = $mysqli->query($sql);
    // Check if the article was successfully deleted
    if ($result) {
        echo "Article Deleted";
    } else {
        echo "Something went wrong!!";
    }
}

// Handle deleting a comment
if (isset($_GET['delete_comment'])) {
    // Extract data from the GET request
    extract($_GET);
    // Construct the SQL query to delete the comment
    $sql = "DELETE FROM `community_article_comment` WHERE comment_id='$comment_id' and comment_created_by='$uid'";
    // Execute the query
    $result = $mysqli->query($sql);
    // Check if the comment was successfully deleted
    if ($result) {
        echo "Comment Deleted";
    } else {
        echo "Something went wrong!!";
    }
}

// Handle Reply a comment

if (isset($_GET['replycomment'])) {
    // Extract data from the POST request
    $comment_parent_id = $_POST['reply_comment_id'];
    $comment_article_id = $_POST['reply_article_id'];
    $comment_content = $_POST['reply_content'];
    $user = $_SESSION['uid'];

    // Add necessary validation and sanitization (not shown here)

    // Construct the SQL query to insert the reply comment
    $insertReplyCommentQuery = "INSERT INTO `community_article_comment` (`comment_article_id`, `comment_parent_id`, `comment_content`, `comment_created_by`, `comment_created_date`)
                           VALUES ('$comment_article_id', '$comment_parent_id', '$comment_content', '$user', NOW())";

    // Execute the query
    $insertReplyCommentResult = $mysqli->query($insertReplyCommentQuery);

    // Check if the reply comment was successfully added
    if ($insertReplyCommentResult) {
        echo "Reply added";
    } else {
        echo "Something went wrong";
    }
}

// Handle update a comment

if (isset($_GET['updatereplycomment'])) {
    // Extract data from the POST request
    $comment_parent_id = $_POST['editreply_comment_id'];
    $comment_article_id = $_POST['editreply_article_id'];
    $edit_comment_content = $_POST['editreply_content'];  // Updated variable name
    $user = $_SESSION['uid'];

    // Add necessary validation and sanitization (not shown here)

    // Construct the SQL query to update the reply comment
    $updateReplyCommentQuery = "UPDATE `community_article_comment`
                           SET `comment_content` = '$edit_comment_content'
                           WHERE `comment_id` = '$comment_parent_id'
                           AND `comment_article_id` = '$comment_article_id'
                           AND `comment_created_by` = '$user'";

    // Execute the query
    $updateReplyCommentResult = $mysqli->query($updateReplyCommentQuery);

    // Check if the reply comment was successfully updated
    if ($updateReplyCommentResult) {
        echo "Reply updated";
    } else {
        echo "Something went wrong";
    }
}
// Handle report a article

if (isset($_GET['report_article'])) {
    // Assuming you have a database connection
    // Include your database connection file or initialize your connection here

    // Extract values from POST data
    extract($_POST);

    // Construct the SQL query to insert the report into the database
    $sql = "INSERT INTO article_report_table (article_id, user_id, created_date, report_comment, level, status) 
    VALUES ('$article_id', '$uid', NOW(), '$report_comment', '$level', '0')";

    // Execute the query
    if ($mysqli->query($sql) === TRUE) {
        // If the report submission is successful, display a success message
        echo "Report submitted successfully!";
        // You may redirect the user to a confirmation page or perform other actions
    } else {
        // If there's an error submitting the report, display an error message
        echo "Error submitting report: " . $mysqli->error;
    }
}

