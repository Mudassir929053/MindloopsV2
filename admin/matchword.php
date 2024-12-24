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
              <h1 class="mb-1 h2 fw-bold">Match Word</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addWord">Add Word Image</button>
            </div>
          </div>
        </div>

        <!-- START of Add WORD and Image Modal Page -->
        <div class="modal fade" id="addWord" tabindex="-1" role="dialog" aria-labelledby="wordmodal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="wordmodal">Add WORD & IMAGE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="wordDetails">
                  <div class="row">
                    <!-- word_name -->
                    <div class="mb-3 col-md-6">
                      <label for="word_name" class="form-label">Word Name</label>
                      <input type="text" class="form-control" id="word_name" name="word_name" placeholder="Enter Word Name" required>
                      <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">
                    </div>
                    <!-- Game Level -->
                    <div class="mb-3 col-md-6">
                      <label for="game_level" class="form-label">Game Level</label>
                      <select class="form-select" id="game_level" name="game_level" required>
                        <option value="EASY">EASY</option>
                        <option value="MEDIUM">MEDIUM</option>
                        <option value="HARD">HARD</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="cat_id" class="form-label">Category</label>
                      <select class="form-select" id="cat_id" name="cat_id" required>
                        <?php
                        $queryCategory = $mysqli->query("SELECT `category_id`, `category_name` FROM `game_category`");
                        if ($queryCategory === false) {
                          echo "Error: " . $mysqli->error;
                        } else {
                          while ($row = $queryCategory->fetch_assoc()) {
                            echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <!-- Cover Image -->
                    <div class="mb-3 col-md-6">
                      <label for="word_image" class="form-label">Word Image *(.png, .webp, .jpg)</label>
                      <input type="file" class="form-control" id="word_image" name="word_image" accept="image/*" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add_word_match">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- END of Add Word Match Modal Page -->

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
                    <th>Game Level</th>
                    <th>Word Name</th>
                    <th>Word Image</th>
                    <th>Category</th>
                    <!-- <th>Category Image</th> -->
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $queryWrormatch = $mysqli->query("SELECT wm.*, gc.category_name, gc.category_image
                  FROM word_match wm 
                  INNER JOIN game_category gc ON wm.cat_id = gc.category_id ORDER BY wm.created_at ASC;");
                  $num = 1;

                  if ($queryWrormatch === false) {
                    echo "Error: " . $mysqli->error;
                  } else {
                    while ($row = $queryWrormatch->fetch_assoc()) {
                  ?>
                      <tr>
                        <td><?php echo $num++; ?></td>
                        <td><?php echo $row['game_level']; ?></td>
                        <td><?php echo $row['word_name']; ?></td>
                        <td><img src="../assets/uploads/word_image_match/<?php echo $row["word_image"]; ?>" width="80" height="60"></td>
                        <td><?php echo $row['category_name']; ?></td>
                        <!-- <td><img src="../assets/uploads/game_category_images/<?php echo $row["category_image"]; ?>" width="80" height="60"></td> -->
                        <td class="text-center ">
                          <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editCatField<?php echo $row['id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button></a>
                          <a class="btn btn-sm btn-danger" href="matchword?delete_matchword_field=<?php echo $row['id']; ?>" title="Delete Category Field" onclick="return deleteindField()">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                        </td>
                      </tr>

                      <!-- START of Edit Match Word Modal Page -->
                      <div class="modal fade" id="editCatField<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="magfield" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="magzine">Edit Match Word Field</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="POST" enctype="multipart/form-data" id="wordDetails">
                                <div class="row">
                                  <!-- word_name -->
                                  <div class="mb-3 col-md-6">
                                    <label for="word_name" class="form-label">Word Name</label>
                                    <input type="text" class="form-control" id="word_name" name="word_name" placeholder="Enter Word Name" value="<?php echo $row['word_name']; ?>" required>
                                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>">
                                  </div>
                                  <!-- Game Level -->
                                  <div class="mb-3 col-md-6">
                                    <label for="game_level" class="form-label">Game Level</label>
                                    <select class="form-select" id="game_level" name="game_level" required>
                                      <option value="EASY" <?php echo ($row['game_level'] == 'EASY') ? 'selected' : ''; ?>>EASY</option>
                                      <option value="MEDIUM" <?php echo ($row['game_level'] == 'MEDIUM') ? 'selected' : ''; ?>>MEDIUM</option>
                                      <option value="HARD" <?php echo ($row['game_level'] == 'HARD') ? 'selected' : ''; ?>>HARD</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="mb-3 col-md-6">
                                    <label for="cat_id" class="form-label">Category</label>
                                    <select class="form-select" id="cat_id" name="cat_id" required>
                                      <?php
                                      $queryCategory = $mysqli->query("SELECT `category_id`, `category_name` FROM `game_category`");
                                      if ($queryCategory === false) {
                                        echo "Error: " . $mysqli->error;
                                      } else {
                                        while ($rowCategory = $queryCategory->fetch_assoc()) {
                                          $selected = ($rowCategory['category_id'] == $row['cat_id']) ? 'selected' : '';
                                          echo "<option value='" . $rowCategory['category_id'] . "' " . $selected . ">" . $rowCategory['category_name'] . "</option>";
                                        }
                                      }
                                      ?>
                                    </select>
                                  </div>
                                  <!-- Cover Image -->
                                  <div class="mb-3 col-md-6">
                                    <label for="word_image" class="form-label">Word Image *(.png, .webp, .jpg)</label>
                                    <input type="file" class="form-control" id="word_image" name="word_image" accept="image/*">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-success btn-sm" name="edit_word_match">Submit</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
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
      var x = confirm("Are you sure want to delete this Matchword field?");

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