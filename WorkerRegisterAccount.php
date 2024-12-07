<?php

    include 'connect.php';

    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $workExperience=$_POST['wExperience'];
    $phoneNumber=$_POST['pNumber'];
    $registrationDate = date('Y-m-d');
    $accountNumber=$_POST['accNumber'];
    $accountName=$_POST['accName'];
    $bankName=$_POST['bankName'];
    $DOB=$_POST['DOB'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);
    $role = "Worker";

    $checkEmail = "SELECT * FROM workers where email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo "Email Address Already Exists !";
    }
    else{
        $insertQueue = "INSERT INTO workers(firstName,lastName,workExperience,phoneNumber,registrationDate,accountNumber,accountName,bankName,DOB,password,email,role) VALUES ('$firstName','$lastName','$workExperience','$phoneNumber','$registrationDate','$accountNumber','$accountName','$bankName','$DOB','$password','$email','$role')";

        if($conn->query($insertQueue)==TRUE){
            header("Location: LoginAs.html");
        }
        else{
            echo "Error inserting into workers:".$conn->error;
        }
    }
?>