<?php
include 'connection.php';
$resourceName = $_POST['resourceName'];
$categoryId = $_POST['categoryId'];
$query = "INSERT INTO resources (category_id, resource_name) VALUES ('$categoryId', '$resourceName')";
if ($conn->query($query) === TRUE) {
    $response = array('message' => 'Resource added successfully');
} else {
    $response = array('message' => 'Error adding resource: ' . $conn->error);
}
header('Content-Type: application/json');
echo json_encode($response);
?>