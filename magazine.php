<?php include 'includes/page-head.php' ?>
<?php include 'includes/page-header.php' ?>
<?php
$isPremium = '';
?>
</head>

<body class="bg-white text-dark">
    <div class="wrapper">
        <main class="main-content"></main>
        <div class="sitecontaint h-100">
            <div class="container-fluid">
                <!-- Start of Leader Board -->
                <div class="container">
                    <div class="row p-md-4 p-sm-3 p-3">
                        <!-- <div class="col-12 leader">
                            <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid" alt="Card 1">
                        </div> -->
                    </div>
                </div>
                <!--End of Leader Board -->

                <!--Start of magazine Banner -->
                <?php
                $queryMagazine = $mysqli->query("SELECT * FROM `magazine` WHERE `status` = 1 ORDER BY `publish_date` DESC LIMIT 1");
                if ($queryMagazine === false) {
                    echo "Error: " . $mysqli->error;
                } else {
                    while ($row = $queryMagazine->fetch_assoc()) {
                ?>
                        <div class="row primary-container p-md-5 p-3">
                            <div class="col-md-6 d-flex justify-content-md-end justify-content-center align-items-center pe-md-5">
                                <?php
                                if ($role == 4 || $role == 3 || $role == 2) { ?>
                                    <a href="flip/index.php?pageNum=1&m_id=<?php echo $row["magazine_id"]; ?>" target="_blank">
                                        <img src="<?= BASE_URL ?>assets/uploads/cover_images/<?php echo $row["cover_image_url"]; ?>" loading="lazy" class="img-fluid" alt="Banner Image" width="400px">
                                    </a>
                                <?php } else { ?>
                                    <img src="<?= BASE_URL ?>assets/uploads/cover_images/<?php echo $row["cover_image_url"]; ?>" loading="lazy" class="img-fluid" alt="Banner Image" width="400px" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <?php } ?>
                            </div>

                            <div class="col-md-6 d-flex justify-content-md-start justify-content-center align-items-center">
                                <div class="ps-md-5">
                                    <p class="fs-5 text-primary fw-normal ls-2">
                                        <?php echo strtoupper(date("F Y", strtotime($row["publish_date"]))); ?>
                                    </p>
                                    <div class="display-4 text-dark fw-bold pb-md-5"><?php echo $row["title"]; ?><br class="d-none d-xl-inline"></div>
                                    <div class="pt-2">
                                        <div class="row">
                                            <div class="col">
                                                <?php
                                                if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                    <form action="functions/download_script.php" onsubmit="downloadMagazine(event,this)" method="post">
                                                        <input type="hidden" name="magazine_id" value="<?php echo $row["magazine_id"]; ?>">
                                                        <input type="hidden" name="uid" value="<?php echo $_SESSION["uid"]; ?>">
                                                        <input type="hidden" name="magazine_path" value="<?php echo $row["magazine_path"]; ?>">
                                                        <div class="col-12">
                                                            <button type="submit" name="download_magazine" class="btn custom-btn rounded-pill px-md-4 py-md-2 fw-bold me-1">Download</button>
                                                            <a class="btn custom-btn rounded-pill px-md-5 py-md-2 fw-bold" href="flip/index.php?pageNum=1&m_id=<?php echo $row["magazine_id"]; ?>" target="_blank">View
                                                            </a>
                                                            <a class="btn custom-btn rounded-pill px-md-5 py-md-2 fw-bold" href="review_page.php?magazine_id=<?php echo $row["magazine_id"]; ?>&uid=<?php echo $_SESSION['uid']; ?>">Review</a>


                                                            <div class="col-md-6 d-flex justify-content-start">
                                                                <!-- Facebook Share Button -->
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(BASE_URL . '/flip/index.php?pageNum=1&m_id=' . $row['magazine_id']) ?>&quote=<?= urlencode("Explore innovation with Mindloops! Read now." . BASE_URL . '/flip/index.php?pageNum=1&m_id=' . $row['magazine_id'] .  " #Mindloops #InnovationJourney #CreativityUnleashed") ?>" class="text-danger <?= $isPremium; ?> mt-3 px-2">
                                                                    <img src="assets/images/social/facebook_a.png" />
                                                                </a>

                                                                <!-- WhatsApp Share Button -->
                                                                <a href="https://wa.me/?text=<?= urlencode("Explore innovation with Mindloops! Read now." . BASE_URL . '/flip/index.php?pageNum=1&m_id=' . $row['magazine_id'] . ' #Mindloops #InnovationJourney #CreativityUnleashed ') ?>" class="text-danger <?= $isPremium; ?> mt-3">
                                                                    <img src="assets/images/social/whatsapp_a.png" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- <a href="assets/uploads/magazine_pdfs/<?php echo $row['magazine_path']; ?>" download>
                                                        <button class="btn custom-btn rounded-pill px-md-5 py-md-2 fw-bold">Download Magazine</button>
                                                    </a> -->
                                                <?php } else { ?>
                                                    <div class="col-md-12">
                                                        <button class="btn custom-btn rounded-pill px-md-4 py-md-2 fw-bold me-1" data-bs-toggle="modal" data-bs-target="#loginModal">Download</button>
                                                        <a class="btn custom-btn rounded-pill px-md-5 py-md-2 fw-bold" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">View
                                                        </a>
                                                    </div>
                                                    <div class="col-md-6 d-flex justify-content-start">
                                                        <!-- Facebook Share Button -->
                                                        <a href="#" class="text-danger mt-3 px-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                            <img src="assets/images/social/facebook_a.png" />
                                                        </a>

                                                        <a href="#" class="text-danger mt-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                            <img src="assets/images/social/whatsapp_a.png" />
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                            </div>

                                        </div>




                                    </div>
                                </div>
                            </div>

                        </div>
                <?php
                    }
                }
                ?>
                <!--End of magazine Banner -->

                <!--Start of magazine 2nd Layer -->

                <!--START of First Accordion -->
                <div class="row p-md-5 p-3">
                    <div class="col-md-2 p-5">
                        <p class="text-dark fs-1 fw-bold" style="font-size: xx-large;">
                            <?php
                            if ($selectedYear = $_GET['year'] ?? date("Y")) {
                                echo $selectedYear;
                            } else {
                                $currentYear = date("Y");
                                echo $currentYear;
                            }
                            ?>
                        </p>
                        <div class="border-start border-5 border-primary col-12">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed text-black fs-5 fw-bolder bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Years
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body bg-white text-dark d-flex justify-content-end align-items-center p-md-5">
                                            <ul class="list-unstyled">
                                                <?php
                                                $yearsQuery = $mysqli->query("SELECT DISTINCT YEAR(publish_date) AS year FROM magazine ORDER BY year DESC");
                                                if ($yearsQuery === false) {
                                                    echo "Error: " . $mysqli->error;
                                                } else {
                                                    while ($yearRow = $yearsQuery->fetch_assoc()) {
                                                        $year = $yearRow['year'];
                                                ?>
                                                        <li><a href="?year=<?php echo $year; ?>" class="text-decoration-none"><?php echo $year; ?></a></li>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END of First Accordion -->

                    <!-- Magazines Display Section -->
                    <div class="col-md-10 p-md-5">
                        <?php
                        if (isset($_GET['year'])) {
                            $selectedYear = $_GET['year'];
                            $queryMagazine = $mysqli->query("SELECT * FROM `magazine` WHERE YEAR(publish_date) = $selectedYear AND `status` = 1 ORDER BY `publish_date` DESC");
                        } else {
                            // Default query without a selected year
                            $queryMagazine = $mysqli->query("SELECT * FROM `magazine` WHERE `status` = 1 ORDER BY `publish_date` DESC");
                        }

                        if ($queryMagazine === false) {
                            echo "Error: " . $mysqli->error;
                        } else {
                            // Reset the layout counter for magazines
                            $layoutCounter = 1;

                            while ($row = $queryMagazine->fetch_assoc()) {
                                // Determine the layout for this row
                                $currentLayout = ($layoutCounter % 2 === 1) ? 'layout1' : 'layout2';

                                // Increment the layout counter
                                $layoutCounter++;

                                // Output the corresponding layout
                                if ($currentLayout === 'layout1') {
                                    // Layout 1
                        ?>


                                    <!--START of Layout 1  -->
                                    <div class="row p-md-5 pb-3">
                                        <div class="col-5 d-flex justify-content-center align-items-center pe-md-5">
                                            <?php
                                            if ($role == 4 || $role == 3 || $role == 2) { ?>

                                                <a href="flip/index.php?pageNum=1&m_id=<?php echo $row["magazine_id"]; ?>" target="_blank">
                                                    <img src="<?= BASE_URL ?>assets/uploads/cover_images/<?php echo $row["cover_image_url"]; ?>" class="img-fluid" alt="Banner Image" loading="lazy" width="300px">
                                                </a>
                                            <?php } else { ?>
                                                <img src="<?= BASE_URL ?>assets/uploads/cover_images/<?php echo $row["cover_image_url"]; ?>" class="img-fluid" alt="Banner Image" loading="lazy" width="300px" data-bs-toggle="modal" data-bs-target="#loginModal">
                                            <?php } ?>
                                        </div>
                                        <div class="col-lg-6 d-flex justify-content-md-start justify-content-center align-items-center">
                                            <div class="ps-md-1">
                                                <p class="text-primary fw-normal ls-2 fs-5">
                                                    <?php echo strtoupper(date("F Y", strtotime($row["publish_date"]))); ?>
                                                </p>
                                                <div class="h1 text-dark fw-bold pb-md-3"><?php echo $row["title"]; ?></div>
                                                <p class="fw-normal text-dark fs-5 ps-2"><?php echo $row["description"]; ?></p>
                                                <div class="pt-2 pb-3">
                                                    <?php if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                        <form action="functions/download_script.php" onsubmit="downloadMagazine(event,this)" method="post">
                                                            <input type="hidden" name="magazine_id" value="<?php echo $row["magazine_id"]; ?>">
                                                            <input type="hidden" name="uid" value="<?php echo $_SESSION["uid"]; ?>">
                                                            <input type="hidden" name="magazine_path" value="<?php echo $row["magazine_path"]; ?>">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <button type="submit" name="download_magazine" class="btn btn-warning btn-sm fw-bold rounded-pill px-lg-4 py-lg-2 px-md-2 py-md-2 me-1">Download</button>
                                                                    <a class="btn btn-warning btn-sm fw-bold rounded-pill px-lg-5 py-lg-2 px-md-2 py-md-2" href="flip/index.php?pageNum=1&m_id=<?php echo $row["magazine_id"]; ?>" target="_blank">View
                                                                    </a>
                                                                    <a class="btn btn-warning btn-sm fw-bold rounded-pill px-lg-5 py-lg-2 px-md-2 py-md-2" href="review_page.php?magazine_id=<?php echo $row["magazine_id"]; ?>&uid=<?php echo $_SESSION['uid']; ?>">Review</a>
                                                                </div>
                                                                <div class="col-md-6 d-flex justify-content-start">
                                                                    <!-- Facebook Share Button -->
                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(BASE_URL . '/flip/index.php?pageNum=1&m_id=' . $row['magazine_id']) ?>&quote=<?= urlencode("Explore innovation with Mindloops! Read now." . BASE_URL . '/flip/index.php?pageNum=1&m_id=' . $row['magazine_id'] .  " #Mindloops #InnovationJourney #CreativityUnleashed") ?>" class="text-danger <?= $isPremium; ?> mt-3 px-2">
                                                                        <img src="assets/images/social/facebook_a.png" />
                                                                    </a>

                                                                    <!-- WhatsApp Share Button -->
                                                                    <a href="https://wa.me/?text=<?= urlencode("Explore innovation with Mindloops! Read now." . BASE_URL . '/flip/index.php?pageNum=1&m_id=' . $row['magazine_id'] . ' #Mindloops #InnovationJourney #CreativityUnleashed ') ?>" class="text-danger <?= $isPremium; ?> mt-3">
                                                                        <img src="assets/images/social/whatsapp_a.png" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    <?php } else { ?>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-3">
                                                                <button class="btn btn-warning btn-sm  fw-bold rounded-pill px-lg-4 py-lg-2 px-md-2 py-md-2 me-1" data-bs-toggle="modal" data-bs-target="#loginModal">Download</button>
                                                                <a class="btn btn-warning btn-sm  fw-bold rounded-pill px-lg-5 py-lg-2 px-md-2 py-md-2" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">View
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 d-flex justify-content-start">
                                                                <!-- Facebook Share Button -->
                                                                <a href="#" class="text-danger mt-3 px-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                                    <img src="assets/images/social/facebook_a.png" />
                                                                </a>

                                                                <a href="#" class="text-danger mt-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                                    <img src="assets/images/social/whatsapp_a.png" />
                                                                </a>
                                                            </div>
                                                        </div>

                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!--END of Layout 1  -->
                                <?php
                                } else {
                                    // Layout 2
                                ?>
                                    <!--START of Layout 2  -->
                                    <div class="row p-md-5">
                                        <div class="col-lg-5 d-flex justify-content-center align-items-center">
                                            <div class="ps-md-1">
                                                <p class="text-primary fw-normal ls-2 fs-5">
                                                    <?php echo strtoupper(date("F Y", strtotime($row["publish_date"]))); ?>
                                                </p>
                                                <div class="h1 text-dark fw-bold pb-md-3"><?php echo $row["title"]; ?></div>
                                                <p class="fw-normal text-dark fs-5 ps-2"><?php echo $row["description"]; ?></p>
                                                <div class="pt-2 pb-3">
                                                    <?php
                                                    if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                        <form action="functions/download_script.php" onsubmit="downloadMagazine(event,this)" method="post">
                                                            <input type="hidden" name="magazine_id" value="<?php echo $row["magazine_id"]; ?>">
                                                            <input type="hidden" name="uid" value="<?php echo $_SESSION["uid"]; ?>">
                                                            <input type="hidden" name="magazine_path" value="<?php echo $row["magazine_path"]; ?>">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="submit" name="download_magazine" class="btn btn-warning btn-sm fw-bold rounded-pill px-lg-4 py-lg-2 px-md-2 py-md-2 me-1">Download</button>

                                                                    <a class="btn btn-warning btn-sm fw-bold rounded-pill px-lg-5 py-lg-2 px-md-2 py-md-2" href="flip/index.php?pageNum=1&m_id=<?php echo $row["magazine_id"]; ?>" target="_blank">View
                                                                    </a>
                                                                    <a class="btn btn-warning btn-sm fw-bold rounded-pill px-lg-5 py-lg-2 px-md-2 py-md-2" href="review_page.php?magazine_id=<?php echo $row["magazine_id"]; ?>&uid=<?php echo $_SESSION['uid']; ?>">Review</a>
                                                                </div>
                                                                <div class="col-md-6 d-flex justify-content-start">
                                                                    <!-- Facebook Share Button -->
                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(BASE_URL . '/flip/index.php?pageNum=1&m_id=' . $row['magazine_id']) ?>&quote=<?= urlencode("Explore innovation with Mindloops! Read now." . BASE_URL . '/flip/index.php?pageNum=1&m_id=' . $row['magazine_id'] .  " #Mindloops #InnovationJourney #CreativityUnleashed") ?>" class="text-danger <?= $isPremium; ?> mt-3 px-2">
                                                                        <img src="assets/images/social/facebook_a.png" />
                                                                    </a>

                                                                    <!-- WhatsApp Share Button -->
                                                                    <a href="https://wa.me/?text=<?= urlencode("Explore innovation with Mindloops! Read now." . BASE_URL . '/flip/index.php?pageNum=1&m_id=' . $row['magazine_id'] . ' #Mindloops #InnovationJourney #CreativityUnleashed ') ?>" class="text-danger <?= $isPremium; ?> mt-3">
                                                                        <img src="assets/images/social/whatsapp_a.png" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </form>



                                                    <?php } else { ?>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-3">
                                                                <button class="btn btn-warning btn-sm fw-bold rounded-pill px-lg-4 py-lg-2 px-md-2 py-md-2 me-1" data-bs-toggle="modal" data-bs-target="#loginModal">Download</button>
                                                                <a class="btn btn-warning btn-sm  fw-bold rounded-pill px-lg-5 py-lg-2 px-md-2 py-md-2" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">View
                                                                </a>
                                                            </div>
                                                            <div class="col-md-6 d-flex justify-content-start">
                                                                <!-- Facebook Share Button -->
                                                                <a href="#" class="text-danger mt-3 px-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                                    <img src="assets/images/social/facebook_a.png" />
                                                                </a>

                                                                <a href="#" class="text-danger mt-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                                                                    <img src="assets/images/social/whatsapp_a.png" />
                                                                </a>
                                                            </div>
                                                        </div>

                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6 d-flex justify-content-md-start justify-content-center align-items-center pe-md-5 pb-3">
                                            <?php
                                            if ($role == 4 || $role == 3 || $role == 2) { ?>
                                                <a href="flip/index.php?pageNum=1&m_id=<?php echo $row["magazine_id"]; ?>" target="_blank">
                                                    <img src="<?= BASE_URL ?>assets/uploads/cover_images/<?php echo $row["cover_image_url"]; ?>" class="img-fluid" loading="lazy" alt="Banner Image" width="300px">
                                                </a>
                                            <?php } else { ?>
                                                <img src="<?= BASE_URL ?>assets/uploads/cover_images/<?php echo $row["cover_image_url"]; ?>" class="img-fluid" loading="lazy" alt="Banner Image" width="300px" data-bs-toggle="modal" data-bs-target="#loginModal">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <!--END of Layout 2  -->
                        <?php
                                }
                            }
                        }
                        ?>

                    </div>
                    <!--END of Magazines Display Section -->
                </div>
                <!--End List of magazine 2nd Layer -->
            </div>
        </div>

        <!-- Start of Leader Board -->
        <div class="container">
            <div class="row p-md-4 p-sm-3 p-3">
                <!-- <div class="col-12 leader">
                    <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid" alt="Card 1">
                </div> -->
            </div>
        </div>
        <!--End of Leader Board -->

    </div>
    <!--End of magazine 2nd Layer -->
    </div>
    </main>
    </div>
    <script>
        const downloadMagazine = (e, obj) => {
            // e.preventDefault();
            e.preventDefault();
            // console.log(obj);
            // return false;

            let formData = new FormData(obj);

            let url = 'functions/download_script.php';

            fetch(url, {
                method: 'POST',
                body: formData
            }).then(data => data.text()).then(data => {
                const pdfUrl = data;
                const downloadLink = document.createElement('a');
                downloadLink.href = pdfUrl;
                downloadLink.download = obj.magazine_path.value;
                downloadLink.click();
            });

            // obj.submit();
        }
    </script>
    <?php include 'includes/page-footer.php' ?>