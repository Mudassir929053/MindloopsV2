<?php
include 'includes/page-head.php';

extract($_GET);

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}

if ($_POST) {
    $newtime = time();
    if ($newtime > $_SESSION['time_up']) {
        echo "<script>alert('Time is up'); window.location.href='mcq_quiz_result.php';</script>";
    } else {
        $_SESSION['start_time'] = $newtime;
        $qno = $_POST['number'];
        // $_SESSION['quiz'] = $_SESSION['quiz'] + 1;
        $selected_choice = $_POST['choice'];
        $nextqno = $qno + 1;

        $query = "SELECT correct_answer FROM questions WHERE qno= '$qno' AND category_id='$category_id' ";
        $run = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        if (mysqli_num_rows($run) > 0) {
            $row = mysqli_fetch_array($run);
            $correct_answer = $row['correct_answer'];
        }

        if ($correct_answer == $selected_choice) {
            $_SESSION['score']++;
        }

        $query1 = "SELECT * FROM questions WHERE category_id=$category_id AND status='1'";
        $run = mysqli_query($mysqli, $query1) or die(mysqli_error($mysqli));
        $totalqn = mysqli_num_rows($run);
        // var_dump($_SESSION);
        
        if (count($_SESSION['attemptedq']) == $totalqn) {
        // var_dump($_SESSION);
        echo "<script>window.location.href = 'mcq_quiz_result.php';</script>";

        } else {
            echo "<script>window.location.href = 'mcq_quiz_question.php?category_id=$category_id';</script>";
        }
    }
} else {
    echo "<script>window.location.href = 'mcq_quiz_index.php';</script>";

    // header("Location: mcq_quiz_index.php");
}
?>
