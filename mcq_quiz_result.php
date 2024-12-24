<?php include 'includes/page-head.php' ?>
<?php
// session_start();
// var_dump($_SESSION);
// exit;
if (!isset($_SESSION['score'])) {
    echo "<script>window.location.href = 'loops-next_quiz.php?game=mcq';</script>";
}
$_SESSION['attemptedq'] = [];
// var_dump($_SESSION);
// exit;
?>
 <style>
    body {

      font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
    }

    #bg {
      background-image: url('assets/Quizes/mcq/images/2.png');
      /* margin-top: 8%; */
      background-size: cover;
      background-attachment: fixed;
      background-repeat: no-repeat;
      /* font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif; */


    }

    main {
      /* position: center; */

      text-align: center;
      /* font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif; */

    }

    .font {

      font-size: 20px;
    }
  </style>

  
<body class="text-dark" id="bg">
  <!-- End Header -->
  <?php
  $score = $_SESSION['score'];

  // $query = "UPDATE users SET score = '$score' ";
  // $run = mysqli_query($conn, $query) or die(mysqli_error($conn));
  ?>
  <main style="background-image: url('assets/Quizes/mcq/images/Instruction.png');background-repeat:no-repeat; background-position: center; height: 800px;">
    <div class="container py-5 font"><br><br><br><br><br><br><br><br><br><br>
      <h2>Congratulations!</h2>
      <p>You have successfully completed the test</p>
      <p>Total points: <?php if (isset($_SESSION['score'])) {
                          echo $_SESSION['score'];
                        }; ?> </p>
      <div class="text-center mt-4">
        <a href="loops-next_quiz?game=mcq" class="btn"><img src="assets/Quizes/mcq/images/start1.png" height="55px"></a>
        <a href="loops" class="btn"><img src="assets/Quizes/mcq/images/exit1.png" height="50px"></a>
      </div>
    </div>
</body>
</html>
<?php unset($_SESSION['score']); ?>
<?php unset($_SESSION['time_up']); ?>
<?php unset($_SESSION['start_time']); ?>