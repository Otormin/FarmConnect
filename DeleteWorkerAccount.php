<?php
session_start();

include 'connect.php';

$workerId = $_GET['deleteId'];

$deleteWorker = "DELETE FROM workers WHERE workerId = $workerId";
$deleteWorkerFromAppliedWorkers = "DELETE FROM applied_workers WHERE workerId = $workerId";

$deleteWorkerResult = mysqli_query($conn, $deleteWorker);
$deleteWorkerFromAppliedWorkersResult = mysqli_query($conn, $deleteWorkerFromAppliedWorkers); 

if($deleteWorkerResult && $deleteWorkerFromAppliedWorkersResult){
    header("Location: Index.php");
}
else{
    die(mysqli_error($conn));
}

?>