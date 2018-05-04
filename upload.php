<?php

session_start();

$servername = 'localhost';
$dbname = "users";
$user = 'FabianMuli';
$password = '1LoveFabian';

$conn = mysqli_connect($servername, $user, $password, $dbname);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// check if image file is actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        echo "file is an image - " . $check["mime"] . ".";
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
        header("location:uploaded-file.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$imageLink = $target_file . $imageFileType;


$equipName = $_POST["equipName"];
$description = $_POST["description"];

$sql = "INSERT INTO addedequipments (id,name,category,description,link) VALUES ('1','$equipName','forklift' ','$description','$imageLink') ";

$conn->query($sql);

$conn->close();
?>