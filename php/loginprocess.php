<?php
session_start();
include 'connection.php';

$_SESSION['admin'] = true;
$adminemail = $_POST['email'];
$adminpass = $_POST['pass'];

$query = "SELECT admin_name FROM admin WHERE admin_email = '$adminemail' AND admin_password = '$adminpass'";

$result = $conn->query($query);


if($result -> num_rows == 1)
{
	header('location: adminpage.php');
}
else
{
	echo "Auth error";
}
?>