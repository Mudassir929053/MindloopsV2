<?php
include('../config/connection.php');

// var_dump($_POST);
// exit;
// *******************************START OF MAGAZINE FUNCTION******************************* 

// START the Fuction to Add/INSERT Magzine Field  
if (isset($_POST['add_Magazine'])) {
    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $publishDate = $_POST['publish-date'];
    $status = $_POST['status'];
    // Set a default value for created_by
    $created_by = $_POST['uid']; // You can change this default value as needed

    // File upload paths for cover image and magazine PDF
    $coverImageUploadPath = '../assets/uploads/cover_images/';
    $magazinePDFUploadPath = '../assets/uploads/magazine_pdfs/';

    // Move uploaded files to the appropriate directory
    $coverImageExtension = pathinfo($_FILES['coverImage']['name'], PATHINFO_EXTENSION);
    $magazinePDFExtension = pathinfo($_FILES['magazinePDF']['name'], PATHINFO_EXTENSION);

    $coverImageFileName = uniqid() . '_cover.' . $coverImageExtension;
    $magazinePDFFileName = uniqid() . '_magazine.' . $magazinePDFExtension;

    move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverImageUploadPath . $coverImageFileName);
    move_uploaded_file($_FILES['magazinePDF']['tmp_name'], $magazinePDFUploadPath . $magazinePDFFileName);

    // Prepare and execute the SQL insert query
    $sql = "INSERT INTO magazine (title, description, publish_date, created_by, status, cover_image_url, magazine_path) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssssiss", $title, $description, $publishDate, $created_by, $status, $coverImageFileName, $magazinePDFFileName);
    // The rest of your code remains unchanged

    if ($stmt->execute()) {
        // Data inserted successfully
        echo "<script>alert('Magazine data inserted successfully.');
		location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Error occurred during insertion
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    // $mysqli->close();
}

// END the Fuction to Add/INSERT Magzine Field 

