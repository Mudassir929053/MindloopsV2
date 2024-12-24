<?php
include "../dbconnect.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Mindloops</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="../assets/img/MindLOOPS_Resouces/mindloops_icon_192x192.png" rel="icon">
  <link href="../assets/img/MindLOOPS_Resouces/mindloops_icon_192x192.png" rel="apple-touch-icon">

  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="../assets/css/style.css" rel="stylesheet">
  <!-- <link href="../assets/css/packageForm.css" rel="stylesheet"> -->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Vendor JS Files -->
  <script src="./assets/vendor/aos/aos.js"></script>
  <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="./assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="./assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="./assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="./assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="./assets/js/main.js"></script>
  <link href="../assets/css/packageTest.css" rel="stylesheet">
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
    <?php include '../commonPHP/topNavBarCheck.php'; ?>
  </header>

  <div class="container-fluid" style="background: url(../assets/creativity-submission/creativity122.png) left top no-repeat,url(../assets/creativity-submission/creativity1.png) left bottom no-repeat; background-size: contain;">

    <!-- content -->
    <div id="packageDetailsMessage"></div>

    <h2 class="text-center pt-5">Family Packages</h2>

    <div id="package">
      <?php
      $sql = "SELECT * FROM tb_spackages WHERE p_id LIKE '2%'";
      // exit;

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $output = '<div class="container" id="packageContainer">
      <div class="row" id="packages">';
        $i = 0;
        $cssArray = array();

        while ($row = $result->fetch_assoc()) {
          if ($i % 2 == 0) {
            $back = '#52c9ef';
          } else {
            $back = '#ea2d48';
          }
          $output .= '<div class="col-md-5" >
          <div class="pricingTable" style="background: ' . $back . '">
              <div class="pricingTable-header">';
          $output .= '
          <br><br>
              <h3 class="title">' . $row['p_name'] . '</h3>
          </div>';
          $description = $row['p_desc'];
          $str_arr = explode(",", $description);
          foreach ($str_arr as $value) {
            $output .= '<ul class="pricing-content">
            <li>' . $value . '</li>
            </ul>';
          }

          $duration = $row['p_duration'];
          $price = $row['p_price'];
          $durationType = substr($duration, strpos($duration, " ") + 1);
          $frontCurrency = 'RM';
          $frontPrice = strtok($price, '.');
          if (($pos = strpos($price, ".")) !== FALSE) {
            $backPrice = substr($price, strpos($price, ".") + 1);
          } else {
            $backPrice = "00";
          }
          if ($backPrice != '0') {

            $output .= '<div class="price-value">
              <span class="currency">' . $frontCurrency . '</span>
              <span class="amount">' . $frontPrice . '</span>
              <span class="cent">' . $backPrice . '</span>
              <span class="duration">per ' . strtolower($durationType) . '
              </span>
              </div>';
          } else {
            $output .= '<div class="price-value">
          <span class="cent">' . $frontCurrency . '</span>
          <span class="amount">' . $frontPrice . '</span>
          <span class="currency">.00</span>
          <span class="duration">/ ' . strtolower($durationType) . '
          </span>
          </div>';
          }

          $output .= '<div class="pricingTable-signup">
            <a href="subscriptions-details.php?package=' . $row['p_id'] . '">Buy Now</a>
            </div>
            </div>

            </div>';
          array_push($cssArray, ("subscriptionPackage" . $i));
          $i++;
        }
        $output .= "</div></div>";
      } else {
        echo "No results";
      }
      // $stmt = mysqli_stmt_init($conn);
      // exit;

      echo $output;
      // var_dump($output);
      // exit;
      ?>

    </div>
    <br>
    <h2 class="text-center">Educators Packages</h2>
    <div id="package_single">
      <?php
      $sql = "SELECT * FROM tb_spackages WHERE p_id LIKE '1%'";
      // exit;

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
        $output = '<div class="container" id="packageContainer">
      <div class="row" id="packages">';
        $i = 0;
        $cssArray = array();

        while ($row = $result->fetch_assoc()) {
          if ($i % 2 == 0) {
            $back = '#52c9ef';
          } else {
            $back = '#ea2d48';
          }
          $output .= '<div class="col-md-5" >
                <div class="pricingTable" style="background: ' . $back . '">
                    <div class="pricingTable-header">';
          $output .= '
          <br><br>
              <h3 class="title">' . $row['p_name'] . '</h3>
          </div>';
          $description = $row['p_desc'];
          $str_arr = explode(",", $description);
          foreach ($str_arr as $value) {
            $output .= '<ul class="pricing-content">
          <li>' . $value . '</li>
          </ul>';
          }

          $duration = $row['p_duration'];
          $price = $row['p_price'];
          $durationType = substr($duration, strpos($duration, " ") + 1);
          $frontCurrency = 'RM';
          $frontPrice = strtok($price, '.');
          if (($pos = strpos($price, ".")) !== FALSE) {
            $backPrice = substr($price, strpos($price, ".") + 1);
          } else {
            $backPrice = "00";
          }
          if ($backPrice != '0') {

            $output .= '<div class="price-value">
              <span class="currency">' . $frontCurrency . '</span>
              <span class="amount">' . $frontPrice . '</span>
              <span class="cent">' . $backPrice . '</span>
              <span class="duration">per ' . strtolower($durationType) . '
              </span>
              </div>';
          } else {
            $output .= '<div class="price-value">
            <span class="cent">' . $frontCurrency . '</span>
            <span class="amount">' . $frontPrice . '</span>
            <span class="currency">.00</span>
            <span class="duration">/ ' . strtolower($durationType) . '
            </span>
            </div>';
          }

          $output .= '<div class="pricingTable-signup">
          <a href="subscriptions-details.php?package=' . $row['p_id'] . '">Buy Now</a>
          </div>
          </div>
          </div>';
          array_push($cssArray, ("subscriptionPackage" . $i));
          $i++;
        }
        $output .= "</div></div>";
      } else {
        echo "No results";
      }
      // $stmt = mysqli_stmt_init($conn);
      // exit;

      echo $output;
      // var_dump($output);
      // exit;
      ?>
    </div>
  </div>
  </div>

  <div id="buyPackageForm" style='display:none;'>
    <div style="display:flex;">
      <form action="paymentProcess.php" method="POST">
        <div style="width:100%;">
          <p>PACKAGE</p>
          <input name="packageID" style="display:none">
          <input name="packageName" readonly>
        </div>
        <div style="width:100%;">
          <p>FULL NAME</p>
          <input name="name" autofocus class="form-control" placeholder="This is required for the bill." required>
        </div>
        <div style="width:100%;">
          <p>TOTAL PRICE (RM)</p>
          <input name="price" readonly>
        </div>
        <div style="width:47%;">
          <p>EMAIL</p>
          <input name="email1" class="form-control" readonly>
        </div>
        <div style="width:47%;margin-left:6%">
          <p>CONTACT NUMBER</p>
          <input name="phone" class="form-control" required>
        </div>
        <h6>**Note that the emails entered should be registered first.</h6>
        <br>
        <div style="width:100%;">
          <p>EMAIL FAMILY MEMBER 1</p>
          <input name="email2" class="form-control">
        </div>

        <div style="width:100%;">
          <p>EMAIL FAMILY MEMBER 2</p>
          <input name="email3" class="form-control">
        </div>
        <div style="width:100%;">
          <p>EMAIL FAMILY MEMBER 3</p>
          <input name="email4" class="form-control">
        </div>
        <div style="width:100%;">
          <p>EMAIL FAMILY MEMBER 4</p>
          <input name="email5" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary" id="checkOutBtn">
          Buy&gt;&gt;</button>

      </form>
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



</body>

</html>