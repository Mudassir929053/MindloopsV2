<?php include 'includes/page-head.php' ?>
   

<body class="bg-white text-dark">
     <?php include 'includes/page-header.php' ?>
    <div class="wrapper">
        <main class="main-content">
            <div class="container-fluid primary-container">
                <div class="container">
                    <div class="row pt-md-3">
                        <div class="col-12 text-center">
                            <h1 class="text-bold">Puzzle Games</h1>
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
                                    <div class="item">
                                        <a href="loops-next?game=Crossword">
                                            <div class="card carousel bg-white" style="background-image:url(assets/loops/Puzzle_game/crossword.png);">
                                            </div>
                                        </a>
                                        <p class="ps-2 pt-2 m-0">Puzzle Game</p>
                                        <p class="ps-2 fw-bold m-0">Crossword</p>
                                    </div>
                                    <!--<div class="item">-->
                                    <!--    <a href="loops-next?game=Jigsaw">-->
                                    <!--        <div class="card carousel bg-white" style="background-image:url(assets/loops/Puzzle_game/jigsaw.png);">-->
                                    <!--        </div>-->
                                    <!--    </a>-->
                                    <!--    <p class="ps-2 pt-2 m-0">Puzzle Game</p>-->
                                    <!--    <p class="ps-2 fw-bold m-0">Jigsaw</p>-->
                                    <!--</div>-->
                                    <!-- <div class="item">
                                        <a href="loops-next?game=WordMatch">
                                            <div class="card carousel bg-white" style="background-image:url(assets/loops/Puzzle_game/wordmatch.png);">
                                            </div>
                                        </a>
                                        <p class="ps-2 pt-2 m-0">Puzzle Game</p>
                                        <p class="ps-2 fw-bold m-0">Match Words</p>
                                    </div> -->
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

            <!--start Layer-2 of loops -->
            <div class="container-fluid">
                <div class="container">
                    <div class="row pt-md-3">
                        <div class="col-12 text-center">
                            <h1 class="text-bold">Quizzes</h1>
                        </div>
                        <!-- <div class="container d-flex justify-content-center align-items-center p-lg-4 p-md-2"> -->
                        <div class="row d-flex justify-content-center align-items-center p-lg-4 p-md-2">
                            <div class="col-md-1 col-6 text-center order-1 order-md-0">
                                <!-- Add Previous Button -->
                                <button class="owl-prev" id="layer-2-prev">
                                </button>
                            </div>
                            <div class="col-md-10 pt-lg-3 d-flex justify-content-center align-items-center order-0 order-md-1">
                                <div id="carousel-layer-2" class="owl-carousel owl-theme">
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
                                </div>
                            </div>
                            <div class="col-md-1 col-6 text-center order-2 order-md-2">
                                <!-- Add Next Button -->
                                <button class="owl-next" id="layer-2-next">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--END of Layer-2 of loops -->

            <!--Start of Layer-3 of loops -->
            <div class="container-fluid secondary-container">
                <div class="container">
                    <div class="row pt-md-3">
                        <div class="col-12 text-center">
                            <h1 class="text-bold">Adventure Games</h1>
                        </div>
                        <!-- <div class="container d-flex justify-content-center align-items-center p-lg-4 p-md-2"> -->
                        <div class="row d-flex justify-content-center align-items-center p-lg-4 p-md-2">
                            <div class="col-md-1 col-6 text-center order-1 order-md-0">
                                <!-- Add Previous Button -->
                                <button class="owl-prev" id="layer-3-prev">
                                </button>
                            </div>
                            <div class="col-md-10 pt-lg-3 d-flex justify-content-center align-items-center order-0 order-md-1">
                                <div id="carousel-layer-3" class="owl-carousel owl-theme">
                                    <div class="item">
                                        <a href="Munch/index">
                                            <div class="card carousel bg-white" style="background-image:url(assets/loops/Adventure_game/munch.png);">
                                            </div>
                                        </a>
                                        <p class="ps-2 pt-2 m-0">Adventure Game</p>
                                        <p class="ps-2 fw-bold m-0">Munch</p>
                                    </div>
                                    <div class="item">
                                         <a href="Mergastua">
                                        <div class="card carousel bg-white" style="background-image:url(assets/loops/Adventure_game/mergastula.png);">
                                        </div>
                                        </a>
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
                                        <a href="Mergastua">
                                        <div class="card carousel bg-white" style="background-image:url(assets/loops/Adventure_game/mergastula.png);">
                                        </div>
                                        </a>
                                        <p class="ps-2 pt-2 m-0">Adventure Game</p>
                                        <p class="ps-2 fw-bold m-0">MergAstula</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 col-6 text-center order-2 order-md-2">
                                <!-- Add Next Button -->
                                <button class="owl-next" id="layer-3-next">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of Layer-3 of loops -->

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
        // End of custom navigation buttons for Layer 1

        // Add custom navigation buttons for Layer 2
        $('#layer-2-prev').click(function() {
            $('#carousel-layer-2').trigger('prev.owl.carousel');
        });

        $('#layer-2-next').click(function() {
            $('#carousel-layer-2').trigger('next.owl.carousel');
        });
        // End of custom navigation buttons for Layer 2

        // Add custom navigation buttons for Layer 3
        $('#layer-3-prev').click(function() {
            $('#carousel-layer-3').trigger('prev.owl.carousel');
        });

        $('#layer-3-next').click(function() {
            $('#carousel-layer-3').trigger('next.owl.carousel');
        });
        // End of custom navigation buttons for Layer 3
    </script>

    <?php include 'includes/page-footer.php' ?>