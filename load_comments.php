// load_comments.php

<?php

include 'display_comments.php'; // Include your displayComments function

$offset = $_POST['offset'];

// Assuming $article_id is already defined
displayComments(NULL, 0, $offset);

?>
