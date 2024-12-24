<?php include_once 'includes/head.php'; ?>
<?php
include_once 'includes/sidebar.php';
include 'chart.php';
?>
<!-- #Main ============================ -->
<div class="page-container">
  <?php include_once 'includes/header.php'; ?>
  <!-- ### $App Screen Content ### -->
  <main class='main-content bgc-grey-100'>
    <div id='mainContent'>
      <div class="row gap-20 masonry pos-r">
        <div class="masonry-sizer col-md-6"></div>
        <div class="masonry-item  w-100">
          <div class="row gap-20">
            <h4>Total Statistics</h4>
            <!-- #Toatl Visits ==================== -->
            <div class='col-md-3'>
              <div class="layers bd bgc-green-50 rounded-3 p-20">
                <div class="layer w-100 mB-10">
                  <h5 class="lh-1 fw-bolder">Total Register User</h5>
                </div>
                <div class="layer w-100">
                  <div class="peers ai-sb fxw-nw">
                    <div class="peer peer-greed">
                      <!-- <span id="sparklinedash"></span> -->
                      <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 pY-15 fs-5 bgc-green-50 c-green-500"> <?php
                                                                                                                // SQL query to get the total number of registered users
                                                                                                                $sql = "SELECT COUNT(*) AS total_users FROM user_table where role_id not in (1,5)";
                                                                                                                $result = $mysqli->query($sql);
                                                                                                                if ($result) {
                                                                                                                  $row = $result->fetch_assoc();
                                                                                                                  $totalUsers = $row['total_users'];
                                                                                                                  echo $totalUsers;
                                                                                                                } else {
                                                                                                                  echo "Error: " . $mysqli->error;
                                                                                                                }
                                                                                                                ?></span>
                    </div>
                    <div class="peer">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- #Total Page Views ==================== -->
            <div class='col-md-3'>
              <div class="layers bd bgc-red-50 rounded-3 p-20">
                <div class="layer w-100 mB-10">
                  <h5 class="lh-1 fw-bolder">Total Subscription User</h5>
                </div>
                <div class="layer w-100">
                  <div class="peers ai-sb fxw-nw">
                    <div class="peer peer-greed">
                      <!-- <span id="sparklinedash2"></span> -->
                      <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 fs-5 pY-15 bgc-red-50 c-red-500"><?php
                                                                                                                // SQL query to get the total number of registered users
                                                                                                                $sql = "SELECT COUNT(*) AS total_users FROM user_table where role_id not in (1,4,5)";
                                                                                                                $result = $mysqli->query($sql);
                                                                                                                if ($result) {
                                                                                                                  $row = $result->fetch_assoc();
                                                                                                                  $totalUsers = $row['total_users'];
                                                                                                                  echo $totalUsers;
                                                                                                                } else {
                                                                                                                  echo "Error: " . $mysqli->error;
                                                                                                                }
                                                                                                                ?></span>
                    </div>
                    <div class="peer">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- #Unique Visitors ==================== -->
            <div class='col-md-3'>
              <div class="layers bd bgc-purple-50 rounded-3 p-20">
                <div class="layer w-100 mB-10">
                  <h5 class="lh-1 fw-bolder">Total Teachers</h5>
                </div>
                <div class="layer w-100">
                  <div class="peers ai-sb fxw-nw">
                    <div class="peer peer-greed">
                      <!-- <span id="sparklinedash3"></span> -->
                      <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 fs-5 pY-15 bgc-purple-50 c-purple-500"> <?php
                        // SQL query to get the total number of registered users
                        $sql = "SELECT COUNT(*) AS total_users FROM user_table WHERE role_id = 2";
                        $result = $mysqli->query($sql);
                        if ($result) {
                          $row = $result->fetch_assoc();
                          $totalUsers = $row['total_users'];
                          echo $totalUsers;
                        } else {
                          echo "Error: " . $mysqli->error;
                        }
                        ?></span>
                    </div>
                    <div class="peer">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- #Bounce Rate ==================== -->
            <div class='col-md-3'>
              <div class="layers bd bgc-blue-50 rounded-3 p-20">
                <div class="layer w-100 mB-10">
                  <h5 class="lh-1 fw-bolder">Total Parent</h5>
                </div>
                <div class="layer w-100">
                  <div class="peers ai-sb fxw-nw">
                    <div class="peer peer-greed">
                      <!-- <span id="sparklinedash4"></span> -->
                      <span class="d-ib lh-0 va-m fw-600 bdrs-10em pX-15 fs-5 pY-15 bgc-blue-50 c-blue-500">
                        <?php
                        // SQL query to get the total number of registered users
                        $sql = "SELECT COUNT(*) AS total_users FROM user_table WHERE role_id = 3";
                        $result = $mysqli->query($sql);
                        if ($result) {
                          $row = $result->fetch_assoc();
                          $totalUsers = $row['total_users'];
                          echo $totalUsers;
                        } else {
                          echo "Error: " . $mysqli->error;
                        }
                        ?>
                      </span>
                    </div>
                    <div class="peer">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php if($_SESSION['role_id'] == 1){?>
          <div class="row gap-20">
            <h4>Total</h4>
            <div class="col-md-3">
              <div class="layers bd bgc-grey-200 rounded-3 p-20">
                <div class="layer w-100 mB-10">
                  <h5 class="lh-1 fw-bold text-center">Total Downloads</h5>
                </div>
                <div class="layer w-100 d-flex flex-column align-items-end">
                  <ul class="nav nav-tabs" id="myTabs">
                    <li class="nav-item">
                      <a class="nav-link active btn-primary" data-bs-toggle="tab" href="#Downloadable-day">Day</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn-primary" data-bs-toggle="tab" href="#Downloadable-month">Month</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn-primary" data-bs-toggle="tab" href="#Downloadable-year">Year</a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="Downloadable-day">
                      <!-- Content for the Day tab -->
                      <canvas id="dayChartDownload" width="330" height="300"></canvas>
                    </div>
                    <div class="tab-pane" id="Downloadable-month">
                      <!-- Content for the Month tab -->
                      <div style="display: block; width: 330px"></div>
                      <canvas id="monthChartDownload" width="330" height="300"></canvas>
                    </div>
                    <div class="tab-pane" id="Downloadable-year">
                      <!-- Content for the Year tab -->
                      <div style="display: block; width: 330px"></div>
                      <canvas id="Download" width="330" height="200"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="layers bd bgc-grey-200 rounded-3 p-20">
                <div class="layer w-100 mB-10">
                  <h5 class="lh-1 fw-bold text-center">Total Previews</h5>
                </div>
                <div class="layer w-100 d-flex flex-column align-items-end">
                  <ul class="nav nav-tabs" id="myTabs">
                    <li class="nav-item">
                      <a class="nav-link active btn-primary" data-bs-toggle="tab" href="#previews-day">Day</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn-primary" data-bs-toggle="tab" href="#previews-month">Month</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link btn-primary" data-bs-toggle="tab" href="#previews-year">Year</a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="previews-day">
                      <!-- Content for the Day tab -->
                      <canvas id="dayChartPreview" width="330" height="300"></canvas>
                    </div>
                    <div class="tab-pane" id="previews-month">
                      <!-- Content for the Month tab -->
                      <div style="display: block; width: 330px"></div>
                      <canvas id="monthChartPreview" width="330" height="300"></canvas>
                    </div>
                    <div class="tab-pane" id="previews-year">
                      <!-- Content for the Year tab -->
                      <div style="display: block; width: 330px"></div>
                      <canvas id="yearChartPreview" width="330" height="200"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="layers bd bgc-grey-200 rounded-3 p-20">
                <div class="layer w-100 mB-10">
                  <h5 class="lh-1 fw-bold text-center">Total Teachers</h5>
                </div>
                <div class="layer w-100 d-flex flex-column align-items-end">
                  <canvas id="teachersChart" width="330" height="337"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="layers bd bgc-grey-200 rounded-3 p-20">
                <div class="layer w-100 mB-10">
                  <h5 class="lh-1 fw-bold text-center">Total Students</h5>
                </div>
                <div class="layer w-100 d-flex flex-column align-items-end">
                  <canvas id="studentsChart" width="330" height="337"></canvas>
                </div>
              </div>
            </div>
            <!-- #Total Page Views ==================== -->
          </div>
          <div class="row gap-20">
            <!-- <h4>Total Downloads</h4> -->
            <!-- #Unique Visitors ==================== -->
            <div class='col-md-3'>
              <div class="layers bd bgc-grey-200 rounded-3 p-20">
                <div class="layer w-100 mB-10">
                  <h5 class="lh-1 fw-bold text-center">Page Views</h5>
                </div>
                <div class="layer w-100">
                  <!-- Create a canvas element for the chart -->
                  <canvas id="pageViewsChart" width="750" height="300"></canvas>
                </div>
              </div>
            </div>
            <!-- #Toatl Visits ==================== -->
            <div class='col-md-6'>
              <div class="layers bd bgc-grey-200 rounded-3 p-20">
                <div class="layer w-100 mB-10">
                  <h5 class="lh-1 fw-bolder text-center">Total Content</h5>
                </div>
                <div class="layer w-100">
                  <!-- Log In Page Views Chart -->
                  <!-- Register Page Views Chart -->
                  <canvas id="contentChart" width="750" height="400"></canvas>
                </div>
              </div>
            </div>
            <div class='col-md-3'>
              <div class="layers bd bgc-grey-200 rounded-3 p-20">
                <div class="layer w-100 mB-10">
                  <h5 class="lh-1 fw-bolder text-center">Total CTA</h5>
                </div>
                <div class="layer w-100">
                  <!-- Log In Page Views Chart -->
                  <canvas id="ctrChart" width="750" height="300"></canvas>
                  <!-- Register Page Views Chart -->
                </div>
              </div>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
  </main>
  <?php
  include 'chart-script.php';
  include_once 'includes/footer.php'
  ?>