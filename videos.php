<?php include 'includes/page-head.php' ?>

<body class="bg-white text-dark">
    <?php include 'includes/page-header.php' ?>
    <div class="wrapper">
        <main class="main-content">
            <!-- Your content here -->
            <div class="container"> 
                <!-- Start of Leader Board -->
                <!-- <div class="leader p-md-5 p-sm-5">
                    <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid mw-100" alt="Card 1">
                </div> -->
                <!--End of Leader Board -->
                <div class="row py-4">
                    <div class="col-md-12 d-flex justify-content-end align-items-end bg-white">
                        <div class="d-flex align-items-center justify-content-end bg-white">
                            <div class="input-group">
                                <input type="text" class="form-control rounded-pill color-search position-relative bg-white" placeholder="Search" id="search-input">
                                <div class="position-absolute end-0 top-50 translate-middle-y">
                                    <span class="input-group-text bg-transparent border-0">
                                        <i class="fa-solid fa-magnifying-glass text-dark"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="">Features</h3>
                <div class="hr-container">
                    <div class="hr-left"></div>
                    <div class="hr-right"></div>
                    <div class="hr-border"></div>
                </div>
                <div class="row mt-3">
                    <?php
                    if (isset($_SESSION['uid'])) {
                        $fetchvideo = "SELECT * FROM `videos` v
                        LEFT JOIN video_categories vc
                        ON v.video_category_id = vc.category_id 
                         ORDER BY v.created_date DESC
                        LIMIT 2";
                        $Resultfetchvideo = $mysqli->query($fetchvideo);

                        while ($fetchvideorow = $Resultfetchvideo->fetch_assoc()) {
                            $categoryIds = $fetchvideorow['video_category_id'];

                    ?>
                            <div class="col-md-6">
                                <div class="card border-0 bg-white text-dark" style="max-height: 300px; overflow: hidden">
                                    <a href="play-video.php?id=<?= $fetchvideorow['video_id'] ?>&category_id=<?= $categoryIds; ?>">
                                        <img src="<?= BASE_URL ?>assets/uploads/video_images/<?= $fetchvideorow['video_thumbnail'] ?>" title="YouTube video" class="img-fluid rounded-3" style="width: 100%;" alt="Thumbnail">
                                    </a>
                                    <div class="row">
                                        <div class="p-3 col-md-7">
                                            <p class="card-title"><?= $fetchvideorow['category_name']; ?>
                                            </p>
                                            <p class="card-text"><?= $fetchvideorow['video_title'] ?></p>

                                        </div>
                                        <div class="col-md-3 col-lg-5 d-flex justify-content-end align-items-center">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(BASE_URL . 'videos.php?video_id=' . $fetchvideorow['video_id']) ?>" class="text-danger  mt-3">
                                                <img src="https://img.icons8.com/fluency/31/null/facebook-new.png" />
                                            </a>
                                            <a href="https://wa.me/?text=<?= urlencode($fetchvideorow['video_title'] . ' - ' . $fetchvideorow['video_description'] . ' - ' . BASE_URL . 'videos.php?video_id=' . $fetchvideorow['video_id']) ?>" class="text-danger  mt-3">
                                                <img src="https://img.icons8.com/color/36/null/whatsapp--v1.png" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } else { ?>

                        <?php

                        $fetchvideo = "SELECT * FROM `videos` v
                        LEFT JOIN video_categories vc
                        ON v.video_category_id = vc.category_id 
                        ORDER BY v.created_date DESC
                        LIMIT 2";
                        $Resultfetchvideo = $mysqli->query($fetchvideo);

                        while ($fetchvideorow = $Resultfetchvideo->fetch_assoc()) {
                            $categoryIds = $fetchvideorow['video_category_id'];

                        ?>
                            <div class="col-md-6" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <div class="card border-0 bg-white text-dark" style="max-height: 300px; overflow: hidden">
                                    <!-- <a href="play-video.php?id=<?= $fetchvideorow['video_id'] ?>&category_id=<?= $categoryIds; ?>"> -->
                                    <img src="<?= BASE_URL ?>assets/uploads/video_images/<?= $fetchvideorow['video_thumbnail'] ?>" title="YouTube video" class="img-fluid rounded-3" style="width: 100%;" alt="Thumbnail">
                                    <!-- </a> -->

                                    <div class="p-3">
                                        <p class="card-title"><?= $fetchvideorow['category_name']; ?>
                                        </p>
                                        <p class="card-text"><?= $fetchvideorow['video_title'] ?></p>
                                    </div>

                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>

                <?php
                // SQL query to select distinct categories
                $categoriesSql = "SELECT DISTINCT `video_category_id`, `category_name` FROM `videos` 
                  JOIN `video_categories` ON `videos`.`video_category_id` = `video_categories`.`category_id`";
                $categoriesResult = $mysqli->query($categoriesSql);
                while ($categoryRow = $categoriesResult->fetch_assoc()) {
                    $categoryId = $categoryRow['video_category_id'];
                    $categoryName = $categoryRow['category_name'];
                    echo '<h3 class="my-3 search">' . $categoryName . '</h3>';
                    echo ' <div class="hr-container search">
                    <div class="hr-left"></div>
                    <div class="hr-right"></div>
                    <div class="hr-border"></div>
                </div>';
                    echo '<div class="row py-3">';
                    // SQL query to select videos within the current category
                    $videosSql = "SELECT `video_id`, `video_title`, `video_description`, `video_thumbnail`, `video_audience_id`, `video_url`, `created_date` 
                  FROM `videos` 
                  WHERE `video_category_id` = $categoryId ";
                    $videosResult = $mysqli->query($videosSql);
                    while ($row = $videosResult->fetch_assoc()) {
                ?>
                        <?php
                        if ($role == 4 || $role == 3 || $role == 2) { ?>
                            <div class="col-md-4 col-lg-3 py-2 search">
                                <div class="cardborder border-0">
                                    <div class="ratio ratio-16x9 zooms" style="height: 260px;"> <!-- Adjust the height value as needed -->
                                        <a href="play-video.php?id=<?= $row['video_id'] ?>&category_id=<?= $categoryId; ?>"><img src="<?= BASE_URL ?>assets/uploads/video_images/<?= $row['video_thumbnail'] ?>" title="YouTube video" class="img-fluid rounded-3" style="width: 100%; height: 100%;" alt="Thumbnail"></a>
                                    </div>
                                    <div class="row py-2">
                                        <div class="p-2 col-md-7">
                                            <p class="card-title"><?= $categoryName ?></p>
                                            <p class="card-text"><?= $row['video_title'] ?></p>
                                        </div>
                                        <div class="col-md-3 col-lg-5 d-flex justify-content-end align-items-center">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(BASE_URL . 'videos.php?video_id=' . $row['video_id']) ?>" class="text-danger  mt-3">
                                                <img src="https://img.icons8.com/fluency/31/null/facebook-new.png" />
                                            </a>
                                            <a href="https://wa.me/?text=<?= urlencode($row['video_title'] . ' - ' . $row['video_description'] . ' - ' . BASE_URL . 'vidoes.php?video_id=' . $row['video_id']) ?>" class="text-danger  mt-3">
                                                <img src="https://img.icons8.com/color/36/null/whatsapp--v1.png" />
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="col-md-3 py-2 search">
                                <div class="cardborder border-0" data-bs-toggle="modal" data-bs-target="#loginModal">
                                    <div class="ratio ratio-16x9 zooms" style="height: 260px;"> <!-- Adjust the height value as needed -->
                                        <img src="<?= BASE_URL ?>assets/uploads/video_images/<?= $row['video_thumbnail'] ?>" title="YouTube video" class="img-fluid rounded-3" style="width: 100%; height: 100%;" alt="Thumbnail">
                                    </div>
                                    <div class="row py-2">
                                        <div class="p-2 col-md-7">
                                            <p class="card-title"><?= $categoryName ?></p>
                                            <p class="card-text"><?= $row['video_title'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                <?php
                    }
                    echo '</div>'; // Close the row for the current category
                }
                ?>
            </div>
            <div class="container-fluid" style="background-image: url('<?= BASE_URL ?>/assets/images/homepage/Contribution_Poster_BG.png'); background-size: cover; background-size: 100% 120%;">
                <div class="container">
                    <div class="row py-4">
                        <div class="col-7 offset-md-5">
                            <h1 class="text-dark">Be a part of MindLoops contributors!</h1>
                            <p class="text-dark">We welcome any contributors to share content and materials relating to education.</p>
                            <p class="ul-heading text-dark">What can you share?</p>
                            <ul class="text-light">
                                <li>Educational and research-based articles (min words 300 to 1,000 words)</li>
                                <li>Educational Comics and Illustrations</li>
                                <li>Educational videos</li>
                                <li>Life and social skills related storylines</li>
                            </ul>
                            <p class="text-dark">Mail your contribution to us at <a href="mailto:creative@edess.asia" class="text-primary">creative@edess.asia</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!--Start of magazine Banner -->
            <!-- <div class="container-fluid p-0">
                <div class="row primary-container" style="background-image: url('<?= BASE_URL ?>/assets/images/homepage/Group 916.png'); background-size: cover; background-position: center;">
                    <div class="col-12">
                        <img src="<?= BASE_URL ?>/assets/images/homepage/Group 916.png" class="img-fluid mx-auto d-block" alt="Banner" style="width:100%">
                    </div>
                </div>
            </div> -->
    </div>
    </main>
    </div>

    <script>
        $(document).ready(function() {
            $("#search-input").on("keyup", function() {
                var searchText = $(this).val().toLowerCase();
                $(".search").each(function() {
                    var cardContent = $(this).text().toLowerCase();
                    if (cardContent.indexOf(searchText) == -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });
        });
    </script>
    <?php include 'includes/page-footer.php' ?>