<?php include 'includes/page-head.php';
include('function_material.php');
?>

<style>
    [data-bs-theme=dark] .btn-close {
        filter: none !important;
        color: black !important;
    }

    [data-bs-theme=dark] .form-select {
        --bs-form-select-bg-img: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23000' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
    }

    .form-select {
        filter: none;
        background-color: white;
        color: black;
    }


    .wrapper {
        min-height: 0vh !important;
    }

    .btn-check {
        color: black;
    }

    .dasboard-proper-content {
        transition: transform 0.2s;
    }

    .dasboard-proper-content:hover {
        transform: scale(1.1);
    }

    .lesson-title {
        display: none;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background-color: rgba(255, 255, 255, 0.6);
        /* padding: 1px; */
        color: #0355B0;
        text-align: center;
        font-weight: bold;
    }

    .lesson-image-container:hover .lesson-title {
        display: block;
    }

    /* Default styles */
    .btn-check:focus+.btn-outline-secondary.rounded-pill,
    .btn-check:checked+.btn-outline-secondary.rounded-pill {
        border: 2px solid #0355B0;
        background-color: #fff;
        color: #0355B0;
    }

    /* Hover styles */
    .btn-check:hover+.btn-outline-secondary.rounded-pill {
        border-color: #0355B0;
        background-color: #fff;
        color: #0355B0;
    }

    /* Default text color */
    .btn-outline-secondary.rounded-pill {
        border: 2px solid #B3B3B3;
        color: #000;
    }

    .drop-zone {
        /* max-width: 200px; */
        height: 300px;
        padding: 25px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-family: "Quicksand", sans-serif;
        font-weight: 500;
        font-size: 20px;
        cursor: pointer;
        color: #000;
        border: 4px dashed #C2DEFF;
        border-radius: 10px;
        overflow: hidden;
        /* Ensure content doesn't overflow */
    }

    .drop-zone--over {
        /* border-style: solid; */
        border: 4px solid #0355B0;

    }

    .drop-zone__input {
        display: none;
    }

    .drop-zone__thumb {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        overflow: hidden;
        background-color: #cccccc;
        background-size: cover;
        position: relative;
    }

    .drop-zone__thumb::after {
        content: attr(data-label);
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 5px 0;
        color: #ffffff;
        background: rgba(0, 0, 0, 0.75);
        font-size: 14px;
        text-align: center;
    }
</style>
<?php
extract($_GET);
$query = "SELECT do_id FROM doit_online WHERE lesson_id=$id AND do_status='1'";
$run = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
$total = mysqli_num_rows($run);
$row = mysqli_fetch_all($run);
// var_dump($row);
// exit;
$array = [];
shuffle($row);
foreach ($row as $a) {
    array_push($array, $a[0]);
}
// echo json_encode($array);
// exit;
// echo "<pre>";
// print_r($array);
// echo "</pre>";
$_SESSION['do_question'] = $_SESSION['allquestions'] = $array;
// print_r($row);
// $qno = $row['qno'];
// $qno++;
$_SESSION['attemptedq'] = [];
?>
<?php
$u_id = $_SESSION['uid'];
if ($role == 4) {
    $dbQuery = "SELECT * FROM `user_table` ut
    RIGHT JOIN student_profile sp
    ON ut.uid = sp.user_id
    RIGHT JOIN grade_table gt
    ON sp.grade = gt.grade_id
    WHERE uid = '$u_id'";
    // exit;
    $dbResult = $mysqli->query($dbQuery);
    $dbRow = $dbResult->fetch_assoc();
    $grade_id = $dbRow['grade_id'];
}



?>

<?php
// Check if lesson_id and type parameters are set in the URL
if (isset($_GET['id']) && isset($_GET['type'])) {
    $lesson_id = $_GET['id'];
    $type = $_GET['type'];

    if ($type == 'lp') {
        $type = "lesson_plan";
    } else if ($type == 'ws') {
        $type = "worksheet";
    } else if ($type == 'sn') {
        $type = "supplementary_note";
    } else if ($type == 'qz') {
        $type = "quiz";
    } else if ($type == 'pb') {
        $type = "performance_based_activity";
    }
}
function generateDownloadLink($row, $type)
{
    // Define a base directory for lesson downloads
    $downloadBaseDir = BASE_URL . '/assets/uploads/lesson/';

    // Determine the download file name based on the type
    $downloadFileName = '';
    if ($type)
        $downloadFileName = $row[$type];


    // Generate the download link
    $downloadLink = $downloadBaseDir . $downloadFileName;

    return $downloadLink;
}

