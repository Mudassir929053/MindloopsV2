<?php include 'includes/page-head.php';

// Check if $_SESSION['uid'] is set
if (isset($_SESSION['uid'])) {
    $u_id = $_SESSION['uid'];
} else {
    // Redirect to index.php if $_SESSION['uid'] is not set
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
}
if ($role == 3) {
    $type = "Parent";
} elseif ($role == 2) {
    $type = "Teacher";
} elseif ($role == 4) {
    $type = "Student";
} else {
    $type = "Null";
}
?>
<?php

// Fetch user data based on the UID from the session
$uid = $_SESSION['uid'];
$sql = "SELECT * FROM `user_table` WHERE `uid` = $uid";
$result = $mysqli->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Extract data from the query result
    $username = $row['username'];
    // $fullName = $row['full_name'];
    $email = $row['email'];
    $mobile = $row['mobile'];
}
?>

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
                <h1 class="text-center mb-4">Subscription for Members Club</h1>
                <div class="row">
                    <!-- Subscription Card - 1 Month -->
                    <div class="col-md-4">
                        <div class="card text-dark" style="background-color: #DEEDFF;">
                            <div class="card-body">
                                <form action="subscription/billplz/billplzpost.php" method="post">
                                    <!-- Subscription Type (Hidden Input) -->
                                    <input type="hidden" name="subscription_type" value="1 Month">
                                    <input type="hidden" name="packagePrice" value="100">
                                    <input type="hidden" name="amount" value="MXT">
                                    <input type="hidden" name="name" value="<?= $username ?>">
                                    <input type="hidden" name="email" value="<?= $email ?>">
                                    <input type="hidden" name="mobile" value="60141234567">
                                    <input type="hidden" name="usertype" value="<?= $type ?>">
                                    <input type="hidden" name="userid" class="bg-white text-dark" value="<?= $u_id ?>">
                                    <img src="assets/images/homepage/subs.png" class="img-fluid pb-md-3" alt="">
                                    <h5 class="card-title">1 Month Subscription</h5>
                                    <p class="card-text fs-3 fw-bold">RM 100</p>
                                    <button type="submit" class="btn btn-primary">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Subscription Card - 6 Months -->
                    <div class="col-md-4">
                        <div class="card text-dark" style="background-color: #DEEDFF;">
                            <div class="card-body">
                                <form action="subscription/billplz/billplzpost.php" method="post">
                                    <!-- Subscription Type (Hidden Input) -->
                                    <input type="hidden" name="subscription_type" value="6 Month">
                                    <input type="hidden" name="packagePrice" value="100">
                                    <input type="hidden" name="amount" value="MYZ">
                                    <input type="hidden" name="name" value="<?= $username ?>">
                                    <input type="hidden" name="email" value="<?= $email ?>">
                                    <input type="hidden" name="mobile" value="60141234567">
                                    <input type="hidden" name="usertype" value="<?= $type ?>">
                                    <input type="hidden" name="userid" class="bg-white text-dark" value="<?= $u_id ?>">
                                    <img src="assets/images/homepage/subs.png" class="img-fluid pb-md-3" alt="">
                                    <h5 class="card-title">6 Months Subscription</h5>
                                    <p class="card-text fs-3 fw-bold">RM 550</p>
                                    <button type="submit" class="btn btn-primary">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Subscription Card - 12 Months -->
                    <div class="col-md-4">
                        <div class="card text-dark" style="background-color: #DEEDFF;">
                            <div class="card-body">
                                <form action="subscription/billplz/billplzpost.php" method="post">
                                    <!-- Subscription Type (Hidden Input) -->
                                    <input type="hidden" name="subscription_type" value="12 Month">
                                    <input type="hidden" name="packagePrice" value="100">
                                    <input type="hidden" name="amount" value="MYT">
                                    <input type="hidden" name="name" value="<?= $username ?>">
                                    <input type="hidden" name="email" value="<?= $email ?>">
                                    <input type="hidden" name="mobile" value="60141234567">
                                    <input type="hidden" name="usertype" value="<?= $type ?>">
                                    <input type="hidden" name="userid" class="bg-white text-dark" value="<?= $u_id ?>">
                                    <img src="assets/images/homepage/subs.png" class="img-fluid pb-md-3" alt="">
                                    <h5 class="card-title">12 Months Subscription</h5>
                                    <p class="card-text fs-3 fw-bold">RM 1000</p>
                                    <button type="submit" class="btn btn-primary">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <?php include 'includes/page-footer.php' ?>