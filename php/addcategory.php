<?php
include 'connection.php';
$categoryName = $_POST['categoryName'];
$query = "INSERT INTO categories (category_name) VALUES ('$categoryName')";
if ($conn->query($query) === TRUE) {
    $response = array('message' => 'Category added successfully');
} else {
    $response = array('message' => 'Error adding category: ' . $conn->error);
}
header('Content-Type: application/json');
echo json_encode($response);
?>