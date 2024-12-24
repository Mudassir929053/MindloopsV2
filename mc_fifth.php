<?php include 'includes/page-head.php' ?>
<style>
    /* Remove the border from the cards */
    .card {
        border: none;
        border-radius: 0;
        /* Optional: This removes the border-radius if you want */
        /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); Add a box shadow for a nice effect */
        border-bottom: none;
        box-shadow: none;
    }

    .card {
        position: relative;
    }

    .see-profile {
        position: absolute;
        top: 62%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(244, 175, 0, 0.4);
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
        color: #000000;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        width: 100%;
        text-align: center;
        text-decoration: none;
        transition: transform 0.4s ease-in-out, opacity 0.4s ease-in-out;
    }

    .card:hover .see-profile {
        transform: translate(-50%, 70%);
        /* Slide the button to the left */
        opacity: 1;
    }
</style>

<div class="wrapper bg-white text-dark">
    <?php include 'includes/page-header.php' ?>
    <div class="mt-5"></div>
    <main class="main-content">
        <!-- Your content here -->
        <div class="container justify-content-center align-items-center">
            <div class="row mb-2 justify-content-center align-items-center">
                <div class="col-md-3 justify-content-center align-items-center">
                    <!-- First column containing the image -->
                    <img src="<?= BASE_URL ?>/assets/images/memberclub/Maskgroup723.png" alt="Image" class="img-fluid">
                </div>
                <div class="offset-md-1 col-md-8">
                    <div class="row justify-content-center align-items-center mb-3 mb-md-0">
                        <!-- First row -->
                        <div class="col-md-14 mt-4">
                            <h2 class="fw-bold">Miss Nabila Hashim</h2>
                            <a href="#" class="btn btn-sm bg-primary rounded-pill" style="font-size: 9px; padding: 1px 4px;">Darjah 4</a>
                            <a href="#" class="btn btn-sm bg-primary rounded-pill" style="font-size: 9px; padding: 1px 4px;">Matematik</a>
                            <a href="#" class="btn btn-sm bg-primary rounded-pill" style="font-size: 9px; padding: 1px 4px;">Johor bahru</a>
                            <a href="#" class="btn btn-sm bg-primary rounded-pill" style="font-size: 9px; padding: 1px 4px;">RM 108/ session</a>
                        </div>
                        <!-- Second row -->
                        <div class="col-md-12 mt-5">
                            <p style="line-break: anywhere;">This is a sample description about your product/service. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <!-- Third row -->
                        <div class="col-md-12 mt-4 text-end">
                            <a href="#" class="btn btn-warning rounded-pill">Register Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    




        
            <!-- second section -->
            <div class="container-fluid mt-1 bg-white">
                <div class="row px-5 pb-5 mb-5 align-items-center" style="margin-top: 50px; margin-left:100px;">
                    <!-- Left Section: Text -->
                    <div class="col-md-6">
                        <div class="mt-3 mb-5 pb-5"> <!-- Added text-white for better visibility -->
                            <h2><strong>Terms and Conditions</strong></h2>
                            <p style="padding-left:30px">This is a sample of T&C</p>
                            <ul style="padding-left:75px">
                                <li>Sample of T&C</li>
                                <li>Sample of T&C</li>
                                <li>Sample of T&C</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid MlSysSurfaceContainerLow">
                <h2 class="p-md-5 mt-md-5 text-center">Explore other Tutors</h2>
                <div class="container">
                    <div class="container">
                        <div class="row g-3 mb-2">
                            <div class="col-md-3">
                                <div class="card bg-white  text-dark">
                                    <img src="<?= BASE_URL ?>/assets/images/memberclub/Maskgroup723.png" class="card-img-top" alt="...">
                                    <a href="#" class="see-profile">See Profile</a>
                                    <div class="card-body justify-content-between">
                                        <h3 class="fw-bold" style="color: #00308D;">This is a sample title
                                        </h3>
                                        <p class="card-text">This is a short description of your service</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-white  text-dark">
                                    <img src="<?= BASE_URL ?>/assets/images/memberclub/group_1037.png" class="card-img-top" alt="...">
                                    <a href="#" class="see-profile">See Profile</a>
                                    <div class="card-body justify-content-between">
                                        <h3 class="fw-bold" style="color: #00308D;">This is a sample title
                                        </h3>
                                        <p class="card-text">This is a short description of your service</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-white  text-dark">
                                    <img src="<?= BASE_URL ?>/assets/images/memberclub/group_1038.png" class="card-img-top" alt="...">
                                    <a href="#" class="see-profile">See Profile</a>
                                    <div class="card-body justify-content-between">
                                        <h3 class="fw-bold" style="color: #00308D;">This is a sample title
                                        </h3>
                                        <p class="card-text">This is a short description of your service</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card bg-white  text-dark">
                                    <img src="<?= BASE_URL ?>/assets/images/memberclub/group_1039.png" class="card-img-top" alt="...">
                                    <a href="#" class="see-profile">See Profile</a>
                                    <div class="card-body justify-content-between">
                                        <h3 class="fw-bold" style="color: #00308D;">This is a sample title
                                        </h3>
                                        <p class="card-text">This is a short description of your service</p>

                                    </div>
                                </div>
                            </div>

                        </div>




                        </main>
                    </div>
    </main>
</div>
        <?php include 'includes/page-footer.php' ?>