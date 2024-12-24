<?php 
session_start();

include_once 'config/connection.php';
    // var_dump($mysqli);
extract($_POST);
 $entered_password =  password_hash($password, PASSWORD_DEFAULT);
// exit;
$sql = "INSERT INTO user_table (full_name, email, mobile, password,status) VALUES (?, ?, ?, ?,'active')";
$userData=[];
 // Prepare the statement
 $stmt = $mysqli->prepare($sql);
 if ($stmt) {
     // Bind the email parameter to the placeholder
     $stmt->bind_param("ssss", $full_name,$email,$phone,$entered_password);
     // Execute the statement
     if ($stmt->execute()) {
        $sql1 = "SELECT * FROM user_table WHERE email = ? AND status = 'active'";
        $stmt1 = $mysqli->prepare($sql1);

        if ($stmt1) {
            // Bind the email parameter to the placeholder
            $stmt1->bind_param("s", $email);
       
            // Execute the statement
            $stmt1->execute();
       
            // Get the result
            $result1 = $stmt1->get_result();
       
            if ($result1->num_rows == 1) {
                // Fetch and display user data
                while ($row1 = $result1->fetch_assoc()) {
                    
                   $userData = $row1;
                //    extract($row);
       
                }
                foreach ($userData as $key => $value) {
                    if($value)
                    $_SESSION[$key] = $value;
                }
    
                // var_dump($_SESSION);
                $_SESSION['login_status'] = 1;
            }

        }



        echo "Record inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

     } else {
         // No matching user found
         echo "Something went wrong.";
     }

?>