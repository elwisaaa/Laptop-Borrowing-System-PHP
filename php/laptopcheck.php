<?php

include 'connection.php';
$laptopid = $conn->real_escape_string($_POST['data']);
$result = $conn->query("SELECT laptop_id FROM laptop WHERE laptop_id = '$laptopid' AND isAvailable = 'Y'");
if($result->num_rows > 0) {
  	$response = array('dataFound' => true);
  }
else{
	$response = array('dataFound' => false);
}
header('Content-Type: application/json');
echo json_encode($response);
?>