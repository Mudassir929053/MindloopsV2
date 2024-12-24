<?php include_once 'config/connection.php'; ?>

<style>
  .dropdown-toggle::after {
    display: none !important;
  }

  .notification-badge {
    position: absolute;
    top: 0;
    right: 0;
    background-color: red;
    /* You can customize the badge color */
    color: white;
    border-radius: 50%;
    padding: 5px 10px;
    font-size: 12px;
  }

  .container,
  .container-fluid,
  .container-lg,
  .container-md,
  .container-sm,
  .container-xl,
  .container-xxl {
    --bs-gutter-x: 1rem;
  }

  .dropdown-toggle::after {
    display: none !important;
  }

  /* Add this to style the notification badge */
  .notification-badge {
    position: absolute;
    top: 0;
    right: 0;
    background-color: red;
    /* You can customize the badge color */
    color: white;
    border-radius: 50%;
    padding: 5px 10px;
    font-size: 12px;
  }
</style>
<!--<div id="preloader">-->
<!--  <div class="spinner-grow bg-transparent" role="status">-->
<!--    <div class="img-responsive">-->
<!--      <?php if (isset($_SESSION['uid'])) { ?>-->
<!--        <img src="<?= BASE_URL ?>assets/images/logo/231123_New_ML_Favicon.png" loading="lazy" alt="Logo" class="img-fluid" style="max-width: 100px; max-height: 100px;">-->
<!--      <?php } else { ?>-->
<!--        <img src="<?= BASE_URL ?>assets/images/logo/231123_New_ML_Favicon.png" loading="lazy" alt="Logo" class="img-fluid" style="max-width: 100px; max-height: 100px;">-->
<!--      <?php } ?>-->

<!--    </div>-->
<!--  </div>-->
<!--</div>-->

<!-- "Go to Top" button -->
<button onclick="topFunction()" id="goTopButton" title="Go to top"><i class="fa-solid fa-arrow-up"></i></button>

<!-- JavaScript to handle scrolling -->
<script>
  // Function to scroll to the top of the page smoothly
  function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
  }

  // Show/hide the button based on scroll position
  window.onscroll = function() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("goTopButton").style.display = "block";
    } else {
      document.getElementById("goTopButton").style.display = "none";
    }
  };
