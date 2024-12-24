<?php
include_once 'config/connection.php';

extract($_GET);

if(isset($username)){
    $sql = "SELECT * FROM user_table WHERE username = ?";

    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        // Bind the email parameter to the placeholder
        $stmt->bind_param("s", $username);
        // Execute the statement
        $stmt->execute();
        // Get the result
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "Username already exist";
        }
        else{
            echo "New username";
        }
    }

}