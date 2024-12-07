<?php
session_start();

include 'connect.php';

    $consumerId = $_SESSION['consumerId'];
    $farmerId = $_POST['farmerId'];
    $productId = $_POST['productId'];
    $purchaseQuantity = $_POST['pQuantity'];
    $selectedDate = date('Y-m-d');
    $isSelected = 1;

    $getProductQuantity = "SELECT * FROM products WHERE productId = $productId";
    $getProductQuantityResult = mysqli_query($conn, $getProductQuantity);

    if ($getProductQuantityResult && mysqli_num_rows($getProductQuantityResult) > 0) {
        $row = mysqli_fetch_assoc($getProductQuantityResult);

        $quantity = htmlspecialchars($row['quantity']);

        if($purchaseQuantity > $quantity){
            echo '<p>Not enough available products</p>';
        }
        else{
            $newQuantity = $quantity - $purchaseQuantity;

            $updateQuantity = "UPDATE products SET quantity = '$newQuantity' WHERE productId = $productId";
            $updateQuantityResult = mysqli_query($conn, $updateQuantity);

            if($updateQuantityResult){
                $queue = "INSERT INTO product_purchase (productId, farmerId, consumerId, purchaseQuantity, selectedDate, isSelected) VALUES ('$productId', '$farmerId', '$consumerId', '$purchaseQuantity', '$selectedDate', '$isSelected')";

                $queueResult = mysqli_query($conn, $queue);
                if ($queueResult) {
                    header("Location: product-detail.php?productId=" . $productId);
                } 
                else {
                    echo "Error inserting into product_purchase: " . $conn->error;
                }
            }
        }
    }
    else{
        echo "Error getting product details from product_purchase" . $conn->error;
    }
?>