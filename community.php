<?php include 'includes/page-head.php';
include 'functions/function.php';
$curse_words = array('PukiMak', 'Butuh', 'Mampus', 'AnakHaram', 'bodoh', 'AnakSundal', 'PerempuanJalang', 'HaramJadah', 'Celaka', 'BetinaJalang', 'KepalaBapak', 'Kafir', 'Tolol', 'Bengap', 'Taik', 'MakKauHijau', 'AnakAnjing', 'AnakBabi', 'KepalaBabi', 'KepalaButoh', 'Lanjio', 'Lancau', 'Jubo', 'Aluto', 'Burit', 'Konek', 'Kote', 'Kewak', 'Cipap', 'Palat', 'Kontol', 'Badigol', 'Siol', 'Siot', 'KepalaButo', 'Bangang', 'Bongok', 'Bahlul', 'KepalaBana', 'MangkukAyun', 'NasiLemak50Sen', 'Pariahi', 'Haprak', 'Bangkai', 'Nate', 'Natang', 'Hanat', 'Lahanat', 'NokHaram', 'Hawau', 'Kunji', 'Paule', 'Sappe', 'Paria', 'Keling', 'Pundek', 'Balabak', 'Tonton', 'Toli', 'Popong', 'Creet', 'Kimbet', 'Kentot', 'Amput', 'Jimbet', 'Lan', 'Gau', 'Chat', 'PokGai', 'DaFeiGei', 'HumChat', 'HamKaChan', 'HamKaLing', 'Hei', 'Cibai', 'LaoEr', 'Fuck', 'Asshole', 'Whore', 'Fucker', 'BloodyAss', 'Sonofabitch', 'MotherFucker', 'HandJob', 'Bastard', 'Cunt', 'BlowJob', 'Jerk-off', 'Pussy', 'Slut', 'Lahabau', 'Dick', 'Suckit', 'Shit', 'Ass', 'BloodyHell', 'Butt', 'AssWhip', 'Ass', 'Pieceofshit', 'Dammit', 'Damn', 'JackAss', 'Douche', 'Dayumn');
function censorWords($paragraph, $censoredWords)
{
    // Case-insensitive search for censored words
    $censoredWords = array_map('strtolower', $censoredWords);
    $paragraph = preg_replace_callback('/\b(' . implode('|', array_map('preg_quote', $censoredWords, array('/'))) . ')\b/iu', function ($matches) {
        return str_repeat('*', mb_strlen($matches[0]));
    }, $paragraph);

    return $paragraph;
}

// Example usage:
// $paragraph = "This is a sample paragraph with some censored words like bad and evil.";
// // $censoredWords = array('bad', 'evil',);

// $censoredParagraph = censorWords($paragraph, $censoredWords);
// echo $censoredParagraph;

// exit;
?>

<!-- ================================== #Main ============================ -->
<style>
    #loading_slow {
        display: block;
        width: 100%;
        height: 100%;
        position: fixed;
        z-index: 100;
        background: rgba(0, 0, 0, 0.6) url('assets/images/logo/loading.gif') center no-repeat;
        background-size: 10%;
        backdrop-filter: blur(5px);
        /* Apply a blur effect to the content behind */
    }
</style>

