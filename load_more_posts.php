<?php
// load_more_posts.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'config.php'; // Include your database configuration

    $categoryId = $_POST['category'];
    $page = $_POST['page'];
    
    $postsPerPage = 5; // Number of posts per page
    $offset = ($page - 1) * $postsPerPage;

    // Modify your SQL query to retrieve posts for the specific category and page
    $sql = "SELECT `blog_id`, `title`, `content`, `thumbnail`, `category_id`, `created_at`, `status` FROM `blogs` WHERE `category_id` = $categoryId LIMIT $postsPerPage OFFSET $offset";

    $result = mysqli_query($mysqli, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Generate HTML for the new posts
            // Similar to your existing code
        }
        mysqli_free_result($result);
    }
} else {
    echo "Invalid request";
}
?>
