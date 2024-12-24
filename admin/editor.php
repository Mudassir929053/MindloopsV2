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
              <h1 class="mb-1 h2 fw-bold">Manage Editor</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addEditor">Add Editor</button>
            </div>
          </div>
        </div>
        <!-- START of Add Magazine Modal Page -->
        <div class="modal fade" id="addEditor" tabindex="-1" role="dialog" aria-labelledby="editormodal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="magazinemodal">Add Editor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="addeditor">
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="full_name" placeholder="Name" required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                  </div>
                  <div class="row">
                    <!-- Cover Image -->
                    <div class="mb-3 col-md-6">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email for Editor" required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter password for Editor" required>
                    </div>
                  </div>
                  <div class="row">
                    <!-- Magazine PDF -->
                    <div class="mb-3 col-md-6">
                      <label for="Profile_pic" class="form-label">Profile Photo</label>
                      <input type="file" class="form-control" id="Profile_pic" name="profile_picture" accept=".jpg, .jpeg, .png, .gif, .webp" required>
                    </div>
                    <div class="mb-3 col-md-6">
                      <label for="mobile" class="form-label">Mobile Number</label>
                      <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Enter your Mobile number" required>
                    </div>
                  </div>
                  <div class="modal-footer fw-bold">
                    <button type="button" class="btn btn-secondary btn-sm fw-bold text-white" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm fw-bold text-white" name="add_editor">Submit</button>
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
          <div class="bgc-white bd bdrs-3 p-20 mB-20 m-5">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Profile Photo</th>
                  <th>Full Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Mobile Number</th>
                  <th>Status</th>
                  <th>Registration date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                // Fetch user data from the database
                $query = "SELECT * FROM user_table where role_id = 5";
                $result = mysqli_query($mysqli, $query);
                if (mysqli_num_rows($result) > 0) {
                  $count = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                      <td><?= $count++ ?></td>
                      <td><img src="assets/uploads/avatar/<?= $row['profile_pic'] ?>" alt="Profile Picture" width="80" height="80"></td>
                      <td><?= $row['full_name'] ?></td>
                      <td><?= $row['username'] ?></td>
                      <td><?= $row['email'] ?></td>
                      <td><?= $row['mobile'] ?></td>
                      <td>
                        <?php
                        $statusText = (strtolower($row['status']) == 'active') ? 'Active' : 'Inactive';
                        $badgeClass = (strtolower($row['status']) == 'active') ? 'bg-success' : 'bg-danger';
                        ?>
                        <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                      </td>
                      <td><?= date("F j, Y, g:i a", strtotime($row['created_date'])) ?></td>
                      <td class="text-center ">
                        <a>
                        <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editeditor<?= $row['uid']; ?>"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>     
                        <!-- <a class="btn btn-sm btn-danger" href="editor?delete_category_field=<?php echo $row['uid']; ?>" title="Delete Category Field" onclick="return deleteindField()">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a> -->
                      </td>
                    </tr>
                    <!-- Edit Grade Modal -->
                    <div class="modal fade" id="editeditor<?= $row['uid']; ?>" tabindex="-1" role="dialog" aria-labelledby="editGrademodal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editGrademodal">Edit Editor</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data" id="addeditor">
                              <div class="row">
                                <div class="mb-3 col-md-6">
                                  <label for="name" class="form-label">Name</label>
                                  <input type="text" class="form-control" id="name" name="full_name" value="<?= $row['full_name']; ?>" placeholder="Name" required>
                                  <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $row['uid']; ?>" required>
                                  <input type="hidden" class="form-control" id="uid" name="profile_pic" value="<?= $row['profile_pic']; ?>" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="username" class="form-label">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" value="<?= $row['username']; ?>" placeholder="Username" required>
                                </div>
                              </div>
                              <div class="row">
                                <!-- Cover Image -->
                                <div class="mb-3 col-md-6">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" class="form-control" id="email" name="email" value="<?= $row['email']; ?>" placeholder="Enter email for Editor" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="password" class="form-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password for Editor" required>
                                </div>
                              </div>
                              <div class="row">
                                <!-- Magazine PDF -->
                                <div class="mb-3 col-md-6">
                                  <label for="mobile" class="form-label">Mobile Number</label>
                                  <input type="number" class="form-control" id="mobile" name="mobile" value="<?= $row['mobile']; ?>" required>
                                </div>
                                <div class="mb-3 col-md-6">
                                  <label for="edit_status" class="form-label">Status:</label>
                                  <select class="form-select" id="edit_status" name="edit_status" required>
                                    <option value="active" <?php if ($row['status'] == 'active') echo 'selected'; ?>>Active</option>
                                    <option value="inactive" <?php if ($row['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
                                  </select>
                                </div>
                              </div>
                              <div class="row">
                                <!-- Magazine PDF -->
                                <div class="mb-3 col-md-12">
                                  <label for="Profile_pic" class="form-label">Profile Photo</label>
                                  <input type="file" class="form-control" id="Profile_pic" name="profile_picture" accept=".jpg, .jpeg, .png, .gif, .webp">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-sm" name="update_editor">Update</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                <?php
                  }
                } else {
                  echo '<tr><td colspan="9">No users found.</td></tr>';
                }
                ?>
              </tbody>
            </table>
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