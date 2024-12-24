
<?php
// require_once 'config/connection.php';
require_once 'includes/page-head.php';
// authenticate code from Google OAuth Flow
if (isset($_SESSION)) {
  if (!isset($_SESSION['facebook_access_token'])) {
    // echo "Here";
    echo "<script>alert('Bad Request'); window.location.href = 'index.php';</script>";
    exit;
  }
  $fbemail = $_SESSION['fb_email'];
  $fbprofile = $_SESSION['fb_picture'];
  $fbname = $_SESSION['fb_name'];
  $fbtoken = $_SESSION['facebook_access_token'];

  // checking if user is already exists in database
  $sql = "SELECT * FROM user_table WHERE email ='$fbemail'";
  $result = mysqli_query($mysqli, $sql);
  if (mysqli_num_rows($result) > 0) {
    // user is exists
  //   var_dump($_SESSION);
  // exit;
    $userinfo = mysqli_fetch_assoc($result);
    $token = $userinfo['token_id'];
    $role_id = $userinfo['role_id'];
    $uid = $userinfo['uid'];
   
  } else {
    // User does not exist, insert a new record
    $sql = "INSERT INTO user_table (email, full_name, token_id,status) VALUES (
  '$fbemail',
  '$fbname',
  '$fbtoken',
  'active'
)";
    if ($mysqli->query($sql) === TRUE) {
      $token = $fbtoken;
    } else {
      echo "Error: " . $mysqli->error;
      die();
    }
    $sql = "SELECT * FROM user_table WHERE email ='$fbemail'";
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
  $redirect_url = $role_id==2?'teacher':'parent';
  echo "<script> window.location.href = '$redirect_url';</script>";
  exit;
} else {
  if (!isset($_SESSION['facebook_access_token'])) {
    header("Location: ./");
    die();
  }
// echo "Here again";
// exit;
  // Checking if user is already exists in the database
  $sql = "SELECT * FROM user_table WHERE token_id = '{$_SESSION['facebook_access_token']}'";

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
      } 
    }
  } else {
    // User does not exist, show user type selection form
    $userTypeForm = true;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
  <div id="preloader"></div>


  <?php

  // var_dump($_SESSION);
  // include_once 'modal.php';

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
        window.location.href = './'+role;
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