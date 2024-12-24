<?php include 'includes/page-head.php' ?>
<style>
    /* Assuming the included header content has a class named "included-header" */
    .included-header {
        color: white !important;
        font-weight: lighter !important;
    }

    .box {
        position: relative;
        top: 80px;
    }

    .horizontal-tabs .nav-link {
        border: 1px solid transparent;
        border-radius: 30px;
        padding-right: 30px;
        padding-left: 30px;
        margin-bottom: 5px;
        min-width: 140px;
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
</style>

<body>
    <div class="wrapper text-dark" style="background-color: #F2F3F7;">
        <main class="main-content">
            <!-- Your content here -->
            <div class="container-fluid bgimage-memberclub_elp text-white">
                <?php include 'includes/page-header.php' ?>
                <!-- <div class="container"> -->
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="pt-md-5 mt-md-5"></div>
                        <div class="col-10 pt-md-5">
                            <h1 class="text-white">On Going Event</h1>
                        </div>
                    </div>
                    <div class="row box">
                        <div class="col-md-10 offset-md-1">
                            <div class="card bg-white text-dark shadow" style="border-radius: 15px;">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <!-- Column 1: Image -->
                                        <div class="col-md-3 pb-md-0 pb-3 d-flex justify-content-center">
                                            <img src="<?= BASE_URL ?>/assets/images/memberclub/Mask_group-6.png" class="img-fluid" alt="Image 1">
                                        </div>
                                        <!-- Column 2: Content -->
                                        <div class="col-md-6 pb-md-0 pb-3">
                                            <h5 class="card-title fw-bold" style="color: #00308D;">This is a sample title</h5>
                                            <p class="card-text">This is a short description of the event. Lorem Ipsum is simply dummy
                                                text of the printing and typesetting industry. Lorem Ipsum has been
                                                the industry's standard dummy text ever since the 1500s, when an
                                                unknown printer took a galley of type and scrambled it to make a
                                                type specimen book.</p>
                                        </div>
                                        <!-- Column 3: Button -->
                                        <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
                                            <a href="#" class="btn btn-warning rounded-pill">Book Your Seat</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container pt-5 mt-5">
                <div class="row">
                    <div class="pt-md-5"></div>
                    <h1 class="fw-bolder">Mindloops Events</h1>
                </div>
                <div class="row">
                    <div class="col-md-8 d-flex justify-content-start align-items-end">
                        <nav class="horizontal-tabs navbar navbar-expand-md">
                            <a class="navbar-toggler border border-0 mb-3 nav-link" type="button" data-bs-toggle="collapse" data-bs-target="#blogTabs" aria-controls="blogTabs" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                                Categories
                            </a>
                            <div class="collapse navbar-collapse" id="blogTabs">
                                <ul class="nav" role="tablist">
                                    <li class="nav-item pe-md-4">
                                        <a class="nav-link active" id="category1-tab" data-bs-toggle="tab" href="#category1" role="tab" aria-controls="category1" aria-selected="false">
                                            Birthday
                                        </a>
                                    </li>
                                    <li class="nav-item pe-md-4">
                                        <a class="nav-link" id="category2-tab" data-bs-toggle="tab" href="#category2" role="tab" aria-controls="category2" aria-selected="false">
                                            Fun
                                        </a>
                                    </li>
                                    <li class="nav-item pe-md-4">
                                        <a class="nav-link" id="category3-tab" data-bs-toggle="tab" href="#category3" role="tab" aria-controls="category3" aria-selected="false">
                                            School Holiday
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="category4-tab" data-bs-toggle="tab" href="#category4" role="tab" aria-controls="category4" aria-selected="false">
                                            Competition
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="col-md-4 d-flex justify-content-end align-items-end">
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
                        <h2>Upcomming Events</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="category1" role="tabpanel" aria-labelledby="category1-tab">
                            <div class="row pb-4">
                                <div class="col-md-9 offset-md-1">
                                    <div class="card bg-white text-dark shadow" style="border-radius: 15px;">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <!-- Column 1: Image -->
                                                <div class="col-md-3 pb-md-0 pb-3 d-flex justify-content-center">
                                                    <img src="<?= BASE_URL ?>/assets/images/memberclub/Mask_group-5.png" class="img-fluid" alt="Image 1">
                                                </div>
                                                <!-- Column 2: Content -->
                                                <div class="col-md-6 pb-md-0 pb-3">
                                                    <h5 class="card-title fw-bold" style="color: #00308D;">This is a sample title</h5>
                                                    <p class="card-text">This is a short description of the event. Lorem Ipsum is simply dummy
                                                        text of the printing and typesetting industry. Lorem Ipsum has been
                                                        the industry's standard dummy text ever since the 1500s, when an
                                                        unknown printer took a galley of type and scrambled it to make a
                                                        type specimen book.</p>
                                                </div>
                                                <!-- Column 3: Button -->
                                                <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
                                                    <a href="#" class="btn rounded-pill" style="background-color: #C2DEFF; color: #43454D;">Save the date</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-md-9 offset-md-1">
                                    <div class="card bg-white text-dark shadow" style="border-radius: 15px;">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <!-- Column 1: Image -->
                                                <div class="col-md-3 pb-md-0 pb-3 d-flex justify-content-center">
                                                    <img src="<?= BASE_URL ?>/assets/images/memberclub/Mask_group-4.png" class="img-fluid" alt="Image 1">
                                                </div>
                                                <!-- Column 2: Content -->
                                                <div class="col-md-6 pb-md-0 pb-3">
                                                    <h5 class="card-title fw-bold" style="color: #00308D;">This is a sample title</h5>
                                                    <p class="card-text">This is a short description of the event. Lorem Ipsum is simply dummy
                                                        text of the printing and typesetting industry. Lorem Ipsum has been
                                                        the industry's standard dummy text ever since the 1500s, when an
                                                        unknown printer took a galley of type and scrambled it to make a
                                                        type specimen book.</p>
                                                </div>
                                                <!-- Column 3: Button -->
                                                <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
                                                    <a href="#" class="btn rounded-pill" style="background-color: #C2DEFF; color: #43454D;">Save the date</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="col-md-9 offset-md-1">
                                    <div class="card bg-white text-dark shadow" style="border-radius: 15px;">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <!-- Column 1: Image -->
                                                <div class="col-md-3 pb-md-0 pb-3 d-flex justify-content-center">
                                                    <img src="<?= BASE_URL ?>/assets/images/memberclub/Mask_group-3.png" class="img-fluid" alt="Image 1">
                                                </div>
                                                <!-- Column 2: Content -->
                                                <div class="col-md-6 pb-md-0 pb-3">
                                                    <h5 class="card-title fw-bold" style="color: #00308D;">This is a sample title</h5>
                                                    <p class="card-text">This is a short description of the event. Lorem Ipsum is simply dummy
                                                        text of the printing and typesetting industry. Lorem Ipsum has been
                                                        the industry's standard dummy text ever since the 1500s, when an
                                                        unknown printer took a galley of type and scrambled it to make a
                                                        type specimen book.</p>
                                                </div>
                                                <!-- Column 3: Button -->
                                                <div class="col-md-3 text-center d-flex align-items-center justify-content-center">
                                                    <a href="#" class="btn rounded-pill" style="background-color: #C2DEFF; color: #43454D;">Save the date</a>
                                                </div>
                                            </div>
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
                        <div class="tab-pane fade" id="category4" role="tabpanel" aria-labelledby="category4-tab">
                            <p>This is the content for Category 4.</p>
                        </div>
                    </div>
                </div>
            </div>




        </main>
    </div>

    <?php include 'includes/page-footer.php' ?>