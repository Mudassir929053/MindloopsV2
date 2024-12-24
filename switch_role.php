<?php
session_start();

if(isset($_SESSION['role_id'])) {
    if($_SESSION['role_id'] == 2) {
        $_SESSION['role_id'] = 3;
    } elseif($_SESSION['role_id'] == 3) {
        $_SESSION['role_id'] = 2;
    }
    echo "success";
} else {
    echo "Failed to switch role.";
}
exit;
// Check if the database connection file was included successfully
// if (!$mysqli) {
//     // Error in establishing database connection
//     echo "<script>alert('Failed to connect to the database.');</script>";
// } else {
//     // Check if the user is logged in and has the parent role
//     if(isset($_SESSION['uid'])) {
//         // Update user role to teacher in the database
//         $userId = $_SESSION['uid'];
//         $newRole = 2; // Assuming teacher role ID is 2

//         // Prepare and execute the SQL statement
//         $query = "UPDATE user_table SET role_id = ? WHERE uid = ?";
//         $stmt = $mysqli->prepare($query);
//         if($stmt === false) {
//             // Error in preparing the statement
//             $message = "Failed to prepare the SQL statement.";
//         } else {
//             $stmt->bind_param("ii", $newRole, $userId); // "ii" indicates two integer parameters
//             $result = $stmt->execute();

//             if($result) {
//                 // Role updated successfully
//                 $message = "Role switched to teacher successfully!";
//             } else {
//                 // Failed to update role
//                 $message = "Failed to switch role. Please try again.";
//             }
//         }
//     } else {
//         // User is not authorized to switch roles
//         $message = "You are not authorized to switch roles.";
//     }

//     // Output the message
//     echo "<script>alert('$message');</script>";
// }
?>
