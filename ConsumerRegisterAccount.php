<?php
    include 'connect.php';

    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $phoneNumber=$_POST['pNumber'];
    $registrationDate = date('Y-m-d');
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);
    $role = "Consumer";

    $checkEmail = "SELECT * FROM consumers where email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo "Email Address Already Exists!";
    }
    else{
        $insertQueue = "INSERT INTO consumers(firstName,lastName,phoneNumber,registrationDate,password,email,role) VALUES ('$firstName','$lastName','$phoneNumber','$registrationDate','$password','$email','$role')";

        if($conn->query($insertQueue)==TRUE){            
            header("Location: LoginAs.html");
            exit();
        }
        else{
            echo "Error inserting into consumers:".$conn->error;
        }
    }
?>