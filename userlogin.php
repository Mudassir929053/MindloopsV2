<?php 
session_start();

include_once 'config/connection.php';
    // var_dump($mysqli);
    extract($_POST);
    // $password = password_verify($password,'password_hash');
//  $sql = "select * from user_table where email='$email' and status='active'";

$entered_password = $password;

 $sql = "SELECT * FROM user_table WHERE (email = ? OR username = ?) AND status = 'active'";


 // Prepare the statement
 $stmt = $mysqli->prepare($sql);

 if ($stmt) {
     // Bind the email parameter to the placeholder
     $stmt->bind_param("ss", $email,$email);

     // Execute the statement
     $stmt->execute();

     // Get the result
     $result = $stmt->get_result();

     if ($result->num_rows == 1) {
         // Fetch and display user data
         while ($row = $result->fetch_assoc()) {
             
            $userData = $row;
            extract($row);

         }
        //  session_destroy();
         if(password_verify($entered_password, $password)){
            // echo "Correct password amir".$password;
            
            foreach ($userData as $key => $value) {
                if($value)
                $_SESSION[$key] = $value;
            }

            // var_dump($_SESSION);
            $_SESSION['login_status'] = 1;

           

         }
         else{
            // echo "invalid password ".$entered_password;
            $_SESSION['login_status'] = 0;
         }
         echo json_encode($_SESSION);

     } else {
         // No matching user found
         echo  json_encode(["message" =>"No user found with the provided email.","login_status"=>0]);
     }

     // Close the statement and database mysqliection
     $stmt->close();
    //  $mysqli->close();
 } else {
     echo "Error in preparing the SQL statement.";
 }

?>