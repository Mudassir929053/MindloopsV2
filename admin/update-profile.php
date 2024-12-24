<?php
require_once '../config/connection.php';

if (isset($_POST['profile_update'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['Password'];



    // Update the user's profile information
    $updateQuery = "UPDATE user_table SET full_name='$full_name', email='$email'";

    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $updateQuery .= ", password='$hashedPassword'";
    }

    $user_id = $_SESSION['uid'];
    $updateQuery .= " WHERE uid = $user_id";

    if (mysqli_query($mysqli, $updateQuery)) {
        echo "<script>alert('Profile updated successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}


if (isset($_POST['add_editor'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_id = 5;
    $username = $_POST['username'];
    $mobile = $_POST['mobile'];

    // Handle image uploading
    if ($_FILES["profile_picture"]["error"] == 0) {
        $target_dir = "assets/uploads/avatar/";
        $timestamp = time();
        $file_extension = pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION);
        $target_file = $timestamp . "." . $file_extension;
        $target_path = $target_dir . $target_file;

        // Check if the directory exists, and create it if not
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Try to move the uploaded file
        try {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_path)) {
                // File uploaded successfully
            } else {
                echo "Error: File not uploaded.";
                exit;
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }
    } else {
        $target_file = ''; // No image uploaded or an error occurred
    }

    // Insert the new user's profile information into the database
    $insertQuery = "INSERT INTO user_table (full_name, email, profile_pic, password, role_id, username, mobile) VALUES (?, ?, ?, ?,?,?,?)";
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("sssssss", $full_name, $email, $target_file, $hashedPassword, $role_id, $username, $mobile);

    if ($stmt->execute()) {
        echo "<script>alert('Editor added successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }

    $stmt->close();
}


if (isset($_POST['update_editor'])) {
    // Get the form data
    $uid = $_POST['uid'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['edit_status'];
    $mobile = $_POST['mobile'];
    $target_file = ''; // Initialize the target file variable

    // Handle image uploading only if a new image is provided
    if ($_FILES["profile_picture"]["error"] == 0) {
        $target_dir = "assets/uploads/avatar/";
        $timestamp = time(); // Get the current timestamp
        $file_extension = pathinfo($_FILES["profile_picture"]["name"], PATHINFO_EXTENSION); // Get the file extension
        $target_file = $timestamp . "." . $file_extension; // Create a unique filename with the timestamp
        $target_path = $target_dir . $target_file; // Define the complete file path

        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_path)) {
            // Image uploaded successfully
        } else {
            // Error occurred while uploading image
        }
    }

    // Update the editor's information in the database
    $updateQuery = "UPDATE user_table SET full_name='$full_name', username='$username', email='$email', status='$status', mobile= '$mobile'";
    
    // Check if a new password is provided
    if (!empty($password)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $updateQuery .= ", password='$hashedPassword'";
    }
    
    // Update the profile picture if a new one was provided
    if (!empty($target_file)) {
        $updateQuery .= ", profile_pic='$target_file'";
    }

    // Add a WHERE clause to specify which editor to update based on uid
    $updateQuery .= " WHERE uid = $uid";

    if (mysqli_query($mysqli, $updateQuery)) {
        echo "<script>alert('Editor updated successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}

if (isset($_POST['add_badge'])) {
    $badge_title = $_POST['badge_title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Handle image uploading
    if ($_FILES["coverImage"]["error"] == 0) {
        $target_dir = "../assets/uploads/badges/";
        $timestamp = time();
        $file_extension = pathinfo($_FILES["coverImage"]["name"], PATHINFO_EXTENSION);
        $target_file = $timestamp . "." . $file_extension;
        $target_path = $target_dir . $target_file;

        // Check if the directory exists, and create it if not
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Try to move the uploaded file
        try {
            if (move_uploaded_file($_FILES["coverImage"]["tmp_name"], $target_path)) {
                // File uploaded successfully
            } else {
                echo "Error: File not uploaded.";
                exit;
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }
    } else {
        $target_file = ''; // No image uploaded or an error occurred
    }

    // Insert the new user's profile information into the database
    $insertQuery = "INSERT INTO badge_table (badge_name, badge_description, badge_image, status) VALUES (?, ?, ?, ?)";
    

    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("ssss", $badge_title, $description, $target_file, $status);

    if ($stmt->execute()) {
        echo "<script>alert('Editor added successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }

    $stmt->close();
}

if (isset($_POST['update_badge'])) {
    $badge_id = $_POST['badge_id'];
    $badge_title = $_POST['badge_title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // Check if a new image file is uploaded
    if ($_FILES["coverImage"]["error"] == 0) {
        $target_dir = "../assets/uploads/badges/";
        $timestamp = time();
        $file_extension = pathinfo($_FILES["coverImage"]["name"], PATHINFO_EXTENSION);
        $target_file = $timestamp . "." . $file_extension;
        $target_path = $target_dir . $target_file;

        // Check if the directory exists, and create it if not
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Try to move the uploaded file
        try {
            if (move_uploaded_file($_FILES["coverImage"]["tmp_name"], $target_path)) {
                // File uploaded successfully
            } else {
                echo "Error: File not uploaded.";
                exit;
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            exit;
        }
    } else {
        // No new image uploaded, keep the existing image
        $target_file = $_POST['current_image']; // Assuming you have a hidden field to store the current image filename
    }

    // Update the badge information in the database
    $updateQuery = "UPDATE badge_table SET badge_name=?, badge_description=?, badge_image=?, status=? WHERE badge_id=?";

    $stmt = $mysqli->prepare($updateQuery);
    $stmt->bind_param("ssssi", $badge_title, $description, $target_file, $status, $badge_id);

    if ($stmt->execute()) {
        echo "<script>alert('Badge updated successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }

    $stmt->close();
}


// Change Avatar
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

    // Close the database connection
    $mysqli->close();

    // Redirect back to the profile page after updating the image
    header("Location: profile.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDir = 'assets/uploads/avatar/';
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Generate a unique file name using timestamp
    $timestamp = time(); // Get the current timestamp
    $filename = $timestamp . '_' . $_FILES['file']['name']; // Combine timestamp and original file name

    $targetFile = $uploadDir . $filename;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
        $uploadDate = date('Y-m-d H:i:s');
        $uid = $_SESSION['uid']; // Get the user's ID

        // Update the user's profile_pic in the user_table without prepared statements
        $query = "UPDATE user_table SET profile_pic = '$filename' WHERE uid = $uid";
        $result = $mysqli->query($query);

        if ($result) {
            echo "<script> location.href = '$_SERVER[HTTP_REFERER]';</script>";
        } else {
            echo "File upload failed.";
        }
    } else {
        echo "File upload failed.";
    }

}