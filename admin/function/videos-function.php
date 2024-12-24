<?php
// *************************************ADD Video****************************************************//

if (isset($_POST['add_video'])) {
    @ini_set('upload_max_size', '64M');
    @ini_set('post_max_size', '64M');
    @ini_set('max_execution_time', '600');

    $v_title = $_POST['v_title'];
    $v_desc = $_POST['v_desc'];
    $v_audience_id = $_POST['v_audience_id'];
    $v_category_id = $_POST['v_category_id'];
    $thumbnail_name = $_FILES['v_Thumbnail']['name'];
    $thumbnail_target_path = '../assets/uploads/video_images/' . $thumbnail_name;
    move_uploaded_file($_FILES['v_Thumbnail']['tmp_name'], $thumbnail_target_path);
    
    $video_name = ""; // Initialize the video name
    $youtube_link = '';
    
    if (isset($_FILES['v_path']) && $_FILES['v_path']['error'] === UPLOAD_ERR_OK) {
        $mime = $_FILES['v_path']['type'];
        $file = $_FILES['v_path']['name'];
        
        if (strstr($mime, "video/")) {
            $filename = uniqid() . "_" . time();
            $extension = pathinfo($_FILES["v_path"]["name"], PATHINFO_EXTENSION);
            $video_name = $filename . "." . $extension; // Store the video name only

            $source = $_FILES["v_path"]["tmp_name"];
            $destination = '../assets/uploads/uploaded-videos/' . $video_name;

            if (move_uploaded_file($source, $destination)) {
                // Video successfully uploaded.
            } else {
                echo "Failed to upload video file.";
            }
        } else {
            echo "Invalid video format. Please upload a valid video file.";
        }
    } elseif (!empty($_POST['v_link'])) {
        $v_link = $_POST['v_link'];
        $youtube_link = $v_link;
    } else {
        echo "No video file uploaded or YouTube link provided.";
    }
    
    $insert_query = "INSERT INTO videos (video_title, video_thumbnail, video_description, video_url, youtube_link, video_audience_id, video_category_id) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_stmt_init($mysqli);

    if (!mysqli_stmt_prepare($stmt, $insert_query)) {
        echo "<script>alert('SQL Error');</script>";
    } else {
        mysqli_stmt_bind_param($stmt, "sssssii", $v_title, $thumbnail_name, $v_desc, $video_name, $youtube_link, $v_audience_id, $v_category_id);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            echo "<script>alert('Video uploaded successfully'); window.location.replace('videos.php'); </script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($mysqli) . "');</script>";
        }
    }
}

// *************************************Update Video****************************************************//


