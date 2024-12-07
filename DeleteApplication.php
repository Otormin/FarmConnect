<?php
session_start();

include 'connect.php';

$serialNumber = $_GET['serialNumber'];
$workerId = $_GET['workerId'];
$jobId = $_GET['jobId'];

$deleteJobFromAppliedWorkers = "DELETE FROM applied_workers WHERE workerId=$workerId AND jobId=$jobId AND serialNumber = $serialNumber";

$deleteJobFromAppliedWorkersResult = mysqli_query($conn, $deleteJobFromAppliedWorkers); 

if($deleteJobFromAppliedWorkersResult){
    header("Location: ./Cart.php");
}
else{
    die(mysqli_error($conn));
}

?>