if ($type == 'worksheet') {
    // Fetch doit-online Test Details
    $querycheck = mysqli_query($mysqli, "SELECT  `user_id`, `lesson_id` FROM `score_table` WHERE user_id=$u_id and lesson_id=$lesson_id");
    $rowtest = mysqli_num_rows($querycheck);

    // Execute the query to count the number of rows where score is 1
    $countQuery = "SELECT COUNT(*) AS score FROM score_table WHERE user_id = $u_id AND lesson_id = $lesson_id AND score = 1";
    $countResult = mysqli_query($mysqli, $countQuery);

    if ($countResult) {
        $row = mysqli_fetch_assoc($countResult);
        $score = $row['score'];
    } else {
        // Handle query error
        $score = 0; // Set default score
    }

    // Execute the query to get the total number of scores
    $totalQuery = "SELECT COUNT(*) AS total FROM score_table WHERE user_id = $u_id AND lesson_id = $lesson_id";
    $totalResult = mysqli_query($mysqli, $totalQuery);

    if ($totalResult) {
        $row = mysqli_fetch_assoc($totalResult);
        $total = $row['total'];
    } else {
        // Handle query error
        $total = 0; // Set default total
    }

    // Calculate percentage score
    $percentageScore = ($total > 0) ? round(($score / $total) * 100) : 0;
}
?>


