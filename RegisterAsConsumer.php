<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register As Consumer</title>
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

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 14px;
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
        <h1>Register as Consumer</h1>
        <form id="registerForm" method="post" action="ConsumerRegisterAccount.php">
            <input type="text" name="fName" id="fName" placeholder="First Name" required>
            <input type="text" name="lName" id="lName" placeholder="Last Name" required>
            <input type="number" name="pNumber" id="pNumber" placeholder="Phone Number" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" maxlength= 16 required>
            <p id="passwordLengthError" class="error" style="display: none">Password must be more than 8 characters</p>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
            <p id="error" class="error">Passwords do not match</p>
            <input type="submit" value="Sign Up" name="signUp">
        </form>
        <div class="text-center">
            <p>Already Have Account?</p>
            <a href="LoginAs.html">Sign in</a>
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
