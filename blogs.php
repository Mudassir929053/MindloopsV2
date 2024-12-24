<?php include 'includes/page-head.php' ?>

<style>
    .vertical-tabs .nav-link {
        border: 1px solid transparent;
        border-radius: 30px;
        padding: 10px;
        margin-bottom: 5px;
    color: black;
        transition: border-color 0.3s;
    }

    .vertical-tabs .nav-link.active {
        border-color: #007bff;
        border-radius: 30px;
        color: blue;
        /* Add your preferred active tab border color */
    }

    .vertical-tabs .nav-link:hover {
        border-color: #ccc;
        /* Add your preferred hover border color */
    }
</style>

<body class="bg-white text-dark">
    <?php include 'includes/page-header.php' ?>
    <div class="wrapper">
        <main class="main-content">
            <div class="container-fluid">
                <div class="p-0">
                    <div class="container">
                        <div class="m-md-5">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="mx-2 display-6 text-dark fw-bolder">Our Blogs</div>
                                    <div class="mx-3 py-1"> by <strong class="text-danger">MindLoops</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-lg-3">
                            <nav class="vertical-tabs navbar navbar-expand-md">
                                <a class="navbar-toggler border border-0 mb-3 nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#blogTabs" aria-controls="blogTabs" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                    Categories
                                </a>
                                <div class="collapse navbar-collapse" id="blogTabs">
                                    <ul class="nav flex-column" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link <?= isset($_GET['category_id'])?'':'active' ?>" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="<?= isset($_GET['category_id'])?'false':true ?>">
                                                All
                                            </a>
                                        </li>
                                        <?php
                                        // SQL query to fetch blog categories
                                        extract($_GET);
                                        $categoryQuery = "SELECT * FROM `blog_categories` WHERE `status` = 1 ORDER BY `name` ASC;";
                                        $categoryResult = mysqli_query($mysqli, $categoryQuery);
                                        while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                                            $categoryId = $categoryRow['category_id'];
                                            $categoryName = $categoryRow['name'];
                                            $categoryThumbnail = $categoryRow['thumbnail'];
                                            
                                           
                                        ?>
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold <?= $category_id==$categoryId?'active':'' ?>" id="category<?= $categoryId ?>-tab" data-bs-toggle="tab" href="#category<?= $categoryId ?>" role="tab" aria-controls="category<?= $categoryId ?>" data_cat='<?= $category_id ?>' aria-selected="<?= $category_id==$categoryId?'true':'false' ?>">
                                                    <?= $categoryName; ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-md-7 col-lg-9 col-sm-12">
                            <div class="tab-content" id="blogTabContent">
                                <div class="tab-pane fade <?= isset($_GET['category_id'])?'':'show' ?> <?= isset($_GET['category_id'])?'':'active' ?>" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="row">
                                        <?php
                                        // SQL query to fetch data from the blogs table for all blogs
                                        $sql = "SELECT b.*, bc.*, b.thumbnail AS blog_thumbnail, b.category_id AS blog_category_id, u.full_name AS creator_username FROM blogs b LEFT JOIN blog_categories bc ON bc.category_id = b.category_id LEFT JOIN user_table u ON b.created_by = u.uid
                                        WHERE b.status = 1
                                        ORDER BY RAND();                                        
                                        ";
                                        $result = mysqli_query($mysqli, $sql);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $blogId = $row['blog_id'];
                                                $title = $row['title'];
                                                $content = $row['content'];
                                                $thumbnail = $row['blog_thumbnail'];
                                                $creator = $row['published_by'];
                                                $category = $row['category_id'];
                                                $name = $row['name'];
                                                $created_at = $row['published_date'];
                                                $status = $row['status'];
                                        ?>
                                                <div class="col-md-6 col-lg-4 col-sm-12 mb-4 bg-white ">
                                                    <a href="article?article_id=<?php echo $blogId; ?>&category_id=<?php echo $category; ?>" class="card-link" style="text-decoration: none;">
                                                        <div class="card h-100 bg-white border">
                                                            <img src="<?= BASE_URL ?>assets/images/blogs/<?php echo $thumbnail; ?>" loading="lazy" class="card-img-top" alt="Card Image" style="height: 200px; object-fit: cover;">
                                                            <div class="card-body">
                                                                <small class="text-danger-emphasis text-dark  mb-5"><?= $name ?></small>
                                                                <h5 class="card-title text-dark"><?php echo $title; ?></h5>
                                                                <small class="text-primary-emphasis">
                                                                    <?= $creator . ' / ' . date("Y, F j", strtotime($created_at)); ?>
                                                                </small>

                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                        <?php
                                            }
                                            mysqli_free_result($result);
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                // Loop through categories to create tabs for each category
                                $categoryResult = mysqli_query($mysqli, $categoryQuery);
                                while ($categoryRow = mysqli_fetch_assoc($categoryResult)) {
                                    $categoryId = $categoryRow['category_id'];
                                ?>
                                    <div class="tab-pane fade <?= $category_id==$categoryId?'show':'' ?> <?= $category_id==$categoryId?'active':'' ?>" id="category<?= $categoryId ?>" role="tabpanel" aria-labelledby="category<?= $categoryId ?>-tab">
                                        <div class="row">
                                            <?php
                                            // SQL query to fetch data from the blogs table for this category
                                            $sql = "SELECT b.*, bc.*, b.thumbnail AS blog_thumbnail, b.category_id AS blog_category_id, u.full_name AS creator_username FROM blogs b LEFT JOIN blog_categories bc ON bc.category_id = b.category_id LEFT JOIN user_table u ON b.created_by = u.uid
                                            WHERE b.category_id = $categoryId AND b.status = 1
                                            ORDER BY RAND();
                                            ";
                                            $result = mysqli_query($mysqli, $sql);
                                            if ($result) {
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $blogId = $row['blog_id'];
                                                        $title = $row['title'];
                                                        $content = $row['content'];
                                                        $thumbnail = $row['blog_thumbnail'];
                                                        $creator = $row['published_by'];
                                                        $category = $row['category_id'];
                                                        $name = $row['name'];
                                                        $created_at = $row['published_date'];
                                                        $status = $row['status'];
                                            ?>
                                                        <div class="col-md-6 col-lg-4 col-sm-12 mb-4">
                                                            <a href="article?article_id=<?php echo $blogId; ?>&category_id=<?php echo $category; ?>" class="card-link" style="text-decoration: none;">
                                                                <div class="card h-100">
                                                                    <img src="<?= BASE_URL ?>assets/images/blogs/<?php echo $thumbnail; ?>" class="card-img-top" alt="Card Image" style="height: 200px; object-fit: cover;">
                                                                    <div class="card-body">
                                                                        <small class="text-danger-emphasis mb-5"><?= $name ?></small>
                                                                        <h5 class="card-title"><?php echo $title; ?></h5>
                                                                        <small class="text-primary-emphasis">
                                                                            <?= $creator . ' / ' . date("Y, F j", strtotime($created_at)); ?>
                                                                        </small>

                                                                    </div>

                                                                </div>
                                                            </a>
                                                        </div>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <div class="col-md-12 text-center mt-5">
                                                        <div class="alert alert-warning">
                                                            <strong>No results found for this category.</strong>
                                                        </div>
                                                    </div>
                                            <?php
                                                }
                                                // Free the result set
                                                mysqli_free_result($result);
                                            } else {
                                                echo "Error in the SQL query: " . mysqli_error($mysqli);
                                            }
                                            ?>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <?php include 'includes/page-footer.php' ?>
</body>