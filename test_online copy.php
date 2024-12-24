<?php
include 'includes/page-head.php' ?>
<style>
  .center {
    text-align: center;
  }

  input[type="radio"] {
    display: none;
  }

  input[type="radio"]:checked+label {
    position: relative;
    color: green;
    border: 3px solid green;
  }

  input[type="radio"]:checked+label::before {
    content: "";
    display: inline-block;
    width: 20px;
    height: 20px;
    background-color: green;
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
      box-shadow: 0 0 0 0 green;
    }

    70% {
      box-shadow: 0 0 0 20px rgba(250, 162, 26, 0);
    }

    100% {
      box-shadow: 0 0 0 0 green;
    }
  }

  label:active {
    color: #333;
  }

  label:active::before {
    animation: none;
    box-shadow: 0 0 10px #333;
  }

  .form-check-label {
    display: inline-block;
    font-size: 1em;
    color: black;
    text-align: inherit;
    width: 80%;
    border: 1px solid black;
    border-radius: 30px;
    padding: 20px;
    margin: 10px;
  }

  .form-check-input[type="text"] {
    width: 200px;
    height: 40px;
    background-color: white;
  }
</style>

<body class="text-dark bg-white">
  <!-- ======= Header ======= -->
  <?php include 'includes/page-header.php' ?>
  <!-- End Header -->
  <br>
  <br>
  <main>
    <?php
    // session_start();
    // Fetch questions if lesson_id is provided
    if (isset($_GET['lesson_id'])) {
      $lesson_id = $_GET['lesson_id'];
      $query = "SELECT * FROM doit_online WHERE lesson_id = $lesson_id AND do_status = '1' ORDER BY RAND();
      ";
      $result = mysqli_query($mysqli, $query);
      if ($result && mysqli_num_rows($result) > 0) {
        $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $_SESSION['allquestions'] = $questions;
        $total_questions = count($questions);
    ?>
        <div class="container">
          <div class="border-secondary">
            <div class="text-left fs-4 text-primary text-uppercase fw-bold">TOTAL QUESTIONS - <?= $total_questions ?></div><br>
            <div class="card-body shadow p-5">
              <?php
              if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $score = 0;
                foreach ($questions as $question) {
                  $questionId = $question['do_id'];
                  $correct_answer = $question['do_correct_answer'];
                  $submitted_answer = $_POST['choice' . $questionId] ?? '';

                  if ($submitted_answer === $correct_answer) {
                    $score++;
                  }
                }
                $total_questions = count($questions);
                echo "<script>alert('Congratulations!😃 You have successfully completed the test!  Your score is $score out of $total_questions');
          location.href = '$_SERVER[HTTP_REFERER]';</script>";
              } else {
                // Display questions in a form to the user
                echo '<form method="POST" action="">';

                foreach ($questions as $index => $question) {
                  $questionId = $question['do_id'];
                  $questionText = $question['do_question'];
                  $questionType = $question['do_question_type'];
                  $image = $question['do_image'];
                  $ans1 = $question['do_question_answer1'];
                  $ans2 = $question['do_question_answer2'];
                  $ans3 = $question['do_question_answer3'];
                  $ans4 = $question['do_question_answer4'];
                  echo '<div class="question-set">';
                  echo '<div class="card-text py-2">';
                  echo '<div class="row pt-2">';
                  echo "<div class='col-10'>" . ($index + 1) . ")&nbsp;&nbsp;$questionText</div>";
                  echo '</div>';
                  echo '</div>';

                  if ($questionType === 'Multiple Choice Question') { ?>
                     <!-- Display multiple-choice options -->
                    <div class="col-12 text-center">
                    <?php if (!empty($image)) { ?>
                      <img src='assets/uploads/doitonline_images/<?= $image; ?>' alt='Example Image' loading="lazy" width='600' height='400'>
                    <?php }
                    ?>
                    </div>
                    <div class="row center py-2">
                    <div class="row center py-2">
                      <div class="col">
                        <div class="form-check">
                          <input class="form-check-input text-dark" id="a<?= $questionId ?>" name="choice<?= $questionId ?>" type="radio" value="<?= $ans1; ?>" required>
                          <label class="form-check-label" for="a<?= $questionId ?>">
                            <?php echo $ans1; ?></label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-check">
                          <input class="form-check-input text-dark" id="b<?= $questionId ?>" name="choice<?= $questionId ?>" type="radio" value="<?= $ans2; ?>" required>
                          <label class="form-check-label" for="b<?= $questionId ?>"><?php echo $ans2; ?></label>
                        </div>
                      </div>
                    </div>
                    <div class="row center">
                      <div class="col">
                        <div class="form-check">
                          <input class="form-check-input text-dark" id="c<?= $questionId ?>" name="choice<?= $questionId ?>" type="radio" value="<?= $ans3; ?>" required>
                          <label class="form-check-label" for="c<?= $questionId ?>"><?php echo $ans3; ?></label>
                        </div>
                      </div>

                      <div class="col">
                        <?php if ($ans4 != '') : ?>
                          <div class="form-check">
                            <input class="form-check-input text-dark" id="d<?= $questionId ?>" name="choice<?= $questionId ?>" type="radio" value="<?= $ans4; ?>" required>
                            <label class="form-check-label" for="d<?= $questionId ?>"><?php echo $ans4; ?></label>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  <?php
                  } elseif ($questionType === 'True And False') {
                  ?>

                    <div class="col-12 text-center">
                      <?php if (!empty($image)) : ?>
                        <img src="assets/uploads/doitonline_images/<?= $image; ?>" loading="lazy" loading="lazy" alt="Example Image" width="600" height="400">
                      <?php endif; ?>
                    </div>
                    <div class="row center py-2">
                      <div class="col">
                        <div class="form-check">
                          <input class="form-check-input" id="a<?= $questionId ?>" name="choice<?= $questionId ?>" type="radio" value="<?= $ans1; ?>" required>
                          <label class="form-check-label" for="a<?= $questionId ?>">
                            <?php echo $ans1; ?></label>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-check">
                          <input class="form-check-input" id="b<?= $questionId ?>" name="choice<?= $questionId ?>" type="radio" value="<?= $ans2; ?>" required>
                          <label class="form-check-label" for="b<?= $questionId ?>"><?php echo $ans2; ?></label>
                        </div>
                      </div>
                    </div>
                  <?php

                  } else {
                  ?>
                    <div class="row center py-2">
                      <div class="col-12 text-center py-2">
                        <?php if (!empty($image)) : ?>
                          <img src="assets/uploads/doitonline_images/<?= $image; ?>" alt="Example Image" loading="lazy" width="600" height="400">
                        <?php endif; ?>
                      </div>
                      <div class="col-10">
                        <div class="form-group bg-white">
                          <input type="text" class="form-control bg-white border-3 text-black py-2" id="a" name="choice<?= $questionId ?>" placeholder="Write Correct Answer Here!" required>
                        </div>
                      </div>
                    </div>
          <?php
                  }
                  echo '</div>';
                }
                echo '<div class="center">';
                echo '<input type="submit" class="btn bg-success text-white" value="Submit" style="background-size: 100% 130%; height: 50px; width: 150px; margin-top: 20px;">';
                echo '</div>';
                echo '</form>';
              }
            } else {
              echo '<script>alert("No questions available in this category. Please choose another category."); window.location.href = "mind-booster";</script>';
            }
          } else {
            echo '<script>alert("Lesson ID is missing.");</script>';
          }
          ?>
            </div>
          </div>
        </div>
  </main>
</body>
