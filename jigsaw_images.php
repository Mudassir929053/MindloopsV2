<!DOCTYPE html>
<html>

<head>
    <?php include 'includes/page-head.php' ?>
    <style>
        body {
            background-image: url('assets/images/homepage/Asset19.png');
            background-size: 100% 100%;
            background-repeat: no-repeat;
            background-attachment: fixed;
            padding: 0;
            margin: 0;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
            /* Adjust padding as needed */
        }

        .left-btn,
        .right-btn {
            margin: 10px;
        }

        .left-btn img,
        .right-btn img {
            width: 100px;
            /* Adjust the width as needed */
        }

        .zoomable-image {
            transition: transform 0.8s;
        }

        .zoomable-image:hover {
            transform: scale(1.1);
            /* Adjust the scaling factor as needed */
        }

        .glass-background {
            position: relative;
        }

        .glass-background::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.5);
            /* Adjust the background color and opacity as needed */
            z-index: -1;
            border-radius: 0.25rem;
            /* Adjust border radius as needed */
        }

        .card {
            position: relative;
            overflow: hidden;
        }

        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover .card-overlay {
            opacity: 1;
        }
    </style>
</head>

<body class="bg-white text-dark">
    <div class="flex-container">
        <div class="left-btn">
            <a href="loops-next?game=Jigsaw">
                <img src="<?= BASE_URL ?>/assets/images/homepage/Asset61.png" alt="Left Button">
            </a>
        </div>
        <div class="right-btn">
            <img src="<?= BASE_URL ?>/assets/images/homepage/Asset62.png" alt="Right Button">
        </div>
    </div>
    <div class="wrapper text-dark">
        <main class="main-content">
            <div class="container">
                <div class="row py-5">
                    <?php
                    $category_id = $_GET['category_id'];
                    $sql = "SELECT * FROM `jigsaw_image` WHERE ji_c_id = $category_id";
                    $result = $mysqli->query($sql);
                    ?>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <div class="col-lg-3 py-4 d-flex justify-content-center">
                                <div class="card zoomable-image position-relative bg-white text-dark">
                                    <a href="jigsaw_game.php?id=<?= $row['ji_id'] ?>&category_id=<?= $category_id; ?>" class="text-decoration-none">
                                        <img src="<?= BASE_URL ?>assets/uploads/jigsaw_images/<?= $row['ji_image'] ?>" class="card-img-top img-fluid rounded-3" alt="Thumbnail" style="height: 300px; width: 300px">
                                        <div class="card-overlay"></div>
                                        <div class="card-body py-2 rounded-3 text-center">
                                            <h6 class="card-title py-3 ps-2 fw-bold m-0 glass-background text-dark text-uppercase"><?= $row['ji_name'] ?></h6>
                                        </div>
                                    </a>
                                </div>
                            </div>


                    <?php
                        }
                    } else {
                        echo "<h4 class='text-dark ps-3 fw-bold m-0 p-2 glass-background  text-center'>No Images found.</h4>";
                    }
                    ?>
                </div>
            </div>
        </main>
    </div>
    <?php //include 'includes/page-footer.php' ?>
</body>

</html>