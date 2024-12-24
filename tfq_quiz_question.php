<?php include 'includes/page-head.php' ?>
    <?php
    extract($_GET);
    // echo $category;
    // exit;
    ?>
<?php
// session_start();
$nahi = $_SESSION['question'];
// var_dump($nahi);
// exit;
// echo "<pre>";
// print_r($nahi);
// echo "</pre>";

$total = "SELECT * FROM true_false_questions WHERE category_id=$category_id AND tf_status='1'";
$run = mysqli_query($mysqli, $total) or die(mysqli_error($mysqli));
$totalqn = mysqli_num_rows($run);
$time = time();
$_SESSION['start_time'] = $time;
$allowed_time = count($_SESSION['question']) * 5;
$_SESSION['time_up'] = $_SESSION['start_time'] + ($allowed_time * 60);

?>

<style>
    body {
      background-image: url('assets/Quizes/mcq/images/2.png');
      font-family: "Poppins", "Arial", "Helvetica Neue", sans-serif;
    }

    main {

      /* margin-top: 14%; */
      text-align: center;
    }

    input[type="radio"] {
      display: none;



    }

    input[type="radio"]:checked+label {
      position: relative;
      color: #EC2848;
    }

    input[type="radio"]:checked+label::before {
      content: "";
      display: inline-block;
      width: 20px;
      height: 20px;
      background-color: #EC2848;
      border-radius: 50%;
      margin-right: 10px;
      position: absolute;
      top: 50%;
      left: 0;
      transform: translateY(-50%);
      box-shadow: 0 0 10px #EC2848;
      animation: radio-pulse 0.5s ease-in-out infinite;
    }

    @keyframes radio-pulse {
      0% {
        box-shadow: 0 0 0 0 #EC2848;
      }

      70% {
        box-shadow: 0 0 0 20px rgba(250, 162, 26, 0);
      }

      100% {
        box-shadow: 0 0 0 0 #EC2848;
      }
    }

    label:active {
      color: #333;
    }

    label:active::before {
      animation: none;
      box-shadow: 0 0 10px #333;
    }


    p {
      font-size: 1.5em;
    }

    .form-check-label {
      display: inline-block;
      font-size: 1.5em;
      /* increase font size */
      color: black;
      /* change color to blue */
      text-align: inherit;
      width: 80%;
      background-image: url('assets/Quizes/mcq/images/bg.png');
      background-repeat: no-repeat;
      background-size: 100% 125%;
      padding: 25px;
      /* padding-top: 15px;
      padding-bottom: 15px; */
    }

    /* css example */
    #sp1 {
      content: "\00BB";
      font-size: 1.5em;
      padding: 5px;
      color: black;

    }

    @-webkit-keyframes spaceboots {

      0% {
        -webkit-transform: translate(2px, 1px) rotate(0deg);
      }

      10% {
        -webkit-transform: translate(-1px, -2px) rotate(-1deg);
      }

      20% {
        -webkit-transform: translate(-3px, 0px) rotate(1deg);
      }

      30% {
        -webkit-transform: translate(0px, 2px) rotate(0deg);
      }

      40% {
        -webkit-transform: translate(1px, -1px) rotate(1deg);
      }

      50% {
        -webkit-transform: translate(-1px, 2px) rotate(-1deg);
      }

      60% {
        -webkit-transform: translate(-3px, 1px) rotate(0deg);
      }

      70% {
        -webkit-transform: translate(2px, 1px) rotate(-1deg);
      }

      80% {
        -webkit-transform: translate(-1px, -1px) rotate(1deg);
      }

      90% {
        -webkit-transform: translate(2px, 2px) rotate(0deg);
      }

      100% {
        -webkit-transform: translate(1px, -2px) rotate(-1deg);
      }

    }

    #shake {

      -webkit-animation-name: spaceboots;

      -webkit-animation-duration: 0.8s;

      -webkit-transform-origin: 50% 50%;

      -webkit-animation-iteration-count: infinite;

      -webkit-animation-timing-function: linear;

    }
  </style>

  
<body class="text-dark">
  <!-- ======= Header ======= -->
  <!-- End Header -->
  <div class="mt-5">&nbsp</div>
  <div class="mt-5">&nbsp</div>
  <br>
  <main>
    <?php
    if (count($_SESSION['allquestions']) > 0) {
      $n = $_SESSION['allquestions'][0];
      array_push($_SESSION['attemptedq'], $n);

      $q = "Select * from true_false_questions where tf_id=$n ";
      $q1 = mysqli_query($mysqli, $q);
      $row = mysqli_fetch_array($q1);
      array_shift($_SESSION['allquestions']);
      $question = $row['question'];
      $ans1 = $row['true'];
      $ans2 = $row['false'];
    ?>


      <div class="container">
        <div class="border-secondary mb-3">
          <div class="card-header text-center" style=" background-color:#FAA21A; border-radius:10px; width:fit-content;margin-left:22px; color:aliceblue;font-weight:bold;">QUESTION <?php echo count($_SESSION['attemptedq']); ?> OF <?php echo count($_SESSION['question']); ?></div>
          <div class="card-body" style="background-image: url('assets/Quizes/mcq/images/border_question.png'); background-repeat: no-repeat; background-size: 100% 40%;  padding: 25px;"><br><br>
            <p class="card-text"><?php echo count($_SESSION['attemptedq']); ?>)&nbsp;&nbsp;<?php echo $question; ?></p><br><br><br><br>
            <form method="post" action="tfq_quiz_proces?category_id=<?= $category_id ?>">
              <div class="form-group">
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <div class="form-check">
                        <input class="form-check-input" id="a" name="choice" type="radio" value="1" required>
                        <label class="form-check-label" value="<?php echo $ans1; ?>" for="a">
                          True</label>
                      </div>
                    </div><br><br><br><br>
                    <div class="col">
                      <div class="form-check">
                        <input class="form-check-input" id="b" name="choice" type="radio" value="0" required>
                        <label class="form-check-label" value="<?php echo $ans2; ?>" for="b">False</label>
                      </div>
                    </div>
                  </div>
                  <!-- <input type="submit" class="btn btn-primary" value="Submit"> -->
                  <input type="submit" id="shake" class="btn" value="" style="background-image:url('assets/Quizes/mcq/images/next.png');background-size:100% 130%; height: 50px;width: 150px;margin-top: 20px;">
                  <input type="hidden" name="number" value="<?php echo $n; ?>">
                  <!-- <a href="index.php" class="btn btn-secondary">Stop Quiz</a> -->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      </div>
      <?php } 
    else {
        echo '<script>
            alert("No questions available in this Category Choose Another Category.");
            window.location.href = "loops-next_quiz?game=tfq";
        </script>';
    }
    ?>
  </main>

</body>

</html>