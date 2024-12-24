<?php
// include('../config/connection.php');
if (isset($_POST['add_video_comment'])) {
    // Retrieve data from the form
    $u_id = $_POST['u_id'];
    $video_id = $_POST['video_id'];
    $vc_comment = $_POST['vc_comment'];

    // Perform the database insert here
    // Assuming you have a database connection in $mysqli
    $sql = "INSERT INTO `video_comment` (`video_id`, `vc_content`, `created_by`, `approved_vc`) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $approved_vc = 1; // You can adjust this as needed

        $stmt->bind_param("issi", $video_id, $vc_comment, $u_id, $approved_vc);

        if ($stmt->execute()) {
            // Comment added successfully, display a JavaScript alert
            echo "<script>location.href = '$_SERVER[HTTP_REFERER]';</script>";
            exit;
        } else {
            echo "Error inserting comment: " . $stmt->error;
        }
        
        

        $stmt->close();
    } else {
        echo "Error in preparing statement: " . $mysqli->error;
    }
}



// ****************************************************UPDATE COMMENT*****************************************************//


if (isset($_POST['update_comment'])) {
    // Retrieve data from the form
    $vc_id = $_POST['vc_id'];
    $vc_content = $_POST['vc_content'];

    // Perform the database update
    $sql = "UPDATE `video_comment` SET `vc_content` = ? WHERE `vc_id` = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("si", $vc_content, $vc_id);

        if ($stmt->execute()) {
            // Redirect back to the same page or wherever you want
            echo "<script>location.href = '$_SERVER[HTTP_REFERER]';</script>";
            exit;
        } else {
            echo "Error updating comment: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error in preparing statement: " . $mysqli->error;
    }
}


// ******************************************************DELETE VIDEO COMMENT*****************************************//

