<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Title</title>
    <style>
        .text-section {
            position: absolute;
            top: 10%;
            left: 25%;
        }

        .image-section {
            position: absolute;
            bottom: 10%;
            right: 30%;
            height: 50%; /* Adjust the height as needed */
        }

        /* Style for the heading to ensure it stays in one line */
        .text-section h1 {
            font-size: 2rem;
            max-width: 90%; /* Adjust as needed */
            white-space: nowrap;
            /* overflow: hidden;
            text-overflow: ellipsis; */
        }

        /* Ensure images are responsive */
        .img-fluid {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 1440px) {
            .text-section {
                left: 20%; /* Adjust as needed */
            }
            .image-section {
                right: 25%; /* Adjust as needed */
            }
        }
    </style>

    <!-- Add your CSS and other head elements here -->
    <?php include 'includes/page-head.php' ?>
</head>
<body>
<div class="wrapper bg-white text-dark">
        <main class="main-content">
            <!-- Your content here -->
            <div class="container-fluid bgimage-Rectangle position-relative">
                <?php include 'includes/page-header.php' ?>
                <div class="row px-md-5 py-md-5 justify-content-center align-items-center">
                    <!-- Background Image -->
                    <div class="col-md-12 text-center position-relative">
                        <img class="img-fluid" src="assets/images/memberclub/bgwhite.png" alt="">
                        <!-- Text and Image inside bgwhite.png -->
                        <div class="text-section row">
                            <!-- Left Section: Text -->
                            <div class="col-md-8 pl-10">
                                <div class="mt-5"> 
                                    <div>
                                        <h1 class="fw-bolder">This is a sample title</h1>
                                        <ul>
                                            <li>This is a sample description about your product</li>
                                            <li>Location</li>
                                        </ul>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-warning rounded-pill mt-3">Redeem Code</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Right Section: Image -->
                            <div class="col-md-4">
                                <img class="img-fluid" src="assets/images/memberclub/Frame714-5.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Second Section -->
            <div class="container-fluid">
                <div class="row px-5 py-5 align-items-center">
                    <!-- Left Section: Text -->
                    <div class="col-md-6">
                        <div class="mt-5 pl-10"> <!-- Added text-white for better visibility -->
                            <h2><strong>Terms and Conditions</strong></h2>
                            <p>This is a sample of T&C</p>
                            <ul>
                                <li>Sample of T&C</li>
                                <li>Sample of T&C</li>
                                <li>Sample of T&C</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

                            <!-- Third  Section -->

            <div class="container-fluid">

            </div>
    
        </main>
    </div>
    <?php include 'includes/page-footer.php' ?>
</body>
</html>