</script>
<div id="slow-internet-loader"></div>
<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <!-- Logo -->
    <?php if (isset($_SESSION['uid'])) { ?>
      <a class="navbar-brand" href="<?= BASE_URL . 'dashboard' ?>">
        <img src="<?= BASE_URL ?>assets/images/logo/ML_Logo_(Flat).png" loading="lazy" alt="Your Logo" height="50" class="d-inline-block align-text-top">
      </a>
    <?php } else { ?>
      <a class="navbar-brand" href="<?= BASE_URL ?>">
        <img src="<?= BASE_URL ?>assets/images/logo/ML_Logo_(Flat).png" loading="lazy" alt="Your Logo" height="50" class="d-inline-block align-text-top">
      </a>
    <?php } ?>

    <!-- Navbar Toggler Button -->
    <a class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span><i class="fa-solid fa-bars" style="color: #00060f;"></i></span>
    </a>


    <!-- Collapsible Navbar Content -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <!-- Centered Menu -->
      <ul class="navbar-nav mx-auto fw-bolder text-dark">
        <li class="nav-item">
          <a class="nav-link text-dark included-header" href="magazine">Magazine</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark included-header" href="mind-booster">Mind Booster</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark included-header" href="loops">Loops</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark included-header" href="videos">Videos</a>
        </li>
        <!--<li class="nav-item">-->
        <a class="nav-link text-dark included-header" href="community">Community</a>
        <!--</li>-->
        <li class="nav-item">
          <a class="nav-link text-dark included-header" href="blogs">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark included-header" href="membersclub_pt.php" <?php if (!isset($_SESSION['uid'])) : ?> data-target="#loginModal" <?php endif; ?> id="etutorLink">Etutor</a>
        </li>
        <!-- Add more menu items as needed -->
      </ul>

      <!-- Login and Signup -->
      <ul class="navbar-nav">
        <!-- Add a div with d-flex class for mobile view -->
        <div class="d-flex">
          <!-- <a class="navbar-brand me-5" href="membersclub_lp">
            <img src="<?= BASE_URL ?>assets/images/logo/mindloops-club-logo.png" alt="Your Logo" width="70" height="" class="d-inline-block align-text-top">
          </a> -->
          <!-- <a class="navbar-brand me-5" href="profile">
          <i class="fa-solid fa-user"></i> -->
          </a>
          <?php if (!isset($_SESSION['uid'])) { ?>
            <li class="nav-item">
              <a class="btn btn-white text-white rounded-pill me-3 px-3 included-header" style="background-color: #0355B0;" data-bs-toggle="modal" data-bs-target="#RegistrationModal">Signup</a>
            </li>
            <li class="nav-item">
              <a class="btn  btn-white text-dark px-3 rounded-pill included-header" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
            </li>
          <?php } else {
          ?>
            <?php
            // Fetch user data based on the UID from the session
            $uid = $_SESSION['uid'];
            $sql = "SELECT * FROM `user_table` WHERE `uid` = $uid";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $profilePic = $row['profile_pic'];
              //   var_dump(strpos($profilePic, 'httpk') );
              //   exit;
            }

            $sqlnotice  = "select count(*) as total_notification from community_article_comment where comment_parent_id in( SELECT comment_id FROM `community_article_comment` where comment_created_by='$uid') and reply_seen=0";

            $resultn = $mysqli->query($sqlnotice);
            if ($resultn->num_rows > 0) {
              $rown = $resultn->fetch_assoc();
              extract($rown);
            }

            // echo $total_notification;
            ?>

            <!-- Add this to your HTML file -->
            <!-- Add this to your HTML file -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if (!empty($profilePic)) {
                  if (filter_var($profilePic, FILTER_VALIDATE_URL)) {
                    $url_pic = "$profilePic";
                  } else {

                    $url_pic = "assets/uploads/avatar/" . $profilePic;
                  }
                ?>

                <?php } else {
                  $url_pic = "assets/uploads/avatar/default.png";
                } ?>
                <div style="position: relative; display: inline-block;">
                  <img src="<?php echo $url_pic; ?>" alt="Profile Picture" class="rounded-circle" width="50" height="50">
                  <?php if ($total_notification > 0) { ?>
                    <span class="notification-badge"><?= $total_notification ?></span>
                  <?php } ?>
                </div>

              </a>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile?notification=yes">
                  <span><i class="fas fa-bell"></i> Notification <?php if ($total_notification > 0) {
                                                                  ?>
                      <span class="notification-badge m-2"><?= $total_notification ?></span>
                    <?php
                                                                  } ?></span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="profile">
                  <span><i class="fas fa-user"></i> Profile</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">
                  <span><i class="fas fa-sign-out-alt"></i> Logout</span>
                </a>
              </div>
            </li>
          <?php } ?>
        </div>
        <!-- End of d-flex div -->
      </ul>
    </div>
  </div>
</nav>

<!-- Cookies Message Modal -->
<!-- <div class="modal fade" id="cookiesModal" tabindex="-1" aria-labelledby="cookiesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <p>We use cookies to improve your experience on our website. By browsing this website, you agree to our use of cookies.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="accept-cookies">Accept</button>
      </div>
    </div>
  </div>
</div> -->

<?php include 'modal.php';
include_once 'function_forget_pwd.php';
?>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const etutorLink = document.getElementById('etutorLink');

    etutorLink.addEventListener('click', function(event) {
      if (etutorLink.dataset.target) {
        event.preventDefault(); // Prevent the default link action
        const modal = new bootstrap.Modal(document.getElementById('loginModal'));
        modal.show(); // Show the modal
      }
    });
  });
</script>