if (isset($_GET['delete_video_comment'])) {
    $deleteVcId = $_GET['delete_video_comment'];
    $deleteVcSQL = "DELETE FROM `video_comment` WHERE vc_id = ?";
    $stmt = $mysqli->prepare($deleteVcSQL);
    $stmt->bind_param("i", $deleteVcId);

    if ($stmt->execute()) {
        echo "<script>location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete Video comment is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}



// ******************************************************video end comment**************************************************//

if (isset($_POST['add_childern'])) {
    
    // var_dump($_POST);
    // exit;
    // Get form data
    $childUsername = $_POST['child_username'];
    $childPassword = $_POST['child_password'];
    $childConfirmPassword = $_POST['child_confirm_password'];
    $childEmail = $_POST['child_email'];
    $childPhoneNumber = $_POST['child_phone_number'];
    $childDOB = $_POST['child_dob'];
    $childGender = $_POST['child_gender'];
    $childGradeId = $_POST['child_grade'];
    $parentid = $_POST['parent_id'];
    $fullname = $_POST['child_fullname'];


    // Check if passwords match
    if ($childPassword != $childConfirmPassword) {
        // Display a Bootstrap toast with a danger alert
        echo "<script>alert('Passwords do not match.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Hash the password
        $hashedPassword = password_hash($childPassword, PASSWORD_BCRYPT);

        // Insert data into user_table
        $userSql = "INSERT INTO user_table (username, password, email, mobile,  role_id, full_name)
                    VALUES ('$childUsername', '$hashedPassword', '$childEmail', '$childPhoneNumber', 4, '$fullname')";
// exit;
        if ($mysqli->query($userSql) === TRUE) {
            // Get the last inserted user ID
            $userId = $mysqli->insert_id;

            // Insert data into student_profile
            $studentSql = "INSERT INTO student_profile (user_id, date_of_birth, grade, gender, parent_id)
                           VALUES ('$userId', '$childDOB', '$childGradeId', '$childGender', '$parentid')";

            if ($mysqli->query($studentSql) === TRUE) {
                // Display a Bootstrap toast with a success alert
                echo "<script>alert('Child information added successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
            } else {
                echo "<script>alert('Failed to add child information.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
            }
        } else {
            echo "<script>alert('Failed to add child information.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
        }

        // Close the database connection
        // $mysqli->close();
    }
}


// ****************************************EDIT CHILDREN*******************************************************//

// Check if the form is submitted
if (isset($_POST['edit_childern'])) {
    // Get the form data
    $childId = $_POST['child_id'];
    $childUsername = $_POST['child_username'];
    $childEmail = $_POST['child_email'];
    $childFullname = $_POST['child_fullname'];
    $childPhoneNumber = $_POST['child_phone_number'];
    $childDob = $_POST['child_dob'];
    $childGender = $_POST['child_gender'];
    $childGrade = $_POST['child_grade'];

    // Use prepared statements to prevent SQL injection
    $updateUserQuery = "UPDATE user_table SET username=?, full_name=?, email=?, mobile=? WHERE uid=?";
    $stmtUser = $mysqli->prepare($updateUserQuery);
    $stmtUser->bind_param("ssssi", $childUsername, $childFullname, $childEmail, $childPhoneNumber, $childId);
    $stmtUser->execute();
    $stmtUser->close();
// var_dump($_POST);
     $updateStudentQuery = "UPDATE student_profile SET date_of_birth=?, grade=?, gender=? WHERE user_id=?";
      $stmtStudent = $mysqli->prepare($updateStudentQuery);
     $stmtStudent->bind_param("sisi", $childDob, $childGrade, $childGender, $childId);
     $stmtStudent->execute();
     $stmtStudent->close();
    //  exit;

    // Redirect or show a success message
    echo "<script>alert('Child information updated successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
    exit();
}

// *********************************************************DELETE CHILDREN*************************************************************//




if (isset($_GET['delete_child'])) {
    $childId = $_GET['delete_child'];

    // Assuming a database connection is established
    // Perform the deletion
    $deleteUserQuery = "DELETE FROM user_table WHERE uid = ?";
    $stmtUser = $mysqli->prepare($deleteUserQuery);
    $stmtUser->bind_param("i", $childId);
    $stmtUser->execute();
    $stmtUser->close();

    $deleteStudentQuery = "DELETE FROM student_profile WHERE user_id = ?";
    $stmtStudent = $mysqli->prepare($deleteStudentQuery);
    $stmtStudent->bind_param("i", $childId);
    $stmtStudent->execute();
    $stmtStudent->close();

   // Redirect or show a success message
   echo "<script>alert('Child information Deleted successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
   exit();
}






// ***************************************************Profile Details**********************************************//

if (isset($_POST['username'])) {
    $user_id = $_SESSION['uid'];

    $email = $_POST['email'];
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];

    
        // No new image uploaded, update the profile without changing the image
        $updateQuery = "UPDATE user_table SET username='$username', email='$email', mobile='$mobile' WHERE uid = $user_id";


    // Check if the password field is set (not empty)
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $updateQuery = "UPDATE user_table SET username='$username', email='$email', mobile='$mobile' , password = '$hashedPassword' WHERE uid = $user_id";
    }

    if (mysqli_query($mysqli, $updateQuery)) {
        echo "<script>alert('Profile updated successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}





// ****************************************UPDATE PASSWORD*************************************************//


if (isset($_POST['update_password'])) {
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];
    // Assuming your user_table contains a column named 'password'
    $uid = $_SESSION['uid'];
    $selectPasswordQuery = "SELECT password FROM user_table WHERE uid = $uid";
    $result = $mysqli->query($selectPasswordQuery);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $oldPassword = $row['password'];
    }

    if (password_verify($currentPassword, $oldPassword)) {
        if ($newPassword === $confirmPassword) {
            // Passwords match, proceed with updating the password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updatePasswordQuery = "UPDATE user_table SET password='$hashedPassword' WHERE uid = $uid";

            if (mysqli_query($mysqli, $updatePasswordQuery)) {
                echo "<script>alert('Password updated successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
            } else {
                echo "Error: " . mysqli_error($mysqli);
            }
        } else {
            echo "<script>alert('New password and confirm password do not match.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";

            // echo "New password and confirm password do not match.";
        }
    } else {
        echo "<script>alert('Current password is incorrect.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";

        // echo "Current password is incorrect.";
    }
}




// *******************************REMOVE AVATAR****************************************************//


if (isset($_GET['remove_avatar'])) {
    // Get the user ID from the URL parameter
    $uid = $_GET['remove_avatar'];


    // Execute the code to remove the avatar (set profile_pic to NULL)
    $updateAvatarQuery = "UPDATE user_table SET profile_pic = NULL WHERE uid = $uid";

    // Perform the database update
    if (mysqli_query($mysqli, $updateAvatarQuery)) {
       
        echo "<script>alert('Avatar removed successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";    
        
        exit;
        
    } else {
        // Error occurred while updating the database
        $errorMessage = "Error: " . mysqli_error($mysqli);

        // Redirect the user back to their profile page with an error message
        header("Location: profile.php?error=" . urlencode($errorMessage));
        exit;
    }
}





