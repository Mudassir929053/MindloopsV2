<?php
// include('../config/connection.php');
// var_dump($mysqli);
// exit;
include('function/function.php');
include_once 'includes/head.php';
?>
<?php
// Check if the 'uid' parameter is set in the URL
if (isset($_GET['uid']) && isset($_GET['id'])) {
    // Retrieve the 'uid' value from the URL
    $userId = $_GET['uid'];
    $tutorId = $_GET['id'];
} else {
    // Handle the case where 'uid' parameter is not set
    echo "UID parameter is missing from the URL";
}
?>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        list-style: none;
        font-family: "Montserrat", sans-serif;
        color: black;
    }

    .bold {
        font-weight: 600;
        font-size: 12px;
        text-transform: uppercase;
    }


    .resume {
        width: 790px;
        height: fit-content;
        display: flex;
        margin: auto;
    }

    .resume .resume_left {
        width: 240px;
        background: #26252d;
    }

    .resume .resume_left .resume_profile {
        width: 100%;
        height: 180px;
    }

    .resume .resume_left .resume_content {
        padding: 0 25px;
    }

    .resume .title {
        margin-bottom: 20px;
    }

    .resume .resume_left .bold {
        color: #fff;
    }

    .resume .resume_left .regular {
        color: #b1eaff;
    }

    .resume .resume_item {
        padding: 11px 0;
        border-bottom: 2px solid #b1eaff;
    }

    .resume .resume_left .resume_item:last-child,
    .resume .resume_right .resume_item:last-child {
        border-bottom: 0px;
    }


    .resume .resume_right {
        width: 520px;
        background: #fff;
        padding: 25px;
    }

    .resume .resume_right .bold {
        color: #0bb5f4;
    }

    .page {
        width: 21cm;
        min-height: 29.7cm;
        padding: 2cm;
        /* padding-top:5px; */
        margin: 1cm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .expdesc {
        text-align: justify;
    }

    .positioned {
        position: static;
    }

    #menu {
        display: none;
    }

    .para {
        text-align: justify;
        line-height: 1.5;
    }

    .para ul li {
        list-style: disc;
    }

    .resume_skills ul li {
        list-style: disc;
    }

    #content,
    #endpage,
    #startpage {
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }

    @media print {
        body * {
            visibility: hidden;
        }

        #pdf,
        #pdf * {
            visibility: visible;
        }

        #pdf {
            position: absolute;
            left: 0;
            top: 0;
        }
    }

    .time-label {
        font-weight: bold;
        color: white;
        margin-right: 5px;


    }

    @media print {

        /* Styles for print view */
        .page-container {
            /* Override styles for print view */
            background-color: transparent;
            /* Reset background color */
            border: none;
            /* Remove border */
            min-height: 0vh;

        }
    }
</style>
<?php
include_once 'includes/sidebar.php';
?>

