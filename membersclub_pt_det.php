<?php include 'includes/page-head.php';
include('function_material.php');
?>
<style>
    .para {
        text-align: justify;
        line-height: 1.5;
    }

    [data-bs-theme=dark] .form-select {
        --bs-form-select-bg-img: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23000' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
    }

    [data-bs-theme=dark] .btn-close {
        filter: none !important;
        color: black !important;
    }

    .form-select {
        filter: none;
        background-color: white;
        color: black;
    }

    .place::placeholder {
        color: #999999;
        /* Black placeholder text */
    }

    /* Remove the border from the cards */
    .card {
        border: none;
        border-radius: 0;
        /* Optional: This removes the border-radius if you want */
        /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); Add a box shadow for a nice effect */
        border-bottom: none;
        box-shadow: none;
    }

    .card {
        position: relative;
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
</style>


<div class="wrapper bg-white text-dark">
    <?php include 'includes/page-header.php' ?>
    <main class="main-content">
        <div class="container-fluid" style="background-image:url(<?= BASE_URL ?>/assets/images/memberclub/Group_543.png); background-size:100% 100%;background-repeat: no-repeat;">
            <div class="container">
                <div class="row pt-md-5 mt-md-3">
                    <?php
                    if (isset($_GET['id'])) {
                        $userId = $_GET['id'];

                        // Fetch the tutor's details from the database
                        $fetch = "SELECT *
                                    FROM tutorprofiles AS tp
                                    INNER JOIN user_table AS ut ON tp.user_id = ut.uid
                                    WHERE tp.user_id = ?";
                        $stmt = $mysqli->prepare($fetch);
                        $stmt->bind_param('i', $userId);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $title = $row['full_name'];
                            $description = $row['description'];
                            $image = $row['profile_picture'];
                            $grade = $row['grade'];
                            $subject = $row['subject'];
                            $location = $row['location'];
                            $amount = $row['amount'];

                    ?>
                            <div class="col-xl-4 col-md-5 pt-md-5 text-center">
                                <img class="img-fluid" src="<?= BASE_URL ?>/assets/uploads/tutor/profile_pictures/<?= $image ?>" alt="Image" style="border-radius: 20px; height: 500px; width: 380px;">
                            </div>
                            <div class="col-xl-7 offset-xl-1 col-lg-5 pt-md-5 mt-md-4 justify-content-start py-2 ms-5">
                                <div>
                                    <h1 class="fw-bold display-4 Py-3 text-capitalize"><?= $title ?></h1>
                                    <a href="#" class="btn btn-sm rounded-pill px-md-3 my-2 text-white" style="background-color: #0355B0;"><?= $grade ?></a>
                                    <a href="#" class="btn btn-sm rounded-pill px-md-3 my-2 text-white" style="background-color: #0355B0;"><?= $subject ?></a>
                                    <a href="#" class="btn btn-sm rounded-pill px-md-3 my-2 text-white" style="background-color: #0355B0;"><?= $location ?></a>
                                    <a href="#" class="btn btn-sm rounded-pill px-md-3 my-2 text-white" style="background-color: #0355B0;"><?= $amount ?></a>
                                </div>
                                <div class="mt-md-5 pt-md-3 py-3">
                                    <p class="content para"><?= $description ?></p>
                                </div>
                                <div class="pt-md-5"></div>
                                <?php
                                $profileId = $_GET['id']; // or however you get the profile ID from URL

                                // Fetch the profile details
                                $query = "SELECT * FROM tutorprofiles WHERE user_id = ?";
                                $stmt = $mysqli->prepare($query);
                                $stmt->bind_param("i", $profileId);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $profile = $result->fetch_assoc();
                                ?>
                                <div class="mt-md-3 pt-md-3 text-end">
                                    <?php
                                    if (isset($_SESSION['uid'])) {
                                        $loggedInUserId = $_SESSION['uid']; // Assuming the user's ID is stored in the session

                                        if ($profile) {
                                            $profileUserId = $profile['user_id']; // The ID of the profile being viewed

                                            if ($loggedInUserId == $profileUserId) {
                                                // If the profile belongs to the logged-in user, show the Edit Profile button
                                    ?>
                                                <a href="#" class="btn btn-warning rounded-pill px-md-5 fw-bold" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</a>

                                            <?php
                                            } else {
                                                // If the profile does not belong to the logged-in user, show the Register Now button
                                            ?>
                                                <a href="#" class="btn btn-warning rounded-pill px-md-5 fw-bold" data-bs-toggle="modal" data-bs-target="#registerModal">Register Now</a>
                                        <?php
                                            }
                                        } else {
                                            // Handle case where profile data could not be fetched
                                            echo "Profile data could not be loaded.";
                                        }
                                    } else {
                                        // If the user is not logged in, show the Register Now button
                                        ?>
                                        <a href="#" class="btn btn-warning rounded-pill px-md-5 fw-bold" data-bs-toggle="modal" data-bs-target="#registerModal">Register Now</a>
                                    <?php
                                    }
                                    ?>
                                </div>




                            </div>
                </div>
        <?php
                        } else {
                            echo "Profile not found.";
                        }
                        $stmt->close();
                    } else {
                        echo "No ID provided.";
                    }
        ?>
            </div>
        </div>

        <!-- Second section -->
        <div class="container bg-white mt-md-5">
            <div class="row py-md-5">
                <!-- Left Section: Text -->
                <div class="col-md-6 ms-md-4">
                    <div class="mt-md-3 mb-md-5">
                        <h2 class="fw-bold">Terms and Conditions</h2>
                        <p class="ps-md-3">Before booking a tutor, please review the following terms and conditions:</p>
                        <ul class="ps-md-5 ms-md-4" start="1">
                            <li>All bookings must be made at least 24 hours in advance.</li>
                            <li>Cancellations must be done at least 12 hours prior to the scheduled session to avoid any charges.</li>
                            <li>Payment for the tutoring session must be completed before the session begins.</li>
                            <li>Tutors reserve the right to terminate a session if inappropriate behavior is exhibited.</li>
                            <li>Rescheduling of sessions is allowed only once per booking.</li>
                            <li>Feedback and rating of the tutor are encouraged after each session.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid MlSysSurfaceContainerLow">
            <h2 class="p-md-5 text-center"></h2>
            <div class="container">
                <div class="container">
                    <div class="row mb-2">

                        <?php
                        $fetch = "SELECT *
                                    FROM tutorprofiles AS tp
                                    INNER JOIN user_table AS ut ON tp.user_id = ut.uid
                                    WHERE profile_status='1';";
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
                                // Open a new row if this is the first item or a multiple of 4
                                if ($counter > 0 && $counter % 4 == 0) {
                                    echo '</div><div class="row g-3 mb-2">';
                                }
                        ?>

                                <div class="col-md-3 pb-3 search">
                                    <div class="card bg-white text-dark rounded">
                                        <img src="<?= BASE_URL ?>/assets/uploads/tutor/profile_pictures/<?= $image ?>" class="card-img-top rounded" alt="Profile Image" style="height: 415px; object-fit: cover;">
                                        <a href="membersclub_pt_det.php?id=<?= $userId ?>&teacher=<?= urlencode($title) ?>" class="see-profile">See Profile</a>
                                        <div class="card-body justify-content-between">
                                            <h4 class="fw-bold text-capitalize" style="color: #00308D;"><?= $title ?></h4>
                                            <p class="card-text"><?= $limitedDescription ?></p>
                                        </div>
                                    </div>
                                </div>
                        <?php
                                $counter++;
                            }
                            echo '</div></div>'; // Close the last row and the container
                        } else {
                            echo "No Tutor Available.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
</div>
</main>
</div>

<!-- The modal START-->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content bg-white text-dark">
            <div class="modal-header border-0">
                <h5 class="modal-title fw-bold" id="editProfileModalLabel" style="color: #0355B0;">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Edit profile form -->
                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <input type="hidden" class="bg-white text-dark" name="userid" value="<?= $uid ?>">
                    <div class="mb-3">
                        <label for="subject" class="form-label fw-bold">Subject/skill</label>
                        <input type="text" class="form-control bg-white text-dark place" id="subject" name="subject" placeholder="Enter the main subject/skill you teach" required value="<?= htmlspecialchars($profile['subject']) ?>">
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="location" class="form-label fw-bold">Location</label>
                            <input type="text" class="form-control bg-white text-dark place" id="location" name="location" placeholder="Enter locality e.g. JP Nagar" required value="<?= htmlspecialchars($profile['location']) ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="collegename" class="form-label">College Name:</label>
                            <input type="text" class="form-control bg-white text-dark place" id="collegename" name="collegename" placeholder="E.g., ABC University" required value="<?= htmlspecialchars($profile['collegename']) ?>">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="coursename" class="form-label">Course Name:</label>
                            <input type="text" class="form-control bg-white text-dark place" id="coursename" name="coursename" placeholder="E.g., Computer Science" required value="<?= htmlspecialchars($profile['coursename']) ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label for="startdate" class="form-label">Start Date:</label>
                            <input type="date" class="form-control bg-white text-dark place" id="startdate" name="startdate" required value="<?= htmlspecialchars($profile['startdate']) ?>">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="enddate" class="form-label">End Date:</label>
                            <div class="input-group">
                                <input type="date" class="form-control bg-white text-dark place" id="enddate" name="enddate" value="<?= htmlspecialchars($profile['enddate']) ?>" placeholder="Select end date">
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label for="presentCheckboxEdu" class="form-label">Present:</label>
                            <div class="input-group-text">
                                <input class="form-check-input place" type="checkbox" name="presentCheckboxEdu" id="presentCheckboxEdu" value="Present" <?= $profile['enddate'] === 'Present' ? 'checked' : '' ?> onchange="handleCheckboxChangeEdu()">
                                <label class="form-check-label px-1 bg-white text-dark place" for="presentCheckboxEdu"> Present</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-12">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control bg-white text-dark place" id="description" name="description" rows="3" oninput="limitCharacters(this, 500)" placeholder="Enter a brief description about yourself and your hobbies..."><?= htmlspecialchars($profile['description']) ?></textarea>
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
                                        $selected = $row['grade_name'] . ' ' . $row['grade'] == $profile['grade'] ? 'selected' : '';
                                        echo '<option value="' . $row['grade_name'] . ' ' . $row['grade'] . '" ' . $selected . '>' . $row['grade_name'] . ' ' . $row['grade'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="amount" class="form-label fw-bold">Charges per Session</label>
                            <input type="number" class="form-control bg-white text-dark place" id="amount" name="amount" placeholder="Enter charges per session" required value="<?= htmlspecialchars($profile['amount']) ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="gender" class="form-label fw-bold">Select Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="Male" <?= $profile['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= $profile['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="skills" class="form-label fw-bold">Skills</label>
                            <input type="text" class="form-control bg-white text-dark place" id="skills" name="skills" placeholder="Enter your skills" required value="<?= htmlspecialchars($profile['skills']) ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="experience" class="form-label fw-bold">Experience (in years)</label>
                            <input type="number" class="form-control bg-white text-dark place" id="experience" name="experience" placeholder="Enter your experience" value="<?= htmlspecialchars($profile['experience']) ?>">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="experienceCertificate" class="form-label fw-bold">Experience Certificate</label>
                            <input type="file" class="form-control bg-white text-dark" id="experienceCertificate" name="experienceCertificate">
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="educationCertificates" class="form-label fw-bold">Education Certificates</label>
                            <input type="file" class="form-control bg-white text-dark" id="educationCertificates" name="educationCertificates[]" multiple>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="profilepicture" class="form-label fw-bold">Profile Picture</label>
                            <input type="file" class="form-control bg-white text-dark" id="profilepicture" name="profilepicture" accept="image/*" multiple>
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
                            <input type="time" class="form-control bg-white text-dark place" id="fromTime" name="fromTime" placeholder="Enter your available time" required value="<?= htmlspecialchars($profile['from_time']) ?>">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="toTime" class="form-label fw-bold">To Time</label>
                            <input type="time" class="form-control bg-white text-dark place" id="toTime" name="toTime" placeholder="Enter your available time" required value="<?= htmlspecialchars($profile['to_time']) ?>">
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn rounded-pill btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn rounded-pill text-white" name="edit_tutor_profile" style="background-color: #0355B0;">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- The modal END-->


<!-- The modal START-->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg bg-white">
        <div class="modal-content bg-white text-dark p-md-2">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title" id="registerModalLabel">Register</h5>
                <!-- Step 1: List of Children -->
                <div id="step1">
                    <!-- List of Children will be dynamically loaded here using PHP -->
                    <div id="childrenList">
                        <?php
                        $u_id = $_SESSION['uid'];
                        $dbQueryChildren = "SELECT student_profile.*, user_table.full_name FROM student_profile INNER JOIN user_table ON student_profile.user_id=user_table.uid WHERE student_profile.parent_id=$u_id";
                        $dbResultChildren = $mysqli->query($dbQueryChildren);

                        if ($dbResultChildren && $dbResultChildren->num_rows > 0) {
                            while ($child = $dbResultChildren->fetch_assoc()) {
                                $childId = $child['user_id'];
                                $childName = $child['full_name'];
                                $childGrade = $child['grade'];
                        ?>
                                <div class="row pb-md-3">
                                    <div class="col pt-2 mt-2">
                                        <input type="checkbox" class="form-check-input child-checkbox" id="child<?= $childId ?>" value="<?= $childId ?>" name="children[]" data-childname="<?= $childName ?>">
                                        <label class="form-check-label" for="child<?= $childId ?>"><?= $childName ?></label>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo '<div class="bg-white text-dark">No children found</div>';
                        }
                        ?>
                    </div>
                    <button id="nextButton" class="btn rounded-pill px-md-3 text-white mb-2" style="background-color: #0355b0;">Next</button>
                </div>

                <!-- Step 2: Input Fields for each child -->
                <div id="step2Container" style="display: none;">
                    <!-- Placeholder for dynamically generated step 2 modals -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The modal END-->


<script>
    $(document).ready(function() {
        $('#nextButton').click(function() {
            var selectedChildren = [];
            $('input[name="children[]"]:checked').each(function() {
                selectedChildren.push({
                    id: $(this).val(),
                    name: $(this).data('childname')
                });
            });

            if (selectedChildren.length > 0) {
                $('#step1').hide();
                generateStep2Modals(selectedChildren);
                $('#step2Container').show();
            } else {
                alert('Please select at least one child.');
            }
        });

        function generateStep2Modals(children) {
            $('#step2Container').empty();
            children.forEach(function(child) {
                var tutorId = getUrlParameter('id');
                var teacherName = getUrlParameter('teacher'); // Extract teacher name from URL parameter
                $.ajax({
                    url: 'fetch_tutor_details.php',
                    type: 'POST',
                    data: {
                        tutor_id: tutorId
                    },
                    success: function(response) {
                        try {
                            var data = JSON.parse(response);
                            var modalContent = '<div id="step2Child' + child.id + '">' +
                                '<h5>Child: ' + child.name + '</h5>' +
                                '<div class="row">' +
                                '<div class="mb-3 col-md-4">' +
                                '<label for="pricePerSessionChild' + child.id + '" class="form-label">Price per Session:</label>' +
                                '<p id="pricePerSessionChild' + child.id + '" class="form-control-static">' + data.amount + '</p>' +
                                '</div>' +
                                '<div class="mb-3 col-md-4">' +
                                '<label for="totalPriceChild' + child.id + '" class="form-label">Total Price:</label>' +
                                '<p id="totalPriceChild' + child.id + '" class="form-control-static">0</p>' +
                                '</div>' +
                                '<div class="mb-3 col-md-4">' +
                                '<label for="availableTimeChild' + child.id + '" class="form-label">Available Time:</label>' +
                                '<p id="availableTimeChild' + child.id + '" class="form-control-static">' + data.from_time + ' to ' + data.to_time + '</p>' +
                                '</div>' +
                                '</div>' +
                                '<div class="row">' +
                                '<div class="mb-3 col-md-4">' +
                                '<label for="subjectChild' + child.id + '" class="form-label">Subject:</label>' +
                                '<p id="subjectChild' + child.id + '" class="form-control-static">' + data.subject + '</p>' +
                                '</div>' +
                                '<div class="mb-3 col-md-4">' +
                                '<label for="locationChild' + child.id + '" class="form-label">Location:</label>' +
                                '<p id="locationChild' + child.id + '" class="form-control-static">' + data.location + '</p>' +
                                '</div>' +
                                '</div>' +
                                '<div class="row">' +
                                '<div class="mb-3 col-md-6">' +
                                '<label for="startDateChild' + child.id + '" class="form-label">From Date:</label>' +
                                '<input type="date" class="form-control" id="startDateChild' + child.id + '" required>' +
                                '</div>' +
                                '<div class="mb-3 col-md-6">' +
                                '<label for="endDateChild' + child.id + '" class="form-label">To Date:</label>' +
                                '<input type="date" class="form-control" id="endDateChild' + child.id + '" required>' +
                                '</div>' +
                                '</div>' +
                                '<div class="row">' +
                                '<div class="mb-3 col-md-6">' +
                                '<label for="bookingOptionChild' + child.id + '" class="form-label">Booking Option:</label>' +
                                '<select class="form-select" id="bookingOptionChild' + child.id + '" required>' +
                                '<option value="" disabled selected>Select a booking option</option>' +
                                '<option value="one-time">One-time</option>' +
                                '<option value="specific-day">Every Specific Day</option>' +
                                '</select>' +
                                '</div>' +
                                '<div class="mb-3 col-md-6">' +
                                '<label for="timeSlotChild' + child.id + '" class="form-label">Time Slot:</label>' +
                                '<select class="form-select" id="timeSlotChild' + child.id + '" required>' +
                                '<option value="" disabled selected>Select a time slot</option>' +
                                '</select>' +
                                '</div>' +
                                '</div>' +
                                '<div class="mb-3" id="specificDayOptionsChild' + child.id + '" style="display: none;">' +
                                '<label for="specificDayChild' + child.id + '" class="form-label">Select Day:</label>' +
                                '<select class="form-select" id="specificDayChild' + child.id + '">' +
                                '<option value="monday">Monday</option>' +
                                '<option value="tuesday">Tuesday</option>' +
                                '<option value="wednesday">Wednesday</option>' +
                                '<option value="thursday">Thursday</option>' +
                                '<option value="friday">Friday</option>' +
                                '<option value="saturday">Saturday</option>' +
                                '<option value="sunday">Sunday</option>' +
                                '</select>' +
                                '</div>' +
                                '<button class="bookNowButton btn rounded-pill px-md-3 text-white mb-2" style="background-color: #0355b0;" data-childid="' + child.id + '">Book Now</button>' +
                                '<hr>' +
                                '</div>';

                            $('#step2Container').append(modalContent);

                            // Populate time slots
                            populateTimeSlots(child.id, data.from_time, data.to_time);

                            // Attach event listeners to date inputs to recalculate the total price
                            $('#startDateChild' + child.id + ', #endDateChild' + child.id).on('change', function() {
                                updateTotalPrice(child.id, data.amount);
                            });

                            // Attach event listener to Book Now button
                            $('#step2Child' + child.id + ' .bookNowButton').on('click', function() {
                                var bookingOption = $('#bookingOptionChild' + child.id).val();
                                var fromDate = new Date($('#startDateChild' + child.id).val());
                                var toDate = new Date($('#endDateChild' + child.id).val());
                                var totalAmount = parseFloat($('#totalPriceChild' + child.id).text());

                                var selectedDay = '';
                                var category = bookingOption;
                                if (bookingOption === 'specific-day') {
                                    selectedDay = $('#specificDayChild' + child.id).val();
                                } else {
                                    selectedDay = 'daily';
                                }

                                var bookingData = {
                                    childId: child.id,
                                    childName: child.name,
                                    tutorId: tutorId,
                                    teacherName: teacherName,
                                    price: totalAmount,
                                    from: $('#startDateChild' + child.id).val(),
                                    to: $('#endDateChild' + child.id).val(),
                                    slot: $('#timeSlotChild' + child.id).val(),
                                    subject: data.subject,
                                    location: data.location,
                                    category: category,
                                    selectedDay: selectedDay
                                };

                                // Send booking data to server
                                $.ajax({
                                    url: 'store_booking.php',
                                    type: 'POST',
                                    data: bookingData,
                                    success: function(response) {
                                        // Handle success response if needed
                                        alert(response);
                                        console.log(response);
                                    },
                                    error: function(xhr, status, error) {
                                        console.error(error);
                                        alert('Failed to book session.');
                                    }
                                });
                            });
                        } catch (error) {
                            console.error(error);
                            alert('Failed to parse server response.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        alert('Failed to fetch tutor details.');
                    }
                });
            });
        }

        function populateTimeSlots(childId, fromTime, toTime) {
            var selectElement = $('#timeSlotChild' + childId);
            var startTime = new Date('01/01/2000 ' + fromTime);
            var endTime = new Date('01/01/2000 ' + toTime);
            var currentTime = new Date(startTime);

            while (currentTime <= endTime) {
                var option = $('<option>').val(currentTime.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                })).text(currentTime.toLocaleTimeString([], {
                    hour: '2-digit',
                    minute: '2-digit'
                }));
                selectElement.append(option);
                currentTime.setMinutes(currentTime.getMinutes() + 30); // Increment by 30 minutes
            }
        }

        function updateTotalPrice(childId, pricePerSession) {
            var bookingOption = $('#bookingOptionChild' + childId).val();
            var fromDate = new Date($('#startDateChild' + childId).val());
            var toDate = new Date($('#endDateChild' + childId).val());

            if (fromDate && toDate) {
                var timeDifference = Math.abs(toDate - fromDate);
                var daysDifference = Math.ceil(timeDifference / (1000 * 60 * 60 * 24)); // Number of days between the dates

                var totalAmount;

                if (bookingOption === 'specific-day') {
                    var specificDay = $('#specificDayChild' + childId).val();
                    totalAmount = calculateWeeklyTotal(fromDate, toDate, specificDay, pricePerSession);
                } else {
                    totalAmount = pricePerSession * daysDifference;
                }

                $('#totalPriceChild' + childId).text(totalAmount.toFixed(2));
            }
        }

        function calculateWeeklyTotal(fromDate, toDate, specificDay, pricePerSession) {
            var totalSessions = 0;
            var currentDate = new Date(fromDate);

            // Map the day names to their corresponding numbers (0-6)
            var dayMap = {
                'sunday': 0,
                'monday': 1,
                'tuesday': 2,
                'wednesday': 3,
                'thursday': 4,
                'friday': 5,
                'saturday': 6
            };

            var targetDay = dayMap[specificDay.toLowerCase()];

            while (currentDate <= toDate) {
                if (currentDate.getDay() === targetDay) {
                    totalSessions++;
                }
                currentDate.setDate(currentDate.getDate() + 1);
            }

            return totalSessions * pricePerSession;
        }

        // Function to extract query parameters from URL
        function getUrlParameter(name) {
            name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
            var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
            var results = regex.exec(location.search);
            return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
        }

        // Show or hide specific day options based on booking option selection
        $(document).on('change', '[id^=bookingOptionChild]', function() {
            var childId = $(this).attr('id').replace('bookingOptionChild', '');
            if ($(this).val() === 'specific-day') {
                $('#specificDayOptionsChild' + childId).show();
            } else {
                $('#specificDayOptionsChild' + childId).hide();
            }
        });
    });

    function handleCheckboxChangeEdu() {
        const endDateInput = document.getElementById('enddate');
        const presentCheckbox = document.getElementById('presentCheckboxEdu');

        endDateInput.disabled = presentCheckbox.checked;
        if (presentCheckbox.checked) {
            // Clear the value when "Present" is checked
            endDateInput.value = '';
        }
    }
</script>




<?php include 'includes/page-footer.php' ?>