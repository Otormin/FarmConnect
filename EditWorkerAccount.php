<?php
include 'connect.php';

$workerId = $_GET['updateId'];

$getWorkerDetails = "SELECT * FROM workers WHERE workerId = $workerId";
$getWorkerDetailsResult = mysqli_query($conn, $getWorkerDetails);

$row = mysqli_fetch_assoc($getWorkerDetailsResult);

$previousFirstName = htmlspecialchars($row['firstName']);
$previousLastName = htmlspecialchars($row['lastName']);
$previousPhoneNumber = htmlspecialchars($row['phoneNumber']);
$previousWorkExperience = htmlspecialchars($row['workExperience']);
$previousBankAccountNumber = htmlspecialchars($row['accountNumber']);
$previousBankAccountName = htmlspecialchars($row['accountName']);
$previousBankName = htmlspecialchars($row['bankName']);
$previousDateOfBirth = htmlspecialchars($row['DOB']);
$previousEmail = htmlspecialchars($row['email']);

if(isset($_POST['submit'])){
    $firstName=$_POST['fName'];
    $lastName=$_POST['lName'];
    $phoneNumber=$_POST['pNumber'];
    $workExperience=$_POST['wExperience'];
    $registrationDate = date('Y-m-d');
    $accountNumber=$_POST['accNumber'];
    $accountName=$_POST['accName'];
    $bankName=$_POST['bankName'];
    $DOB=$_POST['DOB'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);

    $updateQueue = "UPDATE workers SET firstName = '$firstName', lastName = '$lastName', phoneNumber = '$phoneNumber', workExperience = '$workExperience', registrationDate = '$registrationDate', accountNumber = '$accountNumber', accountName = '$accountName', bankName = '$bankName', DOB = '$DOB', email = '$email', password = '$password' WHERE workerId = $workerId";

    $updateQueueResult = mysqli_query($conn, $updateQueue);

    if ($updateQueueResult) {
        header("Location: ./Profile.php");
    }
    else {
        echo "Error updating worker profile: " . $conn->error;
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

            <label for="wExperience">Work Experience</label>
            <input type="text" name="wExperience" id="wExperience" placeholder="Work Experience" value="<?php echo $previousWorkExperience; ?>" required>

            <label for="pNumber">Phone Number</label>
            <input type="number" name="pNumber" id="pNumber" placeholder="Phone Number" value="<?php echo $previousPhoneNumber; ?>" required>

            <label for="accNumber">Bank Account Number</label>
            <input type="number" name="accNumber" id="accNumber" placeholder="Bank Account Number" value="<?php echo $previousBankAccountNumber; ?>" required>

            <label for="accName">Bank Account Name</label>
            <input type="text" name="accName" id="accName" placeholder="Bank account name" value="<?php echo $previousBankAccountName; ?>" required>

            <label for="bankName">Bank Name</label>
            <input type="text" name="bankName" id="bankName" placeholder="Bank name" value="<?php echo $previousBankName; ?>" required>

            <label for="DOB">Date of Birth</label>
            <input type="date" name="DOB" id="DOB" placeholder="Date of Birth" value="<?php echo $previousDateOfBirth; ?>" required>
            <p id="dateError" class="error">You must be 18 years or older to register as a farmer</p>

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
        const dob = document.getElementById('DOB');
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

            const dobValue = new Date(dob.value);
            const today = new Date();
            const age = today.getFullYear() - dobValue.getFullYear();

            if(age < 18){
                dateError.style.display = "block";
                event.preventDefault();
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