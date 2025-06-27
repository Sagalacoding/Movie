<?php
    require_once 'login.php';
    $log = new Login();
    $log->signIn();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login Page</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #111;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background-color: #1a1a1a;
            padding: 40px;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
            text-align: center;
        }

        .login-box img {
            max-width: 120px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
            text-align: left;
        }

        label {
            font-size: 14px;
            margin-bottom: 6px;
            display: block;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 14px;
            background-color: #222;
            border: 1px solid #444;
            border-radius: 6px;
            color: white;
            box-sizing: border-box;
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        button {
            padding: 12px;
            font-size: 14px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        .google-login {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px 0;
            background-color: #333;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            width: 100%;
        }

        .google-login svg {
            margin-right: 10px;
        }

        .signup {
            font-size: 14px;
            color: #ccc;
            text-align: center;
            margin-top: 20px;
        }

        .signup a {
            color: #007bff;
            text-decoration: none;
        }

        .signup a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="login-box">
        <img src="Logo-Laboratorium.png" alt="Login Image" />

        <h1>Sign in to your account</h1>

        <form method="POST">
            <div>
                <label for="email">Your email</label>
                <input type="email" name="email" id="email" placeholder="name@company.com" required />
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="••••••••" required />
            </div>

            <button type="submit" name="login">Sign in</button>

            <a href="#" class="google-login">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                    <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8
                    c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,
                    3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,
                    24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,
                    20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                    <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,
                    24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,
                    29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                    <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238
                    C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,
                    5.025C9.505,39.556,16.227,44,24,44z"></path>
                    <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,
                    4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,
                    5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,
                    43.611,20.083z"></path>
                </svg>
                Continue with Google
            </a>

            <p class="signup">
                Don’t have an account yet?
                <a href="registerForm.php">Sign up</a>
            </p>
        </form>
    </div>
</body>

</html>