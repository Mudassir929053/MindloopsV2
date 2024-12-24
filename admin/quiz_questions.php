<?php
// include('../config/connection.php');
// var_dump($mysqli);
// exit;
if (isset($_GET['category_id'])) {
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
                    <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
                        <div class="mb-3 mb-md-0">
                            <h1 class="mb-1 h2 fw-bold">Quiz Questions</h1>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMagazine">Add Question</button>
                        </div>
                    </div>
                </div>

                <!-- START of Add Question Modal Page -->
                <div class="modal fade" id="addMagazine" tabindex="-1" role="dialog" aria-labelledby="magazinemodal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="magazinemodal">Add Question</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" enctype="multipart/form-data" id="magazineDetails">
                                    <input type="hidden" name="category_id" id="category_id" value="<?php echo $category_id; ?>">
                                    <!-- Question -->
                                    <div class="mb-3">
                                        <label for="question" class="form-label">Question (less than 500 characters.)</label>
                                        <textarea class="form-control" id="question" name="question" rows="4" maxlength="500" placeholder="Enter Your question Here..." required></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="ans1" class="form-label">Option-1</label>
                                            <input type="text" class="form-control" id="ans1" name="ans1" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="ans2" class="form-label">Option-2</label>
                                            <input type="text" class="form-control" id="ans2" name="ans2" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="ans3" class="form-label">Option-3</label>
                                            <input type="text" class="form-control" id="ans3" name="ans3" required>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="ans4" class="form-label">Option-4</label>
                                            <input type="text" class="form-control" id="ans4" name="ans4" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="correct_answer" class="form-label">Correct Answer</label>
                                            <select class="form-select" id="correct_answer" name="correct_answer" required>
                                                <option value="a">Option-1</option>
                                                <option value="b">Option-2</option>
                                                <option value="c">Option-3</option>
                                                <option value="d">Option-4</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="1">Publish</option>
                                                <option value="0">Unpublish</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success btn-sm" name="add_quiz_question">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END of Add Magazine Modal Page -->

            </div>
            <!-- END Of Magazine Header  -->

            <!-- START OF Table content DATA  -->
            <div class="row">
                <div class="col-md-12 col-12">
                    <div>
                        <!-- <button type="button" class="btn btn-primary px-5 btn-md text-bolder fs-5" onclick="goBack()">Back</button> -->
                        <a href="quiz_category" class="btn btn-primary px-5 btn-md text-bolder fs-5">Back</a>
                    </div>
                    <div class="bgc-white bd bdrs-3 p-20 mB-20">
                        <div class="data_table table-responsive">
                            <table id="dataTable" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                                <thead class="table-primary">
                                    <tr>
                                        <th>S.No</th>
                                        <th>Question</th>
                                        <th>Option-1</th>
                                        <th>Option-2</th>
                                        <th>Option-3</th>
                                        <th>Option-4</th>
                                        <th>Answer</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    <?php
                                    $queryMagazine = $mysqli->query("SELECT * FROM `questions` WHERE category_id=$category_id");
                                    $num = 1;

                                    if ($queryMagazine === false) {
                                        echo "Error: " . $mysqli->error;
                                    } else {
                                        while ($row = $queryMagazine->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?php echo $num++; ?></td>
                                                <td class="wide">
                                                    <?php
                                                    $question = strip_tags(substr($row['question'], 0, 50));
                                                    $showReadMoreButton = strlen($row['question']) > 50;
                                                    echo $question . ($showReadMoreButton ? '...' : '');
                                                    if ($showReadMoreButton) {
                                                    ?>
                                                        <button type="button" class="btn btn-sm btn-gradient-05" data-bs-toggle="modal" data-bs-target="#modalView<?php echo $row['qno']; ?>">
                                                            <span style="color: skyblue;">Read More</span>
                                                        </button>
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $row['ans1']; ?></td>
                                                <td><?php echo $row['ans2']; ?></td>
                                                <td><?php echo $row['ans3']; ?></td>
                                                <td><?php echo $row['ans4']; ?></td>
                                                <td>
                                                    <?php
                                                    $correct_answer = $row['correct_answer'];
                                                    if ($correct_answer === 'a') {
                                                        echo "Option-1";
                                                    } elseif ($correct_answer === 'b') {
                                                        echo "Option-2";
                                                    } elseif ($correct_answer === 'c') {
                                                        echo "Option-3";
                                                    } elseif ($correct_answer === 'd') {
                                                        echo "Option-4";
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $statusText = ($row['status'] == 1) ? 'Publish' : 'Unpublish';
                                                    $badgeClass = ($row['status'] == 1) ? 'bg-success' : 'bg-danger';
                                                    ?>
                                                    <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                                                </td>
                                                <td class="text-center ">
                                                    <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editMagField<?php echo $row['qno']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button>
                                                    <a class="btn btn-sm btn-danger" href="quiz_questions?delete_quiz_question=<?php echo $row['qno']; ?>" title="Delete Question Field" onclick="return deleteindField()">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <!-- START of Edit Question Modal Page -->
                                            <div class="modal fade" id="editMagField<?php echo $row['qno']; ?>" tabindex="-1" role="dialog" aria-labelledby="magfield" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="magzine">Edit Question</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST" enctype="multipart/form-data" id="magazineDetails">
                                                                <input type="hidden" name="qno" id="qno" value="<?php echo $row['qno']; ?>">
                                                                <!-- Question -->
                                                                <div class="mb-3">
                                                                    <label for="question" class="form-label">Question (less than 500 characters.)</label>
                                                                    <textarea class="form-control" id="question" name="question" rows="4" maxlength="500" required><?php echo $row['question']; ?></textarea>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="ans1" class="form-label">Option-1</label>
                                                                        <input type="text" class="form-control" id="ans1" name="ans1" value="<?php echo $row['ans1']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="ans2" class="form-label">Option-2</label>
                                                                        <input type="text" class="form-control" id="ans2" name="ans2" value="<?php echo $row['ans2']; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="ans3" class="form-label">Option-3</label>
                                                                        <input type="text" class="form-control" id="ans3" name="ans3" value="<?php echo $row['ans3']; ?>" required>
                                                                    </div>
                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="ans4" class="form-label">Option-4</label>
                                                                        <input type="text" class="form-control" id="ans4" name="ans4" value="<?php echo $row['ans4']; ?>" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="correct_answer" class="form-label">Correct Answer</label>
                                                                        <select class="form-select" id="correct_answer" name="correct_answer" required>
                                                                            <option value="a" <?php if ($row['correct_answer'] === 'a') echo 'selected'; ?>>Option-1</option>
                                                                            <option value="b" <?php if ($row['correct_answer'] === 'b') echo 'selected'; ?>>Option-2</option>
                                                                            <option value="c" <?php if ($row['correct_answer'] === 'c') echo 'selected'; ?>>Option-3</option>
                                                                            <option value="d" <?php if ($row['correct_answer'] === 'd') echo 'selected'; ?>>Option-4</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-6">
                                                                        <label for="status" class="form-label">Status</label>
                                                                        <select class="form-select" id="status" name="status" required>
                                                                            <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Publish</option>
                                                                            <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>Unpublish</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success btn-sm" name="edit_quiz_question">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END of Edit Question Modal Page -->
                                            <div class="modal fade" id="modalView<?php echo $row['qno']; ?>" tabindex="-1" role="dialog" aria-labelledby="questionDesc" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h4 class="modal-title">Question Description</h4>
                                                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="text-justify text-dark">
                                                                <?php echo $row['question']; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    <?php
                                        }
                                    }
                                    // Close the result set
                                    $queryMagazine->close();
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF Table content DATA  -->

        </div>
    </main>

    <script>
        function deleteindField() {
            var x = confirm("Are you sure want to delete this QUIZ(MCQ) Question?");

            if (x == true) {
                return true;
            } else {
                return false;
            }
        }

        function goBack() {
            window.history.back();
        }
    </script>
</div>
<?php
include_once 'includes/footer.php';
// $mysqli->close();

?>