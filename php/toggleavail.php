<?php

include 'connection.php';
$laptopid = $conn->real_escape_string($_POST['togglebtn']);
$checknull = $conn->query("SELECT borrow_end FROM borrow WHERE borrow_end = ''");
$checkstatus = $conn->query("SELECT isAvailable FROM laptop WHERE laptop_id = '$laptopid'");
$checkstatus = $checkstatus->fetch_array()[0] ?? '';
if (str_contains($checkstatus, 'Y'))
{
    $conn->query("UPDATE laptop SET isAvailable = 'N' WHERE laptop_id = '$laptopid'");
    $response = array('toggled' => true);
}
elseif (str_contains($checkstatus, 'N'))
{
    
    $conn->query("UPDATE laptop SET isAvailable = 'Y' WHERE laptop_id = '$laptopid'");
    $response = array('toggled' => true);
    
}
$response = array('toggled' => true);
header('Content-Type: application/json');
echo json_encode($response);
?>