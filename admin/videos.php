<?php
include('../config/connection.php');
include('function/videos-function.php');
include_once 'includes/head.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<?php
include_once 'includes/sidebar.php';
?>
<!-- #Main ============================ -->
<div class="page-container">
  <?php include_once 'includes/header.php'; ?>
  <main class='main-content bgc-grey-100'>
    <div class="container-fluid"> <!-- START Of Magazine Header  -->
      <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
          <!-- Page Header -->
          <div class="border-bottom pb-4 mb-4 d-md-flex align-items-center justify-content-between">
            <div class="mb-3 mb-md-0">
              <h1 class="mb-1 h2 fw-bold">Videos</h1>
            </div>
            <div>
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#videoModal">
                Add Video
              </button>
            </div>
          </div>
        </div>
        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Create a Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <!-- Your form goes here -->
                <form id="insertVideoForm" action="" method="POST" enctype='multipart/form-data'>
                  <div class="mb-3">
                    <label for="v_audience" class="form-label"><b>Video Audience</b></label>
                    <select class="form-select" required id="v_audience" name="v_audience_id">
                      <option value="">Select Video Audience</option>
                      <?php
                      $allowedRoles = ['teacher', 'student', 'parent'];
                      $sql = "SELECT `id`, `role` FROM `user_role` WHERE `role` IN ('" . implode("','", $allowedRoles) . "')";
                      $result = $mysqli->query($sql);
                      while ($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['role'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="v_type" class="form-label"><b>Video Category</b></label>
                    <select class="form-select" required id="v_type" name="v_category_id">
                      <option value="">Select Video Type</option>
                      <?php
                      $sql = "SELECT `category_id`, `category_name` FROM `video_categories`";
                      $result = $mysqli->query($sql);
                      while ($row = $result->fetch_assoc()) {
                        $categoryName = $row['category_name'];
                        echo '<option value="' . $row['category_id'] . '" name="' . $row['category_id'] . '">' . $categoryName . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="v_title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="v_title" name="v_title" placeholder="How to tie your shoelaces" required>
                  </div>
                  <div class="mb-3">
                    <label for="v_desc" class="form-label">Description (less than 1000 characters.)</label>
                    <textarea class="form-control" id="v_desc" name="v_desc" placeholder="This is the video description..." maxlength="1000"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="videoOption" class="form-label">Choose Video Source</label>
                    <select class="form-select" id="videoOption" name="v_path_option" required>
                      <option value="upload">Upload Video</option>
                      <option value="link">Paste Video Link</option>
                    </select>
                  </div>
                  <div class="mb-3" id="uploadVideoDiv">
                    <label for="v_path" class="form-label">Upload Video</label>
                    <input type="file" class="form-control" id="v_path" name="v_path" accept="video/*">
                  </div>
                  <div class="mb-3" id="pasteVideoLinkDiv" style="display: none;">
                    <label for="v_link" class="form-label">Paste Video Link</label>
                    <input type="text" class="form-control" id="v_link" name="v_link">
                  </div>
                  <div class="mb-3">
                    <label for="v_Thumbnail" class="form-label">Video Thumbnail</label>
                    <input type="file" class="form-control" id="v_Thumbnail" name="v_Thumbnail" accept="image/*" required>
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-success" name="add_video">Save Video</button>
                    <button type="reset" class="btn btn-secondary">Clear</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        
        <div class="modal fade" id="videoModal_edit" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="videoModalLabel">Edit Video</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form id="editVideoForm" method="POST" action="" enctype='multipart/form-data'>
                  <input type="hidden" class="form-control" id="videos_id" name="videos_id" value="">
                  <div class="mb-3">
                    <label for="v_audience" class="form-label">Video Audience</label>
                    <div class="mb-3">
                      <select class="form-select" aria-label="Default select example" id="v_audience" name="video_audience_id">
                        <option value="">Select Video Audience</option>
                        <?php
                        // Define an array of role names you want to include
                        $allowedRoles = ['parent', 'student', 'teacher'];                            // Query roles from the database
                        $roleSql = "SELECT `id`, `role` FROM `user_role` WHERE `role` IN ('" . implode("','", $allowedRoles) . "')";
                        $roleResult = $mysqli->query($roleSql);
                        if ($roleResult && $roleResult->num_rows > 0) {
                          while ($roleRow = $roleResult->fetch_assoc()) {
                            $roleId = $roleRow['id'];
                            $roleName = $roleRow['role'];
                            $isSelected = '';
                            echo '<option value="' . $roleId . '" ' . $isSelected . '>' . $roleName . '</option>';
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="v_type" class="form-label">Video Category</label>
                    <select class="form-select" required id="v_type" name="video_category_id">
                      <option value="">Select Video Category</option>
                      <?php
                      $categorySql = "SELECT `category_id`, `category_name` FROM `video_categories`";
                      $categoryResult = $mysqli->query($categorySql);
                      if ($categoryResult && $categoryResult->num_rows > 0) {
                        while ($categoryRow = $categoryResult->fetch_assoc()) {
                          $categoryId = $categoryRow['category_id'];
                          $categoryName = $categoryRow['category_name'];
                          $isSelected = '';
                          echo '<option value="' . $categoryId . '" ' . $isSelected . '>' . $categoryName . '</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="v_title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="v_title" name="v_title" value="">
                  </div>
                  <div class="mb-3">
                    <label for="v_desc" class="form-label">Description (less than 1000 characters.)</label>
                    <textarea class="form-control" id="v_desc1" name="v_desc" placeholder="This is the video description..." maxlength="1000"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="videoOption" class="form-label">Choose Video Source</label>
                    <select class="form-select" id="videoOptionEdit" name="v_path_option" required>
                      <option value="uploadEdit">Upload Video</option>
                      <option value="linkEdit">Paste Video Link</option>
                    </select>
                  </div>
                  <div class="mb-3" id="uploadVideoDivEdit">
                    <label for="v_path" class="form-label">Upload Video</label>
                    <input type="file" class="form-control" id="v_path" name="v_path" accept="video/*">
                  </div>
                  <div class="mb-3" id="pasteVideoLinkDivEdit" style="display: none;">
                    <label for="v_link" class="form-label">Paste Video Link</label>
                    <input type="text" class="form-control" id="v_link" name="v_link">
                  </div>
                  <div class="mb-3">
                    <label for="v_Thumbnail" class="form-label">Video Thumbnail</label>
                    <input type="file" class="form-control" id="v_Thumbnail1" name="v_Thumbnail" accept="image/*" value="">
                  </div>
                  <div class="mb-3">
                    <button type="submit" class="btn btn-success" name="update-video">Edit Video</button>
                    <button type="reset" class="btn btn-secondary">Clear</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="bgc-white bd bdrs-3 p-20 mB-20">
            <div class="data_table table-responsive">
              <table id="dataTable" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                <thead class="table-primary">
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Category</th>
                    <th>Audience</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <?php
                $sql = "SELECT v.`video_id`, v.`video_title`, v.`video_description`, v.`video_category_id`, v.`video_audience_id`, v.`updated_date`, v.`created_date`,
            c.`category_name`, ur.`role`
            FROM `videos` v
            LEFT JOIN `video_categories` c ON v.`video_category_id` = c.`category_id`
            LEFT JOIN `user_role` ur ON v.`video_audience_id` = ur.`id`";
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
                      echo "<td>" . $row["video_title"] . "</td>";
                      echo '<td class="wide">' . strip_tags(substr($row["video_description"], 0, 50)) . '...';
                      echo '<button type="button" class="btn btn-sm btn-gradient-05" data-bs-toggle="modal" data-bs-target="#modalView' . $row["video_id"] . '">';
                      echo '<span style="color: skyblue;">Read More</span>';
                      echo '</button>';
                      echo '</td>';
                      echo '<td>';

                      if (!empty($row['updated_date'])) {
                        echo ' ' . date("F j, Y, g:i a", strtotime($row['updated_date']));
                      } else {
                        echo '' . date("F j, Y, g:i a", strtotime($row['created_date']));
                      }
                      echo '</td>';
                      echo "<td>" . $row["category_name"] . "</td>";
                      echo "<td>" . $row["role"] . "</td>";
                      echo "<td>";
                      echo "<a href='view-videos.php?id=" . $row["video_id"] . "'><i class='fas fa-eye' style='color: green;'></i></a>&nbsp; ";
                      echo "<a href='#' data-bs-toggle='modal' data-user-details='" . json_encode($row) . "' onclick='fetchUserData(this)' data-bs-target='#videoModal_edit'><i class='fas fa-edit'></i></a>&nbsp;";
                      echo '<a  href="videos?delete_video=' . $row['video_id'] . '" title="Delete category Field"  onclick="return deleteindField()">';
                      echo '<i class="fa fa-trash" style="color: red;" aria-hidden="true"></i></a>';
                      echo "</td>";
                      echo "</tr>";
                      echo '<div class="modal fade" id="modalView' . $row["video_id"] . '" tabindex="-1" role="dialog" aria-labelledby="videoDesc" aria-hidden="true">';
                      echo '<div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">';
                      echo '<div class="modal-content">';
                      echo '<div class="modal-header bg-primary text-white">';
                      echo '<h4 class="modal-title">Video Description</h4>';
                      echo '<button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>';
                      echo '</div>';
                      echo '<div class="modal-body">';
                      echo '<p class="text-justify text-dark">' . $row["video_description"] . '</p>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
                      echo '</div>';
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
    </div>
  </main>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<script>
let editor;
 ClassicEditor
        .create( document.querySelector( '#v_desc1' ) )
        .then( newEditor => {
        editor = newEditor;
        // editor.setData
      } )
        .catch( error => {
            console.error( error );
        } );


 ClassicEditor
        .create( document.querySelector( '#v_desc' ) )
        .catch( error => {
            console.error( error );
        } );
        
  function deleteindField() {
    var x = confirm("Are you sure want to delete this Video field?");

    if (x == true) {
      return true;
    } else {
      return false;
    }
  }
  const videoOption = document.getElementById("videoOption");
  const uploadVideoDiv = document.getElementById("uploadVideoDiv");
  const pasteVideoLinkDiv = document.getElementById("pasteVideoLinkDiv");
  videoOption.addEventListener("change", function() {
    if (videoOption.value === "upload") {
      uploadVideoDiv.style.display = "block";
      pasteVideoLinkDiv.style.display = "none";
    } else if (videoOption.value === "link") {
      uploadVideoDiv.style.display = "none";
      pasteVideoLinkDiv.style.display = "block";
    }
  });

  const videoOptionEdit = document.getElementById("videoOptionEdit");
  const uploadVideoDivEdit = document.getElementById("uploadVideoDivEdit");
  const pasteVideoLinkDivEdit = document.getElementById("pasteVideoLinkDivEdit");
  videoOptionEdit.addEventListener("change", function() {
    if (videoOptionEdit.value === "uploadEdit") {
      uploadVideoDivEdit.style.display = "block";
      pasteVideoLinkDivEdit.style.display = "none";
    } else if (videoOptionEdit.value === "linkEdit") {
      uploadVideoDivEdit.style.display = "none";
      pasteVideoLinkDivEdit.style.display = "block";
    }
  });

</script>
<script>
 const fetchUserData = (obj) => {
    let user_data = JSON.parse(obj.getAttribute('data-user-details'));
    console.log(editor);
    let user_form = document.getElementById('editVideoForm');
    // console.log(user_form);
    user_form.videos_id.value = user_data.video_id;
    user_form.video_audience_id.value = user_data.video_audience_id;
    user_form.video_category_id.value = user_data.video_category_id;
    user_form.v_title.value = user_data.video_title;
    // editor = CKEDITOR.instances['editor'];
    editor.setData(user_data.video_description);
    // user_form.v_path.value = user_data.video_url;
    // user_form.v_Thumbnail.value = user_data.video_thumbnail;
  }
</script>
<?php
include_once 'includes/footer.php';
?>