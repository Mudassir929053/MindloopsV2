<?php
include('../config/connection.php');
// var_dump($mysqli);
// exit;
// include('function/function.php');
include_once 'includes/head.php';
include('function/mindbooster-function.php');
$id = $_GET['id'];

include_once 'includes/sidebar.php';
?>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
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
              <h1 class="mb-1 h2 fw-bold">Community Article</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addcommunityarticle">Add Community Article</button>
            </div>
          </div>
        </div>

        <!-- START of Add Magazine Modal Page -->
        <div class="modal fade" id="addcommunityarticle" tabindex="-1" role="dialog" aria-labelledby="Articlemodal" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="Articlemodal">Add Article</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
              </div>
              <div class="modal-body">
                <?php $uid = $_SESSION['uid']; ?>
                <form action="" method="POST" enctype="multipart/form-data" id="ArticleForm">
                  <input type="hidden" id="uid" name="uid" value="<?php echo  $uid; ?>" required>
                  <input type="hidden" id="category_id" name="category_id" value="<?php echo  $id; ?>" required>
                  <div class="mb-3">
                    <label for="a_name" class="form-label">Article Title</label>

                    <input type="text" class="form-control" id="a_name" name="a_name" required>
                  </div>

                  <div class="mb-3">
                    <label for="a_content" class="form-label">Article Content</label>
                    <textarea class="form-control" id="summernote" name="a_content" maxlength="1000" required></textarea>
                  </div>

                  <div class="mb-3">
                    <label for="a_status" class="form-label">Status:</label>
                    <select class="form-select" id="a_status" name="a_status" required>
                      <option value="1">Publish</option>
                      <option value="0">Unpublish</option>
                    </select>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-sm" name="add_article">Submit</button>
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
                    <th>Community</th>
                    <th>Article Title</th>
                    <th>Article Created by</th>
                    <th>Status</th>
                    <th>Flags</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                $queryMagazine = $mysqli->query("SELECT * FROM `community_article` ca
                  LEFT JOIN community c
                  ON ca.article_cc_id= c.community_id WHERE ca.article_cc_id=$id
                ");
                $num = 1;
                if ($queryMagazine === false) {
                  echo "Error: " . $mysqli->error;
                } else {
                  while ($row = $queryMagazine->fetch_assoc()) {
                    $row['article_created_by'];
                ?>
                    <tr>
                      <td><?php echo $num++; ?></td>
                      <td><?php echo $row['community_name']; ?></td>
                      <td><?php echo $row['article_title']; ?></td>
                      <td><?php echo $row['article_created_by']; ?></td>

                      <td>
                        <?php
                        $statusText = ($row['article_status'] == 1) ? 'Publish' : 'Unpublish';
                        $badgeClass = ($row['article_status'] == 1) ? 'bg-success' : 'bg-danger';
                        ?>
                        <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                      </td>
                      <td><?php echo $row['article_flag']; ?></td>

                      <td class="text-center ">
                        <!-- Modify your "View" button -->
                        <a class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#viewArticleModal" data-article-content="<?php echo htmlspecialchars($row['article_content']); ?>" title="View Article">
                          <i class="fa fa-eye" aria-hidden="true"></i> View
                        </a>
                        <button type="button" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editarticle<?php echo $row['article_id']; ?>"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button></a>
                        <a class="btn btn-sm btn-danger" href="community_article?delete_article=<?php echo $row['article_id']; ?>" title="Delete Article" onclick="return deletearticle()">
                          <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>

                      </td>


                    </tr>

                    <!-- Edit Grade Modal -->
                    <!-- Edit Community Modal -->
                    <div class="modal fade" id="editarticle<?php echo $row['article_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editArticleModal" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editArticleModal">Edit Community Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onClick="clearForm()"></button>
                          </div>
                          <div class="modal-body">
                            <form action="" method="POST" enctype="multipart/form-data" id="EditArticleForm">
                              <!-- Input field for community_id -->
                              <input type="hidden" id="edit_article_id" name="edit_article_id" value="<?php echo $row['article_id']; ?>">

                              <div class="mb-3">
                                <label for="edit_community" class="form-label">Category Name:</label>
                                <input type="text" class="form-control" id="edit_community" name="edit_community" style="background-color: lightgrey; " value="<?php echo $row['community_name']; ?>" readonly>
                              </div>

                              <div class="mb-3">
                                <label for="edit_article_title" class="form-label">Article Title:</label>
                                <input type="text" class="form-control" id="edit_article_title" name="edit_article_title" value="<?php echo $row['article_title']; ?>" required>
                              </div>
                              <div class="mb-3">
                                <label for="edit_article_content" class="form-label">Article Content:</label>
                                <textarea class="form-control" id="summernote1" name="edit_article_content" maxlength="1000" required><?php echo $row['article_content']; ?>
                              </textarea>
                              </div>
                              <div class="mb-3">
                                <label for="edit_article_status" class="form-label">Status:</label>
                                <select class="form-select" id="edit_article_status" name="edit_article_status" required>
                                  <option value="1" <?php if ($row['article_status'] == 1) echo 'selected'; ?>>Publish</option>
                                  <option value="0" <?php if ($row['article_status'] == 0) echo 'selected'; ?>>Unpublish</option>
                                </select>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success btn-sm" name="update_article">Update</button>
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
      <!-- Add this modal at the end of your HTML body -->
      <div class="modal fade" id="viewArticleModal" tabindex="-1" role="dialog" aria-labelledby="viewArticleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="viewArticleModalLabel">View Article</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div id="viewArticleContent"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
</div>
<script>
  $(document).ready(function() {
    $('#viewArticleModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var articleContent = button.data('article-content');
      $('#viewArticleContent').html(articleContent);
    });
  });
</script>

<script>
  $('#summernote').summernote({
    tabsize: 2,
    height: 400
  });
</script>
<script>
  $('#summernote1').summernote({
    tabsize: 2,
    height: 400
  });
</script>
<script>
  function deletearticle() {
    var x = confirm("Are you sure want to delete this Article?");

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