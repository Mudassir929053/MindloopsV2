<?php include 'includes/page-head.php';
include 'functions/function.php';
?>

<body class="bg-white text-dark">
    <?php include 'includes/page-header.php' ?>
    <?php $video_id = $_GET['id']; ?>
    <div class="wrapper">
        <main class="main-content">
            <!-- Your content here -->
            <div class="container">
                <div class="row">
                    <!-- Left Column: Video Player -->
                    <div class="col-lg-8 mt-4">
                        <?php
                        $sql = "SELECT v.`video_id`, v.`video_title`, v.`video_description`, v.`video_category_id`, v.`video_url`, v.`youtube_link`, v.`video_audience_id`, v.`created_date`,
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
                                $video_id = $row['video_id'];

                        ?>
                                <div style="--aspect-ratio: 16/9;" class="mt-5">
                                    <?php
                                    if (!empty($video_url)) {
                                        // Check if it's a direct video URL
                                        echo '<video controls autoplay src="' . BASE_URL . 'assets/uploads/uploaded-videos/' . $video_url . '" title="Video" class="rounded-3" width="1600" height="900" allowfullscreen></video>';
                                    } elseif (!empty($youtube_link)) {
                                        // Check if it's a YouTube link
                                        $final = str_replace('watch?v=', 'embed/', $youtube_link);
                                        echo '<iframe src="' . $final . '" frameborder="0" allow="autoplay; encrypted" class="rounded-3" allowfullscreen></iframe>';
                                    }
                                    ?>
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <?php
                                    // Your code to retrieve the $video_id

                                    // Query to get the total likes and dislikes for the specified video in a single query
                                    $sql_total_likes_dislikes = "SELECT X.total_likes, Y.total_dislikes
    FROM (
        SELECT video_id, COUNT(*) AS total_likes
        FROM `video_like_dislike`
        WHERE video_id = $video_id AND vld_liked_by IS NOT NULL
    ) AS X
    JOIN (
        SELECT video_id, COUNT(*) AS total_dislikes
        FROM `video_like_dislike`
        WHERE video_id = $video_id AND vld_disliked_by IS NOT NULL
    ) AS Y";

                                    $result_total_likes_dislikes = $mysqli->query($sql_total_likes_dislikes);

                                    if ($result_total_likes_dislikes) {
                                        $row_total_likes_dislikes = $result_total_likes_dislikes->fetch_assoc();

                                        $total_likes = $row_total_likes_dislikes['total_likes'];
                                        $total_dislikes = $row_total_likes_dislikes['total_dislikes'];

                                        // Display the totals in the buttons or anywhere else as needed
                                        echo '<button class="like-button btn btn-primary me-2 rounded-pill" type="button" onclick="likevideo(' . $video_id . ',\'like\')">';
                                        echo '<i class="fa fa-thumbs-up"></i>  <span id="a_likes">' . $total_likes . '</span>';
                                        echo '</button>';

                                        echo '<button class="like-button btn btn-primary me-2 rounded-pill" type="button" onclick="likevideo(' . $video_id . ',\'dislike\')">';
                                        echo '<i class="fa fa-thumbs-down"></i>  <span id="a_dislikes">' . $total_dislikes . '</span>';
                                        echo '</button>';
                                    }
                                    ?>
                                    <button class="btn btn-primary rounded-pill" type="button" data-bs-toggle="modal" data-bs-target="#shareModal">
                                        <i class="fas fa-share"></i> Share
                                    </button>
                                </div>
                                <p class="card-title"><?= $row['category_name'] ?></p>
                                <h3 class="card-text"><?= $row['video_title'] ?></h3>
                                <p class="card-title"><?= $row['video_description'] ?></p>
                                <!-- Share Modal -->
                                <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="shareModalLabel">Share this video</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <!-- Share buttons -->
                                                <button class="btn mb-2" onclick="shareOnFacebook('<?= BASE_URL ?>/uploaded-videos/<?= $row['video_url'] ?>', '<?= $row['video_title'] ?>')"><img src="https://img.icons8.com/fluency/31/null/facebook-new.png" /> Share on Facebook</button><br>
                                                <button class="btn mb-2" onclick="shareOnWhatsApp('<?= BASE_URL ?>/uploaded-videos/<?= $row['video_url'] ?>', '<?= $row['video_title'] ?>')"><img src="https://img.icons8.com/color/33/null/whatsapp--v1.png" /> Share on WhatsApp</button><br>
                                                <button class="btn mb-2" onclick="shareOnInstagram('<?= BASE_URL ?>/uploaded-videos/<?= $row['video_url'] ?>', '<?= $row['video_title'] ?>')">
                                                    <img src="https://img.icons8.com/fluency/31/null/instagram-new.png" /> Share on Instagram
                                                </button>
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
                        <div class="row">
                            <form method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="u_id" value="<?= $_SESSION['uid'] ?>">
                                <input type="hidden" name="video_id" value="<?= $video_id ?>">
                                <div class="col-lg-12 mt-5">
                                    <div class="d-flex flex-column flex-md-row align-items-center">
                                        <?php
                                        $uid = $_SESSION['uid'];
                                        $query = "SELECT `profile_pic` FROM `user_table` WHERE `uid` = $uid";
                                        $result = $mysqli->query($query);

                                        if ($result) {
                                            $row = $result->fetch_assoc();
                                            if ($row) {
                                                $avatar = $row['profile_pic'];
                                                echo '<img src="assets/uploads/avatar/' . $avatar . '" class="img-fluid rounded-circle mb-3 mb-md-0" width="60" alt="Profile Picture">';
                                            }
                                            $result->close();
                                        }
                                        ?>

                                        <input type="text" class="form-control mx-3" id="vc_comment" name="vc_comment" style="border-radius: 9px; background: #F4F4F6;" aria-describedby="emailHelp" placeholder="Write your comment" required>
                                        <!-- Button to Submit Comment -->
                                        <div class="d-grid d-md-flex justify-content-md-end mt-1">
                                            <button class="btn btn-sm btn-primary rounded-pill" type="submit" name="add_video_comment">Comment</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-12">
                            <div class="row py-4">
                                <div class="col-md-1">
                                </div>
                                <?php
                                $uid = $_SESSION['uid'];
                                $query = "SELECT vc.vc_id, vc.video_id, vc.vc_content, vc.created_by, vc.approved_vc, u.profile_pic, u.full_name FROM video_comment vc JOIN user_table u ON vc.created_by = u.uid WHERE vc.video_id = $video_id  ORDER BY vc.created_date DESC";
                                $result = $mysqli->query($query);
                                if ($result) {
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<div class="d-flex align-items-center position-relative">
                                                 <img src="assets/uploads/avatar/' . $row['profile_pic'] . '" alt="Profile Picture" class="rounded-circle" width="50" height="50">
                                                 <div class="mx-3 align-self-center">' . $row['full_name'] . '</div>';

                                            if ($row['created_by'] == $uid) {
                                                echo '<div class="dropdown dropup ml-auto d-flex justify-content-end text-center position-absolute top-0 end-0">
                                                      <button class="btn btn-link" type="button" id="commentDropdown' . $row["vc_id"] . '" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                           <i class="fas fa-ellipsis-v" style="font-size: 15px; color: black;"></i>
                                                       </button>
                                                   <div class="dropdown-menu dropdown-menu-right" aria-labelledby="commentDropdown' . $row["vc_id"] . '">
                                                          <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#videoModalEdit' . $row["vc_id"] . '">
                                                            <span class="rounded-circle bg-white"><i class="fas fa-edit"></i></span> Edit
                                                           </a>
                                                         <a class="dropdown-item" href="play-video?delete_video_comment=' . $row['vc_id'] . '" onclick="return confirm(\'Are you sure you want to delete this comment?\');">
                                                               <span class="rounded-circle bg-white"><i class="fa fa-trash" style="color: red;"></i></span> Delete
                                                         </a>
                                                    </div>
                                              </div>';
                                            }

                                            echo '</div>
                                            <p class="community-text py-2">' . $row['vc_content'] . '</p>';
                                            echo '<hr>';

                                            // Modal for editing the comment
                                            echo '<div class="modal fade" id="videoModalEdit' . $row["vc_id"] . '" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
                                           <div class="modal-dialog modal-dialog-centered">
                                             <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="videoModalLabel">Edit Comment</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                               </div>
                                             <div class="modal-body">
                                               <!-- Your form goes here for editing the comment -->
                                              <form id="editCommentForm' . $row["vc_id"] . '" method="POST" enctype="multipart/form-data">
                                                        <input type="hidden" class="form-control" id="vc_id" name="vc_id" value="' . $row["vc_id"] . '">
                                                       <div class="mb-3">
                                                         <label for "vc_content" class="form-label">Comment</label>
                                                    <textarea class="form-control" id="vc_content" name="vc_content" value="' . $row["vc_content"] . '">' . $row["vc_content"] . '</textarea>
                                                  </div>
                                                        <div class="mb-3">
                                                           <button type="submit" class="btn btn-success" name="update_comment">Edit Comment</button>
                                                        </div>
                                              </form>
                                                       </div>
                                                      </div>
                                                </div>
                                                </div>';
                                        }
                                        $result->close();
                                    } else {
                                        echo '<p>No comments</p>';
                                    }
                                } else {
                                    echo "Error in the SQL query: " . $mysqli->error;
                                }
                                ?>


                            </div>
                        </div>
                    </div>
                    <!-- Right Column: Recommended Videos -->
                    <div class="col-lg-4 col-md-12 mt-4">
                        <h3>Related Videos</h3>
                        <div class="hr-container">
                            <div class="hr-left"></div>
                            <div class="hr-right"></div>
                            <div class="hr-border"></div>
                        </div>
                        <!-- Sample recommended video cards -->
                        <div class="card mb-3 border-0 mb-5 py-3">
                            <div class="row g-0">
                                <?php
                                $sql = "SELECT v.`video_id`, v.`video_title`, v.`video_thumbnail`, v.`video_description`, v.`video_category_id`, v.`video_url`, v.`video_audience_id`, v.`created_date`,
                                 c.`category_name`, ur.`role`  FROM `videos` v
                                 LEFT JOIN `video_categories` c ON v.`video_category_id` = c.`category_id`
                                 LEFT JOIN `user_role` ur ON v.`video_audience_id` = ur.`id`";
                                $result = $mysqli->query($sql);
                                $result = $mysqli->query($sql);
                                $displayLimit = 5; // Number of initial items to display
                                $counter = 0; // Counter to keep track of displayed items
                                ?>
                                <?php
                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $counter++;
                                ?>
                                        <div class="col-md-5 mb-4 zooms <?php if ($counter > $displayLimit) echo 'hidden'; ?>">
                                            <!-- Video Thumbnail linked to play-video.php -->
                                            <a href="play-video.php?id=<?= $row['video_id'] ?>">
                                                <img src="<?= BASE_URL ?>assets/uploads/video_images/<?= $row['video_thumbnail'] ?>" title="YouTube video" class="img-fluid rounded-3 thumbnail-image" style="width: 100%; height: 140px;" alt="Thumbnail">
                                            </a>
                                        </div>
                                        <div class="col-md-7 <?php if ($counter > $displayLimit) echo 'hidden'; ?>">
                                            <div class="card-body">
                                                <!-- Video Title and Description -->
                                                <a href="play-video.php?id=<?= $row['video_id'] ?>" class="text-decoration-none text-dark">
                                                    <p class="card-title"><?= $row['category_name'] ?></p>
                                                    <p class="card-text videos-title"><?= $row['video_title'] ?></p>
                                                </a>
                                            </div>
                                        </div>
                                <?php
                                    }
                                } else {
                                    echo "<p>No videos found.</p>";
                                }
                                ?>
                            </div>
                        </div>
                        <!-- Add more recommended video cards as needed -->
                        <div class="d-grid d-md-flex justify-content-md-end mt-1">
                            <a href="#" id="see-more-related-videos">See more videos</a>
                        </div>
                        <!-- Placeholder for ads or other content -->
                        <div class="col-md-8 mt-3 py-5">
                            <div class="container d-flex justify-content-center align-items-center">
                                <div class="py-5" style="width: 79%; max-width: 500px; background-color: #D9D9D9;">
                                    <h3 class="text-center">ADS</h3>
                                    <a href="#" class="d-block text-center text-danger">Square banner ads 250px(w) * 250px(h)</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container py-4">
                <div class="text-center">
                    <h4 class="my-3 fw-bolder">Explore More</h4>
                    <div class="hr-container">
                        <div class="hr-left1"></div>
                        <div class="hr-middle"></div>
                        <div class="hr-right"></div>
                        <div class="hr-border"></div>
                    </div>
                </div>
                <div class="py-3 text-end">
                    <a href="#" class="see-more-link" id="see-more-related-videos">See more videos</a>
                </div>
                <div class="row mb-4 py-3">
                    <?php
                    $sql = "SELECT v.`video_id`, v.`video_title`, v.`video_thumbnail`, v.`video_description`, v.`video_category_id`, v.`video_url`, v.`video_audience_id`, v.`created_date`, c.`category_name`, ur.`role` FROM `videos` v
                    LEFT JOIN `video_categories` c ON v.`video_category_id` = c.`category_id`
                    LEFT JOIN `user_role` ur ON v.`video_audience_id` = ur.`id`";
                    $result = $mysqli->query($sql);
                    $displayLimit = 3; // Number of initial items to display
                    $counter = 0; // Counter to keep track of displayed items
                    ?>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $counter++;
                    ?>
                            <!-- Start a new row for each set of cards -->
                            <div class="col-md-6 col-lg-4 py-3 <?php if ($counter > $displayLimit) echo 'hidden'; ?>">
                                <div class="card border-0">
                                    <p class="card-title"><?= $row['category_name'] ?></p>
                                    <div class="ratio ratio-16x9" style="height: 310px;"> <!-- Adjust the height value as needed -->
                                        <a href="play-video.php?id=<?= $row['video_id'] ?>" class="zooms">
                                            <img src="<?= BASE_URL ?>assets/uploads/video_images/<?= $row['video_thumbnail'] ?>" title="YouTube video" class="img-fluid rounded-3" style="width: 100%; height: 100%;" alt="Thumbnail">
                                        </a>
                                    </div>
                                    <div class="p-2">
                                        <h6 class="fw-bolder"><?= $row['video_title'] ?></h6>
                                        <p class="card-text"><?= $row['video_description'] ?></p>
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
                <!-- Start of Leader Board -->
                <div class="leader p-md-5 p-sm-5">
                    <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid mw-100" alt="Card 1">
                </div>
            </div>



        </main>
    </div>
    <script>
        function deleteindField() {
            var x = confirm("Are you sure want to delete this comment?");

            if (x == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>


    <script>
        const likevideo = (id, action) => {
            let url = 'like_video.php?likevideo=yes&video_id=' + id + '&action=' + action;
            fetch(url).then(data => data.text()).then(data => {
                let arr_likes = data.split('#');
                console.log(data);
                document.getElementById('a_likes').innerHTML = arr_likes[0];
                document.getElementById('a_dislikes').innerHTML = arr_likes[1];
            });
        }
    </script>


    <script>
        // Function to share on Instagram
        function shareOnInstagram(videoUrl, videoTitle) {
            // Construct the Instagram URL with the video URL
            var instagramUrl = 'https://www.instagram.com/create/campaign/?source_url=' + encodeURIComponent(videoUrl);

            // Open Instagram's create campaign page
            window.open(instagramUrl, 'Share on Instagram', 'width=600,height=400');
        }

        // Function to share on Twitter
        function shareOnTwitter(videoUrl, videoTitle) {
            var twitterUrl = 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(videoTitle + ' - ' + videoUrl);
            window.open(twitterUrl, 'Share on Twitter', 'width=600,height=400');
        }

        // Function to share on Facebook
        function shareOnFacebook(videoUrl, videoTitle) {
            var facebookUrl = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(videoUrl);
            window.open(facebookUrl, 'Share on Facebook', 'width=600,height=400');
        }

        // Function to share on WhatsApp
        function shareOnWhatsApp(videoUrl, videoTitle) {
            var whatsappUrl = 'https://wa.me/?text=' + encodeURIComponent(videoTitle + ' - ' + videoUrl);
            window.open(whatsappUrl, 'Share on WhatsApp', 'width=600,height=400');
        }



        document.addEventListener("DOMContentLoaded", function() {
            // Hide the initially hidden items
            hideHiddenItems();

            // Toggle visibility of hidden items when "See more" is clicked
            document.querySelector(".see-more-link").addEventListener("click", function(e) {
                e.preventDefault();
                toggleHiddenItems();
            });
        });

        function hideHiddenItems() {
            document.querySelectorAll(".hidden").forEach(function(item) {
                item.style.display = "none";
            });
        }

        function toggleHiddenItems() {
            document.querySelectorAll(".hidden").forEach(function(item) {
                item.style.display = item.style.display === "none" ? "block" : "none";
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Hide the initially hidden items in the "Related Videos" section
            hideHiddenRelatedVideos();

            // Toggle visibility of hidden items when "See more videos" in "Related Videos" is clicked
            document.querySelector("#see-more-related-videos").addEventListener("click", function(e) {
                e.preventDefault();
                toggleHiddenRelatedVideos();
            });
        });

        function hideHiddenRelatedVideos() {
            document.querySelectorAll(".hidden").forEach(function(item) {
                item.style.display = "none";
            });
        }

        function toggleHiddenRelatedVideos() {
            document.querySelectorAll(".hidden").forEach(function(item) {
                item.style.display = item.style.display === "none" ? "block" : "none";
            });
        }
    </script>
    <script>
        // Replace 'video_id' with the actual video ID
        var videoId = 'video_id';

        var videoElement = document.querySelector('video'); // or select the video element using other means
        var viewed = false; // to prevent duplicate views

        videoElement.addEventListener('play', function() {
            if (!viewed) {
                viewed = true;
                recordVideoView(videoId);
            }
        });

        function recordVideoView(videoId) {
            // Send an AJAX request to your PHP script to record the view
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'functions/function.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // View recorded
                }
            };
            xhr.send('video_id=' + videoId);
        }
    </script>

    <?php include 'includes/page-footer.php' ?>