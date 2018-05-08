<?php

if ($_SESSION["LOGGED_IN"] == false) {
    header("location: login.php");
}