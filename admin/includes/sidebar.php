<!-- #Left Sidebar ==================== -->
<div class="sidebar">
  <div class="sidebar-inner">
    <!-- ### $Sidebar Header ### -->
    <div class="sidebar-logo">
      <div class="peers ai-c fxw-nw">
        <div class="peer peer-greed">
          <a class="sidebar-link td-n" href="./">
            <div class="peers ai-c fxw-nw">
              <div class="peer">
                <div class="logo">
                  <img src="../assets/images/logo/231123_New_ML_Favicon.ico" width="40" class="mt-3" alt="">
                </div>
              </div>
              <div class="peer peer-greed">
                <h2 class="lh-1 mB-0 logo-text fw-bold">Mindloops</h2>
              </div>
            </div>
          </a>
        </div>
        <div class="peer">
          <div class="mobile-toggle sidebar-toggle">
            <a href="#" class="td-n">
              <i class="ti-arrow-circle-left"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- ### $Sidebar Menu ### -->
    <ul class="sidebar-menu scrollable pos-r ">
      <li class="nav-item mT-30 actived">
        <a class="sidebar-link" href="./">
          <span class="icon-holder">
            <i class="c-red-500 ti-home"></i>
          </span>
          <span class="title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class='sidebar-link' href="magazine">
          <span class="icon-holder">
            <i class="c-orange-500  ti-book"></i>
          </span>
          <span class="title">Magazine </span>
        </a>
      </li>
      <li class="nav-item">
        <a class='sidebar-link' href="magazine_review">
          <span class="icon-holder">
            <i class="c-orange-500  ti-book"></i>
          </span>
          <span class="title">Magazine Review</span>
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="c-rose-500  ti-thought"></i>
          </span>
          <span class="title">Mindbooster</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="mindbooster-lesson">Lesson</a>
          </li>
          <li>
            <a href="mindbooster-subject">Subject</a>
          </li>
          <li>
            <a href="mindbooster-grade">Grade</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="c-purple-500  ti-video-clapper"></i>
          </span>
          <span class="title">Videos</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="video_category">Manage Category</a>
          </li>
          <li>
            <a href="videos">Manage Videos</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="c-orange-800  ti-write"></i>
          </span>
          <span class="title">Blog</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="blog-categories">Manage Blog Category</a>
          </li>

          <li>
            <a href="blog">Manage Blog</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="dropdown-toggle" href="javascript:void(0);">
          <span class="icon-holder">
            <i class="c-blue-500  ti-game"></i>
          </span>
          <span class="title">Loops</span>
          <span class="arrow">
            <i class="ti-angle-right"></i>
          </span>
        </a>
        <ul class="dropdown-menu">
          <li>
            <a href="loops_category">Loops Categories</a>
          </li>
          <li>
            <a href="game-category">Game Categories</a>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:void(0);">
              <span>Puzzles</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="matchword">Match Word</a>
              </li>
              <li>
                <a href="crossword">Crossword</a>
              </li>
              <li>
                <a href="jigsaw-category-images">Jigsaw</a>
              </li>
              <li>
                <a href="wordsearch">Word Search</a>
              </li>
              <li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:void(0);">
              <span>Quizes</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="quiz_category">MCQ</a>
              </li>
              <li>
                <a href="true_false_category">True False</a>
              </li>
              <li>
                <a href="funny-fill-in">Funny Fill-in</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="javascript:void(0);">
              <span>3D Games</span>
              <span class="arrow">
                <i class="ti-angle-right"></i>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="javascript:void(0);">Menu Item</a>
              </li>
              <li>
                <a href="javascript:void(0);">Menu Item</a>
              </li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class='sidebar-link' href="community">
          <span class="icon-holder">
            <i class="fa-regular fa-user" style="color: #cd8bdf;"></i> <!-- Using Font Awesome for users or community icon -->
          </span>
          <span class="title">Community</span>
        </a>
      </li>
      <?php if ($_SESSION['role_id'] == 1) { ?>
        <li class="nav-item">
          <a class='sidebar-link' href="badges">
            <span class="icon-holder">
              <i class="c-green-500 ti-medall"></i>
            </span>
            <span class="title">Badges</span>
          </a>
        </li>
        <li class="nav-item">
          <a class='sidebar-link' href="editor">
            <span class="icon-holder">
              <i class="c-teal-500 ti-pencil"></i>
            </span>
            <span class="title">Editor</span>
          </a>
        </li>
        <li class="nav-item">
          <a class='sidebar-link' href="tutor_profile.php">
            <span class="icon-holder">
              <i class="c-teal-500 ti-user"></i>
            </span>
            <span class="title">Tutor Profile</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class='sidebar-link' href="aditional-children">
            <span class="icon-holder">
              <i class="c-cyan-500 ti-reddit"></i>
            </span>
            <span class="title">Aditional Children</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class='sidebar-link' href="contactus">
            <span class="icon-holder">
              <i class="c-cyan-500 ti-envelope"></i>
            </span>
            <span class="title">Contact Us</span>
          </a>
        </li>
      <?php } ?>
    </ul>
  </div>
</div>