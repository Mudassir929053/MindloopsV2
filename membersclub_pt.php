<?php include 'includes/page-head.php';
include('function_material.php');
?>
<?php
// Check if the user ID is not set in the session
if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
    // Set the message
    // Output JavaScript to display the message as an alert
    echo "<script>
                alert('Please login to access this page');
                // Optionally, redirect after showing the alert
                window.location.href = '" . BASE_URL . "'; 
              </script>";
}

// Fetch user data based on the UID from the session
$uid = $_SESSION['uid'];
$sql = "SELECT * FROM `user_table` WHERE `uid` = $uid";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Extract data from the query result
    $username = $row['username'];
    $fullName = $row['full_name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
}

// Fetch grades from the database
$grades = [];
$query = "SELECT `grade_id`, `grade`, `grade_name` FROM `grade_table` WHERE `grade_status` = '1'";
$result = $mysqli->query($query);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $grades[] = $row;
    }
}

// Fetch unique subjects
$subjects = [];
$sql = "SELECT DISTINCT subject FROM tutorprofiles WHERE `profile_status` = '1'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row['subject'];
    }
}

// Fetch unique locations
$locations = [];
$sql = "SELECT DISTINCT location FROM tutorprofiles WHERE `profile_status` = '1'";
$result = $mysqli->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $locations[] = $row['location'];
    }
}

// Fetch filters
$selectedGrade = $_GET['grade'] ?? '';
$selectedSubject = $_GET['subject'] ?? '';
$selectedLocation = $_GET['location'] ?? '';





// Check the subscription status
$subscriptionCheck = "SELECT s_end_date FROM subscription WHERE subscriber_id = $uid AND s_end_date > NOW() AND s_status = 'paid'";
$subscriptionResult = $mysqli->query($subscriptionCheck);

if ($subscriptionResult && $subscriptionResult->num_rows > 0) {
    $subscriptionExpired = true;
} else {
    // Initialize a variable to store the subscription status
    $subscriptionExpired = false;
}


// role of User
if ($role == 3) {
    $type = "Parent";
} elseif ($role == 2) {
    $type = "Teacher";
} elseif ($role == 4) {
    $type = "Student";
} else {
    $type = "Null";
}
?>

