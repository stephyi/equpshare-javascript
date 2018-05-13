<?php

session_start();

if ($_SESSION["LOGGED_IN"] == false) {
    header("location: login.php");
}

$_SESSION["equipmentname"] = $_POST["equipName"];


$email = $_SESSION["email"];
$model = $availability = $capacity = "";
$model = $_POST["model"];
$availability = $_POST["availability"];
$capacity = $_POST["capacity"];
$price = $_POST["price"];
$_SESSION['user-email'] = $email;

$DBuser = "equipsha_equipsh";
$hostname = "localhost";
$password = "Admin@@2030";
$DBName = "equipsha_equipment";

$conn = mysqli_connect($hostname, $DBuser, $password, $DBName);

$target_dir = "services/uploads/" . $_SESSION['user-email'];
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$link = $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $equipName = $_POST["equipName"];
    $description = $_POST["description"];
    $category = $_POST["category"];

    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {

        $code = createRandomCode();

        $sql = "INSERT INTO equipment (equipment.equipmentname, category, description, link, email, code,price,availability,capacity,model) VALUES ('$equipName','$category','$description','$link','$email', '$code','$availability','$capacity','$model')";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("location: profile.php");
    } else {
        echo " Sorry, there was an error uploading your file . ";
    }
}
?>