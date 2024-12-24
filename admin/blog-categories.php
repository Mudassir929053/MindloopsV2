<?php
// include('../config/connection.php');
// var_dump($mysqli);
// exit;
include('function/function.php');
// include('update-profile.php');
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
              <h1 class="mb-1 h2 fw-bold">Manage Blog Categories</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary btn-sm text-white fw-bold" data-bs-toggle="modal" data-bs-target="#addbadge">Add Blog Categories</button>
            </div>
          </div>
        </div>
        <!-- START of Add Magazine Modal Page -->
        <div class="modal fade" id="addbadge" tabindex="-1" role="dialog" aria-labelledby="magazinemodal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="magazinemodal">Add Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="magazineDetails">
                  <!-- Title -->
                  <div class="mb-3">
                    <label for="title" class="form-label">Categories Name</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Blog Categories Name" required>
                    <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>" required>
                  </div>
                  <!-- Description -->
                  <div class="mb-3">
                    <label for="description" class="form-label">Blog Categories Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Blog Categories Description" required></textarea>
                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="coverImage" class="form-label">Blog Categories Image *(.png, .webp, .jpg)</label>
                      <input type="file" class="form-control" id="coverImage" name="coverImage" accept="image/*" required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="status" class="form-label">Status</label>
                      <select class="form-select" id="status" name="status" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add_blog_categories">Submit</button>
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
            <div class="data_table table-responsive">
              <table id="dataTable" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead class="table-primary">
                  <tr>
                    <th>#</th>
                    <th>Categories Thumbnail</th>
                    <th>Categories Name</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $querybadge = $mysqli->query("SELECT * FROM `blog_categories`");
                  $num = 1;
                  if ($querybadge === false) {
                    echo "Error: " . $mysqli->error;
                  } else {
                    while ($row = $querybadge->fetch_assoc()) {
                  ?>
                      <tr>
                        <td><?php echo $num++; ?></td>
                        <td><img src="../assets/uploads/blog-categories/<?php echo $row["thumbnail"]; ?>" width="80" height="60"></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>
                          <span><?php echo substr($row['description'], 0, 50); ?></span>
                          <button class="btn btn-link view-more-button" data-toggle="modal" data-target="#badgeModal<?= $row['category_id']; ?>">View More</button>
                          <div class="modal fade" id="badgeModal<?= $row['badge_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="badgeModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="badgeModalLabel">Badge Description</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <?php echo $row['description']; ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </td>
                      
                        <td>
                          <?php
                          $statusText = ($row['status'] == 1) ? 'Publish' : 'Unpublish';
                          $badgeClass = ($row['status'] == 1) ? 'bg-success' : 'bg-danger';
                          ?>
                          <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                        </td>
                        <td><?= date("F j, Y, g:i a", strtotime($row['created_at'])) ?></td>
                        <td class="text-center ">
                          <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editBadge<?php echo $row['category_id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a> 
                          <a class="btn btn-sm btn-danger" href="blog-categories?delete_category_field=<?php echo $row['category_id']; ?>" title="Delete Category Field" onclick="return deleteindField()">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                        </td>
                       
                      </tr>
                      <!-- START of Edit Category Modal Page -->
                      <div class="modal fade" id="editBadge<?php echo $row['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="magfield" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="magzine">Edit Blog Categories</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">
                                <input type="hidden" name="current_image" value="<?php echo $row['thumbnail']; ?>">
                                <!-- Title -->
                                <div class="mb-3">
                                  <label for="title" class="form-label">Title</label>
                                  <input type="text" class="form-control" id="title" name="title" placeholder="Magazine Title" value="<?php echo $row['name']; ?>" required>
                                </div>
                                <!-- Description -->
                                <div class="mb-3">
                                  <label for="description" class="form-label">Description</label>
                                  <textarea class="form-control" id="description" name="description" rows="4" required><?php echo htmlspecialchars($row['description']); ?></textarea>
                                </div>
                                <div class="row">
                                  <div class="mb-3 col-md-6">
                                    <label for="coverImage" class="form-label">Cover Image *(.png, .webp, .jpg)</label>
                                    <input type="file" class="form-control" id="coverImage" name="coverImage" accept="image/*">
                                  </div>
                                  <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                      <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Publish</option>
                                      <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>Unpublish</option>
                                    </select>
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success btn-sm" name="update_blog_category">Submit</button>
                            </div>
                          </div>
                        </div>
                        </form>
                      </div>
                      <!-- END of Edit Magazine Modal Page -->
                  <?php
                    }
                  }
                  // Close the result set
                  $querybadge->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- END OF Table content DATA  -->
    </div>
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
  </main>
</div>
<?php
include_once 'includes/footer.php';
// $mysqli->close();
?>