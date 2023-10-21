<?php
include 'connection.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get other form data
$idlaptop = $_POST['idlaptop'];
$laptopname = $_POST['laptopname'];

// Check if the laptop ID already exists in the database
$checkQuery = $conn->prepare("SELECT COUNT(*) FROM laptop WHERE laptop_id = ?");
$checkQuery->bind_param("s", $idlaptop);
$checkQuery->execute();
$checkQuery->bind_result($count);
$checkQuery->fetch();
$checkQuery->close();

if ($count > 0) {
    $response = array('success' => false, 'message' => 'Laptop ID already exists');
} else {
    // Handle the uploaded image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));

        // Insert data into the database
        $insert = $conn->query("INSERT INTO laptop (laptop_id, laptop_name, isAvailable, imgFile) VALUES ('$idlaptop', '$laptopname', 'Y', '$imgContent')");

        if ($insert) {
            $response = array('success' => true);
        } else {
            $response = array('success' => false, 'message' => 'Failed to insert data');
        }
    } else {
        $response = array('success' => false, 'message' => 'Image upload failed');
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