<body class="bg-white text-dark">
    <div id="loading_slow"></div>
    <?php include 'includes/page-header.php';
    //include 'display_comments.php';
    ?>

    <div class="wrapper ">
        <main class="main-content">
            <!-- Your content here -->
            <!-- <div class="leader p-md-5 p-sm-5 container">
                    <img src="<?= BASE_URL ?>/assets/images/homepage/leader.png" class="card-img-top img-fluid mw-100" alt="Card 1">
                </div> -->
            <div class="container-fluid">

                <div class="row py-4 px-5">
                    <!-- Image column -->
                    <!-- <div class="col-md-9 mx-5">
                    </div> -->
                    <!-- Image column -->
                    <div class="col-md-12 d-flex justify-content-end align-items-end bg-white px-lg-5">
                        <div class="d-flex align-items-center justify-content-end bg-white px-lg-5 me-md-3">
                            <div class="input-group color-search">
                                <input type="text" class="form-control rounded-pill border-info position-relative bg-white text-dark" placeholder="Search" id="search-input">
                                <div class="position-absolute end-0 top-50 translate-middle-y">
                                    <span class="input-group-text bg-transparent border-0">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row py-4">
                    <div class="col-md-1 col-sm-12">

                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-3 py-3">
                        <div class="mx-md-5 px-md-3">
                            <div class="container mx-md-6">
                                <div class="text-dark fw-bolder py-2">Teacher Resources</div>
                                <div class="hr-container">
                                    <div class="hr-left"></div>
                                    <div class="hr-right"></div>
                                    <div class="hr-border"></div>
                                </div>
                                <div class="community-text py-1">
                                    <p>
                                        A collaborative platform to share, access, and discuss teaching materials, strategies, and ideas with variety professional educators.
                                    </p>
                                </div>
                                <br><br>
                                <div class="text-dark fw-bolder py-2">Rules</div>
                                <div class="hr-container">
                                    <div class="hr-left"></div>
                                    <div class="hr-right"></div>
                                    <div class="hr-border"></div>
                                </div>
                                <div class="community-text py-1">
                                    <span>
                                        1. Be polite and respectful in your interactions with others. Avoid offensive language and personal attacks.
                                    </span>
                                    <div class="py-3">
                                        <span>
                                            2. Ensure your post is relevant to the community's topic or purpose.
                                        </span>
                                    </div>
                                </div>
                                <div class="py-5">
                                    <?php
                                    $communityQuery = "SELECT * FROM `community` WHERE
                                        `community_status` = 1";
                                    $communityResult = mysqli_query($mysqli, $communityQuery);
                                    while ($communityRow = mysqli_fetch_assoc($communityResult)) {
                                    ?>
                                        <a href="community?community_id=<?php echo $communityRow['community_id']; ?>" class="btn community-button rounded-pill mb-3">
                                            <?php echo $communityRow['community_name']; ?>
                                        </a><br>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-7 col-sm-12 py-5">
                        <!-- <div class="p-3 text-secondary" style="background-color: #F4F4F6;">Have something to share?</div><br> -->

                        <?php if (isset($_SESSION['uid'])) { ?>
                            <!-- Add this button to trigger the modal -->
                            <div class="p-3 text-secondary" style="background-color: #F4F4F6; " data-bs-toggle="modal" data-bs-target="#shareModal">Have something to share?</div><br>
                        <?php } else { ?>
                            <div class="p-3 text-secondary" style="background-color: #F4F4F6; " data-bs-toggle="modal" data-bs-target="#loginModal">Have something to share?</div><br>


                        <?php } ?>
                        <!-- The modal -->
                        <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content bg-white text-dark">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="shareModalLabel">Share Something</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Your form goes here -->
                                        <?php $uid = $_SESSION['uid']; ?>
                                        <form action="" method="POST" enctype="multipart/form-data" id="ArticleForm">
                                            <input type="hidden" id="uid" name="uid" value="<?php echo  $uid; ?>" required>
                                            <!-- <input type="text" id="category_id" name="category_id" value="<?php echo  $article_id; ?>" required> -->
                                            <div class="mb-3">
                                                <label for="community_id" class="form-label">Select Community:</label>
                                                <select class="form-select" id="community_id" name="community_id" required>

                                                    <?php
                                                    // Fetch communities from the database

                                                    $communityfetchQuery = "SELECT `community_id`, `community_name` FROM `community` WHERE 1";
                                                    $communityfetchResult = mysqli_query($mysqli, $communityfetchQuery);

                                                    // Display communities in the dropdown
                                                    while ($communityfetchRow = mysqli_fetch_assoc($communityfetchResult)) {

                                                        echo '<option name="community_id" value="' . $communityfetchRow['community_id'] . '">' . $communityfetchRow['community_name'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="a_name" class="form-label">Article Title</label>

                                                <input type="text" class="form-control" id="a_name" name="a_name" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="a_content" class="form-label">Article Content</label>
                                                <textarea class="form-control" id="summernote" name="a_content"></textarea>
                                            </div>

                                            <!-- <div class="mb-3">
                                                <label for="a_status" class="form-label">Status:</label>
                                                <select class="form-select" id="a_status" name="a_status" required>
                                                    <option value="1">Publish</option>
                                                    <option value="0">Unpublish</option>
                                                </select>
                                            </div> -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success btn-sm" name="add_article_user">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        // check if community_id is set
                        if (isset($_GET['community_id'])) {
                            $community_id = $_GET['community_id'];

                            $communityArtQuery = "SELECT * FROM `community` c
                     
                        LEFT JOIN community_article ca
                        ON ca.article_cc_id = c.community_id
                        LEFT JOIN user_table ut
                        ON ut.uid = ca.article_created_by
                        WHERE `article_status` = 1 AND `community_status` = 1 AND community_id=$community_id
                        ORDER BY ca.article_created_at DESC";
                        } 
                        // check if article_id is set
                        else if (isset($_GET['article_id'])) {
                            $article_id = $_GET['article_id'];

                            $communityArtQuery = "SELECT * FROM `community` c
                            
                            LEFT JOIN community_article ca
                            ON ca.article_cc_id = c.community_id
                            LEFT JOIN user_table ut
                            ON ut.uid = ca.article_created_by
                            WHERE `article_status` = 1 AND `community_status` = 1 AND ca.article_id =$article_id ORDER BY ca.article_created_at DESC ";
                        } 
                        // else fetch all the community
                        else {
                            $communityArtQuery = "SELECT * FROM `community` c
                                
                                LEFT JOIN community_article ca
                                ON ca.article_cc_id = c.community_id
                                LEFT JOIN user_table ut
                                ON ut.uid = ca.article_created_by
                                WHERE `article_status` = 1 AND `community_status` = 1  ORDER BY ca.article_created_at DESC ";
                        }
                        $communityArtResult = mysqli_query($mysqli, $communityArtQuery);
                        while ($communityArtRow = mysqli_fetch_assoc($communityArtResult)) {
                            $article_id = $communityArtRow['article_id'];
                            $profilePic = $communityArtRow['profile_pic'];
                            $article_likes = $communityArtRow['article_likes'];
                            $article_liked_by = [];
                            if (!empty($communityArtRow['article_liked_by'])) {
                                $article_liked_by = explode(',', $communityArtRow['article_liked_by']);
                            }

                        ?>
                            <div class="card shadow-sm rounded-4 p-5 search bg-white text-dark">
                                <!-- Columns for text -->

                                <div class="col-md-12 container">

                                    <div class="d-flex justify-content-between">
                                        <!-- Profile Picture -->
                                        <?php
                                        $profilePic = isset($communityArtRow['profile_pic']) && $communityArtRow['profile_pic']
                                            ? (filter_var($communityArtRow['profile_pic'], FILTER_VALIDATE_URL)
                                                ? $communityArtRow['profile_pic']
                                                : 'assets/uploads/avatar/' . htmlspecialchars($communityArtRow['profile_pic'], ENT_QUOTES, 'UTF-8'))
                                            : 'assets/images/homepage/Group 804.png';
                                        ?>
                                        <img src="<?= $profilePic ?>" class="img-fluid rounded-circle" width="50" alt="Profile Picture">

                                        <!-- Name and Additional Data -->
                                        <div class="mx-3 align-self-center">
                                            <?= htmlspecialchars($communityArtRow['username'] ?? explode('@', $communityArtRow['email'])[0], ENT_QUOTES, 'UTF-8') ?>
                                            <?php
                                            $originalDate = $communityArtRow['article_created_at'];
                                            $formattedDate = date('j F Y', strtotime($originalDate));
                                            ?>
                                            <div class="text-secondary"><?= htmlspecialchars($formattedDate, ENT_QUOTES, 'UTF-8') ?></div>
                                        </div>

                                        <div class="dropdown ms-auto">
                                            <i class="fas fa-ellipsis-vertical" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                            <ul class="dropdown-menu">
                                                <?php if ($communityArtRow['article_created_by'] == $uid) { ?>
                                                    <li>
                                                        <button class="dropdown-item" data-bs-toggle="modal" onclick="enableSummerNote('update_summernote<?= $communityArtRow['article_id'] ?>')" data-bs-target="#updateArticleModal<?= $communityArtRow['article_id'] ?>">
                                                            <i class="fas fa-pen mx-2"></i> Edit
                                                        </button>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="community?article_id_delete=<?= htmlspecialchars($article_id, ENT_QUOTES, 'UTF-8'); ?>" onclick="return deletearticle('<?= htmlspecialchars($communityArtRow['article_id'], ENT_QUOTES, 'UTF-8') ?>')">
                                                            <i class="fas fa-trash mx-2"></i> Delete
                                                        </a>
                                                    </li>
                                                <?php } else { ?>
                                                    <li>
                                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#reportModal" onclick="reportArticle('<?= htmlspecialchars($article_id, ENT_QUOTES, 'UTF-8') ?>')" href="#">
                                                            <i class="fa-solid fa-flag mx-2"></i> Report
                                                        </a>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>



                                    <!-- Update Article Modal -->
                                    <div class="modal fade" id="updateArticleModal<?= $communityArtRow['article_id'] ?>" tabindex="-1" aria-labelledby="updateArticleModalLabel<?= $communityArtRow['article_id'] ?>" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateArticleModalLabel<?= $communityArtRow['article_id'] ?>">Update Article</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body bg-white text-dark">
                                                    <!-- Your form goes here -->
                                                    <form action="" method="POST" enctype="multipart/form-data" id="UpdateArticleForm<?= $communityArtRow['article_id'] ?>">
                                                        <input type="hidden" id="article_id<?= $communityArtRow['article_id'] ?>" name="article_id" value="<?= $communityArtRow['article_id'] ?>" required>
                                                        <div class="mb-3">
                                                            <label for="update_community_id" class="form-label">Select Community:</label>
                                                            <select class="form-select" id="update_community_id<?= $communityArtRow['article_id'] ?>" name="update_community_id" required>
                                                                <?php
                                                                // Fetch communities from the database
                                                                $communityfetchQuery = "SELECT `community_id`, `community_name` FROM `community` WHERE 1";
                                                                $communityfetchResult = mysqli_query($mysqli, $communityfetchQuery);

                                                                // Display communities in the dropdown
                                                                while ($communityfetchRow = mysqli_fetch_assoc($communityfetchResult)) {
                                                                    $selected = ($communityfetchRow['community_id'] == $communityArtRow['article_cc_id']) ? 'selected' : '';
                                                                    echo '<option name="update_community_id" value="' . $communityfetchRow['community_id'] . '" ' . $selected . '>' . $communityfetchRow['community_name'] . '</option>';
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="update_a_name" class="form-label">Article Title</label>
                                                            <input type="text" class="form-control" id="update_a_name<?= $communityArtRow['article_id'] ?>" name="update_a_name" value="<?= $communityArtRow['article_title'] ?>" required>
                                                        </div>

                                                        <!-- <div class="mb-3">
                                                            <label for="update_a_content" class="form-label">Article Content</label>
                                                            <textarea class="form-control" id="update_summernote<?= $communityArtRow['article_id'] ?>" name="update_a_content" maxlength="1000" required><?= $communityArtRow['article_content'] ?></textarea>
                                                        </div> -->
                                                        <div class="mb-3">
                                                            <label for="update_a_content" class="form-label">Article Content</label>
                                                            <textarea class="update_a_content form-control" id="update_summernote<?= $communityArtRow['article_id'] ?>" name="update_a_content" required><?= $communityArtRow['article_content'] ?></textarea>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success btn-sm" name="update_article_user">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <h5 class="py-4 fw-bold"><?php echo censorWords(ucwords($communityArtRow['article_title']), $curse_words); ?></h5>

                                    <p class="community-text">
                                        <?php echo censorWords($communityArtRow['article_content'], $curse_words);  ?>
                                    </p>
                                </div>


                                <?php if (isset($_SESSION['uid'])) { ?>
                                    <div class="col-md-12 py-3">


                                        <?php $article_likes = $communityArtRow['article_likes'];
                                        $article_liked_by = [];
                                        if (!empty($communityArtRow['article_liked_by'])) {
                                            $article_liked_by = explode(',', $communityArtRow['article_liked_by']);
                                        }

                                        // $article_liked_by = explode(',', $communityArtRow['article_liked_by']);
                                        $article_id = $communityArtRow['article_id']; ?>

                                        <button class="like-button border-0 bg-white text-dark" onclick="likeForumArticle('<?php echo $article_id; ?>','like')">
                                            <i id="heartIcon_<?php echo $article_id; ?>" class="fa-solid fa-heart" style="color: <?php echo in_array($uid, $article_liked_by) ? 'red' : '#979797'; ?>"></i>
                                            <span id="a_likes_<?php echo $article_id; ?>"><?php echo $article_likes; ?></span>
                                            <i class="bi bi-hand-thumbs-up mx-1 bg-white text-dark">Like</i>
                                        </button>


                                        <button class="like-button border-0 bg-white" onclick="toggleCommentSection('<?php echo $article_id; ?>')">
                                            <i class="fa-solid fa-message" style="color: #979797;"></i>
                                            <i class="bi bi-chat mx-1 bg-white text-dark">Comment</i>
                                        </button>

                                        <!-- <i class="bi bi-hand-thumbs-up mx-1">Like</i> -->
                                        <!-- <i class="fa-solid fa-comment mx-1"></i> -->
                                        <button class="like-button border-0 bg-white" data-bs-toggle="modal" data-bs-target="#share<?php echo $communityArtRow['article_id']; ?>">

                                            <i class="fa-solid fa-share mx-1" style="color: #979797;"></i>
                                            <i class="bi bi-share mx-1 bg-white text-dark">Share</i>
                                        </button>

                                    </div>

                                <?php } else { ?>
                                    <div class="col-md-12 py-3" data-bs-toggle="modal" data-bs-target="#loginModal">

                                        <i class="fa-solid fa-heart" style="color: #979797;"></i><span id="a_likes_<?php echo $communityArtRow['article_id']; ?>"></span>
                                        <i class="bi bi-hand-thumbs-up mx-1 bg-white text-dark">Like</i>

                                        <i class="fa-solid fa-comment" style="color: #979797;"></i>
                                        <i class="bi bi-chat mx-1 bg-white text-dark">Comment</i>
                                        <!-- <i class="bi bi-hand-thumbs-up mx-1">Like</i> -->
                                        <!-- <i class="fa-solid fa-comment mx-1"></i> -->
                                        <i class="fa-solid fa-share mx-1 " style="color: #979797;"></i>
                                        <i class="bi bi-share mx-1 bg-white text-dark">Share</i>

                                    </div>
                                <?php } ?>
                                <div class="modal fade" id="share<?= $communityArtRow['article_id'] ?>" tabindex="-1" aria-labelledby="addCommentModalLabel<?= $communityArtRow['article_id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header bg-white text-dark">
                                                <h5 class="modal-title" id="sharemodal<?= $communityArtRow['article_id'] ?>">Share this</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body bg-white text-dark">

                                                <div class="mb-3" style="text-decoration: none;">
                                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(BASE_URL . 'community?article_id=' . $communityArtRow['article_id']) ?>&quote=<?= urlencode("Explore innovation with Mindloops! Read now." . BASE_URL . 'community?article_id=' . $communityArtRow['article_id'] .  " #Mindloops #InnovationJourney #CreativityUnleashed") ?>" class=" mt-3" style="text-decoration: none;">
                                                        <img src="https://img.icons8.com/fluency/31/null/facebook-new.png" />
                                                    </a>

                                                    <!-- WhatsApp Share Button -->
                                                    <a href="https://wa.me/?text=<?= urlencode("Explore innovation with Mindloops! Read now." . BASE_URL . 'community?article_id=' . $communityArtRow['article_id'] . ' #Mindloops #InnovationJourney #CreativityUnleashed ') ?>" class="mt-3" style="text-decoration: none;">
                                                        <img src="https://img.icons8.com/color/36/null/whatsapp--v1.png" />
                                                    </a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <!-- Profile Picture, Topic Name, and Comments -->
                                <div class="col-md-12 comment-details-<?php echo $article_id; ?>" style="display: none;">
                                    <div class="row py-4">
                                        <div class="col-md-1">
                                            <!-- Leave this column empty for spacing -->
                                        </div>
                                        <div class="col-md-10">

                                            <div class="comment-section-<?php echo $article_id; ?>" style="display: none;">
                                                <form action="" id="comment_form<?= $article_id ?>" method="POST">
                                                    <div class="mb-3">

                                                        <textarea class="form-control bg-white text-dark summernotetext" required name="content" id="commentContent<?= $communityArtRow['article_id'] ?>" placeholder="Write a comment"></textarea>
                                                        <input type="hidden" name="article_id" value="<?php echo $article_id; ?>">
                                                        <input type="hidden" name="add_comment" value="add_comment">
                                                    </div>
                                                    <div class="mb-3 d-flex align-items-end flex-column">

                                                        <!-- You can add a submit button or handle the comment submission using JavaScript -->
                                                        <button style="border-radius:20px;" type="button" class="btn btn-primary" name="add_comment" onclick="submitComment(<?php echo $article_id; ?>)">Comment</button>

                                                    </div>

                                                </form>
                                            </div>

                                            <div class="article_comments" id="article_comment_<?= $article_id ?>"></div>



                                        </div>

                                    </div>
                                </div>






                            </div><br><br>
                        <?php } ?>

                    </div>

                </div>
            </div>
        </main>
    </div>
    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportModalLabel">Report Article</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white text-dark">
                    <form action="handle_report.php" id="reportForm" method="POST">
                        <div class="mb-3">
                            <label for="reportComment" class="form-label">Reason for Report:</label>
                            <textarea class="form-control bg-white text-dark" name="report_comment" id="reportComment" placeholder="Specify the reason for reporting the article" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="abuseLevel" class="form-label">Level:</label>
                            <select class="form-select" name="level" id="abuseLevel" required>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                            </select>
                        </div>
                        <input type="hidden" name="article_id" value="" id="modalArticlereport"> <!-- You can dynamically set the article ID using JavaScript -->
                        <button type="button" onclick="submitArticleReport()" name="report_abusive_article" class="btn btn-danger">Report Article</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Reply Modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Reply to Comment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white text-dark">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="commentContent" class="form-label">Reply:</label>
                            <textarea class="form-control bg-white text-dark summernotetext" name="comment_content" id="commentContent<?php echo $topLevelCommentId ?>" placeholder="Write a comment"></textarea>
                            <input type="hidden" name="comment_article_id" value="" id="modalArticleId">
                            <input type="hidden" name="comment_parent_id" value="" id="modalCommentId">
                        </div>
                        <button type="submit" name="add_reply_comment" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updatereplyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Edit Reply</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-white text-dark">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="commentContent" class="form-label"> Edit Reply:</label>
                            <textarea class="form-control bg-white text-dark summernotetext" name="edit_comment_content" id="editcommentContent" value="" placeholder="Write a comment"></textarea>
                            <input type="hidden" name="comment_article_id" value="" id="editmodalArticleId">
                            <input type="hidden" name="comment_parent_id" value="" id="editmodalCommentId">
                        </div>
                        <button type="submit" name="update_reply_comment" class="btn btn-primary">Save Changes</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include 'includes/page-footer.php' ?>
    <script>
        // const 


        function toggleCommentSection(articleId) {


            var commentSection = document.querySelector('.comment-section-' + articleId);
            commentSection.style.display = commentSection.style.display === 'none' ? 'block' : 'none';

            var commentDetails = document.querySelector('.comment-details-' + articleId);
            commentDetails.style.display = commentDetails.style.display === 'none' ? 'block' : 'none';
        }

        function toggleEdit(comment_id) {

            var editcommentsection = document.querySelector('.edit-comment-section-' + comment_id);
            editcommentsection.style.display = editcommentsection.style.display === 'none' ? 'block' : 'none';


        }

        function openReplyModal(articleId, commentId) {


            // Set the articleId and commentId in the modal
            $('#modalArticleId').val(articleId);
            $('#modalCommentId').val(commentId);
            var replysection = document.querySelector('.replysection-' + commentId);
            replysection.style.display = replysection.style.display === 'none' ? 'block' : 'none';
            // Open the reply modal
            // $('#replyModal').modal('show');
        }


        function openEditModal(articleId, commentId) {


            // Set the articleId and commentId in the modal
            $('#editmodalArticleId').val(articleId);
            $('#editmodalCommentId').val(commentId);
            // $('#editcommentContent').text(commentContent);
            var editreplysection = document.querySelector('.editreplysection-' + commentId);
            editreplysection.style.display = editreplysection.style.display === 'none' ? 'block' : 'none';
            // Open the reply modal
            // $('#updatereplyModal').modal('show');
        }

        function deletecomment(comment_id, article_id) {
            var x = confirm("Are you sure want to delete this Comment?");

            if (!x) {
                return false;
            }

            // console.log(comment_id, article_id)
            fetch('functions/community_ajax.php?delete_comment=yes&comment_id=' + comment_id).then(data => data.text()).then(data => {
                alert(data);
                let div_id = "article_comment_" + article_id;
                console.log(div_id);
                // comment_content.value = ""
                displayComments(article_id, div_id, 0);
            });

            return false;

        }

        function deletearticle(article) {
            var x = confirm("Are you sure want to delete this Article?");
            if (!x) {
                return false
            }
            // console.log(article)

            fetch('functions/community_ajax.php?delete_article=yes&article_id=' + article).then(data => data.text()).then(data => {
                alert(data);
                if (data == 'Article Deleted') {

                    window.location.reload();
                }
            });

            return false
        }

        const likeForumArticle = (id) => {
            let url = 'likeDislikeQuery.php?likeForumArticle=yes&article_id=' + id + '&action=like';

            fetch(url)
                .then(data => data.text())
                .then(likeCount => {
                    let like_id = 'a_likes_' + id;
                    document.getElementById(like_id).innerHTML = likeCount;

                    // Change the color of the heart icon to red
                    let heartIcon = document.getElementById('heartIcon_' + id);
                    heartIcon.style.color = 'red';
                });
        };
        $(document).ready(function() {
            $("#search-input").on("keyup", function() {
                var searchText = $(this).val().toLowerCase();
                $(".search").each(function() {
                    var cardContent = $(this).text().toLowerCase();
                    if (cardContent.indexOf(searchText) == -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });
        });

        $('#summernote').summernote({
            height: 200,
            toolbar: [
                ['insert', ['picture', 'video', 'link']],
            ]
        });

        function enableSummerNote(article_id) {
            $('#' + article_id).summernote({
                toolbar: [
                    ['insert', ['picture', 'video', 'link']],
                ]
            });
            //$('#' + article_id).summernote('code', '');
        }

        function clearSummerNote(article_id) {
            $('#commentContent' + article_id).summernote('code', '');
        }


        let article_comments = document.getElementsByClassName('article_comments');
        // console.log(article_comments)
        Array.from(article_comments).forEach(article => {
            // console.log(article.id);
            let div_id = article.id;
            article_arr = div_id.split('_');
            let article_id = article_arr[article_arr.length - 1];
            // console.log(article_id);
            displayComments(article_id, div_id, 0);
        });

        async function displayComments(article_id, div_id, indent) {
            // console.log(article_id, div_id);
            await fetch(`display_comments.php?artcle_id=${article_id}&indent=${indent}`).then(data => data.text()).then(data => {
                if (data) {
                    document.getElementById(div_id).innerHTML = '';
                    document.getElementById(div_id).innerHTML = data;

                    $(document).ready(function() {
                        $('.summernotetext').summernote({
                            toolbar: [
                                ['insert', ['picture', 'video', 'link', 'audio']],
                            ]
                        });
                    });

                    var fileInputs = document.querySelectorAll('input[type="file"]');

                    fileInputs.forEach(function(fileInput) {
                        // console.log(fileInput)
                        // fileInput.style.border = '2px solid red';
                        fileInput.setAttribute('onchange', 'checkImageSize(event)');

                    });
                }

            }).finally(() => {
                document.getElementById('loading_slow').style.display = 'none';

            })
        }

        function submitComment(article_id) {
            // console.log(article_id);
            let form = document.getElementById("comment_form" + article_id);
            // console.log(form)
            let comment_content = document.getElementById("commentContent" + article_id);
            if (comment_content.value == "") {
                alert("Please write a comment!!");
                comment_content.focus();
                return false;
            }

            document.getElementById('loading_slow').style.display = 'block'
            let formData = new FormData(form);
            fetch('functions/community_ajax.php', {
                method: "POST",
                body: formData
            }).then(data => data.text()).then(data => {
                // console.log(data);
                // return false

                let div_id = "article_comment_" + article_id;
                // console.log(div_id);
                comment_content.value = ""
                clearSummerNote(article_id);
                displayComments(article_id, div_id, 0);
                document.getElementById('loading_slow').style.display = 'none'
            })

        }


        function replyComment(e, obj) {
            e.preventDefault();

            // console.log(obj.reply_content.value)
            // return false
            if (obj.reply_content.value == '') {
                alert("Please enter your comment");
                obj.reply_content.focus();
                return false;
            }
            document.getElementById('loading_slow').style.display = 'block'
            let formData = new FormData(obj);

            fetch('functions/community_ajax.php?replycomment=yes', {
                method: "POST",
                body: formData
            }).then(data => data.text()).then(data => {
                // alert(data);
                let article_id = obj.reply_article_id.value;
                let div_id = "article_comment_" + article_id;

                displayComments(article_id, div_id, 0);
                document.getElementById('loading_slow').style.display = 'none'

            });
        }

        function updatereplyComment(e, obj) {
            e.preventDefault();

            // console.log(obj.reply_content.value)
            // return false
            if (obj.editreply_content.value == '') {
                return false;
            }
            document.getElementById('loading_slow').style.display = 'block'

            let formData = new FormData(obj);

            fetch('functions/community_ajax.php?updatereplycomment=yes', {
                method: "POST",
                body: formData
            }).then(data => data.text()).then(data => {
                alert(data);
                let article_id = obj.editreply_article_id.value;
                let div_id = "article_comment_" + article_id;
                // console.log(div_id);
                // comment_content.value = ""
                displayComments(article_id, div_id, 0);
                document.getElementById('loading_slow').style.display = 'none'

            });
        }

        function reportArticle(article_id) {
            // console.log(article_id)
            document.getElementById('modalArticlereport').value = article_id;

        }

        function submitArticleReport() {
            let form = document.getElementById('reportForm');
            /* console.log(form.report_comment.value); */
            // return false
            if (form.report_comment.value == '') {
                alert('Please mention reson of report');
                form.report_comment.focus();
                return false;
            }
            document.getElementById('loading_slow').style.display = 'block';
            let formData = new FormData(form);
            fetch('functions/community_ajax.php?report_article=yes', {
                method: 'post',
                body: formData
            }).then(data => data.text()).then(data => {
                document.getElementById('loading_slow').style.display = 'none'
                alert("Thanks for reporting the articel. We will look into the matter");

                window.location.reload();
            });
        }

        function showAllComments(obj) {
            obj.style.display = 'none';
            let id_btn = obj.id
            let id_arr = id_btn.split('#');
            // console.log(id_arr);
            document.getElementById(id_arr[0] + '_' + id_arr[1]).style.display = 'block';
        }



        // document.addEventListener("DOMContentLoaded", function() {
        //     // Hide the loading container
        //     var loadingContainer = document.getElementById("loading_slow");
        //     loadingContainer.style.display = "none";
        // })





        function checkImageSize(event) {
            // Get the file input element
            var input = event.target;
            console.log(input);
            // Check if any file is selected
            if (input.files && input.files.length > 0) {
                // Iterate through each selected file
                for (var i = 0; i < input.files.length; i++) {
                    var fileSize = input.files[i].size; // in bytes

                    // Check if the file size is greater than 2 MB
                    var maxSize = 2 * 1024 * 1024; // 2 MB in bytes
                    if (fileSize > maxSize) {
                        alert('Image size must be less than 2 MB.');
                        // Optionally, clear the file input to let the user choose a different image
                        input.value = '';
                        return; // Stop further processing if any file exceeds the size limit
                    }
                }
            }
        }
    </script>
</body>