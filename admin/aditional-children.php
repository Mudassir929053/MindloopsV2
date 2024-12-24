<?php
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
              <h1 class="mb-1 h2 fw-bold">Additional Children</h1>
            </div>

          </div>
        </div>

        <!-- START of Add Magazine Modal Page -->

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
                    <th>S.No</th>
                    <th>Student Name</th>
                    <th>Parent Name</th>
                    <th>Parent Email</th>
                    <th>Parent Mobile</th>
                    <th>Status</th>
                    <th>Requested Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $queryMagazine = $mysqli->query("SELECT UT.*, UTT.full_name as parent_name,UTT.mobile as parent_mobile,UTT.email as parent_email FROM `user_table` as UT LEFT JOIN student_profile as SP ON uid = user_id  join user_table UTT on SP.parent_id = UTT.uid WHERE UT.role_id = 4 and UT.status='pending'");

                  $num = 1;

                  if ($queryMagazine === false) {
                    echo "Error: " . $mysqli->error;
                  } else {
                    while ($row = $queryMagazine->fetch_assoc()) {
                  ?>
                      <tr>
                        <td><?php echo $num++; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['parent_name']; ?></td>
                        <td><?php echo $row['parent_email']; ?></td>
                        <td><?php echo $row['parent_mobile']; ?></td>

                        <td>
                          <?php
                          $statusText = (strtolower($row['status']) == 'active') ? 'Active' : 'Pending';
                          $badgeClass = (strtolower($row['status']) == 'active') ? 'bg-success' : 'bg-danger';
                          ?>
                          <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                        </td>
                        <td><?= date("F j, Y, g:i a", strtotime($row['created_date'])) ?></td>

                        <td class="text-center ">
                          <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editMagField<?php echo $row['uid']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button></a>
                         
                        </td>
                      </tr>

                      <!-- START of Edit Magazine Modal Page -->
                      <div class="modal fade" id="editMagField<?php echo $row['uid']; ?>" tabindex="-1" role="dialog" aria-labelledby="magfield" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="magzine">Addition Children</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">
                                <!-- Title -->

                                <div class="row">

                                  <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                      <option value="active" <?php echo ($row['status'] == 'active') ? 'selected' : ''; ?>>Active</option>
                                      <option value="inactive" <?php echo ($row['status'] == 'inactive') ? 'selected' : ''; ?>>Inactive</option>
                                      <option value="pending" <?php echo ($row['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                                    </select>
                                  </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success btn-sm" name="change_adition_childern">Submit</button>
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