// Check if the user clicked an image to update the profile picture
if (isset($_GET['uid']) && isset($_GET['image'])) {
    // Get the user ID and selected image name
    $userId = $_GET['uid'];
    $selectedImageName = $_GET['image'];
    // Update the profile picture
    $updateImageQuery = "UPDATE user_table SET profile_pic = '$selectedImageName' WHERE uid = $userId";
    if ($mysqli->query($updateImageQuery) === TRUE) {
        // Image updated successfully
        echo "<script>location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Handle the error
        echo "Error updating image: " . $mysqli->error;
    }

   

    // Redirect back to the profile page after updating the image
    header("Location: profile.php");
    exit;
}



// *********************************CONTACT US**********************************************//



// Check if the form is submitted
if (isset($_POST['contact_us'])) {

    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $status = "0";
    // Prepare and execute the SQL query to insert data into the database
    $sqlcontact = "INSERT INTO contact_us (name, email, message, status) VALUES (?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sqlcontact);
    $stmt->bind_param("ssss", $name, $email, $message, $status);

    if ($stmt->execute()) {
        // Data inserted successfully
        echo "<script>alert('Data has been successfully submitted.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Error occurred
        echo "Error: " . $stmt->error;
    }

   
}

// Include necessary files and establish database connection
// *********************************************************COMMUNITY*******************************************************//
// -------------------------------------------------ADD COMMENT-----------------------------------------------------------//
if (isset($_POST['add_comment'])) {
    // Retrieve form data
    $article_id = $_POST['article_id'];
    $content = $_POST['content'];
    $user = $_SESSION['uid'];

    // Add necessary validation and sanitization

    // Insert the comment into the database
    $insertCommentQuery = "INSERT INTO `community_article_comment` (`comment_article_id`, `comment_content`, `comment_created_by`, `comment_created_date`)
                           VALUES ('$article_id', '$content', '$user', NOW())";

    $insertCommentResult = $mysqli->query($insertCommentQuery);

    if ($insertCommentResult) {
        // Comment insertion successful
        echo "<script>alert('Comment added successfully!');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Comment insertion failed
        echo "Error adding comment: " . $mysqli->error;
    }
}


// -------------------------------------------------EDIT COMMENT-----------------------------------------------------------//

// Edit Comment
if (isset($_POST['edit_comment'])) {
    $comment_id = $_POST['edit_comment_id'];
    $edited_content = $_POST['edited_content'];

    // Validate and sanitize inputs
    $comment_id = mysqli_real_escape_string($mysqli, $comment_id);
    $edited_content = mysqli_real_escape_string($mysqli, $edited_content);

    $editCommentQuery = "UPDATE `community_article_comment` SET `comment_content`='$edited_content' WHERE `comment_id`='$comment_id'";

    $editCommentResult = $mysqli->query($editCommentQuery);

    if ($editCommentResult) {
        // Comment edited successfully
        echo "<script>alert('Comment Updated successfully!');
        location.href='$_SERVER[HTTP_REFERER]';</script>"; // Ensure no further code execution after redirect
    } else {
        // Error editing comment
        echo "Error editing comment: " . $mysqli->error;
    }
}

// -----------------------------delete  comment----------------------------------------------------------//


// Check if the comment_id parameter is present in the URL
if (isset($_GET['comment_id'])) {
    // Get the comment_id from the URL
    $comment_id = $_GET['comment_id'];

    // Sanitize and validate the comment_id if necessary

    // Your database connection code
    // ...

    // Perform the query to delete the comment
    $deleteCommentQuery = "DELETE FROM community_article_comment WHERE comment_id = '$comment_id'";
    $deleteCommentResult = $mysqli->query($deleteCommentQuery);

    if ($deleteCommentResult) {
        // Comment deletion successful
        echo "<script>alert('Comment deleted successfully!');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Comment deletion failed
        echo "Error deleting comment: " . $mysqli->error;
    }
}


// **************************************************Add Article******************************************************//

if (isset($_POST['add_article_user'])) {
    $uid = $_SESSION['uid'];
    $community_id = $_POST['community_id'];
    $article_title = $_POST['a_name'];
    $article_content = $_POST['a_content'];
    // $article_status = $_POST['a_status'];

    // Assuming you have a timestamp column for article_created_at
    $article_created_at = date('Y-m-d H:i:s');

    // Assuming you have a column for article_created_by
    $article_created_by = $uid;


    //    echo $sql = "INSERT INTO community_article (article_cc_id, article_title, article_content, article_created_by, article_created_at)
    //     VALUES ('$community_id', '$article_title', '$article_content', '$article_created_by', '$article_created_at')";
    // exit;
    // Prepare the SQL statement
    $stmt = $mysqli->prepare("INSERT INTO community_article (article_cc_id, article_title, article_content, article_created_by, article_created_at) VALUES (?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error in preparing statement: " . $mysqli->error);
    }

    // Bind parameters
    $stmt->bind_param("issis", $community_id, $article_title, $article_content, $article_created_by, $article_created_at);

    // Execute the statement
    $result = $stmt->execute();

    if ($result === false) {
        die("Error in executing statement: " . $stmt->error);
    } else {
        echo "<script>alert('Article inserted successfully.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    }



    exit;
}

