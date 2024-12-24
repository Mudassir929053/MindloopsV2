<?php
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
              <h1 class="mb-1 h2 fw-bold">Manage Blog</h1>
            </div>
            <div>
              <!-- <button type="button" class="btn btn-primary btn-sm text-white fw-bold" data-bs-toggle="modal" data-bs-target="#addbadge">Add Blog</button> -->
              <a href="add_blog"  class="btn btn-primary btn-sm text-white fw-bold">Add Blog</a>
            </div>
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
                  <th>No</th>
                  <th>Thumbnail</th>
                  <th>Title</th>  
                  <th>Category</th>                
                  <th>Status</th>
                  <th>Created Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $querybadge = $mysqli->query("select A.blog_id,A.title,A.thumbnail,A.status,A.created_at,A.content,B.name from blogs A join blog_categories B on A.category_id=B.category_id ORDER by created_at desc");
                $num = 1;
                if ($querybadge === false) {
                  echo "Error: " . $mysqli->error;
                } else {
                  while ($row = $querybadge->fetch_assoc()) {
                ?>
                    <tr>
                      <td><?php echo $num++; ?></td>
                      <td><img src="../assets/images/blogs/<?php echo $row["thumbnail"]; ?>" width="80" height="60"></td>
                      <td><?php echo $row['title']; ?></td>
                      <td><?php echo $row['name']; ?></td>

                      <td>
                        <?php
                        $statusText = ($row['status'] == 1) ? 'Publish' : 'Unpublish';
                        $badgeClass = ($row['status'] == 1) ? 'bg-success' : 'bg-danger';
                        ?>
                        <span class="badge rounded-pill lh-0 p-10 fw-bold <?php echo $badgeClass; ?>"><?php echo $statusText; ?></span>
                      </td>
                      <td><?= date("F j, Y, g:i a", strtotime($row['created_at'])) ?></td>
                      <td class="text-center ">
                        <a href="edit_blog.php?blog_id=<?=$row['blog_id']?>" class="btn btn-sm btn-primary text-white" ><i class="fa fa-edit" aria-hidden="true"></i> Edit</a>
                        <a class="btn btn-sm btn-danger" href="blog?delete_blog_field=<?php echo $row['blog_id']; ?>" title="Delete Category Field" onclick="return deleteindField()">
                            <i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                      </td>
                    </tr>                    
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

<script>
    function deleteindField() {
      var x = confirm("Are you sure want to delete this Blog field?");

      if (x == true) {
        return true;
      } else {
        return false;
      }
    }
  
  </script>
</main>
</div>
<?php
include_once 'includes/footer.php';
// $mysqli->close();
?>