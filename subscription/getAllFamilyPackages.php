
<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
include "../dbconnect.php";

session_start();
if( !isset($_SESSION["userType"]) ){
  $login=false;
}else{
  $login=true;
}
    $sql = "SELECT * FROM tb_spackages WHERE p_id LIKE ?";

    try {
      $name = "2%";

$stmt = mysqli_stmt_init($conn);

	if (!mysqli_stmt_prepare($stmt, $sql)){
		echo json_encode("SQL ERROR");
	}else{

		mysqli_stmt_bind_param($stmt, "s", $name);

		if (mysqli_stmt_execute($stmt)){
      $output= '<div class="container" id="packageContainer">
      <div class="row" id="packages">';
      $i=0;
      $cssArray = array();
      $result = $stmt->get_result(); 
  while($row = $result->fetch_assoc()){
    $output .= '<div class="col-md-5" >
      <div class="pricingTable" id="subscriptionPackage'.$i.'">
          <div class="pricingTable-header">';
      $output .= '
      <br><br>
          <h3 class="title">'.$row['p_name'].'</h3>
      </div>';
      $description =$row['p_desc'];
$str_arr = explode (",", $description); 
foreach($str_arr as $value){
  $output .= '<ul class="pricing-content">
<li>'.$value.'</li>
</ul>';
}

$duration = $row['p_duration'];
$price = $row['p_price'];
$durationType = substr($duration, strpos($duration, " ") + 1); 
$frontCurrency = 'RM';
$frontPrice = strtok($price,'.');
if (($pos = strpos($price, ".")) !== FALSE) { 
  $backPrice = substr($price, strpos($price, ".") + 1); 
  }else{
    $backPrice="00";
  }
if($backPrice!='0')
{
 
  $output .= '<div class="price-value">
<span class="currency">'.$frontCurrency.'</span>
<span class="amount">'.$frontPrice.'</span>
<span class="cent">'.$backPrice.'</span>
<span class="duration">per '.strtolower($durationType).'
</span>
</div>';}else{
  $output .= '<div class="price-value">
<span class="cent">'.$frontCurrency.'</span>
<span class="amount">'.$frontPrice.'</span>
<span class="currency">.00</span>
<span class="duration">/ '.strtolower($durationType).'
</span>
</div>';
}

  $output.='<div class="pricingTable-signup">
  <a href="familyPackagePage.html?package='.$row['p_id']. '">Buy Now</a>
</div>
</div>
</div>';
array_push($cssArray,("subscriptionPackage".$i));
$i++;
      }
    }else{
      echo "No results";
    }
  
  } 
       $output .= '</div>
   </div>';
        $data = array(
          "package" => $output,
          "loginStatus"=>$login,
          "cssID" => $cssArray
      );
	    echo json_encode($data);
    } catch (PDOException $e) {
        $data = array(
            "status" => "fail"
        );
        echo json_encode($e);
    }
    
        
    ?>
    