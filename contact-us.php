<?php include 'includes/page-head.php'; ?>
<?php include 'functions/function.php'; ?>

<body class="bg-white text-dark">
    <?php include 'includes/page-header.php'; ?>
            <div class="container">
                <div class="row mt-5">
                    <!-- Left Side - Contact Information -->
                    <div class="col-md-6">
                    <img src="assets/images/homepage/Group 947.png" alt="Contact Image" class="img-fluid">
                    </div>
                    <!-- Right Side - Contact Form -->
                    <div class="col-md-6 p-5">
                        <h2 class="mb-4" style="color: #0355b0;">Get in touch</h2>
                        <h6 class="mb-4" >Feel free to contact us, we will get back to you as soon as possible.</h6>
                        <form action="" method="POST" enctype="multipart/form-data" id="ContactusForm">
                            <div class="mb-3 ">
                                <input type="text" placeholder="Name" class="form-control bg-light" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" placeholder="Email" class="form-control bg-light" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control bg-light" id="message" name="message" placeholder="Message" rows="5" required></textarea>
                            </div>
                            <div class="mb-3 text-start">
                                <button type="submit" id="contact_us" name="contact_us" class="btn custom-btn rounded-pill">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    <?php include 'includes/page-footer.php'; ?>
</body>