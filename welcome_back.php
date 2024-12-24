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
<?php
// require_once 'config/connection.php';
require_once 'includes/page-head.php';


// authenticate code from Google OAuth Flow


if (isset($_GET['code'])) {
  $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
  // var_dump($token);
  // exit;
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
  } else {
    // User does not exist, insert a new record
    $sql = "INSERT INTO user_table (email, full_name, profile_pic, verifiedEmail, token_id) VALUES (
  '{$userinfo['email']}',
  '{$userinfo['full_name']}',
  '{$userinfo['picture']}',
  '{$userinfo['verifiedEmail']}',
  '{$userinfo['token']}'
)";

    if ($mysqli->query($sql) === TRUE) {
      $token = $userinfo['token'];
    } else {
      echo "Error: " . $mysqli->error;
      die();
    }
  }

  // save user data into session
  $_SESSION['user_token'] = $token;
  $_SESSION['role_id'] = $role_id;
} else {
  if (!isset($_SESSION['user_token'])) {
    header("Location: index.php");
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

?>


<body>
  <div id="preloader"></div>
  <img src="<?= $userinfo['profile_pic'] ?>" alt="" width="90px" height="90px">
  <ul>
    <li>Full Name: <?= $userinfo['full_name'] ?></li>
    <li>Email Address: <?= $userinfo['email'] ?></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
  <div class="modal fade" id="userTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select Your User Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form method="post" action="">
                  <div class="mb-3">
                    <label for="user_type" class="form-label">User Type:</label>
                    <select class="form-select" id="user_type" name="user_type">
                      <option value="1">Regular User</option>
                      <option value="2">Admin User</option>
                      <!-- Add more user type options as needed -->
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
            </div>
  <!-- Bootstrap JavaScript (Popper.js and Bootstrap JS) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script>
                $(document).ready(function() {
                    $("#userTypeModal").modal("show");
                });
            </script>
</body>

</html>