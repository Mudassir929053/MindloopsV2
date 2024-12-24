<?php
session_start();
require "config/connection.php";
$uid = $_SESSION['uid'];
extract($_GET);

$censorWords  = array('PukiMak', 'Butuh', 'Mampus', 'AnakHaram', 'bodoh', 'AnakSundal', 'PerempuanJalang', 'HaramJadah', 'Celaka', 'BetinaJalang', 'KepalaBapak', 'Kafir', 'Tolol', 'Bengap', 'Taik', 'MakKauHijau', 'AnakAnjing', 'AnakBabi', 'KepalaBabi', 'KepalaButoh', 'Lanjio', 'Lancau', 'Jubo', 'Aluto', 'Burit', 'Konek', 'Kote', 'Kewak', 'Cipap', 'Palat', 'Kontol', 'Badigol', 'Siol', 'Siot', 'KepalaButo', 'Bangang', 'Bongok', 'Bahlul', 'KepalaBana', 'MangkukAyun', 'NasiLemak50Sen', 'Pariahi', 'Haprak', 'Bangkai', 'Nate', 'Natang', 'Hanat', 'Lahanat', 'NokHaram', 'Hawau', 'Kunji', 'Paule', 'Sappe', 'Paria', 'Keling', 'Pundek', 'Balabak', 'Tonton', 'Toli', 'Popong', 'Creet', 'Kimbet', 'Kentot', 'Amput', 'Jimbet', 'Lan', 'Gau', 'Chat', 'PokGai', 'DaFeiGei', 'HumChat', 'HamKaChan', 'HamKaLing', 'Hei', 'Cibai', 'LaoEr', 'Fuck', 'Asshole', 'Whore', 'Fucker', 'BloodyAss', 'Sonofabitch', 'MotherFucker', 'HandJob', 'Bastard', 'Cunt', 'BlowJob', 'Jerk-off', 'Pussy', 'Slut', 'Lahabau', 'Dick', 'Suckit', 'Shit', 'Ass', 'BloodyHell', 'Butt', 'AssWhip', 'Ass', 'Pieceofshit', 'Dammit', 'Damn', 'JackAss', 'Douche', 'Dayumn');
function censorWords($paragraph, $censoredWords)
{
    // Case-insensitive search for censored words
    $censoredWords = array_map('strtolower', $censoredWords);
    $paragraph = preg_replace_callback('/\b(' . implode('|', array_map('preg_quote', $censoredWords, array('/'))) . ')\b/iu', function ($matches) {
        return str_repeat('*', mb_strlen($matches[0]));
    }, $paragraph);

    return $paragraph;
}
// Check if the function is not defined before defining it
displayComments($artcle_id, $indent, $uid, $mysqli);



