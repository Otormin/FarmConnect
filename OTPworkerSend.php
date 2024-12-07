<?php
session_start();

include 'connect.php';

$email = $_POST['email'];
$otp = rand(100000, 999999);

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail -> isSMTP();
$mail -> SMTPAuth = true;

$mail -> Host = "smtp.gmail.com";
$mail -> SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail -> Port = 587;

$mail -> Username = "yjesse330@gmail.com";
$mail -> Password = "jycp rqfn eytr gxos";


$checkEmailWorker="SELECT * FROM workers WHERE email = '$email'";

$checkEmailWorkerResult=$conn->query($checkEmailWorker); 

if($checkEmailWorkerResult->num_rows>0){
    $_SESSION['otp'] = $otp; 
    $_SESSION['email'] = $email; 

    $mail -> setFrom("yjesse330@gmail.com");
    $mail -> addAddress($email);

    $mail->isHTML(true);
    $mail -> Subject = 'FarmConnect One Time Password - OTP';
    $mail -> Body = 'Hi, here is your One Time Password </br></br>'.$otp.'</br>';

    $mail -> send();

    header("Location: OTPworkerInput.php");
    exit();
}else{
    echo "Email does not exist";
}
?>