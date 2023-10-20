<?php
include 'connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

//get all the data
$idlaptop = $_POST['idlaptop'];
$laptopname = $_POST['laptopname'];
$image = $_POST['image'];
$insert = $conn->query("INSERT INTO laptop (laptop_id, laptop_name, isAvailable, imgFile) VALUES ('$idlaptop','$laptopname','Y','$image')");
if($insert) {
    $response = array('success' => true);
} else {
    $response = array('success' => false);
}
header('Content-Type: application/json');
echo json_encode($response);

?>