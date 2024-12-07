<?php
session_start();

include 'connect.php';

$storedOTP = $_SESSION['otp'];
$inputtedOTP = $_POST['OTP'];

if($inputtedOTP == $storedOTP){
    header("Location: ResetPasswordConsumer.php");
    exit();
}
else{
    echo "Incorrect OTP";
}

?>