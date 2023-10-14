<?php
include 'connection.php';
$borrowid = $conn->real_escape_string($_POST['borrowid']);
$now = date("d-m-Y");
$checknull = $conn->query("UPDATE borrow SET borrow_end = '$now' WHERE borrow_id = '$borrowid'");
//Added to be available
$setavailable = $conn->query("UPDATE laptop JOIN borrow ON laptop.laptop_id = borrow.laptop_id SET laptop.isAvailable ='Y'
WHERE borrow_id = '$borrowid'");
$sended = array('toggled' => true);
header('Content-Type: application/json');
echo json_encode($sended);
?>