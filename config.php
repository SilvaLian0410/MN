<?php 

$server = "localhost:3306";
$user = "juliandatabasetest";
$pass = "FuckingServer123";
$database = "Database_SilvaLian";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>