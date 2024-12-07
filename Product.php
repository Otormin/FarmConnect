<?php
session_start();

include 'connect.php';

$farmerId=$_SESSION['farmerId'];

$productName=$_POST['pName'];
$productDescription=$_POST['pDescription'];
$productCategory=$_POST['pCategory'];
$quantity=$_POST['quantity'];
$unitPrice=$_POST['uPrice'];
$creationDate = date('Y-m-d');
$image=$_FILES['image']['tmp_name'];
$imgContent = addslashes(file_get_contents($image));

$insertQueue = "INSERT INTO products (productName,farmerId,productDescription,productCategory,quantity,unitPrice,creationDate,image) VALUES ('$productName','$farmerId','$productDescription','$productCategory','$quantity','$unitPrice','$creationDate','$imgContent')";

if ($conn->query($insertQueue) === TRUE) {
    header("Location: Profile.php");
    exit();
}else{
    echo "Error inserting into products table: " . $conn->error;
}
?>