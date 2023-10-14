<?php
include 'connection.php';
// get date current
//get isavailable from db
$id_array = array();
$i = 0;
echo "\n";
$checkdate = $conn->query("SELECT * FROM borrow b1 WHERE borrow_end<=CURDATE() AND borrow_end=!'' AND borrow_end = (SELECT MAX(borrow_end) FROM borrow WHERE laptop_id = b1.laptop_id)");
while($row = mysqli_fetch_assoc($checkdate))
{
    echo $row['laptop_id'];
    echo "\n";
    $id_array[] = $row["laptop_id"];
}

while($i<count($id_array))
{
    echo $id_array[$i];
    mysqli_query($conn,"UPDATE laptop SET isAvailable='Y' WHERE laptop_id='$id_array[$i]'");
    $i++;
}
$response = array('dataFound' => true);
header('Content-Type: application/json');
echo json_encode($response);
?>