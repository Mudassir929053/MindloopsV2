<?php
session_start();
require "config/connection.php";
$uid = $_SESSION['uid'];

extract($_GET);


if (isset($notice_update)) {
    $updatenotice = "UPDATE `community_article_comment`
    SET reply_seen = 1
    WHERE comment_parent_id IN (
        SELECT comment_id
        FROM (SELECT * FROM `community_article_comment`) AS temp
        WHERE comment_created_by = '$uid'
    )";

    $resultupdate = $mysqli->query($updatenotice);
    if ($resultupdate) {
        echo "Notification updated!!";
    }
}
