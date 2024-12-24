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
              <h1 class="mb-1 h2 fw-bold">Grade</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addGrade">Add Grade</button>
            </div>
          </div>
        </div>

        <!-- START of Add Magazine Modal Page -->
        <div class="modal fade" id="addGrade" tabindex="-1" role="dialog" aria-labelledby="mindboostermodal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="Grademodal">Add Grade</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="GradeForm">
                  <div class="mb-3">
                    <label for="grade_name" class="form-label">Grade Name:</label>
                    <input type="text" class="form-control" id="grade_name" name="grade_name" required>
                  </div>
                  <div class="mb-3">
                    <label for="grade" class="form-label">Grade</label>
                    <input type="number" class="form-control" id="grade" name="grade" required>
                  </div>

                  <div class="mb-3">
                    <label for="grade_status" class="form-label">Status:</label>
                    <select class="form-select" id="grade_status" name="grade_status" required>
                      <option value="1">Publish</option>
                      <option value="0">Unpublish</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add_Grade">Submit</button>
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
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Grade Name</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>Action</th>
                    <!-- <th>Salary</th> -->
                  </tr>
                </thead>
                <?php
                $queryMagazine = $mysqli->query("SELECT * FROM `grade_table`");
                $num = 1;

                if ($queryMagazine === false) {
                  echo "Error: " . $mysqli->error;
                } else {
                  while ($row = $queryMagazine->fetch_assoc()) {
                ?>
                    <tr>
                      <td><?php echo $num++; ?></td>
                      <td><?php echo $row['grade_name']; ?></td>

                      <td><?php echo $row['grade']; ?></td>
                      <!-- <td><?php echo ($row['grade_status'] == 1) ? 'Publish' : 'Unpublish'; ?></td> -->
                      <td>
                        <?php
                        $statusText = ($row['grade_status'] == 1) ? 'Publish' : 'Unpublish';
                        $badgeClass = ($row['grade_status'] == 1) ? 'bg-success' : 'bg-danger';
                        ?>
                        <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                      </td>


                      <td class="text-center ">
                        <!-- <a class="btn btn-sm btn-secondary" href="mindbooster-subject?grade_id=<?php echo $row['grade_id']; ?>" title="View Grade">
                          <i class="fa fa-eye" aria-hidden="true"></i> View</a> -->
                        <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editGrade<?php echo $row['grade_id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button></a>
                        <a class="btn btn-sm btn-danger" href="mindbooster-grade?delete_grade=<?php echo $row['grade_id']; ?>" title="Delete Grade" onclick="return deletegrade()">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>Delete</a>

                      </td>


                    </tr>

                    <!-- Edit Grade Modal -->
                    <div class="modal fade" id="editGrade<?php echo $row['grade_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editGrademodal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editGrademodal">Edit Grade</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data" id="EditGradeForm">
                              <!-- You can populate the form fields with the existing grade information here -->
                              <input type="hidden" id="grade_id" name="grade_id" value="<?php echo $row['grade_id']; ?>">

                              <div class="mb-3">
                                <label for="edit_grade_name" class="form-label">Grade Name:</label>
                                <input type="text" class="form-control" id="edit_grade_name" name="edit_grade_name" value="<?php echo $row['grade_name']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="edit_grade" class="form-label">Grade:</label>
                                <input type="number" class="form-control" id="edit_grade" name="edit_grade" value="<?php echo $row['grade']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="edit_status" class="form-label">Status:</label>
                                <select class="form-select" id="edit_status" name="edit_status" required>
                                  <option value="1" <?php if ($row['grade_status'] == 1) echo 'selected'; ?>>Publish</option>
                                  <option value="0" <?php if ($row['grade_status'] == 0) echo 'selected'; ?>>Unpublish</option>
                                </select>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-sm" name="update_Grade">Update</button>
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
  function deletegrade() {
    var x = confirm("Are you sure want to delete this Grade?");

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