if (isset($_POST['edit_review_status'])) {
    // Get form data
    $reviewId = $_POST['review_id'];
    $status = $_POST['status'];

    // Update SQL query for status
    $updateStatusSQL = "UPDATE review SET status=? WHERE review_id=?";
    $stmt = $mysqli->prepare($updateStatusSQL);
    $stmt->bind_param("ii", $status, $reviewId);

    if ($stmt->execute()) {
        // Status updated successfully
        echo "<script>alert('Review status updated successfully.');
            location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Error occurred during update
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement
    $stmt->close();
}

// START the Fuction to EDIT/UPDATE Magzine Field  

// Check if edit_magazine_field is submitted
if (isset($_POST['edit_magazine_field'])) {
    // Get form data
    $magazineId = $_POST['magazine_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $publishDate = $_POST['publish-date'];
    $status = $_POST['status'];

    // File upload paths for cover image and magazine PDF
    $coverImageUploadPath = '../assets/uploads/cover_images/';
    $magazinePDFUploadPath = '../assets/uploads/magazine_pdfs/';

    // Retrieve existing data for the magazine based on magazine ID
    $getMagazineDataSQL = "SELECT cover_image_url, magazine_path FROM magazine WHERE magazine_id=?";
    $stmt = $mysqli->prepare($getMagazineDataSQL);
    $stmt->bind_param("i", $magazineId);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingData = $result->fetch_assoc();

    if ($existingData) {
        // Check if cover image is uploaded
        if (!empty($_FILES['coverImage']['name'])) {
            // Delete the previous cover image file
            if (file_exists($coverImageUploadPath . $existingData['cover_image_url'])) {
                unlink($coverImageUploadPath . $existingData['cover_image_url']);
            }

            $coverImageFileName = uniqid() . '_' . $_FILES['coverImage']['name'];
            move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverImageUploadPath . $coverImageFileName);
        } else {
            // Keep the existing cover image filename if not updated
            $coverImageFileName = $existingData['cover_image_url'];
        }

        // Check if magazine PDF is uploaded
        if (!empty($_FILES['magazinePDF']['name'])) {
            // Delete the previous magazine PDF file
            if (file_exists($magazinePDFUploadPath . $existingData['magazine_path'])) {
                unlink($magazinePDFUploadPath . $existingData['magazine_path']);
            }

            $magazinePDFFileName = uniqid() . '_' . $_FILES['magazinePDF']['name'];
            move_uploaded_file($_FILES['magazinePDF']['tmp_name'], $magazinePDFUploadPath . $magazinePDFFileName);
        } else {
            // Keep the existing magazine PDF filename if not updated
            $magazinePDFFileName = $existingData['magazine_path'];
        }

        // Update SQL query
        $updateMagazineSQL = "UPDATE magazine SET title=?, description=?, publish_date=?, status=?, cover_image_url=?, magazine_path=? WHERE magazine_id=?";
        $stmt = $mysqli->prepare($updateMagazineSQL);
        $stmt->bind_param("ssssssi", $title, $description, $publishDate, $status, $coverImageFileName, $magazinePDFFileName, $magazineId);

        if ($stmt->execute()) {
            // Data updated successfully
            echo "<script>alert('Magazine data updated successfully.');
                location.href = '$_SERVER[HTTP_REFERER]';</script>";
        } else {
            // Error occurred during update
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error: Magazine not found.";
    }
}

// START the Fuction to EDIT/UPDATE Magzine Field  


/* ------------Start of Deleting Magazine field----------*/
if (isset($_GET['delete_magazine_field'])) {
    $delete = $_GET['delete_magazine_field'];

    // Retrieve the file paths for cover image and magazine PDF before deleting the record
    $getFilePathsSQL = "SELECT cover_image_url, magazine_path FROM magazine WHERE magazine_id = ?";
    $stmt = $mysqli->prepare($getFilePathsSQL);
    $stmt->bind_param("i", $delete);
    $stmt->execute();
    $result = $stmt->get_result();
    $filePaths = $result->fetch_assoc();

    // Delete the related files if they exist
    if ($filePaths) {
        $coverImagePath = '../assets/uploads/cover_images/' . $filePaths['cover_image_url'];
        $magazinePDFPath = '../assets/uploads/magazine_pdfs/' . $filePaths['magazine_path'];

        if (file_exists($coverImagePath)) {
            unlink($coverImagePath);
        }

        if (file_exists($magazinePDFPath)) {
            unlink($magazinePDFPath);
        }
    }

    // Delete the record from the database
    $delField = $mysqli->query("DELETE FROM `magazine` WHERE magazine_id = '$delete'");

    if ($delField) {
        echo "<script>alert('Delete Magazine Field is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete Field is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}
/* ------------END of Deleting Magazine field----------*/
// *******************************END OF MAGAZINE FUNCTION******************************* 

// Handle updating Profile

if (isset($_POST['profile_update'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = $_POST['Password'];

    // Handle image uploading
    if ($_FILES["profile_pic"]["error"] == 0) {
        $target_dir = "../assets/uploads/avatar/";
        $timestamp = time(); // Get the current timestamp
        $file_extension = pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION); // Get the file extension
        $target_file = $timestamp . "." . $file_extension; // Create a unique filename with the timestamp
        $target_path = $target_dir . $target_file; // Define the complete file path
        // exit;
        try {
            if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_path)) {
                // echo "Uploaded";
                // exit;
            } else {
                // echo "not uploaded";
                // exit;
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    } else {
        $target_file = ''; // No image uploaded or an error occurred
    }



    // Update the user's profile information
    $updateQuery = "UPDATE user_table SET full_name='$full_name', email='$email', profile_pic='$target_file'";

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

// Handles Adding Editor

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

// Handles Update Editor

if (isset($_POST['update_editor'])) {
    // Get the form data
    $uid = $_POST['uid'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = $_POST['edit_status'];
    $mobile = $_POST['mobile'];
    $target_file = $_POST['profile_pic']; // Initialize the target file variable

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

// Handles Adding Badge

if (isset($_POST['add_badge'])) {
    $badge_category = $_POST['badge_category'];
    $badge_level = $_POST['badge_level'];
    $badge_title = $_POST['badge_title'];
    $badge_to = $_POST['badge_to'];
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

    // Insert the new badge information into the database
    $insertQuery = "INSERT INTO badge_table (badge_category, badge_level, badge_title, badge_image, badge_to, status) VALUES (?, ?, ?, ?, ?,?)";

    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("ssssss", $badge_category, $badge_level, $badge_title, $target_file, $badge_to,$status);

    if ($stmt->execute()) {
        echo "<script>alert('Badge added successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }

    $stmt->close();
}

// Handles Updating Badge

if (isset($_POST['update_badge'])) {
    $badge_id = $_POST['badge_id'];
    $badge_level = $_POST['badge_level'];
    $badge_category = $_POST['badge_category'];
    $badge_title = $_POST['badge_title'];
    // $description = $_POST['description'];
    $badge_to = $_POST['badge_to'];
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
    $updateQuery = "UPDATE badge_table SET badge_category=?, badge_level=?,badge_title=?, badge_image=?,badge_to=?,status=? WHERE badge_id=?";

    $stmt = $mysqli->prepare($updateQuery);
    $stmt->bind_param("ssssssi", $badge_category, $badge_level, $badge_title, $target_file, $badge_to, $status, $badge_id);

    if ($stmt->execute()) {
        echo "<script>alert('Badge updated successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }

    $stmt->close();
}

// *******************************START OF BLOG FUNCTION******************************* 

// Handles Adding Blog Category

if (isset($_POST['add_blog_categories'])) {
    $badge_title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    $created_by = $_POST['uid']; // You can change this default value as needed

    // Handle image uploading
    if ($_FILES["coverImage"]["error"] == 0) {
        $target_dir = "../assets/uploads/blog-categories/";
        $timestamp = time();
        $file_extension = pathinfo($_FILES["coverImage"]["name"], PATHINFO_EXTENSION);
        $target_file = uniqid() . $timestamp . "." . $file_extension;
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

    $insertQuery = "INSERT INTO blog_categories (name, description, thumbnail, status, created_by) VALUES (?, ?, ?, ?, ?)";

    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("sssss", $badge_title, $description, $target_file, $status, $created_by);


    if ($stmt->execute()) {
        echo "<script>alert('Blog categories added successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }

    $stmt->close();
}


// Handles Updating Blog Category

if (isset($_POST['update_blog_category'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    // var_dump($_POST);
    // exit;
    // Check if a new image file is uploaded
    if ($_FILES["coverImage"]["error"] == 0) {
        $target_dir = "../assets/uploads/blog-categories/";
        $timestamp = time();
        $file_extension = pathinfo($_FILES["coverImage"]["name"], PATHINFO_EXTENSION);
        $target_file = uniqid() . $timestamp . "." . $file_extension;
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
    // Define the update query.
    $updateQuery = "UPDATE blog_categories SET name = ?, description = ?, thumbnail = ?, status = ? WHERE category_id = ?";
    // exit;
    // Prepare the SQL statement.
    $stmt = $mysqli->prepare($updateQuery);

    // Bind the parameters.
    $stmt->bind_param("sssii", $name, $description, $target_file, $status, $category_id);

    // Execute the query.
    if ($stmt->execute()) {
        echo "Blog Category updated successfully!";
    } else {
        echo "Error updating category: " . $mysqli->error;
    }


    $stmt->close();
}




/* ------------Start of Deleting Blog Category----------*/
if (isset($_GET['delete_category_field'])) {
    $delete = $_GET['delete_category_field'];

    // Retrieve the file paths for cover image and Category PDF before deleting the record

    $getFilePathsSQL = "SELECT `thumbnail` FROM `blog_categories` WHERE category_id = ?";
    $stmt = $mysqli->prepare($getFilePathsSQL);
    $stmt->bind_param("i", $delete);
    $stmt->execute();
    $result = $stmt->get_result();
    $filePaths = $result->fetch_assoc();

    // Delete the related files if they exist
    if ($filePaths) {
        $coverImagePath = '../assets/uploads/blog-categories/' . $filePaths['cover_image_url'];

        if (file_exists($coverImagePath)) {
            unlink($coverImagePath);
        }
    }

    // Delete the record from the database
    $delField = $mysqli->query("DELETE FROM `blog_categories` WHERE category_id = '$delete'");

    if ($delField) {
        echo "<script>alert('Delete Category Field is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete Field is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}
/* ------------END of Deleting Category field----------*/



/* ------------Start of Deleting Blog Field----------*/
if (isset($_GET['delete_blog_field'])) {
    $delete = $_GET['delete_blog_field'];

    // Retrieve the file paths for cover image before deleting the record

    $getFilePathsSQL = "SELECT `thumbnail` FROM `blogs` WHERE blog_id = ?";
    $stmt = $mysqli->prepare($getFilePathsSQL);
    $stmt->bind_param("i", $delete);
    $stmt->execute();
    $result = $stmt->get_result();
    $filePaths = $result->fetch_assoc();

    // Delete the related files if they exist
    if ($filePaths) {
        $coverImagePath = '../assets/images/blogs/' . $filePaths['thumbnail'];

        if (file_exists($coverImagePath)) {
            unlink($coverImagePath);
        }
    }

    // Delete the record from the database
    $delField = $mysqli->query("DELETE FROM `blogs` WHERE blog_id = '$delete'");

    if ($delField) {
        echo "<script>alert('Delete Blog Field is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete Blog Field is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}
/* ------------END of Deleting Field field----------*/


// *******************************END OF BLOG FUNCTION******************************* 


// *******************************ADITIONAL CHILDERN FUNCTION******************************* 


if (isset($_POST['change_adition_childern'])) {
    $uid = $_POST['uid'];
    $status = $_POST['status'];

    // Update the status of the child in the database
    // Define the update query.
    $updateQuery = "UPDATE user_table SET status = ? WHERE uid = ?";

    // Prepare the SQL statement.
    $stmt = $mysqli->prepare($updateQuery);

    // Bind the parameters.
    $stmt->bind_param("si", $status, $uid);

    // Execute the query.
    if ($stmt->execute()) {
        echo "Updated successfully!";
    } else {
        echo "Error updating Children: " . $mysqli->error;
    }

    $stmt->close();
}

// *******************************ADITIONAL CHILDERN FUNCTION******************************* 



// *******************************START OF LOOPS FUNCTION******************************* 

// START the Fuction to Add/INSERT Loops Category  
if (isset($_POST['add_loops_category'])) {
    // Get form data
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];
    // Set a default value for created_by
    $created_by = $_POST['uid'];


    // File upload paths for cover image
    $coverImageUploadPath = '../assets/uploads/cover_images/';

    // Generate unique file name for uploaded file
    $coverImageFileName = uniqid() . '_' . $_FILES['coverImage']['name'];

    // Move uploaded files to the appropriate directory
    move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverImageUploadPath . $coverImageFileName);

    // Prepare and execute the SQL insert query
    $sql = "INSERT INTO loops_category (loop_category, description, created_by, image_url, status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("ssisi", $title, $description, $created_by, $coverImageFileName, $status);

    if ($stmt->execute()) {
        // Data inserted successfully
        echo "<script>alert('Loops Category inserted successfully.');
		location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Error occurred during insertion
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    // $mysqli->close();
}

// END the Fuction to Add/INSERT Loops Category 


// START the Fuction to EDIT/UPDATE Loops Category  

// Check if edit_category_field is submitted
if (isset($_POST['edit_category_field'])) {
    // Get form data
    $categoryId = $_POST['category_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    // File upload paths for cover image
    $coverImageUploadPath = '../assets/uploads/cover_images/';

    // Retrieve existing data for the loops category based on ID
    $getCategoryDataSQL = "SELECT image_url FROM loops_category WHERE id=?";
    $stmt = $mysqli->prepare($getCategoryDataSQL);
    $stmt->bind_param("i", $categoryId);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingData = $result->fetch_assoc();

    if ($existingData) {
        // Check if cover image is uploaded
        if (!empty($_FILES['coverImage']['name'])) {
            // Delete the previous cover image file
            if (file_exists($coverImageUploadPath . $existingData['image_url'])) {
                unlink($coverImageUploadPath . $existingData['image_url']);
            }

            $coverImageFileName = uniqid() . '_' . $_FILES['coverImage']['name'];
            move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverImageUploadPath . $coverImageFileName);
        } else {
            // Keep the existing cover image filename if not updated
            $coverImageFileName = $existingData['image_url'];
        }

        // Update SQL query
        $updateCategorySQL = "UPDATE loops_category SET loop_category=?, description=?, status=?, image_url=? WHERE id=?";
        $stmt = $mysqli->prepare($updateCategorySQL);
        $stmt->bind_param("ssisi", $title, $description, $status, $coverImageFileName, $categoryId);

        if ($stmt->execute()) {
            // Data updated successfully
            echo "<script>alert('Loops Category data updated successfully.');
                location.href = '$_SERVER[HTTP_REFERER]';</script>";
        } else {
            // Error occurred during update
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error: Loops Category not found.";
    }
}

// START the Fuction to EDIT/UPDATE Loops Category

/* ------------Start of Deleting Loops Category----------*/
if (isset($_GET['delete_category_field'])) {
    $delete = $_GET['delete_category_field'];

    // Retrieve the file paths for cover image before deleting the record
    $getFilePathsSQL = "SELECT image_url FROM loops_category WHERE id = ?";
    $stmt = $mysqli->prepare($getFilePathsSQL);
    $stmt->bind_param("i", $delete);
    $stmt->execute();
    $result = $stmt->get_result();
    $filePaths = $result->fetch_assoc();

    // Delete the related files if they exist
    if ($filePaths) {
        $coverImagePath = '../assets/uploads/cover_images/' . $filePaths['image_url'];

        if (file_exists($coverImagePath)) {
            unlink($coverImagePath);
        }
    }

    // Delete the record from the database
    $delField = $mysqli->query("DELETE FROM `loops_category` WHERE id = '$delete'");

    if ($delField) {
        echo "<script>alert('Delete Loops Category is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete Loops Category is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}
/* ------------END of Deleting Loops Category----------*/


// *******************************END OF LOOPS FUNCTION******************************* 


// *******************************START GAME CATEGORY FUNCTION******************************* 

/* ------------START the Fuction to Add/INSERT GAME CATEGORY ----------*/
if (isset($_POST['add_game_category'])) {
    // Get form data
    $js_name = $_POST['js_title'];
    $js_status = $_POST['js_status'];
    $created_by = $_POST['uid'];

    // File Upload
    $js_imageUploadPath = '../assets/uploads/game_category_images/';
    $uploadedFileName = $_FILES['js_image']['name']; // Original filename with spaces

    // Replace spaces with underscores
    $js_imageFileName = uniqid() . '_' . str_replace(' ', '_', $uploadedFileName);

    if (move_uploaded_file($_FILES['js_image']['tmp_name'], $js_imageUploadPath . $js_imageFileName)) {
        // Assuming other variables like $created, $updated are set elsewhere.

        $sql = "INSERT INTO game_category (category_name, category_image, created_by, status) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssii", $js_name, $js_imageFileName, $created_by, $js_status);

            if ($stmt->execute()) {
                // Data inserted successfully
                echo "<script>alert('Game Category inserted successfully.');
                location.href = '$_SERVER[HTTP_REFERER]';</script>";
            } else {
                // Error occurred during insertion
                echo "Error: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            // Error in preparing statement
            echo "Error in preparing statement: " . $mysqli->error;
        }
    } else {
        // File upload failed
        echo "File upload failed.";
    }
}

/* ------------END the Fuction to Add/INSERT GAME CATEGORY ----------*/

/* ------------START of Fuction to edit/update GAME CATEGORY ----------*/
if (isset($_POST['edit_game_category'])) {
    // Get form data
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];
    $status = $_POST['status'];

    // File upload paths for cover image
    $categoryImageUploadPath = '../assets/uploads/game_category_images/';

    // Retrieve existing data for the Games category based on ID
    $getCategoryDataSQL = "SELECT category_image FROM game_category WHERE category_id =?";
    $stmt = $mysqli->prepare($getCategoryDataSQL);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingData = $result->fetch_assoc();

    if ($existingData) {
        // Check if cover image is uploaded
        if (!empty($_FILES['category_image']['name'])) {
            // Delete the previous cover image file
            if (file_exists($categoryImageUploadPath . $existingData['category_image'])) {
                unlink($categoryImageUploadPath . $existingData['category_image']);
            }
            $uploadedFileName = $_FILES['category_image']['name']; // Original filename with spaces

            // Replace spaces with underscores
            $coverImageFileName = uniqid() . '_' . str_replace(' ', '_', $uploadedFileName);

            // Now $coverImageFileName will be a combination of the unique identifier, the original filename with spaces replaced by underscores.

            move_uploaded_file($_FILES['category_image']['tmp_name'], $categoryImageUploadPath . $coverImageFileName);
        } else {
            // Keep the existing cover image filename if not updated
            $coverImageFileName = $existingData['category_image'];
        }

        // Update SQL query
        $updateCategorySQL = "UPDATE game_category SET category_name=?, status=?, category_image=? WHERE category_id=?";
        $stmt = $mysqli->prepare($updateCategorySQL);
        $stmt->bind_param("sisi", $category_name, $status, $coverImageFileName, $category_id);

        if ($stmt->execute()) {
            // Data updated successfully
            echo "<script>alert('Games Category data updated successfully.');
                    location.href = '$_SERVER[HTTP_REFERER]';</script>";
        } else {
            // Error occurred during update
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error: Games Category not found.";
    }
}
/* ------------END of Fuction to edit/update GAME CATEGORY ----------*/

/* ------------Start of Deleting Games Category----------*/
if (isset($_GET['delete_game_category'])) {
    $delete = $_GET['delete_game_category'];

    // Retrieve the file paths for cover image before deleting the record
    $getFilePathsSQL = "SELECT category_image FROM game_category WHERE category_id = ?";
    $stmt = $mysqli->prepare($getFilePathsSQL);
    $stmt->bind_param("i", $delete);
    $stmt->execute();
    $result = $stmt->get_result();
    $filePaths = $result->fetch_assoc();

    // Delete the related files if they exist
    if ($filePaths) {
        $coverImagePath = '../assets/uploads/game_category_images/' . $filePaths['category_image'];

        if (file_exists($coverImagePath)) {
            unlink($coverImagePath);
        }
    }

    // Delete the record from the database
    $delField = $mysqli->query("DELETE FROM `game_category` WHERE category_id = '$delete'");

    if ($delField) {
        echo "<script>alert('Delete Games Category is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete Games Category is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}
/* ------------END of Deleting Games Category----------*/
// *******************************END of GAME CATEGORY FUNCTION******************************* 


// *******************************START JIGSAW CATEGORY IMAGES FUNCTION******************************* 

if (isset($_POST['add_jigsaw_category_images'])) {
    // Get form data
    $ji_name = $_POST['ji_name'];
    $ji_status = $_POST['ji_status'];
    $js_id = $_POST['cat_id'];
    $user_id = $_POST['uid'];

    // File Upload
    $ji_imageUploadPath = '../assets/uploads/jigsaw_images/';
    $ji_imageFileName = uniqid() . '_' . $_FILES['ji_image']['name'];

    if (move_uploaded_file($_FILES['ji_image']['tmp_name'], $ji_imageUploadPath . $ji_imageFileName)) {
        // Assuming other variables like $created, $updated are set elsewhere.

        $sql = "INSERT INTO jigsaw_image (ji_c_id, ji_name, ji_image, ji_status, created_by) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("issii", $js_id, $ji_name, $ji_imageFileName, $ji_status, $user_id);

            if ($stmt->execute()) {
                // Data inserted successfully
                echo "<script>alert('Jigsaw category image inserted successfully.');
                location.href = '$_SERVER[HTTP_REFERER]';</script>";
            } else {
                // Error occurred during insertion
                echo "Error: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            // Error in preparing statement
            echo "Error in preparing statement: " . $mysqli->error;
        }
    } else {
        // File upload failed
        echo "File upload failed.";
    }
}


if (isset($_POST['edit_jigsaw_category_images'])) {
    // Get form data
    $ji_id = $_POST['ji_id'];
    $ji_name = $_POST['ji_title'];
    $ji_update_status = $_POST['ji_update_status'];
    $user_id = $_POST['uid'];
    $c_id = $_POST['cat_id'];

    // File Upload
    if ($_FILES['ji_image']['error'] === UPLOAD_ERR_OK) {
        $ji_imageUploadPath = '../assets/uploads/jigsaw_images/';
        $ji_imageFileName = uniqid() . '_' . $_FILES['ji_image']['name'];

        if (move_uploaded_file($_FILES['ji_image']['tmp_name'], $ji_imageUploadPath . $ji_imageFileName)) {
            // File uploaded successfully

            // Assuming other variables like $created, $updated are set elsewhere.

            $sql = "UPDATE jigsaw_image SET ji_name=?, ji_c_id=?, ji_image=?, ji_status=?, created_by=? WHERE ji_id=?";
            $stmt = $mysqli->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("sisiii", $ji_name, $c_id, $ji_imageFileName, $ji_update_status, $user_id, $ji_id);

                if ($stmt->execute()) {
                    // Data updated successfully
                    echo "<script>alert('Jigsaw category image updated successfully.');
                    location.href = '$_SERVER[HTTP_REFERER]';</script>";
                } else {
                    // Error occurred during update
                    echo "Error: " . $stmt->error;
                }

                // Close the prepared statement
                $stmt->close();
            } else {
                // Error in preparing statement
                echo "Error in preparing statement: " . $mysqli->error;
            }
        } else {
            // File upload failed
            echo "File upload failed.";
        }
    } else {
        // Handle the case where no new image was uploaded.

        // Assuming other variables like $created, $updated are set elsewhere.

        $sql = "UPDATE jigsaw_image SET ji_name=?, ji_c_id=?, ji_status=?, created_by=? WHERE ji_id=?";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("siiii", $ji_name, $c_id, $ji_update_status, $user_id, $ji_id);

            if ($stmt->execute()) {
                // Data updated successfully
                echo "<script>alert('Jigsaw category image updated successfully.');
                location.href = '$_SERVER[HTTP_REFERER]';</script>";
            } else {
                // Error occurred during update
                echo "Error: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            // Error in preparing statement
            echo "Error in preparing statement: " . $mysqli->error;
        }
    }
}

// Handles to delete jigsaw category image


if (isset($_GET['delete_jicategory_image'])) {
    $deletejiCategoryId = $_GET['delete_jicategory_image'];
    $deletejiCategorySQL = "DELETE FROM `jigsaw_image` WHERE ji_id = ?";
    $stmt = $mysqli->prepare($deletejiCategorySQL);
    $stmt->bind_param("i", $deletejiCategoryId);

    if ($stmt->execute()) {
        echo "<script>alert('Delete Jigsaw Category image is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete jigsaw Category image is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}


// *******************************END JIGSAW CATEGORY IMAGES FUNCTION******************************* 


// *******************************START of WORD IMAGE MATCH FUNCTION******************************* 

/* ------------START the Fuction to Add/INSERT GAME Word&Image Match ----------*/
if (isset($_POST['add_word_match'])) {
    // Get form data
    $word_name = $_POST['word_name'];
    $game_level = $_POST['game_level'];
    $cat_id = $_POST['cat_id'];
    $created_by = $_POST['uid'];
    // File Upload
    $imageUploadPath = '../assets/uploads/word_image_match/';
    $imageFileName = uniqid() . '_' . $_FILES['word_image']['name'];

    if (move_uploaded_file($_FILES['word_image']['tmp_name'], $imageUploadPath . $imageFileName)) {
        // Assuming other variables like $created, $updated are set elsewhere.

        $sql = "INSERT INTO word_match (word_name, game_level, cat_id, word_image, created_by) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssisi", $word_name, $game_level, $cat_id, $imageFileName, $created_by);

            if ($stmt->execute()) {
                // Data inserted successfully
                echo "<script>alert('Game Word & Image inserted successfully.');
                location.href = '$_SERVER[HTTP_REFERER]';</script>";
            } else {
                // Error occurred during insertion
                echo "Error: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            // Error in preparing statement
            echo "Error in preparing statement: " . $mysqli->error;
        }
    } else {
        // File upload failed
        echo "File upload failed.";
    }
}

/* ------------END the Fuction to Add/INSERT GAME Word&Image Match----------*/

/* ------------START of Fuction to edit/update GAME Word&Image Match ----------*/
if (isset($_POST['edit_word_match'])) {
    // Get form data
    $word_name = $_POST['word_name'];
    $game_level = $_POST['game_level'];
    $cat_id = $_POST['cat_id'];
    $id = $_POST['id'];

    // File upload paths for cover image
    $categoryImageUploadPath = '../assets/uploads/word_image_match/';

    // Retrieve existing data for the Games category based on ID
    $getCategoryDataSQL = "SELECT word_image FROM word_match WHERE id =?";
    $stmt = $mysqli->prepare($getCategoryDataSQL);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingData = $result->fetch_assoc();

    if ($existingData) {
        // Check if cover image is uploaded
        if (!empty($_FILES['word_image']['name'])) {
            // Delete the previous cover image file
            if (file_exists($categoryImageUploadPath . $existingData['word_image'])) {
                unlink($categoryImageUploadPath . $existingData['word_image']);
            }

            $coverImageFileName = uniqid() . '_' . $_FILES['word_image']['name'];
            move_uploaded_file($_FILES['word_image']['tmp_name'], $categoryImageUploadPath . $coverImageFileName);
        } else {
            // Keep the existing cover image filename if not updated
            $coverImageFileName = $existingData['word_image'];
        }

        // Update SQL query
        $updateCategorySQL = "UPDATE word_match SET game_level=?, word_name=?, word_image=?, cat_id=? WHERE id=?";
        $stmt = $mysqli->prepare($updateCategorySQL);
        $stmt->bind_param("sssii", $game_level, $word_name, $coverImageFileName, $cat_id, $id);

        if ($stmt->execute()) {
            // Data updated successfully
            echo "<script>alert('Games Word Match data updated successfully.');
                    location.href = '$_SERVER[HTTP_REFERER]';</script>";
        } else {
            // Error occurred during update
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error: Games Word Image not found.";
    }
}
/* ------------END of Fuction to edit/update GAME Word&Image Match ----------*/

/* ------------Start of Deleting Games Category----------*/
if (isset($_GET['delete_matchword_field'])) {
    $delete = $_GET['delete_matchword_field'];

    // Retrieve the file paths for cover image before deleting the record
    $getFilePathsSQL = "SELECT word_image FROM word_match WHERE id = ?";
    $stmt = $mysqli->prepare($getFilePathsSQL);
    $stmt->bind_param("i", $delete);
    $stmt->execute();
    $result = $stmt->get_result();
    $filePaths = $result->fetch_assoc();

    // Delete the related files if they exist
    if ($filePaths) {
        $coverImagePath = '../assets/uploads/word_image_match/' . $filePaths['word_image'];

        if (file_exists($coverImagePath)) {
            unlink($coverImagePath);
        }
    }

    // Delete the record from the database
    $delField = $mysqli->query("DELETE FROM `word_match` WHERE id = '$delete'");

    if ($delField) {
        echo "<script>alert('Delete Match Word Field is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete Match Word Field is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}
/* ------------END of Deleting Games Category----------*/
// *******************************END of WORD IMAGE MATCH FUNCTION******************************* 


// *******************************START of QUIZ(MCQ) CATEGORY FUNCTION******************************* 

/* ------------START the Fuction to Add/INSERT QUIZ(MCQ) CATEGORY FUNCTION----------*/
if (isset($_POST['add_quiz_category'])) {
    // Get form data
    $category_name = $_POST['category_name'];
    $created_by = $_POST['uid'];
    $status = $_POST['status'];
    // File Upload
    $imageUploadPath = '../assets/uploads/mcq_category_image/';
    $imageFileName = uniqid() . '_' . $_FILES['category_image']['name'];

    if (move_uploaded_file($_FILES['category_image']['tmp_name'], $imageUploadPath . $imageFileName)) {

        $sql = "INSERT INTO  tb_quiz_category (category_name, category_image, status, created_by ) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ssii", $category_name, $imageFileName, $status, $created_by);

            if ($stmt->execute()) {
                // Data inserted successfully
                echo "<script>alert('MCQ Category inserted successfully.');
                location.href = '$_SERVER[HTTP_REFERER]';</script>";
            } else {
                // Error occurred during insertion
                echo "Error: " . $stmt->error;
            }

            // Close the prepared statement
            $stmt->close();
        } else {
            // Error in preparing statement
            echo "Error in preparing statement: " . $mysqli->error;
        }
    } else {
        // File upload failed
        echo "File upload failed.";
    }
}

/* ------------END the Fuction to Add/INSERT QUIZ(MCQ) CATEGORY FUNCTION----------*/


/* ------------START of Fuction to edit/update QUIZ(MCQ) CATEGORY ----------*/
if (isset($_POST['edit_quiz_category'])) {
    // Get form data
    $category_name = $_POST['category_name'];
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];

    // File upload paths for cover image
    $categoryImageUploadPath = '../assets/uploads/mcq_category_image/';

    // Retrieve existing data for the Games category based on ID
    $getCategoryDataSQL = "SELECT category_image FROM tb_quiz_category WHERE category_id =?";
    $stmt = $mysqli->prepare($getCategoryDataSQL);
    $stmt->bind_param("i", $category_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $existingData = $result->fetch_assoc();

    if ($existingData) {
        // Check if cover image is uploaded
        if (!empty($_FILES['category_image']['name'])) {
            // Delete the previous cover image file
            if (file_exists($categoryImageUploadPath . $existingData['category_image'])) {
                unlink($categoryImageUploadPath . $existingData['category_image']);
            }

            $coverImageFileName = uniqid() . '_' . $_FILES['category_image']['name'];
            move_uploaded_file($_FILES['category_image']['tmp_name'], $categoryImageUploadPath . $coverImageFileName);
        } else {
            // Keep the existing cover image filename if not updated
            $coverImageFileName = $existingData['category_image'];
        }

        // Update SQL query
        $updateCategorySQL = "UPDATE tb_quiz_category SET category_name=?, status=?, category_image=? WHERE category_id=?";
        $stmt = $mysqli->prepare($updateCategorySQL);
        $stmt->bind_param("sisi", $category_name, $status, $coverImageFileName, $category_id);

        if ($stmt->execute()) {
            // Data updated successfully
            echo "<script>alert('QUIZ(MCQ) Category data updated successfully.');
                    location.href = '$_SERVER[HTTP_REFERER]';</script>";
        } else {
            // Error occurred during update
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error: QUIZ(MCQ) Category not found.";
    }
}
/* ------------END of Fuction to edit/update QUIZ(MCQ) CATEGORY ----------*/

/* ------------Start of QUIZ(MCQ) CATEGORY Delete Function----------*/
if (isset($_GET['delete_quiz_category'])) {
    $delete = $_GET['delete_quiz_category'];

    // Delete the questions related to the category from the "questions" table
    $delQuestions = $mysqli->query("DELETE FROM `questions` WHERE category_id= '$delete'");

    // Check if the questions were deleted successfully
    if ($delQuestions) {
        // Retrieve the file paths for cover image before deleting the record
        $getFilePathsSQL = "SELECT category_image FROM tb_quiz_category WHERE category_id = ?";
        $stmt = $mysqli->prepare($getFilePathsSQL);
        $stmt->bind_param("i", $delete);
        $stmt->execute();
        $result = $stmt->get_result();
        $filePaths = $result->fetch_assoc();

        // Delete the related files if they exist
        if ($filePaths) {
            $coverImagePath = '../assets/uploads/mcq_category_image/' . $filePaths['category_image'];

            if (file_exists($coverImagePath)) {
                unlink($coverImagePath);
            }
        }

        // Delete the record from the "tb_quiz_category" table
        $delCategory = $mysqli->query("DELETE FROM `tb_quiz_category` WHERE category_id = '$delete'");

        if ($delCategory) {
            echo "<script>alert('Delete of QUIZ(MCQ) Category and related questions is successful.');
            location.href='$_SERVER[HTTP_REFERER]';</script>";
        } else {
            echo "<script>alert('Delete of QUIZ(MCQ) Category is successful, but related questions deletion failed.');
            location.href = '$_SERVER[HTTP_REFERER]';</script>";
        }
    } else {
        echo "<script>alert('Delete of questions related to QUIZ(MCQ) Category failed.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}

/* ------------END of QUIZ(MCQ) CATEGORY Delete Function----------*/

// *******************************END of QUIZ(MCQ) CATEGORY FUNCTION******************************* 

// *******************************START of QUIZ(MCQ) QUESTION FUNCTION******************************* 

/* ------------START the Fuction to Add/INSERT QUIZ(MCQ) CATEGORY FUNCTION----------*/
if (isset($_POST['add_quiz_question'])) {
    // Get form data
    $question = $_POST['question'];
    $ans1 = $_POST['ans1'];
    $ans2 = $_POST['ans2'];
    $ans3 = $_POST['ans3'];
    $ans4 = $_POST['ans4'];
    $correct_answer = $_POST['correct_answer'];
    $category_id = $_POST['category_id'];
    $status = $_POST['status'];

    $sql = "INSERT INTO  questions (question, ans1, ans2, ans3, ans4, correct_answer, category_id, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssssii", $question, $ans1, $ans2, $ans3, $ans4, $correct_answer, $category_id, $status);

        if ($stmt->execute()) {
            // Data inserted successfully
            echo "<script>alert('MCQ Question inserted successfully.');
                location.href = '$_SERVER[HTTP_REFERER]';</script>";
        } else {
            // Error occurred during insertion
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Error in preparing statement
        echo "Error in preparing statement: " . $mysqli->error;
    }
}

/* ------------END the Fuction to Add/INSERT QUIZ(MCQ) QUESTION FUNCTION----------*/

/* ------------START of Fuction to edit/update QUIZ(MCQ) Question ----------*/
if (isset($_POST['edit_quiz_question'])) {
    // Get form data
    $question = $_POST['question'];
    $ans1 = $_POST['ans1'];
    $ans2 = $_POST['ans2'];
    $ans3 = $_POST['ans3'];
    $ans4 = $_POST['ans4'];
    $correct_answer = $_POST['correct_answer'];
    $qno = $_POST['qno'];
    $status = $_POST['status'];

    // Update SQL query
    $updateCategorySQL = "UPDATE questions SET question=?, ans1=?, ans2=?, ans3=?, ans4=?, correct_answer=?, status=? WHERE qno=?";
    $stmt = $mysqli->prepare($updateCategorySQL);
    $stmt->bind_param("ssssssii", $question, $ans1, $ans2, $ans3, $ans4, $correct_answer, $status, $qno);

    if ($stmt->execute()) {
        // Data updated successfully
        echo "<script>alert('QUIZ(MCQ) Question data updated successfully.');
                    location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Error occurred during update
        echo "Error: " . $stmt->error;
    }
    // Close the prepared statement
    $stmt->close();
}
/* ------------END of Fuction to edit/update QUIZ(MCQ) Question ----------*/

/* ------------Start of QUIZ(MCQ) Question Delete Function----------*/
if (isset($_GET['delete_quiz_question'])) {
    $delete = $_GET['delete_quiz_question'];

    // Delete the record from the database
    $delField = $mysqli->query("DELETE FROM `questions` WHERE qno = '$delete'");

    if ($delField) {
        echo "<script>alert('Delete of QUIZ(MCQ) Question is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete of QUIZ(MCQ) Question is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}
/* ------------END of QUIZ(MCQ) Question Delete Function----------*/

// *******************************END of QUIZ(MCQ) QUESTION FUNCTION******************************* 




// *******************************START TRUE OR FALSE FUNCTION******************************* 

if (isset($_POST['add_true_false'])) {
    $tf_name = $_POST['tf_name'];
    $tf_status = $_POST['tf_status'];
    $js_id = $_POST['category_id'];
    $user_id = $_POST['uid'];
    $true = 1;
    $false = 0;
    $tf_select = $_POST['tf_select'];
    $tf_imageUploadPath = '../assets/uploads/jigsaw_images/';
    $tf_imageFileName = uniqid() . '_' . $_FILES['tf_image']['name'];

    if (move_uploaded_file($_FILES['tf_image']['tmp_name'], $tf_imageUploadPath . $tf_imageFileName)) {
        $sql = "INSERT INTO true_false_questions (question, `true`, `false`, is_true, category_id, tf_image, tf_status, tf_created_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("siiiisii", $tf_name, $true, $false, $tf_select, $js_id, $tf_imageFileName, $tf_status, $user_id);
            if ($stmt->execute()) {
                echo "<script>alert('True/False question inserted successfully.');
                location.href = '$_SERVER[HTTP_REFERER]';</script>";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error in preparing statement: " . $mysqli->error;
        }
    } else {
        echo "File upload failed.";
    }
}



if (isset($_POST['edit_true_false'])) {
    // var_dump($_FILES);
    // exit;
    $tf_id = $_POST['tf_id'];
    $tf_name = $_POST['tf_title'];
    $tf_status = $_POST['tf_update_status'];
    $tf_select = $_POST['tf_select'];
    $true = 1;
    $false = 0;
    $tf_imageUploadPath = '../assets/uploads/jigsaw_images/';
    $tf_imageFileName = uniqid() . '_' . $_FILES['tf_image']['name'];
    if (isset($_FILES['tf_image']['tmp_name']) && !empty($_FILES['tf_image']['tmp_name'])) {
        if (move_uploaded_file($_FILES['tf_image']['tmp_name'], $tf_imageUploadPath . $tf_imageFileName)) {
            $sql = "UPDATE true_false_questions SET question=?, `true`=?, `false`=?, is_true=?, tf_image=?, tf_status=? WHERE tf_id=?";
            $stmt = $mysqli->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("siiisii", $tf_name, $true, $false, $tf_select, $tf_imageFileName, $tf_status, $tf_id);

                if ($stmt->execute()) {
                    echo "<script>alert('True/False question updated successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error in preparing statement: " . $mysqli->error;
            }
        } else {
            echo "Error uploading the image.";
        }
    } else {
        $sql = "UPDATE true_false_questions SET question=?, is_true=?, tf_status=? WHERE tf_id=?";
        $stmt = $mysqli->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sisi", $tf_name, $tf_select, $tf_status, $tf_id);

            if ($stmt->execute()) {
                echo "<script>alert('True/False question updated successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error in preparing statement: " . $mysqli->error;
        }
    }
}


if (isset($_GET['delete_tf_questions'])) {
    $deletetfCategoryId = $_GET['delete_tf_questions'];
    $deletetfCategorySQL = "DELETE FROM `true_false_questions` WHERE tf_id = ?";
    $stmt = $mysqli->prepare($deletetfCategorySQL);
    $stmt->bind_param("i", $deletetfCategoryId);

    if ($stmt->execute()) {
        echo "<script>alert('Delete True/False question is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete jigsaw Category image is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}

// *******************************END TRUE OR FALSE FUNCTION******************************* 
if (isset($_POST['add_crossgame_clue'])) {
    $cc_clue = $_POST['cc_clue'];
    $cc_answer = $_POST['cc_answer'];
    $cc_direction = $_POST['cc_direction'];
    $cc_category = $_POST['cc_category'];
    $cc_row = $_POST['cc_row'];
    $cc_column = $_POST['cc_column'];

    $query = "INSERT INTO `crossword_clue` (`cc_id`,`direction`, `row`, `column_name`, `clue`, `answer`) 
              VALUES ($cc_category, '$cc_direction', '$cc_row', '$cc_column', '$cc_clue', '$cc_answer')";
    // exit;
    $run = mysqli_query($mysqli, $query);

    if ($run) {
        echo "<script>alert('Clue Added Successfully.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
        exit();
    } else {
        echo "<script>alert('Error: " . mysqli_error($mysqli) . "'); </script>";
    }
}


if (isset($_POST['update_crossgame_clue'])) {
    $clue_id = $_POST['clue_id'];
    $direction = $_POST['cc_direction'];
    $row = $_POST['cc_row'];
    $cc_category = $_POST['cc_category'];
    $column = $_POST['cc_column'];
    $clue = $_POST['cc_clue'];
    $answer = $_POST['cc_answer'];
    $query = "UPDATE crossword_clue SET  direction = '$direction', `row` = '$row', `cc_id` = '$cc_category',`column_name` = '$column', clue = '$clue', answer = '$answer' WHERE clue_id = '$clue_id' ";
    $run = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    if (mysqli_affected_rows($mysqli) > 0) {
        echo "<script>alert('Clue Updated Successfully');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
        exit();
    } else {
        echo "<script>alert('Error, try again!');</script> ";
    }
}

if (isset($_GET['delete_clue'])) {
    $delete = $_GET['delete_clue'];

    // Delete the record from the database
    $delField = $mysqli->query("DELETE FROM `crossword_clue` WHERE clue_id = '$delete'");

    if ($delField) {
        echo "<script>alert('Delete Crosssword Clue is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete Crosssword Clue is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}


if (isset($_POST['add_blog'])) {
    // var_dump($_FILES);
    var_dump($_POST);
    exit;
}

// *****************************************EDIT CONTACT US *************************************************//
// *******************************ADITIONAL CHILDERN FUNCTION******************************* 


if (isset($_POST['edit_contactus'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Update the status of the child in the database
    // Define the update query.
    $updatecontactQuery = "UPDATE contact_us SET status = ? WHERE id = ?";

    // Prepare the SQL statement.
    $stmt = $mysqli->prepare($updatecontactQuery);

    // Bind the parameters.
    $stmt->bind_param("si", $status, $id);

    // Execute the query.
    if ($stmt->execute()) {
        echo "<script>alert('Updated successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "Error updating Children: " . $mysqli->error;
    }

    $stmt->close();
}

// *******************************ADITIONAL CHILDERN FUNCTION******************************* 


/* ------------add course DO IT ONLINE quiz question----------*/

if (isset($_POST['add_doitonline_question'])) {



    $ltqq_id = $_POST['ltqq_id'];
    $ltqq_question = mysqli_real_escape_string($mysqli,$_POST['ltqq_question']);
    $ltqq_type = $_POST['ltqq_type'];
    $radiobutton = $_POST['answermulchoice'];

    if ($ltqq_type == "Multiple Choice Question") {
        $answer1 = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer1']));
        $answer2 = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer2']));
        $answer3 = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer3']));
        $answer4 = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer4']));
        $radiobutton = htmlentities($_POST['answermulchoice']);
    } elseif ($ltqq_type == "True And False") {
        $answer1 = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer5']));
        $answer2 = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer6']));
        $answer3 = '';
        $answer4 = '';

        $radiobutton = htmlentities($_POST['tf_answer']);
    } elseif ($ltqq_type == "Short Answers") {
        $answer1 = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer7']));
        $answer2 = '';

        $answer3 = '';
        $answer4 = '';
        // $radiobutton = $_POST['question_answer7'];
    }

    if ($radiobutton == 1) {
        $word = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer1']));
    } elseif ($radiobutton == 2) {
        $word = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer2']));
    } elseif ($radiobutton == 3) {
        $word = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer3']));
    } elseif ($radiobutton == 4) {
        $word = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer4']));
    } elseif ($radiobutton == 5) {
        $word = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer5']));
    } elseif ($radiobutton == 6) {
        $word = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer6']));
    } elseif ($radiobutton == null) {
        $word = htmlentities(mysqli_real_escape_string($mysqli, $_POST['question_answer7']));
    }
    if ($_FILES['file_upload']['name'] != '') {
        $target_directory = '../assets/uploads/doitonline_images/';
        $uploadedFileName = basename($_FILES['file_upload']['name']);
        $file_name = uniqid() . '_' . str_replace(' ', '_', $uploadedFileName);
        $target_file = $target_directory . $file_name;

        if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_file)) {
            $do_image = $file_name;
        } else {
            $do_image = ''; // Set to empty if file upload fails
            // echo "<script>alert('Uploading fail.');</script>";
        }
    } else {
        $do_image = ''; // Set to empty if no file is uploaded
        // echo "<script>alert('File not uploaded fail.');</script>";
    }

// echo "INSERT INTO doit_online (lesson_id,do_question_type,do_question,do_question_answer1,do_question_answer2,do_question_answer3,do_question_answer4,do_correct_answer,do_image,do_status,do_created_by)
//         VALUES ('$ltqq_id', '$ltqq_type', '$ltqq_question', '$answer1', '$answer2', '$answer3', '$answer4', '$word', '$do_image', '1', '2')";
//         exit;
    // Insert data into the database
    $add_answer = $mysqli->query("INSERT INTO doit_online (lesson_id,do_question_type,do_question,do_question_answer1,do_question_answer2,do_question_answer3,do_question_answer4,do_correct_answer,do_image,do_status,do_created_by)
        VALUES ('$ltqq_id', '$ltqq_type', '$ltqq_question', '$answer1', '$answer2', '$answer3', '$answer4', '$word', '$do_image', '1', '2')");

    if ($add_answer) {
        echo ("<script>alert('Insert question is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>");
    } else {
        echo "<script>alert('Insert question is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}
/* ------------add course DO IT ONLINE quiz question----------*/


/* ------------Edit course DO IT ONLINE quiz question----------*/

if (isset($_POST['edit_doitonline_question'])) {



    $ltqq_id = $_POST['ltqq_id'];
    $do_id = $_POST['do_id'];
    $ltqq_question = mysqli_real_escape_string($mysqli,$_POST['ltqq_question']);
    $existing_do_image = $_POST['existing_do_image'];
    $ltqq_type = $_POST['ltqq_type'];
    $radiobutton = $_POST['answermulchoice'];

    if ($ltqq_type == "Multiple Choice Question") {
        $answer1 = mysqli_real_escape_string($mysqli, $_POST['question_answer1']);
        $answer2 = mysqli_real_escape_string($mysqli, $_POST['question_answer2']);
        $answer3 = mysqli_real_escape_string($mysqli, $_POST['question_answer3']);
        $answer4 = mysqli_real_escape_string($mysqli, $_POST['question_answer4']);
        $radiobutton = $_POST['answermulchoice'];
    } elseif ($ltqq_type == "True And False") {
        $answer1 = mysqli_real_escape_string($mysqli, $_POST['question_answer5']);
        $answer2 = mysqli_real_escape_string($mysqli, $_POST['question_answer6']);
        $answer3 = '';
        $answer4 = '';

        $radiobutton = $_POST['tf_answer'];
    } elseif ($ltqq_type == "Short Answers") {
        $answer1 = mysqli_real_escape_string($mysqli, $_POST['question_answer7']);
        $answer2 = '';
        $answer3 = '';
        $answer4 = '';
        // $radiobutton = $_POST['question_answer7'];
    }

    if ($radiobutton == 1) {
        $word = mysqli_real_escape_string($mysqli, $_POST['question_answer1']);
    } elseif ($radiobutton == 2) {
        $word = mysqli_real_escape_string($mysqli, $_POST['question_answer2']);
    } elseif ($radiobutton == 3) {
        $word = mysqli_real_escape_string($mysqli, $_POST['question_answer3']);
    } elseif ($radiobutton == 4) {
        $word = mysqli_real_escape_string($mysqli, $_POST['question_answer4']);
    } elseif ($radiobutton == 5) {
        $word = mysqli_real_escape_string($mysqli, $_POST['question_answer5']);
    } elseif ($radiobutton == 6) {
        $word = mysqli_real_escape_string($mysqli, $_POST['question_answer6']);
    } elseif ($radiobutton == null) {
        $word = mysqli_real_escape_string($mysqli, $_POST['question_answer7']);
    }
    if ($_FILES['file_upload']['name'] != '') {
        $target_directory = '../assets/uploads/doitonline_images/';
        $uploadedFileName = basename($_FILES['file_upload']['name']);
        $file_name = uniqid() . '_' . str_replace(' ', '_', $uploadedFileName);
        $target_file = $target_directory . $file_name;

        if (move_uploaded_file($_FILES['file_upload']['tmp_name'], $target_file)) {
            $do_image = $file_name;
            // Unlink the previous image file
            $existing_do_image_path = '../assets/uploads/doitonline_images/' . $existing_do_image;
            if ($existing_do_image_path != '') {
                @unlink($existing_do_image_path);
            }
        } else {
            $do_image = $existing_do_image; // Set to existing file name if file upload fails
        }
    } else {
        $do_image = $existing_do_image; // Set to existing file if no file is uploaded
    }

    // Insert data into the database
    $add_answer = $mysqli->query("UPDATE `doit_online` SET 
    `do_question`='$ltqq_question',
    `do_question_answer1`='$answer1',
    `do_question_answer2`='$answer2',
    `do_question_answer3`='$answer3',
    `do_question_answer4`='$answer4',
    `do_correct_answer`='$word',
    `do_image`='$do_image'
    WHERE do_id=$do_id");

    if ($add_answer) {
        echo ("<script>alert('Edit question is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>");
    } else {
        echo "<script>alert('Edit question is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}
/* ------------Edit course DO IT ONLINE quiz question----------*/
/* ------------Start of Deleting DO IT ONLINE----------*/
if (isset($_GET['delete_question_do_it_online'])) {
    $delete = $_GET['delete_question_do_it_online'];

    // Retrieve the file paths for ONLINE quiz question image before deleting the record
    $getFilePathsSQL = "SELECT do_image FROM doit_online WHERE do_id = ?";
    $stmt = $mysqli->prepare($getFilePathsSQL);
    $stmt->bind_param("i", $delete);
    $stmt->execute();
    $result = $stmt->get_result();
    $filePaths = $result->fetch_assoc();

    // Delete the related files if they exist
    if ($filePaths) {
        $doImagePath = '../assets/uploads/doitonline_images/' . $filePaths['do_image'];

        if (!empty($filePaths['do_image']) && file_exists($doImagePath)) {
            unlink($doImagePath);
        }
    }

    // Delete the record from the database
    $delField = $mysqli->query("DELETE FROM `doit_online` WHERE do_id = '$delete'");

    if ($delField) {
        echo "<script>alert('Delete Question Field is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "<script>alert('Delete Question Field is not successful.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    }
}
/* ------------END of Deleting DO IT ONLINE----------*/
