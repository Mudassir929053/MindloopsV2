<?php include 'includes/page-head.php' ?>
<style>
    .horizontal-tabs .nav-link {
        border: 1px solid transparent;
        border-radius: 30px;
        padding-right: 30px;
        padding-left: 30px;
        margin-bottom: 5px;
        color: grey;
        transition: border-color 0.3s;
    }

    .horizontal-tabs .nav-link.active {
        border-color: #007bff;
        border-radius: 30px;
        color: black;
        transform: scale(1.05);
        transition: transform 0.3s ease;
    }

    .horizontal-tabs .nav-link:hover {
        border-color: #ccc;
    }

    .icon {
        max-width: 25px;
        height: auto;
    }

    .card {
        position: relative;
    }

    .see-profile {
        position: absolute;
        top: 52%;
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
        transition: opacity 0.4s;
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
</style>

<body>
    <div class="wrapper bg-white text-dark">
        <main class="main-content">
            <!-- Your content here -->

            <div class="container-fluid bgimage-Rectangle">
                <?php include 'includes/page-header.php' ?>
                <!-- <div class="container"> -->
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-3">
                        <img class="img-fluid" src="assets/images/memberclub/Clip_group.png" alt="image">
                    </div>
                    <!-- Content column -->
                    <div class="col-md-6 text-center">
                        <h1 class="fw-bold pb-md-3" style="font-size: 2.2rem;">We Appreciate You, Our Valued Member!</h1>
                        <div class="mx-md-5 text-centre">
                            <p class="px-md-4 mx-md-4" style="font-size: 1.2rem;">
                                We deeply appreciate your membership. Claim your
                                exclusive coupon now to enjoy discounts. gifts, and
                                premium content access. Thank you for being a valued
                                part of our community.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <img class="img-fluid" src="assets/images/memberclub/Clip_group1.png" alt="image">
                    </div>
                </div>
            </div>

            <div class="container pt-4">
                <div class="row">
                    <div class="col-md-8 d-flex justify-content-start align-items-end">
                        <nav class="horizontal-tabs navbar navbar-expand-md">
                            <a class="navbar-toggler border border-0 mb-3 nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#blogTabs" aria-controls="blogTabs" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                Categories
                            </a>
                            <div class="collapse navbar-collapse" id="blogTabs">
                                <ul class="nav" role="tablist">
                                    <li class="nav-item pe-md-5">
                                        <a class="nav-link active" id="category1-tab" data-bs-toggle="tab" href="#category1" role="tab" aria-controls="category1" aria-selected="false">
                                            Coupon & Discount
                                        </a>
                                    </li>
                                    <li class="nav-item pe-md-5">
                                        <a class="nav-link" id="category2-tab" data-bs-toggle="tab" href="#category2" role="tab" aria-controls="category2" aria-selected="false">
                                            Tutors
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="category3-tab" data-bs-toggle="tab" href="#category3" role="tab" aria-controls="category3" aria-selected="false">
                                            Events
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end align-items-end bg-white">
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
            </div>

            <div class="container py-md-4">
                <div class="row text-center pb-md-4">
                    <div class="col-12">
                        <h2>Participating Brands</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="category1" role="tabpanel" aria-labelledby="category1-tab">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card bg-white text-dark">
                                        <img src="<?= BASE_URL ?>/assets/images/memberclub/Frame_ 714-7.png" class="card-img-top" alt="...">
                                        <a href="#" class="see-profile">Redeem Now</a>
                                        <div class="card-body justify-content-between">
                                            <h5 class="fw-bold" style="color: #00308D;">This is a sample title
                                            </h5>
                                            <p class="card-text">This is a short description of your service</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-white text-dark">
                                        <img src="<?= BASE_URL ?>/assets/images/memberclub/Frame714-5.png" class="card-img-top" alt="...">
                                        <a href="#" class="see-profile">Redeem Now</a>
                                        <div class="card-body justify-content-between">
                                            <h5 class="fw-bold" style="color: #00308D;">This is a sample title
                                            </h5>
                                            <p class="card-text">This is a short description of your service</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-white text-dark">
                                        <img src="<?= BASE_URL ?>/assets/images/memberclub/Frame_ 714.png" class="card-img-top" alt="...">
                                        <a href="#" class="see-profile">Redeem Now</a>
                                        <div class="card-body justify-content-between">
                                            <h5 class="fw-bold" style="color: #00308D;">This is a sample title
                                            </h5>
                                            <p class="card-text">This is a short description of your service</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-white text-dark">
                                        <img src="<?= BASE_URL ?>/assets/images/memberclub/Frame_ 714-1.png" class="card-img-top" alt="...">
                                        <a href="#" class="see-profile">Redeem Now</a>
                                        <div class="card-body justify-content-between">
                                            <h5 class="fw-bold" style="color: #00308D;">This is a sample title
                                            </h5>
                                            <p class="card-text">This is a short description of your service</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card bg-white text-dark">
                                        <img src="<?= BASE_URL ?>/assets/images/memberclub/Frame_ 714-2.png" class="card-img-top" alt="...">
                                        <a href="#" class="see-profile">Redeem Now</a>
                                        <div class="card-body justify-content-between">
                                            <h5 class="fw-bold" style="color: #00308D;">This is a sample title
                                            </h5>
                                            <p class="card-text">This is a short description of your service</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-white text-dark">
                                        <img src="<?= BASE_URL ?>/assets/images/memberclub/Frame_ 714-3.png" class="card-img-top" alt="...">
                                        <a href="#" class="see-profile">Redeem Now</a>
                                        <div class="card-body justify-content-between">
                                            <h5 class="fw-bold" style="color: #00308D;">This is a sample title
                                            </h5>
                                            <p class="card-text">This is a short description of your service</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-white text-dark">
                                        <img src="<?= BASE_URL ?>/assets/images/memberclub/Frame_ 714-1.png" class="card-img-top" alt="...">
                                        <a href="#" class="see-profile">Redeem Now</a>
                                        <div class="card-body justify-content-between">
                                            <h5 class="fw-bold" style="color: #00308D;">This is a sample title
                                            </h5>
                                            <p class="card-text">This is a short description of your service</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card bg-white text-dark">
                                        <img src="<?= BASE_URL ?>/assets/images/memberclub/Frame714-5.png" class="card-img-top" alt="...">
                                        <a href="#" class="see-profile">Redeem Now</a>
                                        <div class="card-body justify-content-between">
                                            <h5 class="fw-bold" style="color: #00308D;">This is a sample title
                                            </h5>
                                            <p class="card-text">This is a short description of your service</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="category2" role="tabpanel" aria-labelledby="category2-tab">
                            <p>This is the content for Category 2.</p>
                        </div>
                        <div class="tab-pane fade" id="category3" role="tabpanel" aria-labelledby="category3-tab">
                            <p>This is the content for Category 3.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="background-color: #DEEDFF;">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5 offset-md-1">
                        <h2 class="fw-bold">Learning</h2>
                        <ul class="list-unstyled fs-4">
                            <li><img class="img-fluid pe-2 pb-2 icon" src="<?= BASE_URL ?>/assets/images/memberclub/list.png" alt="Icon">Member's Only Badges & Avatar</li>
                            <li><img class="img-fluid pe-2 pb-2 icon" src="<?= BASE_URL ?>/assets/images/memberclub/list.png" alt="Icon">Classroom Feature</li>
                            <li><img class="img-fluid pe-2 pb-2 icon" src="<?= BASE_URL ?>/assets/images/memberclub/list.png" alt="Icon">Events & Happenings</li>
                            <li><img class="img-fluid pe-2 pb-2 icon" src="<?= BASE_URL ?>/assets/images/memberclub/list.png" alt="Icon">Private Tutor Highlights</li>
                        </ul>
                    </div>
                    <div class="col-md-6" style="padding: 0px;">
                        <img class="img-fluid" src="assets/images/memberclub/ML_in_class-021.png" alt="image">
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="background-color: #DEEDFF;">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-6"  style="padding: 0px;">
                        <img class="img-fluid" src="assets/images/memberclub/Mask_group23.png" alt="image2">
                    </div>
                    <div class="col-md-5 offset-md-1">
                        <h4 class="fw-bold">Lifestyle</h4>
                        <ul class="list-unstyled fs-4">
                            <li><img class="img-fluid pe-2 pb-2 icon" src="<?= BASE_URL ?>/assets/images/memberclub/list.png" alt="Icon">Participating Brands Highlight</li>
                            <li><img class="img-fluid pe-2 pb-2 icon" src="<?= BASE_URL ?>/assets/images/memberclub/list.png" alt="Icon">Exclusive SWAGs</li>
                            <li><img class="img-fluid pe-2 pb-2 icon" src="<?= BASE_URL ?>/assets/images/memberclub/list.png" alt="Icon">Exclusive School Supplies</li>
                        </ul>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <?php include 'includes/page-footer.php' ?>