<style>
    /* Remove the border from the cards */
    .card {
        border: none;
        border-radius: 0;
        /* Optional: This removes the border-radius if you want */
        /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); Add a box shadow for a nice effect */
        border-bottom: none;
        box-shadow: none;
        transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out;
        /* transform-origin: 70px 25px; */

    }

    .card {
        position: relative;
    }

    .place::placeholder {
        color: #999999;
        /* Black placeholder text */
    }

    .see-profile {
        position: absolute;
        top: 62%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(244, 175, 0, 0.4);
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        color: #000000;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        width: 100%;
        text-align: center;
        text-decoration: none;
        transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out;
    }

    .card:hover .see-profile {
        transform: translate(-50%, 70%);
        /* Slide the button to the left */
        opacity: 1;
    }

    [data-bs-theme=dark] .btn-close {
        filter: none !important;
        color: black !important;
    }

    .card:hover {
        transform: scale(1.1);

    }

    [data-bs-theme=dark] .form-select {
        --bs-form-select-bg-img: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23000' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
    }

    .form-select {
        filter: none;
        background-color: white;
        color: black;
    }




    /* modal */
    [data-bs-theme=dark] .btn-close {
        filter: none !important;
        color: #999999 !important;
    }

    .mar {
        margin-bottom: 20px;
        border-radius: 15px;

    }

    .mar1 {
        text-align: center;
        padding: 2rem;

    }

    .subscription-title {
        font-size: 1.5rem;
    }

    .subscription-text {
        font-size: 1.25rem;
    }

    .modal-content .abc {
        background-color: #bee1f7 !important;
        /* Your desired background color */

    }

    /* You may need to adjust other styles to ensure content visibility */


    .custom-btn {
        position: relative;
        right: 20px;
        bottom: 20px;
        border: none;
        box-shadow: none;
        width: 130px;
        height: 40px;
        line-height: 42px;
        -webkit-perspective: 230px;
        perspective: 230px;
        background-color: #DEEDFF;
    }

    .custom-btn span {
        background: rgb(0, 172, 238);
        background: linear-gradient(0deg, rgba(0, 172, 238, 1) 0%, rgba(2, 126, 251, 1) 100%);
        display: block;
        position: absolute;
        width: 130px;
        height: 40px;
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5), 7px 7px 20px 0px rgba(0, 0, 0, .1), 4px 4px 5px 0px rgba(0, 0, 0, .1);
        border-radius: 5px;
        margin: 0;
        text-align: center;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all .3s;
        transition: all .3s;
    }

    .custom-btn span:nth-child(1) {
        box-shadow: -7px -7px 20px 0px #fff9, -4px -4px 5px 0px #fff9, 7px 7px 20px 0px #0002, 4px 4px 5px 0px #0001;
        -webkit-transform: rotateX(90deg);
        -moz-transform: rotateX(90deg);
        transform: rotateX(90deg);
        -webkit-transform-origin: 50% 50% -20px;
        -moz-transform-origin: 50% 50% -20px;
        transform-origin: 50% 50% -20px;
    }

    .custom-btn span:nth-child(2) {
        -webkit-transform: rotateX(0deg);
        -moz-transform: rotateX(0deg);
        transform: rotateX(0deg);
        -webkit-transform-origin: 50% 50% -20px;
        -moz-transform-origin: 50% 50% -20px;
        transform-origin: 50% 50% -20px;
    }

    .custom-btn:hover span:nth-child(1) {
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5), 7px 7px 20px 0px rgba(0, 0, 0, .1), 4px 4px 5px 0px rgba(0, 0, 0, .1);
        -webkit-transform: rotateX(0deg);
        -moz-transform: rotateX(0deg);
        transform: rotateX(0deg);
    }

    .custom-btn:hover span:nth-child(2) {
        box-shadow: inset 2px 2px 2px 0px rgba(255, 255, 255, .5), 7px 7px 20px 0px rgba(0, 0, 0, .1), 4px 4px 5px 0px rgba(0, 0, 0, .1);
        color: transparent;
        -webkit-transform: rotateX(-90deg);
        -moz-transform: rotateX(-90deg);
        transform: rotateX(-90deg);
    }
</style>

