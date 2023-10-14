<?php
include 'connection.php';

//get all the data
$laptopid = $_POST['laptopid'];
$ic = $_POST['ic'];
$name = $_POST['name'];
$dateborrow= $_POST['dateborrow'];
$datesend = $_POST['datesend'];
$purpose = $_POST['purpose'];
$insert = $conn->query("INSERT INTO borrow (user_id, user_name, laptop_id, borrow_start, borrow_end, borrow_purpose) VALUES ('$ic','$name','$laptopid','$dateborrow','$datesend','$purpose')");
if($insert) {
    $response = array('success' => true);
    $setavail = $conn->query("UPDATE laptop SET isAvailable='N' WHERE laptop_id='$laptopid'");

} else {
    $response = array('success' => false);
}
header('Content-Type: application/json');
echo json_encode($response);

?>