<?php
include('function/function.php');
include_once 'includes/head.php';

?>

<?php
include_once 'includes/sidebar.php';
$category_id = $_GET['category_id'];
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
              <h1 class="mb-1 h2 fw-bold">True or False</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal">
                Add Questions
              </button>
            </div>
          </div>
        </div>
        <!-- START of Add Magazine Modal Page -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">True or False Questions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Your form goes here -->
                <form id="insertVideoForm" action="" method="POST" enctype='multipart/form-data'>
                  <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">
                  <input type="hidden" class="form-control" id="category_id" name="category_id" value="<?php echo $category_id; ?>">

                  <div class="mb-3">
                    <label for="tf_name" class="form-label">Question</label>
                    <input type="text" class="form-control" id="tf_name" name="tf_name" placeholder="Write correct question" required>
                  </div>
                  <div class="mb-3">
                    <label for="tf_status" class="form-label">Status</label>
                    <select class="form-select" id="tf_status" name="tf_status" required>
                      <option value="1">Publish</option>
                      <option value="0">Unpublish</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="tf_image" class="form-label">True/False Image *(.png, .webp, .jpg)</label>
                    <input type="file" class="form-control" id="tf_image" name="tf_image" accept="image/*" required>
                  </div>
                  <div class="mb-3">
                    <label for="tf_select" class="form-label">Select True/False</label>
                    <select class="form-select" id="tf_select" name="tf_select" required>
                      <option>True/False</option>
                      <option value="1">True</option>
                      <option value="0">False</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-success" name="add_true_false">Save Question</button>
                    <button type="reset" class="btn btn-secondary">Clear</button>
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
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <div class="table-responsive">
              <table id="dataTable" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead class="table-primary">
                  <tr>
                    <th>S.No</th>
                    <th>T/F Questions</th>
                    <th>T/F Image</th>
                    <th>Correct Answer</th>
                    <th>Created_By</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $querytruefalse = $mysqli->query("SELECT *
                  FROM true_false_questions tf
                  JOIN tb_quiz_category tb ON tf.category_id = tb.category_id
                  JOIN user_role ur ON ur.id = tf.tf_created_by
                  WHERE tb.category_id = $category_id;
                  ");
                  $num = 1;

                  if ($querytruefalse === false) {
                    echo "Error: " . $mysqli->error;
                  } else {
                    while ($row = $querytruefalse->fetch_assoc()) {
                  ?>
                      <tr class="align-middle">
                        <td><?php echo $num++; ?></td>
                        <td>
                          <?= strip_tags(substr($row["question"], 0, 50)) ?>...
                          <button type="button" class="btn btn-sm btn-gradient-05" data-bs-toggle="modal" data-bs-target="#modalView<?php echo $row['tf_id']; ?>">
                            <span style="color: skyblue;">Read More</span>
                          </button>
                        </td>
                        <td><img src="../assets/uploads/jigsaw_images/<?php echo $row["tf_image"]; ?>" width="100" height="80"></td>
                        <td><?php echo ($row['is_true'] == 1) ? 'True' : 'False'; ?></td>
                        <td><?php echo $row['role']; ?></td>
                        <td>
                          <?php
                          $statusText = ($row['tf_status'] == 1) ? 'Publish' : 'Unpublish';
                          $badgeClass = ($row['tf_status'] == 1) ? 'bg-success' : 'bg-danger';
                          ?>
                          <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                        </td>

                        <td class="text-center ">
                          <!-- <a href='view-videos.php?id=" . $row["video_id"] . "'><i class='fas fa-eye' style='color: green;'></i></a>&nbsp; -->
                          <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editMagField<?php echo $row['tf_id']; ?>">
                            <i class="fa fa-edit" class="btn btn-sm btn-primary text-white" aria-hidden="true"></i>
                          </a>
                          <a href="true_false?delete_tf_questions=<?php echo $row['tf_id']; ?>" title="Delete True False question" onclick="return deleteindField()">
                            <i class='fas fa-trash' style='color: red;'></i>
                          </a>

                        </td>
                      </tr>
                      <div class="modal fade" id="modalView<?= $row['tf_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="questionModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                              <h5 class="modal-title" id="questionModalLabel">Question</h5>
                              <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p class="text-justify text-dark"><?= $row['question'] ?></p>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="editMagField<?php echo $row['tf_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="magfield" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="magzine">Edit True/False Question</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form id="insertVideoForm" action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="tf_id" value="<?php echo $row['tf_id']; ?>">
                                <input type="hidden" name="category_id" value="<?php echo $category_id; ?>">
                                <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">
                                <div class="mb-3">
                                  <label for="tf_title" class="form-label">Question</label>
                                  <input type="text" class="form-control" id="tf_title" name="tf_title" value="<?php echo $row['question']; ?>" placeholder="Ex: Food, History, and Sports">
                                </div>
                                <div class="mb-3">
                                  <label for="tf_update_status" class="form-label">Status</label>
                                  <select class="form-select" id="tf_update_status" name="tf_update_status">
                                    <option value="1" <?php echo ($row['tf_status'] == 1) ? 'selected' : ''; ?>>Publish</option>
                                    <option value="0" <?php echo ($row['tf_status'] == 0) ? 'selected' : ''; ?>>Unpublish</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="tf_image" class="form-label">Cover Image *(.png, .webp, .jpg)</label>
                                  <input type="file" class="form-control" id="tf_image" name="tf_image" value="<?php echo $row['tf_image']; ?>" accept="image/*">
                                </div>
                                <div class="mb-3">
                                  <label for="tf_select" class="form-label">Select True/False</label>
                                  <select class="form-select" id="tf_select" name="tf_select" required>
                                    <option value="1" <?php echo ($row['is_true'] == 1) ? 'selected' : ''; ?>>True</option>
                                    <option value="0" <?php echo ($row['is_true'] == 0) ? 'selected' : ''; ?>>False</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <button type="submit" class="btn btn-success" name="edit_true_false">Edit Question</button>
                                  <button type="reset" class="btn btn-secondary">Clear</button>
                                </div>
                              </form>

                            </div>
                        <?php
                      }
                    }
                    $querytruefalse->close();
                        ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    function deleteindField() {
      var x = confirm("Are you sure want to delete this T/F question?");

      if (x == true) {
        return true;
      } else {
        return false;
      }
    }
  </script>
</div>
<?php
include_once 'includes/footer.php';
// $mysqli->close();

?>