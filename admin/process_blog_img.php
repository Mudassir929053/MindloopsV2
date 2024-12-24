<?php 
    // var_dump($_FILES);
  $tempFile = $_FILES["image"]["tmp_name"];
  $targetFolder = "../assets/images/blogs/"; // Specify the target folder where you want to save the image
  $file_arr = explode('.',$_FILES["image"]["name"]);
  echo $file_name = time().".".end($file_arr);
  $targetFile = $targetFolder . $file_name;
  move_uploaded_file($tempFile, $targetFile);

?>