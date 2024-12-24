<?php include 'includes/page-head.php' ?>
<style>
    .display-daripada {
        color: black;
        font-size: 45px;
        /* font-family: MADE Tommy Soft; */
        font-weight: 900;
        word-wrap: break-word
    }

    .custom-hr {
        border-color: #0355B0;
        /* Use !important to override Bootstrap styles */

    }

    /* Style for the container */
    .hr-container {
        position: relative;
        width: 100%;
        height: 1.5px;
        /* Set the height of the HR line */
        background-color: lightgray;
        /* Background color for the entire HR line */
    }

    /* Style for the left half */
    .hr-left {
        position: absolute;
        top: 0;
        left: 0;
        width: 50%;
        height: 300%;
        transform: translateY(-50%);
        /* Move the left half left by 50% */
        background-color: #007bff;
        /* Color for the left half */
    }

    .hr-middle {
        position: absolute;
        top: 0;
        left: 42%;
        width: 18%;
        height: 300%;
        transform: translateY(-50%);
        background-color: #007bff;
        /* Color for the middle portion */
    }

    .hr-left1 {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
        background-color: #007bff;
        /* Color for the left half */
    }

    .hr-right {
        position: absolute;
        top: 0;
        right: 0;
        width: 50%;
        height: 100%;
        background-color: #007bff;
        /* Color for the right half */
    }

    .hr-border {
        position: absolute;
        top: 0;
        left: 0;
        width: 3px;
        /* Width of the left border */
        height: 100%;
        background-color: #007bff;
        /* Color of the left border */
    }


    .community-text {
        display: flex;
        flex-direction: column;

    }

    .community-text a {
        text-decoration: none;
        color: #000;
        /* Default text color */
        transition: color 0.3s;
        /* Smooth color transition */
        white-space: nowrap;
        /* Prevent text from wrapping */
    }

    .community-text a:hover {
        color: #0355B0;
        font-size: 16px;
        /* font-family: MADE Tommy Soft; */
        font-weight: 500;
        word-wrap: break-word
            /* Change text color on hover */
    }

    .article-title {
        color: #595959;
        font-size: 16px;
        /* font-family: MADE Tommy Soft; */
        font-weight: 400;
        word-wrap: break-word;
        text-align: justify;
    }

    .article-title1 {
        color: black;
        font-size: 16px;
        /* font-family: MADE Tommy Soft; */
        font-weight: 500;
        word-wrap: break-word
    }

    .article-title2 {
        color: black;
        font-size: 16px;
        /* font-family: MADE Tommy Soft; */
        font-weight: 500;
        word-wrap: break-word
    }

    td {
        padding: 10px;
        background: white;
        color: #111 !important;
    }
</style>

