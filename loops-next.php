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

    //    echo $game=extract($_GET);
    //    exit;
    ?>


</head>

<body class="bg-white text-dark">
    <div class="wrapper">
        <main class="main-content">
            <div class="container-fluid primary-container">
                <div class="container">
                    <div class="row pt-md-3">
                        <div class="col-12 text-center">
                            <?php if ($game == "Quizzes") { ?>
                                <h1 class="text-bold"><?php echo $game; ?> </h1>
                            <?php } else { ?>
                                <h1 class="text-bold"><?php echo $game; ?> Games</h1>

                            <?php } ?>
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
                                    $query = $mysqli->query("SELECT `category_id`, `category_name`, `category_image` FROM `game_category` where status='1'");

                                    if ($query === false) {
                                        echo "Error: " . $mysqli->error;
                                    } else {
                                        while ($row = $query->fetch_assoc()) {
                                            // Use the fetched data to populate your HTML
                                    ?>
                                            <?php if ($game == "Crossword") { ?>
                                                <div class="item">
                                                    <a href="crossword.php?category_id=<?php echo $row['category_id']; ?>">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/uploads/game_category_images/<?php echo $row['category_image']; ?>);">
                                                        </div>
                                                    </a>
                                                    <!-- <p class="ps-2 pt-2 m-0">Puzzle Category</p> -->
                                                    <p class="ps-2 fw-bold m-0"><?php echo $row['category_name']; ?></p>
                                                </div>
                                            <?php } elseif ($game == "Jigsaw") { ?>
                                                <div class="item">
                                                    <a href="jigsaw_images?category_id=<?php echo $row['category_id']; ?>">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/uploads/game_category_images/<?php echo $row['category_image']; ?>);">
                                                        </div>
                                                    </a>
                                                    <!-- <p class="ps-2 pt-2 m-0">Puzzle Category</p> -->
                                                    <p class="ps-2 fw-bold m-0"><?php echo $row['category_name']; ?></p>
                                                </div>

                                            <?php } elseif ($game == "WordMatch") { ?>
                                                <div class="item">
                                                    <a href="match_words_level?category_id=<?php echo $row['category_id']; ?>">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/uploads/game_category_images/<?php echo $row['category_image']; ?>);">
                                                        </div>
                                                    </a>
                                                    <!-- <p class="ps-2 pt-2 m-0">Puzzle Category</p> -->
                                                    <p class="ps-2 fw-bold m-0"><?php echo $row['category_name']; ?></p>
                                                </div>

                                            <?php } elseif ($game == "Sudoku") { ?>
                                                <div class="item">
                                                    <a href="/suduko">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/uploads/game_category_images/<?php echo $row['category_image']; ?>);">
                                                        </div>
                                                    </a>
                                                    <!-- <p class="ps-2 pt-2 m-0">Puzzle Category</p> -->
                                                    <p class="ps-2 fw-bold m-0"><?php echo $row['category_name']; ?></p>
                                                </div>
                                            <?php } elseif ($game == "WordSearch") { ?>
                                                <div class="item">
                                                    <a href="wordsearch?category_id=<?php echo $row['category_id']; ?>">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/uploads/game_category_images/<?php echo $row['category_image']; ?>);">
                                                        </div>
                                                    </a>
                                                    <!-- <p class="ps-2 pt-2 m-0">Puzzle Category</p> -->
                                                    <p class="ps-2 fw-bold m-0"><?php echo $row['category_name']; ?></p>
                                                </div>
                                            <?php } elseif ($game == "Adventure") { ?>
                                                <div class="item">
                                                    <a href="Munch/index">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/loops/Adventure_game/munch.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Adventure Game</p>
                                                    <p class="ps-2 fw-bold m-0">Munch</p>
                                                </div>
                                                <div class="item">
                                                    <div class="card carousel bg-white" style="background-image:url(assets/loops/Adventure_game/mergastula.png);">
                                                    </div>
                                                    <p class="ps-2 pt-2 m-0">Adventure Game</p>
                                                    <p class="ps-2 fw-bold m-0">MergAstula</p>
                                                </div>
                                                <div class="item">
                                                    <a href="roadsafety/index.html">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/loops/Adventure_game/road_safety.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Adventure Game</p>
                                                    <p class="ps-2 fw-bold m-0">Road Safety</p>
                                                </div>
                                                <div class="item">
                                                    <a href="Munch/index">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/loops/Adventure_game/munch.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Adventure Game</p>
                                                    <p class="ps-2 fw-bold m-0">Munch</p>
                                                </div>
                                                <div class="item">
                                                    <div class="card carousel bg-white" style="background-image:url(assets/loops/Adventure_game/mergastula.png);">
                                                    </div>
                                                    <p class="ps-2 pt-2 m-0">Adventure Game</p>
                                                    <p class="ps-2 fw-bold m-0">MergAstula</p>
                                                </div>
                                            <?php } elseif ($game == "Quizzes") { ?>
                                                <div class="item">
                                                    <a href="loops-next_quiz?game=mcq">
                                                        <div class="card carousel loops-layer2-bg" style="background-image:url(assets/loops/Quiz/mcq.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Quiz Game</p>
                                                    <p class="ps-2 fw-bold m-0">Test Your Knowledge</p>
                                                </div>
                                                <div class="item">
                                                    <a href="wordconnect_quiz.php">
                                                        <div class="card carousel loops-layer2-bg" style="background-image:url(assets/loops/Quiz/drag.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Quiz Game</p>
                                                    <p class="ps-2 fw-bold m-0">Explore Your IQ</p>
                                                </div>
                                                <div class="item">
                                                    <a href="quiz3_game">
                                                        <div class="card carousel loops-layer2-bg" style="background-image:url(assets/loops/Quiz/wordconnect.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Quiz Game</p>
                                                    <p class="ps-2 fw-bold m-0">Test Your Knowledge</p>
                                                </div>
                                                <div class="item">
                                                    <a href="loops-next_quiz?game=tfq">
                                                        <div class="card carousel loops-layer2-bg" style="background-image:url(assets/Quizes/mcq/images/trueorfalse.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Quiz Game(true/false)</p>
                                                    <p class="ps-2 fw-bold m-0">Challenge Your Mind</p>
                                                </div>
                                                <div class="item">
                                                    <a href="loops-next_quiz?game=mcq">
                                                        <div class="card carousel loops-layer2-bg" style="background-image:url(assets/loops/Quiz/mcq.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Quiz Game</p>
                                                    <p class="ps-2 fw-bold m-0">Test Your Knowledge</p>
                                                </div>
                                            <?php } elseif ($game == "Puzzle") { ?>
                                                <div class="item">
                                                    <a href="loops-next?game=Crossword">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/loops/Puzzle_game/crossword.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Puzzle Game</p>
                                                    <p class="ps-2 fw-bold m-0">Crossword</p>
                                                </div>
                                                <div class="item">
                                                    <a href="loops-next?game=Jigsaw">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/loops/Puzzle_game/jigsaw.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Puzzle Game</p>
                                                    <p class="ps-2 fw-bold m-0">Jigsaw</p>
                                                </div>
                                                <div class="item">
                                                    <a href="loops-next?game=WordMatch">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/loops/Puzzle_game/wordmatch.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Puzzle Game</p>
                                                    <p class="ps-2 fw-bold m-0">Match Words</p>
                                                </div>
                                                <div class="item">
                                                    <a href="suduko_index">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/loops/Puzzle_game/sudoku.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Puzzle Game</p>
                                                    <p class="ps-2 fw-bold m-0">Sudoku</p>
                                                </div>
                                                <div class="item">
                                                    <a href="loops-next?game=WordSearch">
                                                        <div class="card carousel bg-white" style="background-image:url(assets/loops/Puzzle_game/wordsearch.png);">
                                                        </div>
                                                    </a>
                                                    <p class="ps-2 pt-2 m-0">Puzzle Game</p>
                                                    <p class="ps-2 fw-bold m-0">Word Search</p>
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
                    <div class="col-md-5 col-sm-12 pt-4" style="padding: 0; margin:0;">
                        <img src="<?= BASE_URL ?>/assets/images/homepage/mb-content-removebg-preview.png" class="img-fluid" loading="lazy" alt="Card 1" style="height: 940px;max-width: 100%;">
                    </div>

                    <div class="col-md-3 col-sm-6 pt-5 d-flex justify-content-sm-center flex-column justify-content-between">
                        <a href="loops-next?game=Adventure"><img src="<?= BASE_URL ?>/assets/images/homepage/Group 576.png" loading="lazy" class="img-fluid mb-md-5" alt="Card 2" style="height: 400px;"></a>
                        <a href="loops-next?game=Quizzes"> <img src="<?= BASE_URL ?>/assets/images/homepage/Group 579.png" loading="lazy" class="img-fluid pt-4" alt="Card 3" style="height: 400px;"></a>
                    </div>


                    <div class="col-md-3 col-sm-6 d-flex justify-content-sm-center justify-content-start align-items-center">
                        <a href="loops-next?game=Puzzle"><img src="<?= BASE_URL ?>/assets/images/homepage/Group 577.png" loading="lazy" class="img-fluid pt-4" alt="Card 4" style="height: 400px;max-width: 120%;"></a>
                    </div>
                </div>
            </div>

            <!--End of Layer-3 of loops -->

            <!-- Start of Leader Board -->
            <!-- <div class="container">
                <div class="row p-md-4 p-sm-3 p-3"> -->
            <!-- <div class="col-12 leader">
                        <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid" alt="Card 1">
                    </div> -->
            <!-- </div>
            </div> -->
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