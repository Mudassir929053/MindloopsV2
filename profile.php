<?php
// Include page head and necessary functions
include 'includes/page-head.php';
include 'functions/function.php';
include 'functions/profilepic.php';

// Check if user is logged in
if (!isset($_SESSION['uid'])) {
    // Redirect to the home page if not logged in
    echo "<script>
    window.location.href = './'
</script>";
    exit();
}

// Retrieve the user ID from session
if (isset($_SESSION['uid'])) {
    $u_id = $_SESSION['uid'];
} else {
    // Redirect to index.php if user ID is not set in session
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
}

// Determine the role type of the user
if ($role == 3) {
    $type = "Parent";
} elseif ($role == 2) {
    $type = "Teacher";
} elseif ($role == 4) {
    $type = "Student";
} else {
    $type = "Null";
}

// Check if a notification is being viewed
$is_notice = isset($_GET['notification']);

if ($is_notice) {
    // Update notification status for the user
    $updatenotice = "UPDATE `community_article_comment` SET reply_seen=1 
                     WHERE comment_parent_id IN 
                     (SELECT comment_id FROM community_article_comment WHERE comment_created_by=?)";

    // Prepare the SQL statement
    $stmt = $mysqli->prepare($updatenotice);
    // Bind the user ID parameter
    $stmt->bind_param("i", $u_id);
    // Execute the query
    $stmt->execute();
    // Close the statement
    // $stmt->close();
}
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>
<style>
    /* Custom styles for mobile devices */
    @media screen and (max-width: 768px) {
        /* Add your custom styles here */
    }

    /* Print styles */
    @media print {

        /* Ensure that the invoice content takes up the full page width */
        #invoice {
            width: 100%;
            max-width: 100%;
            border: 1px solid black;
            /* Add border around the bill */
            padding: 1px;
            /* Add padding to increase margin */
        }

        /* Ensure that all elements maintain their original size */
        .container,
        .row,
        .col {
            width: auto;
            max-width: none;
        }

        /* Ensure that all text is black and visible */
        body {
            color: black !important;
        }

        /* Add margins to the printed page */
        @page {
            margin: 20mm;
        }
    }

    .table>:not(caption)>*>* {
        padding: .5rem .5rem;
        color: black !important;
        background-color: white !important;
        border-bottom-width: var(--bs-border-width);
        box-shadow: inset 0 0 0 9999px var(--bs-table-bg-state, var(--bs-table-bg-type, var(--bs-table-accent-bg)));
    }

    [data-bs-theme=dark] .btn-close {
        filter: none !important;
        color: black !important;
    }

    .nav-tabs .nav-link {
        border: none;
        border-radius: 30px;
        margin-bottom: 10px;
        color: #333;
        background-color: transparent;
        padding: 10px 20px;
        text-align: left;
        border: 2px solid transparent;
    }

    .nav-tabs .nav-link.active {
        background-color: #fff;
        font-weight: bolder;
        border-color: #007bff;
        /* Blue border color for active tab */
    }

    .tab-content {
        padding: 20px;
    }

    .image-container {
        position: relative;
        overflow: visible;
    }

    .hover-card {
        width: 22rem;
        position: absolute;
        top: 1000px;
        left: 90%;
        /* transform: translateX(-50%); */
        background-color: white;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.4);
        opacity: 0;
        transition: opacity 0.4s, visibility 0.3s;
        overflow: visible;
        z-index: 1000;
    }

    .small-light {
        font-size: small;
        font-weight: lighter;
    }

    .progress-bar-custom {
        background-color: #DEEDFF;
    }

    .blur-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        /* Adjust this value for the desired width of the blurred area */
        height: 100%;
        background-color: rgba(255, 255, 255, 0.5);
        /* Adjust opacity as needed */
        backdrop-filter: blur(4px);
        /* Adjust blur radius as needed */
    }
</style>

