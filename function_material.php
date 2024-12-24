<?php
// Include database connection
// include 'db_connection.php';

/* ------------Start of Adding Material By Teacher----------*/

// Check if the form is submitted
if (isset($_POST['add_teacher_material'])) {
    // Retrieve form inputs
    $grade_id = $_POST['goalFrequency'];
    $subj_id = $_POST['goalFrequencysub'];
    $lesson_id = $_POST['lesson_id'];
    $material_type = $_POST['goalFrequencytype'];
    $created_by = $_POST['user_id'];

    // Handle file upload
    $file_name = $_FILES['myFile']['name']; // Original file name with extension
    $file_tmp = $_FILES['myFile']['tmp_name']; // Temporary file path

    // Generate a unique file name
    $unique_file_name = uniqid() . '_' . $file_name; // Prepend unique id to file name

    // File destination path
    $file_destination = 'assets/uploads/teacher_material/' . $unique_file_name; // Path where file will be stored

    // Move uploaded file to destination folder
    if (move_uploaded_file($file_tmp, $file_destination)) {
        // Insert query
        $insert_query = "INSERT INTO teacher_material (subj_id, grade_id, lesson_id, material_type, material, created_by) 
                        VALUES ('$subj_id', '$grade_id', '$lesson_id', '$material_type', '$unique_file_name', '$created_by')";

        // Execute query
        if ($mysqli->query($insert_query) === TRUE) {
            echo "<script>alert('$material_type Material added successfully.'); location.href = '$_SERVER[HTTP_REFERER]';</script>";
            $query = "SELECT COUNT(lesson_id) AS count FROM teacher_material WHERE created_by = $created_by";
            $countStmt = $mysqli->prepare($query);
            $countStmt->execute();
            $countResult = $countStmt->get_result();
            $row = $countResult->fetch_assoc();
            $mindboosterCount = $row['count'];

            $badgeMessage = "";

            if ($mindboosterCount >= 50) {
                if ($mindboosterCount == 50) {
                    $badge_category = 'Mindbooster';
                    $badge_level = 1;
                    $badge_to = 'teacher';
                    $badge_earned = "INSERT INTO badge_earned (uid, badge_category, badge_level, badge_to, datetime) VALUES (?, ?, ?, ?, NOW())";
                    $secondTableStmt = $mysqli->prepare($badge_earned);
                    $secondTableStmt->bind_param("isss", $created_by, $badge_category, $badge_level, $badge_to);

                    if ($secondTableStmt->execute()) {
                        $badgeMessage = "You Earned Level 1 Badge";
                    } else {
                        $badgeMessage = "Failed to insert into second table";
                    }
                } else {
                    $badgeMessage = "You Already Earned Level 1 Badge";
                }
            }
            if ($mindboosterCount >= 150) {
                if ($mindboosterCount == 150) {
                    $badge_category = 'Mindbooster';
                    $badge_level = 2;
                    $badge_to = 'teacher';
                    $badge_earned = "INSERT INTO badge_earned (uid, badge_category, badge_level, badge_to, datetime) VALUES (?, ?, ?, ?, NOW())";
                    $secondTableStmt = $mysqli->prepare($badge_earned);
                    $secondTableStmt->bind_param("isss", $created_by, $badge_category, $badge_level, $badge_to);

                    if ($secondTableStmt->execute()) {
                        $badgeMessage = "You Earned Level 2 Badge";
                    } else {
                        $badgeMessage = "Failed to insert into second table";
                    }
                } else {
                    $badgeMessage = "You Already Earned Level 2 Badge";
                }
            }
            if ($mindboosterCount >= 300) {
                if ($mindboosterCount == 300) {
                    $badge_category = 'Mindbooster';
                    $badge_level = 3;
                    $badge_to = 'teacher';
                    $badge_earned = "INSERT INTO badge_earned (uid, badge_category, badge_level, badge_to, datetime) VALUES (?, ?, ?, ?, NOW())";
                    $secondTableStmt = $mysqli->prepare($badge_earned);
                    $secondTableStmt->bind_param("isss", $created_by, $badge_category, $badge_level, $badge_to);

                    if ($secondTableStmt->execute()) {
                        $badgeMessage = "You Earned Level 3 Badge";
                    } else {
                        $badgeMessage = "Failed to insert into second table";
                    }
                } else {
                    $badgeMessage = "You Already Earned Level 3 Badge";
                }
            }
        } else {
            echo "Error: " . $insert_query . "<br>" . $mysqli->error;
        }
    } else {
        echo "File upload failed";
    }
}
/* ------------End of Adding Material By Teacher----------*/

/* ------------Start of Adding Tutor Profile----------*/

