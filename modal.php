<!-- Registration Modal -->
<div class="modal fade" id="RegistrationModal" tabindex="-1" aria-labelledby="RegistrationModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered ">
    <div class="modal-content bg-white text-dark">
      <div class="modal-header border border-0">
        <a type="button" class="btn-close btn-sm text-dark" data-bs-dismiss="modal" aria-label="Close"></a>

      </div>
      <div class="modal-body justify-content-center px-5 bg-white">
        <h4 class="modal-title fw-bolder mb-3" id="RegistrationModalLabel">Sign Up</h4>
        <!-- Registration Form -->
        <form method="post" action="" id="registerForm" >
          <div class="mb-3">
            <input type="text" class="form-control bg-white text-dark" name="full_name" id="name" placeholder="Enter your Full Name" required>
          </div>
          <div class="mb-3">
            <input type="email" class="form-control bg-white text-dark" id="email1" name="email" onchange="checkemail(this)" placeholder="Enter your email" required>
            <p class="h6"> <small id="email_msg" class="small text-danger"></small></p>
          </div>
          
            <div class="mb-3">
            <input type="text" class="form-control bg-white text-dark" id="username" name="username" onchange="checkusername(this)" placeholder="Enter your username" required>
          
           <p class="h6"> <small id="user_msg" class="small text-danger"></small></p>
          </div>
 
          <div class="mb-3">
            <input type="number" class="form-control bg-white text-dark" id="phone" name="phone" placeholder="Enter your Mobile Number" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control bg-white text-dark" id="password1" name="password" placeholder="Enter your password" autocomplete="off" required>
          </div>
          <div class="mb-3">
            <input type="password" class="form-control bg-white text-dark" id="password_confirm" name="confirm_password" autocomplete="off" placeholder="Confirm password" required>
          </div>
          <div class="text-center py-4">
            <button type="submit" class="btn btn-warning btn-block rounded-pill px-5">Create Account</button>
          </div>
        </form>
      </div>
      <div class="modal-footer d-flex justify-content-center border border-0">
        <hr class="container">
        <div>
          <p class="text-center">OR</p>
          <!-- Social Media Registration Images -->
          <div class="d-flex justify-content-center py-2">
            <a href="<?= $loginUrl ?>" class="border border-0 me-4">
              <img src="<?= BASE_URL ?>/assets/images/logo/login-facebook.png" alt="Facebook">
            </a>
            <a href="<?= $client->createAuthUrl() ?>" class="border border-0">
              <img src="<?= BASE_URL ?>/assets/images/logo/login-google.png" alt="Google">
            </a>
          </div>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center border border-0">
        <div>
          <p class="text-center">Already a user?<strong data-bs-toggle="modal" data-bs-target="#loginModal"> Log in</strong></p>
          <p class=" text-center nav-link text-dark">
            <a href="#" class="link-offset-2 link-underline link-underline-opacity-0 text-primary fw-bolder" data-bs-toggle="modal" data-bs-target="#RegistrationModal"></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content bg-white text-dark">
      <div class="modal-header border border-0 text-dark">
        <a type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body justify-content-center px-5">
        <h5 class="modal-title fw-bolder mb-3" id="loginModalLabel">Login</h5>
        <!-- Login Form -->
        <form name="loginUser" id="userloginform" action="" method="post">
          <div class="mb-3">
            <input type="text" name="email" class="form-control bg-white text-dark" id="email" placeholder="Enter your email/username" required>
          </div>
          <div class="mb-3">
            <input type="password" name="password" class="form-control bg-white text-dark" id="password" autocomplete="off" placeholder="Enter your password" required>
            <div class="text-end">
              <a href="#" class="link-offset-2 link-underline link-underline-opacity-0 text-primary" data-bs-toggle="modal" data-bs-target="#ForgetModal">Forget Password</a>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" id="userLogin" class="btn btn-warning btn-block px-3 rounded-pill">Sign In</button>
          </div>
        </form>
      </div>

      <div class="modal-footer d-flex justify-content-center border border-0">
        <hr class="container">
        <div>
          <p class="text-center">OR</p>
          <!-- Social Media Registration Images -->
          <div class="d-flex justify-content-center py-2">
            <a href="<?= $loginUrl ?>" class="border border-0 me-4">
              <img src="<?= BASE_URL ?>/assets/images/logo/login-facebook.png" alt="Facebook">
            </a>
            <a href="<?= $client->createAuthUrl() ?>" class="border border-0">
              <img src="<?= BASE_URL ?>/assets/images/logo/login-google.png" alt="Google">
            </a>
          </div>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center border border-0">
        <div>
          <p class="text-center">Don't have account? <strong data-bs-toggle="modal" data-bs-target="#RegistrationModal"> Create New</strong></p>
          <p class=" text-center nav-link text-dark">
            <a href="#" class="link-offset-2 link-underline link-underline-opacity-0 text-primary fw-bolder" data-bs-toggle="modal" data-bs-target="#RegistrationModal"></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Forget Modal -->
