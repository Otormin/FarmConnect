<?php
include 'connect.php';

$jobId = $_GET['jobId'];
$getJobDetails = "SELECT * FROM jobs WHERE jobId = $jobId";
$getJobDetailsResult = mysqli_query($conn, $getJobDetails);

    if ($getJobDetailsResult && mysqli_num_rows($getJobDetailsResult) > 0) {
        $isAvailable = 0;

        $unAvailable = "UPDATE jobs SET isAvailable = '$isAvailable' WHERE jobId = $jobId";

        $unAvailableResult = mysqli_query($conn, $unAvailable);

        if ($unAvailableResult) {
            header("Location: ./Profile.php");
        } else {
            echo "Error un-available jobs: " . $conn->error;
        }
    } else {
        echo "Job not found.";
    }
?>
