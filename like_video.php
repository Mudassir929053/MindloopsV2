<?php
session_start();
  $user = $_SESSION['uid'];
include 'config/connection.php';
// echo $user;
extract($_REQUEST);
if (!empty($likevideo)) {
    // var_dump($_REQUEST);
    // exit;
    $sql = "delete FROM `video_like_dislike` WHERE video_id='$video_id' and (vld_liked_by='$user' or vld_disliked_by='$user')";
    $result = $mysqli->query($sql);
    if($action=='like'){
        $like_str = "vld_liked_by=$user";
    }
    else{
        $like_str = "vld_disliked_by=$user";
    }

    $sqli = "INSERT into video_like_dislike set video_id=$video_id,$like_str";

    $resulti = $mysqli->query($sqli);


    $sqlf = "select X.total_likes,Y.total_dislikes from (

        SELECT  video_id,count(*) as total_likes FROM `video_like_dislike` WHERE video_id=$video_id and vld_liked_by is not null) as X
        join (
        SELECT  video_id, count(*) as total_dislikes FROM `video_like_dislike` WHERE video_id=$video_id and vld_disliked_by is not null) Y";
// exit;
        $resultf = $mysqli->query($sqlf);
        $total_likes=0;
        $total_dislikes=0;

        while($row = mysqli_fetch_assoc($resultf)){
            extract($row);
        }

// var_dump($resulti);
    
    echo implode('#', [$total_likes, $total_dislikes]);
}

?>
