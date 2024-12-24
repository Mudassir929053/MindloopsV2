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

  .bg-success {
    width: calc(15% - 5px);
    /* Adjust the width of each button */
    margin-top: 3%;
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
      $query = "SELECT * FROM doit_online WHERE lesson_id = $lesson_id AND do_status = '1' ORDER BY RAND();";
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
              <div id="question-container">
                <form id="question-form" onsubmit="submitForm(); return false;" method="POST" action="submit.php">
                  <?php foreach ($questions as $index => $question) { ?>
                    <div class="question-set" id="question-<?= $index ?>" <?php if ($index !== 0) echo 'style="display: none;"'; ?>>
                      <div class="card-text py-2">
                        <div class="row pt-2">
                          <div class="col-10"><?= ($index + 1) . ")&nbsp;&nbsp;" . $question['do_question'] ?></div>
                        </div>
                      </div>

                      <?php if (!empty($question['do_image'])) { ?>
                        <div class="col-12 text-center">
                          <img src="assets/uploads/doitonline_images/<?= $question['do_image']; ?>" alt="Example Image" loading="lazy" width="600" height="400">
                        </div>
                      <?php } ?>

                      <div class="row center py-2">
                        <?php if ($question['do_question_type'] === 'Multiple Choice Question') { ?>
                          <div class="col">
                            <div class="form-check">
                              <input class="form-check-input text-dark" id="choice<?= $index ?>_1" name="choice<?= $index ?>" type="radio" value="<?= $question['do_question_answer1'] ?>">
                              <label class="form-check-label" for="choice<?= $index ?>_1"><?= $question['do_question_answer1'] ?></label>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-check">
                              <input class="form-check-input text-dark" id="choice<?= $index ?>_2" name="choice<?= $index ?>" type="radio" value="<?= $question['do_question_answer2'] ?>">
                              <label class="form-check-label" for="choice<?= $index ?>_2"><?= $question['do_question_answer2'] ?></label>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-check">
                              <input class="form-check-input text-dark" id="choice<?= $index ?>_3" name="choice<?= $index ?>" type="radio" value="<?= $question['do_question_answer3'] ?>">
                              <label class="form-check-label" for="choice<?= $index ?>_3"><?= $question['do_question_answer3'] ?></label>
                            </div>
                          </div>
                          <?php if (!empty($question['do_question_answer4'])) { ?>
                            <div class="col">
                              <div class="form-check">
                                <input class="form-check-input text-dark" id="choice<?= $index ?>_4" name="choice<?= $index ?>" type="radio" value="<?= $question['do_question_answer4'] ?>">
                                <label class="form-check-label" for="choice<?= $index ?>_4"><?= $question['do_question_answer4'] ?></label>
                              </div>
                            </div>
                          <?php } ?>
                        <?php } elseif ($question['do_question_type'] === 'True And False') { ?>
                          <div class="col">
                            <div class="form-check">
                              <input class="form-check-input" id="choice<?= $index ?>_true" name="choice<?= $index ?>" type="radio" value="True">
                              <label class="form-check-label" for="choice<?= $index ?>_true">True</label>
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-check">
                              <input class="form-check-input" id="choice<?= $index ?>_false" name="choice<?= $index ?>" type="radio" value="False">
                              <label class="form-check-label" for="choice<?= $index ?>_false">False</label>
                            </div>
                          </div>
                        <?php } else { ?>
                          <div class="col-10">
                            <div class="form-group bg-white">
                              <input type="text" class="form-control bg-white border-3 text-black py-2" name="choice<?= $index ?>" placeholder="Write Correct Answer Here!">
                            </div>
                          </div>
                        <?php } ?>
                      </div>

                      <div class="center">
                        <?php if ($index !== 0) { ?>
                          <button type="button" class="btn bg-success text-white rounded-pill btn-lg me-4" onclick="showQuestion('question-<?= $index - 1 ?>')">Previous</button>
                        <?php } ?>
                        <?php if ($index !== $total_questions - 1) { ?>
                          <button type="button" class="btn bg-success text-white rounded-pill btn-lg me-4" onclick="showQuestion('question-<?= $index + 1 ?>')">Next</button>
                        <?php } else { ?>
                          <input type="submit" class="btn bg-success text-white rounded-pill btn-lg" value="Submit">
                        <?php } ?>
                      </div>
                    </div>
                  <?php } ?>
                </form>
              </div>
            </div>
          </div>
        </div>
    <?php
      } else {
        echo '<script>alert("No questions available in this category. Please choose another category."); window.location.href = "mind-booster";</script>';
      }
    } else {
      echo '<script>alert("Lesson ID is missing.");</script>';
    }
    ?>
    <!-- Modal -->
    <div class="modal fade" id="score-modal" tabindex="-1" aria-labelledby="score-modal-label" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title" id="score-modal-label">Your Score</h5>
            <!-- <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button> -->
          </div>
          <div class="modal-body bg-white">
            <div id="score-modal-content"></div>
          </div>
          <div class="modal-footer bg-white">
            <!-- Only keep the close button -->
            <button type="button" class="btn btn-secondary" onclick="closeModalAndNavigate()">Close</button>
          </div>
        </div>
      </div>
    </div>

    <script>
      // Function to close the modal and navigate back in the browser history
      function closeModalAndNavigate() {
        // Close the modal
        var scoreModal = new bootstrap.Modal(document.getElementById('score-modal'));
        scoreModal.hide();

        // Navigate back in the browser history
        history.back();
      }

      // Add event listener to handle modal close event
      document.getElementById('score-modal').addEventListener('hide.bs.modal', function() {
        // Close the modal and navigate back in the browser history
        closeModalAndNavigate();
      });
    </script>

  </main>

  <script>
    function showQuestion(questionId) {
      document.querySelectorAll('.question-set').forEach(function(element) {
        element.style.display = 'none';
      });
      document.getElementById(questionId).style.display = 'block';
    }
  </script>
  <script>
    // Function to submit the form via AJAX and display the score in a modal
    function submitForm() {
      var form = document.getElementById('question-form');
      var formData = new FormData(form);
      var lesson = '<?php echo $lesson_id ?>';
      formData.append('lesson_id', lesson);
      // Make an AJAX request to submit.php
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'submit.php', true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            // Parse the response JSON
            // console.log(xhr.responseText);
            var response = JSON.parse(xhr.responseText);

            // Display the score in a modal
            displayScoreModal(response.scoreMessage);
          } else {
            alert('Error: Unable to get score.');
          }
        }
      };
      xhr.send(formData);
    }

    // Function to display the score modal
    function displayScoreModal(scoreMessage) {
      // Show the modal
      var scoreModal = new bootstrap.Modal(document.getElementById('score-modal'));
      scoreModal.show();

      // Display the score message
      document.getElementById('score-modal-content').innerText = scoreMessage;
    }

    // Function to close the score modal
    function closeScoreModal() {
      // Hide the modal
      var scoreModal = new bootstrap.Modal(document.getElementById('score-modal'));
      scoreModal.hide();
    }
  </script>

</body>