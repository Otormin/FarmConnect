<?php
    include 'connect.php';

    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $sql="SELECT * FROM farmers WHERE email = '$email' and password = '$password'";
    $result=$conn->query($sql); 
    if($result->num_rows>0){
        session_start();
        $row=$result->fetch_assoc();
        $_SESSION['farmerId'] = $row['farmerId'];
        $_SESSION['role'] = $row['role'];
        header("Location: Homepage.php");
        exit();
    }
    else{
        echo "Not Found, Incorrect Email or Password";
    }
?>