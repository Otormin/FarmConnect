<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login as Consumer</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Login as Consumer</h1>
        <form method="post" action="./ConsumerLoginAccount.php">
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
        <div style="display: flex; align-items: center; justify-content: center;">
            <h4 style="font-weight: normal;">Don't have an account yet?</h4>
            <a href="SignUpRoles.html" style="padding-left: 10px;">Sign up</a>
        </div>
        <div>
            <a href="OTPconsumerRequest.php">Forgot Password</a>
        </div>
    </div>
</body>
</html>
