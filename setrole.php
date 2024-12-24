<?php
session_start();

include_once 'config/connection.php';
// array(4) {
//     ["user_token"]=>
//     string(21) "116499287888446740676"
//     ["role_id"]=>
//     NULL
//     ["code"]=>
//     string(73) "4/0AfJohXkd58XEywCy3r6-WiiW8HlPWYYfo1nyB-E5WHWw5nMGHys3R5jTjFPGRgo9gqW36A"
//     ["uid"]=>
//     string(2) "18"
//   }
//   array(1) {
//     ["role"]=>
//     string(7) "teacher"
//   }

extract($_SESSION);

extract($_GET);

$sql = "select * from user_role where role='$role'";
$result = $mysqli->query($sql);
$new_role_id = null;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   $new_role_id= $row["id"];
  }
}

$sqlupadate = "update user_table set role_id = '$new_role_id' where uid=$uid and role_id is null";
$result_update = $mysqli->query($sqlupadate);

if(mysqli_affected_rows($mysqli)>0){
    echo "Role updated successfully";
}
else{
    echo "Nothing to update";
}
$_SESSION['role_id']=$new_role_id;