if (isset($_POST['update-video'])) {
    $videos_id = $_POST['videos_id'];
    $v_title = $_POST['v_title'];
    $v_desc = $_POST['v_desc'];
    $v_audience_id = $_POST['video_audience_id'];
    $v_category_id = $_POST['video_category_id'];
    
    // Retrieve the current values for thumbnail, video, and link
    $query = "SELECT video_thumbnail, video_url, youtube_link FROM videos WHERE video_id = ?";
    $stmt = mysqli_stmt_init($mysqli);
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "i", $videos_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $current_thumbnail, $current_video, $current_link);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    }
    
    // Use the current values if the new values are not provided
    $thumbnail_name = empty($_FILES['v_Thumbnail']['name']) ? $current_thumbnail : $_FILES['v_Thumbnail']['name'];
    $video_name = empty($_FILES['v_path']['name']) ? $current_video : $_FILES['v_path']['name'];
    $youtube_link = empty($_POST['v_link']) ? $current_link : $_POST['v_link'];
    
    // Handle the video thumbnail update
    if (!empty($_FILES['v_Thumbnail']['name']) && $_FILES['v_Thumbnail']['error'] === UPLOAD_ERR_OK) {
        $thumbnail_target_path = '../assets/uploads/video_images/' . $thumbnail_name;
        move_uploaded_file($_FILES['v_Thumbnail']['tmp_name'], $thumbnail_target_path);
    }
    
    if (!empty($_FILES['v_path']['name']) && $_FILES['v_path']['error'] === UPLOAD_ERR_OK) {
        $mime = $_FILES['v_path']['type'];
        if (strstr($mime, "video/")) {
            $filename = uniqid() . "_" . time();
            $extension = pathinfo($_FILES["v_path"]["name"], PATHINFO_EXTENSION);
            $video_name = $filename . "." . $extension;
            $source = $_FILES["v_path"]["tmp_name"];
            $destination = '../assets/uploads/uploaded-videos/' . $video_name;
            if (move_uploaded_file($source, $destination)) {
                // Video successfully uploaded.
                $youtube_link = null; // Set YouTube link to null if a video is uploaded.
            } else {
                echo "Failed to upload video file.";
            }
        } else {
            echo "Invalid video format. Please upload a valid video file.";
        }
    }

    // If a YouTube link is provided, set the video to null
    if (!empty($_POST['v_link'])) {
        $video_name = null;
    }
    
    $update_query = "UPDATE videos SET video_title=?, video_description=?, video_category_id=?, video_audience_id=?, video_url=?, youtube_link=?, video_thumbnail=? WHERE video_id=?";
    $stmt = mysqli_stmt_init($mysqli);
    
    if (!mysqli_stmt_prepare($stmt, $update_query)) {
        echo "<script>alert('SQL Error');</script>";
    } else {
        mysqli_stmt_bind_param($stmt, "ssiisssi", $v_title, $v_desc, $v_category_id, $v_audience_id, $video_name, $youtube_link, $thumbnail_name, $videos_id);
    
        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            echo "<script>alert('Video updated successfully'); window.location.replace('videos.php'); </script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($mysqli) . "');</script>";
        }
    }
}

// *************************************Delete Video****************************************************//


if (isset($_GET['delete_video'])) {
    $deleteVideoId = $_GET['delete_video'];
    $deleteVideoSQL = "DELETE FROM `videos` WHERE video_id = ?";
    $stmt = $mysqli->prepare($deleteVideoSQL);
    $stmt->bind_param("i", $deleteVideoId);

    if ($stmt->execute()) {
        echo "<script>alert('Delete Video is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete Video is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}

// *************************************add Video category****************************************************//

if (isset($_POST['add_category'])) {
    $category_name = $_POST['category_name'];
    $sql = "INSERT INTO video_categories (category_name) VALUES (?);";

    $stmt = mysqli_stmt_init($mysqli);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo json_encode("SQL ERROR: " . mysqli_error($mysqli));
    } else {
        mysqli_stmt_bind_param($stmt, "s", $category_name);

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            echo "<script>alert('Category added successfully'); window.location.replace('video_category.php'); </script>";
        } else {
            echo json_encode("SQL ERROR: " . mysqli_error($mysqli)); 
            echo json_encode("Fail");
        }
    }
}


// *************************************Update Video category****************************************************//

if (isset($_POST['update_category'])) {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];

    $sql = "UPDATE video_categories SET category_name = ? WHERE category_id = ?";

    $stmt = mysqli_stmt_init($mysqli);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo json_encode("SQL ERROR: " . mysqli_error($mysqli));
    } else {
        mysqli_stmt_bind_param($stmt, "si", $category_name, $category_id); 

        if (mysqli_stmt_execute($stmt)) {
            mysqli_stmt_close($stmt);
            echo "<script>alert('Category updated successfully'); window.location.replace('video_category.php'); </script>";
        } else {
            echo json_encode("SQL ERROR: " . mysqli_error($mysqli));
            echo json_encode("Fail");
        }
    }
}

// *************************************Delete Video category****************************************************//

if (isset($_GET['delete_category'])) {
    $deleteCategoryId = $_GET['delete_category'];
    $deleteCategorySQL = "DELETE FROM `video_categories` WHERE category_id = ?";
    $stmt = $mysqli->prepare($deleteCategorySQL);
    $stmt->bind_param("i", $deleteCategoryId);

    if ($stmt->execute()) {
        echo "<script>alert('Delete Category is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete Category is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}
