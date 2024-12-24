<?php
include('function/function.php');
include_once 'includes/head.php';
?>

<?php
include_once 'includes/sidebar.php';
?>

<div class="page-container">
  <?php include_once 'includes/header.php'; ?>
  <main class='main-content bgc-grey-100'>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
            <div class="mb-3 mb-md-0">
              <h1 class="mb-1 h2 fw-bold">Reviews</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <div class="dataTable table-responsive">
              <table id="dataTable" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead class="table-primary">
                  <tr>
                    <th>No</th>
                    <th>Magazine ID</th>
                    <th>User ID</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Status</th>
                    <th>Date & Time</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $queryReviews = $mysqli->query("SELECT * FROM `review`");
                  $num = 1;

                  if ($queryReviews === false) {
                    echo "Error: " . $mysqli->error;
                  } else {
                    while ($row = $queryReviews->fetch_assoc()) {
                      // Generate unique IDs for modal and buttons
                      $editModalId = "editMgField" . $row['review_id'];
                  ?>
                      <tr>
                        <td><?php echo $num++; ?></td>
                        <td><?php echo $row['magazine_id']; ?></td>
                        <td><?php echo $row['uid']; ?></td>
                        <td><?php echo $row['user_rating']; ?></td>
                        <td><?php echo $row['user_review']; ?></td>
                        <td><?php
                          $statusText = ($row['status'] == 1) ? 'Publish' : 'Unpublish';
                          $badgeClass = ($row['status'] == 1) ? 'bg-success' : 'bg-danger';
                          ?>
                          <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span></td>
                        <td><?php echo $row['datetime']; ?></td>
                        <td class="text-center">
                          <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#<?php echo $editModalId; ?>"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button>
                          <!-- <a class="btn btn-sm btn-danger" href="review?delete_review=<?php echo $row['review_id']; ?>" title="Delete Review" onclick="return deleteindField()"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a> -->
                        </td>
                      </tr>
                      <!-- Edit Magazine Status Modal -->
                      <div class="modal fade" id="<?php echo $editModalId; ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $editModalId; ?>Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="<?php echo $editModalId; ?>Label">Update Magazine Status</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="POST">
                                <!-- <input type="hidden" id="editMagazineId" name="magazine_id" value="<?php echo $row['magazine_id']; ?>"> -->
                                <input type="hidden" id="editReviewId" name="review_id" value="<?php echo $row['review_id']; ?>">

                                <div class="mb-3 col-md-6">
                                  <label for="editStatus" class="form-label">Status</label>
                                  <select class="form-select" id="editStatus" name="status" required>
                                    <option value="1" <?php if ($row['status'] == 1) echo 'selected'; ?>>Publish</option>
                                    <option value="0" <?php if ($row['status'] == 0) echo 'selected'; ?>>Unpublish</option>
                                  </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-success btn-sm" name="edit_review_status">Update Status</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                  <?php
                    }
                  }
                  $queryReviews->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- <script>
    function deleteindField() {
      var x = confirm("Are you sure want to delete this Review?");
      if (x == true) {
        return true;
      } else {
        return false;
      }
    }
  </script> -->
</div>
<?php
include_once 'includes/footer.php';
?>
