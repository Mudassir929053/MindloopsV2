<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="assets/owlCarousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/owlCarousel/css/owl.theme.green.css"> -->
    <!-- <script src="assets/owlCarousel/js/jquery.min.js"></script> -->
    <!-- <script src="assets/owlCarousel/js/owl.carousel.min.js"></script> -->
    <?php include 'includes/page-head.php' ?>
    <?php include 'includes/page-header.php' ?>
   <?php extract($_GET);
   ?>

    
</head>

<body class="bg-white text-dark">
    <div class="wrapper">
        <main class="main-content">
            <div class="container-fluid primary-container">
                <div class="container">
                    <div class="row pt-md-3">
                        <div class="col-12 text-center">
                            <h1 class="text-bold">Quiz Game</h1>
                        </div>
                        <!-- <div class="container d-flex justify-content-center align-items-center p-lg-4 p-md-2"> -->
                        <div class="row d-flex justify-content-center align-items-center p-lg-4 p-md-2">
                            <div class="col-md-1 col-6 text-center order-1 order-md-0">
                                <!-- Add Previous Button -->
                                <button class="owl-prev" id="layer-1-prev">
                                </button>
                            </div>

                            <div class="col-md-10 pt-lg-3 d-flex justify-content-center align-items-center order-0 order-md-1">
                                <div id="carousel-layer-1" class="owl-carousel owl-theme">
                                    <?php
                                    // Assuming you already have a database connection stored in $mysqli

                                    // Query to fetch data from the game_category table
                                    $query = $mysqli->query("SELECT `category_id`, `category_name`, `category_image` FROM `tb_quiz_category` where status='1'");

                                    if ($query === false) {
                                        echo "Error: " . $mysqli->error;
                                    } else {
                                        while ($row = $query->fetch_assoc()) {
                                            // Use the fetched data to populate your HTML
                                    ?>
                                    <?php if($game=="mcq"){ ?>
                                            <div class="item">
                                                <a href="mcq_quiz_index?category_id=<?php echo $row['category_id']; ?>">
                                                <div class="card carousel bg-white" style="background-image:url(assets/uploads/mcq_category_image/<?php echo $row['category_image']; ?>);">
                                                </div>
                                                </a>
                                                <p class="ps-2 pt-2 m-0">Quiz Category</p>
                                                <p class="ps-2 fw-bold m-0"><?php echo $row['category_name']; ?></p>
                                            </div>
                                            <?php } 
                                            elseif($game=="tfq") { ?>
                                                <div class="item">
                                                <a href="tfq_quiz_index?category_id=<?php echo $row['category_id']; ?>">
                                                <div class="card carousel bg-white" style="background-image:url(assets/uploads/mcq_category_image/<?php echo $row['category_image']; ?>);">
                                                </div>
                                                </a>
                                                <p class="ps-2 pt-2 m-0">Quiz Category</p>
                                                <p class="ps-2 fw-bold m-0"><?php echo $row['category_name']; ?></p>
                                            </div>

                                            <?php } elseif($game=="WordMatch") { ?>
                                                <div class="item">
                                                <a href="match_words_level?category_id=<?php echo $row['category_id']; ?>">
                                                <div class="card carousel bg-white" style="background-image:url(assets/uploads/mcq_category_image/<?php echo $row['category_image']; ?>);">
                                                </div>
                                                </a>
                                                <p class="ps-2 pt-2 m-0">Quiz Category</p>
                                                <p class="ps-2 fw-bold m-0"><?php echo $row['category_name']; ?></p>
                                            </div>

                                               <?php } elseif($game=="Sudoku") { ?>
                                                <div class="item">
                                                <a href="game-view?category_id=<?php echo $row['category_id']; ?>">
                                                <div class="card carousel bg-white" style="background-image:url(assets/uploads/mcq_category_image/<?php echo $row['category_image']; ?>);">
                                                </div>
                                                </a>
                                                <p class="ps-2 pt-2 m-0">Quiz Category</p>
                                                <p class="ps-2 fw-bold m-0"><?php echo $row['category_name']; ?></p>
                                            </div>
                                            <?php } elseif($game=="WordSearch") { ?>
                                                <div class="item">
                                                <a href="game-view?category_id=<?php echo $row['category_id']; ?>">
                                                <div class="card carousel bg-white" style="background-image:url(assets/uploads/mcq_category_image/<?php echo $row['category_image']; ?>);">
                                                </div>
                                                </a>
                                                <p class="ps-2 pt-2 m-0">Quiz Category</p>
                                                <p class="ps-2 fw-bold m-0"><?php echo $row['category_name']; ?></p>
                                            </div>
                                            <?php } ?>

                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>


                            <div class="col-md-1 col-6 text-center order-2 order-md-2">
                                <!-- Add Next Button -->
                                <button class="owl-next" id="layer-1-next">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5 col-sm-12 pt-4" style="padding: 0; margin:0;" >
                        <img src="<?= BASE_URL ?>/assets/images/homepage/mb-content-removebg-preview.png" loading="lazy" class="img-fluid" alt="Card 1" style="height: 940px;max-width: 120%;">
                    </div>

                    <div class="col-md-3 col-sm-6 pt-5">
                        <a href="loops-next?game=Adventure"><img src="<?= BASE_URL ?>/assets/images/homepage/Group 576.png" loading="lazy" class="img-fluid mb-md-5" alt="Card 2" style="height: 400px;"></a>
                        <a href="loops-next?game=Quizzes"> <img src="<?= BASE_URL ?>/assets/images/homepage/Group 579.png" loading="lazy" class="img-fluid pt-4" alt="Card 3" style="height: 400px;"></a>
                    </div>


                    <div class="col-md-3 col-sm-6 d-flex d-flex justify-content-sm-center justify-content-start align-items-center">
                        <a href="loops-next?game=Puzzle"><img src="<?= BASE_URL ?>/assets/images/homepage/Group 577.png" loading="lazy" class="img-fluid pt-4" alt="Card 4" style="height: 400px;max-width: 120%;"></a>
                    </div>
                </div>
            </div>

            <!--End of Layer-3 of loops -->

            <!-- Start of Leader Board -->
            <!-- <div class="container">
                <div class="row p-md-4 p-sm-3 p-3">
                    <div class="col-12 leader">
                        <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid" alt="Card 1">
                    </div>
                </div> -->
            </div>
            <!--End of Leader Board -->

        </main>
    </div>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                items: 5,
                margin: 10,
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
                        items: 2,
                        nav: false

                    },
                    950: {
                        items: 3,
                        nav: false

                    },
                    1300: {
                        items: 4,
                        nav: false

                    },
                    1600: {
                        items: 5,
                        nav: false
                    }
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
        // Add custom navigation buttons for Layer 2
        $('#layer-2-prev').click(function() {
            $('#carousel-layer-2').trigger('prev.owl.carousel');
        });

        $('#layer-2-next').click(function() {
            $('#carousel-layer-2').trigger('next.owl.carousel');
        });
        // Add custom navigation buttons for Layer 3
        $('#layer-3-prev').click(function() {
            $('#carousel-layer-3').trigger('prev.owl.carousel');
        });

        $('#layer-3-next').click(function() {
            $('#carousel-layer-3').trigger('next.owl.carousel');
        });
    </script>

    <?php include 'includes/page-footer.php' ?>