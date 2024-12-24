<?php
// *****************************************************************MINDBOOSTER******************************************************************//

//******************************************************************Add Grade****************************************************************//
if (isset($_POST['add_Grade'])) {
    // Get form data
    $grade_name = $_POST['grade_name'];
    $grade = $_POST['grade'];
    $status_grade = $_POST['grade_status'];

    // Check if the record already exists in the database
    $sqlCheck = "SELECT * FROM grade_table WHERE grade_name = ? AND grade = ?";
    $stmtCheck = $mysqli->prepare($sqlCheck);
    $stmtCheck->bind_param("si", $grade_name, $grade);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();

    if ($result->num_rows > 0) {
        // Data already exists, send a response to the frontend
        echo "<script>alert('Data already exists with the same grade name and grade.');
		location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Data does not exist, proceed with inserting
        $sqlGrade = "INSERT INTO grade_table (grade_name, grade, grade_status) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sqlGrade);
        $stmt->bind_param("sds", $grade_name, $grade, $status_grade);

        if ($stmt->execute()) {
            // Data inserted successfully
            echo "<script>alert('Data inserted successfully.');
		location.href = '$_SERVER[HTTP_REFERER]';</script>";
        } else {
            // Error occurred during insertion
            echo "Error: " . $stmt->error;
        }
    }
}


// ************************************************************UPDATE GRADE*******************************************************************//

if (isset($_POST['update_Grade'])) {
    // Get form data
    $grade_id = $_POST['grade_id'];
    $edit_grade_name = $_POST['edit_grade_name'];
    $edit_grade = $_POST['edit_grade'];
    $edit_status = $_POST['edit_status'];

    // Check if the record already exists in the database with the same grade_name and grade (excluding the current ID)
    $sqlCheck = "SELECT * FROM grade_table WHERE grade_name = ? AND grade = ? AND grade_id != ?";
    $stmtCheck = $mysqli->prepare($sqlCheck);
    $stmtCheck->bind_param("sdi", $edit_grade_name, $edit_grade, $grade_id);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();

    if ($result->num_rows > 0) {
        // Data already exists, send a response to the frontend
        echo "exists";
        echo "<script>alert('Data already exists with the same grade name and grade.');
		location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Data does not exist, proceed with updating
        $sqlUpdate = "UPDATE grade_table SET grade_name = ?, grade = ?, grade_status = ? WHERE grade_id = ?";
        $stmt = $mysqli->prepare($sqlUpdate);
        $stmt->bind_param("sdii", $edit_grade_name, $edit_grade, $edit_status, $grade_id);

        if ($stmt->execute()) {
            // Data updated successfully
            echo "<script>alert('Data updated successfully.');
		location.href = '$_SERVER[HTTP_REFERER]';</script>";
        } else {
            // Error occurred during update
            echo "Error: " . $stmt->error;
        }
    }
}


// *****************************************************DELETE GRADE*******************************************************************************************//

