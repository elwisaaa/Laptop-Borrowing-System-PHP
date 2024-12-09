<?php
include 'connection.php';
$query = "SELECT r.resource_id, r.resource_name, c.category_name, a.available_from, a.available_to 
          FROM resources r 
          JOIN categories c ON r.category_id = c.category_id 
          JOIN availability a ON r.resource_id = a.resource_id 
          WHERE a.available_from <= NOW() AND a.available_to >= NOW()";
$result = $conn->query($query);
$table = '<table class="table table-striped"><thead><tr><th>Resource Name</th><th>Category</th><th>Available From</th><th>Available To</th><th>Action</th></tr></thead><tbody>';
while ($row = $result->fetch_assoc()) {
    $table .= '<tr><td>' . $row['resource_name'] . '</td><td>' . $row['category_name'] . '</td><td>' . $row['available_from'] . '</td><td>' . $row['available_to'] . '</td><td><button class="btn btn-primary reserve-btn" data-id="' . $row['resource_id'] . '">Reserve</button></td></tr>';
}
$table .= '</tbody></table>';
echo $table;
?>