<body>
    <!-- #Main ============================ -->
    <div class="page-container">
        <?php include_once 'includes/header.php'; ?>
        <main class='main-content bgc-grey-100'>
            <div class="container">
                <?php
                $query = "SELECT *
            FROM tutorprofiles AS tp
            INNER JOIN user_table AS ut ON tp.user_id = ut.uid 
            WHERE ut.uid = ? AND tp.id = ?";

                // Prepare the statement
                $stmt = $mysqli->prepare($query);

                // Bind the parameters
                $stmt->bind_param("ii", $userId, $tutorId);

                // Execute the statement
                $stmt->execute();

                // Get the result set
                $result = $stmt->get_result();

                // Check if there are rows returned
                if ($result->num_rows > 0) {
                    $count = 1;
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="resume shadow-lg p-3 bg-body rounded border border-dark" id="pdf">
                            <div class="resume_left">
                                <div class="row">
                                    <div class="col resume_profile text-center">
                                        <img src="<?= BASE_URL ?>/assets/uploads/tutor/profile_pictures/<?= $row['profile_picture'] ?>" alt="" class="pt-2" style="width: 220px; height: 250px;border-radius: 20px;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col resume_content">
                                        <div class="resume_item resume_info mt-5 pt-5">
                                            <p class="bold">Tutor Profile</p>
                                        </div>
                                        <div class="resume_item resume_info pb-4">
                                            <p class="bold">Contact</p>
                                            <ul>
                                                <div style="color:white;">Address</div>
                                                <div class="text-info text-break text-capitalize">
                                                    <?php if (!empty($row['location'])) {
                                                        echo $row['location'];
                                                    } else {
                                                        echo "No address";
                                                    } ?>
                                                </div>
                                                <div style="color:white;">Phone</div>
                                                <div class="">
                                                </div>
                                                <div class="text-info">
                                                    <?php if (!empty($row['mobile'])) {
                                                        echo $row['mobile'];
                                                    } else {
                                                        echo "No contact";
                                                    } ?>
                                                </div>
                                                <div style="color:white;">Email</div>
                                                <div class="">
                                                </div>
                                                <div class="text-info">
                                                    <?php if (!empty($row['email'])) {
                                                        echo $row['email'];
                                                    } else {
                                                        echo "No email";
                                                    } ?>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="resume_item resume_subject pb-4">
                                            <div class="title">
                                                <p class="bold">Subject/Skill To Teach</p>
                                            </div>
                                            <ul>
                                                <?php if (!empty($row['subject'])) : ?>
                                                    <li class="text-info"><?= $row['subject'] ?></li>
                                                <?php else : ?>
                                                    <li class="text-info">No Subject/Skill</li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div class="resume_item resume_skills pb-4">
                                            <p class="bold">skill's</p>
                                            <ul>
                                                <?php
                                                // Split the skills string into an array using the comma as a delimiter
                                                $skillsArray = explode(',', $row['skills']);

                                                // Iterate over the skills array to generate list items
                                                foreach ($skillsArray as $skill) {
                                                    // Trim any whitespace from the skill
                                                    $skill = trim($skill);
                                                    // Output the skill as a list item
                                                    echo "<li class='text-info text-capitalize'>$skill</li>";
                                                }
                                                ?>
                                            </ul>

                                            <?php
                                            if (empty($row['skills'])) : ?>
                                                <div class="text-info">
                                                    <ol>
                                                        <div class="text-info">
                                                            <li> No Skills</li>
                                                        </div>
                                                    </ol>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="resume_item resume_availability pb-5">
                                            <div class="title">
                                                <p class="bold">Available Time</p>
                                            </div>
                                            <ul>
                                                <?php if (!empty($row['from_time']) && !empty($row['to_time'])) : ?>
                                                    <li class="text-info">
                                                        <span class="time-label">From :</span> <?= date("h:i A", strtotime($row['from_time'])) ?><br>
                                                        <span class="time-label">To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</span> <?= date("h:i A", strtotime($row['to_time'])) ?>
                                                    </li>
                                                <?php else : ?>
                                                    <li class="text-info">Not Available</li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="resume_right">
                                <div class="resume_item resume_namerole">
                                    <div class="name">
                                        <h3 class="text-capitalize"><?= $row['full_name'] ?></h3>
                                    </div>
                                    <?php if (!empty($row['email'])) : ?>
                                        <a href="#" class="link-success"><?= $row['email']; ?></a>
                                    <?php else : ?>
                                        <p>No Email-id provided.</p>
                                    <?php endif; ?>
                                </div>

                                <div class="resume_item resume_about">
                                    <div class="title">
                                        <p class="name">
                                        <h3>About Tutor:</h3>
                                        </p>
                                    </div>
                                    <div>
                                        <?php if (!empty($row['description'])) : ?>
                                            <p class="content para"><?= $row['description']; ?></p>
                                        <?php else : ?>
                                            <h5>No Data Available</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="resume_item resume_education">
                                    <div class="title">
                                        <h3>Education :</h3>
                                    </div>
                                    <div class="text-break">
                                        <?php if (!empty($row['collegename']) && !empty($row['coursename']) && !empty($row['startdate'])) : ?>
                                            <p class="content para">
                                                <?= $row['collegename']; ?><br>
                                                <?= $row['coursename']; ?><br>
                                                <?= date('M Y', strtotime($row['startdate'])); ?> -
                                                <?php if ($row['enddate'] === null) : ?>
                                                    Present
                                                <?php else : ?>
                                                    <?= date('M Y', strtotime($row['enddate'])); ?>
                                                <?php endif; ?>
                                            </p>
                                        <?php else : ?>
                                            <h5>No Data Available</h5>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="resume_item resume_experience">
                                    <div class="title">
                                        <h3>Experience:
                                            <?php if (!empty($row['experience'])) : ?>
                                                <span class="h4 text-info"><?= $row['experience'] ?> Years</span>
                                            <?php else : ?>
                                                <h5>No Experience Available</h5>
                                            <?php endif; ?>
                                        </h3>
                                    </div>

                                    <?php if (!empty($row['experience'])) : ?>
                                        <div class="content para">
                                            <ul>
                                                <li>Passionate about sharing knowledge and fostering growth in students.</li>
                                                <li>Skilled in creating personalized learning experiences to meet diverse student needs.</li>
                                                <li>Demonstrated ability to motivate and inspire students to achieve their full potential.</li>
                                                <li>Experienced in leveraging technology to enhance learning outcomes.</li>
                                            </ul>
                                        </div>

                                    <?php endif; ?>
                                </div>


                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo '<h2>No Tutors Profile found.</h2>';
                }
                // Free the result set
                $result->free();

                // Close the statement
                $stmt->close();
                ?>
                <div class="text-center mt-4">
                    <a href="<?= BASE_URL ?>/admin/tutor_profile.php" type="button" class="btn btn-default btn-sm fw-bold fs-6 mb-5 text-white" style="background-color: #0355B0;">
                        <i class="fa-solid fa-arrow-left text-white"></i> Back
                    </a>
                    <button type="button" class="btn btn-default btn-sm fw-bold fs-6 mb-5 mx-3 text-white" style="background-color: #0355B0;" onclick="printResume()">
                        <i class="fa-solid fa-print text-white"></i> Print
                    </button>
                </div>
            </div>
        </main>
    </div>
</body>
<script>
    function printResume() {
        var printContents = document.getElementById('pdf').innerHTML;
        window.print(printContents);
    }
</script>
<?php
include_once 'includes/footer.php';
// $mysqli->close();
?>