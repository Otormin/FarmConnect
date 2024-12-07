<?php
include 'connect.php';

$consumerId = $_GET['updateId'];

$getConsumerDetails = "SELECT * FROM consumers WHERE consumerId = $consumerId";
$getConsumerDetailsResult = mysqli_query($conn, $getConsumerDetails);

$row = mysqli_fetch_assoc($getConsumerDetailsResult);

$previousFirstName = htmlspecialchars($row['firstName']);
$previousLastName = htmlspecialchars($row['lastName']);
$previousPhoneNumber = htmlspecialchars($row['phoneNumber']);
$previousEmail = htmlspecialchars($row['email']);

if(isset($_POST['submit'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $phoneNumber=$_POST['pNumber'];
    $registrationDate = date('Y-m-d');
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $updateQueue = "UPDATE consumers SET firstName = '$firstName', lastName = '$lastName', phoneNumber = '$phoneNumber', registrationDate = '$registrationDate', email = '$email', password = '$password' WHERE consumerId = $consumerId";

    $updateQueueResult = mysqli_query($conn, $updateQueue);

    if ($updateQueueResult) {
        header("Location: ./Profile.php");
    }
    else {
        echo "Error updating consumer profile: " . $conn->error;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #007856;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #EFFDF5;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 70px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2B3940;
        }

        form input, form select, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
        }

        form input[type="submit"], .cancel-button button {
            background-color: #00B074;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            padding: 12px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover, .cancel-button button:hover {
            background-color: #007856;
        }

        label {
            font-weight: bold;
            color: #2B3940;
        }

        .cancel-button {
            text-align: center;
            margin-top: 20px;
        }

        .cancel-button a {
            text-decoration: none;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: -10px;
            margin-bottom: 15px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Profile</h1>
        <form method="post" enctype="multipart/form-data" id="registerForm">
            <label for="fName">First Name</label>
            <input type="text" name="fName" id="fName" placeholder="First Name" value="<?php echo $previousFirstName; ?>" required>

            <label for="lName">Last Name</label>
            <input type="text" name="lName" id="lName" placeholder="Last Name" value="<?php echo $previousLastName; ?>" required>

            <label for="pNumber">Phone Number</label>
            <input type="number" name="pNumber" id="pNumber" placeholder="Phone Number" value="<?php echo $previousPhoneNumber; ?>" required>

            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $previousEmail; ?>" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" maxlength= 16 required>
            <p id="passwordLengthError" class="error" style="display: none">Password must be more than 8 characters</p>

            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>

            <p id="error" class="error" style="color: red">Passwords do not match</p>

            <input type="submit" value="Update" name="submit">
        </form>
        <div class="cancel-button">
            <a href="Profile.php"><button type="button">Cancel</button></a>
        </div>
    </div>
    <script>
        const registerForm = document.getElementById('registerForm');
        const password = document.getElementById('password');
        const passwordLengthError = document.getElementById('passwordLengthError');
        const confirmPassword = document.getElementById('confirmPassword');
        const error = document.getElementById('error');

        registerForm.addEventListener('submit', function(event) {
            if (password.value !== confirmPassword.value) {
                event.preventDefault();
                error.style.display = 'block';
            } else {
                error.style.display = 'none';
            }

            if (password.value.length < 8){
                event.preventDefault();
                passwordLengthError.style.display = 'block';
            }else {
                passwordLengthError.style.display = 'none';
            }
        });
    </script>
</body>
</html>