<body class="bg-white text-dark">
    <?php
    $article_id = $_GET['article_id'];
    $category_id = $_GET['category_id'];
    ?>
    <?php include 'includes/page-header.php' ?>
    <div class="wrapper">
        <main class="main-content">
            <!-- <div class="container">
                <div class="leader p-md-5 p-sm-5">
                    <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid mw-100" alt="Card 1">
                </div>
            </div> -->
            <div class="container-fluid">
                <div class="bgimage-article p-0">
                    <div class="container">
                        <div class="m-md-5 p-5">
                            <?php
                            // SQL query to fetch blog details, including category and creator information
                            $sql = "SELECT b.*, bc.*, b.thumbnail AS blog_thumbnail, b.category_id AS blog_category_id, u.full_name AS creator_username FROM blogs b LEFT JOIN blog_categories bc ON bc.category_id = b.category_id LEFT JOIN user_table u ON b.created_by = u.uid
                    WHERE b.blog_id = '$article_id' AND b.status = 1";
                            // Execute the SQL query
                            $result = mysqli_query($mysqli, $sql);
                            // Check if the query execution was successful
                            if ($result) {
                                // Loop through each row of the result set
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Assign fetched data to variables
                                    $blogId = $row['blog_id'];
                                    $title = $row['title'];
                                    $content = $row['content'];
                                    $thumbnail = $row['thumbnail'];
                                    $category = $row['category_id'];
                                    $created_at = $row['published_date'];
                                    $name = $row['name'];
                                    $status = $row['status'];
                                    $creator = $row['published_by'];
                            ?>
                                    <!-- Display the blog category name -->
                                    <div class="mx-3 color-search py-3"><?php echo $name; ?></div>
                                    <div class="d-flex align-items-center">
                                        <!-- Display vertical line image -->
                                        <img src="<?= BASE_URL ?>/assets/images/homepage/verticle-line.png" width="0.9%" style="height: 8vh;" class="img-fluid me-2" alt="Vertical Line Image">
                                        <div>
                                            <!-- Display the blog title -->
                                            <div class="mx-2 display-6 text-dark fw-bolder"><?php echo $title; ?></div>
                                            <!-- Display the creator's name and published date -->
                                            <div class="mx-3 py-1"> by <strong><?php echo $creator; ?></strong>, <?= date('d M Y', strtotime($created_at)) ?></div>
                                            <div class="px-4">
                                                <!-- Share on WhatsApp link -->
                                                <a class='text-decoration-none' href="https://wa.me/?text=Check out this awesome blog: <?= urlencode(BASE_URL . $_SERVER['REQUEST_URI']); ?>" target="_blank">
                                                    <img src="<?= BASE_URL ?>/assets/images/social/whatsapp.png" height="30" title="Share on Whatsapp">
                                                </a>
                                                <!-- Share on Facebook link -->
                                                <a class='text-decoration-none' href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(BASE_URL . $_SERVER['REQUEST_URI']); ?>" target="_blank">
                                                    <img src="<?= BASE_URL ?>/assets/images/social/facebook.png" height="30">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                                // Free the memory associated with the result set
                                mysqli_free_result($result);
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-7 col-sm-12 bg-white text-dark">
                            <p class="community-text  article-title">
                                <?php
                                // SQL query to fetch data from the blogs table for a specific blog
                                $sql = "SELECT * FROM `blogs` WHERE blog_id = '$article_id' AND status = 1";
                                $result = mysqli_query($mysqli, $sql);

                                if ($result) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $blogId = $row['blog_id'];
                                        $title = $row['title'];
                                        $content = $row['content'];
                                        $thumbnail = $row['thumbnail'];
                                        $category = $row['category_id'];
                                        $created_at = $row['published_date'];
                                        $status = $row['status'];
                                ?>
                                        <?php echo html_entity_decode($content); ?>
                                <?php
                                    }
                                    mysqli_free_result($result);
                                }
                                ?>
                            </p><br>
                        </div>
                        <div class="col-md-12 col-sm-12 col-lg-1"></div>
                        <div class="col-md-12 col-sm-12 col-lg-4 py-3 ">

                            <div class="container mx-md-6 ">
                                <div class=" fw-bolder py-1">Related Category</div>
                                <div class="hr-container">
                                    <div class="hr-left"></div>
                                    <div class="hr-right"></div>
                                    <div class="hr-border"></div>
                                </div>
                                <div class="community-text py-3">
                                    <?php
                                    // SQL query to fetch blog categories
                                    $categoryQuery = "SELECT `category_id`, `name`, `thumbnail`, `description`, `status`, `created_by`, `created_at`, `update_date` FROM `blog_categories` WHERE 1";
                                    $categoryResult = mysqli_query($mysqli, $categoryQuery);
                                    while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                                        $categoryId = $categoryRow['category_id'];
                                        $categoryName = $categoryRow['name'];
                                        $categoryThumbnail = $categoryRow['thumbnail'];
                                    ?>
                                        <li class="py-2">
                                            <!-- <a class="" href="blogs?category=<?= $categoryId ?>"> -->
                                            <a class="" href="blogs?category_id=<?= $categoryId; ?>">
                                                <?= $categoryName; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </div>
                                <br>
                                <div class=" fw-bolder py-1">Related Stories</div>
                                <div class="hr-container">
                                    <div class="hr-left"></div>
                                    <div class="hr-right"></div>
                                    <div class="hr-border"></div>
                                </div>
                                <div class="py-3">
                                    <?php
                                    $excludeArticleId = isset($_GET['article_id']) ? $_GET['article_id'] : null;

                                    $category_id = $_GET['category_id'];
                                    if (is_array($category_id)) {
                                        $category_ids = $category_id;
                                    } else {
                                        $category_ids = [$category_id];
                                    }

                                    $blog_results = [];
                                    foreach ($category_ids as $category_id) {
                                        $sql = "SELECT b.blog_id, b.title, b.content, b.thumbnail, b.category_id, b.created_at, b.status, c.name as category_name
            FROM blogs b
            INNER JOIN blog_categories c ON b.category_id = c.category_id
            WHERE b.category_id = '$category_id'";

                                        $result = $mysqli->query($sql);

                                        if ($result && $result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                if ($row['blog_id'] != $excludeArticleId) {
                                                    $blog_results[] = $row; // Exclude the specified article_id
                                                }
                                            }
                                        }
                                    }

                                    $displayLimit = 4; // Number of initial items to display
                                    $counter = 0; // Counter to keep track of displayed items
                                    ?>

                                    <?php
                                    foreach ($blog_results as $row) {
                                        $counter++;
                                        $articleId = $row['blog_id'];
                                        $title = $row['title'];
                                        $content = $row['content'];
                                        $thumbnail = $row['thumbnail'];
                                        $category = $row['category_id'];
                                        $created_at = $row['created_at'];
                                        $status = $row['status'];
                                        $categoryName = $row['category_name'];
                                    ?>
                                        <div class="mb-4 zooms <?php if ($counter > $displayLimit) echo 'hidden'; ?>">
                                            <a href="article?article_id=<?php echo $articleId; ?>&category_id=<?php echo $category; ?>" class="text-decoration-none">
                                                <div class="d-flex justify-content-center align-items-center py-3">
                                                    <img src="<?= BASE_URL ?>assets/images/blogs/<?php echo $thumbnail; ?>" width="100%" style="height: 20vh;" class="img-fluid rounded-3">
                                                </div>
                                            </a>
                                            <div class="text-secondary"><?php echo $categoryName; ?></div>
                                            <div class="fw-bolder"><?php echo $title; ?></div>
                                        </div>
                                    <?php
                                    }

                                    if (empty($blog_results)) {
                                        echo "<p>No blog content found for the specified category(s).</p>";
                                    }
                                    ?>



                                </div>
                                <!-- Add more recommended video cards as needed -->
                                <div class="d-grid d-md-flex justify-content-md-end mt-1 py-5">
                                    <a href="blogs?category_id=<?= $category_id ?>" id="see-more-related-videos">See more</a>
                                </div>
                                <!-- <div class="container d-flex justify-content-center align-items-center">
                                    <div class="py-5" style="width: 79%; max-width: 500px; background-color: #D9D9D9;">
                                        <h3 class="text-center">ADS</h3>
                                        <a href="" class="d-block text-center text-danger">Square banner ads 250px(w) * 250px(h)</a>
                                    </div>
                                </div> -->

                            </div>

                        </div>
                    </div>

                </div>
                <div class="container">
                    <div class="text-center">
                        <h4 class="my-3 fw-bolder">Explore More</h4>
                        <div class="hr-container">
                            <!-- Decorative horizontal line elements -->
                            <div class="hr-left1"></div>
                            <div class="hr-middle"></div>
                            <div class="hr-right"></div>
                            <div class="hr-border"></div>
                        </div>
                    </div>
                    <div class="py-3 text-end">
                        <!-- Link to see more videos -->
                        <a href="videos">See more videos</a>
                    </div>
                    <div class="row justify-content-center py-5">
                        <?php
                        // SQL query to fetch video details along with category and user role information
                        $sql = "SELECT v.`video_id`, v.`video_title`, v.`video_thumbnail`, v.`video_description`, v.`video_category_id`, v.`video_url`, v.`video_audience_id`, v.`created_date`,
                c.`category_name`, ur.`role`  FROM `videos` v
                LEFT JOIN `video_categories` c ON v.`video_category_id` = c.`category_id`
                LEFT JOIN `user_role` ur ON v.`video_audience_id` = ur.`id`";
                        // Execute the SQL query
                        $result = $mysqli->query($sql);
                        // Define the maximum number of videos to display
                        $displayLimit = 3;
                        // Initialize counter for displayed videos
                        $counter = 0;
                        ?>
                        <?php
                        // Check if the query execution was successful and there are results
                        if ($result && $result->num_rows > 0) {
                            // Loop through each row of the result set
                            while ($row = $result->fetch_assoc()) {
                                $counter++;
                        ?>
                                <!-- Display each video in a column, hiding those beyond the display limit -->
                                <div class="col-md-4 col-sm-6 bg-white <?php if ($counter > $displayLimit) echo 'hidden'; ?>">
                                    <!-- Display the video category name -->
                                    <div class="text-secondary"><?= $row['category_name'] ?></div>
                                    <div class="card border-0 py-3">
                                        <!-- Display the video thumbnail image -->
                                        <img src="<?= BASE_URL ?>assets/uploads/video_images/<?= $row['video_thumbnail'] ?>" width="90%" style="height: 25vh;" class="img-fluid rounded-2">
                                        <div class="p-2">
                                            <!-- Display the video title -->
                                            <p class="card-title fw-bold"><?= $row['video_title'] ?></p>
                                            <?php
                                            // Shorten the video description if it exceeds 50 characters
                                            $description = $row['video_description'];
                                            if (strlen($description) > 50) {
                                                $shortened_description = substr($description, 0, 50) . '...';
                                            } else {
                                                $shortened_description = $description;
                                            }
                                            ?>
                                            <!-- Display the shortened video description -->
                                            <p class="card-text"><?= $shortened_description ?></p>
                                            <!-- Placeholder for tag buttons, currently commented out -->
                                            <!--<button class="btn btn-warning me-2 rounded-pill px-3 btn-sm" type="button">Tag 1</button>-->
                                            <!--<button class="btn btn-primary me-2 rounded-pill px-3 btn-sm" type="button">Tag 2</button>-->
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            // Display a message if no videos are found
                            echo "<p>No videos found.</p>";
                        }
                        ?>
                    </div>
                    <!--<div class="leader p-md-5 p-sm-5">-->
                    <!--    <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid mw-100" alt="Card 1">-->
                    <!--</div>-->
                </div>
                </div>
        </main>
    </div>
    <script>
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

        // document.addEventListener("DOMContentLoaded", function() {
        //     // Hide the initially hidden items in the "Related Videos" section
        //     hideHiddenRelatedVideos();

        //     // Toggle visibility of hidden items when "See more videos" in "Related Videos" is clicked
        //     document.querySelector("#see-more-related-videos").addEventListener("click", function(e) {
        //         e.preventDefault();
        //         toggleHiddenRelatedVideos();
        //     });
        // });

        // function hideHiddenRelatedVideos() {
        //     document.querySelectorAll(".hidden").forEach(function(item) {
        //         item.style.display = "none";
        //     });
        // }

        // function toggleHiddenRelatedVideos() {
        //     document.querySelectorAll(".hidden").forEach(function(item) {
        //         item.style.display = item.style.display === "none" ? "block" : "none";
        //     });
        // }
    </script>
</body>
<?php include 'includes/page-footer.php' ?>