<?php 
 require_once '../config/connection.php';
  session_start();
  // var_dump($_SESSION);
// exit;
include_once '../config/base_file.php';
// Check if the user is authenticated
if (!isset($_SESSION['uid'])) {
  header('Location: ../index.php'); // Redirect to the Public page if not authenticated
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="../assets/images/logo/231123_New_ML_Favicon.ico">
    <?php
    if($_SESSION['role_id'] == 1){
      
    ?>
      <title>Mindloops - Admin</title>

    <?php }else{

      ?>
      <title>Mindloops - Editor</title>
    <?php  } ?>

    
    <script src="https://kit.fontawesome.com/a561ea164b.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>

    
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.css" rel="stylesheet">

    <link type="text/css" href="assets/css/index.css" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
        .tab-content {
    max-height: 400px; /* Adjust the max height as needed */
    overflow-y: auto; /* Enable vertical scrolling when content overflows */
  }

</style>


  </head>
  <body class="app">
    <!-- @TOC -->
    <!-- =================================================== -->
    <!--
      + @Page Loader
      + @App Content
          - #Left Sidebar
              > $Sidebar Header
              > $Sidebar Menu

          - #Main
              > $Topbar
              > $App Screen Content
    -->

    <!-- @Page Loader -->
    <!-- =================================================== -->
    <!-- <div id='loader'>
      <div class="spinner"></div>
    </div> -->

    <script>
      // window.addEventListener('load', function load() {
      //   const loader = document.getElementById('loader');
      //   setTimeout(function() {
      //     loader.classList.add('fadeOut');
      //   }, 300);
      // });
    </script>

    <!-- @App Content -->
    <!-- =================================================== -->