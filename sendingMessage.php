<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $to = "muemafabian@gmail.com";
    $first_name = $_POST["first-name"];
    $second_name = $_POST["second-name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $subject = $first_name . " " . $second_name . " says: /n";
    $from = $email;

    mail($to, $subject, $message, $from);
    $_SESSION["send_message_success"] = "<p class='text-success'>Message successfully sent</p>";
}