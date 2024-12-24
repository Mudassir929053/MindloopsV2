<?php
include 'includes/page-head.php';

$user = $_SESSION['uid'];

// Extract request parameters
extract($_REQUEST);

// Fetch the article from the database
$sql = "SELECT * FROM community_article WHERE article_id='$article_id'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Extract liked_by data
    $article_liked_by = explode(',', $row['article_liked_by']);

    // Check if the user has already liked the article
    $liked = in_array($user, $article_liked_by);

    // If the action is 'like' and the user hasn't liked the article yet, proceed with liking
    if ($action === 'like' && !$liked) {
        // Add the user to the liked_by array
        $article_liked_by[] = $user;

        // Update the database with the new liked_by data
        $article_id = $row['article_id'];
        $total_likes = count($article_liked_by)-1;
        $likes_str = implode(',', $article_liked_by);
        // $likes_str = implode(',', $article_liked_by);
        $sqlupdate = "UPDATE community_article SET article_likes='$total_likes', article_liked_by='$likes_str' WHERE article_id='$article_id'";
        $update = $mysqli->query($sqlupdate);

        // Return the updated like count
        echo $total_likes;
    } else {
        // Return the current like count without making any changes
        echo count($article_liked_by);
    }
} else {
    // Handle the case where the article is not found
    echo 'Article not found.';
}
?>
