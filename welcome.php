
<?php
session_start();
require_once 'config/connection.php';
require_once ('vendor/autoload.php'); 
// require_once 'includes/page-head.php';
$clientID = '315011924299-lf2ve8d9gsubhjo8e7ntgh76ghf5q9t0.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'https://mindloops.org/welcome.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");
// authenticate code from Google OAuth Flow
// var_dump( $client);

if (isset($_GET['code'])) {
   
    try{
        
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  
//   var_dump($token);
//   exit;
    }
    catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

  if (!isset($token['access_token'])) {
    // echo "Here";
    echo "<script>alert('Bad Request'); window.location.href = 'index.php';</script>";
    exit;
  }
  $client->setAccessToken($token['access_token']);

  // get profile info
  $google_oauth = new Google_Service_Oauth2($client);
  $google_account_info = $google_oauth->userinfo->get();
  $userinfo = [
    'email' => $google_account_info['email'],
    'first_name' => $google_account_info['givenName'],
    'last_name' => $google_account_info['familyName'],
    'gender' => $google_account_info['gender'],
    'full_name' => $google_account_info['name'],
    'picture' => $google_account_info['picture'],
    'verifiedEmail' => $google_account_info['verifiedEmail'],
    'token' => $google_account_info['id'],
  ];

  // checking if user is already exists in database
  $sql = "SELECT * FROM user_table WHERE email ='{$userinfo['email']}'";
  $result = mysqli_query($mysqli, $sql);
  if (mysqli_num_rows($result) > 0) {
    // user is exists
    $userinfo = mysqli_fetch_assoc($result);
    $token = $userinfo['token_id'];
    $role_id = $userinfo['role_id'];
    $uid = $userinfo['uid'];
  } else {
    // User does not exist, insert a new record
    $sql = "INSERT INTO user_table (email, full_name, profile_pic, verifiedEmail, token_id,status) VALUES (
  '{$userinfo['email']}',
  '{$userinfo['full_name']}',
  '{$userinfo['picture']}',
  '{$userinfo['verifiedEmail']}',
  '{$userinfo['token']}',
  'active'
)";

    if ($mysqli->query($sql) === TRUE) {
      $token = $userinfo['token'];
    } else {
      echo "Error: " . $mysqli->error;
      die();
    }

    $sql = "SELECT * FROM user_table WHERE email ='{$userinfo['email']}'";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) > 0) {
      // user is exists
      $userinfo = mysqli_fetch_assoc($result);
      $token = $userinfo['token_id'];
      $role_id = $userinfo['role_id'];
      $uid = $userinfo['uid'];
    }
  }

  // save user data into session
  $_SESSION['user_token'] = $token;
  $_SESSION['role_id'] = $role_id;
  $_SESSION['uid'] = $uid;
} else {
  if (!isset($_SESSION['user_token'])) {
    header("Location: ./");
    die();
  }

  // Checking if user is already exists in the database
  $sql = "SELECT * FROM user_table WHERE token_id = '{$_SESSION['user_token']}'";
  $result = mysqli_query($mysqli, $sql);

  if (mysqli_num_rows($result) > 0) {
    // User exists in the database
    $userinfo = mysqli_fetch_assoc($result);

    // Check if the user type is set to the default value
    if ($userinfo['role_id'] == NULL) {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // User has submitted the user type selection form
        $userType = $_POST['user_type'];

        // Update the user's role in the database
        $updateSql = "UPDATE user_table SET role_id = '{$userType}' WHERE token_id = '{$_SESSION['user_token']}'";

        $updateResult = mysqli_query($mysqli, $updateSql);

        if ($updateResult) {
          // Update successful
          // echo "User type updated successfully.";
        } else {
          echo "Failed to update user type.";
        }
      } else {
        // Show a modal to select user type with Bootstrap styles
        echo '';

        // Add JavaScript to show the modal
        // echo '';
      }
    }
  } else {
    // User does not exist, show user type selection form
    $userTypeForm = true;
  }
}
// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
   <!-- Bootstrap CSS -->
    <link href="<?php echo BASE_URL; ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/dist/css/bootstrap.min.css.map" rel="stylesheet">
    <!-- <link href="<?php echo BASE_URL; ?>assets/dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <link href="<?php echo BASE_URL; ?>assets/css/teacher.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/colors.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/parent.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/community.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/articl.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/magazine.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/uservideos.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/landing-page.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/css/loops.css" rel="stylesheet">

    <!-- Carousel Js and css files -->
    <script src="<?php echo BASE_URL; ?>assets/owlCarousel/js/jquery.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/owlCarousel/js/owl.carousel.min.js"></script>
    <link href="<?php echo BASE_URL; ?>assets/owlCarousel/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo BASE_URL; ?>assets/owlCarousel/css/owl.theme.green.css" rel="stylesheet">
    <!-- Carousel Js and css files -->

   <!-- Datable Js and css files -->
   <link href="<?php echo BASE_URL; ?>assets/DataTable/datatables.min.css" rel="stylesheet">
   <script src="<?php echo BASE_URL; ?>assets/DataTable/datatables.min.js"></script>
   <script src="<?php echo BASE_URL; ?>assets/DataTable/pdfmake.min.js"></script>
   <script src="<?php echo BASE_URL; ?>assets/DataTable/vfs_fonts.js"></script>
    <!--  Datable Js and css files -->

    <!-- Bootstrap Js -->
    <script src="<?php echo BASE_URL; ?>assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/dist/js/bootstrap.bundle.min.js.map"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/color-modes.js"></script>
    <!-- <script src="<?php echo BASE_URL; ?>assets/js/code.jquery.com_jquery-3.6.0.min.js"></script> -->
    <script src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
    <script src="<?php echo BASE_URL; ?>assets/js/teacher.js"></script>
    <script src="https://kit.fontawesome.com/a561ea164b.js" crossorigin="anonymous"></script>
</head>

<body>
  <div id="preloader"></div>


  <?php

  // var_dump($_SESSION);
  include_once 'modal.php';

  // <?php
  // var_dump($_SESSION);
  // exit;
  ?>
  <!-- Bootstrap JavaScript (Popper.js and Bootstrap JS) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

  <script>
    function setRole(role) {
      fetch('setrole.php?role=' + role).then(data => data.text()).then(data => {
        console.log(data);
        window.location.href = './dashboard';
      });
    }
    <?php
    // var_dump($_SESSION);
    if (!isset($_SESSION['role_id'])) {
    ?>
      $(document).ready(function() {
        $("#ChooseUserModal").modal("show");
      });




      document.getElementById('for_teacher').addEventListener('click', function() {
        // alert("here");
        setRole('teacher');
      })
      document.getElementById('for_parent').addEventListener('click', function() {
        // alert("here");
        setRole('parent');


      })
    <?php
    } else {
    ?>
      window.location.href = './'
    <?php
    }
    ?>
  </script>