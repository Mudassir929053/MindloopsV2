<?php
include 'includes/page-head.php';
include_once 'function_forget_pwd.php';
include_once 'modal.php';
?>
<?php
$email = $_SESSION['email'];
// echo $email;
if ($email == false) {
  header('Location: index.php');
  echo "<script>window.location.href='index';</script>";
}
?>
<body>
  <?php include 'includes/page-header.php' ?>
  <!-- Page content -->
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
        <div class="col-lg-5 col-md-8 py-8 py-xl-0">
            <!-- Card -->
            <div class="card shadow">
                <!-- Card body -->
                <div class="card-body p-4">
                    <!-- Form -->
                    <form method="POST" id="form" action="">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <h2 class="text-center mb-4">OTP Code Verification</h2>
                                <div class="mb-3">
                                    <h5 class="fw-bold">Please enter the OTP received in your Email: <?php echo $email ?></h5>
                                    <input class="form-control" type="number" name="otp" placeholder="Enter code" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary" name="check-reset-otp">Verify</button>
                                </div>
                                <p class="mt-3 text-center">Didn't receive the OTP? <a href="#" data-bs-toggle="modal" data-bs-target="#ForgetModal">Resend</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
