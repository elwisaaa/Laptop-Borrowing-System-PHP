<?php
include 'connection.php';
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $laptop_id = $_POST["laptopid"];

    // sql to delete a record
    $sql = "DELETE FROM laptop WHERE laptop_id='$laptop_id';";

    if ($conn->query($sql) === TRUE) {
        $response = array('success' => true);
    } else {
        $response = array('success' => false, 'message' => 'Error deleting record: ' . $conn->error);
    }
} else {
    $response = array('success' => false, 'message' => 'Invalid request method');
}

header('Content-Type: application/json');
echo json_encode($response);
?>
