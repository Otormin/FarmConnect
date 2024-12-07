<?php
session_start();

include 'connect.php';

$jobId = $_GET['deleteId'];

$deleteJob = "DELETE FROM jobs WHERE jobId=$jobId";
$deleteJobFromAppliedWorkers = "DELETE FROM applied_workers WHERE jobId=$jobId";

$deleteJobResult = mysqli_query($conn, $deleteJob);
$deleteJobFromAppliedWorkersResult = mysqli_query($conn, $deleteJobFromAppliedWorkers); 

if($deleteJobResult && $deleteJobFromAppliedWorkersResult){
    header("Location: ./Profile.php");
}
else{
    die(mysqli_error($conn));
}

?>