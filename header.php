<?php

session_start();


if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];

    $DBuser = "FabianMuli";
    $hostname = "localhost";
    $password = "1LoveFabian";
    $DBName = "users";
    $conn = mysqli_connect($hostname, $DBuser, $password, $DBName);
    $sql = "SELECT * FROM usersdata where email = '" . $_SESSION["email"] . "'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);

    if (isset($_SESSION["LOGGED_IN"])) {
        $user = $row["name"];
        $email = $row["email"];
        $userLink = "profile.php";
    }
} else {
    $user = "login";
    $userLink = "login.php";

}

ob_start();
$_SESSION['url'] = $_SERVER['REQUEST_URI'];

if (isset($_SESSION['url']))
    $url = $_SESSION['url'];
else
    $url = "index.php";
?>