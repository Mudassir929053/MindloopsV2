<?php
include 'includes/page-head.php';

include 'functions/function.php';
?>
<?php #include 'assets/css/profile.css' 
?>
<style>
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
</style>

<body class="bg-white text-dark">
    <?php include 'includes/page-header.php' ?>
    <div class="wrapper">
        <main class="main-content">
            <!-- Your content here -->
            <div class="container mt-5">
                <div id="toast" class="toast align-items-center text-white bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
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
                                    <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true"><i class="fa-solid fa-user"></i> Profile</a>
                                </li>
                                <?php if ($role == 3) { ?>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="childern-tab" data-bs-toggle="tab" href="#childern" role="tab" aria-controls="childern" aria-selected="false"><i class="fa-solid fa-children"></i> Manage Childern</a>
                                    </li>
                                <?php } ?>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="notification-tab" data-bs-toggle="tab" href="#notification" role="tab" aria-controls="notification" aria-selected="false"><i class="fa-solid fa-bell"></i> Notification</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="downloads-tab" data-bs-toggle="tab" href="#downloads" role="tab" aria-controls="downloads" aria-selected="false"><i class="fa-solid fa-download"></i> Downloads</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="history-tab" data-bs-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false"><i class="fa-solid fa-clock"></i> History</a>
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
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                                <!-- Profile Settings Content -->

                                <h3 class="fw-bolder">Profile</h3>
                                <p>Update your profile information here.</p>
                                <div class="d-flex justify-content-end">
                                    <?php
                                    if (!empty($password)) { ?>
                                        <button type="button" class="btn btn-primary rounded-pill btn-sm fw-bolder" data-bs-toggle="modal" data-bs-target="#updatePasswordModal">
                                            Update Password
                                        </button>
                                    <?php } ?>
                                </div><!-- Profile Picture Upload -->
                                <div class="mb-3">
                                    <label for="profile-picture" class="form-label">Profile Picture</label>

                                    <div class="row mb-5">
                                        <div class="col-12 col-md-4">
                                            <!-- Circular Profile Picture Upload Area -->
                                            <div class="rounded-circle profile-pic-container position-relative" style="background-image: url('<?php echo !empty($profilePic) ? 'assets/uploads/avatar/' . $profilePic : 'path-to-default-image.jpg'; ?>'); background-size: contain; background-position: center;" data-bs-toggle="modal" data-bs-target="#defaultImageModal">
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
                                            <p class="text-muted pt-2">Upload a profile picture with a maximum size of 2MB in JPG or PNG format.</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="defaultImageModal" tabindex="-1" role="dialog" aria-labelledby="defaultImageModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
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


                                <!-- Modal for Updating Password -->
                                <form action="" method="POST" enctype="multipart/form-data" id="profile">
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
                                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter your Username" value="<?php echo $username; ?>">
                                    </div>
                                    <?php if ($password == NULL) : ?>

                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" value="" name="password">
                                        </div>
                                    <?php endif; ?>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter your Email" value="<?php echo $email; ?>" name="email">
                                    </div>

                                    <div class="mb-3">
                                        <label for="number" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter your Phone Number" value="<?php echo $mobile; ?>" name="number">
                                    </div> <!-- Submit Button on the Right -->
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" id="profile_update" name="profile_update" class="btn btn-primary rounded-pill btn-sm fw-bolder">Save Changes</button>
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
                                                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter your current password">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="new_password" class="form-label">New Password</label>
                                                    <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter your new password">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm your new password">
                                                </div>
                                                <div id="password-error-message" class="text-danger"></div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="update_password" id="update_password">Save Changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane fade" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                                <!-- Notification Settings Content -->
                                <h3 class="fw-bolder">Notification</h3>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 col-md-10">
                                            <!-- Alerts -->
                                            <div class="alert custom-alert-padding" role="alert">
                                                A simple info alert with an example link. Give it a click if you like.
                                            </div>
                                            <div class="alert custom-alert-padding" role="alert">
                                                A simple info alert with an example link. Give it a click if you like.
                                            </div>
                                            <div class="alert custom-alert-padding" role="alert">
                                                A simple info alert with an example link. Give it a click if you like.
                                            </div>
                                            <div class="alert custom-alert-padding" role="alert">
                                                A simple info alert with an example link. Give it a click if you like.
                                            </div>
                                            <div class="alert custom-alert-padding" role="alert">
                                                A simple info alert with an example link. Give it a click if you like.
                                            </div>
                                            <div class="alert custom-alert-padding" role="alert">
                                                A simple info alert with an example link. Give it a click if you like.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="childern" role="tabpanel" aria-labelledby="childern-tab">
                                <!-- Profile Settings Content -->
                                <h3 class="fw-bolder">Children</h3>
                                <p>Add or update children's information here.</p> <!-- Add new children -->
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary p-2 btn-sm fw-bolder" data-bs-toggle="modal" data-bs-target="#addChildern">Add Children</button>
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
                                            'email' => $row['email'],
                                            'fullname' => $row['full_name'],
                                            'dob' => $row['date_of_birth'],
                                            'gender' => $row['gender'],
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
                                                            <img src="http://192.168.0.177/mindloops//assets/images/homepage/Group 804.png" class="img-fluid rounded-circle" width="80%" alt="Profile Picture">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <p>No user data available.</p>
                                    <?php endif; ?>
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
                                                                    <label for="username" class="form-label">Children Username</label>
                                                                    <input type="text" class="form-control" id="username" name="child_username" placeholder="Enter the Username">
                                                                    <input type="hidden" class="form-control" id="parentid" name="parent_id" value="<?= $_SESSION['uid'] ?>" placeholder="Enter the Username">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="email" class="form-label">Email</label>
                                                                    <input type="email" class="form-control" id="email" name="child_email" placeholder="Enter the Email">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3 ">
                                                                <label for="fullname" class="form-label">Fullname</label>
                                                                <input type="text" class="form-control" id="fullname" name="child_fullname" placeholder="Enter the Password">
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="password" class="form-label">Password</label>
                                                                    <input type="password" class="form-control" id="password" name="child_password" placeholder="Enter the Password">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                                                    <input type="password" class="form-control" id="confirm_password" name="child_confirm_password" placeholder="Confirm the Password">
                                                                </div>
                                                            </div>
                                                            <div class="mb-3"> </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="number" class="form-label">Phone Number</label>
                                                                    <input type="tel" class="form-control" id="number" name="child_phone_number" placeholder="Enter the Phone Number">
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="dob" class="form-label">Date of Birth</label>
                                                                    <input type="date" class="form-control" id="dob" name="child_dob" placeholder="Enter your Date of Birth" required>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="gender" class="form-label">Gender</label>
                                                                    <select class="form-select" id="gender" name="child_gender">
                                                                        <option value="male">Male</option>
                                                                        <option value="female">Female</option>
                                                                        <option value="other">Other</option>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-6">
                                                                    <label for="grade" class="form-label">Grade</label>
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

                                </div>
                            </div> <!-- Downloads Tab -->
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

                                // Check if there are any rows returned
                                if ($resultdownload->num_rows > 0) {

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
                                        $downloadedDate = strtotime($rowdownload['downloaded_date']); // Replace this with the actual download date
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
                                } else {
                                    // Handle case where there are no downloads to display.
                                    echo "No downloads found.";
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
                                } else {
                                    // Handle case where there are no downloads to display.
                                    echo "No downloads found.";
                                }
                                ?> <div class="pagination d-flex justify-content-center mt-5">
                                    <button class="prev-btn btn btn-primary btn-sm rounded-circle mx-2" onclick="prevPage()"><i class="fa-solid fa-arrow-left"></i></button>
                                    <span class="page-num">Page <span id="currentPage">1</span> of <span id="totalPages">1</span></span>
                                    <button class="next-btn btn btn-primary btn-sm rounded-circle mx-2" onclick="nextPage()"><i class="fa-solid fa-arrow-right"></i></button>
                                </div>

                            </div>

                            <!-- History Tab -->
                            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
                                <!-- History Settings Content -->
                                <h3>History</h3> <!-- Timeline -->
                                <div class="timeline">
                                    <!-- Timeline item 1 -->
                                    <div class="timeline-line"></div>
                                    <div class="timeline-item">
                                        <div class="timeline-dot"></div> <!-- Dot on the left -->
                                        <div>
                                            <p class="timeline-date">January 2022</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div> <!-- Timeline item 2 -->
                                    <div class="timeline-item">
                                        <div class="timeline-dot"></div> <!-- Dot on the left -->
                                        <div>
                                            <p class="timeline-date">February 2022</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                        <div class="timeline-line"></div>
                                    </div>
                                    <!-- Timeline item 2 -->
                                    <div class="timeline-item">
                                        <div class="timeline-dot"></div> <!-- Dot on the left -->
                                        <div>
                                            <p class="timeline-date">February 2022</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                        <div class="timeline-line"></div>
                                    </div>
                                    <!-- Timeline item 2 -->
                                    <div class="timeline-item">
                                        <div class="timeline-dot"></div> <!-- Dot on the left -->
                                        <div>
                                            <p class="timeline-date">February 2022</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                        <div class="timeline-line"></div>
                                    </div>
                                    <!-- Timeline item 2 -->
                                    <div class="timeline-item">
                                        <div class="timeline-dot"></div> <!-- Dot on the left -->
                                        <div>
                                            <p class="timeline-date">February 2022</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                        <!-- <div class="timeline-line"></div> -->
                                    </div> <!-- Add more timeline items as needed -->
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a class="nav-link text-primary" href=""><i class="fa-solid fa-trash-can"></i> Clear history</a>
                                </div>
                                <!-- Add more timeline items as needed -->
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </div>
</body>
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
    showPage(currentPage);

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
    document.getElementById("totalPages").textContent = totalPages;
</script>

<script>
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
        var x = confirm("Are you sure want to delete this Lesson?");

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
</script>
<script>
    function updateProfilePic(imageName) {
        // Get the user ID from the session or any other source
        const userId = <?= $_SESSION['uid'] ?>;

        // Redirect to the current page with the selected image name as a query parameter
        window.location.href = `profile?uid=${userId}&image=${imageName}`;
    }
</script>
<?php include 'includes/page-footer.php' ?>