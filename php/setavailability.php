<?php
include 'connection.php';
$resourceId = $_POST['resourceId'];
$availableFrom = $_POST['availableFrom'];
$availableTo = $_POST['availableTo'];
$query = "INSERT INTO availability (resource_id, available_from, available_to) VALUES ('$resourceId', '$availableFrom', '$availableTo')";
if ($conn->query($query) === TRUE) {
    $response = array('message' => 'Availability set successfully');
} else {
    $response = array('message' => 'Error setting availability: ' . $conn->error);
}
header('Content-Type: application/json');
echo json_encode($response);
?>