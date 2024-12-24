<?php include 'includes/page-head.php' ?>
<?php
if (isset($_GET['category_id'])) {
    extract($_GET);
}
?>
<body class="bg-white text-dark">


    <?php include 'includes/page-header.php' ?>
    <div class="wrapper">


        <main class="main-content">
            <!-- Your content here -->

            <!-- Start of Leader Board -->
            <div class="container">
                <div class="row p-md-4 p-sm-3 p-3">
                    <div class="col-12 leader">
                        <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid" alt="Card 1">
                    </div>
                </div>
            </div>
            <!--End of Leader Board -->

            <div class="container-fluid d-flex justify-content-center align-items-center primary-fixed-dim pt-md-5 pb-md-5 pt-sm-2">
                <div class="row">
                    <div class="col-12">
                        <a href="match_words_main?category_id=<?php echo $category_id ?>"><img src="<?= BASE_URL ?>/assets/games/match_words/images/Matchword_main.png" class="card-img-game img-fluid" width="1300" height="700" alt="Game Preview"></a>
                    </div>
                </div>
            </div>

            <!-- Start of Leader Board -->
            <div class="container">
                <div class="row p-md-4 p-sm-3 p-3">
                    <div class="col-12 leader">
                        <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid" alt="Card 1">
                    </div>
                </div>
            </div>
            <!--End of Leader Board -->
        </main>
    </div>


    <?php include 'includes/page-footer.php' ?>