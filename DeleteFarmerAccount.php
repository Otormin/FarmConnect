<?php
session_start();

include 'connect.php';

$farmerId = $_GET['deleteId'];

$deleteFarmer = "DELETE FROM farmers WHERE farmerId = $farmerId";
$deleteFarmerFromProductPurchase = "DELETE FROM product_purchase WHERE farmerId = $farmerId";
$deleteFarmerFromAppliedWorkers = "DELETE FROM applied_workers WHERE farmerId = $farmerId";
$deleteFarmerFromProducts = "DELETE FROM products WHERE farmerId = $farmerId";
$deleteFarmerFromJobs = "DELETE FROM jobs WHERE farmerId = $farmerId";

$deleteFarmerResult = mysqli_query($conn, $deleteFarmer);
$deleteFarmerFromProductPurchaseResult = mysqli_query($conn, $deleteFarmerFromProductPurchase);
$deleteFarmerFromAppliedWorkersResult = mysqli_query($conn, $deleteFarmerFromAppliedWorkers);
$deleteFarmerFromProductsResult = mysqli_query($conn, $deleteFarmerFromProducts);
$deleteFarmerFromJobsResult = mysqli_query($conn, $deleteFarmerFromJobs); 

if($deleteFarmerResult && $deleteFarmerFromProductPurchaseResult && $deleteFarmerFromAppliedWorkersResult && $deleteFarmerFromProductsResult && $deleteFarmerFromJobsResult){
    header("Location: Index.php");
}
else{
    die(mysqli_error($conn));
}

?>