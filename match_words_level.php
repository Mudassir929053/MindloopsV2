<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'includes/page-head.php' ?>
    <?php
if (isset($_GET['category_id'])) {
    extract($_GET);
}
?>
    <style>
    body {
      background-image: url(assets/games/match_words/images/bg1.png);
      background-size: 100% 100%;
      background-repeat: no-repeat;
      background-attachment: fixed;
      /* line-height: 0.5; */
      padding: 0;
    }
    .level-btn:hover {
      transform: scale(1.1);
      transition: all 0.3s ease-in-out;
    }
  </style>
</head> 
<body class="bg">
  <div class="container-fluid">
    <div class="row pb-5">
      <div class="col-md-1 col-2">
        <a href="loops-next?game=WordMatch">
          <img src="assets/games/match_words/images/backbtn.png" alt="Back Button" class="img-fluid" width="500">
        </a>
      </div>
      <div class="col-md-10 col-9 text-center">
        <img src="assets/games/match_words/images/select_level.png" alt="Title" class="img-fluid" style="border-radius: 0 0 50px 50px;">
      </div>
    </div>
  </div>

  <div class="container d-flex justify-content-center align-items-center">
    <div class="row pt-5">
      <div class="col-md-4">
        <button class="btn level-btn" data-level="easy"><img src="assets/games/match_words/images/easy.png" alt="..." class="img-fluid" width="350"></button>
      </div>
      <div class="col-md-4">
        <button class="btn level-btn" data-level="medium"><img src="assets/games/match_words/images/medium.png" alt="..." class="img-fluid" width="350"></button>
      </div>
      <div class="col-md-4">
        <button class="btn level-btn" data-level="hard"><img src="assets/games/match_words/images/hard.png" alt="..." class="img-fluid" width="350"></button>
      </div>
    </div>
  </div>
<script>
    const easyBtn = document.querySelector('[data-level="easy"]');
    const mediumBtn = document.querySelector('[data-level="medium"]');
    const hardBtn = document.querySelector('[data-level="hard"]');
    
    const category_id = <?php echo $category_id; ?>; // Pass the PHP variable to JavaScript

    easyBtn.addEventListener('click', () => {
      window.location.href = `match_words_play.php?level=Easy&category_id=${category_id}`;
    });

    mediumBtn.addEventListener('click', () => {
      window.location.href = `match_words_play.php?level=Medium&category_id=${category_id}`;
    });

    hardBtn.addEventListener('click', () => {
      window.location.href = `match_words_play.php?level=Hard&category_id=${category_id}`;
    });
</script>

</body>