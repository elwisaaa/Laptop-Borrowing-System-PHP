<?php
include 'connection.php';
$query = "SELECT * FROM resources";
$result = $conn->query($query);
$options = '';
while ($row = $result->fetch_assoc()) {
    $options .= '<option value="' . $row['resource_id'] . '">' . $row['resource_name'] . '</option>';
}
echo $options;
?>