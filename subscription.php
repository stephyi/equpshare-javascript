<?php 

session_start();

$user = "FabianMuli";
$hostname = "localhost";
$password = "1LoveFabian";
$DBName = "subsc";

$conn = mysqli_connect($hostname, $user, $password, $DBName);

$emailErr = $email = "";

$sql = "INSERT INTO subscribers (email) VALUES ('$email')";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }

    if (count($_POST) > 0) {
        mysqli_query($conn, $sql);
    }
}

?>