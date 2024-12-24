<?php include '../includes/page-head.php' ?>

  <style>
    /* .single{
      position: absolute;
      top:20%;
      left: 40%;
    } */
  </style>
</head>

<body>
  <header id="head">
  <?php include '../includes/page-header.php' ?>

  </header>
  <div class="container-fluid" style="background: url(../assets/creativity-submission/creativity122.png) left top no-repeat,url(../assets/creativity-submission/creativity1.png) left bottom no-repeat; background-size: contain;">
    <div class="py-5"></div>
    <?php
    $package_id = $_GET['package'];
    $sql = "SELECT * FROM tb_spackages WHERE p_id = '$package_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $output = '<div class="container" id="packageContainer">
    <div class="row" id="packages">';
      $i = 0;
      $cssArray = array();
      while ($row = $result->fetch_assoc()) {
        $_SESSION['packagename'] = $row['p_name']; // set column value as session variable
        $_SESSION['packageprice'] = $row['p_price']; // set column value as session variable
      }
    }
    ?>
    <!-- style="background-color:mediumaquamarine;" -->
    <div class="container shadow p-5 mb-5 rounded">
      <div class="fw-bold text-center fs-1">
        <p class=""><?= $_SESSION['packagename'] ?></p>
        <p class="">RM <?= $_SESSION['packageprice'] ?></p>
        <br>
      </div>
      <form action="billplz/billplzpost.php" method="post">

        <input type="hidden" class="form-control" id="packageName" name="packagename" placeholder="Enter Package Name" value="<?= $_SESSION['packagename'] ?>" readonly>
        <input type="hidden" class="form-control" id="packagePrice" name="amount" placeholder="Enter Package Price" value="<?= $_SESSION['packageprice'] * 100 ?>" readonly>
        <div class="row mb-3">
          <div class="col">
            <label for="fullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullName" name="name" placeholder="Enter Full Name">
          </div>
          <div class="col">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
          </div>
        </div>
        <div class="row mb-3">
          <div class="col">
            <label for="MobileNumber" class="form-label">Mobile Number</label>
            <input type="number" class="form-control" id="MobileNumber" name="mobile" placeholder="Enter Mobile Number">
          </div>
          <div class="col">
            <label for="usertype" class="form-label">User Type</label>
            <select class="form-select" id="usertype" name="usertype">
              <option selected disabled>Select user type</option>
              <option value="parent">Parent</option>
              <option value="teacher">Educator</option>
            </select>
          </div>
        </div>

        <!-- <div class="row mb-3">
          <div class="col">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" aria-label="Password" aria-describedby="password-addon">
              <button class="btn btn-outline-secondary" type="button" id="password-addon" data-bs-toggle="tooltip" data-bs-placement="top" title="Show password" onclick="togglePasswordVisibility('password-addon', 'password')">
                <i class="bi bi-eye"></i>
              </button>
            </div>
          </div>
          <div class="col">
            <label for="confirm-password" class="form-label">Confirm Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="confirm-password" name="confirmpassword" placeholder="Confirm Password" aria-label="Confirm Password" aria-describedby="confirm-password-addon">
              <button class="btn btn-outline-secondary" type="button" id="confirm-password-addon" data-bs-toggle="tooltip" data-bs-placement="top" title="Show password" onclick="togglePasswordVisibility('confirm-password-addon', 'confirm-password')">
                <i class="bi bi-eye"></i>
              </button>
            </div>
            <div class="invalid-feedback">
              Please enter the same password as above.
            </div>
          </div>
        </div> -->
        <div class="row">
          <div class="col text-end">
            <button type="submit" class="btn btn-warning">Buy</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <?php include '../commonPHP/footer.php' ?>
    </div>
  </div>
  <style type="text/css">
    body {
      margin-top: 20px;
    }
  </style>
  <script>
    function togglePasswordVisibility(buttonId, passwordId) {
      var passwordInput = document.getElementById(passwordId);
      var buttonIcon = document.getElementById(buttonId).querySelector('i');
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        buttonIcon.classList.remove('bi-eye');
        buttonIcon.classList.add('bi-eye-slash');
      } else {
        passwordInput.type = "password";
        buttonIcon.classList.remove('bi-eye-slash');
        buttonIcon.classList.add('bi-eye');
      }
    }
    $(document).ready(function() {
      $('#confirm-password').on('input', function() {
        var password = $('#password').val();
        var confirm_password = $('#confirm-password').val();
        if (password != confirm_password) {
          $('#confirm-password').addClass('is-invalid');
        } else {
          $('#confirm-password').removeClass('is-invalid');
        }
      });
    });
  </script>
</body>

</html>