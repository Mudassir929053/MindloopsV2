<?php include 'includes/page-head.php';
include('function_material.php');
// if (isset($_SESSION['uid'])) {
//     echo '<script>window.location.href = "welcome";</script>';
//   } else {
//     echo '<script>window.location.href = "./";</script>';
//   }
$u_id = $_SESSION['uid'];
// echo $role ;
// exit;
if ($role == 4) {
    $dbQuery = "SELECT * FROM `user_table` ut
    RIGHT JOIN student_profile sp
    ON ut.uid = sp.user_id
    RIGHT JOIN grade_table gt
    ON sp.grade = gt.grade_id
    WHERE uid = '$u_id'";

    $dbResult = $mysqli->query($dbQuery);
    $dbRow = $dbResult->fetch_assoc();
    // var_dump($dbRow);
    $grade_id = $dbRow['grade_id'];
}

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

    .dasboard-proper-content {
        text-decoration: none;
        display: inline-block;
        /* To allow scaling */
        transition: transform 0.2s;
        /* Smooth transition for scaling */
    }

    .dasboard-proper-content:hover {
        transform: scale(1.1);
        /* Scale the content on hover (1.1 is the scaling factor) */
    }

    .layer1 {
        width: 93%;
    }

    @media (max-width: 1440px) {

        .prev1,
        .next1 {
            background-size: 100%;
            margin: 2px;
        }
    }

    @media (max-width: 1200px) {
        .layer1 {
            width: 91%;
        }

        .prev1,
        .next1 {
            background-size: 100%;
            margin: 0px;
        }
    }

    @media (max-width: 768px) {
        .layer1 {
            width: 80%;
        }
    }

    @media (max-width: 576px) {
        .layer1 {
            width: 76%;
        }

        .prev1,
        .next1 {
            background-size: 112%;
            margin: 2px;
        }
    }

    .btn-check {
        color: black;
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
    .zoom-out {
    transform: scale(0.7); 
}
</style>

<body class="bg-white texxt-dark">
    <?php include 'includes/page-header.php' ?>
    <div class="wrapper">
        <main class="main-content bg-white">

            <div class="container-fluid mindloops-slider p-lg-4 p-md-3 p-ms-3 p-1">
                <!-- <div class="container-fluid primary-container"> -->
                <!-- <div class="container"> -->
                <div class="row pt-md-3">

                    <!-- <div class="container d-flex justify-content-center align-items-center p-lg-4 p-md-2"> -->
                    <div class="row d-flex justify-content-center align-items-center p-lg-4 p-md-2">
                        <!-- <div class="col-md-1 col-6 text-center order-1 order-md-0"> -->
                        <!-- Add Previous Button -->
                        <div class="col-md-12 pt-lg-3 d-flex justify-content-center align-items-center order-0 order-md-1">
                            <!-- </div> -->
                            <button class="owl-prev prev1" id="layer-1-prev">
                            </button>
                            <div id="carousel-layer-1" class="owl-carousel owl-theme layer1">
                                <div class="item">
                                    <img src="<?= BASE_URL ?>/assets/images/homepage/0223 Discover small size.jpg" loading="lazy" class="d-block w-100 custom-img-height img-fluid img-responsive p-md-3 p-sm-2 p-1" alt="Image 1">

                                </div>
                                <div class="item">
                                    <img src="<?= BASE_URL ?>/assets/images/homepage/0523 Discover Small size-02.jpg" loading="lazy" class="d-block w-100 custom-img-height img-fluid img-responsive p-md-3 p-sm-2 p-1" alt="Image 1">

                                </div>
                                <div class="item">
                                    <img src="<?= BASE_URL ?>/assets/images/homepage/0623 Discover small size-02.jpg" loading="lazy" class="d-block w-100 custom-img-height img-fluid img-responsive p-md-3 p-sm-2 p-1" alt="Image 1">
                                </div>
                                <div class="item">
                                    <img src="<?= BASE_URL ?>/assets/images/homepage/0723 Discover small size-02.jpg" loading="lazy" class="d-block w-100 custom-img-height img-fluid img-responsive p-md-3 p-sm-2 p-1" alt="Image 1">
                                </div>
                            </div>
                            <!-- <div class="col-md-1 col-6 text-center order-2 order-md-2"> -->
                            <!-- Add Next Button -->
                            <button class="owl-next next1" id="layer-1-next">
                            </button>
                        </div>
                        <!-- </div> -->
                    </div>
                </div>
            </div>

            <div class="container-fluid mindloops-dashboard p-3">
                <div class="container bg-white p-2 mb-1 rounded-2 p-2 shadow-sm ">
                    <div class="m-3 pb-1 fw-semibold text-dark">
                        <h3 style="color: #0355b0;">Recommended Activities</h3>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 g-3 mb-2 mx-2 d-flex justify-content-center align-items-center">
                        <?php
                        // Fetch multiple recent lessons for the user's grade
                        if ($role == 4) {

                            $dbQueryLessons = "SELECT * FROM `lesson_table` 
                                WHERE `grade_id` = '$grade_id' 
                                ORDER BY `created_date` DESC 
                                LIMIT 5";
                            // $dbQueryLessons = "SELECT * FROM `lesson_table` 
                            //             ORDER BY `created_date` DESC 
                            //         LIMIT 5"; // Adjust the limit as needed

                            // exit;
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
                        ?>
                                        <!-- <div class="col"> -->
                                        <div class="col-md-4 mb-4 rounded">
                                            <a href="mind-booster?lesson_id=<?php echo $lesson_id; ?>" class="dasboard-proper-content">
                                                <div class="card h-100 bg-white shadow-sm text-dark" style="max-height:300px; max-width:250px;">
                                                    <div>
                                                        <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $lessonimages; ?>" loading="lazy" class="img-fluid rounded" alt="..." style="min-height:220px;">
                                                    </div>
                                                    <div class="card-body d-flex justify-content-between">
                                                        <p class="card-text"><?php echo $lessonTitle; ?></p>
                                                        <p class="card-text"><i class="fa-solid fa-bookmark"></i></p>
                                                    </div>
                                                </div>
                                            </a>
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
                        // Close the database connection
                        ?>
                        <!-- Repeat this card structure for each recommendation -->
                    </div>
                </div>
            </div>


            <div class="container-fluid mindloops-dashboard p-3">
                <div class="container bg-white p-2 mb-1 rounded-2 p-2 shadow-sm ">
                    <div class="m-3 pb-1 fw-semibold text-dark">
                        <h3 class="text-warning">Trending Activities</h3>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-5 g-3 mb-2 mx-2 d-flex justify-content-center align-items-center">
                        <?php
                        // Fetch multiple recent lessons for the user's grade
                        if ($role == 4) {

                            $dbQueryLessons = "SELECT DISTINCT lt.lesson_id,lt.title,lt.images,lt.description,ld.downloaded_date FROM  lesson_download ld 
                            LEFT JOIN  lesson_table lt
                            ON lt.lesson_id = ld.lesson_id
                           
                            ORDER BY ld.downloaded_date DESC LIMIT 3";
                        } else {
                            $dbQueryLessons = "SELECT  * FROM `lesson_table` 
                                        ORDER BY `created_date` DESC 
                                    LIMIT 3"; // Adjust the limit as needed
                        }
                        // exit;
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
                        ?>
                                    <!-- <div class="col"> -->
                                    <div class="col-md-4 mb-4 rounded">
                                        <a href="mind-booster?lesson_id=<?php echo $lesson_id; ?>" class="dasboard-proper-content">
                                            <div class="card h-100 bg-white shadow-sm text-dark" style="max-height:300px; max-width:250px;">
                                                <div>
                                                    <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $lessonimages; ?>" loading="lazy" class="img-fluid rounded" alt="..." style="min-height:220px;">
                                                    <span class="rounded-pill position-absolute top-0 start-0 m-2 px-md-3 text-white" style="background-color: #FCA600;">Worksheet</span>
                                                </div>
                                                <div class="card-body d-flex justify-content-between">
                                                    <p class="card-text"><?php echo $lessonTitle; ?></p>
                                                    <p class="card-text"><i class="fa-solid fa-bookmark"></i></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php
                                }
                            } else {  ?>
                                <div class="bg-white text-dark">No lessons found for this grade</div>
                        <?php    }
                        } else {
                            // Handle the case where the query fails
                            echo "Error: " . $mysqli->error;
                        }
                        // Close the database connection
                        ?>
                        <?php
                        // Fetch multiple recent lessons for the user's grade
                        if ($role == 4) {

                            $dbQueryLessons = "SELECT DISTINCT m.magazine_id,m.title,m.cover_image_url,m.description,m.publish_date,md.download_date FROM  magazine_download md 
                            LEFT JOIN  magazine m
                            ON m.magazine_id = md.magazine_id                           
                            ORDER BY md.download_date DESC LIMIT 2";
                        } else {

                            $dbQueryLessons = "SELECT  * FROM `magazine` 
                                        ORDER BY `created_date` DESC 
                                    LIMIT 2"; // Adjust the limit as needed
                        }
                        // exit;
                        $dbResultLessons = $mysqli->query($dbQueryLessons);

                        // Check if the query was successful
                        if ($dbResultLessons) {
                            // Check if there are any lessons
                            if ($dbResultLessons->num_rows > 0) {
                                // Loop through the results to display each lesson
                                while ($dbRowLesson = $dbResultLessons->fetch_assoc()) {
                                    $magazine_id = $dbRowLesson['magazine_id'];
                                    $magazineTitle = $dbRowLesson['title'];
                                    $publish_date = $dbRowLesson['publish_date'];
                                    $year = date('Y', strtotime($publish_date));
                                    $lessonimages = $dbRowLesson['cover_image_url'];
                                    $lessonDescription = $dbRowLesson['description'];
                        ?>
                                    <!-- <div class="col"> -->
                                    <div class="col-md-4 mb-4 rounded">
                                        <a href="magazine?year?=<?php echo $year; ?>" class="dasboard-proper-content">
                                            <div class="card h-100 bg-white shadow-sm text-dark" style="max-height:300px; max-width:250px;">
                                                <!-- <div> -->
                                                <img src="<?= BASE_URL ?>/assets/uploads/cover_images/<?php echo $lessonimages; ?>" loading="lazy" class="img-fluid rounded" alt="..." style="min-height:220px; ">
                                                <span class="rounded-pill position-absolute top-0 start-0 m-2 px-md-3 text-white" style="background-color: #FCA600;">Magazine</span>
                                                <!-- </div> -->
                                                <div class="card-body d-flex justify-content-between">
                                                    <p class="card-text"><?php echo $magazineTitle; ?></p>
                                                    <p class="card-text"><i class="fa-solid fa-bookmark"></i></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?php
                                }
                            } else { ?>
                                <div class="bg-white text-dark">No lessons found for this grade</div>
                        <?php
                            }
                        } else {
                            // Handle the case where the query fails
                            echo "Error: " . $mysqli->error;
                        }
                        ?>
                        <!-- Repeat this card structure for each recommendation -->
                    </div>
                </div>
            </div>


            <div class="container-fluid mindloops-dashboard p-3">
                <div class="container bg-white mb-3 rounded-2 p-2 shadow-sm ">
                    <div class="m-3 pb-2 fw-semibold text-dark">
                        <h3 style="color: #0355b0;">Materials by Teachers</h3>
                    </div>
                    <div class="row mb-2 d-flex justify-content-center align-items-center">
                        <!-- Previous Button -->
                        <div class="col-md-1 col-6 text-center order-md-0 order-3">
                            <button class="owl-prev" id="layer-2-prev1"></button>
                        </div>
                        <!-- Carousel Container -->
                        <div class="col-md-9">
                            <div id="carousel-layer-2" class="owl-carousel owl-theme layer2">
                                <!-- Slides -->
                                <?php
                                // Fetch multiple recent lessons for the user's grade
                                if ($role == 2 || $role == 3 || $role == 4) {
                                    if ($role == 2) {
                                        $dbQueryLessons = "SELECT *
                    FROM teacher_material AS tm
                    JOIN lesson_table AS lt ON tm.lesson_id = lt.lesson_id
                    ORDER BY tm.created_date DESC";
                                    } else {
                                        $dbQueryLessons = "SELECT *
                    FROM teacher_material AS tm
                    JOIN lesson_table AS lt ON tm.lesson_id = lt.lesson_id
                    ORDER BY tm.created_date DESC";
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
                                                <div class="item">
                                                    <div class="col mb-4 pe-3 rounded">
                                                        <a href="mind-booster-content.php?id=<?php echo $lesson_id; ?>&type=<?php echo ($material_type == 'Worksheet') ? 'ws' : (($material_type == 'Supplementary Note') ? 'sn' : 'qz'); ?>" class="dasboard-proper-content">
                                                            <div class="card h-100 bg-white shadow-sm text-dark">
                                                                <div>
                                                                    <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $lessonimages; ?>" loading="lazy" class="img-fluid rounded" alt="..." style="min-height:220px;">
                                                                    <span class="position-absolute top-0 start-0 m-2 text-white px-md-3 rounded-pill" style="background-color: #0355B0;"><?= $material_type ?></span>
                                                                </div>
                                                                <div class="card-body d-flex justify-content-between">
                                                                    <p class="card-text"><?php echo $lessonTitle; ?></p>
                                                                    <p class="card-text"><i class="fa-solid fa-bookmark"></i></p>
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
                                ?>
                            </div>
                        </div>
                        <!-- Fixed Button -->
                        <?php if ($role == 2) { ?>
                            <div class="col-md-1 text-center">
                                <div class="col-md-1 mb-4 dasboard-proper-content">
                                    <button type="button" class="btn btn-link p-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <img src="<?= BASE_URL ?>/assets/images/homepage/plus-circle.png" loading="lazy" alt="Button">
                                    </button>
                                </div>
                            </div>
                        <?php } ?>
                        <!-- Next Button -->
                        <div class="col-md-1 col-6 text-center">
                            <button class="owl-next" id="layer-2-next1"></button>
                        </div>
                    </div>
                </div>
            </div>

<?php 
$today = date('Y-m-d'); 
$sid = null;
$QUERY = "SELECT subscriber_id FROM subscription WHERE s_status='PAID' AND s_end_date >= '$today' AND subscriber_id=$uid";
$result = $mysqli->query($QUERY);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $sid = $row['subscriber_id'];
}
if ($role == 4 || ($role == 3 && $uid==$sid) || ($role == 2 && $uid==$sid) ){ ?>
            <div class="container-fluid mindloops-dashboard p-3">
                <div class="container bg-white mb-3 rounded-2 p-2 shadow-sm ">
                    <div class="m-3 pb-2 fw-semibold text-dark">
                        <h3 class="text-center">Your Achievement</h3>
                    </div>
                    <div class="row mb-2 d-flex justify-content-center align-items-center">
                        <!-- Previous Button -->
                        <div class="col-md-1 col-6 text-center order-md-0 order-3">
                            <button class="owl-prev" id="layer-2-prev1"></button>
                        </div>
                        <!-- Carousel Container -->
                        <div class="col-md-9">
                            <div id="carousel-layer-2" class="owl-carousel owl-theme layer2">
                                <!-- Slides -->
                                <?php
                               $Query ="SELECT badge_earned.*, badge_table.* FROM badge_earned INNER JOIN badge_table ON badge_earned.badge_category = badge_table.badge_category AND badge_earned.badge_level = badge_table.badge_level AND badge_table.badge_to = badge_earned.badge_to WHERE badge_earned.uid = '$uid'";
                               $dbResultLessons = $mysqli->query($Query);
                                    // Check if the query was successful
                                    if ($dbResultLessons) {
                                        // Check if there are any lessons
                                        if ($dbResultLessons->num_rows > 0) {
                                            // Loop through the results to display each lesson
                                            while ($badge_row = $dbResultLessons->fetch_assoc()) {
                                                $badgeName = $badge_row['badge_title'];
                                                $imagePath = $badge_row['badge_image'];
                                ?>
                                                <div class="item">
                                                    <div class="col mb-4 pe-3 rounded">
                                                        
                                                            <div class="card h-100 bg-white shadow-sm text-dark">
                                                                <div>
                                                                    <img src="<?= BASE_URL ?>/assets/uploads/badges/<?php echo $imagePath; ?>" loading="lazy" class="img-fluid rounded pd-3 zoom-out" alt="..." style="min-height:200px;">
                                                                    
                                                                </div>
                                                                <div class="card-body d-flex justify-content-between text-center">
                                                                    <p class="card-text text-center"><?php echo $badgeName; ?></p>
                                                                    <!-- <p class="card-text"><i class="fa-solid fa-bookmark"></i></p> -->
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                        } else { ?>
                                            <div class="bg-white text-dark">No Achievement</div>
                                <?php }
                                    } else {
                                        // Handle the case where the query fails
                                        echo "Error: " . $mysqli->error;
                                    }
                                
                                ?>
                            </div>
                        </div>
                        
                    
                        <!-- Next Button -->
                        <div class="col-md-1 col-6 text-center">
                            <button class="owl-next" id="layer-2-next1"></button>
                        </div>
                    </div>
                </div>
            </div>

<?php } ?>

            <!-- Materials By Parents -->
<?php if($role == 4){?>
    
            <div class="container-fluid mindloops-dashboard p-3">
                <div class="container bg-white mb-3 rounded-2 p-2 shadow-sm ">
                    <div class="m-3 pb-2 fw-semibold text-dark">
                        <h3 style="color: #0355b0;">Parents Assignment</h3>
                    </div>
                    <div class="row mb-2 d-flex justify-content-center align-items-center">
                        <!-- Previous Button -->
                        <div class="col-md-1 col-6 text-center order-md-0 order-3">
                            <button class="owl-prev" id="layer-2-prev1"></button>
                        </div>
                        <!-- Carousel Container -->
                        <div class="col-md-9">
                            <div id="carousel-layer-2" class="owl-carousel owl-theme layer2">
                                <!-- Slides -->
                                <?php
                                // Fetch multiple recent lessons for the user's grade
                                if ($role == 4 ) {
                                    
                                        $dbQueryLessons = "SELECT lesson_table.*, assign.assigned_by,assign.due_date
                                        FROM lesson_table 
                                        INNER JOIN assign ON lesson_table.lesson_id = assign.lesson_id
                                        WHERE assign.assigned_to = '$u_id'";
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
                                                $material_type = 'worksheet';
                                ?>
                                                <div class="item">
                                                    <div class="col mb-4 pe-3 rounded">
                                                        <a href="mind-booster-content.php?id=<?php echo $lesson_id; ?>&type=<?php echo ($material_type == 'Worksheet') ? 'ws' : 'ws'; ?>" class="dasboard-proper-content">
                                                            <div class="card h-100 bg-white shadow-sm text-dark">
                                                                <div>
                                                                    <img src="<?= BASE_URL ?>/assets/uploads/lesson/<?php echo $lessonimages; ?>" loading="lazy" class="img-fluid rounded pd-3 " alt="..." style="min-height:220px;">
                                                                    <span class="position-absolute top-0 start-0 m-2 text-white px-md-3 rounded-pill" style="background-color: #0355B0;"><?= $material_type ?></span>
                                                                </div>
                                                                <div class="card-body d-flex justify-content-between">
                                                                    <p class="card-text"><?php echo $lessonTitle; ?></p>
                                                                    <p class="card-text"><i class="fa-solid fa-bookmark"></i></p>
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
                                
                                ?>
                            </div>
                        </div>
                        
                        
                        <!-- Next Button -->
                        <div class="col-md-1 col-6 text-center">
                            <button class="owl-next" id="layer-2-next1"></button>
                        </div>
                    </div>
                </div>
            </div>
<?php }?>



            



            <div class="container">
                <div class="row d-flex justify-content-center align-items-center my-5">
                    <?php
                    // SQL query to get the total number of magazines
                    $sqlMagazineCount = "SELECT COUNT(*) AS total_magazines FROM `magazine` WHERE status = 1";
                    $resultMagazineCount = $mysqli->query($sqlMagazineCount);
                    $rowMagazineCount = $resultMagazineCount->fetch_assoc();
                    $totalMagazines = $rowMagazineCount['total_magazines'];
                    ?>
                    <!-- First Row -->
                    <div class="col-md-4 col-12 my-4">
                        <div class="text-center">
                            <h1 class="ps-5" style="color: #0355B0;"><?php echo $totalMagazines; ?></h1>
                            <img src="<?= BASE_URL ?>/assets/images/homepage/Frame 690.png" class="img-fluid rounded" loading="lazy" alt="...">
                        </div>
                    </div>
                    <?php
                    // SQL query to get the total number of lessons
                    $sqlLessonCount = "SELECT COUNT(*) AS total_lessons FROM `lesson_table` WHERE status = 1";
                    $resultLessonCount = $mysqli->query($sqlLessonCount);
                    $rowLessonCount = $resultLessonCount->fetch_assoc();
                    $totalLessons = $rowLessonCount['total_lessons'];
                    // Close the database connection
                    ?>
                    <div class="col-md-4 col-12 my-4">
                        <div class="text-center">
                            <h1 class="ps-5" style="color: #0355B0;"><?php echo $totalLessons; ?></h1>
                            <img src="<?= BASE_URL ?>/assets/images/homepage/Frame 691.png" loading="lazy" class="img-fluid rounded" alt="...">
                        </div>
                    </div>
                    <div class="col-md-4 col-12 my-4">
                        <div class="text-center">
                            <h1 class="ps-5" style="color: #0355B0;">10</h1>
                            <img src="<?= BASE_URL ?>/assets/images/homepage/Frame 692.png" loading="lazy" class="img-fluid rounded" alt="...">
                        </div>
                    </div>
                    <!-- Second Row -->
                    <?php

                    // SQL query to get the total number of videos
                    $sqlVideoCount = "SELECT COUNT(*) AS total_videos FROM `videos`";
                    $resultVideoCount = $mysqli->query($sqlVideoCount);

                    $rowVideoCount = $resultVideoCount->fetch_assoc();
                    $totalVideos = $rowVideoCount['total_videos'];

                    // Close the database connection
                    ?>

                    <div class="col-md-4 col-12 my-4">
                        <div class="text-center">
                            <h1 class="ps-5" style="color: #0355B0;"><?php echo $totalVideos; ?></h1>
                            <img src="<?= BASE_URL ?>/assets/images/homepage/Frame 693.png" loading="lazy" class="img-fluid rounded" alt="...">
                        </div>
                    </div>

                    <?php
                    // Assuming you have a database connection established earlier
                    // SQL query to get the total number of blogs
                    $sqlBlogCount = "SELECT COUNT(*) AS total_blogs FROM `blogs` WHERE status = 1";
                    $resultBlogCount = $mysqli->query($sqlBlogCount);
                    $rowBlogCount = $resultBlogCount->fetch_assoc();
                    $totalBlogs = $rowBlogCount['total_blogs'];
                    ?>
                    <div class="col-md-4 col-12 my-4">
                        <div class="text-center">
                            <h1 class="ps-5" style="color: #0355B0;"><?php echo $totalBlogs; ?></h1>
                            <img src="<?= BASE_URL ?>/assets/images/homepage/Frame 694.png" loading="lazy" class="img-fluid rounded" alt="...">
                        </div>
                    </div>
                    <?php
                    // SQL query to get the total number of blogs
                    $sqlarticleCount = "SELECT count(*) as total_articles FROM `community_article` where article_status=1";
                    $resultarticleCount = $mysqli->query($sqlarticleCount);
                    $totalarticles = 0;
                    $rowarticleCount = $resultarticleCount->fetch_assoc();
                    $totalarticles = $rowarticleCount['total_articles'];
                    ?>
                    <div class="col-md-4 col-12 my-4">
                        <div class="text-center">
                            <h1 class="ps-5" style="color: #0355B0;"><?php echo $totalarticles; ?></h1>
                            <img src="<?= BASE_URL ?>/assets/images/homepage/Frame 695.png" class="img-fluid rounded" alt="...">
                        </div>
                    </div>
                </div>
            </div>

        </main>
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
                                                <img style="width: 130%;" src="<?= BASE_URL ?>/assets/images/homepage/cloud-upload.png" loading="lazy" alt="Button">
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
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Ended -->


    <script>
        $(document).ready(function() {
            $('.layer1').owlCarousel({
                margin: 0,
                stagePadding: 0,
                nav: true,
                autoplay: true,
                loop: true,
                dots: false,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,


                    },
                    500: {
                        items: 1,
                        nav: false

                    },
                    1400: {
                        items: 2,
                        nav: false

                    },

                }
            });

        });

        // Add custom navigation buttons for Layer 1
        $('#layer-1-prev').click(function() {
            $('#carousel-layer-1').trigger('prev.owl.carousel');
        });

        $('#layer-1-next').click(function() {
            $('#carousel-layer-1').trigger('next.owl.carousel');
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
    <script>
        $(document).ready(function() {
            var role = <?php echo $role; ?>; // $role is already defined in your PHP code
            var itemsToShow = (role == 2) ? 3 : 3;

            $('.layer2').owlCarousel({
                items: itemsToShow,
                nav: true,
                autoplay: true,
                loop: true,
                dots: false,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    500: {
                        items: 1,
                        nav: false
                    },
                    950: {
                        items: 2,
                        nav: false
                    },
                    1300: {
                        items: 3,
                        nav: false
                    },
                    1600: {
                        items: itemsToShow, // Set the number of items dynamically
                        nav: false
                    }
                }
            });
        });


        // Add custom navigation buttons for Layer 2
        $('#layer-2-prev1').click(function() {
            $('#carousel-layer-2').trigger('prev.owl.carousel');
        });

        $('#layer-2-next1').click(function() {
            $('#carousel-layer-2').trigger('next.owl.carousel');
        });
        // End of custom navigation buttons for Layer 2
    </script>
    </div>
    </div>

    <?php include 'includes/page-footer.php' ?>