<?php

require __DIR__ . "/config.php";

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$message = $_POST["message"];

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail -> isSMTP();
$mail -> SMTPAuth = true;

$mail -> Host = "smtp.gmail.com";
$mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail -> Port = 587;

$mail -> Username = $config["email"]["SENDING_EMAIL_USERNAME"];
$mail -> Password = $config["email"]["SENDING_EMAIL_PASSWORD"];

$mail -> setFrom($email, $name);
$mail -> addAddress($config["email"]["SENDING_EMAIL_USERNAME"]);

$mail -> Subject = $subject;
$mail -> Body = $message;

$mail -> send();

header("Location: ./Contact.php");

?>