<body class="bg-white text-dark">
    <?php include 'includes/page-header.php' ?>
    <div class="wrapper">
        <main class="main-content">
            <!-- Your content here -->
            <div class="container mt-5">
                <div id="toast" class="toast align-items-center text-dark bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            <!-- Toast message content will be dynamically inserted here -->
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
                <div class="row">
                    <!-- Vertical Tabs -->
                    <div class="col-md-3">
                        <div class="vertical-tabs">
                            <ul class="nav nav-tabs border border-0 flex-column" id="myTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link <?= $is_notice ? '' : 'show active' ?>  text-dark" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><i class="fa-solid fa-user"></i> Profile</a>
                                </li>
                                <?php if ($role == 3) { ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link  text-dark" id="childern-tab" data-bs-toggle="tab" href="#childern" role="tab" aria-controls="childern" aria-selected="false"><i class="fa-solid fa-children"></i> Manage Children</a>
                                    </li>
                                <?php } ?>
                                <?php
                                $today = date('Y-m-d');
                                $sid = null;
                                $QUERY = "SELECT subscriber_id FROM subscription WHERE s_status='PAID' AND s_end_date >= '$today' AND subscriber_id=$uid";
                                $result = $mysqli->query($QUERY);

                                if ($result && $result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $sid = $row['subscriber_id'];
                                }

                                if ($role == 4 || ($role == 3 && $uid == $sid) || ($role == 2 && $uid == $sid)) { ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link  text-dark" id="cassignment-tab" data-bs-toggle="tab" href="#cassignment" role="tab" aria-controls="cassignment" aria-selected="false"><i class="fa-solid fa-children"></i> Children Assignment</a>
                                    </li>
                                <?php }
                                ?>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link <?= $is_notice ? 'active' : '' ?> text-dark" <?= $total_notification > 0 ? "onclick='updateNotification()'" : "" ?> id="notification-tab" data-bs-toggle="tab" href="#notification" role="tab" aria-controls="notification" aria-selected="false"><i class="fa-solid fa-bell"></i> Notification</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-dark" id="downloads-tab" data-bs-toggle="tab" href="#downloads" role="tab" aria-controls="downloads" aria-selected="false"><i class="fa-solid fa-download"></i> Downloads</a>
                                </li>
                                <?php if ($role == 4) { ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link  text-dark" id="assignment-tab" data-bs-toggle="tab" href="#assignment" role="tab" aria-controls="assignment" aria-selected="false"><i class="fa-solid fa-children"></i> Assignment</a>
                                    </li>
                                <?php } ?>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-dark" id="history-tab" data-bs-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false"><i class="fa-solid fa-clock"></i> History</a>
                                </li>
                                <?php if ($role != 3) { ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-dark" id="Voucher-tab" data-bs-toggle="tab" href="#Voucher" role="tab" aria-controls="Voucher" aria-selected="false"><i class="fa-solid fa-ticket"></i> Voucher</a>
                                    </li>
                                <?php } ?>
                                <?php
                                $today = date('Y-m-d');
                                $sid = null;
                                $QUERY = "SELECT subscriber_id FROM subscription WHERE s_status='PAID' AND s_end_date >= '$today' AND subscriber_id=$uid";
                                $result = $mysqli->query($QUERY);

                                if ($result && $result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    $sid = $row['subscriber_id'];
                                }

                                if ($role == 4 || ($role == 3 && $uid == $sid) || ($role == 2 && $uid == $sid)) { ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-dark" id="progress-tracker" data-bs-toggle="tab" href="#progresstracker" role="tab" aria-controls="progresstracker" aria-selected="false"><i class="fa-solid fa-arrow-trend-up"></i> Progress Tracker</a>
                                    </li>
                                <?php }
                                ?>

                                <?php if ($role == 2) { ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-dark" id="Tutor-tab" data-bs-toggle="tab" href="#Tutor" role="tab" aria-controls="Tutor" aria-selected="false"><i class="fa-solid fa-chalkboard-user"></i> Tutor</a>
                                    </li>
                                <?php } ?>
                                <?php if ($role == 3) { ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-dark" id="booking-tab" data-bs-toggle="tab" href="#booking" role="tab" aria-controls="booking" aria-selected="false"><i class="fa-solid fa-chalkboard-user"></i> Your Bookings</a>
                                    </li>
                                <?php } ?>
                                <?php if ($role != 3) { ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link text-dark" id="Event-tab" data-bs-toggle="tab" href="#Event" role="tab" aria-controls="Event" aria-selected="false"><i class="fa-solid fa-calendar-xmark"></i> Event</a>
                                    </li>
                                <?php } ?>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-dark" id="PaymentHistory-tab" data-bs-toggle="tab" href="#PaymentHistory" role="tab" aria-controls="PaymentHistory" aria-selected="false">
                                        <i class="fas fa-file-invoice-dollar"></i> Payment History
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link text-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket"> </i> Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-1"> </div>
                    <!-- Tab Content -->
                    <div class="col-md-8">
                        <div class="tab-content" id="myTabContent">
                            <!-- Profile Tab -->
                            <div class="tab-pane show <?= $is_notice ? '' : 'active' ?> fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                <!-- Profile Settings Content -->

                                <h3 class="fw-bolder">Profile</h3>
                                <p>Update your profile information here.</p>

                                <div class="d-flex justify-content-end">
                                    <?php if ($role == 3) { ?>
                                        <button id="switchToTeacherBtn" type="button" class="btn btn-primary rounded-pill btn-sm fw-bolder mx-2">
                                            Switch To Teacher
                                        </button>
                                    <?php } ?>
                                    <?php if ($role == 2) { ?>
                                        <button id="switchToTeacherBtn" type="button" class="btn btn-primary rounded-pill btn-sm fw-bolder mx-2">
                                            Switch To Parent
                                        </button>
                                    <?php } ?>
                                    <?php
                                    if (empty($password)) { ?>
                                        <button type="button" class="btn btn-primary rounded-pill btn-sm fw-bolder" data-bs-toggle="modal" data-bs-target="#updatePasswordModal">
                                            Update Password
                                        </button>
                                    <?php } ?>
                                </div>

                                <!-- Profile Picture Upload -->
                                <div class="mb-3">
                                    <label for="profile-picture" class="form-label">Profile Picture</label>

                                    <div class="row mb-5">
                                        <div class="col-12 col-md-4">
                                            <?php
                                            if (!empty($profilePic)) {
                                                if (strpos($profilePic, 'http') === 0) {
                                                    $url_pic = $profilePic;
                                                } else {
                                                    $url_pic = "assets/uploads/avatar/$profilePic";
                                                }
                                            } else {
                                                $url_pic = 'path-to-default-image.jpg';
                                            }
                                            ?>

                                            <!-- Circular Profile Picture Upload Area -->
                                            <div class="rounded-circle profile-pic-container position-relative" style="background-image: url('<?php echo $url_pic; ?>'); background-size: contain; background-position: center;" data-bs-toggle="modal" data-bs-target="#defaultImageModal">
                                                <?php
                                                if (empty($profilePic)) {
                                                    echo "<i class='fas fa-camera'></i>";
                                                }
                                                ?>
                                            </div>

                                            <?php
                                            if (!empty($profilePic)) {
                                                echo '<a class="text-danger nav-link" href="profile?remove_avatar=' . $uid . '" onclick="return remove_avatar()">remove avatar</a>';
                                            }
                                            ?>
                                        </div>


                                        <div class="col-12 col-md-5">
                                            <p class="pt-2 text-dark">Upload a profile picture with a maximum size of 2MB in JPG or PNG format.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="defaultImageModal" tabindex="-1" role="dialog" aria-labelledby="defaultImageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-white text-dark">
                                                <h5 class="modal-title" id="magazinemodal">Change Avatar</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                                            </div>
                                            <div class="modal-body bg-white text-dark">
                                                <form action="" method="POST" enctype="multipart/form-data" id="magazineDetails">
                                                    <!-- Title -->

                                                    <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">
                                                    <div class="d-flex justify-content-center flex-wrap">
                                                        <img src="./assets/uploads/avatar/Avatar 1.png" alt="" width="70" onclick="updateProfilePic('Avatar 1.png')">
                                                        <img src="./assets/uploads/avatar/Avatar 2.png" alt="" width="70" onclick="updateProfilePic('Avatar 2.png')">
                                                        <img src="./assets/uploads/avatar/Avatar 3.png" alt="" width="70" onclick="updateProfilePic('Avatar 3.png')">
                                                        <img src="./assets/uploads/avatar/Avatar 4.png" alt="" width="70" onclick="updateProfilePic('Avatar 4.png')">
                                                        <img src="./assets/uploads/avatar/Avatar 5.png" alt="" width="70" onclick="updateProfilePic('Avatar 5.png')">
                                                        <img src="./assets/uploads/avatar/Avatar 6.png" alt="" width="70" onclick="updateProfilePic('Avatar 6.png')">
                                                        <img src="./assets/uploads/avatar/Avatar 7.png" alt="" width="70" onclick="updateProfilePic('Avatar 7.png')">
                                                        <img src="./assets/uploads/avatar/Avatar 8.png" alt="" width="70" onclick="updateProfilePic('Avatar 8.png')">
                                                    </div>
                                                    <hr>
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        <input type="file" class="form-control" name="file" id="file" accept=".jpg, .jpeg, .png, .pdf" onchange="this.form.submit()">
                                                    </form>


                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal for Updating Password -->
                                <form action="" method="POST" onsubmit="checkError(event)" enctype="multipart/form-data">
                                    <?php
                                    // Fetch user data based on the UID from the session
                                    $uid = $_SESSION['uid'];
                                    $sql = "SELECT * FROM `user_table` WHERE `uid` = $uid";
                                    $result = $mysqli->query($sql);

                                    if ($result && $result->num_rows > 0) {
                                        $row = $result->fetch_assoc();

                                        // Extract data from the query result
                                        $username = $row['username'];
                                        // $fullName = $row['full_name'];
                                        $email = $row['email'];
                                        $mobile = $row['mobile'];
                                        $password = $row['password'];
                                        $profilePic = $row['profile_pic'];
                                    }
                                    ?>
                                    <!-- Profile Picture Upload Tips --> <!-- Form for Username, Password, Email, and Number -->
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control bg-white text-dark" id="username_update" onchange="checkusernamep(this,'<?php echo $username; ?>')" name="username" placeholder="Enter your Username" value="<?php echo $username; ?>">
                                        <p class="h6"> <span id="user_msg1" class="small text-danger"></span></p>
                                    </div>
                                    <?php if ($password == NULL) : ?>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" autocomplete="off" class="form-control bg-white text-dark" id="password" name="password" placeholder="Enter your Password" value="" name="password">
                                        </div>
                                    <?php endif; ?>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control bg-white text-dark" id="email_update" onchange="checkemailp(this,'<?php echo $email; ?>')" placeholder="Enter your Email" value="<?php echo $email; ?>" name="email">
                                        <div class="h6"> <span id="email_msg1" class="small text-danger"></span></div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="number" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control bg-white text-dark" id="mobile" name="mobile" placeholder="Enter your Phone Number" value="<?php echo $mobile; ?>" name="number">
                                    </div> <!-- Submit Button on the Right -->
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" id="profile_update" name="profile_update" value="submit" class="btn btn-primary rounded-pill btn-sm fw-bolder">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                            <!-- Add the following code inside your HTML file -->
                            <div class="modal fade" id="updatePasswordModal" tabindex="-1" role="dialog" aria-labelledby="updatePasswordModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updatePasswordModalLabel">Update Password</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="function.php" method="POST" enctype="multipart/form-data" id="updatepassword">
                                                <div class="mb-3">
                                                    <label for="current_password" class="form-label">Current Password</label>
                                                    <input type="password" autocomplete="off" class="form-control" id="current_password" name="current_password" placeholder="Enter your current password">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="new_password" class="form-label">New Password</label>
                                                    <input type="password" autocomplete="off" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                                    <input type="password" autocomplete="off" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your new password">
                                                </div>
                                                <div id="password-error-message" class="text-danger"></div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="update_password" id="update_password">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade show <?= $is_notice ? 'active' : '' ?>" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                                <!-- Notification Settings Content -->
                                <h3 class="fw-bolder">Notification</h3>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 ">

                                            <?php
                                            // var_dump($uid);
                                            $noticesql = "select A.comment_id,A.comment_created_by,D.full_name,D.username as replier,C.article_id,C.article_title,A.reply_seen,A.comment_created_date,C.article_cc_id from community_article_comment A join community_article C on A.comment_article_id = C.article_id 
                                            join user_table D on A.comment_created_by=D.uid
                                            where A.comment_parent_id in (SELECT comment_id FROM community_article_comment A join user_table B on A.comment_created_by=B.uid where A.comment_created_by='$uid') ORDER by A.comment_created_date DESC";
                                            $noticeresult = $mysqli->query($noticesql);
                                            if ($noticeresult->num_rows > 0) {

                                                while ($row_noticeresult = $noticeresult->fetch_assoc()) {
                                            ?>

                                                    <div class="alert custom-alert-padding alert-info" role="alert">
                                                        <a href="community?article_id=<?= $row_noticeresult['article_id'] ?>" class="btn"> <?= $row_noticeresult['replier'] . " replied to your comment on " . $row_noticeresult['article_title'];  ?></a>
                                                    </div>


                                                <?php }
                                            } else {
                                                ?>
                                                <div class="alert custom-alert-padding" role="alert">
                                                    Nothing to show yet
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="childern" role="tabpanel" aria-labelledby="childern-tab">
                                <!-- Profile Settings Content  -->
                                <h3 class="fw-bolder">Children</h3>
                                <p>Add or update children's information here.</p> <!-- Add new children -->
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary p-2 btn-sm fw-bolder" onclick="showMessageModal()">Add Children</button>
                                </div>
                                <?php
                                // Fetch user data from the user_table
                                $parent_id = $_SESSION['uid'];
                                $query = "SELECT * FROM user_table LEFT JOIN student_profile ON user_table.uid = student_profile.user_id LEFT JOIN grade_table ON student_profile.grade = grade_table.grade_id WHERE user_table.role_id = 4 AND student_profile.parent_id = $parent_id LIMIT 0, 25";
                                $result = $mysqli->query($query);

                                // Check if there are any rows returned
                                if ($result->num_rows > 0) {
                                    $cards = array();

                                    while ($row = $result->fetch_assoc()) {
                                        $cards[] = array(
                                            'title' => $row['username'],
                                            'uid' => $row['uid'],
                                            'mobile' => $row['mobile'],
                                            'email' => $row['email'],
                                            'fullname' => $row['full_name'],
                                            'dob' => $row['date_of_birth'],
                                            'gender' => $row['gender'],
                                            'profile_pic' => $row['profile_pic'],
                                            'grade_id' => $row['grade_id'],
                                            'grade' => $row['grade_name'] . ' ' . $row['grade'],
                                        );
                                    }
                                }
                                ?>
                                <div class="row mt-5">
                                    <?php
                                    if (!empty($cards)) :
                                        foreach ($cards as $card) :
                                            // Convert the date string to the desired format
                                            $dob = date("F j, Y", strtotime($card['dob']));
                                    ?>
                                            <div class="col-md-12 mt-4">
                                                <div class="border border-2 p-3 rounded-4">
                                                    <div class="row">
                                                        <div class="col-md-6 col-lg-5 col-xl-5 px-5 py-3">
                                                            <?php if (!$card['profile_pic']) { ?>
                                                                <img src="<?= BASE_URL ?>/assets/images/homepage/Group 804.png" class="img-fluid rounded-circle" width="50%" alt="Profile Picture">
                                                            <?php } else {
                                                            ?>
                                                                <img src="<?= BASE_URL ?>/assets/uploads/avatar/<?= $card['profile_pic'] ?>" class="img-fluid rounded-circle" width="50%" alt="Profile Picture">
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                        <div class="col-md-1 col-lg-1 col-xl-1"></div>
                                                        <div class="col-md-5 col-lg-6 col-xl-6">
                                                            <div class="card-body d-flex flex-column" style="max-height: 400px; overflow-y: auto;">
                                                                <h5 class="card-title"><?php echo $card['title']; ?></h5>
                                                                <p class="card-text"><?php echo $card['email']; ?></p>
                                                                <p class="card-text"><?php echo $card['fullname']; ?></p>
                                                                <p class="card-text"><?php echo $dob; ?></p>
                                                                <p class="card-text"><?php echo $card['gender']; ?></p>
                                                                <p class="card-text"><?php echo $card['grade']; ?></p>
                                                                <!-- Edit and Delete buttons -->
                                                                <div class="mt-3">
                                                                    <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-child-info="<?= htmlentities(json_encode($card)) ?>" onclick="editchildinfo(this)" data-bs-target="#editchild"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                                                                    <a class="btn btn-sm btn-danger" href="profile?delete_child=<?php echo $card['uid']; ?>" title="Delete Grade" onclick="return deletechild()">
                                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>

                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p>No user data available.</p>
                                    <?php endif; ?>

                                    <div class="modal fade" id="editchild" tabindex="-1" aria-labelledby="editchildernModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-white text-dark">
                                                <div class="modal-header border-0 text-dark">
                                                    <h5>Edit Child</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Form for Editing Child Details -->
                                                    <form method="POST" enctype="multipart/form-data" id="editchildren"> <!-- Set the correct action attribute -->
                                                        <input type="hidden" name="child_id" value="">
                                                        <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label for="username" class="form-label">Children Username</label>
                                                                <input type="text" class="form-control" id="username_edit" name="child_username" value="" placeholder="Enter the Username">
                                                            </div>
                                                            <div class="mb-3 col-md-6">
                                                                <label for="email" class="form-label">Email</label>
                                                                <input type="email" class="form-control" id="email_edit" name="child_email" value="" placeholder="Enter the Email">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="fullname" class="form-label">Fullname</label>
                                                            <input type="text" class="form-control" id="fullname_edit" name="child_fullname" value="" placeholder="Enter the Fullname">
                                                        </div>


                                                        <div class="mb-3">
                                                            <label for="number" class="form-label">Phone Number</label>
                                                            <input type="tel" class="form-control" id="number_edit" name="child_phone_number" value="" placeholder="Enter the Phone Number">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="dob" class="form-label">Date of Birth</label>
                                                            <input type="date" class="form-control" id="dob_edit" name="child_dob" value="" required>
                                                        </div>

                                                        <div class="row">
                                                            <div class="mb-3 col-md-6">
                                                                <label for="gender" class="form-label">Gender</label>
                                                                <select class="form-select" id="gender_edit" name="child_gender">
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>

                                                                </select>
                                                            </div>
                                                            <div class="mb-3 col-md-6">

                                                                <label for="grade" class="form-label">Grade</label>

                                                                <select class="form-select" id="grade_edit" name="child_grade">
                                                                    <?php
                                                                    $grade_id = $card['grade_id'];
                                                                    // Query to retrieve grades from the database
                                                                    $sqlgrade = "SELECT * FROM grade_table WHERE grade_status = 1 ";
                                                                    //    exit;
                                                                    $resultgrade = $mysqli->query($sqlgrade);
                                                                    if ($resultgrade->num_rows > 0) {
                                                                        while ($rowgrade = $resultgrade->fetch_assoc()) {
                                                                            $gradeId = $rowgrade['grade_id'];
                                                                            $gradeName = $rowgrade['grade_name'];
                                                                            $grade = $rowgrade['grade'];
                                                                            echo "<option value=\"$gradeId\" $selected>$gradeName $grade</option>";
                                                                        }
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <!-- Submit Button on the Right -->
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary rounded-pill btn-sm fw-bolder" name="edit_childern">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- User Choose Modal -->
                                    <div class="modal fade" id="addChildern" tabindex="-1" aria-labelledby="addchildernModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg-white text-dark">
                                                <div class="modal-header border-0 text-dark">
                                                    <h5>Add new children</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>



                                                <div class="modal-body">
                                                    <div class="">
                                                        <!-- Form for Username, Password, Email, and Number -->
                                                        <form method="POST" action=""> <!-- Set the correct action attribute -->
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="username" class="form-label">Children Username <span style="color: red;">*</span></label>
                                                                    <input type="text" class="form-control" id="username_child" name="child_username" required placeholder="Enter the Username">
                                                                    <input type="hidden" class="form-control" id="parentid" name="parent_id" value="<?= $_SESSION['uid'] ?>" placeholder="Enter the Username">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="email" class="form-label">Email <em>(optional)</em></label>
                                                                    <input type="email" class="form-control" id="email_child" name="child_email" placeholder="Enter the Email">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="fullname" class="form-label">Fullname <span style="color: red;">*</span></label>
                                                                <input type="text" class="form-control" id="fullname_child" name="child_fullname" required placeholder="Enter the Password">
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="password" class="form-label">Password <span style="color: red;">*</span></label>
                                                                    <input type="password" autocomplete="off" class="form-control" id="child_password" name="child_password" required placeholder="Enter the Password">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="confirm_password" class="form-label">Confirm Password <span style="color: red;">*</span></label>
                                                                    <input type="password" autocomplete="off" class="form-control" id="child_confirm_password" required name="child_confirm_password" placeholder="Confirm the Password">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3"> </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="number" class="form-label">Phone Number <em>(optional)</em></label>
                                                                    <input type="tel" class="form-control" id="number_child" name="child_phone_number" placeholder="Enter the Phone Number">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="dob" class="form-label">Date of Birth</label>
                                                                    <input type="date" class="form-control" id="dob_child" name="child_dob" placeholder="Enter your Date of Birth" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="gender" class="form-label">Gender <span style="color: red;">*</span></label>
                                                                    <select class="form-select" id="gender_child" name="child_gender">
                                                                        <option value="male">Male</option>
                                                                        <option value="female">Female</option>

                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="grade" class="form-label">Grade <span style="color: red;">*</span></label>
                                                                    <select class="form-select" id="grade" name="child_grade">
                                                                        <?php
                                                                        // Query to retrieve grades from the database
                                                                        $sql = "SELECT * FROM grade_table WHERE grade_status = 1";                                                                    // Execute the query
                                                                        $result = $mysqli->query($sql);
                                                                        if ($result->num_rows > 0) {
                                                                            while ($row = $result->fetch_assoc()) {
                                                                                $gradeId = $row['grade_id'];
                                                                                $gradeName = $row['grade_name'];
                                                                                $grade = $row['grade'];
                                                                                echo "<option value=\"$gradeId\">$gradeName $grade</option>";
                                                                            }
                                                                        }                                                                    // Close the database connection
                                                                        // $mysqli->close();
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div> <!-- Submit Button on the Right -->
                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary rounded-pill btn-sm fw-bolder" name="add_childern">Add Children</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Button to trigger the modal -->
                                    <!--<button onclick="showMessageModal()">Show Message</button>-->

                                    <!-- Modal -->
                                    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="messageModalLabel">Disclaimer: </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p id="messageContent" class="justify-text">
                                                        MindLoops loves to be a part of your child’s education journey.<br> <br>We produce content that is suitable for primary school children ages 7 to 12 years old.<br><br>To ensure your child receives suitable and relatable content, please insert their age according to their birth year.
                                                        <br><br>
                                                        Thank you for choosing MindLoops as your preferred partner in education
                                                    </p>

                                                    <button type="button" class="btn btn-primary  fw-bolder" onclick="openChildModal()" name="add_childern">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function showMessageModal() {
                                            // Set the message content dynamically before showing the modal
                                            // document.getElementById('messageContent').innerText = 'Your custom message here';
                                            // Show the modal using Bootstrap modal method
                                            $('#messageModal').modal('show');
                                        }

                                        function openChildModal() {
                                            // Use jQuery to select the modal by its ID and trigger the Bootstrap modal show method
                                            $('#messageModal').modal('hide');
                                            $('#addChildern').modal('show');
                                        }
                                    </script>

                                </div>
                            </div>
                            <!-- Downloads Tab -->
                            <div class="tab-pane fade" id="downloads" role="tabpanel" aria-labelledby="downloads-tab">
                                <!-- Downloads Settings Content -->
                                <h3 class="fw-bolder">Downloads</h3>

                                <?php
                                $uid = $_SESSION['uid'];

                                $querydownload = "SELECT * FROM lesson_table lt
                                    RIGHT JOIN lesson_download ld
                                    ON lt.lesson_id = ld.lesson_id
                                    WHERE ld.downloaded_by = '$uid'
                                    ORDER BY ld.downloaded_date DESC";
                                $resultdownload = $mysqli->query($querydownload);
                                $downloadsFound = false;
                                // Check if there are any rows returned
                                if ($resultdownload->num_rows > 0) {
                                    $downloadsFound = true;
                                    while ($rowdownload = $resultdownload->fetch_assoc()) {
                                        $lesson_id = $rowdownload['lesson_id'];
                                        $type = $rowdownload['lesson_type'];
                                        if ($type == 'worksheet') {
                                            $type = "ws";
                                        }
                                        if ($type == 'supplementary_note') {
                                            $type = "sn";
                                        }
                                        if ($type == 'quiz') {
                                            $type = "qz";
                                        }
                                        if ($type == 'performance_based_activity') {
                                            $type = "pb";
                                        }

                                ?>
                                        <?php
                                        // Sample code to calculate the time difference and format it as "X time ago"
                                        $downloadedDate = new DateTime($rowdownload['downloaded_date']); // Replace this with the actual download date
                                        $currentDate = new DateTime('now'); // Current date and time
                                        $interval = $currentDate->diff($downloadedDate);

                                        $years = $interval->y;
                                        $months = $interval->m;
                                        $days = $interval->d;
                                        $hours = $interval->h;
                                        $minutes = $interval->i;

                                        if ($years > 0) {
                                            $formattedTimeAgo = $years . " year" . ($years > 1 ? "s" : "") . " ago";
                                        } elseif ($months > 0) {
                                            $formattedTimeAgo = $months . " month" . ($months > 1 ? "s" : "") . " ago";
                                        } elseif ($days > 0) {
                                            $formattedTimeAgo = $days . " day" . ($days > 1 ? "s" : "") . " ago";
                                        } elseif ($hours > 0) {
                                            $formattedTimeAgo = $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
                                        } elseif ($minutes > 0) {
                                            $formattedTimeAgo = $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
                                        } else {
                                            $formattedTimeAgo = "Just now";
                                        }
                                        ?>



                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <div class="alert alert-white border border-1" role="alert">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-2">
                                                            <!-- Perfect Circular Thumbnail (Lesson Image) -->
                                                            <img src="assets/uploads/lesson/<?php echo $rowdownload['images']; ?>" class="img-thumbnail" alt="<?php echo $rowdownload['title']; ?>">
                                                        </div>

                                                        <div class="col-12 col-md-7">
                                                            <!-- Lesson Title -->
                                                            <h5 class="mb-0"><?php echo strtoupper($rowdownload['title']); ?></h5>
                                                            <!-- Downloaded Date -->
                                                            <p class="mb-0">Downloaded <?php echo $formattedTimeAgo; ?></p>

                                                        </div>

                                                        <div class="col-12 col-md-3 text-md-end mt-3 mt-md-0">
                                                            <!-- View Button -->
                                                            <a href="mind-booster-content?id=<?= $lesson_id ?>&type=<?= $type ?>" class="btn btn-primary btn-sm">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    }
                                }

                                ?>
                                <?php
                                $uid = $_SESSION['uid'];

                                $querymagdownload = "SELECT * FROM magazine m
                                    RIGHT JOIN magazine_download md
                                    ON m.magazine_id = md.magazine_id
                                    WHERE md.downloaded_by = '$uid'
                                    ORDER BY md.download_date DESC";
                                $resultmagdownload = $mysqli->query($querymagdownload);

                                // Check if there are any rows returned
                                if ($resultmagdownload->num_rows > 0) {

                                    while ($rowmagdownload = $resultmagdownload->fetch_assoc()) {
                                        $magazine_id = $rowmagdownload['magazine_id'];
                                        $publish_date = $rowmagdownload['publish_date'];
                                        $publish_year = date("Y", strtotime($publish_date));
                                        $downloadsFound = true;
                                ?>
                                        <?php
                                        // Sample code to calculate the time difference and format it as "X time ago"
                                        $downloadedDate = strtotime($rowmagdownload['download_date']); // Replace this with the actual download date
                                        $currentDate = strtotime('now'); // Current date and time
                                        $diff = $currentDate - $downloadedDate; // Calculate time difference in seconds

                                        $years = floor($diff / (365 * 60 * 60 * 24));
                                        $months = floor($diff / (30 * 60 * 60 * 24));
                                        $days = floor($diff / (60 * 60 * 24));
                                        $hours = floor($diff / (60 * 60));
                                        $minutes = floor($diff / 60);

                                        if ($years > 0) {
                                            $formattedTimeAgo = $years . " year" . ($years > 1 ? "s" : "") . " ago";
                                        } elseif ($months > 0) {
                                            $formattedTimeAgo = $months . " month" . ($months > 1 ? "s" : "") . " ago";
                                        } elseif ($days > 0) {
                                            $formattedTimeAgo = $days . " day" . ($days > 1 ? "s" : "") . " ago";
                                        } elseif ($hours > 0) {
                                            $formattedTimeAgo = $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
                                        } elseif ($minutes > 0) {
                                            $formattedTimeAgo = $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
                                        } else {
                                            $formattedTimeAgo = "Just now";
                                        }
                                        ?>


                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <div class="alert alert-white border border-1" role="alert">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-2">
                                                            <!-- Perfect Circular Thumbnail (Lesson Image) -->
                                                            <img src="assets/uploads/cover_images/<?php echo $rowmagdownload['cover_image_url']; ?>" class="img-thumbnail" alt="<?php echo $rowmagdownload['title']; ?>">
                                                        </div>

                                                        <div class="col-12 col-md-7">
                                                            <!-- Lesson Title -->
                                                            <h5 class="mb-0"><?php echo strtoupper($rowmagdownload['title']); ?></h5>
                                                            <!-- Downloaded Date -->
                                                            <p class="mb-0">Downloaded <?php echo $formattedTimeAgo; ?></p>
                                                        </div>

                                                        <div class="col-12 col-md-3 text-md-end mt-3 mt-md-0">
                                                            <!-- View Button -->
                                                            <a href="magazine?year=<?= $publish_year ?>" class="btn btn-primary btn-sm">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                    <?php
                                    }
                                }
                                if (!$downloadsFound) {
                                    // Handle case where there are no downloads to display.
                                    echo "No downloads found.";
                                }
                                if ($downloadsFound && $resultmagdownload->num_rows > 5) {
                                    ?> <div class="pagination d-flex justify-content-center mt-5">
                                        <button class="prev-btn btn btn-primary btn-sm rounded-circle mx-2" onclick="prevPage()"><i class="fa-solid fa-arrow-left"></i></button>
                                        <span class="page-num">Page <span id="currentPage">1</span> of <span id="totalPages">1</span></span>
                                        <button class="next-btn btn btn-primary btn-sm rounded-circle mx-2" onclick="nextPage()"><i class="fa-solid fa-arrow-right"></i></button>
                                    </div>
                                <?php } ?>
                            </div>



                            <div class="tab-pane fade" id="cassignment" role="tabpanel" aria-labelledby="cassignment-tab">
                                <!-- Parent Assignment Content -->
                                <h3 class="fw-bolder">Children Assignment</h3>

                                <?php
                                $uid = $_SESSION['uid'];

                                $query_assignment = "SELECT lesson_table.*, assign.assigned_by,assign.due_date, assign.uni_id,assign.assigned_to,user_table.full_name
                                                            FROM lesson_table 
                                                            INNER JOIN assign
                                                            ON lesson_table.lesson_id = assign.lesson_id INNER JOIN user_table 
                                                            ON  assign.assigned_to = user_table.uid
                                                            WHERE assign.assigned_by = '$uid'
                                                            ";

                                $result_assignment = $mysqli->query($query_assignment);
                                // echo $result_assignment;

                                // Check if there are any rows returned
                                if ($result_assignment->num_rows > 0) {
                                    while ($row_assignment = $result_assignment->fetch_assoc()) {
                                        $assignment_id = $row_assignment['uni_id'];
                                        $lesson_id = $row_assignment['lesson_id'];
                                        $title = strtoupper($row_assignment['title']);
                                        $image = $row_assignment['images'];
                                        $assigned_by = $row_assignment['assigned_by'];
                                        $due_date = $row_assignment['due_date'];
                                        $assigned_to = $row_assignment['assigned_to'];
                                        $user_name = $row_assignment['full_name'];

                                        // Output the assignment HTML
                                        $current_date = date('Y-m-d');
                                        $query_assignment1 = "select score_table.* from score_table inner join assign on score_table.user_id = assign.assigned_to where  score_table.lesson_id = $lesson_id and score_table.user_id = $assigned_to";
                                        $result_assignment1 = $mysqli->query($query_assignment1);
                                        if ($due_date < $current_date) {
                                            // Due date has passed
                                            $button_text = 'In Complete';
                                            // $button_class = 'btn-secondary';
                                            $button_class = 'btn-danger';
                                        } elseif ($result_assignment1->num_rows > 0) {
                                            $button_text = 'Completed';
                                            $button_class = 'btn-success';
                                        } else {
                                            // Due date is in the future or today
                                            $button_text = 'InProgress';
                                            // $button_class = 'btn-secondary';
                                            $button_class = 'btn-success';
                                            $button_url = '#'; // You can set it to '#' or any other appropriate URL
                                        }
                                ?>
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <div class="alert alert-white border border-1" role="alert">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-2">
                                                            <!-- Perfect Circular Thumbnail (Lesson Image) -->
                                                            <img src="assets/uploads/lesson/<?php echo $image; ?>" class="img-thumbnail" alt="<?php echo $title; ?>">
                                                        </div>
                                                        <div class="col-12 col-md-7">
                                                            <!-- Lesson Title -->
                                                            <h4 class="mb-2"><?php echo $user_name; ?> </h4>
                                                            <h5 class="mb-0"><?php echo $title; ?></h5>
                                                            <p class="mb-0">Due Date: <?php echo $due_date; ?></p>
                                                        </div>
                                                        <div class="col-12 col-md-3 text-md-end mt-3 mt-md-0">
                                                            <!-- View Button -->
                                                            <!-- <a href="<?php echo $button_url; ?>" class="btn btn-sm <?php echo $button_class; ?>"></a> -->
                                                            <a href="#" id="button_<?php echo $assignment_id; ?>" class="btn btn-sm <?php echo $button_class; ?> " onclick=""><?php echo $button_text; ?></a>
                                                            <a href="#" id="button_<?php echo $assignment_id; ?>" class="btn btn-sm btn-primary" onclick="openReassignModal('<?php echo $assigned_to; ?>','<?php echo $user_name; ?>','<?php echo $assignment_id; ?>')">Update</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                    } // end of while loop
                                } else {
                                    // No assignments found
                                    echo '<p>No assignments found</p>';
                                }
                                ?>


                            </div>






                            <!-- Assignment tab  -->
                            <div class="tab-pane fade" id="assignment" role="tabpanel" aria-labelledby="assignment-tab">
                                <!-- Parent Assignment Content -->
                                <h3 class="fw-bolder">Parent Assignment</h3>

                                <?php
                                // Sanitize user input to prevent SQL injection
                                $uid = $mysqli->real_escape_string($_SESSION['uid']);

                                // Query assignments
                                $query_assignment = "SELECT lesson_table.*, assign.assigned_by,assign.due_date,assign.assigned_to
                                                            FROM lesson_table 
                                                            INNER JOIN assign ON lesson_table.lesson_id = assign.lesson_id
                                                            WHERE assign.assigned_to = '$uid'";
                                $result_assignment = $mysqli->query($query_assignment);

                                // Check for errors
                                if (!$result_assignment) {
                                    // Handle query error
                                    echo "Error: " . $mysqli->error;
                                } else {
                                    // Check if there are any rows returned

                                    if ($result_assignment->num_rows > 0) {
                                        while ($row_assignment = $result_assignment->fetch_assoc()) {
                                            // Extract assignment data
                                            $lesson_id = $row_assignment['lesson_id'];
                                            $title = strtoupper($row_assignment['title']);
                                            $image = $row_assignment['images'];
                                            $assigned_by = $row_assignment['assigned_by'];
                                            $assigned_to = $row_assignment['assigned_to'];
                                            $due_date = $row_assignment['due_date'];

                                            // Format due date if needed
                                            // $formatted_due_date = date('F j, Y', strtotime($due_date));

                                            // Determine button properties based on due date
                                            $current_date = date('Y-m-d');
                                            $query_assignment1 = "select score_table.* from score_table inner join assign on score_table.user_id = assign.assigned_to where  score_table.lesson_id = $lesson_id and score_table.user_id = $assigned_to";
                                            $result_assignment1 = $mysqli->query($query_assignment1);
                                            // var_dump($result_assignment1->num_rows);
                                            if ($due_date >= $current_date && $result_assignment1->num_rows < 0) {
                                                // Due date is in the future or today
                                                $button_text = 'Do it Online';
                                                $button_class = 'btn-primary';
                                                $button_url = 'test_online?lesson_id=' . $lesson_id;
                                            } elseif ($result_assignment1->num_rows > 0) {
                                                $button_text = 'Completed';
                                                $button_class = 'btn-success';
                                            } else {
                                                // Due date has passed
                                                $button_text = 'Incomplete';
                                                $button_class = 'btn-secondary';
                                                $button_url = '#'; // You can set it to '#' or any other appropriate URL
                                            }
                                ?>
                                            <div class="row mb-3">
                                                <div class="col-12">
                                                    <div class="alert alert-white border border-1" role="alert">
                                                        <div class="row align-items-center">
                                                            <div class="col-12 col-md-2">
                                                                <!-- Perfect Circular Thumbnail (Lesson Image) -->
                                                                <img src="assets/uploads/lesson/<?php echo $image; ?>" class="img-thumbnail" alt="<?php echo $title; ?>">
                                                            </div>
                                                            <div class="col-12 col-md-7">
                                                                <!-- Lesson Title -->
                                                                <h5 class="mb-0"><?php echo $title; ?></h5>
                                                                <!-- Due Date -->
                                                                <p class="mb-0">Due Date: <?php echo $due_date; ?></p>
                                                            </div>
                                                            <div class="col-12 col-md-3 text-md-end mt-3 mt-md-0">
                                                                <!-- View Button -->
                                                                <a href="<?php echo $button_url; ?>" class="btn btn-sm <?php echo $button_class; ?>"><?php echo $button_text; ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <?php
                                        } // end of while loop
                                    } else {
                                        // No assignments found
                                        echo '<p>No assignments found.</p>';
                                    }
                                }
                                ?>
                            </div>








                            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                                <!-- History Settings Content -->
                                <h3>History</h3> <!-- Timeline -->
                                <!--<div class="timeline">-->

                                <!--    <div class="timeline-line"></div>-->
                                <!--    <div class="timeline-item">-->
                                <!--        <div class="timeline-dot"></div> -->
                                <!--        <div>-->
                                <!--            <p class="timeline-date">January 2022</p>-->
                                <!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                <!--        </div>-->
                                <!--    </div> -->
                                <!--    <div class="timeline-item">-->
                                <!--        <div class="timeline-dot"></div> -->
                                <!--        <div>-->
                                <!--            <p class="timeline-date">February 2022</p>-->
                                <!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                <!--        </div>-->
                                <!--        <div class="timeline-line"></div>-->
                                <!--    </div>-->

                                <!--    <div class="timeline-item">-->
                                <!--        <div class="timeline-dot"></div> -->
                                <!--        <div>-->
                                <!--            <p class="timeline-date">February 2022</p>-->
                                <!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                <!--        </div>-->
                                <!--        <div class="timeline-line"></div>-->
                                <!--    </div>-->

                                <!--    <div class="timeline-item">-->
                                <!--        <div class="timeline-dot"></div> -->
                                <!--        <div>-->
                                <!--            <p class="timeline-date">February 2022</p>-->
                                <!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                <!--        </div>-->
                                <!--        <div class="timeline-line"></div>-->
                                <!--    </div>-->

                                <!--    <div class="timeline-item">-->
                                <!--        <div class="timeline-dot"></div> -->
                                <!--        <div>-->
                                <!--            <p class="timeline-date">February 2022</p>-->
                                <!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>-->
                                <!--        </div>-->

                                <!--    </div> -->
                                <!--</div>-->
                                <!--<div class="d-flex justify-content-end">-->
                                <!--    <a class="nav-link text-primary" href=""><i class="fa-solid fa-trash-can"></i> Clear history</a>-->
                                <!--</div>-->

                                <?php
                                $uid = $_SESSION['uid'];

                                $queryvideo_view = "SELECT * FROM videos A join video_view B on A.video_id=B.video_id where B.viewer_id = '$uid' and B.status=0
                                    ORDER BY B.view_date DESC";
                                $resultvideo_view = $mysqli->query($queryvideo_view);
                                $viewsFound = false;
                                // Check if there are any rows returned
                                if ($resultvideo_view->num_rows > 0) {

                                    while ($rowvideo_view = $resultvideo_view->fetch_assoc()) {
                                        // var_dump($rowvideo_view);
                                        // exit;
                                        $magazine_id = $rowvideo_view['video_id'];

                                        $video_category_id = $rowvideo_view['video_category_id'];
                                        $publish_date = $rowvideo_view['view_date'];
                                        $publish_year = date("Y", strtotime($publish_date));
                                        $viewsFound = true;
                                ?>
                                        <?php
                                        // Sample code to calculate the time difference and format it as "X time ago"
                                        $downloadedDate = strtotime($rowvideo_view['view_date']); // Replace this with the actual download date
                                        $currentDate = strtotime('now'); // Current date and time
                                        $diff = $currentDate - $downloadedDate; // Calculate time difference in seconds

                                        $years = floor($diff / (365 * 60 * 60 * 24));
                                        $months = floor($diff / (30 * 60 * 60 * 24));
                                        $days = floor($diff / (60 * 60 * 24));
                                        $hours = floor($diff / (60 * 60));
                                        $minutes = floor($diff / 60);

                                        if ($years > 0) {
                                            $formattedTimeAgo = $years . " year" . ($years > 1 ? "s" : "") . " ago";
                                        } elseif ($months > 0) {
                                            $formattedTimeAgo = $months . " month" . ($months > 1 ? "s" : "") . " ago";
                                        } elseif ($days > 0) {
                                            $formattedTimeAgo = $days . " day" . ($days > 1 ? "s" : "") . " ago";
                                        } elseif ($hours > 0) {
                                            $formattedTimeAgo = $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
                                        } elseif ($minutes > 0) {
                                            $formattedTimeAgo = $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
                                        } else {
                                            $formattedTimeAgo = "Just now";
                                        }
                                        ?>


                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <div class="alert alert-white border border-1" role="alert">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-2">
                                                            <!-- Perfect Circular Thumbnail (Lesson Image) -->
                                                            <img src="assets/uploads/video_images/<?php echo $rowvideo_view['video_thumbnail']; ?>" class="img-thumbnail" alt="<?php echo $rowvideo_view['video_title']; ?>">
                                                        </div>

                                                        <div class="col-12 col-md-7">
                                                            <!-- Lesson Title -->
                                                            <h5 class="mb-0"><?php echo strtoupper($rowvideo_view['video_title']); ?></h5>
                                                            <!-- Downloaded Date -->
                                                            <p class="mb-0">Viewed <?php echo $formattedTimeAgo; ?></p>
                                                        </div>

                                                        <div class="col-12 col-md-3 text-md-end mt-3 mt-md-0">
                                                            <!-- View Button -->
                                                            <a href="play-video?id=<?= $magazine_id ?>&category_id=<?= $video_category_id ?>" class="btn btn-primary btn-sm">View</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                    <?php
                                    }
                                }
                                if (!$viewsFound) {
                                    // Handle case where there are no downloads to display.
                                    echo "No views found.";
                                } else {

                                    ?>

                                    <div class="d-flex justify-content-end">
                                        <a class="nav-link text-primary" href="#" onclick="clearHistory()"><i class="fa-solid fa-trash-can"></i> Clear history</a>
                                    </div>

                                <?php
                                }
                                if ($viewsFound && $resultvideo_view->num_rows > 5) {
                                ?> <div class="pagination d-flex justify-content-center mt-5">
                                        <button class="prev-btn btn btn-primary btn-sm rounded-circle mx-2" onclick="prevPagev()"><i class="fa-solid fa-arrow-left"></i></button>
                                        <span class="page-num">Page <span id="currentPagev">1</span> of <span id="totalPagesv">1</span></span>
                                        <button class="next-btn btn btn-primary btn-sm rounded-circle mx-2" onclick="nextPagev()"><i class="fa-solid fa-arrow-right"></i></button>
                                    </div>
                                    <script>
                                        showPagev(currentPage);
                                        document.getElementById("totalPages").textContent = totalPages;
                                        document.getElementById("totalPagesv").textContent = totalPagesv;
                                    </script>

                                <?php }

                                ?>



                            </div>



                            <div class="tab-pane fade" id="Voucher" role="tabpanel" aria-labelledby="Voucher-tab">
                                <h3 class="fw-bolder">Voucher</h3>

                                <div class="tab-pane">
                                    <div class="row mt-5 mb-4">
                                        <div class="col-md-12">
                                            <h4>Active Voucher</h4>
                                        </div>
                                    </div>
                                    <div class="col">

                                        <div class="row-md-4">
                                            <div class="row mb-3">
                                                <div class="col-12">
                                                    <div class="alert alert-white " role="alert">
                                                        <div class="row align-items-center">

                                                            <div class="col-12 col-md-7">
                                                                <!-- Lesson Title -->
                                                                <!-- <h5 class="mb-0 fw-bolder">Bahasa Inggeris</h5> -->
                                                                <img src="./assets/images/badges/Group 989.png" alt="">

                                                            </div>

                                                            <div class="col-12 col-md-5 text-md-end mt-3 mt-md-0">
                                                                <!-- <strong>Monday, 8 April 2024 | 8.30 pm</strong> -->

                                                                <img src="./assets/images/badges/Group 9899.png" alt="">
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row mt-5 mb-4">
                                            <div class="col-md-12">
                                                <h4>Past Voucher</h4>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-12">
                                                <!-- <div class="alert alert-white border border-1" role="alert"> -->
                                                <div class="row align-items-center">
                                                    <div class="col-8 col-md-2">
                                                        <!-- Perfect Circular Thumbnail (Lesson Image) -->
                                                        <img src="assets/images/badges/Group 995.png">
                                                    </div>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                            <div class="col-12 mt-4">
                                                <!-- <div class="alert alert-white border border-1" role="alert"> -->
                                                <div class="row align-items-center">
                                                    <div class="col-8 col-md-2">
                                                        <!-- Perfect Circular Thumbnail (Lesson Image) -->
                                                        <img src="assets/images/badges/Group 995.png">
                                                    </div>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                            <div class="col-12 mt-4">
                                                <!-- <div class="alert alert-white border border-1" role="alert"> -->
                                                <div class="row align-items-center">
                                                    <div class="col-8 col-md-2">
                                                        <!-- Perfect Circular Thumbnail (Lesson Image) -->
                                                        <img src="assets/images/badges/Group 995.png">
                                                    </div>
                                                </div>
                                                <!-- </div> -->
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="progresstracker" role="tabpanel" aria-labelledby="progress-tracker">
                                <h3 class="fw-bolder">Progress Tracker</h3>


                                <?php if ($role == 4) {
                                ?>
                                    <!-- Magazine Section -->
                                    <div class="tab-pane container">
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <h4>Magazine</h4>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <?php
                                            $query_badge = "SELECT * FROM badge_table WHERE  badge_category = 'Magazine' AND status=1";
                                            $result_badge = $mysqli->query($query_badge);

                                            // Check if badge query was successful
                                            if ($result_badge->num_rows > 0) {
                                                // Fetch the badge information
                                                while ($badge_row = $result_badge->fetch_assoc()) {

                                                    $badgeName = $badge_row['badge_title'];
                                                    $imagePath = $badge_row['badge_image'];
                                                    $level = $badge_row['badge_level'];
                                                    $uid = $_SESSION['uid'];
                                                    $query1 = "select count(*) as count from review where uid = $uid ";
                                                    $result = $mysqli->query($query1);
                                                    $row = $result->fetch_assoc();
                                                    $count = $row['count'];
                                                    if ($level == 1) {

                                                        if ($count == 0) {
                                                            $blurClass = 'blur-overlay';
                                                        } else {
                                                            $blurClass = '';
                                                        }
                                                    } else if ($level == 2) {
                                                        if ($count < 12) {
                                                            $blurClass = 'blur-overlay';
                                                        } else {
                                                            $blurClass = '';
                                                        }
                                                    }

                                            ?>

                                                    <div class="col-md-3 mb-4">
                                                        <!-- Container for Photo 1 -->
                                                        <div class="image-container d-flex flex-column align-items-center">
                                                            <!-- Photo 1 -->
                                                            <div class="hoverable-image">
                                                                <img src="<?= BASE_URL ?>/assets/uploads/badges/<?php echo $imagePath; ?>" alt="Photo 1" class="img-fluid">
                                                                <div class="image-text align-items-center text-center"><small><?php echo $badgeName; ?> </small></div>
                                                                <div class="<?php echo $blurClass; ?>"></div>
                                                            </div>
                                                            <!-- Card to display on hover -->
                                                            <div class="hover-card">
                                                                <div class="row pb-md-1">
                                                                    <div class="col-6">
                                                                        <img src="<?= BASE_URL ?>/assets/uploads/badges/<?php echo $imagePath; ?>" alt="Photo 2" class="img-fluid">
                                                                    </div>
                                                                    <div class="col-6 d-flex align-items-center">
                                                                        <h5><?php echo $badgeName; ?></h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <?php if ($count == 0 && $level == 1) { ?>
                                                                            <p style="font-weight: lighter;">Read 1 magazine to<br> achieve this badge</p>
                                                                        <?php } else if ($count >= 1 && $level == 1) { ?>
                                                                            <p style="font-weight: lighter;">Congratulations <br> you achieved this badge</p>
                                                                        <?php } else if ($count < 12 && $level == 2) {
                                                                        ?>
                                                                            <p style="font-weight: lighter;">Read all 12 magazines for this year to<br> achieve this badge</p>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <!-- <progress role="progressbar" value="65" max="100" style="width: 300px;"></progress> -->
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <small class="small-light"><?php echo $count ?>/12 magazine completed - <?php echo 12 - $count ?> more to go!</small>
                                                                                </div>
                                                                            </div>
                                                                        <?php
                                                                        } else if ($count >= 12 && $level == 2) {
                                                                        ?>
                                                                            <p style="font-weight: lighter;">Read all 12 magazines for this year to<br> achieve this badge</p>
                                                                            <p style="font-weight: lighter;">Congratulations <br> you achieved this badge</p>
                                                                        <?php
                                                                        }
                                                                        ?>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                                //  echo $imagePath;
                                            } else {
                                                // Error handling for badge query
                                                echo "No Badges Provided";
                                            }



                                            ?>



                                        </div>
                                    </div>

                                <?php } ?>
                                <!-- MindBooster Section -->
                                <div class="tab-pane container">
                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <h4>MindBooster</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php
                                        if ($role == 4) {
                                            $query_badge = "SELECT * FROM badge_table WHERE badge_category = 'Mindbooster' AND badge_to = 'student' AND status=1 ";
                                            $result_badge = $mysqli->query($query_badge);
                                        } else if ($role == 2) {
                                            $query_badge  = "SELECT * FROM badge_table WHERE badge_category = 'Mindbooster' AND badge_to = 'teacher' AND status=1";
                                            $result_badge = $mysqli->query($query_badge);
                                        } else if ($role == 3) {
                                            $query_badge  = "SELECT * FROM badge_table WHERE badge_category = 'Mindbooster' AND badge_to = 'parent' AND status=1";
                                            $result_badge = $mysqli->query($query_badge);
                                        }
                                        // Check if badge query was successful
                                        if ($result_badge->num_rows > 0) {
                                            // Fetch the badge information
                                            while ($badge_row = $result_badge->fetch_assoc()) {
                                                // var_dump($badge_row);
                                                // exit;
                                                $badgeName = $badge_row['badge_title'];
                                                $imagePath = $badge_row['badge_image'];
                                                $level = $badge_row['badge_level'];
                                                $badgeto = $badge_row['badge_to'];
                                                $uid = $_SESSION['uid'];
                                                $query1 = "SELECT COUNT(DISTINCT lesson_id) as s_count FROM `score_table` WHERE user_id = $uid; ";
                                                $result = $mysqli->query($query1);
                                                $row = $result->fetch_assoc();
                                                $s_count = $row['s_count'];
                                                $query2 = "SELECT COUNT(worksheet) as w_count FROM `lesson_table`";
                                                $result2 = $mysqli->query($query2);
                                                $row2 = $result2->fetch_assoc();
                                                $w_count = $row2['w_count'];
                                                $query3 = "select COUNT(DISTINCT material) as t_count FROM `teacher_material` WHERE created_by=$uid";
                                                $result3 = $mysqli->query($query3);
                                                $row3 = $result3->fetch_assoc();
                                                $t_count = $row3['t_count'];
                                                $query4 = "select COUNT(action) as p_count FROM `assign` WHERE assigned_by=$uid";
                                                $result4 = $mysqli->query($query4);
                                                $row4 = $result4->fetch_assoc();
                                                $p_count = $row4['p_count'];
                                                if ($level == 1 && $badgeto == 'student') {
                                                    if ($s_count == 0) {
                                                        $blurClass = 'blur-overlay';
                                                    } else {
                                                        $blurClass = '';
                                                    }
                                                } else if ($level == 2 && $badgeto == 'student') {
                                                    if ($s_count < 10) {
                                                        $blurClass = 'blur-overlay';
                                                    } else {
                                                        $blurClass = '';
                                                    }
                                                } else if ($level == 3 && $badgeto == 'student') {
                                                    if ($s_count < 50) {
                                                        $blurClass = 'blur-overlay';
                                                    } else {
                                                        $blurClass = '';
                                                    }
                                                } else if ($level == 4 && $badgeto == 'student') {
                                                    if ($s_count == $w_count) {
                                                        $blurClass = '';
                                                    } else {
                                                        $blurClass = 'blur-overlay';
                                                    }
                                                } else if ($level == 1 && $badgeto == 'teacher') {
                                                    if ($t_count < 50) {
                                                        $blurClass = 'blur-overlay';
                                                    } else {
                                                        $blurClass = '';
                                                    }
                                                } else if ($level == 2 && $badgeto == 'teacher') {
                                                    if ($t_count < 150) {
                                                        $blurClass = 'blur-overlay';
                                                    } else {
                                                        $blurClass = '';
                                                    }
                                                } else if ($level == 3 && $badgeto == 'teacher') {
                                                    if ($t_count < 300) {
                                                        $blurClass = 'blur-overlay';
                                                    } else {
                                                        $blurClass = '';
                                                    }
                                                } else if ($level == 1 && $badgeto == 'parent') {
                                                    if ($p_count < 50) {
                                                        $blurClass = 'blur-overlay';
                                                    } else {
                                                        $blurClass = '';
                                                    }
                                                } else if ($level == 2 && $badgeto == 'parent') {
                                                    if ($p_count < 150) {
                                                        $blurClass = 'blur-overlay';
                                                    } else {
                                                        $blurClass = '';
                                                    }
                                                } else if ($level == 3 && $badgeto == 'parent') {
                                                    if ($p_count < 300) {
                                                        $blurClass = 'blur-overlay';
                                                    } else {
                                                        $blurClass = '';
                                                    }
                                                }
                                        ?>
                                                <div class="col-md-3 mb-4">
                                                    <!-- Container for Photo 1 -->
                                                    <div class="image-container d-flex flex-column align-items-center">
                                                        <!-- Photo 1 -->
                                                        <div class="hoverable-image">
                                                            <img src="<?= BASE_URL ?>/assets/uploads/badges/<?php echo $imagePath; ?>" alt="Photo 1" class="img-fluid">
                                                            <div class="image-text text-center"><small><?php echo $badgeName; ?> </small></div>
                                                            <div class="<?php echo $blurClass; ?>"></div>
                                                        </div>
                                                        <!-- Card to display on hover -->
                                                        <div class="hover-card">
                                                            <div class="row pb-md-1">
                                                                <div class="col-6">
                                                                    <img src="<?= BASE_URL ?>/assets/uploads/badges/<?php echo $imagePath; ?>" alt="Photo 2" class="img-fluid">
                                                                </div>
                                                                <div class="col-6 d-flex align-items-center">
                                                                    <h5><?php echo $badgeName; ?></h5>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <?php if ($s_count == 0 && $level == 1 && $badgeto == 'student') { ?>
                                                                        <p style="font-weight: lighter;">complete 1 worksheet to<br> achieve this badge</p>
                                                                    <?php } else if ($s_count >= 1 && $level == 1 && $badgeto == 'student') { ?>
                                                                        <p style="font-weight: lighter;">Congratulations <br> you achieved this badge</p>
                                                                    <?php } else if ($s_count < 10 && $level == 2 && $badgeto == 'student') { ?>
                                                                        <p style="font-weight: lighter;">complete 10 Worksheet to<br> achieve this badge</p>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <!-- <progress role="progressbar" value="65" max="100" style="width: 300px;"></progress> -->
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <small class="small-light"><?php echo $count ?>/10 worksheet completed - <?php echo 10 - $count ?> more to go!</small>
                                                                            </div>
                                                                        </div>
                                                                    <?php } else if ($s_count == 10 && $level == 2 && $badgeto == 'student') { ?>
                                                                        <p style="font-weight: lighter;">Congratulations <br> you achieved this badge</p>
                                                                    <?php } else if ($s_count < 50 && $level == 3 && $badgeto == 'student') { ?>
                                                                        <!-- Add your logic here for level 3 -->
                                                                        <p style="font-weight: lighter;">complete 50 Worksheet to<br> achieve this badge</p>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <small class="small-light"><?php echo $s_count ?>/50 worksheet completed - <?php echo 50 - $s_count ?> more to go!</small>
                                                                            </div>
                                                                        </div>
                                                                    <?php } else if ($s_count == 50 && $level == 3 && $badgeto == 'student') { ?>
                                                                        <p style="font-weight: lighter;">Congratulations <br> you achieved this badge</p>
                                                                    <?php } else if ($s_count < $w_count && $level == 4 && $badgeto == 'student') { ?>
                                                                        <p style="font-weight: lighter;">complete ALL Worksheet to<br> achieve this badge</p>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <small class="small-light"><?php echo $s_count . '/' . $w_count ?> worksheet completed - <?php echo $w_count - $s_count ?> more to go!</small>

                                                                            </div>
                                                                        </div>
                                                                    <?php } else if ($s_count == $w_count && $level == 4 && $badgeto == 'student') { ?>
                                                                        <p style="font-weight: lighter;">Congratulations <br> you achieved this badge</p>
                                                                    <?php } else if ($level == 1 && $t_count < 50 && $badgeto == 'teacher') { ?>
                                                                        <p style="font-weight: lighter;">complete 50 worksheet to<br> achieve this badge</p>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <small class="small-light"><?php echo $t_count . '/' . 50 ?> worksheet Assign - <?php echo 50 - $t_count ?> more to go!</small>

                                                                            </div>
                                                                        </div>
                                                                    <?php } else if ($level == 1 && $t_count == 50 && $badgeto == 'teacher') { ?>
                                                                        <p style="font-weight: lighter;">Congratulations <br> you achieved this badge</p>
                                                                    <?php } else if ($level == 2 && $t_count < 150 && $badgeto == 'teacher') { ?>
                                                                        <p style="font-weight: lighter;">share 150 worksheet to<br> achieve this badge</p>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <small class="small-light"><?php echo $t_count . '/' . 150 ?> worksheet Assign - <?php echo 150 - $t_count ?> more to go!</small>

                                                                            </div>
                                                                        </div> <?php } else if ($level == 2 && $t_count == 150 && $badgeto == 'teacher') { ?>
                                                                        <p style="font-weight: lighter;">Congratulations <br> you achieved this badge</p>
                                                                    <?php } else if ($level == 3 && $t_count < 300 && $badgeto == 'teacher') { ?>
                                                                        <p style="font-weight: lighter;">share 300 worksheet to<br> achieve this badge</p>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <small class="small-light"><?php echo $t_count . '/' . 300 ?> worksheet Assign - <?php echo 300 - $t_count ?> more to go!</small>

                                                                            </div>
                                                                        </div> <?php } else if ($level == 3 && $t_count == 300 && $badgeto == 'teacher') { ?>
                                                                        <p style="font-weight: lighter;">Congratulations <br> you achieved this badge</p>
                                                                    <?php } else if ($level == 3 && $t_count < 300 && $badgeto == 'teacher') { ?>
                                                                        <p style="font-weight: lighter;">share 300 worksheet to<br> achieve this badge</p>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <small class="small-light"><?php echo $t_count . '/' . 300 ?> worksheet Assign - <?php echo 300 - $t_count ?> more to go!</small>

                                                                            </div>
                                                                        </div> <?php } else if ($level == 1 && $p_count == 50 && $badgeto == 'parent') { ?>
                                                                        <p style="font-weight: lighter;">Congratulations <br> you achieved this badge</p>
                                                                    <?php } else if ($level == 1 && $p_count < 50 && $badgeto == 'parent') { ?>
                                                                        <p style="font-weight: lighter;">Assign 50 worksheet to<br> achieve this badge</p>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <small class="small-light"><?php echo $p_count . '/' . 50 ?> worksheet Assign - <?php echo 50 - $p_count ?> more to go!</small>

                                                                            </div>
                                                                        </div> <?php } else if ($level == 2 && $p_count == 150 && $badgeto == 'parent') { ?>
                                                                        <p style="font-weight: lighter;">Congratulations <br> you achieved this badge</p>
                                                                    <?php } else if ($level == 2 && $p_count < 150 && $badgeto == 'parent') { ?>
                                                                        <p style="font-weight: lighter;">Assign 150 worksheet to<br> achieve this badge</p>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <small class="small-light"><?php echo $p_count . '/' . 150 ?> worksheet Assign - <?php echo 150 - $p_count ?> more to go!</small>

                                                                            </div>
                                                                        </div> <?php } else if ($level == 3 && $p_count == 300 && $badgeto == 'parent') { ?>
                                                                        <p style="font-weight: lighter;">Congratulations <br> you achieved this badge</p>
                                                                    <?php } else if ($level == 3 && $p_count < 300 && $badgeto == 'parent') { ?>
                                                                        <p style="font-weight: lighter;">Assign 300 worksheet to<br> achieve this badge</p>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <small class="small-light"><?php echo $p_count . '/' . 300 ?> worksheet Assign - <?php echo 300 - $p_count ?> more to go!</small>

                                                                            </div>
                                                                        </div> <?php }  ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        } else {
                                            // Error handling for badge query
                                            echo "No Badges Provided";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <?php if ($role == 4) { ?>

                                    <div class="tab-pane container">
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <h4>Loops</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 mb-4">
                                                <!-- Container for Photo 1 -->
                                                <div class="image-container d-flex flex-column align-items-center">
                                                    <!-- Photo 1 -->
                                                    <img src="assets/images/badges/Asset 29 2 1.png" alt="Photo 1" class="img-fluid">
                                                    <!-- Text below Photo 1 -->
                                                    <div class="image-text"><small>Little Jambori Explorer</small></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <!-- Container for Photo 2 -->
                                                <div class="image-container d-flex flex-column align-items-center">
                                                    <!-- Photo 2 -->
                                                    <img src="assets/images/badges/Asset 29 2 1.png" alt="Photo 2" class="img-fluid">
                                                    <!-- Text below Photo 2 -->
                                                    <div class="image-text align-items-center text-center"><small>Uncle Roger’s Cousin</small></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <!-- Container for Photo 3 -->
                                                <div class="image-container d-flex flex-column align-items-center">
                                                    <!-- Photo 3 -->
                                                    <img src="assets/images/badges/Asset 29 2 1.png" alt="Photo 3" class="img-fluid">
                                                    <!-- Text below Photo 3 -->
                                                    <div class="image-text align-items-center text-center"><small>Uncle Roger’s Cousin</small></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mb-4">
                                                <!-- Container for Photo 4 -->
                                                <div class="image-container d-flex flex-column align-items-center">
                                                    <!-- Photo 4 -->
                                                    <img src="assets/images/badges/Asset 29 2 1.png" alt="Photo 4" class="img-fluid">
                                                    <!-- Text below Photo 4 -->
                                                    <div class="image-text align-items-center text-center"><small>Puzzle Master</small></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                        <?php } ?>
                        </div>
                        <!-- Tutor -->
                        <?php
                        // session_start(); 

                        // Include the database connection configuration
                        include_once 'config/connection.php';

                        // Get the tutor ID from the session
                        $uid = $_SESSION['uid'];

                        // Fetch the data from the bookings table
                        $query = $mysqli->prepare("SELECT booking_id, child_name, from_date, to_date, slot, subject, location, price, status FROM bookings WHERE tutor_id = ? AND status in (0,1,2,3)");
                        $query->bind_param("i", $uid);
                        $query->execute();
                        $query->bind_result($bookingId, $childName, $fromDate, $toDate, $slot, $subject, $location, $price, $status);

                        $bookedClasses = [];
                        while ($query->fetch()) {
                            $bookedClasses[] = [
                                'booking_id' => $bookingId,
                                'childName' => $childName,
                                'fromDate' => $fromDate,
                                'toDate' => $toDate,
                                'slot' => $slot,
                                'subject' => $subject,
                                'location' => $location,
                                'price' => $price,
                                'status' => $status
                            ];
                        }

                        // $query->close();
                        // $mysqli->close();
                        ?>
                        <?php if ($role == 3) { ?>

                            <!-- HTML Code to Display the Data -->
                            <div class="tab-pane fade" id="Tutor" role="tabpanel" aria-labelledby="Tutor">
                                <h3 class="fw-bolder">Tutor</h3>
                                <div class="tab-pane">
                                    <div class="row mt-5 mb-4">
                                        <div class="col-md-12">
                                            <h4>Booked class</h4>
                                        </div>
                                    </div>
                                    <?php foreach ($bookedClasses as $class) : ?>
                                        <div class="col">
                                            <div class="row-md-4">
                                                <div class="row mb-3">
                                                    <div class="col-12">
                                                        <div class="alert alert-white border border-1" role="alert">
                                                            <div class="row align-items-center" style="margin-left: 20px;">
                                                                <div class="col-12 col-md-7">
                                                                    <!-- Lesson Title -->
                                                                    <h5 class="mb-0 fw-bolder"><?= htmlspecialchars($class['subject']) ?></h5>
                                                                </div>
                                                                <div class="col-12 col-md-5 text-md-end mt-3 mt-md-0">
                                                                    <strong><?= htmlspecialchars($class['fromDate']) ?> to <?= htmlspecialchars($class['toDate']) ?> | <?= htmlspecialchars($class['slot']) ?></strong>
                                                                </div>
                                                                <div class="col-12 col-md-7 mt-2">
                                                                    <p class="mb-0">Child Name: <?= htmlspecialchars($class['childName']) ?></p>
                                                                    <p class="mb-0">Location: <?= htmlspecialchars($class['location']) ?></p>
                                                                    <p class="mb-0">Fee: RM <?= htmlspecialchars($class['price']) ?></p>
                                                                </div>
                                                                <div class="col-12 mt-2">
                                                                    <?php if ($class['status'] == 0) : ?>
                                                                        <button type="button" class="btn btn-success me-2 update-status" data-bookingid="<?= htmlspecialchars($class['booking_id']) ?>" data-status="1" onclick="showPaymentModal()">Interested</button>
                                                                        <button type="button" class="btn btn-danger update-status" data-bookingid="<?= htmlspecialchars($class['booking_id']) ?>" data-status="2">Not Interested</button>
                                                                    <?php elseif ($class['status'] == 1) : ?>
                                                                        <p class="text-success fw-bold">Waiting For Parents Confirmation</p>
                                                                    <?php elseif ($class['status'] == 2) : ?>
                                                                        <p class="text-danger fw-bold">You rejected</p>
                                                                    <?php elseif ($class['status'] == 3) : ?>
                                                                        <!-- <P class="text-success fw-bold">Schedual Class</p>  -->
                                                                        <button type="button" class="btn btn-primary create-class" data-bookingid="<?= htmlspecialchars($class['booking_id']) ?>">Create Class</button>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Modal HTML -->
                        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="paymentModalLabel">Payment Status</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Waiting for Payment
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            function showPaymentModal() {
                                var paymentModal = new bootstrap.Modal(document.getElementById('paymentModal'), {
                                    keyboard: false
                                });
                                paymentModal.show();
                            }
                        </script>

                        <!-- your booking -->

                        <?php
                        // include_once 'config/connection.php';
                        $uid = $_SESSION['uid'];

                        // Fetch the data from the bookings table and join with user_table
                        $query = $mysqli->prepare("
    SELECT 
        b.booking_id, b.child_name, b.child_id, b.tutor_id, b.from_date, b.to_date, b.slot, 
        b.subject, b.location, b.price, b.status, b.category, b.selected_day,
        u.uid, u.username, u.full_name, u.email, u.user_vcode, u.user_status, 
        u.mobile, u.password, u.profile_pic, u.status AS user_status, u.token_id, 
        u.verifiedEmail, u.security_code, u.created_date, u.updated_date, 
        u.deleted_date, u.role_id
    FROM 
        bookings b
    JOIN 
        user_table u ON b.parent_id = u.uid
    WHERE 
        b.parent_id = ?
");

                        $query->bind_param("i", $uid);
                        $query->execute();
                        $query->bind_result(
                            $bookingId,
                            $childName,
                            $childId,
                            $tutorId,
                            $fromDate,
                            $toDate,
                            $slot,
                            $subject,
                            $location,
                            $price,
                            $status,
                            $category,
                            $selectedDay,
                            $userId,
                            $username,
                            $fullName,
                            $email,
                            $userVcode,
                            $userStatus,
                            $mobile,
                            $password,
                            $profilePic,
                            $ustatus,
                            $tokenId,
                            $verifiedEmail,
                            $securityCode,
                            $createdDate,
                            $updatedDate,
                            $deletedDate,
                            $roleId
                        );

                        $bookedClasses = [];
                        while ($query->fetch()) {
                            $bookedClasses[] = [
                                'booking_id' => $bookingId,
                                'childName' => $childName,
                                'child_id' => $childId,
                                'tutor_id' => $tutorId,
                                'fromDate' => $fromDate,
                                'toDate' => $toDate,
                                'slot' => $slot,
                                'subject' => $subject,
                                'location' => $location,
                                'price' => $price,
                                'status' => $status,
                                'category' => $category,
                                'selectedDay' => $selectedDay,
                                'user' => [
                                    'uid' => $userId,
                                    'username' => $username,
                                    'fullName' => $fullName,
                                    'email' => $email,
                                    'userVcode' => $userVcode,
                                    'userStatus' => $userStatus,
                                    'mobile' => $mobile,
                                    'password' => $password,
                                    'profilePic' => $profilePic,
                                    'status' => $ustatus,
                                    'tokenId' => $tokenId,
                                    'verifiedEmail' => $verifiedEmail,
                                    'securityCode' => $securityCode,
                                    'createdDate' => $createdDate,
                                    'updatedDate' => $updatedDate,
                                    'deletedDate' => $deletedDate,
                                    'roleId' => $roleId
                                ]
                            ];
                        }

                        // $query->close();
                        // $mysqli->close();
                        ?>
                        <?php if ($role == 3) { ?>


                            <!-- HTML Code to Display the Data -->
                            <div class="tab-pane fade" id="booking" role="tabpanel" aria-labelledby="booking">
                                <h3 class="fw-bolder">Booking</h3>
                                <div class="tab-pane">
                                    <div class="row mt-5 mb-4">
                                        <div class="col-md-12">
                                            <h4>Booked class</h4>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php foreach ($bookedClasses as $class) : ?>
                                            <div class="col-md-4 mb-4">
                                                <div class="card h-100">
                                                    <div class="card-body">
                                                        <h5 class="card-title fw-bolder"><?= htmlspecialchars($class['subject']) ?></h5>
                                                        <p class="card-text"><strong>Date:</strong> <?= htmlspecialchars($class['fromDate']) ?> to <?= htmlspecialchars($class['toDate']) ?> | <?= htmlspecialchars($class['slot']) ?></p>
                                                        <p class="card-text"><strong>Child Name:</strong> <?= htmlspecialchars($class['childName']) ?></p>
                                                        <p class="card-text"><strong>Location:</strong> <?= htmlspecialchars($class['location']) ?></p>
                                                        <p class="card-text"><strong>Fee:</strong> RM <?= htmlspecialchars($class['price']) ?></p>
                                                        <p class="card-text"><strong>Category:</strong> <?= htmlspecialchars($class['category']) ?></p>
                                                        <p class="card-text"><strong>Selected Day:</strong> <?= htmlspecialchars($class['selectedDay']) ?></p>
                                                        <div class="mt-2">
                                                            <?php if ($class['status'] == 1) : ?>
                                                                <form action="tutorbooking/billplz/billplzpost.php" method="POST">
                                                                    <input type="hidden" name="packagePrice" value="<?= htmlspecialchars($class['price']) ?>">
                                                                    <input type="hidden" name="booking_id" value="<?= htmlspecialchars($class['booking_id']) ?>">
                                                                    <input type="hidden" name="child_id" value="<?= htmlspecialchars($class['child_id']) ?>">
                                                                    <input type="hidden" name="tutor_profile_id" value="<?= htmlspecialchars($class['tutor_id']) ?>">
                                                                    <input type="hidden" name="name" value="<?= htmlspecialchars($class['user']['fullName']) ?>">
                                                                    <input type="hidden" name="email" value="<?= htmlspecialchars($class['user']['email']) ?>">
                                                                    <input type="hidden" name="mobile" value="<?= htmlspecialchars($class['user']['mobile']) ?>">
                                                                    <input type="hidden" name="userid" value="<?= htmlspecialchars($class['user']['uid']) ?>">
                                                                    <input type="hidden" name="usertype" value="<?= $type ?>">
                                                                    <button type="submit" class="btn btn-primary">Make a Payment</button>
                                                                </form>
                                                            <?php elseif ($class['status'] == 2) : ?>
                                                                <button type="button" class="btn btn-warning" onclick="redirectToMembersClub()">Find Another Tutor</button>
                                                            <?php elseif ($class['status'] == 3) : ?>
                                                                <div class="alert alert-success" role="alert" style="font-weight: bold; text-align: center;">
                                                                    <i class="fas fa-check-circle" style="margin-right: 10px;"></i>
                                                                    Payment Done Successfully!
                                                                </div>
                                                            <?php else : ?>
                                                                <button type="button" class="btn btn-secondary" disabled>Waiting for Confirmation</button>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                        <script>
                            $(document).ready(function() {
                                $('.update-status').click(function() {
                                    var button = $(this);
                                    var bookingId = button.data('bookingid');
                                    var status = button.data('status');

                                    // Send AJAX request to update status
                                    $.ajax({
                                        url: 'update_booking_status.php',
                                        type: 'POST',
                                        data: {
                                            booking_id: bookingId,
                                            status: status
                                        },
                                        success: function(response) {
                                            // Handle success response if needed
                                            console.log(response);
                                            location.reload();
                                            // Disable both buttons
                                            // button.siblings('.update-status').prop('disabled', true);
                                            // button.prop('disabled', true);

                                            // // Update the button text based on the new status
                                            // if (status === 1) {
                                            //     button.text('Waiting For Payment');
                                            // } else {
                                            //     button.text('Not Interested');
                                            // }
                                        },
                                        error: function(xhr, status, error) {
                                            console.error(error);
                                            alert('Failed to update status.');
                                        }
                                    });
                                });
                            });
                        </script>
                        <?php if ($role != 3) { ?>

                            <div class="tab-pane fade" id="Event" role="tabpanel" aria-labelledby="Event-tab">
                                <h3 class="fw-bolder">Event</h3>
                                <div class="tab-pane">
                                    <div class="row mt-5 mb-4">
                                        <div class="col-md-12">
                                            <h4>Booked Event</h4>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="row-md-4">
                                            <div class="row mb-3">
                                                <div class="col-12">
                                                    <div class="alert alert-white border border-1" role="alert">
                                                        <div class="row align-items-center" style="margin-left: 20px;">
                                                            <div class="col-12 col-md-7">
                                                                <!-- Lesson Title -->
                                                                <h5 class="mb-0 fw-bolder">Summer Book Festival </h5>
                                                            </div>

                                                            <div class="col-12 col-md-5 text-md-end mt-3 mt-md-0">
                                                                <strong>Ticket No. : ABC1234</strong>
                                                            </div>
                                                            <div class="col-12 col-md-7 mt-2">
                                                                <p class="mb-0"> </p>
                                                                <p class="mb-0">Date: 25 January 2024</p>
                                                                <p class="mb-0">Time: 9.00 am - 12.00 pm</p>
                                                                <p class="mb-0">Location: Johor Bahru</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="row-md-4">
                                            <div class="row mb-3">
                                                <div class="col-12">
                                                    <div class="alert alert-white border border-1" role="alert">
                                                        <div class="row align-items-center" style="margin-left: 20px;">
                                                            <div class="col-12 col-md-7">
                                                                <!-- Lesson Title -->
                                                                <h5 class="mb-0 fw-bolder">MindLoops Team Building</h5>
                                                            </div>
                                                            <div class="col-12 col-md-5 text-md-end mt-3 mt-md-0">
                                                                <strong>Ticket No. : User23</strong>
                                                            </div>
                                                            <div class="col-12 col-md-7 mt-2">
                                                                <p class="mb-0"> </p>
                                                                <p class="mb-0">Date: 8 April 2024</p>
                                                                <p class="mb-0">Time: 9.00 am - 12.00 pm</p>
                                                                <p class="mb-0">Location: Johor Bahru</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>
                        <!-- Payment History tab -->
                        <div class="tab-pane fade" id="PaymentHistory" role="tabpanel" aria-labelledby="PaymentHistory-tab">
                            <h3 class="fw-bolder mb-md-4">Payment History</h3>
                            <?php
                            $uid = $_SESSION['uid'];
                            $sql = "SELECT * FROM `user_table` WHERE `uid` = $uid";
                            $result = $mysqli->query($sql);

                            if ($result && $result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                // Extract data from the query result
                                $username = $row['username'];
                                // $fullName = $row['full_name'];
                                $email = $row['email'];
                                $mobile = $row['mobile'];
                            }

                            $querysubscription = "SELECT * FROM subscription
                                 WHERE subscriber_id = '$uid'
                                 ORDER BY s_start_date DESC";
                            $resultSubs = $mysqli->query($querysubscription);

                            // Check if there are any rows returned
                            if ($resultSubs->num_rows > 0) {
                                while ($row = $resultSubs->fetch_assoc()) {
                            ?>
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <div class="card text-dark" style="background-color: <?php echo ($row['s_status'] == 'paid') ? '#CCFFCC' : '#FFCCCC'; ?>">
                                                <div class="card-body">
                                                    <div class="row justify-content-center">
                                                        <div class="col-md-3 text-center mb-3">
                                                            <div class="fw-bolder mb-md-1">Payment Date</div>
                                                            <div> <i class="fas fa-calendar-alt">&nbsp;</i><?= date('d/m/Y H:i', strtotime($row['s_start_date'])) ?></div>
                                                        </div>
                                                        <div class="col-md-3 text-center mb-3">
                                                            <div class="fw-bolder mb-md-1">Amount</div>
                                                            <div><i class="fas fa-money-bill-alt"></i>&nbsp;RM <?php echo $row['s_amount']; ?></div>
                                                        </div>
                                                        <div class="col-md-3 text-center mb-3">
                                                            <div class="fw-bolder mb-md-1">Status</div>
                                                            <div>
                                                                <?php
                                                                if ($row['s_status'] == "paid") {
                                                                    echo '<i class="fas fa-check-circle text-success"></i>'; // Use a checkmark icon for paid status
                                                                } elseif ($row['s_status'] == "failed") {
                                                                    echo '<i class="fas fa-times-circle text-danger"></i>'; // Use a times icon for failed status
                                                                }
                                                                ?>
                                                                <?php echo $row['s_status']; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 text-center">
                                                            <button type="button" class="btn rounded-pill px-md-4 text-white mb-2" data-bs-toggle="modal" data-bs-target="#invoiceModal<?php echo $row['s_id']; ?>" style="background-color: #0355b0;">
                                                                <i class="fas fa-invoice"></i> View Invoice
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <!-- Modal for Invoice -->
                                    <div class="modal fade" id="invoiceModal<?php echo $row['s_id']; ?>" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true" onshown="generateQRCode('<?php echo $row['transaction_id']; ?>')">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content bg-white">
                                                <div class="modal-header">
                                                    <h2 class="modal-title text-uppercase" id="invoiceModalLabel" style="color: #0355b0;">Subscription Invoice</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div id="invoice">
                                                        <!-- Invoice 1 - Bootstrap Brain Component -->
                                                        <section class="py-md-2 px-3">
                                                            <div class="container">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12">
                                                                        <div class="row gy-3 mb-3">
                                                                            <div class="row">
                                                                                <div class="col-12">
                                                                                    <h2>
                                                                                        #Invoice Details
                                                                                    </h2>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <h4>From</h4>
                                                                                <address>
                                                                                    <strong>Mindloops</strong><br>
                                                                                    EDESS Education Development and <br>
                                                                                    Solutions Specialist Sdn. Bhd. (EDESS),<br>
                                                                                    Jalan Pontian Lama,<br>
                                                                                    KM20 81300 Skudai, Johor.<br>
                                                                                    Email: editorial@edess.asia<br>
                                                                                    Phone: +607 550 0077
                                                                                </address>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <a class="d-block text-end" href="#!">
                                                                                    <img src="<?= BASE_URL ?>/assets/images/logo/ML_Logo_(Flat).png" class="img-fluid" alt="BootstrapBrain Logo">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-12 col-sm-6 col-md-8">
                                                                                <h4>Bill To</h4>
                                                                                <address>
                                                                                    <strong id="industry-name"><?= $username ?></strong><br>
                                                                                    Phone: <?= $mobile ?><br>
                                                                                    Email: <?= $email ?>
                                                                                </address>
                                                                            </div>
                                                                            <div class="col-12 col-sm-6 col-md-4">
                                                                                <h5 class="row">
                                                                                    <span class="col-6">InvoiceId#</span>
                                                                                    <span class="col-6 text-sm-end"><?= $row['transaction_id'] ?></span>
                                                                                </h5>
                                                                                <div class="row">
                                                                                    <span class="col-6">Account</span>
                                                                                    <span class="col-6 text-sm-end">000-00<?= $row['subscriber_id'] ?></span>
                                                                                    <span class="col-6">Order ID</span>
                                                                                    <span class="col-6 text-sm-end">#00-<?= $row['s_id'] ?></span>
                                                                                    <span class="col-6">Invoice Date</span>
                                                                                    <span class="col-6 text-sm-end"><?= date('d/m/Y', strtotime($row['s_start_date'])) ?></span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-12">
                                                                                <div class="table-responsive bg-white">
                                                                                    <table class="table table-striped bg-white">
                                                                                        <thead style="background-color: #DEEDFF;">
                                                                                            <tr class="bg-white">
                                                                                                <th scope="col" class="text-uppercase">Subscription</th>
                                                                                                <th scope="col" class="text-uppercase">Status</th>
                                                                                                <th scope="col" class="text-uppercase">Product</th>
                                                                                                <th scope="col" class="text-uppercase text-end">Amount</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody class="table-group-divider bg-white">
                                                                                            <tr>
                                                                                                <td>1</td>
                                                                                                <td class="text-uppercase"><?= $row['s_status'] ?></td>
                                                                                                <td>Subscription For Members Club</td>
                                                                                                <td class="text-end">RM <?= $row['s_amount'] ?></td>
                                                                                            </tr>
                                                                                            <!-- Calculate and display subtotal, VAT, shipping, and total here -->
                                                                                            <tr>
                                                                                                <td colspan="3" class="text-end">Subtotal</td>
                                                                                                <td class="text-end">RM <?= $row['s_amount'] ?></td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <td colspan="3" class="text-end">VAT (5%)</td>
                                                                                                <td class="text-end"> -</td>
                                                                                            </tr>
                                                                                            <tr>
                                                                                                <th scope="row" colspan="3" class="text-uppercase text-end">Total</th>
                                                                                                <td class="text-end">RM <?= $row['s_amount'] ?></td>
                                                                                            </tr>
                                                                                        </tbody>

                                                                                    </table>
                                                                                    <!-- <div id="qrcode">

                                                                                        </div>
                                                                                        <p>You can view or download your Invoice/receipt from this QR code</p> -->
                                                                                    <p><sup>*</sup> This is a computer-generated invoice.</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                    </div> <!-- Download button outside of the invoice section -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary rounded-pill px-md-4 text-white" data-bs-dismiss="modal">Close</button>
                                                    <button onclick="generatePDF()" class="btn rounded-pill px-md-4 text-white" style="background-color: #0355b0;">Download Invoice</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "<p>No payment history found.</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
    </div>

    <div class="modal fade" id="assignToChildrenModal" tabindex="-1" aria-labelledby="assignToChildrenModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg bg-white">
            <div class="modal-content bg-white text-dark p-md-2">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" id="assignToChildrenModalLabel">Assign to Children</h5>

                    <!-- List of Children -->
                    <div id="childrenList">
                        <div class="row pb-md-3">
                            <div class="col pt-2 mt-2">
                                <!-- Display the selected child's name -->
                                <input type="hidden" id="selectedChildId" name="selectedChildId">
                                <label id="selectedChildName" class="form-check-label"></label>
                                <label id="selectedChildName" class="form-check-label"></label>
                            </div>
                            <div class="col pt-2 mt-2">
                                <!-- Due Date Picker for the selected student --> 
                                <label for="dueDate">Due Date:</label>
                                <input type="datetime-local" class="form-control due-date" id="dueDate" name="dueDate">
                            </div>
                        </div>
                    </div>
                    <!-- Update Button -->
                    <button class="btn rounded-pill px-md-3 text-white mb-2" id="update" style="background-color: #0355b0;" onclick="updateAssignment(assignment_id)">Update</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openReassignModal(assigned_to, user_name, assignment_id) {
            $('#assignToChildrenModal').modal('show');
            // Set the text of the label to display the selected child's name
            $('#selectedChildName').text(user_name);
            window.assignment_id = assignment_id;

        }


        function updateAssignment() {
            // Send AJAX request to delete the assignment
            var dueDate = $('#dueDate').val();
            var assignment_id = window.assignment_id;
            $.ajax({
                type: 'POST',
                url: 'reassign.php', // Provide the URL to the script that handles reassignment
                data: {
                    assignment_id: assignment_id,
                    due_date: dueDate
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Handle success
                        // alert('Assignment reassigned successfully.');
                        alert('Assignment reassigned successfully.')
                        var current_date = new Date().toISOString().slice(0, 10);
                        var due_date = new Date(dueDate).toISOString().slice(0, 10);
                        var button = $('#button_' + assignment_id);

                        if (due_date < current_date) {
                            button.removeClass('btn-success').addClass('btn-danger').text('Reassign');
                        } else {
                            button.removeClass('btn-danger').addClass('btn-success').text('In Progress');
                        }
                        // Reload the page or update the assignment list as needed
                    } else {
                        // Handle error
                        console.log(response);
                        alert('Failed to reassign assignment. Please try again.');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error
                    console.error(error);
                    alert('An error occurred while processing your request.');
                }
            });
        }
    </script>






    <!-- Ensure that you have jQuery and Bootstrap JavaScript libraries included in your project -->
    <script>
        // Get a reference to the container that holds the rows
        const container = document.querySelector(".tab-pane#downloads");

        // Get a reference to the rows
        const rows = container.querySelectorAll(".row.mb-3");

        // Set the number of items to display per page
        const itemsPerPage = 5;

        // Calculate the total number of pages
        const totalPages = Math.ceil(rows.length / itemsPerPage);

        // Initialize the current page
        let currentPage = 1;

        // Function to show the current page
        function showPage(page) {
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;

            // Loop through the rows and display/hide based on the current page
            rows.forEach((row, index) => {
                if (index >= start && index < end) {
                    row.style.display = "block";
                } else {
                    row.style.display = "none";
                }
            });

            // Update the current page number
            document.getElementById("currentPage").textContent = page;
        }

        // Show the initial page
        // showPage(currentPage);

        // Function to go to the previous page
        function prevPage() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        }

        // Function to go to the next page
        function nextPage() {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        }

        // Update the total number of pages


        const containerv = document.querySelector(".tab-pane#history");

        // Get a reference to the rows
        const rowsv = containerv.querySelectorAll(".row.mb-3");

        // Set the number of items to display per page
        const itemsPerPagev = 5;

        // Calculate the total number of pages
        const totalPagesv = Math.ceil(rowsv.length / itemsPerPagev);

        // Initialize the current page
        let currentPagev = 1;

        // Function to show the current page
        function showPagev(page) {
            const start = (page - 1) * itemsPerPagev;
            const end = start + itemsPerPagev;

            // Loop through the rows and display/hide based on the current page
            rowsv.forEach((row, index) => {
                if (index >= start && index < end) {
                    row.style.display = "block";
                } else {
                    row.style.display = "none";
                }
            });

            // Update the current page number
            document.getElementById("currentPagev").textContent = page;
        }

        // Show the initial page
        // showPagev(currentPage);

        // Function to go to the previous page
        function prevPage() {
            if (currentPagev > 1) {
                currentPagev--;
                showPagev(currentPagev);
            }
        }

        // Function to go to the next page
        function nextPagev() {
            if (currentPagev < totalPagesv) {
                currentPagev++;
                showPagev(currentPagev);
            }
        }

        // Update the total number of pages


        function clearHistory() {

            if (!confirm("Are you sure you want to delete history?")) {
                return false;
            }
            //   console.log("here");
            let url = 'functions/deleteViews.php';
            fetch(url).then(data => data.text()).then(data => {
                alert(data);
                window.location.reload()
            });
        }

        // Function to set the background image of the profile picture
        function setDefaultImage(imageSrc) {
            var profilePicContainer = document.querySelector('.profile-pic-container');
            profilePicContainer.style.backgroundImage = 'url(' + imageSrc + ')';
            $('#defaultImageModal').modal('hide'); // Close the modal after selecting an image
        }

        // Function to preview the local image before uploading
        function previewImage(input) {
            var file = input.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var profilePicContainer = document.querySelector('.profile-pic-container');
                    profilePicContainer.style.backgroundImage = 'url(' + e.target.result + ')';
                    $('#defaultImageModal').modal('hide'); // Close the modal after selecting a local image
                };
                reader.readAsDataURL(file);
            }
        }
    </script>

    <script>
        function remove_avatar() {
            var x = confirm("Are you sure want to delete this Avatar?");

            if (x == true) {
                return true;
            } else {
                return false;
            }
        }

        function deletechild() {
            var x = confirm("Are you sure want to delete this Children?");

            if (x == true) {
                return true;
            } else {
                return false;
            }
        }

        // JavaScript to handle alert clicks
        const alerts = document.querySelectorAll(".alert");
        alerts.forEach((alert, index) => {
            alert.addEventListener("click", () => {
                // Remove "alert-warning" class from all alerts
                alerts.forEach((a) => {
                    a.classList.remove("alert-warning");
                }); // Add "alert-warning" class to the clicked alert
                alert.classList.add("alert-warning");
            });
        });


        function previewImage(input) {
            const container = input.parentElement.querySelector('.rounded-circle.profile-pic-container');
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    container.style.backgroundImage = `url(${e.target.result})`;
                    container.innerHTML = '';
                };

                reader.readAsDataURL(file);
            } else {
                // Handle the case where no file is selected or if the user cancels the file selection
                container.style.backgroundImage = '';
                if (container.childElementCount === 0) {
                    container.innerHTML = "<i class='fas fa-camera'></i>";
                }
            }
        }



        $(document).ready(function() {
            $('#updatepassword').submit(function(e) {
                e.preventDefault();
                let currentPassword = $('#current_password').val();
                let newPassword = $('#new_password').val();
                let confirmPassword = $('#confirm_password').val();

                // Client-side validation
                if (newPassword !== confirmPassword) {
                    $('#password-error-message').html("New password and confirm password do not match.");
                    return;
                }

                // Use Ajax to send data to the server for password verification
                $.ajax({
                    type: 'POST',
                    url: 'profile.php', // Replace with the actual URL
                    data: {
                        current_password: currentPassword,
                        new_password: newPassword,
                        confirm_password: confirmPassword,
                        update_password: 'true', // Add this parameter to indicate it's a password update request
                    },
                    success: function(response) {
                        if (response === 'success') {
                            $('#password-error-message').html('');
                            $('#updatePasswordModal').modal('hide');
                        } else {
                            $('#password-error-message').html(response);
                        }
                    },
                });
            });
        });


        function editchildinfo(obj) {
            let child_data = JSON.parse(obj.getAttribute("data-child-info"));
            console.log(child_data.gender);
            let form = document.getElementById('editchildren');
            // console.log(form);
            form.child_id.value = child_data.uid;
            form.child_username.value = child_data.title;

            form.child_email.value = child_data.email;
            form.child_phone_number.value = child_data.mobile;
            form.child_dob.value = child_data.dob;
            form.child_gender.value = child_data.gender.toLowerCase();
            form.child_grade.value = child_data.grade_id;

        }

        $('.hoverable-image').on('mouseover', function() {
            $(this).next('.hover-card').css('visibility', 'visible');
            $(this).next('.hover-card').css('top', '50%');
            $(this).next('.hover-card').css('opacity', '1');
        })
        $('.hoverable-image').on('mouseout', function() {
            $('.hover-card').css('visibility', 'hidden');
            $('.hover-card').css('top', '1000px');
            $('.hover-card').css('opacity', '0');
        })
    </script>

    <script>
        $(document).ready(function() {
            $("#switchToTeacherBtn").click(function() {
                $.ajax({
                    type: "POST",
                    url: "switch_role.php?role_id=" + this.id,
                    success: function(response) {
                        console.log(response); // Display success message
                        // You can optionally reload the page after role switch
                        // setRole('teacher');
                        // window.location.reload();
                        window.location.href = "dashboard.php";
                        return false;
                    },
                    error: function() {
                        alert('Failed to switch role. Please try again.'); // Display error message
                    }
                });
            });
        });

        // function setRole(role) {
        //     fetch('setrole.php?role=' + role)
        //     .then(data => data.text())
        //     .then(data => {
        //         console.log(data);
        //         window.location.href = './dashboard';
        //     });
        // }
    </script>


    <script>
        function updateProfilePic(imageName) {
            // Get the user ID from the session or any other source
            const userId = <?= $_SESSION['uid'] ?>;

            // Redirect to the current page with the selected image name as a query parameter
            window.location.href = `profile?uid=${userId}&image=${imageName}`;
        }

        errors_username = false;

        function checkusernamep(username, original) {
            let user_msg = document.getElementById('user_msg1');
            console.log(user_msg.innerText)
            if (username.value.length == 0 || username.value == original) {

                user_msg.innerText = '';
                errors_username = false;
                return false;
            }

            fetch('checkusername.php?username=' + username.value).then(data => data.text()).then(data => {

                if (data == 'Username already exist') {
                    user_msg.innerText = 'Username already exists, please try another username';

                    username.focus();

                    errors_username = true;

                    return false;
                } else {
                    user_msg.innerText = '';
                    errors_username = false;

                }
            });
        }
        errors_email = false;

        function checkemailp(email, original) {
            console.log(original);
            let email_msg = document.getElementById('email_msg1');
            // console.log(email_msg)
            if (email.value.length == 0 || email.value == original) {
                email_msg.innerText = '';
                errors_email = false;
                return false;
            }

            fetch('checkEmail.php?email=' + email.value).then(data => data.text()).then(data => {
                if (data == 'Email already exist') {
                    email_msg1.innerText = 'email already exists, please try another email';
                    // alert(data);
                    email.focus();
                    errors_email = true;
                    return false;
                } else {
                    email_msg.innerText = '';
                    errors_email = false;
                }
            });
        }

        function checkError(e) {
            e.preventDefault();
            // if()
            if (errors_username || errors_email) {
                alert("Please resolve the issue, before update");
                return false;
            }
            e.target.submit();
            console.log(e.target);
            return false;
        }

        function updateNotification() {
            fetch('updatenotification.php?notice_update=yes').then(data => data.text()).then(data => {
                let notices = document.getElementsByClassName('notification-badge');
                // console.log(notice)
                Array.from(notices).forEach(notice => notice.style.display = 'none');
            });
        }
    </script>

    <script>
        function redirectToMembersClub() {
            window.location.href = 'membersclub_pt.php';
        }

        function generatePDF() {
            const element = document.getElementById('invoice');
            const filename = `${document.querySelector('#industry-name').textContent}_${getCurrentDate()}.pdf`;
            const options = {
                margin: 10,
                filename: filename,
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'mm',
                    format: 'a4',
                    orientation: 'portrait'
                }
            };
            html2pdf()
                .from(element)
                .set(options)
                .save();
        }

        function getCurrentDate() {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }
        // Generate QR Code
        const qrCodeContainer = document.getElementById('qrcode');
        const url = `<?= BASE_URL ?>download/bill/${transactionId}`;
        const qrCode = new QRCode(qrCodeContainer, {
            text: url,
            width: 128,
            height: 128,
            colorDark: '#000000', // QR code color
            colorLight: '#ffffff' // Background color
        });

        // Overlay logo on top of QR code
        const logoUrl = '<?= BASE_URL ?>/assets/images/logo/ML_Logo_(Flat).png'; // Replace with the path to your logo
        const logoSize = 80; // Size of the logo in pixels
        const margin = 5; // Margin around the logo

        const canvas = qrCode._el.querySelector('canvas'); // Get the QR code canvas
        const ctx = canvas.getContext('2d');
        const logo = new Image();
        logo.src = logoUrl;
        logo.onload = function() {
            const x = (canvas.width - logoSize) / 2;
            const y = (canvas.height - logoSize) / 2;
            ctx.drawImage(logo, x, y, logoSize, logoSize);
        };
    </script>
    <?php include 'includes/page-footer.php' ?>