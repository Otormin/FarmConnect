<?php
session_start();

include 'connect.php';

$farmerId=$_SESSION['farmerId'];

$jobType=$_POST['jType'];
$jobCategory=$_POST['jCategory'];
$jobDescription=$_POST['jDescription'];
$jobResponsibility=$_POST['jResponsibility'];
$farmLocation=$_POST['fLocation'];
$dailyRate=$_POST['dRate'];
$creationDate = date('Y-m-d');
$dateLine = $_POST['dLine'];

$insertQueue = "INSERT INTO jobs (farmerId,jobType,jobCategory,jobDescription,jobResponsibility,farmLocation,dailyRate,creationDate,dateLine) VALUES ('$farmerId','$jobType','$jobCategory','$jobDescription','$jobResponsibility','$farmLocation','$dailyRate','$creationDate','$dateLine')";

if ($conn->query($insertQueue) === TRUE) {
    header("Location: Profile.php");
    exit();
}else{
    echo "Error inserting into products table: " . $conn->error;
}
?>