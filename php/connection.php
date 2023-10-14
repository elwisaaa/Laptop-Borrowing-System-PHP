<?php 

$servername = "localhost";
$username = "root";
$password = "";
$port = "3306";
$dbname = "laptop-borrowing-db";    
//Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

//Chech connection
if($conn->connect_error) 
{
    die("Connection failed !!" . $conn->connect_error);
}
else
{
}

?>