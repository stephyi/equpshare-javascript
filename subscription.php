<?php 

session_start();

$user = "FabianMuli";
$hostname = "localhost";
$password = "1LoveFabian";
$DBName = "subscribers";

$conn = mysqli_connect($hostname, $user, $password, $DBName);

$message = "";

$sql = "INSERT INTO subscribers (email) VALUES ($email)";



?>