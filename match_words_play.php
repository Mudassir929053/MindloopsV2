
<head>
  
    <?php include 'includes/page-head.php' ?>
    <?php

    extract($_GET);
    // echo $level;
    if ($level === 'Easy') {
        $limit = 3;
    } elseif ($level === 'Medium') {
        $limit = 5;
    } elseif ($level === 'Hard') {
        $limit = 10;
    } else {
        // Default limit
        $limit = 3;
    }

    $sql = "SELECT word_image, word_name FROM `word_match` WHERE game_level='$level' and cat_id='$category_id' LIMIT $limit";
    $result = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($result) == 0) {
        echo '<script>
            alert("No Match Word Images inserted");
            window.location.href = "match_words_level?category_id=' . $category_id . '";
        </script>';
    } else {
       
    ?>
    <?php
    if ($level == 'Easy') {
        $cssLink = 'assets/games/match_words/css/easy.css';
    } else if ($level == 'Medium') {
        $cssLink = 'assets/games/match_words/css/medium.css';
    } else if ($level == 'Hard') {
        $cssLink = 'assets/games/match_words/css/hard.css';
    }

    // Output CSS link tag
    echo "<link rel='stylesheet' href='$cssLink'>";
    ?>

</head>

<body class="bg text-dark">
    <div class="container-fluid p-3">
        <div class="row  ">
            <div class="flex-container">
                <div class="class">
                    <a href="match_words_level?category_id=<?php echo $category_id ?>"> <img id="img1" src="assets/games/match_words/images/backbtn.png" alt="..."> </a>
                </div>
                <div class="class">
                    <a class="thumbnail" data-bs-toggle="modal" data-bs-target="#myModal1"><img id="img1" src="assets/games/match_words/images/questionbtn.png" alt="..."> </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <?php
        ?>
        <div class="row">
            <div class="col-12">
                <section class="draggable-elements">
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <div class="draggable" id="<?= $row['word_name'] ?>" draggable="true" style="background-image:url('assets/uploads/word_image_match/<?= $row['word_image'] ?>')"></div>
                    <?php endwhile; ?>
                </section>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-12">
                <section class="droppable-elements">
                    <?php mysqli_data_seek($result, 0); // Reset the result pointer to the beginning 
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <div class="droppable" id="<?= $row['id'] ?>" data-draggable-id="<?= $row['word_name'] ?>"><span><?= $row['word_name'] ?></span></div>
                    <?php endwhile; ?>
                </section>
            </div>
        </div>
    </div>
    <script src="assets/games/match_words/js/main.js"></script>
    <!-- Modal -->
    <div id="myModal" class="modal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3>Congratulations!</h3>
                    <h3>You did a great job.</h3>
                </div>
                <div class="button-container">
                    <button id="play-again-btn" type="button" class="btn btn-primary">Play Again</button>
                    <button id="quit-btn" type="button" class="btn btn-secondary">Quit</button>
                </div>
            </div>
        </div>
    </div>


    <!--END Modal -->
    <div id="myModal1" class="modal" tabindex="-1" role="dialog" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    Drag the images and drop <br><br>into the word which they<br><br> are matching.
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="popup">
        <div class="popup-content">
            <h3 id="tag">Match the picture with its words</h3><br>
            <div class="button-container">
                <br>
                <button id="ok-btn">OK</button>
            </div>
        </div>
    </div>

    <!--END Modal -->

    <script>
        window.onload = function() {
            var popup = document.getElementById("popup");
            var okBtn = document.getElementById("ok-btn");
            okBtn.onclick = function() {
                popup.style.display = "none";
            }
        }
    </script>

</body>
<?php } ?>
</html>