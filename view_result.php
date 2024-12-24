<?php
include 'includes/page-head.php';
?>
<style>
.center {
    text-align: center;
}

input[type="radio"] {
    display: none;
}

/* Apply green border for correct answers */
.text-success:checked + .form-check-label {
    border-color: green;
}

/* Apply red border for incorrect answers */
.text-danger:checked + .form-check-label {
    border-color: red;
}

input[type="radio"]:checked+label::before {
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
    position: relative;
}


.form-check-input:disabled~.form-check-label,
.form-check-input[disabled]~.form-check-label {
    cursor: default;
    opacity: 1;
}

.form-check-input[type="text"] {
    width: 200px;
    height: 40px;
    background-color: white;
}

.bg-success {
    width: calc(15% - 5px);
    margin-top: 3%;
}


</style>

<body class="text-dark bg-white">
    <!-- Header -->
    <?php include 'includes/page-header.php'; ?>
    <!-- End Header -->

    <br>
    <br>
    <main>
        <?php
        // session_start();
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
                                <form id="question-form" method="POST" action="submit.php">
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
                                                <?php
                                                // Fetch correct answer and status from score_table based on lesson_id and doitonline_id
                                                $query = "SELECT * FROM score_table WHERE lesson_id = $lesson_id AND doitonline_id = {$question['do_id']}";
                                                $score_result = mysqli_query($mysqli, $query);
                                                $score_data = mysqli_fetch_assoc($score_result);

                                                if ($question['do_question_type'] === 'Multiple Choice Question') {
                                                    // Display options    
                                                    $options = ['A' => $question['do_question_answer1'], 'B' => $question['do_question_answer2'], 'C' => $question['do_question_answer3']];
                                                    if (!empty($question['do_question_answer4'])) {
                                                        $options['D'] = $question['do_question_answer4'];
                                                    }

                                                    foreach ($options as $optionKey => $optionValue) {
                                                        $isChecked = $score_data && $score_data['mark_answer'] == $optionValue;
                                                        $isCorrect = $optionValue == $question['do_correct_answer'];
                                                        $labelClass = $isChecked && $isCorrect ? 'text-success' : ($isChecked ? 'text-danger' : '');

                                                ?>
                                                        <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input text-dark" id="choice<?= $index ?>_<?= $optionKey ?>" name="choice<?= $index ?>" type="radio" value="<?= $optionValue ?>" <?= $isChecked ? 'checked' : '' ?> disabled>
                                                                <label class="form-check-label <?= $labelClass ?>" for="choice<?= $index ?>_<?= $optionKey ?>"><?= $optionValue ?></label>
                                                            </div>
                                                        </div>
                                                <?php }
                                                } elseif ($question['do_question_type'] === 'True And False') {
                                                    $options = ['True', 'False'];
                                                    foreach ($options as $optionValue) {
                                                        $isChecked = $score_data && $score_data['mark_answer'] == $optionValue;
                                                        $isCorrect = $optionValue == $question['do_correct_answer'];
                                                        $labelClass = $isChecked && $isCorrect ? 'valid-feedback' : ($isChecked ? 'text-danger' : '');
                                                ?>
                                                       <div class="col">
                                                            <div class="form-check">
                                                                <input class="form-check-input" id="choice<?= $index ?>_<?= $optionValue ?>" name="choice<?= $index ?>" type="radio" value="<?= $optionValue ?>" <?= $isChecked ? 'checked' : '' ?> disabled>
                                                                <label class="form-check-label <?= $labelClass ?>" for="choice<?= $index ?>_<?= $optionValue ?>"><?= $optionValue ?></label>
                                                            </div>
                                                            
                                                        </div>
                                                <?php }
                                                } else { ?>
                                                    <div class="col-10">
                                                        <div class="form-group bg-white text-center">
                                                            <input type="text" class="form-control bg-white border-3 text-black py-2 <?= $score_data && $score_data['score'] == 1 ? 'is-valid' : 'is-invalid' ?>" name="choice<?= $index ?>" value="<?= $score_data['mark_answer'] ?>" placeholder="Write Correct Answer Here!" readonly>
                                                            <div class="<?= $score_data && $score_data['score'] == 1 ? 'valid-feedback' : 'invalid-feedback' ?>">
                                                                <?= $score_data && $score_data['score'] == 1 ? '' : '' ?>
                                                            </div>
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
                                                    <a href="test_online.php?lesson_id=<?= $lesson_id; ?>" class="btn bg-success text-white rounded-pill btn-lg me-4">
                                                        Redo 
                                                    </a>
                                                    <a href="mind-booster.php?" class="btn bg-success text-white rounded-pill btn-lg me-4">
                                                        Worksheet 
                                                    </a>

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
    </main>

    <!-- Score Modal -->
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
                    <button type="button" class="btn btn-secondary" onclick="closeScoreModal()">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showQuestion(questionId) {
            document.querySelectorAll('.question-set').forEach(function(element) {
                element.style.display = 'none';
            });
            document.getElementById(questionId).style.display = 'block';
        }

        function closeScoreModal() {
            var scoreModal = new bootstrap.Modal(document.getElementById('score-modal'));
            scoreModal.hide();
        }
    </script>

</body>

</html>
