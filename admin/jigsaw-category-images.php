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

      <!-- START Of Magazine Header  -->
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <!-- Page Header -->
          <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
            <div class="mb-3 mb-md-0">
              <h1 class="mb-1 h2 fw-bold">Jigsaw Images</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal">
                Add Images
              </button>
            </div>
          </div>
        </div>

        <!-- START of Add Magazine Modal Page -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Create Jigsaw Images</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Your form goes here -->
                <form id="insertVideoForm" action="" method="POST" enctype='multipart/form-data'>
                  <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">

                  <div class="mb-3">
                    <label for="ji_name" class="form-label">Jigsaw Image Title</label>
                    <input type="text" class="form-control" id="ji_name" name="ji_name" placeholder="Ex: FBiriyani and Football" required>
                  </div>
                  <div class="mb-3">
                    <label for="cat_id" class="form-label">Category</label>
                    <select class="form-select" id="cat_id" name="cat_id" required>
                      <?php
                      $queryCategory = $mysqli->query("SELECT `category_id`, `category_name` FROM `game_category`");
                      if ($queryCategory === false) {
                        echo "Error: " . $mysqli->error;
                      } else {
                        while ($row = $queryCategory->fetch_assoc()) {
                          echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="ji_status" class="form-label">Status</label>
                    <select class="form-select" id="ji_status" name="ji_status" required>
                      <option value="1">Publish</option>
                      <option value="0">Unpublish</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="ji_image" class="form-label">Jigsaw Image *(.png, .webp, .jpg)</label>
                    <input type="file" class="form-control" id="ji_image" name="ji_image" accept="image/*" required>
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-success" name="add_jigsaw_category_images">Save Image</button>
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
                    <th>Category Name</th>
                    <!-- <th>Category Image</th> -->
                    <th>Image Name</th>
                    <th>Image</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $queryJigsaw = $mysqli->query("SELECT *
                  FROM jigsaw_image ji
                  JOIN game_category jc ON ji.ji_c_id = jc.category_id JOIN user_role ur ON ur.id=ji.created_by 
                 ");
                  $num = 1;

                  if ($queryJigsaw === false) {
                    echo "Error: " . $mysqli->error;
                  } else {
                    while ($row = $queryJigsaw->fetch_assoc()) {
                  ?>
                      <tr class="align-middle">
                        <td><?php echo $num++; ?></td>
                        <td><?php echo $row['category_name']; ?></td>

                        <!-- <td><img src="../assets/uploads/game_category_images/<?php echo $row["category_image"]; ?>" width="100" height="80"></td> -->
                        <td><?php echo $row['ji_name']; ?></td>
                        <td><img src="../assets/uploads/jigsaw_images/<?php echo $row["ji_image"]; ?>" width="100" height="80"></td>
                        <td><?php echo $row['role']; ?></td>
                        <td>
                          <?php
                          $statusText = ($row['ji_status'] == 1) ? 'Publish' : 'Unpublish';
                          $badgeClass = ($row['ji_status'] == 1) ? 'bg-success' : 'bg-danger';
                          ?>
                          <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                        </td>

                        <td class="text-center ">
                          <!-- <a href='view-videos.php?id=" . $row["video_id"] . "'><i class='fas fa-eye' style='color: green;'></i></a>&nbsp; -->
                          <a  class="btn btn-primary btn-sm fw-bold" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#editMagField<?php echo $row['ji_id']; ?>">
                            <i class="fa fa-edit" class="btn btn-sm btn-primary text-white" aria-hidden="true"></i> Edit
                          </a>
                          <a  class="btn btn-danger btn-sm fw-bold" href="jigsaw-category-images?delete_jicategory_image=<?php echo $row['ji_id']; ?>" title="Delete Jigsaw category Image" onclick="return deleteindField()">
                            <i class='fas fa-trash' style='color: white;'></i> Delete
                          </a>

                        </td>
                      </tr>
                      <div class="modal fade" id="editMagField<?php echo $row['ji_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="magfield" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="magzine">Edit Jigsaw Category</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form id="insertVideoForm" action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="ji_id" value="<?php echo $row['ji_id']; ?>">
                                <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">
                                <div class="mb-3">
                                  <label for="ji_title" class="form-label">Jigsaw Image Title</label>
                                  <input type="text" class="form-control" id="ji_title" name="ji_title" value="<?php echo $row['ji_name']; ?>" placeholder="Ex: Food, History, and Sports">
                                </div>
                                <div class="mb-3">
                                  <label for="cat_id" class="form-label">Category</label>
                                  <select class="form-select" id="cat_id" name="cat_id" required>
                                    <?php
                                    $queryCategory = $mysqli->query("SELECT `category_id`, `category_name` FROM `game_category`");
                                    if ($queryCategory === false) {
                                      echo "Error: " . $mysqli->error;
                                    } else {
                                      while ($rowCategory = $queryCategory->fetch_assoc()) {
                                        $selected = ($rowCategory['category_id'] == $row['ji_c_id']) ? 'selected' : '';
                                        echo "<option value='" . $rowCategory['category_id'] . "' " . $selected . ">" . $rowCategory['category_name'] . "</option>";
                                      }
                                    }
                                    ?>

                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="ji_update_status" class="form-label">Status</label>
                                  <select class="form-select" id="ji_update_status" name="ji_update_status">
                                    <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Publish</option>
                                    <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>Unpublish</option>
                                  </select>
                                </div>
                                <div class="mb-3">
                                  <label for="ji_image" class="form-label">Cover Image *(.png, .webp, .jpg)</label>
                                  <input type="file" class="form-control" id="ji_image" name="ji_image" accept="image/*">
                                </div>
                                <div class="mb-3">
                                  <button type="submit" class="btn btn-success" name="edit_jigsaw_category_images">Edit Image</button>
                                  <button type="reset" class="btn btn-secondary">Clear</button>
                                </div>
                              </form>

                            </div>
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