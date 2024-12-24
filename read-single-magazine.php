<?php

include "config/connection.php";


$m_id = $_GET['m_id'];

$sql = "SELECT * FROM `magazine` WHERE magazine_id  = ?";

try{
    $stmt = mysqli_stmt_init($mysqli);
    

    if (!mysqli_stmt_prepare($stmt, $sql)){  

        $data = array(
            "status" => "fail"
        );
        echo json_encode($data);

    }else{

        mysqli_stmt_bind_param($stmt, "s", $m_id);

        mysqli_stmt_execute($stmt); 
        $result = $stmt->get_result();
        $finalData = array();

        while($row = $result->fetch_assoc()){    
            $data = array(
                "status" => "success",
                "m_id" => $row["magazine_id"],
                "m_imgPath" => $row["cover_image_url"],
                "m_title" => $row["title"],
                // "m_edition" => $row["m_edition"],
                "m_rDate" => $row["publish_date"],
                // "m_author" => $row["m_author"],
                "m_desc" => $row["description"],
                "m_filePath" => $row["magazine_path"]
                // "m_pageLimit" => $row["m_pageLimit"]
            );
            
            array_push($finalData, $data);
        }

        echo json_encode($finalData);
    }
}
catch(PDOException $e){
    $data = array(
        "status" => "fail"
    );
    echo json_encode($data);
}


?>