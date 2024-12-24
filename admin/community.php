<?php
include('../config/connection.php');
// var_dump($mysqli);
// exit;
// include('function/function.php');
include_once 'includes/head.php';
include('function/mindbooster-function.php');


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
              <h1 class="mb-1 h2 fw-bold">Community</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addcommunity">Add Community</button>
            </div>
          </div>
        </div>

        <!-- START of Add Magazine Modal Page -->
        <div class="modal fade" id="addcommunity" tabindex="-1" role="dialog" aria-labelledby="communitymodal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="Communitymodal">Add Community</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
              </div>
              <div class="modal-body">
                <?php $uid = $_SESSION['uid']; ?>
                <form action="" method="POST" enctype="multipart/form-data" id="CommunityForm">
                  <input type="hidden" id="uid" name="uid" value="<?php echo  $uid; ?>" required>
                  <div class="mb-3">
                    <label for="community_name" class="form-label">Community Name:</label>

                    <input type="text" class="form-control" id="community_name" name="community_name" required>
                  </div>
                  <div class="mb-3">
                    <label for="community_desc" class="form-label">Community Description</label>
                    <textarea class="form-control" id="community_desc" name="community_desc" maxlength="1000" required></textarea>
                  </div>

                  <div class="mb-3">
                    <label for="community_status" class="form-label">Status:</label>
                    <select class="form-select" id="community_status" name="community_status" required>
                      <option value="1">Publish</option>
                      <option value="0">Unpublish</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add_community">Submit</button>
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
                    <th>Community Name</th>
                    <th>Community Decription</th>
                    <th>Status</th>
                    <th>Action</th>
                    <!-- <th>Salary</th> -->
                  </tr>
                </thead>
                <?php
                $queryMagazine = $mysqli->query("SELECT * FROM `community`");
                $num = 1;

                if ($queryMagazine === false) {
                  echo "Error: " . $mysqli->error;
                } else {
                  while ($row = $queryMagazine->fetch_assoc()) {
                ?>
                    <tr>
                      <td><?php echo $num++; ?></td>
                      <td><?php echo $row['community_name']; ?></td>
                      <td><?php echo $row['community_description']; ?></td>
                      <!-- <td><?php echo ($row['community_status'] == 1) ? 'Publish' : 'Unpublish'; ?></td> -->

                      <td>
                        <?php
                        $statusText = ($row['community_status'] == 1) ? 'Publish' : 'Unpublish';
                        $badgeClass = ($row['community_status'] == 1) ? 'bg-success' : 'bg-danger';
                        ?>
                        <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                      </td>

                      <td class="text-center ">
                        <a class="btn btn-sm btn-secondary" href="community_article?id=<?php echo $row['community_id']; ?>" title="View Community">
                          <i class="fa fa-eye" aria-hidden="true"></i> View</a>
                        <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editcommunity<?php echo $row['community_id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button></a>
                        <a class="btn btn-sm btn-danger" href="community?delete_community=<?php echo $row['community_id']; ?>" title="Delete community" onclick="return deletecommunity()">
                          <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>

                      </td>


                    </tr>

                    <!-- Edit Grade Modal -->
                    <!-- Edit Community Modal -->
                    <div class="modal fade" id="editcommunity<?php echo $row['community_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editCommunityModal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editCommunityModal">Edit Community</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data" id="EditCommunityForm">
                              <!-- Input field for community_id -->
                              <input type="hidden" id="community_id" name="community_id" value="<?php echo $row['community_id']; ?>">

                              <div class="mb-3">
                                <label for="edit_community_name" class="form-label">Community Name:</label>
                                <input type="text" class="form-control" id="edit_community_name" name="edit_community_name" value="<?php echo $row['community_name']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="edit_community_description" class="form-label">Community Description:</label>
                                <input type="text" class="form-control" id="edit_community_description" name="edit_community_description" value="<?php echo $row['community_description']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="edit_community_status" class="form-label">Status:</label>
                                <select class="form-select" id="edit_community_status" name="edit_community_status" required>
                                  <option value="1" <?php if ($row['community_status'] == 1) echo 'selected'; ?>>Publish</option>
                                  <option value="0" <?php if ($row['community_status'] == 0) echo 'selected'; ?>>Unpublish</option>
                                </select>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-sm" name="update_community">Update</button>
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
  function deletecommunity() {
    var x = confirm("Are you sure want to delete this Community?");

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