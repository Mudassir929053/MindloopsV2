<?php include 'includes/page-head.php' ?>

<style>
    .nav-link.active {
        border-bottom: 2px solid #0355B0;
    }

    .nav-mindbootster {
        border-bottom: 1px solid #0355B0;
    }

    .nav-link {
        color: #000000;
    }

    /* .mindbooster_para {
            color: #0355B0;
            font-size: 14px;
            padding-top: 5px;
        } */

    .mindbooster_para1 {
        color: #0355B0;
        font-size: 15px;
        padding-top: 5px;
        text-decoration: none;

    }

    .proper-card {
        width: 200px;
        height: 200px;
        object-fit: cover;
    }

    /* 
        .proper-content {
            text-decoration: none;
        } */
    .proper-content {
        text-decoration: none;
        display: inline-block;
        /* To allow scaling */
        transition: transform 0.2s;
        /* Smooth transition for scaling */
    }

    #search-input::placeholder {
        color: #999999;
        /* Black placeholder text */
    }

    .proper-content:hover {
        transform: scale(1.2);
        /* Scale the content on hover (1.1 is the scaling factor) */
    }
</style>

<body class="bg-white text-dark ">
    <?php include 'includes/page-header.php';

    //  var_dump($_SESSION);
    //  exit;
    // $uid = $_SESSION['uid'];
    // $role = $_SESSION['role_id'];

    // echo $uid;
    // echo "<br>";
    // echo $role;
    // exit;


    // Check if the user ID is not set in the session
    if (isset($_SESSION['uid'])) {

        $uid = $_SESSION['uid'];
        // Check the subscription status
        $subscriptionCheck = "SELECT s_end_date FROM subscription WHERE subscriber_id = $uid AND s_end_date > NOW() AND s_status = 'paid'";
        $subscriptionResult = $mysqli->query($subscriptionCheck);
        if ($subscriptionResult && $subscriptionResult->num_rows > 0) {
            $subscriptionExpired = true;
        } else {
            // Initialize a variable to store the subscription status
            $subscriptionExpired = false;
        }
    }

    ?>
    <div class="wrapper">
        <main class="main-content">
            <div class="sitecontaint h-100">
                <div class="container-fluid">
                    <!-- Start of Leader Board -->
                    <!-- <div class="container">
                        <div class="row p-md-4 p-sm-3 p-3"> -->
                    <!-- <div class="col-12 leader">
                                <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid" alt="Card 1">
                            </div> -->
                </div>
            </div>
            <!--End of Leader Board -->
            <!--Start of magazine Banner -->
            <div class="container-fluid" style="background-image: url('<?= BASE_URL ?>/assets/images/homepage/Contribution_Poster_BG.png'); background-size: cover; background-size: 100% 120%;">
                <div class="container">
                    <div class="row py-4">
                        <div class="col-7 offset-md-5">
                            <h1 class="text-dark">Be a part of MindLoops contributors!</h1>
                            <p class="text-dark">We welcome any contributors to share content and materials relating to education.</p>
                            <p class="ul-heading text-dark">What can you share?</p>
                            <ul class="text-light">
                                <li>Educational and research-based articles (min words 300 to 1,000 words)</li>
                                <li>Educational Comics and Illustrations</li>
                                <li>Educational videos</li>
                                <li>Life and social skills related storylines</li>
                            </ul>
                            <p class="text-dark">Mail your contribution to us at <a href="mailto:creative@edess.asia" class="text-primary">creative@edess.asia</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of magazine Banner -->
            <!-- First Accordion -->
            <div class="container">
                <div class="row mt-md-5">
                    <div class="col-md-2 py-5 mt-md-5">
                        <p class="text-dark fs-1 fw-bold p-md-3"></p>
                        <div class="border-start border-5 border-primary col-12">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed border-0 text-black fs-5 p-md-2 fw-bolder bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Grade
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body bg-white text-dark d-flex justify-content-start align-items-center">
                                            <ul class="list-unstyled text-wrap">
                                                <?php
                                                $gradeQuery = $mysqli->query("SELECT grade_id, grade_name, grade FROM grade_table");
                                                if ($gradeQuery === false) {
                                                    echo "Error: " . $mysqli->error;
                                                } else {
                                                    while ($gradeRow = $gradeQuery->fetch_assoc()) {
                                                        $grade_name = $gradeRow['grade_name'];
                                                        $grade = $gradeRow['grade'];
                                                        $grade_id = $gradeRow['grade_id'];
                                                ?>
                                                        <li><a href="#" onclick="updateGradeUrl('<?php echo $grade_id; ?>',event)" class="text-decoration-none"><?php echo $grade_name . ' ' . $grade; ?></a></li>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Second Accordion - Subject -->
                        <p class="text-dark fs-1 fw-bolder p-3"></p>
                        <div class="border-start border-primary border-5 bg-white col-12">
                            <div class="accordion" id="accordionExample2">
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="headingThree2">
                                        <button class="accordion-button collapsed text-black fs-5 p-md-2 fw-bolder bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                                            Subject
                                        </button>
                                    </h2>
                                    <div id="collapseThree2" class="accordion-collapse collapse" aria-labelledby="headingThree2" data-bs-parent="#accordionExample2">
                                        <div class="accordion-body bg-white text-dark d-flex justify-content-start align-items-center">
                                            <ul class="list-unstyled text-wrap">
                                                <?php
                                                $subjectQuery = $mysqli->query("SELECT subject_id, subject_name FROM subject_table");
                                                if ($subjectQuery === false) {
                                                    echo "Error: " . $mysqli->error;
                                                } else {
                                                    while ($subjectRow = $subjectQuery->fetch_assoc()) {
                                                        $subject_name = $subjectRow['subject_name'];
                                                        $subject_id = $subjectRow['subject_id'];
                                                ?>
                                                        <li><a href="#" onclick="updateSubjectUrl('<?php echo $subject_id; ?>',event)" class="text-decoration-none"><?php echo $subject_name; ?></a></li>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Clear Filters Button -->
                        <div class="mt-3">
                            <button class="btn btn-primary fw-bolder w-100" onclick="clearFilters()">Clear Filters</button>
                        </div>
                        <!-- Third Accordion - Lesson -->

                    </div>
                    <?php
                    // Get the selected filter parameters from the URL
                    $grade_id = isset($_GET['grade_id']) ? $_GET['grade_id'] : null;
                    $subject_id = isset($_GET['subject_id']) ? $_GET['subject_id'] : null;
                    $lesson_id = isset($_GET['lesson_id']) ? $_GET['lesson_id'] : null;

                    // Start building the base SQL query
                    $sql = "SELECT * FROM lesson_table WHERE 1"; // 1 is a placeholder, always true

                    // Add conditions only if the parameters are provided in the URL
                    if ($grade_id !== null) {
                        $sql .= " AND grade_id = $grade_id";
                    }
                    if ($subject_id !== null) {
                        $sql .= " AND subject_id = $subject_id";
                    }
                    if ($lesson_id !== null) {
                        $sql .= " AND lesson_id = $lesson_id";
                    }
                    ?>
                    <!-- List of magazine 2nd Layer -->

                    <script>
                        function updateGradeUrl(grade_id, event) {
                            event.preventDefault();
                            let url = new URL(window.location.href);
                            url.searchParams.set('grade_id', grade_id);
                            window.location.href = url.toString();
                        }

                        function updateSubjectUrl(subject_id, event) {
                            event.preventDefault();
                            let url = new URL(window.location.href);
                            url.searchParams.set('subject_id', subject_id);
                            window.location.href = url.toString();
                        }

                        function clearFilters() {
                            let url = new URL(window.location.href);
                            url.searchParams.delete('grade_id');
                            url.searchParams.delete('subject_id');
                            url.searchParams.delete('lesson_id');
                            window.location.href = url.toString();
                        }
                    </script>







                    <?php if ($role == 4 || $role == 3 || $role == 2) { ?>


                        <div class="col-md-10 p-md-2">
                            <?php if ($subscriptionExpired) { ?>

                                <ul class="nav justify-content-between align-items-center nav-mindbootster" role="tablist" id="tabs">
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#lessonplan">Lesson Plan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#Worksheet">Worksheet</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#supplementary_note">Supplementary Note</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#quiz">Quiz</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#performance">Performance Based Activity</a>
                                    </li>

                                <?php } else { ?>
                                    <ul class="nav justify-content-around align-items-center nav-mindbootster" role="tablist" id="tabs">
                                        <?php if ($role == 2) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#lessonplan">Lesson Plan</a>
                                            </li>
                                        <?php } ?>
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#Worksheet">Worksheet</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#quiz">Quiz</a>
                                        </li>
                                    <?php  } ?>

                                    </ul>
                                    <!-- Start of Search Content  -->
                                    <div class="row py-4">
                                        <div class="col-md-12 d-flex justify-content-end align-items-end bg-white text-dark">
                                            <div class="d-flex align-items-center justify-content-end bg-white text-dark">
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
                                    </div>
                                    <!-- Start of Search Content  -->
                                    <div class="tab-content">
                                        <div id="lessonplan" class="container tab-pane"><br>
                                            <div class="row p-md-3 pb-3">
                                                <?php
                                                // Execute the SQL query for lesson_plan
                                                $lessonPlanSQL = $sql . " AND lesson_plan IS NOT NULL ORDER BY RAND()";
                                                $lessonPlanResult = $mysqli->query($lessonPlanSQL);
                                                if ($lessonPlanResult->num_rows > 0) {
                                                    // Output data for each row
                                                    while ($row = $lessonPlanResult->fetch_assoc()) {
                                                        $title = $row["title"];
                                                        $images = $row["images"];
                                                        $lesson_id = $row['lesson_id'];
                                                ?>
                                                        <div class="col-md-3 col-sm-6 mb-5 search">
                                                            <div class="card border border-0 bg-white">
                                                                <?php
                                                                if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                                    <a href="<?= BASE_URL ?>mind-booster-content?id=<?php echo $lesson_id; ?>&type=lp" class="proper-content">
                                                                        <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" class="card-img-top img-fluid proper-card" alt="Card 1">
                                                                        <p class="mindbooster_para1"><?= $title ?></p>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a href="<?= BASE_URL ?>mind-booster-content?id=<?php echo $lesson_id; ?>&type=lp" data-bs-toggle="modal" data-bs-target="#RegistrationModal" class="proper-content">
                                                                        <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" class="card-img-top img-fluid proper-card" alt="Card 1">
                                                                        <p class="mindbooster_para1"><?= $title ?></p>
                                                                    </a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                <?php }
                                                } else {
                                                    echo "No results found for lesson_plan.";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div id="Worksheet" class="container tab-pane active"><br>
                                            <div class="row p-md-3 pb-3">
                                                <?php
                                                // Execute the SQL query for worksheet
                                                $worksheetSQL = $sql . " AND worksheet IS NOT NULL ORDER BY RAND()";
                                                $worksheetResult = $mysqli->query($worksheetSQL);
                                                if ($worksheetResult->num_rows > 0) {
                                                    // Output data for each row
                                                    while ($row = $worksheetResult->fetch_assoc()) {
                                                        $title = $row["title"];
                                                        $images = $row["images"];
                                                        $lesson_id = $row['lesson_id'];

                                                ?>
                                                        <div class="col-md-3 col-sm-6 mb-5 search">
                                                            <div class="card border border-0 bg-white text-dark">
                                                                <?php
                                                                if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                                    <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=ws" class="proper-content">
                                                                        <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" class="card-img-top img-fluid proper-card" alt="Card 1">
                                                                        <p class="mindbooster_para1"><?= $title ?></p>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=ws" data-bs-toggle="modal" data-bs-target="#RegistrationModal" class="proper-content">
                                                                        <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" class="card-img-top img-fluid proper-card" alt="Card 1">
                                                                        <p class="mindbooster_para1"><?= $title ?></p>
                                                                    </a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                <?php }
                                                } else {
                                                    echo "No results found for worksheet.";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div id="supplementary_note" class="container tab-pane fade"><br>
                                            <div class="row p-md-3 pb-3">
                                                <?php
                                                // Execute the SQL query for supplementary_note
                                                $supplementaryNoteSQL = $sql . " AND supplementary_note IS NOT NULL ORDER BY RAND()";
                                                $supplementaryNoteResult = $mysqli->query($supplementaryNoteSQL);
                                                if ($supplementaryNoteResult->num_rows > 0) {
                                                    // Output data for each row
                                                    while ($row = $supplementaryNoteResult->fetch_assoc()) {
                                                        $title = $row["title"];
                                                        $images = $row["images"];
                                                        $lesson_id = $row['lesson_id'];

                                                ?>
                                                        <div class="col-md-3 col-sm-6 mb-5 search">
                                                            <div class="card border border-0 bg-white">
                                                                <?php
                                                                if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                                    <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=sn" class="proper-content">
                                                                        <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" width="200px" height="200px" class="card-img-top proper-card img-fluid" alt="Card 1">
                                                                        <p class="mindbooster_para1"><?= $title ?></p>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=sn" data-bs-toggle="modal" data-bs-target="#RegistrationModal" class="proper-content">
                                                                        <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" width="200px" height="200px" class="card-img-top proper-card img-fluid" alt="Card 1">
                                                                        <p class="mindbooster_para1"><?= $title ?></p>
                                                                    </a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                <?php }
                                                } else {
                                                    echo "No results found for supplementary_note.";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div id="quiz" class="container tab-pane fade"><br>
                                            <div class="row p-md-3 pb-3">
                                                <?php
                                                // Execute the SQL query for quizzes
                                                $quizSQL = $sql . " AND quiz IS NOT NULL ORDER BY RAND()";
                                                $result = $mysqli->query($quizSQL);

                                                if ($result->num_rows > 0) {
                                                    // Output data for each row
                                                    while ($row = $result->fetch_assoc()) {
                                                        $title = $row["title"];
                                                        $images = $row["images"];
                                                        $lesson_id = $row['lesson_id'];

                                                ?>
                                                        <div class="col-md-3 col-sm-6 mb-5 search">
                                                            <div class="card border border-0 bg-white">
                                                                <?php
                                                                if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                                    <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=qz" class="proper-content">
                                                                        <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" width="200px" height="200px" class="card-img-top proper-card img-fluid" alt="Card 1">
                                                                        <p class="mindbooster_para1"><?= $title ?></p>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=qz" data-bs-toggle="modal" data-bs-target="#RegistrationModal" class="proper-content">
                                                                        <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" width="200px" height="200px" class="card-img-top proper-card img-fluid" alt="Card 1">
                                                                        <p class="mindbooster_para1"><?= $title ?></p>
                                                                    </a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                <?php }
                                                } else {
                                                    echo "No quiz results found.";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div id="performance" class="container tab-pane fade"><br>
                                            <div class="row p-md-3 pb-3">
                                                <?php
                                                // Execute the SQL query for performance-based activities
                                                $performanceSQL = $sql . " AND performance_based_activity IS NOT NULL ORDER BY RAND()";
                                                $result = $mysqli->query($performanceSQL);

                                                if ($result->num_rows > 0) {
                                                    // Output data for each row
                                                    while ($row = $result->fetch_assoc()) {
                                                        $title = $row["title"];
                                                        $images = $row["images"];
                                                        $lesson_id = $row['lesson_id'];

                                                ?>
                                                        <div class="col-md-3 col-sm-6 mb-5 search">
                                                            <div class="card border border-0 bg-white">
                                                                <?php
                                                                if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                                    <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=pb" class="proper-content">
                                                                        <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" width="200px" height="200px" class="card-img-top proper-card img-fluid" alt="Card 1">
                                                                        <p class="mindbooster_para1"><?= $title ?></p>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=pb" data-bs-toggle="modal" data-bs-target="#RegistrationModal" class="proper-content">
                                                                        <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" width="200px" height="200px" class="card-img-top proper-card img-fluid" alt="Card 1">
                                                                        <p class="mindbooster_para1"><?= $title ?></p>
                                                                    </a>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                <?php }
                                                } else {
                                                    echo "No results found.";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                    </div>

                        </div>






                    <?php } else { ?>



                        <div class="col-md-10 p-md-2">

                            <ul class="nav justify-content-between align-items-center nav-mindbootster" role="tablist" id="tabs">

                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#lessonplan">Lesson Plan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#Worksheet">Worksheet</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#supplementary_note">Supplementary Note</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#quiz">Quiz</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#performance">Performance Based Activity</a>
                                </li>
                            </ul>
                            <!-- Start of Search Content  -->
                            <div class="row py-4">
                                <div class="col-md-12 d-flex justify-content-end align-items-end bg-white">
                                    <div class="d-flex align-items-center justify-content-end bg-white">
                                        <div class="input-group">
                                            <input type="text" class="form-control rounded-pill color-search position-relative bg-white text-dark" placeholder="Search" id="search-input">
                                            <div class="position-absolute end-0 top-50 translate-middle-y">
                                                <span class="input-group-text bg-transparent border-0">
                                                    <i class="fa-solid fa-magnifying-glass text-dark"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Start of Search Content  -->
                            <div class="tab-content">
                                <div id="lessonplan" class="container tab-pane active"><br>
                                    <div class="row p-md-3 pb-3">
                                        <?php
                                        // Execute the SQL query for lesson_plan
                                        $lessonPlanSQL = $sql . " AND lesson_plan IS NOT NULL ORDER BY RAND()";
                                        $lessonPlanResult = $mysqli->query($lessonPlanSQL);
                                        if ($lessonPlanResult->num_rows > 0) {
                                            // Output data for each row
                                            while ($row = $lessonPlanResult->fetch_assoc()) {
                                                $title = $row["title"];
                                                $images = $row["images"];
                                                $lesson_id = $row['lesson_id'];
                                        ?>
                                                <div class="col-md-3 col-sm-6 mb-5 search">
                                                    <div class="card border border-0 bg-white">
                                                        <?php
                                                        if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                            <a href="<?= BASE_URL ?>mind-booster-content?id=<?php echo $lesson_id; ?>&type=lp" class="proper-content">
                                                                <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" class="card-img-top img-fluid proper-card" alt="Card 1">
                                                                <p class="mindbooster_para1"><?= $title ?></p>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="<?= BASE_URL ?>mind-booster-content?id=<?php echo $lesson_id; ?>&type=lp" data-bs-toggle="modal" data-bs-target="#RegistrationModal" class="proper-content">
                                                                <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" class="card-img-top img-fluid proper-card" alt="Card 1">
                                                                <p class="mindbooster_para1"><?= $title ?></p>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                        <?php }
                                        } else {
                                            echo "No results found for lesson_plan.";
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div id="Worksheet" class="container tab-pane fade"><br>
                                    <div class="row p-md-3 pb-3">
                                        <?php
                                        // Execute the SQL query for worksheet
                                        $worksheetSQL = $sql . " AND worksheet IS NOT NULL ORDER BY RAND()";
                                        $worksheetResult = $mysqli->query($worksheetSQL);
                                        if ($worksheetResult->num_rows > 0) {
                                            // Output data for each row
                                            while ($row = $worksheetResult->fetch_assoc()) {
                                                $title = $row["title"];
                                                $images = $row["images"];
                                                $lesson_id = $row['lesson_id'];

                                        ?>
                                                <div class="col-md-3 col-sm-6 mb-5 search">
                                                    <div class="card border border-0 bg-white">
                                                        <?php
                                                        if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                            <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=ws" class="proper-content">
                                                                <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" class="card-img-top img-fluid proper-card" alt="Card 1">
                                                                <p class="mindbooster_para1"><?= $title ?></p>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=ws" data-bs-toggle="modal" data-bs-target="#RegistrationModal" class="proper-content">
                                                                <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" class="card-img-top img-fluid proper-card" alt="Card 1">
                                                                <p class="mindbooster_para1"><?= $title ?></p>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                        <?php }
                                        } else {
                                            echo "No results found for worksheet.";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div id="supplementary_note" class="container tab-pane fade"><br>
                                    <div class="row p-md-3 pb-3">
                                        <?php
                                        // Execute the SQL query for supplementary_note
                                        $supplementaryNoteSQL = $sql . " AND supplementary_note IS NOT NULL ORDER BY RAND()";
                                        $supplementaryNoteResult = $mysqli->query($supplementaryNoteSQL);
                                        if ($supplementaryNoteResult->num_rows > 0) {
                                            // Output data for each row
                                            while ($row = $supplementaryNoteResult->fetch_assoc()) {
                                                $title = $row["title"];
                                                $images = $row["images"];
                                                $lesson_id = $row['lesson_id'];

                                        ?>
                                                <div class="col-md-3 col-sm-6 mb-5 search">
                                                    <div class="card border border-0 bg-white">
                                                        <?php
                                                        if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                            <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=sn" class="proper-content">
                                                                <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" width="200px" height="200px" class="card-img-top proper-card img-fluid" alt="Card 1">
                                                                <p class="mindbooster_para1"><?= $title ?></p>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=sn" data-bs-toggle="modal" data-bs-target="#RegistrationModal" class="proper-content">
                                                                <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" width="200px" height="200px" class="card-img-top proper-card img-fluid" alt="Card 1">
                                                                <p class="mindbooster_para1"><?= $title ?></p>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                        <?php }
                                        } else {
                                            echo "No results found for supplementary_note.";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div id="quiz" class="container tab-pane fade"><br>
                                    <div class="row p-md-3 pb-3">
                                        <?php
                                        // Execute the SQL query for quizzes
                                        $quizSQL = $sql . " AND quiz IS NOT NULL ORDER BY RAND()";
                                        $result = $mysqli->query($quizSQL);

                                        if ($result->num_rows > 0) {
                                            // Output data for each row
                                            while ($row = $result->fetch_assoc()) {
                                                $title = $row["title"];
                                                $images = $row["images"];
                                                $lesson_id = $row['lesson_id'];

                                        ?>
                                                <div class="col-md-3 col-sm-6 mb-5 search">
                                                    <div class="card border border-0 bg-white">
                                                        <?php
                                                        if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                            <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=qz" class="proper-content">
                                                                <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" width="200px" height="200px" class="card-img-top proper-card img-fluid" alt="Card 1">
                                                                <p class="mindbooster_para1"><?= $title ?></p>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=qz" data-bs-toggle="modal" data-bs-target="#RegistrationModal" class="proper-content">
                                                                <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" width="200px" height="200px" class="card-img-top proper-card img-fluid" alt="Card 1">
                                                                <p class="mindbooster_para1"><?= $title ?></p>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                        <?php }
                                        } else {
                                            echo "No quiz results found.";
                                        }
                                        ?>
                                    </div>
                                </div>

                                <div id="performance" class="container tab-pane fade"><br>
                                    <div class="row p-md-3 pb-3">
                                        <?php
                                        // Execute the SQL query for performance-based activities
                                        $performanceSQL = $sql . " AND performance_based_activity IS NOT NULL ORDER BY RAND()";
                                        $result = $mysqli->query($performanceSQL);

                                        if ($result->num_rows > 0) {
                                            // Output data for each row
                                            while ($row = $result->fetch_assoc()) {
                                                $title = $row["title"];
                                                $images = $row["images"];
                                                $lesson_id = $row['lesson_id'];

                                        ?>
                                                <div class="col-md-3 col-sm-6 mb-5 search">
                                                    <div class="card border border-0 bg-white">
                                                        <?php
                                                        if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                            <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=pb" class="proper-content">
                                                                <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" width="200px" height="200px" class="card-img-top proper-card img-fluid" alt="Card 1">
                                                                <p class="mindbooster_para1"><?= $title ?></p>
                                                            </a>
                                                        <?php } else { ?>
                                                            <a href="<?= BASE_URL ?>mind-booster-content?id=<?= $lesson_id ?>&type=pb" data-bs-toggle="modal" data-bs-target="#RegistrationModal" class="proper-content">
                                                                <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $images; ?>" width="200px" height="200px" class="card-img-top proper-card img-fluid" alt="Card 1">
                                                                <p class="mindbooster_para1"><?= $title ?></p>
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                        <?php }
                                        } else {
                                            echo "No results found.";
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>

                        </div>

                    <?php } ?>




                </div>
            </div>
        </main>
    </div>
    <!-- Start of Leader Board -->
    <!-- <div class="container"> -->
    <!-- <div class="row p-md-4 p-sm-3 p-3"> -->
    <!-- <div class="col-12 leader">
                            <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid" alt="Card 1">
                        </div> -->
    <!-- </div> -->
    <!-- </div> -->
    <!--End of Leader Board -->
    <?php include 'includes/page-footer.php' ?>

    <!--End of magazine 2nd Layer -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var lastActiveTab = sessionStorage.getItem('lastActiveTab');


            if (lastActiveTab) {
                $('#tabs a[href="#' + lastActiveTab + '"]').tab('show');
            } else {
                $('#tabs a[href="#Worksheet"]').tab('show');
            }


            $('#tabs').on('shown.bs.tab', function(e) {
                var activeTab = e.target.getAttribute('href').substring(1); // Get the tab ID
                sessionStorage.setItem('lastActiveTab', activeTab);
            });
        });

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

        const updateSubjectUrl = (sub_id, e) => {
            e.preventDefault();
            let str_url = window.location.search
            if (str_url.includes('lesson_id'))
                str_url = '';

            if (str_url) {

                if (str_url.includes('subject_id')) {


                    let url_arr = str_url.substr(1).split('&');

                    var index = url_arr.findIndex(el => el.includes('subject_id'));


                    url_arr[index] = 'subject_id=' + sub_id;

                    window.location.href = '?' + url_arr.join('&');

                } else {
                    window.location.href = str_url + '&subject_id=' + sub_id
                }
            } else
                window.location.href = '?subject_id=' + sub_id

        }

        const updateGradeUrl = (grd_id, e) => {
            e.preventDefault();
            let str_url = window.location.search

            if (str_url.includes('lesson_id'))
                str_url = '';

            if (str_url) {

                if (str_url.includes('grade_id')) {
                    let url_arr = str_url.substr(1).split('&');

                    var index = url_arr.findIndex(el => el.includes('grade_id'));


                    url_arr[index] = 'grade_id=' + grd_id;

                    window.location.href = '?' + url_arr.join('&');
                } else {
                    window.location.href = str_url + '&grade_id=' + grd_id
                }

            } else
                window.location.href = '?grade_id=' + grd_id
        }
    </script>
</body>