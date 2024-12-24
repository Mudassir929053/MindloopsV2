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
                 <h1 class="mb-1 h2 fw-bold">Manage Crossword</h1>
               </div>
               <div>
                 <a href="Crossword_Admin_Manual.pdf" target="_blank" class="btn btn-light border border-2 fw-bold btn-sm"><i class="c-red-800 ti-help"></i></a>
                 <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addbadge">Add Clue</button>

               </div>
             </div>
           </div>
           <!-- START of Add Magazine Modal Page -->
           <div class="modal fade" id="addbadge" tabindex="-1" role="dialog" aria-labelledby="magazinemodal" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                 <div class="modal-header">
                   <h5 class="modal-title" id="magazinemodal">Add Clue</h5>
                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                 </div>
                 <div class="modal-body">

                   <form action="" method="post">

                     <div class="mb-3">
                       <label for="question_input" class="form-label">Clue:</label>
                       <input type="text" class="form-control" id="question_input" name="cc_clue" placeholder="Enter clue" required="">
                     </div>
                     <input type="hidden" name="cc_id" value="1">

                     <div class="mb-3">
                       <label for="answer_input" class="form-label">Answer:</label>
                       <input type="text" class="form-control" id="answer_input" name="cc_answer" placeholder="Enter answer" required="">
                     </div>
                     <div class="row">

                       <div class="mb-3 col-md-6">
                         <label for="category_select" class="form-label">Category:</label>
                         <select class="form-select" id="category_select" name="cc_category" required="">
                           <option value="" selected disabled>Select Category</option>
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

                       <div class="mb-3 col-md-6">
                         <label for="direction_select" class="form-label">Direction:</label>
                         <select class="form-select" id="direction_select" name="cc_direction" required="">
                           <option value="" selected="" disabled="">Select direction</option>
                           <option value="across">Across</option>
                           <option value="down">Down</option>
                         </select>
                       </div>

                       <div class="row">
                         <div class="col-md-6 mb-3">
                           <label for="row_input" class="form-label">Row:</label>
                           <input type="number" class="form-control" id="row_input" name="cc_row" placeholder="Enter row number" min="1" required="">
                         </div>
                         <div class="col-md-6 mb-3">
                           <label for="column_input" class="form-label">Column:</label>
                           <input type="number" class="form-control" id="column_input" name="cc_column" placeholder="Enter column number" min="1" required="">
                         </div>
                       </div>

                       <div class="d-grid">
                         <button type="submit" name="add_crossgame_clue" class="btn btn-warning">Add Clue</button>
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
               <div class="data_table table-responsive">
                 <table id="dataTable" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                   <thead class="table-primary">
                     <tr>
                       <th>#</th>
                       <th>Clue</th>
                       <th>Answer</th>
                       <th>Category</th>
                       <th>Direction</th>
                       <th>Row</th>
                       <th>Column</th>
                       <th>Action</th>
                     </tr>
                   </thead>
                   <tbody>
                     <?php
                      $querybadge = $mysqli->query("SELECT * FROM `crossword_clue` left join game_category on crossword_clue.cc_id = game_category.category_id");
                      $num = 1;
                      if ($querybadge === false) {
                        echo "Error: " . $mysqli->error;
                      } else {
                        while ($row = $querybadge->fetch_assoc()) {
                      ?>
                         <tr>
                           <td><?php echo $num++; ?></td>
                           <td><?php echo $row['clue']; ?></td>
                           <td>
                             <span><?php echo $row['answer']; ?></span>

                           </td>
                           <td>
                             <span><?php echo $row['category_name']; ?></span>

                           </td>
                           <td>
                             <span><?php echo $row['direction']; ?></span>

                           </td>
                           <td>
                             <span><?php echo $row['row']; ?></span>

                           </td>
                           <td>
                             <span><?php echo $row['column_name']; ?></span>

                           </td>

                           <td class="text-center ">
                             <a type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editBadge<?php echo $row['clue_id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i> Edit</button></a>

                             <a class="btn btn-sm btn-danger" href="crossword?delete_clue=<?php echo $row['clue_id']; ?>" title="Delete Clue" onclick="return deleteindField()">
                               <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                           </td>

                         </tr>
                         <!-- START of Edit Magazine Modal Page -->
                         <div class="modal fade" id="editBadge<?php echo $row['clue_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="magfield" aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h5 class="modal-title" id="magzine">Edit Clue</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <div class="modal-body">
                                 <form action="" method="post">

                                   <div class="mb-3">
                                     <label for="question_input" class="form-label">Clue:</label>
                                     <input type="hidden" name="clue_id" value="<?= $row['clue_id']; ?>">
                                     <input type="text" class="form-control" id="question_input" name="cc_clue" value="<?= $row['clue']; ?>" placeholder="Enter clue" required="">
                                   </div>
                                   <input type="hidden" name="cc_id" value="1">

                                   <div class="mb-3">
                                     <label for="answer_input" class="form-label">Answer:</label>
                                     <input type="text" class="form-control" id="answer_input" name="cc_answer" value="<?= $row['answer']; ?>" placeholder="Enter answer" required="">
                                   </div>
                                   <div class="row">

                                     <div class="mb-3 col-md-6">
                                       <label for="direction_select" class="form-label">Direction:</label>
                                       <select class="form-select" id="direction_select" name="cc_direction" required="">
                                         <option value="" disabled>Select direction</option>
                                         <option value="across" <?php if ($row['direction'] === 'across') echo 'selected'; ?>>Across</option>
                                         <option value="down" <?php if ($row['direction'] === 'down') echo 'selected'; ?>>Down</option>
                                       </select>
                                     </div>
                                     <div class="mb-3 col-md-6">
                                       <label for="category_select" class="form-label">Category:</label>
                                       <select class="form-select" id="category_select" name="cc_category" required="">
                                         <option value="" selected disabled>Select Category</option>
                                         <?php
                                          $selectedCategoryID = $row['cc_id'];
                                          $queryCategory = $mysqli->query("SELECT `category_id`, `category_name` FROM `game_category`");
                                          if ($queryCategory === false) {
                                            echo "Error: " . $mysqli->error;
                                          } else {
                                            while ($row = $queryCategory->fetch_assoc()) {
                                              $categoryID = $row['category_id'];
                                              $categoryName = $row['category_name'];
                                              $selected = ($categoryID == $selectedCategoryID) ? 'selected' : '';

                                              echo "<option value='$categoryID' $selected>$categoryName</option>";
                                            }
                                          }
                                          ?>
                                       </select>
                                     </div>
                                   </div>



                                   <div class="row">
                                     <div class="col-md-6 mb-3">
                                       <label for="row_input" class="form-label">Row:</label>
                                       <input type="number" class="form-control" id="row_input" name="cc_row" value="<?= $row['row']; ?>" placeholder="Enter row number" min="1" required="">
                                     </div>
                                     <div class="col-md-6 mb-3">
                                       <label for="column_input" class="form-label">Column:</label>
                                       <input type="number" class="form-control" id="column_input" name="cc_column" value="<?= $row['column_name']; ?>" placeholder="Enter column number" min="1" required="">
                                     </div>
                                   </div>

                                   <div class="d-grid">
                                     <button type="submit" name="update_crossgame_clue" class="btn btn-warning">Update Clue</button>
                                   </div>
                                 </form>
                               </div>

                             </div>
                           </div>
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
   <script>
     function deleteindField() {
       var x = confirm("Are you sure want to delete this Crossword clue?");

       if (x == true) {
         return true;
       } else {
         return false;
       }
     }
   </script>
   <?php
    include_once 'includes/footer.php';
    // $mysqli->close();
    ?>