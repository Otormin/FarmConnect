<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #009a60;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background: #f8f9fa;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 40px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
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
            cursor: pointer;
            border: none;
            font-weight: bold;
        }

        form input[type="submit"]:hover {
            background-color: #009a60;
        }

        .container div {
            text-align: center;
        }

        .container p {
            font-size: 14px;
            margin-top: 10px;
        }

        .container a {
            color: #00B074;
            text-decoration: none;
        }

        .container a:hover {
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
        <h1>Reset Password</h1>
        <form method="post" action="PasswordResetConsumer.php" id="registerForm">
            <input type="password" name="password" id="password" placeholder="Password" maxlength= 16 required>
            <p id="passwordLengthError" class="error" style="display: none; color: red;">Password must be more than 8 characters</p>
            <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password" required>
            <p id="error" class="error" style="color: red">Passwords do not match</p>
            <input type="submit" class="btn" value="Reset Password" name="Reset">
        </form>
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
