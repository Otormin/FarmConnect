<?php
session_start();

include 'connect.php';

$consumerId = $_GET['deleteId'];

$deleteConsumer = "DELETE FROM consumers WHERE consumerId = $consumerId";
$deleteConsumerFromProductPurchase = "DELETE FROM product_purchase WHERE consumerId = $consumerId";

$deleteConsumerResult = mysqli_query($conn, $deleteConsumer);
$deleteConsumerFromProductPurchaseResult = mysqli_query($conn, $deleteConsumerFromProductPurchase); 

if($deleteConsumerResult && $deleteConsumerFromProductPurchaseResult){
    header("Location: Index.php");
}
else{
    die(mysqli_error($conn));
}

?>