<body class="bg-white text-dark">
    <?php include 'includes/page-header.php' ?>
    <div class="wrapper">
        <main class="main-content">
            <!-- Start of Leader Board -->
            <!-- <div class="container">
                <div class="row p-md-4"> -->
            <!-- <div class="col-12 leader">
                        <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid" alt="Card 1">
                    </div> -->
            <!-- </div>
            </div> -->
            <!--End of Leader Board -->
            <!--Start of mind-booster content layer 1 -->
            <?php
            // Fetch lesson content based on $lesson_id and $type
            $sqlcontent = "SELECT * FROM `lesson_table` l 
                        LEFT JOIN subject_table s 
                        ON s.subject_id = l.subject_id
                        LEFT JOIN grade_table g 
                        ON g.grade_id = l.grade_id WHERE lesson_id = $lesson_id AND  $type IS NOT NULL";

            $result = $mysqli->query($sqlcontent);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $lesson_id = $row['lesson_id'];
                    $images = $row['images'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $lesson_name = $row['title'];
                    $grade_id = $row['grade_id'];
            ?>



                    <div class="container-fluid MlSysSurfaceContainerLow">
                        <div class="container p-md-5">
                            <div class="row bg-white" style="border-radius: 15px;">
                                <div class="col-12 mb-sm-0">
                                    <div class="m-md-4 bg-white">
                                        <div class="m-2 bg-white">
                                            <div class="row bg-white">
                                                <div class="col-md-5" style="background-image: url(<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>);background-repeat: none; background-size: 100% 100%;border-radius: 10px;">
                                                    <!-- <div class="col-lg-5 col-md-12" style="background-color: #C4C7CE;border-radius: 10px;"> -->
                                                    <!-- <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" loading="lazy" class="img-fluid rounded" alt="Image" style=""> -->
                                                </div>
                                                <div class="col-lg-6 ps-3 col-md-12 text-dark bg-white">
                                                    <p class="py-3" style="font-weight: 100;">
                                                        <?php echo $row['grade_name'] . ' ' . $row['grade']; ?>
                                                        &nbsp;|&nbsp; <?php echo $row['subject_name']; ?>
                                                        &nbsp;|&nbsp; <?php echo str_replace('_', ' ', ucfirst($type)); ?>
                                                    </p>
                                                    <h3 style="color: #0355B0;"><?php echo $lesson_name; ?></h3>
                                                    <?php
                                                    // Limit the description to 410 characters
                                                    $limitedDescription = substr($description, 0, 410);
                                                    $fullDescription = $description;
                                                    ?>

                                                    <!-- Display description with "Read More" label -->
                                                    <div class="description-container bg-white text-dark" id="descriptionContainer" style="text-align: justify;">
                                                        <p id="limitedDescription">
                                                            <?php echo $limitedDescription; ?>
                                                            <label for="readMoreCheckbox" id="readMoreLabel" class="bg-white text-primary" onclick="toggleDescription()">...Read More</label>
                                                        </p>
                                                        <p id="fullDescription" style="display: none;"><?php echo $fullDescription; ?>
                                                            <label for="readMoreCheckbox" id="readMoreLabel" class="bg-white text-primary" onclick="toggleDescription()">&nbsp;Read Less</label>
                                                        </p>
                                                    </div>
                                                    <!-- JavaScript to toggle full description -->
                                                    <script>
                                                        function toggleDescription() {
                                                            var limitedDescription = document.getElementById('limitedDescription');
                                                            var fullDescription = document.getElementById('fullDescription');
                                                            var readMoreLabel = document.getElementById('readMoreLabel');

                                                            if (fullDescription.style.display === 'none') {
                                                                fullDescription.style.display = 'block';
                                                                limitedDescription.style.display = 'none';
                                                                readMoreLabel.textContent = 'Read Less';
                                                            } else {
                                                                fullDescription.style.display = 'none';
                                                                limitedDescription.style.display = 'block';
                                                                readMoreLabel.textContent = '...Read More';
                                                            }
                                                        }
                                                    </script>

                                                    <?php 
                                                    $today = date('Y-m-d'); 
                                                    $QUERY = "SELECT subscriber_id, s_end_date FROM subscription WHERE s_status='PAID' AND s_end_date >= '$today' AND subscriber_id=$uid";
                                                    $result1 = $mysqli->query($QUERY);
                                                    $sid = null;
                                                    if ($result1 && $row1 = $result1->fetch_assoc()) {
                                                        $sid = $row1['subscriber_id'];
                                                        // $end = $row['s_end_date'];
                                                    }
                                                    
                                                    if ($role == 2 || $role == 3) { ?>
                                                        <div class="mindbooster-button d-flex flex-row">
                                                        <?php }
                                                    if ($role == 4) { ?>
                                                            <div class="mindbooster-button">
                                                            <?php } ?>
                                                            <form action="functions/download_script.php" onsubmit="downloadMindbooster(event,this)" method="post" id="downloadLessonForm">
                                                                <input type="hidden" name="lesson_id" value="<?php echo $row["lesson_id"]; ?>">
                                                                <input type="hidden" name="lesson_type" value="<?php echo $type; ?>">
                                                                <input type="hidden" name="uid" value="<?php echo $_SESSION["uid"]; ?>">
                                                                <input type="hidden" name="filename" value="<?php
                                                                                                            if ($type === 'quiz') {
                                                                                                                $downloadFileName = $row['quiz'];
                                                                                                            } elseif ($type === 'worksheet') {
                                                                                                                $downloadFileName = $row['worksheet'];
                                                                                                            } elseif ($type === 'lesson_plan') {
                                                                                                                $downloadFileName = $row['lesson_plan'];
                                                                                                            } elseif ($type === 'supplementary_note') {
                                                                                                                $downloadFileName = $row['supplementary_note'];
                                                                                                            } elseif ($type === 'performance_based_activity') {
                                                                                                                $downloadFileName = $row['performance_based_activity'];
                                                                                                            }
                                                                                                            echo $downloadFileName; ?>">
                                                                <button class="btn rounded-pill px-md-3 me-md-2 mb-2" type="submit" name="download_lesson" style="border: 1px solid #0355b0; color: #0355b0;margin-right: 0.5rem;">
                                                                    <i class="fas fa-download me-1"></i> Download
                                                                </button>

                                                            </form>
                                                            <?php if ($type !== 'worksheet') { ?>
                                                                <button class="btn rounded-pill px-md-3 text-white mb-2" style="background-color: #0355b0;" data-bs-toggle="modal" data-bs-target="#viewOnlineModal">
                                                                    View it Online
                                                                </button>
                                                            <?php } ?>
                                                            <div>
                                                                <?php

                                                                if ($type == 'worksheet') {
                                                                    // Define colors based on percentage score
                                                                    $color = ($percentageScore < 35) ? 'danger' : 'success';
                                                                }
                                                                if ($type == 'worksheet') {

                                                                    // Display the score label dynamically
                                                                    if ($rowtest > 0 && $type == 'worksheet' && $role == 4) {
                                                                ?>
                                                                        <div>
                                                                            <label for="scoreInput" class="text-<?php echo $color; ?> fw-bold" style="font-size: 1.2rem; border: 2px solid <?php echo $color == 'danger' ? '#dc3545' : '#28a745'; ?>; padding: 10px; border-radius: 10px;">
                                                                                You have completed the Test. <br>
                                                                                Your Score is: <?php echo $score; ?> out of <?php echo $total; ?> (<?php echo $percentageScore; ?>%)
                                                                            </label>
                                                                        </div>
                                                                <?php }
                                                                } ?>
                                                            </div>
                                                            <?php 
                                                                if ($type == 'worksheet' && $role == 4) { ?>
                                                                    <?php if ($rowtest > 0) { ?>
                                                                        <div>
                                                                            <a href="test_online.php?lesson_id=<?= $lesson_id; ?>" class="btn rounded-pill px-md-3 text-white mb-2 mt-2" style="background-color: #e74c3c;">
                                                                                Redo Worksheet
                                                                            </a>
                                                                            <a href="view_result.php?lesson_id=<?= $lesson_id; ?>" class="btn rounded-pill px-md-3 text-white mb-2 mt-2" style="background-color: #e74c3c;">
                                                                                View Result
                                                                            </a>
                                                                        </div>
                                                                    <?php } else { ?>
                                                                        <a href="test_online.php?lesson_id=<?= $lesson_id; ?>" class="btn rounded-pill px-md-3 text-white mb-2" style="background-color: #0355b0;">
                                                                            Do it Online
                                                                        </a>
                                                                    <?php } ?>

                                                                <?php } else if ($type == 'worksheet' && $role == 3 && $uid == $sid) { ?>
                                                                    <!-- Button for role 3 -->
                                                                    <a href="#" class="btn rounded-pill px-md-3 text-white mb-2" style="background-color: #0355b0" data-bs-toggle="modal" data-bs-target="#assignToChildrenModal">
                                                                        Assign 
                                                                    </a>

                                                                <?php } else if ($type == 'worksheet' && $role == 3 && $uid != $sid) { ?>
                                                                    
                                                                <?php } ?>


                                                            </div>
                                                                <!-- Assign to Children Modal -->
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
                                                                                    <!-- Children will be dynamically loaded here using AJAX -->
                                                                                    <?php
                                                                                    $u_id = $_SESSION['uid'];
                                                                                    $dbQueryChildren = "SELECT student_profile.*, user_table.full_name FROM student_profile INNER JOIN user_table ON student_profile.user_id=user_table.uid WHERE student_profile.parent_id=$u_id AND student_profile.grade= $grade_id";
                                                                                    $dbResultChildren = $mysqli->query($dbQueryChildren);

                                                                                    if ($dbResultChildren && $dbResultChildren->num_rows > 0) {
                                                                                        while ($child = $dbResultChildren->fetch_assoc()) {
                                                                                            $childId = $child['user_id'];
                                                                                            $childName = $child['full_name'];
                                                                                    ?>
                                                                                            <div class="row pb-md-3">
                                                                                                <div class="col pt-2 mt-2">
                                                                                                    <input type="checkbox" class="form-check-input" id="child<?= $childId ?>" value="<?= $childId ?>" name="children[]">
                                                                                                    <label class="form-check-label" for="child<?= $childId ?>"><?= $childName ?></label>
                                                                                                </div>
                                                                                                <div class="col pt-2 mt-2">
                                                                                                    <!-- Due Date Picker for each student -->
                                                                                                    <label for="dueDate<?= $childId ?>">Due Date:</label>
                                                                                                    <input type="datetime-local" class="form-control due-date" id="dueDate<?= $childId ?>" data-student="<?= $childId ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                    <?php
                                                                                        }
                                                                                    } else {
                                                                                        echo '<div class="bg-white text-dark">No children found</div>';
                                                                                    }
                                                                                    ?>
                                                                                </div>

                                                                                <!-- Assign Button -->
                                                                                <button class="btn rounded-pill px-md-3 text-white mb-2" style="background-color: #0355b0;" onclick="assignChildren('<?php echo $row['grade_name'] . ' ' . $row['grade']; ?>', '<?php echo $row['subject_name']; ?>', '<?php echo str_replace('_', ' ', ucfirst($type)); ?>', '<?php echo $lesson_id; ?>')">Assign</button>

                                                                                <script>
                                                                                $(document).ready(function() {
                                                                                    <?php
                                                                                    // JavaScript for each child
                                                                                    $dbResultChildren = $mysqli->query($dbQueryChildren);
                                                                                    if ($dbResultChildren && $dbResultChildren->num_rows > 0) {
                                                                                        while ($child = $dbResultChildren->fetch_assoc()) {
                                                                                            $childId = $child['user_id'];
                                                                                    ?>
                                                                                            // When checkbox is checked, select the corresponding date
                                                                                            $('#child<?= $childId ?>').change(function() {
                                                                                                if ($(this).prop('checked')) {
                                                                                                    $('#dueDate<?= $childId ?>').val(new Date().toISOString().split('T')[0]); // Set today's date
                                                                                                } else {
                                                                                                    $('#dueDate<?= $childId ?>').val(''); // Clear the date
                                                                                                }
                                                                                            });

                                                                                            // When date is selected, check the corresponding checkbox
                                                                                            $('#dueDate<?= $childId ?>').change(function() {
                                                                                                if ($(this).val()) {
                                                                                                    $('#child<?= $childId ?>').prop('checked', true);
                                                                                                } else {
                                                                                                    $('#child<?= $childId ?>').prop('checked', false);
                                                                                                }
                                                                                            });
                                                                                    <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                });
                                                                                </script>
                                                                                

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            <div class="modal fade" id="viewOnlineModal" tabindex="-1" aria-labelledby="viewOnlineModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-xl">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="viewOnlineModalLabel">View Online</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body" style="min-height: 80vh">
                                                                            <?php if ($type == 'supplementary_note' && $role == 4) {
                                                                                // Query to check if the data already exists in the database for this user and lesson
                                                                                $checkQuery = "SELECT * FROM mark_done WHERE uid = $u_id AND lesson_id = $lesson_id AND type = '$type'";
                                                                                $checkResult = $mysqli->query($checkQuery);
                                                                                // If data does not exist, display the "Mark as Done" button
                                                                                if ($checkResult->num_rows == 0) { ?>
                                                                                    <iframe class="embed-responsive-item" src="https://view.officeapps.live.com/op/embed.aspx?src=<?php echo generateDownloadLink($row, $type); ?>" style="min-height: 80vh" width="100%"></iframe>
                                                                                    <button id="markAsDoneBtn" class="btn btn-primary">Mark as Done</button>
                                                                                <?php } else { ?>
                                                                                    <iframe class="embed-responsive-item" src="https://view.officeapps.live.com/op/embed.aspx?src=<?php echo generateDownloadLink($row, $type); ?>" style="min-height: 80vh" width="100%"></iframe>
                                                                                <?php } ?>
                                                                            <?php } elseif ($type == 'supplementary_note' || $type == 'lesson_plan') { ?>
                                                                                <iframe class="embed-responsive-item" src="https://view.officeapps.live.com/op/embed.aspx?src=<?php echo generateDownloadLink($row, $type); ?>" style="min-height: 80vh" width="100%"></iframe>
                                                                                <!-- <button id="markAsDoneBtn" class="btn btn-primary">Mark as Done</button> -->
                                                                            <?php } else { ?>
                                                                                <div class="embed-responsive embed-responsive-21by9">
                                                                                    <embed class="embed-responsive-item" src="<?php echo generateDownloadLink($row, $type); ?>" width="100%" style="height: 80vh;">
                                                                                </div>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="mind-booster-classrow">
                                                                        <!-- <h5>Subject</h5>
                                                            <button class="btn mindbutton rounded-pill"><?php echo $row['subject_name']; ?></button> -->
                                                                        <?php if ($type == 'worksheet' && $role == 2) { ?>
                                                                            <div class="col-md-6 d-flex justify-content-start">
                                                                                <div class="col-md-6 d-flex justify-content-start">
                                                                                    <!-- Facebook Share Button -->
                                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(BASE_URL . '/mind-booster-content?id=' . $lesson_id . '&type=ws') ?>&quote=<?= urlencode("Check out this worksheet on Mindloops!") ?>" class="text-danger mt-3 px-2" target="_blank">
                                                                                        <img src="assets/images/social/facebook_a.png" alt="Facebook Share">
                                                                                    </a>
                                                                                    <!-- WhatsApp Share Button -->
                                                                                    <a href="https://wa.me/?text=<?= urlencode("Check out this worksheet on Mindloops: " . BASE_URL . '/mind-booster-content?id=' . $lesson_id . '&type=ws') ?>" class="text-danger mt-3" target="_blank">
                                                                                        <img src="assets/images/social/whatsapp_a.png" alt="WhatsApp Share">
                                                                                    </a>
                                                                                    <a href="#" class="text-danger mt-3 px-2" onclick="copyUrl('<?= "Check out this worksheet on Mindloops: " . BASE_URL . '/mind-booster-content?id=' . $lesson_id . '&type=ws' ?>')">
                                                                                        <img src="assets/images/social/link_copy_icon.png" alt="Copy Link">
                                                                                    </a>
                                                                                    <script>
                                                                                        function copyUrl(url) {
                                                                                            try {
                                                                                                var input = document.createElement('input');
                                                                                                input.value = url;
                                                                                                document.body.appendChild(input);
                                                                                                input.select();
                                                                                                document.execCommand('copy');
                                                                                                document.body.removeChild(input);
                                                                                                alert('Link copied to clipboard');
                                                                                            } catch (err) {
                                                                                                console.error('Failed to copy:', err);
                                                                                                alert('Failed to copy link to clipboard');
                                                                                            }
                                                                                        }
                                                                                    </script>
                                                                                </div>
                                                                            <?php   } ?>
                                                                            </div>
                                                                            <!-- <button class="btn mindbutton rounded-pill">Multiplication</button>
                                                    <button class="btn mindbutton rounded-pill">Math Facts</button> -->
                                                                            <!-- <div class="p-md-3">
                                                    <button class="btn mindbutton rounded-pill">Multi-digit-multiplication</button>
                                                    <button class="btn mindbutton rounded-pill">Lorem</button>
                                                    <button class="btn mindbutton rounded-pill">Lorem ipsum</button>
                                                </div> -->
                                                                    </div>
                                                                </div>
                                                                <div class="row py-md-3">
                                                                    <div class="col-12">
                                                                        <h4 class="fw-bolder">Related Materials by Teachers</h4>
                                                                    </div>
                                                                </div>
                                                                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 mb-1">
                                                                    <?php
                                                                    // Fetch multiple recent lessons for the user's grade
                                                                    if ($role == 2 || $role == 3 || $role == 4) {
                                                                        if ($role == 2) {
                                                                            $dbQueryLessons = "SELECT *
                                    FROM teacher_material AS tm
                                    JOIN lesson_table AS lt ON tm.lesson_id = lt.lesson_id
                                    ORDER BY tm.created_date DESC
                                    LIMIT 3";
                                                                        } else {
                                                                            $dbQueryLessons = "SELECT *
                                    FROM teacher_material AS tm
                                    JOIN lesson_table AS lt ON tm.lesson_id = lt.lesson_id
                                    ORDER BY tm.created_date DESC
                                    LIMIT 4";
                                                                        }
                                                                        $dbResultLessons = $mysqli->query($dbQueryLessons);

                                                                        // Check if the query was successful
                                                                        if ($dbResultLessons) {
                                                                            // Check if there are any lessons
                                                                            if ($dbResultLessons->num_rows > 0) {
                                                                                // Loop through the results to display each lesson
                                                                                while ($dbRowLesson = $dbResultLessons->fetch_assoc()) {
                                                                                    $lesson_id = $dbRowLesson['lesson_id'];
                                                                                    $lessonTitle = $dbRowLesson['title'];
                                                                                    $lessonimages = $dbRowLesson['images'];
                                                                                    $lessonDescription = $dbRowLesson['description'];
                                                                                    $material_type = $dbRowLesson['material_type'];

                                                                    ?>
                                                                                    <!-- <div class="col"> -->
                                                                                    <div class="col-md-4 rounded">
                                                                                        <div class="card h-100 bg-white shadow-sm text-dark d-flex justify-content-center align-items-center p-1 border-0">
                                                                                            <a href="mind-booster-content.php?id=<?php echo $lesson_id; ?>&type=<?php echo ($material_type == 'Worksheet') ? 'ws' : (($material_type == 'Supplementary Note') ? 'sn' : 'qz'); ?>" class="dasboard-proper-content">
                                                                                                <div>
                                                                                                    <div class="lesson-image-container">
                                                                                                        <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $lessonimages; ?>" loading="lazy" class="img-fluid rounded" style="min-height:140px;" alt="Images">
                                                                                                        <p class="lesson-title"><?php echo $lessonTitle; ?></p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </a>
                                                                                        </div>
                                                                                    </div>


                                                                                <?php
                                                                                }
                                                                            } else { ?>
                                                                                <div class="bg-white text-dark">No lessons found for this grade</div>
                                                                        <?php }
                                                                        } else {
                                                                            // Handle the case where the query fails
                                                                            echo "Error: " . $mysqli->error;
                                                                        }
                                                                    }
                                                                    if ($role == 2) {
                                                                        ?>
                                                                        <div class="card h-md-100 shadow-sm text-dark justify-content-center align-items-center" style="background-color: #D9D9D9;min-height: 80px;">
                                                                            <div class="col-md-4 mb-4 d-flex justify-content-center align-items-center dasboard-proper-content">
                                                                                <button type="button" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                                    <img src="<?= BASE_URL ?>/assets/images/homepage/plus-circle.png" loading="lazy" alt="Button">
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    <?php } ?>
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


                <?php
                }
            } else {
                echo "No quiz results found.";
            } ?>
                <!--Start Layer-3 of loops -->


                <div class="container-fluid secondary-container pb-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 text-center mt-md-3 py-2">
                                <h1 class="text-bold">Related <?php echo str_replace('_', ' ', ucfirst($type)); ?></h1>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 g-3 mb-2 mb-2">
                            <?php if ($role == 4) {
                                // Fetch multiple random lessons
                                $sqlrelated = "SELECT title, images, lesson_id, grade_id FROM lesson_table WHERE grade_id = $grade_id AND lesson_id <> $id AND $type IS NOT NULL ORDER BY RAND() LIMIT 5"; // Adjust the LIMIT to the number of lessons you want to display
                                //   exit;
                            } else {
                                $sqlrelated = "SELECT title, images, lesson_id, grade_id FROM lesson_table WHERE lesson_id <> $id AND $type IS NOT NULL ORDER BY RAND() LIMIT 5"; // Adjust the LIMIT to the number of lessons you want to display

                            }
                            $resultrelated = $mysqli->query($sqlrelated);

                            while ($contentData = $resultrelated->fetch_assoc()) {
                                echo '<div class="col">';
                                echo '<div class="card bg-white shadow-sm text-dark">';
                                echo '<div style="position: relative;">';
                                echo '<a href="' . BASE_URL . '/mind-booster-content?id=' . $contentData['lesson_id'] . '&type=' . $type . '" class="proper-content">';
                                echo '<img src="' . BASE_URL . '/assets/uploads/lesson/' . $contentData['images'] . '" loading="lazy" class="card-img-top" width="200px" height="200px">';
                                echo '<p loading="lazy" class="img-text-card rounded-pill px-md-3 p-1 fs-6 text-white">' . $type . '</p>';
                                echo '</a>';
                                echo '</div>';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">' . $contentData['title'] . '</h5>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }

                            // Close the database connection
                            ?>
                            <script>
                                // Calculate the maximum height among all card bodies
                                var cards = document.querySelectorAll('.card-body');
                                var maxHeight = 0;

                                cards.forEach(function(card) {
                                    maxHeight = Math.max(maxHeight, card.offsetHeight);
                                });

                                // Set the calculated maximum height for all card bodies
                                cards.forEach(function(card) {
                                    card.style.height = maxHeight + 'px';
                                });
                            </script>
                        </div>

                    </div>
                </div>

                <!-- Modal Started -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg bg-white">
                        <div class="modal-content bg-white text-dark p-md-2">
                            <div class="modal-header border-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="" method="POST" enctype="multipart/form-data" id="lessonForm">
                                <div class="modal-body">
                                    <input type="hidden" name="user_id" value="<?php echo $u_id ?>">
                                    <!-- Grade Section -->
                                    <div class="container">
                                        <div class="row">
                                            <h5 class="col-12">Grade:</h5>
                                        </div>
                                        <div class="row pb-md-3">
                                            <div class="col pt-2 mt-2">
                                                <?php
                                                $dbQuerygrade = "SELECT * FROM `grade_table`";
                                                $dbResultgrade = $mysqli->query($dbQuerygrade);

                                                if ($dbResultgrade && $dbResultgrade->num_rows > 0) {
                                                    $first = true; // Flag to track the first radio button
                                                    while ($dbRowGrade = $dbResultgrade->fetch_assoc()) {
                                                        $grade = $dbRowGrade['grade'];
                                                        $grade_name = $dbRowGrade['grade_name'];
                                                ?>
                                                        <span style="margin-left:0.5rem;margin-bottom: 0.5rem;">
                                                            <input type="radio" class="btn-check" name="goalFrequency" id="goalFrequency<?= $grade ?>" value="<?= $grade ?>" <?= $first ? 'checked' : '' ?>>
                                                            <label class="btn btn-outline-secondary py-md-2 px-md-3 mb-2 rounded-pill" for="goalFrequency<?= $grade ?>"><?= $grade_name . $grade ?></label>
                                                        </span>
                                                <?php
                                                        $first = false; // Set the flag to false after the first iteration
                                                    }
                                                } else {
                                                    echo '<div class="bg-white text-dark">No grades found</div>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Subject Section -->
                                    <div class="container">
                                        <div class="row">
                                            <h5 class="col-12">Subject:</h5>
                                        </div>
                                        <div class="row pb-md-3">
                                            <div class="col mt-2 mb-2">
                                                <?php
                                                $dbQuery = "SELECT * FROM `subject_table`";
                                                $dbResult = $mysqli->query($dbQuery);

                                                if ($dbResult && $dbResult->num_rows > 0) {
                                                    $first = true; // Flag to track the first radio button
                                                    while ($row = $dbResult->fetch_assoc()) {
                                                        $subject_id = $row['subject_id'];
                                                        $subject_name = $row['subject_name'];
                                                ?>
                                                        <span style="margin-left:0.5rem;">
                                                            <input type="radio" class="btn-check" name="goalFrequencysub" id="goalFrequencysub<?= $subject_id ?>" value="<?= $subject_id ?>" <?= $first ? 'checked' : '' ?>>
                                                            <label class="btn btn-outline-secondary py-md-2 px-md-3 mb-2 rounded-pill" for="goalFrequencysub<?= $subject_id ?>"><?= $subject_name ?></label>
                                                        </span>
                                                <?php
                                                        $first = false; // Set the flag to false after the first iteration
                                                    }
                                                } else {
                                                    echo '<div class="bg-white text-dark">No subjects found</div>';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                    <!--Select Lesson  Related to Grade and subject-->
                                    <div class="container">
                                        <div class="row pb-md-3">
                                            <div class="col">
                                                <h5 class="col-12">Select lesson:</h5>
                                                <select class="selectpicker form-select" name="lesson_id" id="lessonSelect" aria-label="Select list" required>
                                                    <option value="" selected disabled>Select an option</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Type Section -->
                                    <div class="container">
                                        <div class="row">
                                            <h5 class="col-12">Type:</h5>
                                        </div>
                                        <div class="row pb-md-3">
                                            <div class="col-lg-12 mt-2 mb-2">
                                                <span style="margin-left:0.5rem">
                                                    <input type="radio" class="btn-check" name="goalFrequencytype" id="goalFrequencytype1" value="Worksheet" checked>
                                                    <label class="btn btn-outline-secondary py-md-2 px-md-3 mb-2 rounded-pill" for="goalFrequencytype1">Worksheet</label>
                                                </span>
                                                <span style="margin-left:0.5rem">
                                                    <input type="radio" class="btn-check" name="goalFrequencytype" id="goalFrequencytype2" value="Supplementary Note">
                                                    <label class="btn btn-outline-secondary py-md-2 px-md-3 mb-2 rounded-pill" for="goalFrequencytype2">Supplementary Note</label>
                                                </span>
                                                <span style="margin-left:0.5rem">
                                                    <input type="radio" class="btn-check" name="goalFrequencytype" id="goalFrequencytype3" value="Quiz">
                                                    <label class="btn btn-outline-secondary py-md-2 px-md-3 mb-2 rounded-pill" for="goalFrequencytype3">Quiz</label>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- File Upload Section -->
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-12 col-md-6"> <!-- Adjust the column width as needed -->
                                                <div class="drop-zone py-md-2 p-5">
                                                    <div class="py-md-4">
                                                        <img src="<?= BASE_URL ?>/assets/images/homepage/cloud-upload.png" loading="lazy" alt="Button">
                                                    </div>
                                                    <span class="drop-zone__prompt h4 fw-bolder py-md-2">Drag and drop the file here</span>
                                                    <p class="py-md-2">Or</p>
                                                    <p class="fw-bolder py-md-2" style="color: #0355B0;">Select a file</p>
                                                    <input type="file" name="myFile" class="drop-zone__input" accept=".pdf,.doc,.docx,.ppt,.pptx" required>
                                                </div>
                                                <p class="small py-1 fw-lighter text-center" style="color: #000000ad;">docx, pptx & pdf file. max size 30 mb</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="container">
                                        <div class="row">
                                            <div class="col d-flex justify-content-center align-items-center">
                                                <button type="submit" class="btn rounded-pill px-md-4 text-white mb-2" name="add_teacher_material" style="background-color: #0355b0;">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
        </main>
    </div>
    
    <script>
function assignChildren(grade, subject, type, lesson_id) {
    // Get the selected children IDs and their respective due dates
    var selectedChildren = [];
    var dueDates = {}; // Object to store due dates for each child

    $('input[name="children[]"]:checked').each(function() {
        var childId = $(this).val();
        selectedChildren.push(childId);

        // Get the due date for this child
        var dueDate = $('#dueDate' + childId).val();
        dueDates[childId] = dueDate;
    });

    // Get other information
    var assigned_by = <?php echo $_SESSION['uid']; ?>;
    var action_button = 'assigned';
    
    // Prepare data to be sent via AJAX
    var data = {
        children: selectedChildren,
        due_dates: dueDates, // Include due dates array
        grade: grade,
        subject: subject,
        type: type,
        assigned_by: assigned_by,
        action_button: action_button,
        lesson_id: lesson_id
    };

    // AJAX request to assign children
    $.ajax({
        url: 'assign_children.php',
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(response) {
            // Handle success response
            if (response.success) {
                // Assignment successful
                alert('Children successfully assigned.');
            } else {
                // Assignment already exists
                alert(response.message);
            }
        },
        error: function(xhr, status, error) {
            // Handle error response
            console.error(xhr.responseText);
        }
    });
}
</script>


    <script>
        const downloadMindbooster = (e, obj) => {
            // e.preventDefault();
            e.preventDefault();
            // console.log(obj);
            // return false;

            let formData = new FormData(obj);

            let url = 'functions/download_script.php';

            fetch(url, {
                method: 'POST',
                body: formData
            }).then(data => data.text()).then(data => {
                const pdfUrl = data;
                console.log(data);
                const downloadLink = document.createElement('a');
                downloadLink.href = pdfUrl;
                downloadLink.download = obj.filename.value;
                downloadLink.click();
            });

            // obj.submit();
        }
    </script>

    <script>
        $(document).ready(function() {

            $('#markAsDoneBtn').hide();

            function showButton() {
                $('#markAsDoneBtn').show();
            }

            setTimeout(showButton, 10000);

            // Your existing click event handler for the button
            $('#markAsDoneBtn').click(function() {
                var lessonId = <?php echo $lesson_id; ?>;
                var type = '<?php echo $type; ?>';
                var uId = <?php echo $_SESSION['uid']; ?>;
                var data = {
                    lesson_id: lessonId,
                    type: type,
                    u_id: uId
                };

                $.ajax({
                    url: 'store_data.php',
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        console.log('Data stored successfully:', response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error storing data:', error);
                    }
                });
            });

            // Disable the button and change text when clicked
            $('#markAsDoneBtn').click(function() {
                $(this).prop('disabled', true).text('Completed..!!! Go For Next');
            });
        });
    </script>
    <script>
        document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
            const dropZoneElement = inputElement.closest(".drop-zone");

            dropZoneElement.addEventListener("click", (e) => {
                inputElement.click();
            });

            inputElement.addEventListener("change", (e) => {
                if (inputElement.files.length) {
                    updateThumbnail(dropZoneElement, inputElement.files[0]);
                }
            });

            dropZoneElement.addEventListener("dragover", (e) => {
                e.preventDefault();
                dropZoneElement.classList.add("drop-zone--over");
            });

            ["dragleave", "dragend"].forEach((type) => {
                dropZoneElement.addEventListener(type, (e) => {
                    dropZoneElement.classList.remove("drop-zone--over");
                });
            });

            dropZoneElement.addEventListener("drop", (e) => {
                e.preventDefault();

                if (e.dataTransfer.files.length) {
                    inputElement.files = e.dataTransfer.files;
                    updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
                }

                dropZoneElement.classList.remove("drop-zone--over");
            });
        });

        /**
         * Updates the thumbnail on a drop zone element.
         *
         * @param {HTMLElement} dropZoneElement
         * @param {File} file
         */
        function updateThumbnail(dropZoneElement, file) {
            let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

            // First time - remove the prompt
            if (dropZoneElement.querySelector(".drop-zone__prompt")) {
                dropZoneElement.querySelector(".drop-zone__prompt").remove();
            }

            // First time - there is no thumbnail element, so lets create it
            if (!thumbnailElement) {
                thumbnailElement = document.createElement("div");
                thumbnailElement.classList.add("drop-zone__thumb");
                dropZoneElement.appendChild(thumbnailElement);
            }

            thumbnailElement.dataset.label = file.name;

            // Show thumbnail for image files
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = () => {
                    thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
                };
            } else {
                thumbnailElement.style.backgroundImage = null;
            }
        }
    </script>
    <script>
        function fetchLessons() {
            var selectedGrade = document.querySelector('input[name="goalFrequency"]:checked').value;
            var selectedSubject = document.querySelector('input[name="goalFrequencysub"]:checked').value;

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText.split('||||')[1]);
                        var lessons = JSON.parse(xhr.responseText.split('||||')[1]);
                        updateSelectList(lessons);
                    } else {
                        console.error('Request failed:', xhr.status);
                    }
                }
            };
            xhr.open('GET', 'fetch_lessons.php?grade=' + selectedGrade + '&subject=' + selectedSubject, true);
            xhr.send();
        }

        function updateSelectList(lessons) {
            var selectList = document.getElementById('lessonSelect');
            selectList.innerHTML = '';

            var defaultOption = new Option('Select an option', '');
            selectList.add(defaultOption);

            var fragment = document.createDocumentFragment();
            lessons.forEach(function(lesson) {
                var option = new Option(lesson.title, lesson.lesson_id);
                fragment.appendChild(option);
            });
            selectList.appendChild(fragment);
        }

        document.querySelectorAll('input[name="goalFrequency"], input[name="goalFrequencysub"]').forEach(function(input) {
            input.addEventListener('change', fetchLessons);
        });
    </script>
    <?php include 'includes/page-footer.php' ?>