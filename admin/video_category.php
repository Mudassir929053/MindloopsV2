<?php
include('../config/connection.php');
// var_dump($mysqli);
// exit;
include('function/videos-function.php');
include_once 'includes/head.php';

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

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
              <h1 class="mb-1 h2 fw-bold">Video Category</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal">
                Add Category
              </button>
            </div>
          </div>
        </div>

        <!-- START of Add Magazine Modal Page -->
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Create a Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Your form goes here -->
                <form id="insertMagForm" method="POST" enctype='multipart/form-data'>
                  <div class="mb-3">
                    <label for="category_name" class="form-label">Category Title</label>
                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="How to tie your shoelaces" required>
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-success" name="add_category">Save Category</button>
                    <button type="reset" class="btn btn-secondary">Clear</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <?php
        // SQL query to select data from the video_categories table
        $sql = "SELECT `category_id`, `category_name` FROM `video_categories`";
        $result = $mysqli->query($sql);
        ?>

        <?php
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            // Use $row['category_id'] as the modal ID
            $modal_id = 'videoModalEdit' . $row['category_id'];
        ?>
            <!-- Modal for Editing Video -->
            <div class="modal fade" id="<?php echo $modal_id; ?>" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="videoModalLabel">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- Your form goes here -->
                    <form id="editVideoForm" method="POST" enctype='multipart/form-data'>
                      <input type="hidden" class="form-control" id="category_id" name="category_id" value="<?php echo $row['category_id']; ?>">
                      <!-- Add more form fields and populate them with values from $row -->
                      <div class="mb-3">
                        <label for="category_name" class="form-label">Title</label>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $row['category_name']; ?>">
                      </div>
                      <div class="mb-3">
                        <button type="submit" class="btn btn-success" name="update_category">Edit Category</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        }
        ?>
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
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                // SQL query to select data from the videos table
                $sql = "SELECT `category_id`, `category_name` FROM `video_categories`";
                $result = $mysqli->query($sql);
                ?>
                <tbody>
                  <?php
                  if ($result->num_rows > 0) {
                    $count = 0;
                    while ($row = $result->fetch_assoc()) {
                      $count++;
                      echo "<tr>";
                      echo "<td>" . $count . "</td>";
                      echo "<td>" . $row["category_name"] . "</td>";
                      echo "<td>";
                      echo '<a href="#" data-bs-toggle="modal" data-bs-target="#videoModalEdit' . $row["category_id"] . '"><i class="fas fa-edit"></i></a>&nbsp; ';
                      // echo "<a href='javascript:void(0);' onclick='deleteVideo(" . $row["category_id"] . ")'><i class='fas fa-trash' style='color: red;'></i></a>";
                      echo '<a  href="video_category?delete_category=' . $row['category_id'] . '" title="Delete category Field"  onclick="return deleteindField()">';
                      echo '<i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a>';

                      echo "</td>";
                      echo "</tr>";
                    }
                  } else {
                    echo "<tr><td colspan='7'>No data available</td></tr>";
                  }
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
<script>
  function deleteindField() {
    var x = confirm("Are you sure want to delete this category field?");

    if (x == true) {
      return true;
    } else {
      return false;
    }
  }
</script>
<?php
include_once 'includes/footer.php';


?>