if (isset($_GET['delete_grade'])) {
    $grade_id = $_GET['delete_grade'];

    // Perform the deletion query
    $sqlDelete = "DELETE FROM grade_table WHERE grade_id = ?";
    $stmt = $mysqli->prepare($sqlDelete);
    $stmt->bind_param("i", $grade_id);

    if ($stmt->execute()) {
        // Deletion successful
        echo "<script>alert('Grade deleted successfully.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Error occurred during deletion
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "";
}

// ***************************************************************END OF GRADE ********************************************************************//

// **************************************************************START OF SUBJECT******************************************************************//

// **************************************************************ADD SUBJECT******************************************************************//

//***************************************************************Add Subject***************************************************//
if (isset($_POST['add_Subject'])) {
    // Get form data
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
    $subject_status = $_POST['subject_status'];

    // Check if the record already exists in the database
    $sqlCheck = "SELECT * FROM subject_table WHERE subject_name = ? AND subject_code = ?";
    $stmtCheck = $mysqli->prepare($sqlCheck);
    $stmtCheck->bind_param("ss", $subject_name, $subject_code);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();

    if ($result->num_rows > 0) {
        // Data already exists, send a response to the frontend with an alert message and redirect
        echo "<script>alert('Data already exists with the same subject name and subject code.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Data does not exist, proceed with inserting
        $sqlSubject = "INSERT INTO subject_table (subject_name, subject_code, subject_status) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sqlSubject);
        $stmt->bind_param("ssi", $subject_name, $subject_code, $subject_status);

        if ($stmt->execute()) {
            // Data inserted successfully, send a success message and redirect
            echo "<script>alert('Data inserted successfully.');
            location.href = '$_SERVER[HTTP_REFERER]';</script>";
        } else {
            // Error occurred during insertion, display the error
            echo "Error: " . $stmt->error;
        }
    }
}


//************************************************************Update Subject************************************************************//
if (isset($_POST['update_Subject'])) {
    // Get form data
    $subject_id = $_POST['subject_id'];
    $edit_subject_name = $_POST['edit_subject_name'];
    $edit_subject_code = $_POST['edit_subject_code'];
    $edit_subject_status = $_POST['edit_subject_status'];

    // Check if the record already exists in the database
    $sqlCheck = "SELECT * FROM subject_table WHERE subject_name = ? AND subject_code = ? AND subject_id != ?";
    $stmtCheck = $mysqli->prepare($sqlCheck);
    $stmtCheck->bind_param("ssi", $edit_subject_name, $edit_subject_code, $subject_id);
    $stmtCheck->execute();
    $result = $stmtCheck->get_result();

    if ($result->num_rows > 0) {
        // Data already exists, send a response to the frontend with an alert message and redirect
        echo "<script>alert('Data already exists with the same subject name and subject code.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Data does not exist, proceed with updating
        $sqlUpdate = "UPDATE subject_table SET subject_name = ?, subject_code = ?, subject_status = ? WHERE subject_id = ?";
        $stmt = $mysqli->prepare($sqlUpdate);
        $stmt->bind_param("ssii", $edit_subject_name, $edit_subject_code, $edit_subject_status, $subject_id);

        if ($stmt->execute()) {
            // Data updated successfully, send a success message and redirect
            echo "<script>alert('Data updated successfully.');
            location.href = '$_SERVER[HTTP_REFERER]';</script>";
        } else {
            // Error occurred during update, display the error
            echo "Error: " . $stmt->error;
        }
    }
}

// *****************************************************DELETE SUBJECT***************************************************************************//

if (isset($_GET['delete_subject'])) {
    $subject_id = $_GET['delete_subject'];

    // Perform the deletion query
    $sqlDelete = "DELETE FROM subject_table WHERE subject_id = ?";
    $stmt = $mysqli->prepare($sqlDelete);
    $stmt->bind_param("i", $subject_id);

    if ($stmt->execute()) {
        // Deletion successful
        echo "<script>alert('Subject deleted successfully.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Error occurred during deletion
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "";
}

// *****************************************************END OF SUBJECT*********************************************************//


// *******************************************START OF LESSON****************************************************************//

// ***********************************************ADD LESSON**************************************************//


if (isset($_POST['add_Lesson'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $grade_id = $_POST['grade_id'];
    $subject_id = $_POST['subject_id'];
    $status = $_POST['status'];

    // Define upload paths
    $uploadPath = '../assets/uploads/lesson/';
    $created_by = $_POST['uid']; // You can change this default value as needed

    // $created_by = $_POST['uid']; // You can change this default value as needed

    // Initialize variables to store file names
    $lessonImagesFileName = $lessonPlanFileName = $worksheetFileName = $supplementaryNoteFileName = $quizFileName = $performanceActivityFileName = null;
    $currentDateTime = date('YmdHis');
   // Function to sanitize file names (replace spaces with underscores)
function sanitizeFileName($fileName) {
    return str_replace(' ', '_', $fileName);
}

// Check and move uploaded files to the appropriate directories with sanitized file names
if (!empty($_FILES['images']['name'])) {
    $lessonImagesFileName = $currentDateTime . '_' . sanitizeFileName($_FILES['images']['name']);
    move_uploaded_file($_FILES['images']['tmp_name'], $uploadPath . $lessonImagesFileName);
}

if (!empty($_FILES['lesson_plan']['name'])) {
    $lessonPlanFileName = $currentDateTime . '_' . sanitizeFileName($_FILES['lesson_plan']['name']);
    move_uploaded_file($_FILES['lesson_plan']['tmp_name'], $uploadPath . $lessonPlanFileName);
}

if (!empty($_FILES['worksheet']['name'])) {
    $worksheetFileName = $currentDateTime . '_' . sanitizeFileName($_FILES['worksheet']['name']);
    move_uploaded_file($_FILES['worksheet']['tmp_name'], $uploadPath . $worksheetFileName);
}

if (!empty($_FILES['supplementary_note']['name'])) {
    $supplementaryNoteFileName = $currentDateTime . '_' . sanitizeFileName($_FILES['supplementary_note']['name']);
    move_uploaded_file($_FILES['supplementary_note']['tmp_name'], $uploadPath . $supplementaryNoteFileName);
}

if (!empty($_FILES['quiz']['name'])) {
    $quizFileName = $currentDateTime . '_' . sanitizeFileName($_FILES['quiz']['name']);
    move_uploaded_file($_FILES['quiz']['tmp_name'], $uploadPath . $quizFileName);
}

if (!empty($_FILES['performance_activity']['name'])) {
    $performanceActivityFileName = $currentDateTime . '_' . sanitizeFileName($_FILES['performance_activity']['name']);
    move_uploaded_file($_FILES['performance_activity']['tmp_name'], $uploadPath . $performanceActivityFileName);
}

// Continue with your insertion code...

    // Insert data into the database
    $insertQuery = "INSERT INTO lesson_table (title, description, grade_id, subject_id, images, lesson_plan, worksheet, supplementary_note, quiz, performance_based_activity, status, created_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("ssiissssssii", $title, $description, $grade_id, $subject_id, $lessonImagesFileName, $lessonPlanFileName, $worksheetFileName, $supplementaryNoteFileName, $quizFileName, $performanceActivityFileName, $status, $created_by);

    if ($stmt->execute()) {
        // Data inserted successfully
        echo "<script>alert('Data inserted successfully.');
      location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Error occurred during insertion
        echo "Error: " . $stmt->error;
    }
    // $stmt->close();
}



// ***************************************EDIT LESSON***************************************************//

// Check if the 'edit_Lesson' form is submitted
if (isset($_POST['edit_Lesson'])) {
    $lessonId = $_POST['lesson_id'];
    $title = $_POST['edit_title'];
    $description = $_POST['edit_description'];
    $grade_id = $_POST['grade_id'];
    $subject_id = $_POST['subject_id'];
    $status = $_POST['edit_status'];

    // Define upload paths
    $uploadPath = '../assets/uploads/lesson/';

    // Initialize variables to store file names
    $currentDateTime = date('YmdHis');

    // Initialize variables to store file names
    $lessonImagesFileName = $lessonPlanFileName = $worksheetFileName = $supplementaryNoteFileName = $quizFileName = $performanceActivityFileName = null;

    // Function to sanitize file names (replace spaces with underscores)
function sanitizeFileName($fileName) {
    return str_replace(' ', '_', $fileName);
}

// Initialize variables to store file names
$lessonImagesFileName = $lessonPlanFileName = $worksheetFileName = $supplementaryNoteFileName = $quizFileName = $performanceActivityFileName = null;

// Check and move uploaded files to the appropriate directories with sanitized file names
if (!empty($_FILES['edit_images']['name'])) {
    $lessonImagesFileName = $currentDateTime . '_' . sanitizeFileName($_FILES['edit_images']['name']);
    move_uploaded_file($_FILES['edit_images']['tmp_name'], $uploadPath . $lessonImagesFileName);
}

if (!empty($_FILES['edit_lesson_plan']['name'])) {
    $lessonPlanFileName = $currentDateTime . '_' . sanitizeFileName($_FILES['edit_lesson_plan']['name']);
    move_uploaded_file($_FILES['edit_lesson_plan']['tmp_name'], $uploadPath . $lessonPlanFileName);
}

if (!empty($_FILES['edit_worksheet']['name'])) {
    $worksheetFileName = $currentDateTime . '_' . sanitizeFileName($_FILES['edit_worksheet']['name']);
    move_uploaded_file($_FILES['edit_worksheet']['tmp_name'], $uploadPath . $worksheetFileName);
}

if (!empty($_FILES['edit_supplementary_note']['name'])) {
    $supplementaryNoteFileName = $currentDateTime . '_' . sanitizeFileName($_FILES['edit_supplementary_note']['name']);
    move_uploaded_file($_FILES['edit_supplementary_note']['tmp_name'], $uploadPath . $supplementaryNoteFileName);
}

if (!empty($_FILES['edit_quiz']['name'])) {
    $quizFileName = $currentDateTime . '_' . sanitizeFileName($_FILES['edit_quiz']['name']);
    move_uploaded_file($_FILES['edit_quiz']['tmp_name'], $uploadPath . $quizFileName);
}

if (!empty($_FILES['edit_performance_activity']['name'])) {
    $performanceActivityFileName = $currentDateTime . '_' . sanitizeFileName($_FILES['edit_performance_activity']['name']);
    move_uploaded_file($_FILES['edit_performance_activity']['tmp_name'], $uploadPath . $performanceActivityFileName);
}

// Continue with your code handling the updated file names.


    // Update the database with the new file names (whether they are empty or not)
    $updateQuery = "UPDATE lesson_table SET 
        title = ?,
        description = ?,
        grade_id = ?,
        subject_id = ?,
        images = IFNULL(?, images),
        lesson_plan = IFNULL(?, lesson_plan),
        worksheet = IFNULL(?, worksheet),
        supplementary_note = IFNULL(?, supplementary_note),
        quiz = IFNULL(?, quiz),
        performance_based_activity = IFNULL(?, performance_based_activity),
        status = ?
        WHERE lesson_id = ?";

    $stmt = $mysqli->prepare($updateQuery);
    $stmt->bind_param("ssiissssssii", $title, $description, $grade_id, $subject_id, $lessonImagesFileName, $lessonPlanFileName, $worksheetFileName, $supplementaryNoteFileName, $quizFileName, $performanceActivityFileName, $status, $lessonId);

    if ($stmt->execute()) {
        // Data updated successfully
        echo "<script>alert('Data updated successfully.');
          location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Error occurred during update
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}



// ***************************************DELETE LESSON********************************************//

if (isset($_GET['delete_lesson'])) {
    $lesson_id = $_GET['delete_lesson'];

    // Perform the deletion query
    $sqlDeletelesson = "DELETE FROM lesson_table WHERE lesson_id = ?";
    $stmt = $mysqli->prepare($sqlDeletelesson);
    $stmt->bind_param("i", $lesson_id);

    if ($stmt->execute()) {
        // Deletion successful
        echo "<script>alert('Lesson deleted successfully.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Error occurred during deletion
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "";
}




// *******************************START of WORD SEARCH******************************* 

/* ------------INSERT WORDS ----------*/
if (isset($_POST['add_word_search'])) {
    // Get form data
    // $words = $_POST['words'];

    $level = $_POST['level'];
    $cat_id = $_POST['cat_id'];
    $created_by = $_POST['uid'];

    $created_by = $_POST['uid'];

  $words = $_POST['words'];

// Remove spaces and convert all words to lowercase to perform a case-insensitive check
$words_array = explode(",", $words);
$words_array = array_map('trim', $words_array); // Remove leading and trailing spaces
$words_array = array_map('strtolower', $words_array);

// Remove duplicates (case-insensitive)
$words_array = array_unique($words_array);

if (count($words_array) < count(explode(",", $words))) {
    // There are duplicates in the words list
    echo "<script>alert('Duplicate words found in the word list. Please remove the duplicates and try again.');
          location.href = '$_SERVER[HTTP_REFERER]';</script>";
    exit;
} else {
    // Convert words back to their original case if needed
    $words_array = array_map('ucfirst', $words_array); // or strtoupper for uppercase

    // Reconstruct the cleaned words
    $words = implode(",", $words_array);
}

    // Define upload paths
    $uploadPath = '../assets/uploads/wordsearch/';

    // Initialize variables to store file names
    $currentDateTime = date('YmdHis');

    $imageFileName = $currentDateTime . '_' . $_FILES['addimage']['name'];



    if (move_uploaded_file($_FILES['addimage']['tmp_name'], $uploadPath . $imageFileName)) {
        // Assuming other variables like $created, $updated are set elsewhere.

        $sqlwordsearch = "INSERT INTO tb_wordsearch (wordsearch_words, wordsearch_level, cat_id, wordsearch_image, created_by) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sqlwordsearch);

        if ($stmt) {
            $stmt->bind_param("ssisi", $words, $level, $cat_id, $imageFileName, $created_by);

            if ($stmt->execute()) {
                // Data inserted successfully
                echo "<script>alert('Words inserted successfully.');
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

/* ------------EDIT WORDS ----------*/
if (isset($_POST['edit_word_search'])) {
    // Get form data
    $wordsearch_id = $_POST['wordsearch_id'];
    $editWords = $_POST['editWords'];
    $editLevel = $_POST['editLevel'];
    $editCat_id = $_POST['cat_id'];

    // Convert all words to lowercase to perform a case-insensitive check
    $words_array = explode(",", $editWords);
    $words_array = array_map('strtolower', $words_array);

    // Remove duplicates (case-insensitive)
    $words_array = array_unique($words_array);

    if (count($words_array) < count(explode(",", $editWords))) {
        // There are duplicates in the words list
        echo "<script>alert('Duplicate words found in the word list. Please remove the duplicates and try again.');
           location.href = '$_SERVER[HTTP_REFERER]';</script>";
        exit;
    } else {
        // Convert words back to their original case if needed
        $words_array = array_map('ucfirst', $words_array); // or strtoupper for uppercase

    }

    // Additional processing for the image (if updated)
    $imageFileName = ''; // Initialize to an empty string by default

    if (!empty($_FILES['updateimage']['name'])) {
        // A new image is provided.
        $uploadPath = '../assets/uploads/wordsearch/';
        $currentDateTime = date('YmdHis');
        $imageFileName = $currentDateTime . '_' . $_FILES['updateimage']['name'];

        if (move_uploaded_file($_FILES['updateimage']['tmp_name'], $uploadPath . $imageFileName)) {
            // Image uploaded successfully
        } else {
            // Handle the case where file upload fails.
            echo "File upload failed.";
        }
    }

    // Handle updating the word search details in the database.
    if (!empty($imageFileName)) {
        $sqlUpdate = "UPDATE tb_wordsearch SET wordsearch_words = ?, wordsearch_level = ?, cat_id = ?, wordsearch_image = ? WHERE wordsearch_id = ?";
    } else {
        $sqlUpdate = "UPDATE tb_wordsearch SET wordsearch_words = ?, wordsearch_level = ?, cat_id = ? WHERE wordsearch_id = ?";
    }

    $stmt = $mysqli->prepare($sqlUpdate);

    if ($stmt) {
        if (!empty($imageFileName)) {
            $stmt->bind_param("ssisi", $editWords, $editLevel, $editCat_id, $imageFileName, $wordsearch_id);
        } else {
            $stmt->bind_param("ssii", $editWords, $editLevel, $editCat_id, $wordsearch_id);
        }

        if ($stmt->execute()) {
            // Data updated successfully
            echo "<script>alert('Words updated successfully.');
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

/* ------------DELETE WORDS ----------*/



if (isset($_GET['delete_wordsearch'])) {
    $wordsearch_id = $_GET['delete_wordsearch'];

    // Perform the deletion query
    $sqlDeleteWords_search = "DELETE FROM tb_wordsearch WHERE wordsearch_id = ?";
    $stmt = $mysqli->prepare($sqlDeleteWords_search);
    $stmt->bind_param("i", $wordsearch_id);

    if ($stmt->execute()) {
        // Deletion successful
        echo "<script>alert('Word Search words deleted successfully.');
        location.href = '$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Error occurred during deletion
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "";
}

// ******************************************COMMUNITY*******************************************************//
// *---------------------Add Community--------------------------------------------*//




// Check if the form is submitted
if (isset($_POST['add_community'])) {
    // Include your database connection file 
   // Retrieve form data
   $uid = $_POST['uid'];


   $communityName = $mysqli->real_escape_string($_POST['community_name']);
   $communityDesc = $mysqli->real_escape_string($_POST['community_desc']);
   $communityStatus = $mysqli->real_escape_string($_POST['community_status']);

    // You may want to validate the data before proceeding further

    // SQL query to insert data into the community table
    $sqlcomm = "INSERT INTO community (community_name, community_description, community_status, created_by, created_date)
            VALUES ('$communityName', '$communityDesc', '$communityStatus', '$uid', NOW())";

    // Perform the query
    if ($mysqli->query($sqlcomm) === TRUE) {
        // Insertion successful
        echo "<script>alert('Data inserted is successful.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Insertion failed
        
        echo "Error: " . $mysqli->error;
    }


}


// **********************************************EDIT COMMUNITY************************************************//





// Check if the form is submitted
if (isset($_POST['update_community'])) {
    // Include your database connection file
    // Retrieve form data
    $communityId = $mysqli->real_escape_string($_POST['community_id']);
    $communityName = $mysqli->real_escape_string($_POST['edit_community_name']);
    $communityDesc = $mysqli->real_escape_string($_POST['edit_community_description']);
    $communityStatus = $mysqli->real_escape_string($_POST['edit_community_status']);

    // SQL query to update data in the community table
    $sqlUpdate = "UPDATE community SET
                  community_name = '$communityName',
                  community_description = '$communityDesc',
                  community_status = '$communityStatus'
                  WHERE community_id = '$communityId'";

    // Perform the query
    if ($mysqli->query($sqlUpdate) === TRUE) {
        // Update successful
        echo "<script>alert('Community updated successfully.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Update failed
        echo "Error: " . $mysqli->error;
    }
}





// ***********************delete Community***************************************//
// Check if community_id is set in the URL
if (isset($_GET['delete_community'])) {
    $communityId = $_GET['delete_community'];

    // SQL query to delete the community entry
    $sqlDeletecommunity = "DELETE FROM community WHERE community_id = '$communityId'";
    // Perform the query
    if ($mysqli->query($sqlDeletecommunity) === TRUE) {
        // Deletion successful
        echo "<script>alert('Community deleted successfully.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Deletion failed
        echo "Error: " . $mysqli->error;
    }
} else {
    // community_id not set in the URL
    echo "Error: Missing community_id parameter.";
}


// ******************************COMMUNITY CATEGORY****************************************************//
// Check if the form is submitted
if (isset($_POST['add_cc'])) {
    // Include your database connection file 

    // Retrieve form data
    $uid = $_POST['uid'];
    $community_id = $_POST['community_id'];
    $cc_name = $mysqli->real_escape_string($_POST['cc_name']);
    $cc_desc = $mysqli->real_escape_string($_POST['cc_desc']);
    $cc_status = $mysqli->real_escape_string($_POST['cc_status']);

    // SQL query to insert data into the community_category table
    $sql = "INSERT INTO community_category (cc_community_id, cc_name, cc_description, cc_status, cc_created_date)
            VALUES ('$community_id', '$cc_name', '$cc_desc', '$cc_status', NOW())";

    // Perform the query
    if ($mysqli->query($sql) === TRUE) {
        // Insertion successful
        echo "<script>alert('Data inserted successfully.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Insertion failed
        echo "Error: " . $mysqli->error;
    }
}

// ***************************update community category*******************************// 
if (isset($_POST['update_cc'])) {
    // Retrieve form data
    $cc_id = $_POST['cc_id'];
    $ccName = $mysqli->real_escape_string($_POST['edit_cc_name']);
    $ccDescription = $mysqli->real_escape_string($_POST['edit_cc_description']);
    $ccStatus = $mysqli->real_escape_string($_POST['edit_cc_status']);

    // Validate data if needed

    // SQL query to update data in the community_category table
    $sqlUpdateCC = "UPDATE community_category
                    SET cc_name = '$ccName',
                        cc_description = '$ccDescription',
                        cc_status = '$ccStatus'
                    WHERE cc_id = '$cc_id'";

    // Perform the query
    if ($mysqli->query($sqlUpdateCC) === TRUE) {
        // Update successful
        echo "<script>alert('Data updated successfully.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Update failed
        echo "Error: " . $mysqli->error;
    }
}


// ****************************delete community category************************************//

if (isset($_GET['delete_cc'])) {
    // Get the community category ID to be deleted
     $ccIDToDelete = $_GET['delete_cc'];
    // SQL query to delete the community category
     $sqlDeleteCC = "DELETE FROM community_category WHERE cc_id = '$ccIDToDelete'";
    

    // Perform the query
    if ($mysqli->query($sqlDeleteCC) === TRUE) {
        // Deletion successful
        echo "<script>alert('Community category deleted successfully.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Deletion failed
        echo "Error: " . $mysqli->error;
    }
}




// **************************************************Add Article******************************************************//

if (isset($_POST['add_article'])) {
    $uid = $_POST['uid'];
    $category_id = $_POST['category_id'];
    $article_title = $_POST['a_name'];
    $article_content = $_POST['a_content'];
    $article_status = $_POST['a_status'];

    // Assuming you have a timestamp column for article_created_at
    $article_created_at = date('Y-m-d H:i:s');

    // Assuming you have a column for article_created_by
    $article_created_by = $uid;


//    echo $sql = "INSERT INTO community_article (article_cc_id, article_title, article_content, article_status, article_created_by, article_created_at)
//     VALUES ('$category_id', '$article_title', '$article_content', '$article_status', '$article_created_by', '$article_created_at')";
// exit;
    // Prepare the SQL statement
    $stmt = $mysqli->prepare("INSERT INTO community_article (article_cc_id, article_title, article_content, article_status, article_created_by, article_created_at) VALUES (?, ?, ?, ?, ?, ?)");

    if ($stmt === false) {
        die("Error in preparing statement: " . $mysqli->error);
    }

    // Bind parameters
    $stmt->bind_param("isssis", $category_id, $article_title, $article_content, $article_status, $article_created_by, $article_created_at);

    // Execute the statement
    $result = $stmt->execute();

    if ($result === false) {
        die("Error in executing statement: " . $stmt->error);
    }else{
        echo "<script>alert('Article inserted successfully.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    }

    
    
    exit;
}

// *************************************Update Article****************************************************//

if (isset($_POST['update_article'])) {
    // Extract data from the form
    $article_id = $_POST['edit_article_id'];
    $edit_article_title = $_POST['edit_article_title'];
    $edit_article_content = $_POST['edit_article_content'];
    $edit_article_status = $_POST['edit_article_status'];
    $article_updated_at = date('Y-m-d H:i:s');

    // Use mysqli_real_escape_string to escape special characters
    $edit_article_title = mysqli_real_escape_string($mysqli, $edit_article_title);
    $edit_article_content = mysqli_real_escape_string($mysqli, $edit_article_content);

    // Perform the update query
    $updateQuery = "UPDATE community_article SET
                    article_title = '$edit_article_title',
                    article_content = '$edit_article_content',
                    article_updated_at = '$article_updated_at',
                    article_status = '$edit_article_status'
                    WHERE article_id = $article_id";

    // Execute the query
    $result = $mysqli->query($updateQuery);

    // Check if the update was successful
    if ($result) {
        echo "<script>alert('Article Updated successfully.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        echo "Error updating article: " . $mysqli->error;
    }
}

// *************************************Delete Article****************************************************//

// Check if the delete_article parameter is set in the URL
if (isset($_GET['delete_article'])) {
    // Get the article ID from the URL
    $articleId = $_GET['delete_article'];

    // Perform the deletion operation in the database
    $deleteQuery = "DELETE FROM community_article WHERE article_id = $articleId";

    if ($mysqli->query($deleteQuery) === TRUE) {
        // Deletion successful
        echo "<script>alert('Article deleted successfully.');
        location.href='$_SERVER[HTTP_REFERER]';</script>";
    } else {
        // Deletion failed
        echo "Error deleting article: " . $mysqli->error;
    }

   
    exit;
}

?>

