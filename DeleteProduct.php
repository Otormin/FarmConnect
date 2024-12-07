<?php
session_start();

include 'connect.php';

$productId = $_GET['productId'];

$deleteProduct = "DELETE FROM products WHERE productId = $productId";
$deleteProductFromProductPurchase = "DELETE FROM product_purchase WHERE productId = $productId";

$deleteProductResult = mysqli_query($conn, $deleteProduct);
$deleteProductFromProductPurchaseResult = mysqli_query($conn, $deleteProductFromProductPurchase); 

if($deleteProductResult && $deleteProductFromProductPurchaseResult){
    header("Location: ./Profile.php");
}
else{
    die(mysqli_error($conn));
}

?>