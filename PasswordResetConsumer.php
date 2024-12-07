<?php
session_start();

include 'connect.php';

$storedEmail = $_SESSION['email'];

$password = $_POST['password'];
$password=md5($password);

$updateQueue = "UPDATE consumers SET password = '$password' WHERE email = '$storedEmail'";

$updateQueueResult = mysqli_query($conn, $updateQueue);

if ($updateQueueResult) {
    header("Location: ./LoginAs.html");
}
else {
    echo "Error resetting consumer password: " . $conn->error;
}
?>