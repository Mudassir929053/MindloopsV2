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
              <h1 class="mb-1 h2 fw-bold">Magazine</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMagazine">Add Magazine</button>
            </div>
          </div>
        </div>

        <!-- START of Add Magazine Modal Page -->
        <div class="modal fade" id="addMagazine" tabindex="-1" role="dialog" aria-labelledby="magazinemodal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="magazinemodal">Add Magazine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="magazineDetails">
                  <!-- Title -->
                  <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Magazine Title" required>
                    <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">

                  </div>
                  <!-- Description -->
                  <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="publish-date" class="form-label">Publish Date</label>
                      <input type="date" class="form-control" id="publish-date" name="publish-date" required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="status" class="form-label">Status</label>
                      <select class="form-select" id="status" name="status" required>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <!-- Cover Image -->
                    <div class="mb-3 col-md-6">
                      <label for="coverImage" class="form-label">Cover Image *(.png, .webp, .jpg)</label>
                      <input type="file" class="form-control" id="coverImage" name="coverImage" accept="image/*" required>
                    </div>

                    <!-- Magazine PDF -->
                    <div class="mb-3 col-md-6">
                      <label for="magazinePDF" class="form-label">Magazine PDF *(.pdf)</label>
                      <input type="file" class="form-control" id="magazinePDF" name="magazinePDF" accept=".pdf" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add_Magazine">Submit</button>
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
            <div class="dataTable table-responsive">
              <table id="dataTable" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead class="table-primary">
                  <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Cover Image</th>
                    <th>Description</th>
                    <th>Magazine</th>
                    <th>Date of Publish</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $queryMagazine = $mysqli->query("SELECT * FROM `magazine`");
                  $num = 1;

                  if ($queryMagazine === false) {
                    echo "Error: " . $mysqli->error;
                  } else {
                    while ($row = $queryMagazine->fetch_assoc()) {
                  ?>
                      <tr>
                        <td><?php echo $num++; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><img src="../assets/uploads/cover_images/<?php echo $row["cover_image_url"]; ?>" loading="lazy" width="80" height="60"></td>
                        <td>
                          <?php
                          $description = strip_tags($row['description']);
                          $showReadMoreButton = strlen($description) > 50;
                          echo substr($description, 0, 50) . ($showReadMoreButton ? '...' : '');
                          if ($showReadMoreButton) {
                          ?>
                            <button type="button" class="btn btn-sm btn-gradient-05" data-bs-toggle="modal" data-bs-target="#modalView<?php echo $row['magazine_id']; ?>">
                              <span style="color: skyblue;">Read More</span>
                            </button>
                          <?php } ?>
                        </td>
                        <td><a href="../assets/uploads/magazine_pdfs/<?php echo $row["magazine_path"]; ?>" target="_blank">View PDF</a></td>
                        <td><?php echo $row['publish_date']; ?></td>
                        <td>
                          <?php
                          $statusText = ($row['status'] == 1) ? 'Publish' : 'Unpublish';
                          $badgeClass = ($row['status'] == 1) ? 'bg-success' : 'bg-danger';
                          ?>
                          <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                        </td>

                        <td class="text-center ">
                          <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editMagField<?php echo $row['magazine_id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button></a>
                          <a class="btn btn-sm btn-danger" href="magazine?delete_magazine_field=<?php echo $row['magazine_id']; ?>" title="Delete Magazine Field" onclick="return deleteindField()">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                        </td>
                      </tr>

                      <!-- START of Edit Magazine Modal Page -->
                      <div class="modal fade" id="editMagField<?php echo $row['magazine_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="magfield" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="magzine">Edit Magazine Field</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="magazine_id" value="<?php echo $row['magazine_id']; ?>">
                                <!-- Title -->
                                <div class="mb-3">
                                  <label for="title" class="form-label">Title</label>
                                  <input type="text" class="form-control" id="title" name="title" placeholder="Magazine Title" value="<?php echo $row['title']; ?>" required>
                                </div>
                                <!-- Description -->
                                <div class="mb-3">
                                  <label for="description" class="form-label">Description (less than 500 characters.)</label>
                                  <textarea class="form-control" id="description" name="description" rows="4" maxlength="500" required><?php echo $row['description']; ?></textarea>
                                </div>
                                <div class="row">
                                  <div class="mb-3 col-md-6">
                                    <label for="publish-date" class="form-label">Publish Date</label>
                                    <input type="date" class="form-control" id="publish-date" name="publish-date" value="<?php echo $row['publish_date']; ?>" required>
                                  </div>
                                  <div class="mb-3 col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                      <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Publish</option>
                                      <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>Unpublish</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row">
                                  <!-- Cover Image -->
                                  <div class="mb-3 col-md-6">
                                    <label for="coverImage" class="form-label">Cover Image *(.png, .webp, .jpg)</label>
                                    <input type="file" class="form-control" id="coverImage" name="coverImage" accept="image/*">
                                  </div>
                                  <!-- Magazine PDF -->
                                  <div class="mb-3 col-md-6">
                                    <label for="magazinePDF" class="form-label">Magazine PDF *(.pdf)</label>
                                    <input type="file" class="form-control" id="magazinePDF" name="magazinePDF" accept=".pdf">
                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success btn-sm" name="edit_magazine_field">Submit</button>
                            </div>
                          </div>
                        </div>
                        </form>
                      </div>
                      <!-- END of Edit Magazine Modal Page -->

                      <!-- Start of Description Modal Page -->
                      <div class="modal fade" id="modalView<?php echo $row['magazine_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="questionDesc" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                              <h4 class="modal-title">Magazine Description</h4>
                              <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p class="text-justify text-dark">
                                <?php echo $row['description']; ?>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- End of Description Modal Page -->


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
      var x = confirm("Are you sure want to delete this Magzine field?");

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