<body class="bg-white text-dark">
    <?php include 'includes/page-header.php' ?>
    <div class="wrapper">
        <main class="main-content">
            <div class="container-fluid" style="background-image:url(<?= BASE_URL ?>/assets/images/memberclub/Group_543.png); background-size:100% 47%;background-repeat: no-repeat;">
                <div class="pt-5">
                    <div class="container ">
                        <div class="row pb-md-5">
                            <div class="m-md-2">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <div class="mx-2 pb-md-4 ms-1 display-6 text-dark fw-bolder">MindLoops Private Tutors</div>
                                        <div class="d-flex justify-content-between">
                                            <?php
                                            // session_start(); 

                                            $uid = $_SESSION['uid'];

                                            // Fetch the data from the tutorprofiles table
                                            $check = "SELECT * FROM tutorprofiles WHERE user_id=$uid";
                                            $result = $mysqli->query($check);

                                            // Check if the query was successful and the user is a student
                                            if ($result && $result->num_rows == 0 && $role == 2) {
                                                // If the user is a student and not registered as a tutor, show the 'Sign up as tutor' button
                                            ?>
                                                <button name="tutor_signup" class="btn rounded-pill px-4 text-white" data-bs-toggle="modal" data-bs-target="#signupModal" style="background-color: #0355B0;">Sign up as tutor</button>
                                            <?php } else if ($role == 2) {
                                                // If the user is either a tutor or the query failed, show the 'See Profile' button
                                                $row = $result->fetch_assoc();
                                                $userId = $row['user_id'];
                                            ?>
                                                <form action="membersclub_pt_det.php" method="GET" class="d-inline">
                                                    <input type="hidden" name="id" value="<?= $userId ?>">
                                                    <button type="submit" class="btn rounded-pill px-4 text-white" style="background-color: #0355B0;">See Profile</button>
                                                </form>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5 align-items-start">
                            <div class="col-md-9">
                                <form method="GET" id="filterForm">
                                    <div class="row">
                                        <div class="col-md-2 mb-2">
                                            <div class="position-relative">
                                                <select class="form-control border border-primary rounded-pill bg-white text-dark px-3" name="grade" onchange="document.getElementById('filterForm').submit();">
                                                    <option selected disabled>Select Grade</option>
                                                    <?php if (!empty($grades)) : ?>
                                                        <?php foreach ($grades as $grade) : ?>
                                                            <option value="<?= $grade['grade_name'] . " " . $grade['grade'] ?>" <?= $selectedGrade == $grade['grade_name'] . " " . $grade['grade'] ? 'selected' : '' ?>>
                                                                <?= $grade['grade_name'] ?> <?= $grade['grade'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                        <option selected disabled>No Grades Available</option>
                                                    <?php endif; ?>
                                                </select>
                                                <i class="fa-solid fa-chevron-down position-absolute end-0 top-50 translate-middle-y" style="color: #74C0FC; left: 120px;"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <div class="position-relative">
                                                <select class="form-control border border-primary rounded-pill bg-white text-dark" name="subject" onchange="document.getElementById('filterForm').submit();">
                                                    <option selected disabled>Subject</option>
                                                    <?php if (!empty($subjects)) : ?>
                                                        <?php foreach ($subjects as $subject) : ?>
                                                            <option value="<?= htmlspecialchars($subject) ?>" <?= $selectedSubject == $subject ? 'selected' : '' ?>>
                                                                <?= htmlspecialchars($subject) ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                        <option selected disabled>No subjects available</option>
                                                    <?php endif; ?>
                                                </select>
                                                <i class="fa-solid fa-chevron-down position-absolute end-0 top-50 translate-middle-y" style="color: #74C0FC; left: 120px;"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <div class="position-relative">
                                                <select class="form-control border border-primary rounded-pill bg-white text-dark" name="location" onchange="document.getElementById('filterForm').submit();">
                                                    <option selected disabled>Location</option>
                                                    <?php if (!empty($locations)) : ?>
                                                        <?php foreach ($locations as $location) : ?>
                                                            <option value="<?= htmlspecialchars($location) ?>" <?= $selectedLocation == $location ? 'selected' : '' ?>>
                                                                <?= htmlspecialchars($location) ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    <?php else : ?>
                                                        <option selected disabled>No locations available</option>
                                                    <?php endif; ?>
                                                </select>
                                                <i class="fa-solid fa-chevron-down position-absolute end-0 top-50 translate-middle-y" style="color: #74C0FC; left: 120px;"></i>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-2 mb-2">
                                            <div class="position-relative">
                                                <select class="form-control border border-primary rounded-pill bg-white text-dark">
                                                    <option selected>Rating</option>
                                                    <option value="1">1 Star</option>
                                                    <option value="2">2 Star</option>
                                                    <option value="3">3 Star</option>
                                                    <option value="4">4 Star</option>
                                                    <option value="5">5 Star</option>
                                                </select>
                                                <i class="fa-solid fa-chevron-down position-absolute end-0 top-50 translate-middle-y" style="color: #74C0FC; left: 120px;"></i>
                                            </div>
                                        </div> -->
                                        <div class="col-md-2 mb-2">
                                            <div class="position-relative">
                                                <a href="<?= BASE_URL ?>/membersclub_pt.php" class="form-control border border-primary rounded-pill bg-white text-center text-dark" style="text-decoration: none;">View All</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="input-group">
                                    <input type="text" class="form-control rounded-pill color-search position-relative bg-white text-dark place" placeholder="Search" id="search-input">
                                    <div class="position-absolute end-0 top-50 translate-middle-y">
                                        <span class="input-group-text bg-transparent border-0">
                                            <i class="fa-solid fa-magnifying-glass text-dark"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5"></div>

                        <?php
                        // Fetch filtered profiles
                        $fetch = "SELECT *
          FROM tutorprofiles AS tp
          INNER JOIN user_table AS ut ON tp.user_id = ut.uid
          WHERE profile_status = '1'";

                        if (!empty($selectedGrade)) {
                            $fetch .= " AND grade = '" . $mysqli->real_escape_string($selectedGrade) . "'";
                        }
                        if (!empty($selectedSubject)) {
                            $fetch .= " AND subject = '" . $mysqli->real_escape_string($selectedSubject) . "'";
                        }
                        if (!empty($selectedLocation)) {
                            $fetch .= " AND location = '" . $mysqli->real_escape_string($selectedLocation) . "'";
                        }

                        // echo $fetch;
                        // exit;

                        $result = $mysqli->query($fetch);

                        if ($result->num_rows > 0) {
                            $counter = 0;
                            echo '<div class="container"><div class="row g-3 mb-2">';
                            while ($row = $result->fetch_assoc()) {
                                $title = $row['full_name'];
                                $description = $row['description'];
                                $limitedDescription = strlen($description) > 40 ? substr($description, 0, 40) . '...' : $description;
                                $image = $row['profile_picture'];
                                $userId = $row['uid'];
                                if ($counter > 0 && $counter % 4 == 0) {
                                    echo '</div><div class="row g-3 mb-2">';
                                }
                        ?>
                                <div class="col-md-3 pb-3 search">
                                    <div class="card bg-white text-dark rounded">
                                        <img src="<?= BASE_URL ?>/assets/uploads/tutor/profile_pictures/<?= $image ?>" class="card-img-top rounded" alt="Profile Image" style="height: 415px; object-fit: cover;">
                                        <?php if ($subscriptionExpired) { ?>
                                            <a href="membersclub_pt_det.php?id=<?= $userId ?>" class="see-profile">See Profile</a>
                                        <?php } else { ?>
                                            <a href="" class="see-profile" data-bs-toggle="modal" data-bs-target="#subscriptionModal">See Profile</a>
                                        <?php } ?>
                                        <div class="card-body justify-content-between">
                                            <h4 class="fw-bold text-capitalize" style="color: #00308D;"><?= $title ?></h4>
                                            <p class="card-text"><?= $limitedDescription ?></p>
                                        </div>
                                    </div>
                                </div>

                        <?php
                                $counter++;
                            }
                            echo '</div></div>';
                        } else {
                            echo "<h2>No Tutor Available.</h2>";
                        }
                        ?>


                    </div>
                </div>
            </div>

            <!-- The modal START-->
            <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content bg-white text-dark">
                        <div class="modal-header border-0">
                            <h5 class="modal-title fw-bold" id="signupModalLabel" style="color: #0355B0;">Sign Up as a Tutor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Signup form -->
                            <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                                <input type="hidden" class="bg-white text-dark" name="userid" value="<?= $uid ?>">
                                <!-- <div class="mb-3">
                                    <label for="hidden" class="form-label fw-bold">Name</label>
                                    <input type="text" class="form-control bg-white text-dark place" id="name" name="name" placeholder="Enter your name" required>
                                </div> -->
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="hidden" class="form-label fw-bold">Subject/skill</label>
                                        <input type="text" class="form-control bg-white text-dark place" id="subject" name="subject" placeholder="Enter the main subject/skill you teach" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="coverImage" class="form-label fw-bold">Location</label>
                                        <input type="text" class="form-control bg-white text-dark place" name="coverImage" placeholder="Enter locality e.g. JP Nagar" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="collegename" class="form-label">College Name:</label>
                                        <input type="text" class="form-control bg-white text-dark place" id="collegename" name="collegename" placeholder="E.g., ABC University" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="coursename" class="form-label">Course Name:</label>
                                        <input type="text" class="form-control bg-white text-dark place" id="coursename" name="coursename" placeholder="E.g., Computer Science" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label for="startdate" class="form-label">Start Date:</label>
                                        <input type="date" class="form-control bg-white text-dark place" id="startdate" name="startdate" required>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="enddate" class="form-label">End Date:</label>
                                        <div class="input-group">
                                            <input type="date" class="form-control bg-white text-dark place" id="enddate" name="enddate" placeholder="Select end date">
                                        </div>
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="presentCheckboxEdu" class="form-label">Present:</label>
                                        <div class="input-group-text">
                                            <input class="form-check-input place" type="checkbox" name="presentCheckboxEdu" id="presentCheckboxEdu" value="Present" onchange="handleCheckboxChangeEdu()">
                                            <label class="form-check-label px-1 bg-white text-dark place" for="presentCheckboxEdu"> Present</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="description" class="form-label fw-bold">Description</label>
                                        <textarea class="form-control bg-white text-dark place" id="description" name="description" rows="3" oninput="limitCharacters(this, 500)" placeholder="Enter a brief description about yourself and your hobbies..."></textarea>
                                        <small id="characterCount" class="form-text text-dark">Maximum 500 characters</small>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="grade" class="form-label fw-bold">Select Class You Want To Teach</label>
                                        <select class="form-select" id="grade" name="grade" required>
                                            <?php
                                            $sql = "SELECT * FROM grade_table";
                                            $result = $mysqli->query($sql);

                                            if ($result && $result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row['grade_name'] . ' ' . $row['grade'] . '">' . $row['grade_name'] . ' ' . $row['grade'] . '</option>';
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="amount" class="form-label fw-bold">Charges per Session</label>
                                        <input type="number" class="form-control bg-white text-dark place" id="amount" name="amount" placeholder="Enter charges per session" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="gender" class="form-label fw-bold">Select Gender</label>
                                        <select class="form-select" id="gender" name="gender" required>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="skills" class="form-label fw-bold">Skills</label>
                                        <input type="text" class="form-control bg-white text-dark place" id="skills" name="skills" placeholder="Enter your skills" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="experience" class="form-label fw-bold">Experience (in years)</label>
                                        <input type="number" class="form-control bg-white text-dark place" id="experience" name="experience" placeholder="Enter your experience">
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="experienceCertificate" class="form-label fw-bold">Experience Certificate</label>
                                        <input type="file" class="form-control bg-white text-dark" id="experienceCertificate" name="experienceCertificate">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="educationCertificates" class="form-label fw-bold">Education Certificates</label>
                                        <input type="file" class="form-control bg-white text-dark" id="educationCertificates" name="educationCertificates[]" multiple required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="profilepicture" class="form-label fw-bold">Profile Picture</label>
                                        <input type="file" class="form-control bg-white text-dark" id="profilepicture" name="profilepicture" accept="image/*" multiple required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="fw-bold">Available Time</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="fromTime" class="form-label fw-bold">From Time</label>
                                        <input type="time" class="form-control bg-white text-dark place" id="fromTime" name="fromTime" placeholder="Enter your available time" required>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="toTime" class="form-label fw-bold">To Time</label>
                                        <input type="time" class="form-control bg-white text-dark place" id="toTime" name="toTime" placeholder="Enter your available time" required>
                                    </div>
                                </div>
                                <div class="modal-footer border-0">
                                    <button type="button" class="btn rounded-pill btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn rounded-pill text-white" name="add_tutor_profile" style="background-color: #0355B0;">Create Profile</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- The modal END-->

            <!-- Modal Markup -->
            <div class="modal fade" id="subscriptionModal" tabindex="-1" aria-labelledby="subscriptionModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content abc bg-white text-dark rounded-3">
                        <div class="modal-header" style="background-color: #bee1f7;">
                            <h5 class="modal-title fw-bolder display-6 text-capitalize" id="subscriptionModalLabel">Subscribe to Premium Membership Club</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="background-color: #bee1f7;">
                            <!-- Subscription Options -->
                            <div class="container py-md-4 px-md-3">
                                <div class="row">
                                    <!-- Subscription Card - 1 Month -->
                                    <div class="col-md-4">
                                        <div class="card text-dark mar shadow-sm" style="background-color: #DEEDFF;">
                                            <div class="card-body mar1">
                                                <form action="subscription/billplz/billplzpost.php" method="post">
                                                    <!-- Subscription Type (Hidden Input) -->
                                                    <input type="hidden" name="subscription_type" value="1 Month">
                                                    <input type="hidden" name="packagePrice" value="100">
                                                    <input type="hidden" name="amount" value="MXT">
                                                    <input type="hidden" name="name" value="<?= $fullName ?>">
                                                    <input type="hidden" name="email" value="<?= $email ?>">
                                                    <input type="hidden" name="mobile" value="60141234567">
                                                    <input type="hidden" name="usertype" value="<?= $type ?>">
                                                    <input type="hidden" name="userid" class="bg-white text-dark" value="<?= $uid ?>">
                                                    <img src="assets/images/homepage/subs.png" class="img-fluid pb-md-3" alt="">
                                                    <h5 class="card-title">1 Month Subscription</h5>
                                                    <p class="card-text fs-3 fw-bold">RM 100</p>
                                                    <!-- <button type="submit" class="btn btn-primary subscribe-btn">Subscribe</button> -->
                                                    <button type="submit" class="custom-btn btn-12"><span>Click!</span><span>Subscribe</span></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Subscription Card - 6 Months -->
                                    <div class="col-md-4">
                                        <div class="card text-dark mar" style="background-color: #DEEDFF;">
                                            <div class="card-body mar1">
                                                <form action="subscription/billplz/billplzpost.php" method="post">
                                                    <!-- Subscription Type (Hidden Input) -->
                                                    <input type="hidden" name="subscription_type" value="6 Month">
                                                    <input type="hidden" name="packagePrice" value="100">
                                                    <input type="hidden" name="amount" value="MYZ">
                                                    <input type="hidden" name="name" value="<?= $fullName ?>">
                                                    <input type="hidden" name="email" value="<?= $email ?>">
                                                    <input type="hidden" name="mobile" value="60141234567">
                                                    <input type="hidden" name="usertype" value="<?= $type ?>">
                                                    <input type="hidden" name="userid" class="bg-white text-dark" value="<?= $uid ?>">
                                                    <img src="assets/images/homepage/subs.png" class="img-fluid pb-md-3" alt="">
                                                    <h5 class="card-title">6 Months Subscription</h5>
                                                    <p class="card-text fs-3 fw-bold">RM 550</p>
                                                    <!-- <button type="submit" class="btn btn-primary subscribe-btn">Subscribe</button> -->
                                                    <button type="submit" class="custom-btn btn-12"><span>Click!</span><span>Subscribe</span></button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Subscription Card - 12 Months -->
                                    <div class="col-md-4">
                                        <div class="card text-dark mar" style="background-color: #DEEDFF;">
                                            <div class="card-body mar1">
                                                <form action="subscription/billplz/billplzpost.php" method="post">
                                                    <!-- Subscription Type (Hidden Input) -->
                                                    <input type="hidden" name="subscription_type" value="12 Month">
                                                    <input type="hidden" name="packagePrice" value="100">
                                                    <input type="hidden" name="amount" value="MYT">
                                                    <input type="hidden" name="name" value="<?= $fullName ?>">
                                                    <input type="hidden" name="email" value="<?= $email ?>">
                                                    <input type="hidden" name="mobile" value="60141234567">
                                                    <input type="hidden" name="usertype" value="<?= $type ?>">
                                                    <input type="hidden" name="userid" class="bg-white text-dark" value="<?= $uid ?>">
                                                    <img src="assets/images/homepage/subs.png" class="img-fluid pb-md-3" alt="">
                                                    <h5 class="card-title subscription-title">12 Months Subscription</h5>
                                                    <p class="card-text subscription-text fs-3 fw-bold">RM 1000</p>
                                                    <!-- <button type="submit" class="btn btn-primary subscribe-btn">Subscribe</button> -->
                                                    <button type="submit" class="custom-btn btn-12"><span>Click!</span><span>Subscribe</span></button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>
    <script>
        function handleCheckboxChangeEdu() {
            const endDateInput = document.getElementById('enddate');
            const presentCheckbox = document.getElementById('presentCheckboxEdu');

            endDateInput.disabled = presentCheckbox.checked;
            if (presentCheckbox.checked) {
                // Clear the value when "Present" is checked
                endDateInput.value = '';
            }
        }

        function limitCharacters(textarea, maxCharacters) {
            const characters = textarea.value.length; // Count all characters, including whitespace
            const characterCountElement = document.getElementById('characterCount');

            if (characters > maxCharacters) {
                textarea.value = textarea.value.slice(0, maxCharacters); // Limit to maximum characters
            }

            characterCountElement.textContent = `Maximum ${maxCharacters} characters`;
        }




        $(document).ready(function() {
            $("#search-input").on("keyup", function() {
                var searchText = $(this).val().toLowerCase();
                $(".search").each(function() {
                    var cardContent = $(this).text().toLowerCase();
                    if (cardContent.indexOf(searchText) == -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });
        });
    </script>
    <?php include 'includes/page-footer.php' ?>