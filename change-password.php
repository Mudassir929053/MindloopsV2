<?php
include 'includes/page-head.php';
include_once 'function_forget_pwd.php';
include_once 'modal.php';
?>
<?php
$email = $_SESSION['email'];
if ($email == false) {
  // header('Location: change-password.php');
  echo "<script>window.location.href='forgot-password-verify';</script>";
}
?>
<body>
<?php include 'includes/page-header.php' ?>
<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center g-0 min-vh-100">
        <div class="col-lg-5 col-md-8 py-8 py-xl-0">
            <!-- Card -->
            <div class="card shadow">
                <!-- Card body -->
                <div class="card-body p-4">
                    <div class="mb-4 text-center">
                        <form action="" method="POST" autocomplete="off">
                            <h2 class="text-center">Create a New Password</h2>
                            <div class="d-grid mb-3">
                                <a href="./forgot-password-verify">Back</a>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Create new password" required>
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="cpassword" placeholder="Confirm your password" required>
                            </div>
                            <div class="d-grid">
                                <input class="btn btn-primary" type="submit" name="change-password" value="Confirm Password">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
