<?php include 'includes/page-head.php' ?>
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
if ($role == 4 ) {
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
    }
    if ($type == 'ws') {
        $type = "worksheet";
    }
    if ($type == 'sn') {
        $type = "supplementary_note";
    }
    if ($type == 'qz') {
        $type = "quiz";
    }
    if ($type == 'pb') {
        $type = "performance_based_activity";
    }
}
function generateDownloadLink($row, $type)
{
    // Define a base directory for lesson downloads
    $downloadBaseDir = BASE_URL . '/assets/uploads/lesson/';

    // Determine the download file name based on the type
    $downloadFileName = '';
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

    // Generate the download link
    $downloadLink = $downloadBaseDir . $downloadFileName;

    return $downloadLink;
}



?>


<body class="bg-white text-dark">
    <?php include 'includes/page-header.php' ?>
    <div class="wrapper">
        <main class="main-content">
            <!-- Start of Leader Board -->
            <div class="container">
                <div class="row p-md-4">
                    <!-- <div class="col-12 leader">
                        <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid" alt="Card 1">
                    </div> -->
                </div>
            </div>
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
                            <div class="row bg-white border border-1" style="border-radius: 10px;">
                                <div class="col-12 mb-sm-0">
                                    <div class="m-md-4 bg-white">
                                        <div class="m-2 bg-white">
                                            <div class="row bg-white">
                                                <div class="col-lg-5 col-md-12">
                                                    <!-- <div class="col-lg-5 col-md-12" style="background-color: #C4C7CE;border-radius: 10px;"> -->
                                                    <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" class="img-fluid rounded" alt="Image" style="object-fit: cover; height:90%;">
                                                </div>
                                                <div class="col-lg-7 col-md-12 text-dark bg-white">
                                                    <p><?php echo str_replace('_', ' ', ucfirst($type)); ?></p>


                                                    <h3 style="color: #0355B0;"><?php echo $lesson_name; ?></h3>

                                                    <?php
                                                    // Limit the description to 250 characters
                                                    $limitedDescription = substr($description, 0, 450);
                                                    $fullDescription = $description;
                                                    ?>

                                                    <!-- Display limited description -->
                                                    <p style="text-align: justify;">
                                                        <?php echo $limitedDescription; ?>
                                                        <?php
                                                        // Display "Read More" link and modal trigger
                                                        if (strlen($description) > 450) {
                                                            echo '<a href="#" data-bs-toggle="modal" data-bs-target="#descriptionModal">Read More</a>';
                                                        }
                                                        ?>
                                                    </p>

                                                    <div class="mindbooster-button">
                                                        <!-- Assuming this code is within an HTML form -->
                                                        <!-- Assuming this code is within an HTML form -->
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

                                                            <button class="btn rounded-pill px-md-3 me-md-2 mb-2" type="submit" name="download_lesson" style="border: 1px solid #0355b0; color: #0355b0;">
                                                                Download
                                                            </button>
                                                        </form>

                                                        <!-- <button class="btn rounded-pill px-md-3 text-white mb-2" style="background-color: #0355b0;" data-bs-toggle="modal" data-bs-target="#viewOnlineModal">
                                                            View it Online
// /                                                      </button> -->
                                                        <a href="test_online?lesson_id=<?= $lesson_id; ?>" class="btn rounded-pill px-md-3 text-white mb-2" style="background-color: #0355b0;">
                                                            Do it Online
                                                        </a>
                                                        <div class="modal fade" id="viewOnlineModal" tabindex="-1" aria-labelledby="viewOnlineModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-xl">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="viewOnlineModalLabel">View Online</h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <?php if ($type == 'supplementary_note' || $type == 'lesson_plan') { ?>
                                                                            <iframe class="embed-responsive-item" src="https://view.officeapps.live.com/op/embed.aspx?src=<?php echo generateDownloadLink($row, $type); ?>" width="100%" height="100%"></iframe>

                                                                        <?php } else { ?>
                                                                            <div class="embed-responsive embed-responsive-21by9">
                                                                                <embed class="embed-responsive-item" src="<?php echo generateDownloadLink($row, $type); ?>" width="100%" style="height: 80vh;">
                                                                            </div>
                                                                        <?php } ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>


                                                    <div class="row p-md-3">
                                                        <div class="mind-booster-classrow">
                                                            <h5>Grade</h5>

                                                            <button class="btn mindbutton rounded-pill"><?php echo $row['grade_name'] . ' ' . $row['grade']; ?></button>

                                                        </div>
                                                    </div>
                                                    <div class="row p-md-3">
                                                        <div class="mind-booster-classrow">
                                                            <h5>Subject</h5>
                                                            <button class="btn mindbutton rounded-pill"><?php echo $row['subject_name']; ?></button>
                                                            <!-- <button class="btn mindbutton rounded-pill">Multiplication</button>
                                                    <button class="btn mindbutton rounded-pill">Math Facts</button> -->
                                                        </div>
                                                        <!-- <div class="p-md-3">
                                                    <button class="btn mindbutton rounded-pill">Multi-digit-multiplication</button>
                                                    <button class="btn mindbutton rounded-pill">Lorem</button>
                                                    <button class="btn mindbutton rounded-pill">Lorem ipsum</button>
                                                </div> -->
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
           

                <div class="container-fluid secondary-container">
                    <div class="container">
                        <div class="row p-md-2">
                            <div class="col-12 text-center mt-md-3">
                                <h1 class="text-bold">Related <?php echo str_replace('_', ' ', ucfirst($type)); ?></h1>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 g-3 mb-2 mx-2 mb-2">
                        <?php if ($role == 4) { 
                            // Fetch multiple random lessons
                           $sqlrelated = "SELECT title, images, lesson_id, grade_id FROM lesson_table WHERE grade_id = $grade_id AND lesson_id <> $id AND $type IS NOT NULL ORDER BY RAND() LIMIT 5"; // Adjust the LIMIT to the number of lessons you want to display
                        //   exit;
                        } else{
                           $sqlrelated = "SELECT title, images, lesson_id, grade_id FROM lesson_table WHERE lesson_id <> $id AND $type IS NOT NULL ORDER BY RAND() LIMIT 5"; // Adjust the LIMIT to the number of lessons you want to display

                        }
                            $resultrelated = $mysqli->query($sqlrelated);

                            while ($contentData = $resultrelated->fetch_assoc()) {
                                echo '<div class="col">';
                                echo '<div class="card bg-white shadow-sm text-dark">';
                                echo '<div style="position: relative;">';
                                echo '<a href="' . BASE_URL . '/mind-booster-content?id=' . $contentData['lesson_id'] . '&type=' . $type . '" class="proper-content">';

                                echo '<img src="' . BASE_URL . '/assets/uploads/lesson/' . $contentData['images'] . '" class="card-img-top" width="200px" height="200px">';
                                echo '<p class="img-text-card rounded-pill px-md-3 p-1 fs-6 text-white">' . $type . '</p>';
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
                        </div>

                    </div>
                </div>







           
        </main>
    </div>

    <!-- Modal for full description -->
    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel"><?php echo str_replace('_', ' ', ucfirst($type)); ?> Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Display full description in the modal -->
                    <p><?php echo $fullDescription; ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


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

    <?php include 'includes/page-footer.php' ?>