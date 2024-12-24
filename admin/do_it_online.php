<?php
// include('../config/connection.php');
// var_dump($mysqli);
// exit;
if (isset($_GET['id'])) {
    extract($_GET);
}
include('function/function.php');
include_once 'includes/head.php';

?>

<?php
include_once 'includes/sidebar.php';
?>
<!-- #Main ============================ -->
<div class="page-container">
    <?php include_once 'includes/header.php'; ?>
    <main class='main-content bgc-grey-100'>
        <div class="container-fluid">

            <!-- START Of Magazine Header  -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page Header -->
                    <div class="pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                        <div class="mb-3 mb-md-0">
                            <h1 class="mb-1 h2 fw-bold">Questions</h1>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addLesson">Add Question</button>
                        </div>
                    </div>
                </div>

                <!-- START of Add Do it ONLINE Modal Page -->
                <div class="modal fade" id="addLesson" tabindex="-1" role="dialog" aria-labelledby="lessonmodal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="lessonmodal">Add Question</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" enctype="multipart/form-data" id="addquestion" onsubmit="return validateForm()">
                                    <input type="hidden" name="ltqq_id" value="<?php echo $id; ?>">
                                    <div class="row">
                                        <div class="mb-3">
                                            <label class="form-label">Question Type:</label>
                                            <select class="selectpicker form-control" data-width="100%" name="ltqq_type" id="ltqq_type" onchange="showDiv(this)" required>
                                                <option value="Multiple Choice Question">Multiple Choice Question</option>
                                                <option value="True And False">True & False</option>
                                                <option value="Short Answers">Short Answers</option>
                                            </select>
                                            <small><i> * Select Question Type </i></small>
                                        </div>

                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label">Question :</label>
                                        <textarea class="form-control" name="ltqq_question" id="editornewquestionq1"></textarea>
                                    </div>
                                    <div class="mb-3 col-6">
                                        <input type="checkbox" id="include_file_upload" onchange="toggleFileUpload(this)">
                                        <label for="include_file_upload">Include File Upload</label>
                                        <div id="file_upload_section" style="display: none;">
                                            <label class="form-label">Upload File (Optional):</label>
                                            <input type="file" class="form-control" name="file_upload" id="file_upload" accept="image/*">
                                        </div>
                                    </div>

                                    <div id="mltq">
                                        <div class="table-responsive">
                                            <table class="table table-bordered no-wrap table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th width="120px">
                                                            Option-1
                                                        </th>
                                                        <td>
                                                            <input type="text" name="question_answer1" placeholder="Type Answer Here" class="form-control form-control-sm" id="question_answer1">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Option-2
                                                        </th>
                                                        <td>
                                                            <input type="text" name="question_answer2" placeholder="Type Answer Here" class="form-control form-control-sm" id="question_answer2">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Option-3
                                                        </th>
                                                        <td>
                                                            <input type="text" name="question_answer3" placeholder="Type Answer Here" class="form-control form-control-sm" id="question_answer3">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Option-4
                                                        </th>
                                                        <td>
                                                            <input type="text" name="question_answer4" placeholder="Type Answer Here" class="form-control form-control-sm" id="question_answer4">
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: lightblue;">
                                                        <th>
                                                            Correct Answer
                                                        </th>
                                                        <td>
                                                            <select name="answermulchoice" class="form-control form-control-sm custom-select" id="answermulchoice">
                                                                <option value="" selected>Choose...</option>
                                                                <option value="1">Option-1</option>
                                                                <option value="2">Option-2</option>
                                                                <option value="3">Option-3</option>
                                                                <option value="4">Option-4</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="tf" style="display:none">
                                        <div class="table-responsive">
                                            <table class="table table-bordered no-wrap table-hover">
                                                <tbody>
                                                    <tr>
                                                        <th width="120px">
                                                            Option-1
                                                        </th>
                                                        <td>
                                                            <input type="text" name="question_answer5" placeholder="Type Answer Here" class="form-control form-control-sm" value="True" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>
                                                            Option-2
                                                        </th>
                                                        <td>
                                                            <input type="text" name="question_answer6" placeholder="Type Answer Here" class="form-control form-control-sm" value="False" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr style="background-color: lightblue;">
                                                        <th>
                                                            Correct Answer
                                                        </th>
                                                        <td>
                                                            <select name="tf_answer" class="form-control form-control-sm" id="tf_answer">
                                                                <option value="" selected>Choose...</option>
                                                                <option value="5">Option-1</option>
                                                                <option value="6">Option-2</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="sa" style="display:none">
                                        <div class="table-responsive">
                                            <table class="table table-bordered no-wrap table-hover">
                                                <tbody>
                                                    <tr style="background-color: lightblue;">
                                                        <th width="120px">
                                                            Answer
                                                        </th>
                                                        <td>
                                                            <input type="text" name="question_answer7" placeholder="Type Answer Here" class="form-control form-control-sm" id="question_answer7">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary btn-sm" name="add_doitonline_question">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- END of Add DO IT ONLINE Modal Page -->

            </div>
            <!-- END Of Magazine Header  -->

            <!-- START OF Table content DATA  -->
            <div class="row">
                <div class="col-md-12">
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <div class="data_table table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">

                                <thead class="table-primary">
                                    <th>S.No</th>
                                    <th>Question Type</th>
                                    <th>Question</th>
                                    <th>Answer-1</th>
                                    <th>Answer-2</th>
                                    <th>Answer-3</th>
                                    <th>Answer-4</th>
                                    <th>RIGHT ANSWER</th>
                                    <th>Status</th>
                                    <th width="150px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $queryMindbooster = $mysqli->query("SELECT * FROM `doit_online` WHERE lesson_id=$id");
                                    $num = 1;
                                    if ($queryMindbooster === false) {
                                        echo "Error: " . $mysqli->error;
                                    } else {
                                        while ($row = $queryMindbooster->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?php echo $num++; ?></td>
                                                <td><?php echo $row['do_question_type']; ?></td>
                                                <td>
                                                    <?php
                                                    $description = strip_tags($row['do_question']);
                                                    $showReadMoreButton = strlen($description) > 50;
                                                    echo substr($description, 0, 50) . ($showReadMoreButton ? '...' : '');
                                                    if ($showReadMoreButton) {
                                                    ?>
                                                        <button type="button" class="btn btn-sm btn-gradient-05" data-bs-toggle="modal" data-bs-target="#modalView<?php echo $row['do_id']; ?>">
                                                            <span style="color: skyblue;">Read More</span>
                                                        </button>
                                                    <?php } ?>
                                                </td>

                                                <!-- Start of Description Modal Page -->
                                                <div class="modal fade" id="modalView<?php echo $row['do_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="questionDesc" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header bg-primary text-white">
                                                                <h4 class="modal-title">Question Description</h4>
                                                                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="text-justify text-dark">
                                                                    <?php echo $row['do_question']; ?>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of Description Modal Page -->

                                                <td><?php echo $row['do_question_answer1']; ?></td>
                                                <td><?php echo $row['do_question_answer2']; ?></td>
                                                <td><?php echo $row['do_question_answer3']; ?></td>
                                                <td><?php echo $row['do_question_answer4']; ?></td>
                                                <td><?php echo $row['do_correct_answer']; ?></td>
                                                <td>
                                                    <?php
                                                    $statusText = ($row['do_status'] == 1) ? 'Publish' : 'Unpublish';
                                                    $badgeClass = ($row['do_status'] == 1) ? 'bg-success' : 'bg-danger';
                                                    ?>
                                                    <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                                                </td>
                                                <td class="text-center ">
                                                    <!-- <a class="btn btn-sm btn-secondary" href="" title="View Grade">
                          <i class="fa fa-eye" aria-hidden="true"></i> View</a> -->
                                                    <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editlesson<?php echo $row['do_id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button>
                                                    <a class="btn btn-sm btn-danger" href="do_it_online?delete_question_do_it_online=<?php echo $row['do_id']; ?>" title="Delete question" onclick="return deletelesson()">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                                </td>
                                            </tr>


                                    <?php
                                        }
                                    }
                                    // Close the result set
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF Table content DATA  -->

            <?php
            $queryMindbooster = $mysqli->query("SELECT * FROM `doit_online` WHERE lesson_id=$id");
            // $num = 1;

            if ($queryMindbooster === false) {
                echo "Error: " . $mysqli->error;
            } else {
                while ($row = $queryMindbooster->fetch_assoc()) {
            ?>

                    <!-- START of Edit Do it ONLINE Modal Page -->
                    <div class="modal fade" id="editlesson<?php echo $row['do_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="lessonmodal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="lessonmodal">Add Question</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="POST" enctype="multipart/form-data" id="addquestion">
                                        <input type="hidden" name="ltqq_id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="do_id" value="<?php echo $row['do_id']; ?>">
                                        <input type="hidden" name="ltqq_type" value="<?php echo $row['do_question_type']; ?>">
                                        <input type="hidden" name="existing_do_image" value="<?php echo $row['do_image']; ?>">
                                        <div class="row">
                                            <div class="mb-3">
                                                <label class="form-label">Question Type:</label>
                                                <select class="selectpicker form-control" data-width="100%" name="ltqq_type" id="ltqq_typeedit" disabled>
                                                    <option value="<?php echo $row['do_question_type']; ?>"><?php echo $row['do_question_type']; ?></option>
                                                    <!-- <option value="Multiple Choice Question">Multiple Choice Question</option>
                                                    <option value="True And False">True & False</option>
                                                    <option value="Short Answers">Short Answers</option> -->
                                                </select>
                                                <!-- <small><i> * Select Question Type </i></small> -->
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Question :</label>
                                            <textarea class="form-control" name="ltqq_question" id="editornewquestionq2"><?php echo $row['do_question']; ?></textarea>
                                        </div>
                                        <?php if (($row['do_image']) == '') { ?>
                                            <div class="mb-3 col-6">
                                                <input type="checkbox" id="include_file_upload<?php echo $row['do_id']; ?>" onchange="toggleFileUpload1(this, '<?php echo $row['do_id']; ?>')">
                                                <label for="include_file_upload<?php echo $row['do_id']; ?>">Include File Upload</label>
                                                <div id="file_upload_section1_<?php echo $row['do_id']; ?>" style="display: none;">
                                                    <label class="form-label">Upload File (Optional):</label>
                                                    <input type="file" class="form-control" name="file_upload" id="file_upload_<?php echo $row['do_id']; ?>" accept="image/*">
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="mb-3 col-6">
                                                <!-- Display the image if available --> <img src="../assets/uploads/doitonline_images/<?php echo $row['do_image']; ?>" alt="Image" style="max-width: 200px; max-height: 200px;">
                                            </div>
                                            <div class="mb-3 col-6">
                                                <input type="checkbox" id="include_file_upload<?php echo $row['do_id']; ?>" onchange="toggleFileUpload1(this, '<?php echo $row['do_id']; ?>')">
                                                <label for="include_file_upload<?php echo $row['do_id']; ?>">Change File Upload</label>
                                                <div id="file_upload_section1_<?php echo $row['do_id']; ?>" style="display: none;">
                                                    <label class="form-label">Upload File (Optional):</label>
                                                    <input type="file" class="form-control" name="file_upload" id="file_upload_<?php echo $row['do_id']; ?>" accept="image/*">
                                                </div>
                                            </div>

                                        <?php } ?>

                                        <?php if ($row['do_question_type'] == 'Multiple Choice Question') { ?>

                                            <div id="mltq">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered no-wrap table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <th width="120px">
                                                                    Option-1
                                                                </th>
                                                                <td>
                                                                    <input type="text" name="question_answer1" placeholder="Type Answer Here" class="form-control form-control-sm" id="question_answer1" value="<?php echo $row['do_question_answer1']; ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Option-2
                                                                </th>
                                                                <td>
                                                                    <input type="text" name="question_answer2" placeholder="Type Answer Here" class="form-control form-control-sm" id="question_answer2" value="<?php echo $row['do_question_answer2']; ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Option-3
                                                                </th>
                                                                <td>
                                                                    <input type="text" name="question_answer3" placeholder="Type Answer Here" class="form-control form-control-sm" id="question_answer3" value="<?php echo $row['do_question_answer3']; ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Option-4
                                                                </th>
                                                                <td>
                                                                    <input type="text" name="question_answer4" placeholder="Type Answer Here" class="form-control form-control-sm" id="question_answer4" value="<?php echo $row['do_question_answer4']; ?>">
                                                                </td>
                                                            </tr>
                                                            <tr style="background-color: lightblue;">
                                                                <th>
                                                                    Correct Answer
                                                                </th>
                                                                <td>
                                                                    <select name="answermulchoice" class="form-control form-control-sm custom-select" id="answermulchoice">
                                                                        <option value="1" <?php echo ($row['do_correct_answer'] == $row['do_question_answer1']) ? 'selected' : ''; ?>>Option-1</option>
                                                                        <option value="2" <?php echo ($row['do_correct_answer'] == $row['do_question_answer2']) ? 'selected' : ''; ?>>Option-2</option>
                                                                        <option value="3" <?php echo ($row['do_correct_answer'] == $row['do_question_answer3']) ? 'selected' : ''; ?>>Option-3</option>
                                                                        <option value="4" <?php echo ($row['do_correct_answer'] == $row['do_question_answer4']) ? 'selected' : ''; ?>>Option-4</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php } elseif ($row['do_question_type'] == 'True And False') { ?>
                                            <div id="tf">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered no-wrap table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <th width="120px">
                                                                    Option-1
                                                                </th>
                                                                <td>
                                                                    <input type="text" name="question_answer5" placeholder="Type Answer Here" class="form-control form-control-sm" value="True" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    Option-2
                                                                </th>
                                                                <td>
                                                                    <input type="text" name="question_answer6" placeholder="Type Answer Here" class="form-control form-control-sm" value="False" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr style="background-color: lightblue;">
                                                                <th>
                                                                    Correct Answer
                                                                </th>
                                                                <td>
                                                                    <select name="tf_answer" class="form-control form-control-sm" id="tf_answer">
                                                                        <option value="5" <?php echo ($row['do_correct_answer'] == $row['do_question_answer1']) ? 'selected' : ''; ?>>Option-1</option>
                                                                        <option value="6" <?php echo ($row['do_correct_answer'] == $row['do_question_answer2']) ? 'selected' : ''; ?>>Option-2</option>
                                                                    </select>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php } elseif ($row['do_question_type'] == 'Short Answers') { ?>
                                            <div id="sa">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered no-wrap table-hover">
                                                        <tbody>
                                                            <tr style="background-color: lightblue;">
                                                                <th width="120px">
                                                                    Answer
                                                                </th>
                                                                <td>
                                                                    <input type="text" name="question_answer7" placeholder="Type Answer Here" class="form-control form-control-sm" id="question_answer7" value="<?php echo $row['do_question_answer1']; ?>">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary btn-sm" name="edit_doitonline_question">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- END of Edit DO IT ONLINE Modal Page -->

            <?php
                }
            }
            // Close the result set
            ?>

        </div>
    </main>
</div>
<script>
    function deletelesson() {
        var x = confirm("Are you sure want to delete this Question?");

        if (x == true) {
            return true;
        } else {
            return false;
        }
    }

    function showDiv(select) {
        if (select.value == 'Multiple Choice Question') {
            // document.getElementById('mltq').style.display = "block";
            // document.getElementById('tf').style.display = "none";
            $('#mltq').show();
            $('#tf').hide();
            $('#sa').hide();
            $('#cp').hide()
        } else if (select.value == 'True And False') {
            // document.getElementById('mltq').style.display = "none";
            // document.getElementById('tf').style.display = "block";
            $('#tf').show();
            $('#mltq').hide()
            $('#sa').hide()
            $('#cp').hide()
        } else if (select.value == 'Short Answers') {
            // document.getElementById('mltq').style.display = "none";
            // document.getElementById('tf').style.display = "block";
            $('#sa').show()
            $('#mltq').hide()
            $('#tf').hide();
            $('#cp').hide()
        }


    }

    function toggleFileUpload(checkbox) {
        var fileUploadSection = document.getElementById("file_upload_section");
        fileUploadSection.style.display = checkbox.checked ? "block" : "none";
    }

    function toggleFileUpload1(checkbox, doId) {
        console.log("Checkbox state changed");
        var fileUploadSection = document.getElementById("file_upload_section1_" + doId);
        fileUploadSection.style.display = checkbox.checked ? "block" : "none";
    }
</script>

<script>
    function validateForm() {
        // Get form values
        var ltqqType = document.getElementById('ltqq_type').value;
        var ltqqQuestion = document.getElementById('editornewquestionq1').value;

        // Perform validations for visible elements
        if (ltqqType === "") {
            alert("Please select a Question Type");
            return false; // Prevent form submission
        }

        if (ltqqQuestion.trim() === "") {
            alert("Please enter a Question");
            return false; // Prevent form submission
        }

        // Check elements based on their visibility
        if ($('#mltq').is(':visible')) {
            var answer1 = document.getElementById('question_answer1').value;
            if (answer1.trim() === "") {
                alert("Please enter Option-1");
                return false; // Prevent form submission
            }
            var answer2 = document.getElementById('question_answer2').value;
            if (answer2.trim() === "") {
                alert("Please enter Option-2");
                return false; // Prevent form submission
            }
            var answer3 = document.getElementById('question_answer3').value;
            if (answer3.trim() === "") {
                alert("Please enter Option-3");
                return false; // Prevent form submission
            }
            var answer4 = document.getElementById('question_answer4').value;
            if (answer4.trim() === "") {
                alert("Please enter Option-4");
                return false; // Prevent form submission
            }
            var answermcq = document.getElementById('answermulchoice').value;
            if (answermcq.trim() === "") {
                alert("Please Select Answer");
                return false; // Prevent form submission
            }
        } else if ($('#tf').is(':visible')) {
            // Validate visible elements in 'True & False' section
            var answertf = document.getElementById('tf_answer').value;
            if (answertf.trim() === "") {
                alert("Please Select Answer");
                return false; // Prevent form submission
            }
        } else if ($('#sa').is(':visible')) {
            // Validate visible elements in 'Short Answers' section
            var answersa = document.getElementById('question_answer7').value;
            if (answersa.trim() === "") {
                alert("Please Write Answer");
                return false; // Prevent form submission
            }
        }

        // If all validations pass
        return true; // Form submission allowed
    }
</script>

<?php
include_once 'includes/footer.php'
?>