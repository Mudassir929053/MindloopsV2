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
              <h1 class="mb-1 h2 fw-bold">Loops Category</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCategory">Add Category</button>
            </div>
          </div>
        </div>

        <!-- START of Add LOOPS CATEGORY Modal Page -->
        <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="categorymodal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="categorymodal">Add Loops Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="categoryDetails">

                  <!-- Title -->
                  <div class="mb-3">
                    <label for="title" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Category Name" required>
                    <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">

                  </div>
                  <!-- Description -->
                  <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="status" class="form-label">Status</label>
                      <select class="form-select" id="status" name="status" required>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                      </select>
                    </div>
                     <!-- Cover Image -->
                     <div class="mb-3 col-md-6">
                      <label for="coverImage" class="form-label">Cover Image *(.png, .webp, .jpg)</label>
                      <input type="file" class="form-control" id="coverImage" name="coverImage" accept="image/*" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add_loops_category">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- END of Add LOOPS CATEGORY Modal Page -->

      </div>
      <!-- END Of Magazine Header  -->

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
                    <th>Description</th>
                    <th>Cover Image</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $queryCategory = $mysqli->query("SELECT * FROM `loops_category`");
                  $num = 1;

                  if ($queryCategory === false) {
                    echo "Error: " . $mysqli->error;
                  } else {
                    while ($row = $queryCategory->fetch_assoc()) {
                  ?>
                      <tr>
                        <td><?php echo $num++; ?></td>
                        <td><?php echo $row['loop_category']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><img src="../assets/uploads/cover_images/<?php echo $row["image_url"]; ?>" width="80" height="60"></td>
                        <td>
                          <?php
                          $statusText = ($row['status'] == 1) ? 'Publish' : 'Unpublish';
                          $badgeClass = ($row['status'] == 1) ? 'bg-success' : 'bg-danger';
                          ?>
                          <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                        </td>

                        <td class="text-center ">
                          <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editCatField<?php echo $row['id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button></a>
                          <a class="btn btn-sm btn-danger" href="loops_category?delete_category_field=<?php echo $row['id']; ?>" title="Delete Category Field" onclick="return deleteindField()">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                        </td>
                      </tr>

                      <!-- START of Edit Category Modal Page -->
                      <div class="modal fade" id="editCatField<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="magfield" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="magzine">Edit Category Field</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="category_id" value="<?php echo $row['id']; ?>">
                                <!-- Title -->
                                <div class="mb-3">
                                  <label for="title" class="form-label">Title</label>
                                  <input type="text" class="form-control" id="title" name="title" placeholder="Magazine Title" value="<?php echo $row['loop_category']; ?>" required>
                                </div>
                                <!-- Description -->
                                <div class="mb-3">
                                  <label for="description" class="form-label">Description</label>
                                  <textarea class="form-control" id="description" name="description" rows="4" required><?php echo $row['description']; ?></textarea>
                                </div>
                                <div class="row">
                                  <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                      <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Publish</option>
                                      <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>Unpublish</option>
                                    </select>
                                  </div>
                                  <!-- Cover Image -->
                                  <div class="mb-3 col-md-6">
                                    <label for="coverImage" class="form-label">Cover Image *(.png, .webp, .jpg)</label>
                                    <input type="file" class="form-control" id="coverImage" name="coverImage" accept="image/*">
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success btn-sm" name="edit_category_field">Submit</button>
                            </div>
                          </div>
                        </div>
                        </form>
                      </div>
                      <!-- END of Edit Category Modal Page -->

                  <?php
                    }
                  }
                  // Close the result set
                  $queryCategory->close();
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
      var x = confirm("Are you sure want to delete this Category field?");

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