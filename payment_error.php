<?php include 'includes/page-head.php' ?>

<style>
    /* Custom CSS styles */
    .card {
        margin-bottom: 20px;
    }

    .card-body {
        text-align: center;
    }
</style>

<body class="bg-white">
    <?php include 'includes/page-header.php' ?>
    <div class="wrapper bg-white text-dark">
        <main class="main-content">
            <!-- Your content here -->
            <div class="container mt-5">
                <h1 class="text-center fw-bold text-danger mb-4">PAYMENT FAILED</h1>
                <div class="row justify-content-center">
                    <!-- Subscription Card -->
                    <div class="col-md-4">
                        <div class="card text-dark" style="background-color: #DEEDFF;">
                            <div class="card-body">
                                <img src="assets/images/memberclub/payment-failed.png" class="img-fluid pb-md-3" alt="">
                                <h3>Payment Failed</h3>
                                <p>There was an issue with your payment. Please try again later or contact support for assistance.</p>
                                <!-- You can provide additional instructions or information to the user -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
        // Countdown timer and redirect
        let count = 5; // Countdown from 5 seconds
        let redirectInterval = setInterval(() => {
            count--;
            if (count <= 0) {
                clearInterval(redirectInterval); // Stop the countdown
                window.location.href = 'membersclub_pt.php';
            } else {
                // Update the text with the countdown
                document.getElementById('redirectMessage').innerText = `Don't click. Page will be redirected soon...${count} seconds`;
            }
        }, 1000); // Update every second
    </script>

    <div class="text-center text-danger mt-3" id="redirectMessage">Don't click. Page will be redirected soon... 5 seconds</div>
        </main>
    </div>

    <?php include 'includes/page-footer.php' ?>