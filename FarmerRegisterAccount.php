<?php
    include 'connect.php';

    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $phoneNumber=$_POST['pNumber'];
    $farmLocation=$_POST['fLocation'];
    $registrationDate = date('Y-m-d');
    $accountNumber=$_POST['accNumber'];
    $accountName=$_POST['accName'];
    $bankName=$_POST['bankName'];
    $DOB=$_POST['DOB'];
    $image=$_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);
    $role = "Farmer";

    $checkEmail = "SELECT * FROM farmers where email='$email'";
    $result=$conn->query($checkEmail);
    if($result->num_rows>0){
        echo "Email Address Already Exists !";
    }
    else{
        $insertQueue = "INSERT INTO farmers(firstName,lastName,phoneNumber,farmLocation,registrationDate,accountNumber,accountName,bankName,DOB,image,password,email,role) VALUES ('$firstName','$lastName','$phoneNumber','$farmLocation','$registrationDate','$accountNumber','$accountName','$bankName','$DOB','$imgContent','$password','$email','$role')";

        if($conn->query($insertQueue)==TRUE){
            header("Location: LoginAs.html");
        }
        else{
            echo "Error inserting into farmers:".$conn->error;
        }
    }
?>