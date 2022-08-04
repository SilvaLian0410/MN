<?php 

$host = "localhost:3306";
$username = "admin_mdbesut";
$password = "";
$database = "admin_mdbesut";


$conn = mysqli_connect("$host", "$username", "$password", "$database");

if (!$conn)
{
    die("<script>alert('Connection Failed.')</script>");
}

?>