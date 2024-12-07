<?php
    session_start();

    include 'connect.php';

    $workerId = $_SESSION['workerId'];
    $farmerId = $_POST['farmerId'];
    $jobId = $_POST['jobId'];
    $coverLetter = $_POST['cLetter'];
    $applicationDate = date('Y-m-d');
    $isApplied = 1;
    $isAccepted = 0;

    $check = "SELECT * FROM applied_workers WHERE jobId = '$jobId' AND workerId = '$workerId'";
    $checkResult = $conn->query($check);

    if ($checkResult->num_rows == 0) {
        $queue = "INSERT INTO applied_workers (jobId, workerId, farmerId, coverLetter, applicationDate, isApplied, isAccepted) VALUES ('$jobId', '$workerId', '$farmerId', '$coverLetter','$applicationDate', '$isApplied', '$isAccepted')";

        $queueResult = mysqli_query($conn, $queue);
        if ($queueResult) {
            header("Location: ./job-list.php");
        } 
        else {
            echo "Error inserting into applied_workers: " . $conn->error;
        }
    } else {
        echo "<p>You already have an application for this job.</p>";
    }
?>