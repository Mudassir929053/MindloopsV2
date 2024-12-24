<?php
include('../config/connection.php');
include('function/videos-function.php');
include_once 'includes/head.php';
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

<?php
include_once 'includes/sidebar.php';
?>

<div class="page-container">
  <?php include_once 'includes/header.php'; ?>
  <main class='main-content bgc-grey-100'>
    <div class="container-fluid">
      <?php
      $video_id = $_GET['id'];
      $sql = "SELECT v.`video_id`, v.`video_title`, v.`video_description`, v.`youtube_link`, v.`video_category_id`, v.`video_url`, v.`video_audience_id`, v.`created_date`,
  c.`category_name`, ur.`role`
  FROM `videos` v
  LEFT JOIN `video_categories` c ON v.`video_category_id` = c.`category_id`
  LEFT JOIN `user_role` ur ON v.`video_audience_id` = ur.`id`
  WHERE v.`video_id` = $video_id";
      $result = $mysqli->query($sql);
      ?>
      <?php
      if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $video_url = $row['video_url'];
          $youtube_link = $row['youtube_link'];
          $final = '';

          // Check if it's a YouTube link
          if (!empty($youtube_link)) {
            $data = $youtube_link;
            $final = str_replace('watch?v=', 'embed/', $data);
          }
      ?>
          <h2 style="text-align: center;">View Video</h2>
          <br>
          <div class="row gy-2">
            <!-- <a href="manage-video.php" class="btn btn-warning col-lg-1"><i class="bi bi-arrow-left"></i> Back</a> -->
          </div>
          <div class="container-fluid py-5 card shadow-lg mt-3">
            <div class="row">
              <div class="col-lg-6 px-5">
                <div class="ratio ratio-16x9">
                  <?php
                  if (!empty($final)) {
                    // Display the YouTube video if it's available
                    echo '<iframe src="' . $final . '" frameborder="0" allow="autoplay; encrypted" allowfullscreen></iframe>';
                  } elseif (!empty($video_url)) {
                    // Display the direct video URL if it's available
                    echo '<video controls src="../assets/uploads/uploaded-videos/' . $video_url . '" title="Video" alt="" class="img-fluid mindbooster-img" allowfullscreen></video>';
                  }
                  ?>
                </div>
              </div>
              <div class="col-lg-6 px-5">
                <p><b>Title:</b> <span><?php echo $row['video_title']; ?></span></p>
                <p><b>Description:</b> <span><?php echo $row['video_description']; ?></span></p>
                <p><b>Release Date:</b> <span><?php echo $row['created_date']; ?></span></p>
                <p><b>Audience:</b> <span><?php echo $row['role']; ?></span></p>
                <p><b>Type:</b> <span><?php echo $row['category_name']; ?></span></p>
              </div>
            </div>
          </div>
    </div>
<?php
        }
      } else {
        echo "<p>No videos found.</p>";
      }
?>


</div>
</main>
</div>

<?php
include_once 'includes/footer.php';
?>