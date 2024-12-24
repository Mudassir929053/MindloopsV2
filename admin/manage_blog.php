<?php
session_start();
date_default_timezone_set("Asia/Kuala_Lumpur");
include_once '../config/connection.php';
// var_dump($_SESSION);
// exit;

$uid = $_SESSION['uid'];
// var_dump($_REQUEST);
if(isset($_GET['add_blog'])){
    // var_dump($_FILES);
    $tempFile = $_FILES["coverImage"]["tmp_name"];
  $targetFolder = "../assets/images/blogs/"; // Specify the target folder where you want to save the image
  $file_arr = explode('.',$_FILES["coverImage"]["name"]);
  $file_name = time().".".end($file_arr);
  $targetFile = $targetFolder . $file_name;
  move_uploaded_file($tempFile, $targetFile);
    extract($_POST);
    $content = str_replace("'", "\\'", $content);
    $sql ="INSERT into blogs set title='$title', content = '".($content)."',thumbnail='$file_name',category_id='$category',status='$status',created_by='$uid',published_by='$published_by',published_date='$published_date'";
//    exit;

    $result = $mysqli->query($sql);

    if($result){
        echo "Blog added successfully";
    }
    else{
        echo "Something went wrong";
    }

    // exit;
}

if(isset($_GET['edit_blog'])){
    // var_dump($_FILES);
   
    extract($_REQUEST);
    $content = str_replace("'", "\\'", $content);

    $sql ="update blogs set title='$title', content = '".($content)."',category_id='$category',status='$status',updated_by='$uid',updated_date='".date('Y-m-d H:i:s')."',published_by='$published_by',published_date='$published_date' where blog_id='$blog_id'";
//    exit;

    $result = $mysqli->query($sql);

    if($_FILES['coverImage']["name"]!=''){
    $tempFile = $_FILES["coverImage"]["tmp_name"];
    $targetFolder = "../assets/images/blogs/"; // Specify the target folder where you want to save the image
    $file_arr = explode('.',$_FILES["coverImage"]["name"]);
    $file_name = time().".".end($file_arr);
    $targetFile = $targetFolder . $file_name;
    move_uploaded_file($tempFile, $targetFile);

        $sqlu = "update blogs set thumbnail='$file_name' where blog_id='$blog_id'";
        $resultu = $mysqli->query($sqlu);
    }

    if($result){
        echo "Blog Updated successfully";
    }
    else{
        echo "Something went wrong";
    }

    // exit;
}

?>