<div class="modal fade" id="ForgetModal" tabindex="-1" aria-labelledby="ForgetModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content bg-white text-dark">
      <div class="modal-header border border-0 text-dark">
        <h5 class="modal-title fw-bolder" id="loginModalLabel">Forget Password</h5>
        <a type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></a>
      </div>
      <div class="modal-body justify-content-center">
        <!-- Login Form -->
        <form action="" method="POST">
          <div class="mb-3">
            <label for="email" class="form-label">Email Id <span class="text-danger">*</span></label>
            <input type="email" name="email" class="form-control bg-white text-dark" id="email11" placeholder="Enter your email" required>
          </div>
          <div class="text-center">
            <button type="submit" name="check-email" class="btn btn-warning btn-block px-3 rounded-pill" data-submit="...Sending">Send OTP</button>
          </div>
        </form>
      </div>

      <div class="modal-footer d-flex justify-content-center border border-0">
        <hr class="container">
        <div>
          <p class="text-center">OR</p>
          <!-- Social Media Registration Images -->
          <div class="d-flex justify-content-center py-2">
            <a href="<?= $loginUrl ?>" class="border border-0 me-4">
              <img src="<?= BASE_URL ?>/assets/images/logo/login-facebook.png" alt="Facebook">
            </a>
            <a href="<?= $client->createAuthUrl() ?>" class="border border-0">
              <img src="<?= BASE_URL ?>/assets/images/logo/login-google.png" alt="Google">
            </a>
          </div>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center border border-0">
        <div>
          <p class="text-center" data-bs-toggle="modal" data-bs-target="#loginModal"><strong> Log in</strong></p>
          <p class=" text-center nav-link text-dark">
            <a href="#" class="link-offset-2 link-underline link-underline-opacity-0 text-primary fw-bolder" data-bs-toggle="modal" data-bs-target="#RegistrationModal"></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- User Choose Modal -->
<div class="modal fade" id="ChooseUserModal" tabindex="-1" aria-labelledby="ChooseUserModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content bg-white text-dark">
      <div class="modal-header border-0 text-dark">
        <!-- <h5 class="modal-title fw-bolder text-center" id="ChooseUserModalLabel">Choose User Type</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="text-center">
      <span class="d-block mt-2">What defines you best?</span>
      <br>
        <span class="d-block mt-2">Select a role</span>
      </div>
      <div class="row p-5 text-center">
        <div class="col-md-6">
          <img src="<?= BASE_URL ?>assets/images/homepage/icon_teacher.png" id="for_teacher" class="img-fluid border forrole border-3 p-3 rounded-4" alt="Teacher">
          <span class="d-block mt-2">Teacher</span>
        </div>
        <div class="col-md-6">
          <img src="<?= BASE_URL ?>assets/images/homepage/icon_parent.png" id="for_parent" class="img-fluid border forrole border-3 p-3 rounded-4" alt="Parent">
          <span class="d-block mt-2">Parent</span>
        </div>
      </div>
    </div>
  </div>
</div>


