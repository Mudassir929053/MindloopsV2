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
              <h1 class="mb-1 h2 fw-bold">Contact Us</h1>
            </div>
            <!-- <div>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMagazine">Add Magazine</button>
            </div> -->
          </div>
        </div>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <!-- <th>Magazine</th> -->
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $querycontact = $mysqli->query("SELECT * FROM `contact_us`");
                  $num = 1;

                  if ($querycontact === false) {
                    echo "Error: " . $mysqli->error;
                  } else {
                    while ($row = $querycontact->fetch_assoc()) {
                  ?>
                      <tr>
                        <td><?php echo $num++; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <!-- <td><img src="../assets/uploads/cover_images/<?php echo $row["cover_image_url"]; ?>" width="80" height="60"></td> -->
                        <td>
                          <?php
                          $message = strip_tags($row['message']);
                          $showReadMoreButton = strlen($message) > 50;
                          echo substr($message, 0, 50) . ($showReadMoreButton ? '...' : '');
                          if ($showReadMoreButton) {
                          ?>
                            <button type="button" class="btn btn-sm btn-gradient-05" data-bs-toggle="modal" data-bs-target="#modalView<?php echo $row['id']; ?>">
                              <span style="color: skyblue;">Read More</span>
                            </button>
                          <?php } ?>
                        </td>
                        <!-- <td><a href="../assets/uploads/magazine_pdfs/<?php echo $row["magazine_path"]; ?>" target="_blank">View PDF</a></td> -->
                        <td><?php echo $row['created_date']; ?></td>
                        <td>
                          <?php
                          $statusText = ($row['status'] == 1) ? 'Active' : 'Inactive';
                          $badgeClass = ($row['status'] == 1) ? 'bg-success' : 'bg-danger';
                          ?>
                          <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                        </td>

                        <td class="text-center ">
                          <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</button></a>

                        </td>
                      </tr>

                      <div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="questionDesc" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header bg-primary text-white">
                              <h4 class="modal-title"> Edit Contact Us</h4>
                              <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <!-- Title -->

                                <div class="row">

                                  <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                      <option value="1" <?php echo ($row['status'] == '1') ? 'selected' : ''; ?>>Active</option>
                                      <option value="0" <?php echo ($row['status'] == '0') ? 'selected' : ''; ?>>Inactive</option>

                                    </select>
                                  </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-success btn-sm" name="edit_contactus">Submit</button>
                                </div>
                              </form>

                            </div>
                          </div>
                        </div>
                      </div>
             
            </div>
          </div>
        </div>
        <!-- Start of Description Modal Page -->
        <div class="modal fade" id="modalView<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="questionDesc" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Message</h4>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <p class="text-justify text-dark">
                  <?php echo $row['message']; ?>
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
                  $querycontact->close();
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