function displayComments($article_id, $indent = 0, $uid, $mysqli)
{
    // global $mysqli, $article_id, $uid;
    $censorWords  = array('PukiMak', 'Butuh', 'Mampus', 'bodoh', 'AnakHaram', 'AnakSundal', 'PerempuanJalang', 'HaramJadah', 'Celaka', 'BetinaJalang', 'KepalaBapak', 'Kafir', 'Tolol', 'Bengap', 'Taik', 'MakKauHijau', 'AnakAnjing', 'AnakBabi', 'KepalaBabi', 'KepalaButoh', 'Lanjio', 'Lancau', 'Jubo', 'Aluto', 'Burit', 'Konek', 'Kote', 'Kewak', 'Cipap', 'Palat', 'Kontol', 'Badigol', 'Siol', 'Siot', 'KepalaButo', 'Bangang', 'Bongok', 'Bahlul', 'KepalaBana', 'MangkukAyun', 'NasiLemak50Sen', 'Pariahi', 'Haprak', 'Bangkai', 'Nate', 'Natang', 'Hanat', 'Lahanat', 'NokHaram', 'Hawau', 'Kunji', 'Paule', 'Sappe', 'Paria', 'Keling', 'Pundek', 'Balabak', 'Tonton', 'Toli', 'Popong', 'Creet', 'Kimbet', 'Kentot', 'Amput', 'Jimbet', 'Lan', 'Gau', 'Chat', 'PokGai', 'DaFeiGei', 'HumChat', 'HamKaChan', 'HamKaLing', 'Hei', 'Cibai', 'LaoEr', 'Fuck', 'Asshole', 'Whore', 'Fucker', 'BloodyAss', 'Sonofabitch', 'MotherFucker', 'HandJob', 'Bastard', 'Cunt', 'BlowJob', 'Jerk-off', 'Pussy', 'Slut', 'Lahabau', 'Dick', 'Suckit', 'Shit', 'Ass', 'BloodyHell', 'Butt', 'AssWhip', 'Ass', 'Pieceofshit', 'Dammit', 'Damn', 'JackAss', 'Douche', 'Dayumn');

    $commentsQuery = "SELECT * FROM `community_article_comment` cac
                                                    LEFT JOIN user_table ut
                                                    ON cac.comment_created_by= ut.uid
                                                    WHERE
                                                        `comment_status` = 1 AND comment_article_id = $article_id AND comment_parent_id IS NULL
                                                    ORDER BY cac.comment_created_date desc";

    $commentsResult = mysqli_query($mysqli, $commentsQuery);
    $numberOfRows = mysqli_num_rows($commentsResult);
    // exit;


    $comments = 0;
    while ($commentRow = mysqli_fetch_assoc($commentsResult)) {
        $comment_id = $commentRow['comment_id'];
        $profilePic = $commentRow['profile_pic'] ? (filter_var($commentRow['profile_pic'], FILTER_VALIDATE_URL) ? $commentRow['profile_pic'] : 'assets/uploads/avatar/' . $commentRow['profile_pic']) : 'assets/images/homepage/Group 804.png';

        if ($comments == 5) {
            if (($numberOfRows - 5) > 0) {
                echo "<div onclick='showAllComments(this)' id='show_all_comments#$article_id' style='cursor: pointer'><u>Show more comments (" . ($numberOfRows - 5) . ")</u></div>";
                echo "<div id='show_all_comments_$article_id' style='display: none'>";
            }
        }
        echo '<div class="comment-container" style="margin-left: ' . ($indent * 20) . 'px;">';
        echo '<div class="d-flex align-items-center">';
        echo '<img src="' . $profilePic . '" class="img-fluid rounded-circle" width="50" alt="Profile Picture">';
        echo '<div class="mx-3 align-self-center">' .
            (($commentRow['username'] != '') ? $commentRow['username'] : explode('@', $commentRow['email'])[0]) .
            '</div>';


        if ($commentRow['comment_created_by'] == $uid) {
            // Display update and delete buttons for comments created by the current user
            echo '<div class="dropdown ms-auto">';
            echo '<i class="fas fa-ellipsis-vertical" data-bs-toggle="dropdown" aria-expanded="false"></i>';
            echo '<ul class="dropdown-menu">';
            echo '<li>'; ?>
            <button class="dropdown-item" onclick="openEditModal(<?php echo $commentRow['comment_article_id']; ?>, <?php echo $commentRow['comment_id']; ?>)">
                <i class="fas fa-pen mx-2"></i> Edit
            </button>

        <?php
            echo '</li>';
            echo '<li>';
            echo '<a class="dropdown-item" href="community?comment_id=' . $comment_id . '" onclick="return deletecomment(' . $comment_id . ',' . $article_id . ')">';
            echo '<i class="fas fa-trash mx-2"></i> Delete';
            echo '</a>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
            // Update Modal
            echo '<div class="modal fade" id="updateModal' . $comment_id . '" tabindex="-1" aria-labelledby="editCommentModalLabel' . $comment_id . '" aria-hidden="true">';
            // Modal content for updating comments
            echo '</div>';
        }

        echo '</div>';
        echo '<p class="community-text py-2">' . (censorWords($commentRow['comment_content'], $censorWords)) . '</p>';



        echo '<button class="like-button border-0 bg-white" onclick="openReplyModal(' . $article_id . ', ' . $comment_id . ')">';
        echo '<i class="fa-solid fa-reply mx-1" style="color: #979797;"></i>';
        echo '<i class="bi bi-share mx-1 bg-white text-dark">Reply</i>';
        echo '</button>'; ?>
        <div class="editreplysection-<?php echo $comment_id; ?>" style="display: none;">
            <form action="" onsubmit="updatereplyComment(event,this)" method="POST">
                <div class="mb-3">
                    <textarea class="form-control bg-white text-dark summernotetext" name="editreply_content" id="editreplyContent<?= $commentRow['comment_id'] ?>" placeholder="Write a comment"><?php echo censorWords($commentRow['comment_content'], $censorWords); ?></textarea>
                    <input type="hidden" name="editreply_comment_id" value="<?php echo $comment_id; ?>">
                    <input type="hidden" name="editreply_article_id" value="<?php echo $article_id; ?>">
                </div>
                <div class="mb-3 d-flex align-items-end flex-column">
                    <button style="border-radius:20px;" class="btn btn-primary" name="update_reply_comment">Edit Reply</button>
                </div>
            </form>
        </div>



        <div class="replysection-<?php echo $comment_id; ?>" style="display: none;">
            <form action="" onsubmit="replyComment(event,this)" method="POST">
                <div class="mb-3">
                    <textarea class="form-control bg-white text-dark summernotetext" name="reply_content" id="replyContent<?= $commentRow['comment_id'] ?>" placeholder="Write a comment"></textarea>
                    <input type="hidden" name="reply_comment_id" value="<?php echo $comment_id; ?>">
                    <input type="hidden" name="reply_article_id" value="<?php echo $article_id; ?>">
                </div>
                <div class="mb-3 d-flex align-items-end flex-column">
                    <button style="border-radius:20px;" class="btn btn-primary" name="add_reply_comment">Reply</button>
                </div>
            </form>
        </div>


        <?php echo '<hr>';

        // Display nested commentsreply-section-
        displayReply($comment_id, $article_id, $indent + 1, $uid, $mysqli);

        echo '</div>';
        $comments++;
    }
    if ($comments > 5) {
        echo "</div>";
    }
}