// -------------------------------------UPDATE ARTICLE---------------------------------------------------------//

if (isset($_POST['update_article_user'])) {
    $article_id = $_POST['article_id'];
    $update_a_name = $_POST['update_a_name'];
    $update_a_content = $_POST['update_a_content'];
    // $update_a_status = $_POST['update_a_status'];
    $update_community_id = $_POST['update_community_id'];

    // Assuming you have a timestamp column for article_updated_at
    $article_updated_at = date('Y-m-d H:i:s');

    // Prepare the SQL statement
    $stmt = $mysqli->prepare("UPDATE community_article SET article_title=?, article_content=?, article_updated_at=?, article_cc_id=?  WHERE article_id=?");

    if ($stmt === false) {
        die("Error in preparing statement: " . $mysqli->error);
    }

    // Bind parameters
    $stmt->bind_param("sssii", $update_a_name, $update_a_content, $article_updated_at, $update_community_id, $article_id);

    // Execute the statement
    $result = $stmt->execute();

    if ($result === false) {
        die("Error in executing statement: " . $stmt->error);
    } else {
        echo "<script>alert('Article updated successfully.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    }

    exit;
}



// Include your database connection or any necessary setup

if (isset($_GET['article_id_delete'])) {
    $articleId = $_GET['article_id_delete'];

    // Perform necessary validation and security checks

    // Assuming you have a column named 'article_id' in your database table
    $deleteArticleQuery = "DELETE FROM community_article WHERE article_id = '$articleId'";

    // Execute the deletion query
    $deleteArticleResult = mysqli_query($mysqli, $deleteArticleQuery);

    if ($deleteArticleResult) {
        // Article deletion successful
        echo "<script>alert('Article deleted successfully.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Article deletion failed
        echo "Error deleting article: " . $mysqli->error;
    }
}

// -------------------------------------------------ADD COMMENT-----------------------------------------------------------//
if (isset($_POST['add_reply_comment'])) {
    // Retrieve form data
    $comment_parent_id = $_POST['reply_comment_id'];
    $comment_article_id = $_POST['reply_article_id'];
    $comment_content = $_POST['reply_content'];
    $user = $_SESSION['uid'];

    // Add necessary validation and sanitization

    // Insert the comment into the database
    $insertreplyCommentQuery = "INSERT INTO `community_article_comment` (`comment_article_id`, `comment_parent_id`, `comment_content`, `comment_created_by`, `comment_created_date`)
                           VALUES ('$comment_article_id', '$comment_parent_id', '$comment_content', '$user', NOW())";

    $insertreplyCommentResult = $mysqli->query($insertreplyCommentQuery);

    if ($insertreplyCommentResult) {
        // Comment insertion successful
        echo "<script>alert('Reply added successfully!');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Comment insertion failed
        echo "Error adding comment: " . $mysqli->error;
    }
}
// ------------------------------------------------- UPDATE COMMENT -----------------------------------------------------------//
if (isset($_POST['update_reply_comment'])) {
    // Retrieve form data
    $comment_parent_id = $_POST['editreply_comment_id'];
    $comment_article_id = $_POST['editreply_article_id'];
    $edit_comment_content = $_POST['editreply_content'];  // Updated variable name
    $user = $_SESSION['uid'];

    // Add necessary validation and sanitization

    // Update the comment in the database
    $updateCommentQuery = "UPDATE `community_article_comment`
                           SET `comment_content` = '$edit_comment_content'
                           WHERE `comment_id` = '$comment_parent_id'
                           AND `comment_article_id` = '$comment_article_id'
                           AND `comment_created_by` = '$user'";
    $updateCommentResult = $mysqli->query($updateCommentQuery);

    if ($updateCommentResult) {
        // Comment update successful
        echo "<script>alert('Reply updated successfully!');
        location.href='$_SERVER[HTTP_REFERER]';
        
        </script>";
    } else {
        // Comment update failed
        echo "Error updating comment: " . $mysqli->error;
    }
}

?>
