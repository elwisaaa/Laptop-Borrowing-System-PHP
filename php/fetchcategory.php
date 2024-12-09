<?php
include 'connection.php';
$query = "SELECT * FROM categories";
$result = $conn->query($query);
$options = '';
while ($row = $result->fetch_assoc()) {
    $options .= '<option value="' . $row['category_id'] . '">' . $row['category_name'] . '</option>';
}
echo $options;
?>