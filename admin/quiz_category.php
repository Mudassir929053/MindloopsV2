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
                            <h1 class="mb-1 h2 fw-bold">Quiz Category</h1>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addMagazine">Add Category</button>
                        </div>
                    </div>
                </div>

                <!-- START of Add Magazine Modal Page -->
                <div class="modal fade" id="addMagazine" tabindex="-1" role="dialog" aria-labelledby="magazinemodal" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="magazinemodal">Add Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" enctype="multipart/form-data" id="magazineDetails">
                                    <!-- Title -->
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Category Name</label>
                                        <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name" required>
                                        <input type="hidden" class="form-control" id="uid" name="uid" value="<?= $_SESSION['uid'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="1">Publish</option>
                                            <option value="0">Unpublish</option>
                                        </select>
                                    </div>
                                    <!-- Cover Image -->
                                    <div class="mb-3">
                                        <label for="category_image" class="form-label">Category Image *(.png, .webp, .jpg)</label>
                                        <input type="file" class="form-control" id="category_image" name="category_image" accept="image/*" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success btn-sm" name="add_quiz_category">Submit</button>
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
                                        <th>S.No</th>
                                        <th>Category Name</th>
                                        <th>Category Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $queryMagazine = $mysqli->query("SELECT * FROM `tb_quiz_category`");
                                    $num = 1;

                                    if ($queryMagazine === false) {
                                        echo "Error: " . $mysqli->error;
                                    } else {
                                        while ($row = $queryMagazine->fetch_assoc()) {
                                    ?>
                                            <tr>
                                                <td><?php echo $num++; ?></td>
                                                <td><?php echo $row['category_name']; ?></td>
                                                <td><img src="../assets/uploads/mcq_category_image/<?php echo $row["category_image"]; ?>" width="80" height="60"></td>
                                                <td>
                                                    <?php
                                                    $statusText = ($row['status'] == 1) ? 'Publish' : 'Unpublish';
                                                    $badgeClass = ($row['status'] == 1) ? 'bg-success' : 'bg-danger';
                                                    ?>
                                                    <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                                                </td>
                                                <td class="text-center ">
                                                    <a class="btn btn-sm btn-secondary text-white" href="quiz_questions.php?category_id=<?php echo $row["category_id"]; ?>">
                                                        View Questions
                                                    </a>
                                                    <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editMagField<?php echo $row['category_id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button>
                                                    <a class="btn btn-sm btn-danger" href="quiz_category?delete_quiz_category=<?php echo $row['category_id']; ?>" title="Delete Magazine Field" onclick="return deleteindField()">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                                                </td>
                                            </tr>

                                            <!-- START of Edit Category Modal Page -->
                                            <div class="modal fade" id="editMagField<?php echo $row['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="magfield" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-md">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="magzine">Edit Category</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="" method="POST" enctype="multipart/form-data" id="magazineDetails">
                                                                <!-- Title -->
                                                                <div class="mb-3">
                                                                    <label for="title" class="form-label">Category Name</label>
                                                                    <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name" value="<?= $row['category_name'] ?>" required>
                                                                    <input type="hidden" class="form-control" id="category_id" name="category_id" value="<?= $row['category_id'] ?>">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="status" class="form-label">Status</label>
                                                                    <select class="form-select" id="status" name="status" required>
                                                                        <option value="1" <?php echo ($row['status'] == 1) ? 'selected' : ''; ?>>Publish</option>
                                                                        <option value="0" <?php echo ($row['status'] == 0) ? 'selected' : ''; ?>>Unpublish</option>
                                                                    </select>
                                                                </div>
                                                                <!-- Cover Image -->
                                                                <div class="mb-3">
                                                                    <label for="category_image" class="form-label">Category Image *(.png, .webp, .jpg)</label>
                                                                    <input type="file" class="form-control" id="category_image" name="category_image" accept="image/*">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-success btn-sm" name="edit_quiz_category">Submit</button>
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
            var x = confirm("Are you sure want to delete this QUIZ(MCQ) Category, All Questions Related to this Category will also be deleted?");

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