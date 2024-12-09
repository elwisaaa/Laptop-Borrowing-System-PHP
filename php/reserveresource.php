<?php
include 'connection.php';
$resourceId = $_POST['resourceId'];
$userId = $_POST['userId'];
$reservedFrom = $_POST['reservedFrom'];
$reservedTo = $_POST['reservedTo'];
$query = "INSERT INTO reservations (resource_id, user_id, reserved_from, reserved_to) VALUES ('$resourceId', '$userId', '$reservedFrom', '$reservedTo')";
if ($conn->query($query) === TRUE) {
    $response = array('message' => 'Resource reserved successfully');
} else {
    $response = array('message' => 'Error reserving resource: ' . $conn->error);
}
header('Content-Type: application/json');
echo json_encode($response);
?>