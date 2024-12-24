<?php
include('../config/connection.php');
// var_dump($mysqli);
// exit;
include('function/mindbooster-function.php');
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
              <h1 class="mb-1 h2 fw-bold">Subject</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addLesson">Add Lesson</button>
            </div>
          </div>
        </div>

        <!-- START of Add Magazine Modal Page -->
        <div class="modal fade" id="addLesson" tabindex="-1" role="dialog" aria-labelledby="lessonmodal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="lessonmodal">Add Lesson</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="LessonForm">
                  <div class="row">
                    <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">


                    <div class="col-md-4">
                      <div class="mb-3">
                        <label for="title" class="form-label">Lesson Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                      </div>
                    </div>
                    <?php
                    // Fetch Grades
                    $gradeQuery = "SELECT grade_id, grade, grade_name FROM grade_table WHERE grade_status = '1'";
                    $gradeResult = $mysqli->query($gradeQuery);

                    // Fetch Subjects
                    $subjectQuery = "SELECT subject_id, subject_name FROM subject_table WHERE subject_status = '1'";
                    $subjectResult = $mysqli->query($subjectQuery);
                    ?>


                    <div class="col-md-4">
                      <div class="mb-3">
                        <label for="grade_id" class="form-label">Grade ID:</label>
                        <select class="form-select" id="grade_id" name="grade_id" required>
                          <option value="">Select Grade</option>
                          <?php
                          while ($gradeRow = $gradeResult->fetch_assoc()) {
                            echo '<option value="' . $gradeRow['grade_id'] . '">' . $gradeRow['grade_name'] . ' ' . $gradeRow['grade'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>

                    <!-- Column 2: Subject ID -->
                    <div class="col-md-4">
                      <div class="mb-3">
                        <label for="subject_id" class="form-label">Subject ID:</label>
                        <select class="form-select" id="subject_id" name="subject_id" required>
                          <option value="">Select Subject</option>
                          <?php
                          while ($subjectRow = $subjectResult->fetch_assoc()) {
                            echo '<option value="' . $subjectRow['subject_id'] . '">' . $subjectRow['subject_name'] . '</option>';
                          }
                          ?>
                        </select>
                      </div>
                    </div>




                  </div>



                  <div class="row">
                    <!-- Column 1: Grade ID -->
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label for="description" class="form-label">Lesson Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                      </div>
                    </div>

                  </div>


                  <!-- Row 3 -->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="images" class="form-label">Lesson Images:</label>
                        <input type="file" class="form-control" id="images" name="images" accept="image/*">
                      </div>
                    </div>

                    <!-- Column 3 -->
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="lesson_plan" class="form-label">Lesson Plan (Word):</label>
                        <input type="file" class="form-control" id="lesson_plan" name="lesson_plan" accept=".doc, .docx">
                      </div>
                    </div>

                    <!-- Column 1 -->


                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="worksheet" class="form-label">Worksheet (PDF only):</label>
                        <input type="file" class="form-control" id="worksheet" name="worksheet" accept=".pdf">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="supplementary_note" class="form-label">Supplementary Notes (Accept Presentation Files)</label>
                        <input type="file" class="form-control" id="supplementary_note" name="supplementary_note" accept=".ppt, .pptx, .odp, .key">
                      </div>
                    </div>


                  </div>


                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="quiz" class="form-label">Quiz (PDF only):</label>
                        <input type="file" class="form-control" id="quiz" name="quiz" accept=".pdf">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label for="performance_activity" class="form-label">Performance-Based Activity (PDF only):</label>
                        <input type="file" class="form-control" id="performance_activity" name="performance_activity" accept=".pdf">
                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-select" id="status" name="status" required>
                          <option value="1">Publish</option>
                          <option value="0">Unpublish</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add_Lesson">Submit</button>
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
        <div class="col-md-12">
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <div class="data_table table-responsive">
              <table id="dataTable" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead class="table-primary">
                  <tr>
                  <th width="10px;">S.No</th>
                  <th width="100px;" >Lesson Name</th>
                  <th width="100px;">Lesson</th>
                  <th width="100px;">Grade</th>
                  <th width="50px;">Lesson Plan</th>
                  <th width="50px;">Supplementary Note</th>
                  <th width="50px;">Quiz</th>
                  <th width="50px;">Worksheet</th>
                  <th width="50px;">Classroom Activity</th>
                  <th width="50px;">Status</th>
                  <th width="150px;">Action</th>
                  </tr>
                </thead>
                <?php
                $queryMindbooster = $mysqli->query("SELECT * FROM `lesson_table` AS lt
                LEFT JOIN subject_table AS st ON lt.subject_id = st.subject_id
                LEFT JOIN grade_table AS gd ON gd.grade_id = lt.grade_id
               ");
                $num = 1;

                if ($queryMindbooster === false) {
                  echo "Error: " . $mysqli->error;
                } else {
                  while ($row = $queryMindbooster->fetch_assoc()) {
                ?>
                    <tr>
                      <td><?php echo $num++; ?></td>
                      <td>
                        <div class="lesson-preview">
                          <img src="../assets/uploads/lesson/<?php echo $row['images']; ?>" width="80" height="60" alt="Image Preview">
                          <br>
                          <?php echo $row['title']; ?>
                        </div>
                      </td>


                      <td><?php echo $row['subject_name']; ?></td>
                      <td><?php echo $row['grade_name'] . $row['grade']; ?></td>
                      <td>
                        <?php if (!empty($row['lesson_plan'])) : ?>
                          <a href="../assets/uploads/lesson/<?php echo $row['lesson_plan']; ?>" target="_blank">
                            <i class="fa-solid fa-file-word fa-2xl" style="color: #1790ee;display: flex; justify-content: center; align-items: center; width: 100px; height: 100px;"></i>
                          </a>
                          
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if (!empty($row['supplementary_note'])) : ?>
                          <a href="../assets/uploads/lesson/<?php echo $row['supplementary_note']; ?>" target="_blank">
                            <i class="fa-solid fa-file-powerpoint fa-2xl" style="color: #dd4c0e;display: flex; justify-content: center; align-items: center; width: 100px; height: 100px;"></i>
                          </a>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if (!empty($row['quiz'])) : ?>
                          <a href="../assets/uploads/lesson/<?php echo $row['quiz']; ?>" target="_blank">
                            <i class="fa-solid fa-file-pdf fa-2xl" style="color: #e61e1e;display: flex; justify-content: center; align-items: center; width: 100px; height: 100px;"></i>
                          </a>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if (!empty($row['worksheet'])) : ?>
                          <a href="../assets/uploads/lesson/<?php echo $row['worksheet']; ?>" target="_blank">
                            <i class="fa-solid fa-file-pdf fa-2xl" style="color: #e61e1e;display: flex; justify-content: center; align-items: center; width: 100px; height: 100px;"></i>
                          </a>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php if (!empty($row['performance_based_activity'])) : ?>
                          <a href="../assets/uploads/lesson/<?php echo $row['performance_based_activity']; ?>" target="_blank">
                            <i class="fa-solid fa-file-pdf fa-2xl" style="color: #e61e1e;display: flex; justify-content: center; align-items: center; width: 100px; height: 100px;"></i>
                          </a>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?php
                        $statusText = ($row['status'] == 1) ? 'Publish' : 'Unpublish';
                        $badgeClass = ($row['status'] == 1) ? 'bg-success' : 'bg-danger';
                        ?>
                        <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                      </td>
                      <td class="text-center ">
                        <!-- <a class="btn btn-sm btn-secondary" href="" title="View Grade">
                          <i class="fa fa-eye" aria-hidden="true"></i> View</a> -->
                        <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editlesson<?php echo $row['lesson_id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button>
                        <a class="btn btn-sm btn-danger" href="mindbooster-lesson?delete_lesson=<?php echo $row['lesson_id']; ?>" title="Delete Lesson" onclick="return deletelesson()">
                          <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                        <a href="do_it_online?id=<?php echo $row['lesson_id']; ?>" class="btn btn-sm btn-secondary mt-2">Do it online</a>
                      </td>


                    </tr>

                    <!-- Edit Grade Modal -->
                    <div class="modal fade" id="editlesson<?php echo $row['lesson_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editSubjectModal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editSubjectModal">Edit Subject</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data" id="LessonForm">
                              <div class="row">
                                <input type="hidden" class="form-control" id="lesson_id" name="lesson_id" value="<?php echo $row['lesson_id']; ?>" required>


                                <div class="col-md-4">
                                  <div class="mb-3">
                                    <label for="edit_title" class="form-label">Lesson Title:</label>
                                    <input type="text" class="form-control" id="edit_title" name="edit_title" value="<?php echo $row['title']; ?>" required>
                                  </div>
                                </div>
                                <?php
                                // Fetch Grades
                                $gradeQuery = "SELECT grade_id, grade, grade_name FROM grade_table WHERE grade_status = '1'";
                                $gradeResult = $mysqli->query($gradeQuery);

                                // Fetch Subjects
                                $subjectQuery = "SELECT subject_id, subject_name FROM subject_table WHERE subject_status = '1'";
                                $subjectResult = $mysqli->query($subjectQuery);
                                ?>


                                <div class="col-md-4">
                                  <div class="mb-3">
                                    <label for="grade_id" class="form-label">Grade ID:</label>
                                    <select class="form-select" id="grade_id" name="grade_id" required>
                                      <option value="">Select Grade</option>
                                      <?php
                                      while ($gradeRow = $gradeResult->fetch_assoc()) {
                                        $selected = ($gradeRow['grade_id'] == $row['grade_id']) ? 'selected' : '';
                                        echo '<option value="' . $gradeRow['grade_id'] . '" ' . $selected . '>' . $gradeRow['grade_name'] . ' ' . $gradeRow['grade'] . '</option>';
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>

                                <!-- Column 2: Subject ID -->
                                <div class="col-md-4">
                                  <div class="mb-3">
                                    <label for="subject_id" class="form-label">Subject ID:</label>
                                    <select class="form-select" id="subject_id" name="subject_id" required>
                                      <option value="">Select Subject</option>
                                      <?php
                                      while ($subjectRow = $subjectResult->fetch_assoc()) {
                                        $selected = ($subjectRow['subject_id'] == $row['subject_id']) ? 'selected' : '';
                                        echo '<option value="' . $subjectRow['subject_id'] . '" ' . $selected . '>' . $subjectRow['subject_name'] . '</option>';
                                      }
                                      ?>
                                    </select>
                                  </div>
                                </div>




                              </div>



                              <div class="row">
                                <!-- Column 1: Grade ID -->
                                <div class="col-md-12">
                                  <div class="mb-3">
                                    <label for="edit_description" class="form-label">Lesson Description:</label>
                                    <textarea class="form-control" id="edit_description" name="edit_description" rows="3" required><?php echo $row['description']; ?></textarea>
                                  </div>
                                </div>

                              </div>


                              <!-- Row 3 -->
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="col-12">
                                    <div class="mb-3">
                                      <label for="edit_images" class="form-label">Lesson Images:</label>
                                      <input type="file" class="form-control" id="edit_images" name="edit_images" accept="image/*">

                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label for="edit_images" class="form-label">Current Lesson Images:</label>

                                    <img src="../assets/uploads/lesson/<?php echo $row['images']; ?>" width="80" height="60" alt="Lesson Image">
                                  </div>
                                </div>
                                <!-- Column 3 -->
                                <div class="col-md-6">
                                  <div class="col-12">
                                    <div class="mb-3">
                                      <label for="edit_lesson_plan" class="form-label">Lesson Plan (Word only):</label>
                                      <input type="file" class="form-control" id="edit_lesson_plan" name="edit_lesson_plan" accept=".doc, .docx">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="lesson_plan_link" class="form-label">Current Lesson Plan:</label>
                                      <?php if (!empty($row['lesson_plan'])) : ?>
                                        <a href="../assets/uploads/lesson/<?php echo $row['lesson_plan']; ?>" target="_blank">
                                          <i class="fa-solid fa-file-word fa-2xl" style="color: #1790ee;display: flex; justify-content: center; align-items: center; width: 100px; height: 100px;"></i>
                                        </a>
                                      <?php else : ?>
                                        <span>No lesson plan uploaded.</span>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                </div>


                                <!-- Column 1 -->


                              </div>


                              <div class="row">
                                <div class="col-md-6">
                                  <div class="col-md-12">
                                    <div class="mb-3">
                                      <label for="edit_worksheet" class="form-label">Worksheet (PDF only):</label>
                                      <input type="file" class="form-control" id="edit_worksheet" name="edit_worksheet" accept=".pdf">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="worksheet_link" class="form-label">Current Worksheet:</label>
                                      <?php if (!empty($row['worksheet'])) : ?>
                                        <a href="../assets/uploads/lesson/<?php echo $row['worksheet']; ?>" target="_blank">
                                          <i class="fa-solid fa-file-pdf fa-2xl" style="color: #e61e1e;display: flex; justify-content: center; align-items: center; width: 100px; height: 100px;"></i>

                                        </a>
                                      <?php else : ?>
                                        <span>No worksheet uploaded.</span>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="col-12">
                                    <div class="mb-3">
                                      <label for="edit_supplementary_note" class="form-label">Supplementary Notes (Accept Presentation Files)</label>
                                      <input type="file" class="form-control" id="edit_supplementary_note" name="edit_supplementary_note" accept=".ppt, .pptx, .odp, .key">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="supplementary_note_link" class="form-label">Current Supplementary Notes:</label>
                                      <?php if (!empty($row['supplementary_note'])) : ?>
                                        <a href="../assets/uploads/lesson/<?php echo $row['supplementary_note']; ?>" target="_blank">
                                          <i class="fa-solid fa-file-powerpoint fa-2xl" style="color: #dd4c0e;display: flex; justify-content: center; align-items: center; width: 100px; height: 100px;"></i>

                                        </a>
                                      <?php else : ?>
                                        <span>No supplementary notes uploaded.</span>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                </div>



                              </div>


                              <div class="row">
                                <div class="col-md-6">
                                  <div class="col-12">
                                    <div class="mb-3">
                                      <label for="edit_quiz" class="form-label">Quiz (PDF only):</label>
                                      <input type="file" class="form-control" id="edit_quiz" name="edit_quiz" accept=".pdf">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="quiz_link" class="form-label">Current Quiz:</label>
                                      <?php if (!empty($row['quiz'])) : ?>
                                        <a href="../assets/uploads/lesson/<?php echo $row['quiz']; ?>" target="_blank">
                                          <i class="fa-solid fa-file-pdf fa-2xl" style="color: #e61e1e;display: flex; justify-content: center; align-items: center; width: 100px; height: 100px;"></i>

                                        </a>
                                      <?php else : ?>
                                        <span>No quiz uploaded.</span>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="col-12">
                                    <div class="mb-3">
                                      <label for="edit_performance_activity" class="form-label">Performance-Based Activity (PDF only):</label>
                                      <input type="file" class="form-control" id="edit_performance_activity" name="edit_performance_activity" accept=".pdf">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="mb-3">
                                      <label for="performance_activity_link" class="form-label">Current Performance-Based Activity:</label>
                                      <?php if (!empty($row['performance_based_activity'])) : ?>
                                        <a href="../assets/uploads/lesson/<?php echo $row['performance_based_activity']; ?>" target="_blank">
                                          <i class="fa-solid fa-file-pdf fa-2xl" style="color: #e61e1e;display: flex; justify-content: center; align-items: center; width: 100px; height: 100px;"></i>

                                        </a>
                                      <?php else : ?>
                                        <span>No performance-based activity uploaded.</span>
                                      <?php endif; ?>
                                    </div>
                                  </div>
                                </div>


                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="mb-3">
                                    <label for="edit_status" class="form-label">Status:</label>
                                    <select class="form-select" id="edit_status" name="edit_status" required>
                                      <option value="1">Publish</option>
                                      <option value="0">Unpublish</option>
                                    </select>
                                  </div>
                                </div>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-sm" name="edit_Lesson">Submit</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>





                <?php
                  }
                }
                // Close the result set
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- END OF Table content DATA  -->

    </div>
  </main>
</div>
<script>
  function deletelesson() {
    var x = confirm("Are you sure want to delete this Lesson?");

    if (x == true) {
      return true;
    } else {
      return false;
    }
  }
</script>

<?php
include_once 'includes/footer.php'
?>