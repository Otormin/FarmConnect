<?php
session_start();

include 'connect.php';

$purchaseQuantity = $_GET['purchaseQuantity'];
$serialNumber = $_GET['serialNumber'];
$consumerId = $_GET['consumerId'];
$productId = $_GET['productId'];

$getProductQuantity = "SELECT * FROM products WHERE productId = $productId";
    $getProductQuantityResult = mysqli_query($conn, $getProductQuantity);

    if ($getProductQuantityResult && mysqli_num_rows($getProductQuantityResult) > 0) {
        $row = mysqli_fetch_assoc($getProductQuantityResult);

        $quantity = htmlspecialchars($row['quantity']);

        $newQuantity = $quantity + $purchaseQuantity;

        $updateQuantity = "UPDATE products SET quantity = '$newQuantity' WHERE productId = $productId";
        $updateQuantityResult = mysqli_query($conn, $updateQuantity);

        if($updateQuantityResult){

            $deleteSelectedProduct = "DELETE FROM product_purchase WHERE consumerId=$consumerId AND productId=$productId AND serialNumber =$serialNumber";

            $deleteSelectedProductResult = mysqli_query($conn, $deleteSelectedProduct); 

            if($deleteSelectedProductResult){
                header("Location: ./Cart.php");
            }
            else{
                die(mysqli_error($conn));
            }
        }
    }

?>