function displayReply($parentCommentId = NULL, $article_id, $indent, $uid, $mysqli)
{
    // global $mysqli, $article_id, $uid;
    $censorWords  = array('PukiMak', 'Butuh', 'Mampus', 'AnakHaram', 'bodoh', 'AnakSundal', 'PerempuanJalang', 'HaramJadah', 'Celaka', 'BetinaJalang', 'KepalaBapak', 'Kafir', 'Tolol', 'Bengap', 'Taik', 'MakKauHijau', 'AnakAnjing', 'AnakBabi', 'KepalaBabi', 'KepalaButoh', 'Lanjio', 'Lancau', 'Jubo', 'Aluto', 'Burit', 'Konek', 'Kote', 'Kewak', 'Cipap', 'Palat', 'Kontol', 'Badigol', 'Siol', 'Siot', 'KepalaButo', 'Bangang', 'Bongok', 'Bahlul', 'KepalaBana', 'MangkukAyun', 'NasiLemak50Sen', 'Pariahi', 'Haprak', 'Bangkai', 'Nate', 'Natang', 'Hanat', 'Lahanat', 'NokHaram', 'Hawau', 'Kunji', 'Paule', 'Sappe', 'Paria', 'Keling', 'Pundek', 'Balabak', 'Tonton', 'Toli', 'Popong', 'Creet', 'Kimbet', 'Kentot', 'Amput', 'Jimbet', 'Lan', 'Gau', 'Chat', 'PokGai', 'DaFeiGei', 'HumChat', 'HamKaChan', 'HamKaLing', 'Hei', 'Cibai', 'LaoEr', 'Fuck', 'Asshole', 'Whore', 'Fucker', 'BloodyAss', 'Sonofabitch', 'MotherFucker', 'HandJob', 'Bastard', 'Cunt', 'BlowJob', 'Jerk-off', 'Pussy', 'Slut', 'Lahabau', 'Dick', 'Suckit', 'Shit', 'Ass', 'BloodyHell', 'Butt', 'AssWhip', 'Ass', 'Pieceofshit', 'Dammit', 'Damn', 'JackAss', 'Douche', 'Dayumn');

    $commentsQuery = "SELECT * FROM `community_article_comment` cac
                        LEFT JOIN user_table ut
                        ON cac.comment_created_by= ut.uid
                        WHERE
                            `comment_status` = 1 AND comment_article_id = $article_id AND comment_parent_id " . ($parentCommentId === NULL ? 'IS NULL' : "= $parentCommentId") . "
                            ORDER BY cac.comment_created_date DESC";

    $commentsResult = mysqli_query($mysqli, $commentsQuery);

    while ($commentRow = mysqli_fetch_assoc($commentsResult)) {
        $comment_id = $commentRow['comment_id'];
        $profilePic = $commentRow['profile_pic'] ? (filter_var($commentRow['profile_pic'], FILTER_VALIDATE_URL) ? $commentRow['profile_pic'] : 'assets/uploads/avatar/' . $commentRow['profile_pic']) : 'assets/images/homepage/Group 804.png';


        echo '<div class="comment-container" style="margin-left: ' . ($indent * 20) . 'px;">';
        echo '<div class="d-flex align-items-center">';
        echo '<img src="' .  $profilePic . '" class="img-fluid rounded-circle" width="50" alt="Profile Picture">';
        echo '<div class="mx-3 align-self-center">' .
            (($commentRow['username'] != '') ? $commentRow['username'] : explode('@', $commentRow['email'])[0]) .
            '</div>';

        if ($commentRow['comment_created_by'] == $uid) {
            // Display update and delete buttons for comments created by the current user
            echo '<div class="dropdown ms-auto">';
            echo '<i class="fas fa-ellipsis-vertical" data-bs-toggle="dropdown" aria-expanded="false"></i>';
            echo '<ul class="dropdown-menu">';
            echo '<li>'; ?>
            <button class="dropdown-item" onclick="openEditModal(<?php echo $commentRow['comment_article_id']; ?>, <?php echo $commentRow['comment_id']; ?>)">
                <i class="fas fa-pen mx-2"></i> Edit
            </button>

        <?php
            echo '</li>';
            echo '<li>';
            echo '<a class="dropdown-item" href="community?comment_id=' . $comment_id . '" onclick="return deletecomment(' . $comment_id . ',' . $article_id . ' )">';
            echo '<i class="fas fa-trash mx-2"></i> Delete';
            echo '</a>';
            echo '</li>';
            echo '</ul>';
            echo '</div>';
            // Update Modal
            echo '<div class="modal fade" id="updateModal' . $comment_id . '" tabindex="-1" aria-labelledby="editCommentModalLabel' . $comment_id . '" aria-hidden="true">';
            // Modal content for updating comments
            echo '</div>';
        }

        echo '</div>';
        echo '<p class="community-text py-2">' . censorWords($commentRow['comment_content'], $censorWords) . '</p>';


 ?>
        <div class="editreplysection-<?php echo $comment_id; ?>" style="display: none;">
            <form action="" onsubmit="updatereplyComment(event,this)" method="POST">
                <div class="mb-3">
                    <textarea class="form-control bg-white text-dark summernotetext" name="editreply_content" id="editreplyContent<?= $commentRow['comment_id'] ?>" placeholder="Write a comment"><?php echo censorWords($commentRow['comment_content'], $censorWords); ?></textarea>
                    <input type="hidden" name="editreply_comment_id" value="<?php echo $comment_id; ?>">
                    <input type="hidden" name="editreply_article_id" value="<?php echo $article_id; ?>">
                </div>
                <div class="mb-3 d-flex align-items-end flex-column">
                    <button style="border-radius:20px;" class="btn btn-primary" name="update_reply_comment">Edit Reply</button>
                </div>
            </form>
        </div>



        <div class="replysection-<?php echo $comment_id; ?>" style="display: none;">
            <form action="" onsubmit="replyComment(event,this)" method="POST">
                <div class="mb-3">
                    <textarea class="form-control bg-white text-dark summernotetext" name="reply_content" id="replyContent<?= $commentRow['comment_id'] ?>" placeholder="Write a comment"></textarea>
                    <input type="hidden" name="reply_comment_id" value="<?php echo $comment_id; ?>">
                    <input type="hidden" name="reply_article_id" value="<?php echo $article_id; ?>">
                </div>
                <div class="mb-3 d-flex align-items-end flex-column">
                    <button style="border-radius:20px;" class="btn btn-primary" name="add_reply_comment">Reply</button>
                </div>
            </form>
        </div>


<?php echo '<hr>';

        // Display nested commentsreply-section-
        // displayReply($comment_id, $article_id, $indent + 1, $uid, $mysqli);

        echo '</div>';
    }
}



?>