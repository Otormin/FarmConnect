<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register as Farmer</title>
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

        form input, 
        form textarea, 
        form input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
        }

        form input[type="file"] {
            padding: 5px;
        }

        form input[type="submit"] {
            background-color: #00B074;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            padding: 12px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        form input[type="submit"]:hover {
            background-color: #007856;
        }

        .text-center {
            text-align: center;
            margin-top: 10px;
        }

        .text-center a {
            color: #2B9BFF;
            text-decoration: none;
            font-weight: bold;
        }

        .text-center a:hover {
            text-decoration: underline;
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
        <h1>Register as Farmer</h1>
        <form method="post" action="FarmerRegisterAccount.php" enctype="multipart/form-data" id="registerForm">
            <input type="text" name="fName" id="fName" placeholder="First Name" required>
            <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            <input type="number" name="pNumber" id="pNumber" placeholder="Phone Number" required>
            <input type="text" name="fLocation" id="fLocation" placeholder="Farm Location" required>
            <input type="number" name="accNumber" id="accNumber" placeholder="Bank Account Number" required>
            <input type="text" name="accName" id="accName" placeholder="Bank account name" required>
            <input type="text" name="bankName" id="bankName" placeholder="Bank name" required>
            <p>Date of Birth</p>
            <input type="date" name="DOB" id="DOB" placeholder="Date of Birth" required>
            <p id="dateError" class="error">You must be 18 years or older to register as a farmer</p>
            <p>Profile Photo</p>
            <input type="file" name="image" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" maxlength= 16 required>
            <p id="passwordLengthError" class="error" style="display: none">Password must be more than 8 characters</p>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
            <p id="passwordError" class="error">Passwords do not match</p>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
        <div class="text-center">
            <p>Already Have Account?</p>
            <a href="LoginAs.html">Sign in</a>
        </div>
    </div>
    <script>
        const registerForm = document.getElementById('registerForm');
        const dob = document.getElementById('DOB');
        const password = document.getElementById('password');
        const passwordLengthError = document.getElementById('passwordLengthError');
        const confirmPassword = document.getElementById('confirmPassword');
        const passwordError = document.getElementById('passwordError');
        const dateError = document.getElementById('dateError');

        registerForm.addEventListener('submit', function(event) {
            if (password.value !== confirmPassword.value) {
                event.preventDefault();
                passwordError.style.display = 'block';
            } else {
                passwordError.style.display = 'none';
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
