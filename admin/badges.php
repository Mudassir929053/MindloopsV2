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
              <h1 class="mb-1 h2 fw-bold">Manage Badges</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addbadge">Add Badge</button>
            </div>
          </div>
        </div>
        <!-- START of Add Magazine Modal Page -->
        <!-- START of Add Badge Modal Page -->
<div class="modal fade" id="addbadge" tabindex="-1" role="dialog" aria-labelledby="magazinemodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="magazinemodal">Add Badge</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST" enctype="multipart/form-data" id="magazineDetails">
          <!-- Badge Category -->
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="badge_category" class="form-label">Badge Category</label>
                <select class="form-select" id="badge_category" name="badge_category" required>
                  <option value="Magazine">Magazine</option>
                  <option value="Mindbooster">Mindbooster</option>
                  <option value="Loops">Loops</option>
                  <option value="Members Club">Members Club</option>
                </select>
              </div>
            </div>
            <!-- Badge To -->
            <div class="col-md-6">
              <div class="mb-3">
                <label for="badge_to" class="form-label">Badge To</label>
                <select class="form-select" id="badge_to" name="badge_to" required>
                  <option value="student">student</option>
                  <option value="parent">parent</option>
                  <option value="teacher">teacher</option>
                </select>
              </div>
            </div>
          </div>

          <!-- Badge Level -->
          <div class="mb-3">
            <label for="badge_level" class="form-label">Badge Level</label>
            <input type="number" class="form-control" id="badge_level" name="badge_level" placeholder="Badge Level" required>
          </div>
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="coverImage" class="form-label">Badge Image *(.png, .webp, .jpg)</label>
              <input type="file" class="form-control" id="coverImage" name="coverImage" accept="image/*" required>
            </div>
            <div class="mb-3 col-md-6">
              <label for="badge_title" class="form-label">Badge Title</label>
              <input type="text" class="form-control" id="badge_title" name="badge_title" placeholder="Badge Title" required>
            </div>
          </div>
          <div class="row">
            <div class="mb-3 col-md-6">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status" required>
                <option value="1">Publish</option>
                <option value="0">Unpublish</option>
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success btn-sm" name="add_badge">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END of Add Badge Modal Page -->

        
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
                    <th>sl_no</th>
                    <th>Badge Logo</th>
                    <th>Badge Category </th>
                    <th>Badge Level</th>
                    <th>Badge Title</th>
                    <th>Badge To</th>
                    <th>status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $querybadge = $mysqli->query("SELECT * FROM `badge_table`");
                  $num = 1;
                  if ($querybadge === false) {
                    echo "Error: " . $mysqli->error;
                  } else {
                    while ($row = $querybadge->fetch_assoc()) {
                  ?>
                      <tr>
                        <td><?php echo $num++; ?></td>
                        <td><img src="../assets/uploads/badges/<?php echo $row["badge_image"]; ?>" width="80" height="60"></td>
                        <td><?php echo $row['badge_category']; ?></td>
                        <td><?php echo $row['badge_level']; ?></td>
                        <td><?php echo $row['badge_title']; ?></td>
                        <td>
                        <?php echo $row['badge_to']; ?>
                        </td>
                        <td>
                          <?php
                          $statusText = ($row['status'] == 1) ? 'Active' : 'Inactive';
                          $badgeClass = ($row['status'] == 1) ? 'bg-success' : 'bg-danger';
                          ?>
                          <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                        </td>
                        
                        
                        <td class="text-center ">
                          <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editBadge<?php echo $row['badge_id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>
                        </td>

                       
                      </tr>
                      <div class="modal fade" id="modalView<?php echo $row['badge_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="questionModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                              <h5 class="modal-title" id="questionModalLabel">Badge Description</h5>
                              <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p class="text-justify text-dark"><?= $row['badge_description'] ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- START of Edit Magazine Modal Page -->
                      <div class="modal fade" id="editBadge<?php echo $row['badge_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="magfield" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="magzine">Edit Badge</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="badge_id" value="<?php echo $row['badge_id']; ?>">
                                <input type="hidden" name="current_image" value="<?php echo $row['badge_image']; ?>">


                                <div class="mb-3">
                                    <label for="badge_category" class="form-label">Badge Category</label>
                                    <select class="form-select" id="badge_category" name="badge_category" required>
                                        <option value="Magazine" <?php echo ($row['badge_category'] == 'Magazine') ? 'selected' : ''; ?>>Magazine</option>
                                        <option value="Mindbooster" <?php echo ($row['badge_category'] == 'Mindbooster') ? 'selected' : ''; ?>>Mindbooster</option>
                                        <option value="Loops" <?php echo ($row['badge_category'] == 'Loops') ? 'selected' : ''; ?>>Loops</option>
                                        <option value="Members Club" <?php echo ($row['badge_category'] == 'Members Club') ? 'selected' : ''; ?>>Members Club</option>
                                    </select>
                                </div>

                                <!-- Title -->
                                <div class="mb-3">
                                  <label for="badge_title" class="form-label">Badge Title</label>
                                  <input type="text" class="form-control" id="badge_title" name="badge_title" placeholder="Badge Title" value="<?php echo $row['badge_title']; ?>" required>
                                </div>

                                <div class="mb-3">
                                  <label for="badge_to" class="form-label">Badge To</label>
                                  <select class="form-select" id="badge_to" name="badge_to" required>
                                    <option value="student" <?php echo ($row['badge_to'] == 'student') ? 'selected' : ''; ?>>Student</option>
                                    <option value="parent" <?php echo ($row['badge_to'] == 'parent') ? 'selected' : ''; ?>>Parent</option>
                                    <option value="teacher" <?php echo ($row['badge_to'] == 'teacher') ? 'selected' : ''; ?>>Teacher</option>
                                  </select>
                                </div>



                                <!-- Description -->
                                <div class="mb-3">
                                  <label for="badge_level" class="form-label">Badge Level</label>
                                  <input type="number" class="form-control" id="badge_level" name="badge_level" rows="4" placeholder="Badge Level"value="<?php echo $row['badge_level']; ?>" required>
                                  <!-- <textarea class="form-control" id="description" name="description" rows="4" required><?php echo htmlspecialchars($row['badge_description']); ?></textarea> -->
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
                              <button type="submit" class="btn btn-success btn-sm" name="update_badge">Submit</button>
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
  </main>
</div>

<?php
include_once 'includes/footer.php';
// $mysqli->close();
?>
