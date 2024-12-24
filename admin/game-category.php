<?php
// include('../config/connection.php');
// var_dump($mysqli);
// exit;
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

      <!-- START Of Game Category Header  -->
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <!-- Page Header -->
          <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
            <div class="mb-3 mb-md-0">
              <h1 class="mb-1 h2 fw-bold">Game Category</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                Add Category
              </button>
            </div>
          </div>
        </div>

        <!-- START of Create Game Category Modal Page -->
        <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="categoryModalLabel">Create Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Your form goes here -->
                <form id="insertVideoForm" action="" method="POST" enctype='multipart/form-data'>
                  <div class="mb-3">
                    <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">
                    <label for="js_title" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="js_title" name="js_title" placeholder="Ex: Food,History and Sports" required>
                  </div>
                  <div class="mb-3">
                    <label for="js_status" class="form-label">Status</label>
                    <select class="form-select" id="js_status" name="js_status" required>
                      <option value="1">Publish</option>
                      <option value="0">Unpublish</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="js_image" class="form-label">Category Image *(.png, .webp, .jpg)</label>
                    <input type="file" class="form-control" id="js_image" name="js_image" accept="image/*" required>
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-success" name="add_game_category">Save Category</button>
                    <button type="reset" class="btn btn-secondary">Clear</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <!-- END of Create Game Category Modal Page -->

      </div>
      <!-- END Of Game Category Header  -->

      <!-- START OF Table content DATA  -->
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <div class="data_table table-responsive">
              <table id="dataTable" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead class="table-primary">
                  <tr>
                    <th>S.No</th>
                    <th>Category Name</th>
                    <th>Category Image</th>
                    <th>Created By</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $queryJigsaw = $mysqli->query("SELECT gc.`category_id`, gc.`category_name`, gc.`category_image`, gc.`created_by`, gc.`status`, ut.`username` FROM `game_category` AS gc INNER JOIN `user_table` AS ut ON gc.`created_by` = ut.`uid` WHERE gc.`created_by` = {$_SESSION['uid']}");

                  $num = 1;

                  if ($queryJigsaw === false) {
                    echo "Error: " . $mysqli->error;
                  } else {
                    while ($row = $queryJigsaw->fetch_assoc()) {
                  ?>
                      <tr>
                        <td><?php echo $num++; ?></td>
                        <td><?php echo $row['category_name']; ?></td>
                        <td><img src="../assets/uploads/game_category_images/<?php echo $row["category_image"]; ?>" width="100" height="80"></td>
                        <td><?php echo $row['username']; ?></td>
                        <td>
                          <?php
                          $statusText = ($row['status'] == 1) ? 'Publish' : 'Unpublish';
                          $badgeClass = ($row['status'] == 1) ? 'bg-success' : 'bg-danger';
                          ?>
                          <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                        </td>

                        <td class="text-center ">

                          <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editMagField<?php echo $row['category_id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button></a>
                          <a class="btn btn-sm btn-danger" href="game-category?delete_game_category=<?php echo $row['category_id']; ?>" title="Delete Game Category" onclick="return deleteindField()">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                          <!-- <a href="jigsaw-category-images.php?id=<?php echo $row['category_id ']; ?>"><i class='fas fa-eye' style='color: green;'></i></a>&nbsp;
                          <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editMagField<?php echo $row['category_id ']; ?>">
                            <i class="fa fa-edit" class="btn btn-sm btn-primary text-white" aria-hidden="true"></i>
                          </a>
                          <a href="jigsaw-category?delete_jscategory=<?php echo $row['category_id ']; ?>" title="Delete Jigsaw category" onclick="return deleteindField()">
                            <i class='fas fa-trash' style='color: red;'></i>
                          </a> -->

                        </td>
                      </tr>

                      <!-- START of Edit Game Category Modal Page -->
                      <div class="modal fade" id="editMagField<?php echo $row['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="magfield" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="magzine">Edit Game Category</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <!-- Your form goes here -->
                              <form id="insertVideoForm" action="" method="POST" enctype='multipart/form-data'>
                                <div class="mb-3">
                                  <input type="hidden" class="form-control" id="category_id" name="category_id" value="<?= $row['category_id'] ?>">
                                  <label for="js_title" class="form-label">Category Name</label>
                                  <input type="text" class="form-control" id="js_title" name="category_name" placeholder="Ex: Food,History and Sports" value="<?php echo $row['category_name']; ?>" required>
                                </div>
                                <div class="mb-3">
                                  <label for="js_status" class="form-label">Status</label>
                                  <select class="form-select" id="status" name="status" required>
                                      <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Publish</option>
                                      <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>Unpublish</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                  <label for="category_image" class="form-label">Category Image *(.png, .webp, .jpg)</label>
                                  <input type="file" class="form-control" id="category_image" name="category_image" accept="image/*">
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-success btn-sm" name="edit_game_category">Submit</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- END of Edit Game Category Modal Page -->


                  <?php
                    }
                  }
                  $queryJigsaw->close();

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
      var x = confirm("Are you sure want to delete this Jigsaw category?");

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