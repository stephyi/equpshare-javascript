<?php
session_start();
$url = $_SESSION['url'];
header("location: $url");
unset($_SESSION);
session_destroy();
session_write_close();
die;
?>