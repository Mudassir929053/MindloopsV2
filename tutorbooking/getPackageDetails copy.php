<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
include "../dbconnect.php";
include "checkLoggedIn.php";
$currentUserEmail = $_SESSION['email'];
$id = $_GET['id'];   
    $sql = "SELECT * FROM tb_spackages WHERE p_id=?";

    try {
        $stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)){
		echo json_encode("SQL ERROR");
	}else{

		mysqli_stmt_bind_param($stmt, "s", $id);

		if (mysqli_stmt_execute($stmt)){
      $output= '<div class=""><div class="row">';
      $i=0;
      $result = $stmt->get_result(); 
  while($row = $result->fetch_assoc()){
    $output=array(
        "name"=>$row['p_name'],
        "price"=>$row['p_price'],
        "email"=>$currentUserEmail
    );
  }}
else{
    $output=array(
        "name"=>"error",
        "price"=>"error"
    );
}
echo json_encode($output);
}

        /* $packageStatement = $conn->prepare($sql);
        $packageStatement->execute();
        while($row = $packageStatement->fetch(PDO::FETCH_ASSOC)){
            $output=array(
                "name"=>$row['p_name'],
                "price"=>$row['p_price']
            );
        }
	    echo json_encode($output); */
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($e);
    }
    
        
    ?>
    