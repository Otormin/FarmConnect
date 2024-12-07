<?php
session_start();

include 'connect.php';

$storedEmail = $_SESSION['email'];

$password = $_POST['password'];
$password=md5($password);

$updateQueue = "UPDATE farmers SET password = '$password' WHERE email = '$storedEmail'";

$updateQueueResult = mysqli_query($conn, $updateQueue);

if ($updateQueueResult) {
    header("Location: ./LoginAs.html");
}
else {
    echo "Error resetting farmer password: " . $conn->error;
}
?>