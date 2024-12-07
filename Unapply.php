<?php
include 'connect.php';

session_start();

$serialNumber = $_GET['serialNumber'];
$workerId = $_GET['workerId'];
$jobId = $_GET['jobId'];
$getJobDetails = "SELECT * FROM applied_workers WHERE jobId = $jobId AND workerId = $workerId";
$getJobDetailsResult = mysqli_query($conn, $getJobDetails);

if ($getJobDetailsResult && mysqli_num_rows($getJobDetailsResult) > 0) {
    $isApplied = 0;

    $unApply = "UPDATE applied_workers SET isApplied = '$isApplied' WHERE jobId = $jobId AND workerId = $workerId AND serialNumber = $serialNumber";

    $unApplyResult = mysqli_query($conn, $unApply);

    if ($unApplyResult) {
        header("Location: ./Cart.php");
    }
    else {
        echo "Error unapplying worker: " . $conn->error;
    }
}
?>