// Check if the form is submitted
if (isset($_POST['add_tutor_profile'])) {
    // Retrieve form inputs
    // $name = $_POST['name'];
    $subject = $_POST['subject'];
    $location = $_POST['coverImage'];
    $collegename = $_POST['collegename'];
    $coursename = $_POST['coursename'];
    $startdate = $_POST['startdate'];
    if (empty($_POST['enddate'])) {
        $enddate = NULL;
    } else {
        $enddate = $_POST['enddate'];
    }

    $gender = $_POST['gender'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $fromTime = $_POST['fromTime'];
    $toTime = $_POST['toTime'];
    $description = $_POST['description'];
    $grade = $_POST['grade'];
    $amount = $_POST['amount'];
    $user_id = $_POST['userid'];

    // Handle file uploads
    $experienceCertificate = $_FILES['experienceCertificate'];
    $educationCertificates = $_FILES['educationCertificates'];
    $profilepicture = $_FILES['profilepicture'];

    // Handle file upload for experience certificate
    $experience_certificate = uploadFile($experienceCertificate, 'assets/uploads/tutor/experience_certificates/');

    // Handle file upload for education certificates (multiple files)
    $education_certificates = [];
    foreach ($educationCertificates['tmp_name'] as $key => $tmp_name) {
        $education_certificates[] = uploadFile(['tmp_name' => $tmp_name, 'name' => $educationCertificates['name'][$key]], 'assets/uploads/tutor/education_certificates/');
    }

    // Prepare the education certificate filenames array
    $education_certificates_imploded = implode(',', $education_certificates);
    // Handle file upload for profile picture
    $profile_picture = uploadFile($profilepicture, 'assets/uploads/tutor/profile_pictures/');

    // Insert query using prepared statement
    $insert_query = "INSERT INTO tutorprofiles (subject, location, collegename, coursename, startdate, enddate, gender, skills, experience, experience_certificate, education_certificates, profile_picture, from_time, to_time, description, grade, amount, user_id) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $mysqli->prepare($insert_query);

    // Bind parameters
    $stmt->bind_param("sssssssssssssssssi", $subject, $location, $collegename, $coursename, $startdate, $enddate, $gender, $skills, $experience, $experience_certificate, $education_certificates_imploded, $profile_picture, $fromTime, $toTime, $description, $grade, $amount, $user_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Tutor profile created successfully.');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Function to handle file upload
function uploadFile($file, $destination)
{
    $file_name = $file['name']; // Original file name with extension
    $file_tmp = $file['tmp_name']; // Temporary file path
    $unique_file_name = uniqid() . '_' . $file_name; // Generate a unique file name
    $file_destination = $destination . $unique_file_name; // File destination path

    // Move uploaded file to destination folder
    if (move_uploaded_file($file_tmp, $file_destination)) {
        return $unique_file_name; // Return the unique file name
    } else {
        echo "File upload failed";
        return null; // Return null if file upload fails
    }
}

/* ------------End of Adding Tutor Profile----------*/

/* ------------Start of Updating Tutor Profile----------*/

// Check if the form is submitted for updating profile
if (isset($_POST['edit_tutor_profile'])) {
    // Retrieve form inputs
    $subject = $_POST['subject'];
    $location = $_POST['location'];
    $collegename = $_POST['collegename'];
    $coursename = $_POST['coursename'];
    $startdate = $_POST['startdate'];
    $enddate = !empty($_POST['enddate']) ? $_POST['enddate'] : NULL;
    $gender = $_POST['gender'];
    $skills = $_POST['skills'];
    $experience = $_POST['experience'];
    $fromTime = $_POST['fromTime'];
    $toTime = $_POST['toTime'];
    $description = $_POST['description'];
    $grade = $_POST['grade'];
    $amount = $_POST['amount'];
    $user_id = $_POST['userid'];

    // Handle file uploads
    $experienceCertificate = $_FILES['experienceCertificate'];
    $educationCertificates = $_FILES['educationCertificates'];
    $profilepicture = $_FILES['profilepicture'];

    // Fetch the profile details
    $profileId = $user_id;
    $query = "SELECT * FROM tutorprofiles WHERE user_id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $profileId);
    $stmt->execute();
    $result = $stmt->get_result();
    $profile = $result->fetch_assoc();

    // Check if new experience certificate is uploaded
    $new_experience_certificate = !empty($experienceCertificate['name']) ? uploadFile($experienceCertificate, 'assets/uploads/tutor/experience_certificates/') : $profile['experience_certificate'];
    // If new file is uploaded, unlink the old file
    if (!empty($experienceCertificate['name']) && !empty($profile['experience_certificate'])) {
        unlink('assets/uploads/tutor/experience_certificates/' . $profile['experience_certificate']);
    }

    // Check if new education certificates are uploaded
    $new_education_certificates = !empty($educationCertificates['name'][0]) ? [] : explode(',', $profile['education_certificates']);
    if (!empty($educationCertificates['name'][0])) {
        // Delete old education certificate files
        foreach ($new_education_certificates as $old_certificate) {
            unlink('assets/uploads/tutor/education_certificates/' . $old_certificate);
        }
        // Upload new education certificate files
        foreach ($educationCertificates['tmp_name'] as $key => $tmp_name) {
            $new_education_certificates[] = uploadFile(['tmp_name' => $tmp_name, 'name' => $educationCertificates['name'][$key]], 'assets/uploads/tutor/education_certificates/');
        }
    }

    // Check if new profile picture is uploaded
    $new_profile_picture = !empty($profilepicture['name']) ? uploadFile($profilepicture, 'assets/uploads/tutor/profile_pictures/') : $profile['profile_picture'];
    // If new file is uploaded, unlink the old file
    if (!empty($profilepicture['name']) && !empty($profile['profile_picture'])) {
        unlink('assets/uploads/tutor/profile_pictures/' . $profile['profile_picture']);
    }

    // Update query using prepared statement
    $update_query = "UPDATE tutorprofiles SET subject=?, location=?, collegename=?, coursename=?, startdate=?, enddate=?, gender=?, skills=?, experience=?, experience_certificate=?, education_certificates=?, profile_picture=?, from_time=?, to_time=?, description=?, grade=?, amount=? WHERE user_id=?";

    // Prepare the statement
    $stmt = $mysqli->prepare($update_query);

    // Implode education certificates array
    $imploded_education_certificates = implode(',', $new_education_certificates);

    // Bind parameters
    $stmt->bind_param("sssssssssssssssssi", $subject, $location, $collegename, $coursename, $startdate, $enddate, $gender, $skills, $experience, $new_experience_certificate, $imploded_education_certificates, $new_profile_picture, $fromTime, $toTime, $description, $grade, $amount, $user_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Tutor profile updated successfully.');</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}

/* ------------End of Updating Tutor Profile----------*/
