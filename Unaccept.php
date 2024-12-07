<?php
include 'connect.php';

session_start();

$workerId = $_GET['workerId'];
$jobId = $_GET['jobId'];
$getJobDetails = "SELECT * FROM applied_workers WHERE jobId = $jobId AND workerId = $workerId";
$getJobDetailsResult = mysqli_query($conn, $getJobDetails);

if ($getJobDetailsResult && mysqli_num_rows($getJobDetailsResult) > 0) {
    $isAccepted = 0;

    $unaccept = "UPDATE applied_workers SET isAccepted = '$isAccepted' WHERE jobId = $jobId AND workerId = $workerId";

    $unacceptResult = mysqli_query($conn, $unaccept);

    if ($unacceptResult) {
        header("Location: ./Cart.php");
    }
    else {
        echo "Error unaccepting worker: " . $conn->error;
    }
}
?>