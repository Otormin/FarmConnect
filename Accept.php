<?php
include 'connect.php';

session_start();

$workerId = $_GET['workerId'];
$jobId = $_GET['jobId'];
$getJobDetails = "SELECT * FROM applied_workers WHERE jobId = $jobId AND workerId = $workerId";
$getJobDetailsResult = mysqli_query($conn, $getJobDetails);

if ($getJobDetailsResult && mysqli_num_rows($getJobDetailsResult) > 0) {
    $isAccepted = 1;

    $accept = "UPDATE applied_workers SET isAccepted = '$isAccepted' WHERE jobId = $jobId AND workerId = $workerId";

    $acceptResult = mysqli_query($conn, $accept);

    if ($acceptResult) {
        header("Location: ./Cart.php");
    }
    else {
        echo "Error accepting worker: " . $conn->error;
    }
}
?>