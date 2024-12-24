<!-- ### $Topbar ### -->
<div class="header navbar">
  <div class="header-container">
    <ul class="nav-left">
      <li>
        <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
          <i class="ti-menu"></i>
        </a>
      </li>


    </ul>
    <!-- <h2>Welcome <?= $_SESSION['full_name'];  ?></h2> -->
    <?php

    // Check if the user is logged in and has a UID (user ID) in the session
    if (isset($_SESSION['uid'])) {
      $uid = $_SESSION['uid'];

      // Query the user_table to fetch the profile_pic for the user with the given UID
      $query = "SELECT profile_pic FROM user_table WHERE uid = $uid";
      $result = $mysqli->query($query);

      if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $profilePic = $row['profile_pic'];
        // Now, $profilePic contains the user's profile picture filename
        // You can use it in your HTML or display it as needed
      } else {
        // Handle the case when the user's profile picture is not found
        $profilePic = 'default.jpg'; // Set a default profile picture filename
      }
    } else {
      // Handle the case when the user is not logged in
      $profilePic = 'default.jpg'; // Set a default profile picture filename
    }

    // Use $profilePic to display the user's profile picture in your HTML
    ?>
    <ul class="nav-right">
      <!-- <li class="notifications dropdown">
                  <span class="counter bgc-red">3</span>
                  <a href="#" class="dropdown-toggle no-after" data-bs-toggle="dropdown">
                    <i class="ti-bell"></i>
                  </a>
  
                  <ul class="dropdown-menu">
                    <li class="pX-20 pY-15 bdB">
                      <i class="ti-bell pR-10"></i>
                      <span class="fsz-sm fw-600 c-grey-900">Notifications</span>
                    </li>
                    <li>
                      <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                        <li>
                          <a href="#" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
                            <div class="peer mR-15">
                              <img class="w-3r bdrs-50p" src="https://linux.how2shout.com/wp-content/uploads/2023/05/Start-XAMPP-GUI-using-Command-in-Ubuntu.png" alt="">
                            </div>
                            <div class="peer peer-greed">
                              <span>
                                <span class="fw-500">John Doe</span>
                                <span class="c-grey-600">liked your <span class="text-dark">post</span>
                                </span>
                              </span>
                              <p class="m-0">
                                <small class="fsz-xs">5 mins ago</small>
                              </p>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="#" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
                            <div class="peer mR-15">
                              <img class="w-3r bdrs-50p" src="../randomuser.me/api/portraits/men/2.jpg" alt="">
                            </div>
                            <div class="peer peer-greed">
                              <span>
                                <span class="fw-500">Moo Doe</span>
                                <span class="c-grey-600">liked your <span class="text-dark">cover image</span>
                                </span>
                              </span>
                              <p class="m-0">
                                <small class="fsz-xs">7 mins ago</small>
                              </p>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="#" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
                            <div class="peer mR-15">
                              <img class="w-3r bdrs-50p" src="../randomuser.me/api/portraits/men/3.jpg" alt="">
                            </div>
                            <div class="peer peer-greed">
                              <span>
                                <span class="fw-500">Lee Doe</span>
                                <span class="c-grey-600">commented on your <span class="text-dark">video</span>
                                </span>
                              </span>
                              <p class="m-0">
                                <small class="fsz-xs">10 mins ago</small>
                              </p>
                            </div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="pX-20 pY-15 ta-c bdT">
                      <span>
                        <a href="#" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications <i class="ti-angle-right fsz-xs mL-10"></i></a>
                      </span>
                    </li>
                  </ul>
                </li> -->
      <!-- <li class="notifications dropdown">
                  <span class="counter bgc-blue">3</span>
                  <a href="#" class="dropdown-toggle no-after" data-bs-toggle="dropdown">
                    <i class="ti-email"></i>
                  </a>
  
                  <ul class="dropdown-menu">
                    <li class="pX-20 pY-15 bdB">
                      <i class="ti-email pR-10"></i>
                      <span class="fsz-sm fw-600 c-grey-900">Emails</span>
                    </li>
                    <li>
                      <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                        <li>
                          <a href="#" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
                            <div class="peer mR-15">
                              <img class="w-3r bdrs-50p" src="../randomuser.me/api/portraits/men/1.jpg" alt="">
                            </div>
                            <div class="peer peer-greed">
                              <div>
                                <div class="peers jc-sb fxw-nw mB-5">
                                  <div class="peer">
                                    <p class="fw-500 mB-0">John Doe</p>
                                  </div>
                                  <div class="peer">
                                    <small class="fsz-xs">5 mins ago</small>
                                  </div>
                                </div>
                                <span class="c-grey-600 fsz-sm">
                                  Want to create your own customized data generator for your app...
                                </span>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="#" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
                            <div class="peer mR-15">
                              <img class="w-3r bdrs-50p" src="../randomuser.me/api/portraits/men/2.jpg" alt="">
                            </div>
                            <div class="peer peer-greed">
                              <div>
                                <div class="peers jc-sb fxw-nw mB-5">
                                  <div class="peer">
                                    <p class="fw-500 mB-0">Moo Doe</p>
                                  </div>
                                  <div class="peer">
                                    <small class="fsz-xs">15 mins ago</small>
                                  </div>
                                </div>
                                <span class="c-grey-600 fsz-sm">
                                  Want to create your own customized data generator for your app...
                                </span>
                              </div>
                            </div>
                          </a>
                        </li>
                        <li>
                          <a href="#" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
                            <div class="peer mR-15">
                              <img class="w-3r bdrs-50p" src="../randomuser.me/api/portraits/men/3.jpg" alt="">
                            </div>
                            <div class="peer peer-greed">
                              <div>
                                <div class="peers jc-sb fxw-nw mB-5">
                                  <div class="peer">
                                    <p class="fw-500 mB-0">Lee Doe</p>
                                  </div>
                                  <div class="peer">
                                    <small class="fsz-xs">25 mins ago</small>
                                  </div>
                                </div>
                                <span class="c-grey-600 fsz-sm">
                                  Want to create your own customized data generator for your app...
                                </span>
                              </div>
                            </div>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class="pX-20 pY-15 ta-c bdT">
                      <span>
                        <a href="email.html" class="c-grey-600 cH-blue fsz-sm td-n">View All Email <i class="fs-xs ti-angle-right ms-10"></i></a>
                      </span>
                    </li>
                  </ul>
                </li> -->
      <li class="dropdown">
        <a href="#" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1 " data-bs-toggle="dropdown">
          <div class="peer mR-10">
            <img class="w-2r bdrs-50p" src="assets/uploads/avatar/<?php echo $profilePic; ?>" alt="">
          </div>
          <div class="peer">
            <span class="fsz-sm c-grey-900"><?= isset($_SESSION['username']) ? $_SESSION['username'] : 'NA';  ?></span>
          </div>
        </a>
        <ul class="dropdown-menu fsz-sm border border-0 ">

          <li>
            <a href="profile" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
              <i class="ti-user mR-10"></i>
              <span>Profile</span>
            </a>
          </li>

          <li role="separator" class="divider"></li>
          <li>
            <a href="<?= BASE_URL ?>logout.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
              <i class="ti-power-off mR-10"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>