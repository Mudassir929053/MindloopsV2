<?php
include('../config/connection.php');
// var_dump($mysqli);
// exit;
include('function/mindbooster-function.php');
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
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addWordsearch">Add Words</button>
            </div>
          </div>
        </div>

        <!-- START of Add WORD and Image Modal Page -->
        <div class="modal fade" id="addWordsearch" tabindex="-1" role="dialog" aria-labelledby="wordmodalsearch" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="wordmodalsearch">Add WORDS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" id="wordsearchDetails">
                  <div class="row">
                    <!-- word_name -->
                    <div class="mb-3 col-md-12">
                      <label for="words">Words</label>
                      <textarea class="form-control" id="words" name="words" placeholder="Enter the Words with comma separated" maxlength="1000" required></textarea>
                      <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">
                    </div>
                    <!-- Game Level -->
                    <div class="mb-3 col-md-12">
                      <label for="level" class="form-label">Game Level</label>
                      <select class="form-select" id="level" name="level" required>
                        <option value="">SELECT</option>
                        <option value="EASY">EASY</option>
                        <option value="MEDIUM">MEDIUM</option>
                        <option value="HARD">HARD</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-12">
                      <label for="cat_id" class="form-label">Category</label>
                      <select class="form-select" id="cat_id" name="cat_id" required>
                        <?php
                        $queryCategory = $mysqli->query("SELECT `category_id`, `category_name` FROM `game_category`");
                        if ($queryCategory === false) {
                          echo "Error: " . $mysqli->error;
                        } else {
                          echo "<option value=''>SELECT</option>";
                          while ($row = $queryCategory->fetch_assoc()) {
                            echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <!-- Cover Image -->
                    <div class="mb-3 col-md-12">
                      <label for="addimage">Insert Image</label>
                      <input type="file" class="form-control" accept="image/png,image/jpeg" id="addimage" name="addimage" onchange="previewImage(this)" required>

                      <img id="preview-image" src="#" alt="Preview Image" style="display: none; max-width: 300px; margin-top: 10px;">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add_word_search">Submit</button>
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
                    <th>Words</th>
                    <th>Image</th>
                    <th>Category</th>
                    <!-- <th>Category Image</th> -->
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $queryWordmatch = $mysqli->query("SELECT ws.*, gc.category_name, gc.category_image
                  FROM tb_wordsearch ws 
                  INNER JOIN game_category gc ON ws.cat_id = gc.category_id;");
                  $num = 1;

                  if ($queryWordmatch === false) {
                    echo "Error: " . $mysqli->error;
                  } else {
                    while ($row = $queryWordmatch->fetch_assoc()) {
                  ?>
                      <tr>
                        <td><?php echo $num++; ?></td>
                        <td><?php echo $row['wordsearch_level']; ?></td>
                        <td><?php echo $row['wordsearch_words']; ?></td>
                        <td><img src="../assets/uploads/wordsearch/<?php echo $row["wordsearch_image"]; ?>" width="80" height="60"></td>
                        <td><?php echo $row['category_name']; ?></td>
                        <td class="text-center ">
                          <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editwordsearch<?php echo $row['wordsearch_id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button></a>
                          <a class="btn btn-sm btn-danger" href="wordsearch?delete_wordsearch=<?php echo $row['wordsearch_id']; ?>" title="Delete Words" onclick="return deletewords()">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                        </td>
                      </tr>

                      <!-- START of Edit Match Word Modal Page -->
                      <div class="modal fade" id="editwordsearch<?php echo $row['wordsearch_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editWordmodal<?php echo $row['wordsearch_id']; ?>" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="editWordmodal<?php echo $row['wordsearch_id']; ?>">Edit WORDS</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                            </div>
                            <div class="modal-body">
                              <form action="" method="POST" enctype="multipart/form-data" id="editWordsearchDetails<?php echo $row['wordsearch_id']; ?>">
                                <div class="row">
                                  <!-- word_name -->
                                  <div class="mb-3 col-md-12">
                                    <label for="editWords">Words</label>
                                    <textarea class="form-control" id="editWords<?php echo $row['wordsearch_id']; ?>" name="editWords" placeholder="Enter the Words with comma separated" maxlength="1000" required><?php echo $row["wordsearch_words"]; ?></textarea>
                                    <input type="hidden" class="form-control" id="wordsearch_id" name="wordsearch_id" value="<?php echo $row['wordsearch_id']; ?>">

                                  </div>
                                  <!-- Game Level -->
                                  <div class="mb-3 col-md-12">
                                    <label for="editLevel<?php echo $row['wordsearch_id']; ?>" class="form-label">Game Level</label>
                                    <select class="form-select" id="editLevel<?php echo $row['wordsearch_id']; ?>" name="editLevel" required>
                                      <option value="EASY" <?php echo ($row['wordsearch_level'] == 'EASY') ? 'selected' : ''; ?>>EASY</option>
                                      <option value="MEDIUM" <?php echo ($row['wordsearch_level'] == 'MEDIUM') ? 'selected' : ''; ?>>MEDIUM</option>
                                      <option value="HARD" <?php echo ($row['wordsearch_level'] == 'HARD') ? 'selected' : ''; ?>>HARD</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="mb-3 col-md-12">
                                    <label for="editCat_id<?php echo $row['wordsearch_id']; ?>" class="form-label">Category</label>
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
                                  <div class="mb-3 col-md-12">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" id="updateimage" name="updateimage">
                                    <br>

                                  </div>

                                  <div class="mb-3 col-md-12">
                                    <label for="image_preview">Current Image:</label><br>
                                    <?php if ($row["wordsearch_image"]) { ?>
                                      <img src="../assets/uploads/wordsearch/<?php echo $row["wordsearch_image"]; ?>" id="image_preview" style="max-width: 200px; max-height: 200px;">
                                    <?php } else { ?>
                                      <p>No image found.</p>
                                    <?php } ?>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-success btn-sm" name="edit_word_search">Submit</button>
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
    function deletewords() {
      var x = confirm("Are you sure want to delete this Words?");

      if (x == true) {
        return true;
      } else {
        return false;
      }
    }
  </script>

  <script>
    //preview image

    function previewImage(input) {
      var preview = document.getElementById('preview-image');
      preview.style.display = 'block';

      var reader = new FileReader();
      reader.onload = function() {
        preview.src = reader.result;
      }

      if (input.files && input.files[0]) {
        reader.readAsDataURL(input.files[0]);
      }
    }
  </script>

</div>
<?php
include_once 'includes/footer.php';
// $mysqli->close();

?>