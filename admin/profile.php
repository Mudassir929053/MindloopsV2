<?php include_once 'includes/head.php';
include('update-profile.php');


?>

<?php

include_once 'includes/sidebar.php';
?>
<!-- #Main ============================ -->
<div class="page-container">
  <?php include_once 'includes/header.php'; ?>
  <?php
  // Include your database connection code here

  // Initialize the user data array
  // var_dump($_SESSION);
  $userData = [];
  // Assuming you have a user ID or some identifier for the user
  $userID = $_SESSION['uid']; // Change this to your actual session variable or user identifier
  // exit;
  // Query the database to fetch user details
  $sql = "SELECT * FROM user_table WHERE uid = $userID"; // Change 'id' to the actual column name in your users table
  $result = mysqli_query($mysqli, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $userData = mysqli_fetch_assoc($result);
  }

  // Close the database connection if you're done with it

  // Now, $userData contains the user details, and you can use it throughout your page
  ?>
  <!-- ### $App Screen Content ### -->
  <main class='main-content bgc-grey-100'>
    <div id='mainContent'>
      <div class="container">
        <div class="d-flex justify-content-center mb-5">
          <div class="d-flex align-items-center"></div>
          <div class="mR-20">
            <img class="bdrs-50p w-5r h-5r" alt="" src="assets/uploads/avatar/<?= $userData['profile_pic'] ?>">
            <br>
            <a class="text-dark mt-5" data-bs-toggle="modal" data-bs-target="#addAvatar">Change Avatar</a>
          </div>
          <div>
            <h5 class="c-grey-900 mB-5"><?= $userData['username'] ?></h5>
            <h5><?= $userData['full_name'] ?></h5>
            <span class="text-info"><?= $userData['email'] ?></span>

            <!-- START  Modal Page -->
            <div class="modal fade" id="addAvatar" tabindex="-1" role="dialog" aria-labelledby="magazinemodal" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="magazinemodal">Change Avatar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="magazineDetails">
                      <!-- Title -->

                      <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">
                      <img src="./assets/uploads/avatar/Avatar 1.png" alt="" width="70" onclick="updateProfilePic('Avatar 1.png')">
                      <img src="./assets/uploads/avatar/Avatar 2.png" alt="" width="70" onclick="updateProfilePic('Avatar 2.png')">
                      <img src="./assets/uploads/avatar/Avatar 3.png" alt="" width="70" onclick="updateProfilePic('Avatar 3.png')">
                      <img src="./assets/uploads/avatar/Avatar 4.png" alt="" width="70" onclick="updateProfilePic('Avatar 4.png')">
                      <img src="./assets/uploads/avatar/Avatar 5.png" alt="" width="70" onclick="updateProfilePic('Avatar 5.png')">
                      <img src="./assets/uploads/avatar/Avatar 6.png" alt="" width="70" onclick="updateProfilePic('Avatar 6.png')">
                      <img src="./assets/uploads/avatar/Avatar 7.png" alt="" width="70" onclick="updateProfilePic('Avatar 7.png')">
                      <img src="./assets/uploads/avatar/Avatar 8.png" alt="" width="70" onclick="updateProfilePic('Avatar 8.png')">

                      <form action="" method="POST" enctype="multipart/form-data">
                        <input type="file" name="file" id="file" accept=".jpg, .jpeg, .png, .pdf" onchange="this.form.submit()">
                      </form>


                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- END Modal Page -->
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-12 bg-white p-5">
          <div class="">


            <div class=" m-5">
              <h2 class="mb-0">
                <h2>Update Profile</h2>
            </div>
          </div>
          <div class="row my-5 mx-5">
            <div class="col-12 bg-white">

              <form id="updateProfileForm" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                  <label for="full_name" class="form-label">Full Name:</label>
                  <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $userData['full_name'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">Email Address:</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?= $userData['email'] ?>" required>
                </div>

                <div class="mb-3">
                  <label for="Password" class="form-label">Password: <span class="text-muted">(Optional)</span> </label>
                  <input type="Password" class="form-control" id="Password" name="Password" value="" placeholder="If you want to change password then enter or else keep empty">
                </div>
               

                <!-- <input type="hidden" name="profile_update"> -->
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <button type="submit" name="profile_update" class="btn btn-primary text-white p-5 fw-bold ">Update Profile</button>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>





    </div>

</div>
</main>
<script>
  function updateProfilePic(imageName) {
    // Get the user ID from the session or any other source
    const userId = <?= $_SESSION['uid'] ?>;

    // Redirect to the current page with the selected image name as a query parameter
    window.location.href = `update-profile.php?uid=${userId}&image=${imageName}`;
  }
</script>

<?php
include_once 'includes/footer.php'
?>