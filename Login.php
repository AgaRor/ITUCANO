<?php
session_start();
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password); // Hash the password

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['email'] = $row['email'];
        $_SESSION['firstname'] = $row['firstName']; // Store the first name in the session
        header("Location: usernameprofile.php"); // Redirect to profile page
        exit();
    } else {
        echo "Incorrect email or password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mabuhay - Learn Cebuano and Filipino</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background-image: url('img/cover2.png');
            background-size: cover;
            justify-content: center;
            background-position: center;
            background-repeat: no-repeat;
            padding: 1rem;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(8px);
            border-radius: 1rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        input {
            width: 100%;
            height: 48px;
            padding: 0 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            font-size: 1rem;
            background-color: white;
            outline: none;
            transition: border-color 0.2s;
        }

        input:focus {
            border-color: #6ebf8b;
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            cursor: pointer;
            color: #64748b;
        }

        .password-toggle:hover {
            color: #475569;
        }

        .btn {
            width: 100%;
            height: 48px;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .btn-primary {
            background-color: #6ebf8b;
            color: white;
        }

        .btn-secondary {
            background-color: #fabc3f;
            color: #151d3b;
        }

        .forgot-password {
            display: block;
            text-align: center;
            color: #151d3b;
            text-decoration: none;
            font-size: 0.875rem;
            margin: 1rem 0;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 1.5rem;
            }
        }

        footer {
            background-color: black;
            color: -moz-linear-gradient(top, #c7abab 0%, #6371b6 100%);
            text-align: center;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .About_us a {
            color: rgb(250, 243, 247);
            font-style: oblique;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

        }

        a:hover {
            color: rgb(236, 233, 6);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="form-group">
            <form method="post" action="login.php">
                <!-- Correct action -->
                <input type="text" name="email" placeholder="Email or username"> <!-- Add name attribute -->
        </div>
        <div class="form-group">
            <div class="password-container">
                <input type="password" name="password" placeholder="Password"> <!-- Add name attribute -->
                <button class="password-toggle" onclick="togglePassword(this)">👁️</button>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Log In</button> <!-- Add type="submit" -->
        </div>
        </form> <!-- Close form tag -->
        <a href="#" class="forgot-password">Forgot password?</a>
        <div class="form-group">
            <button class="btn btn-secondary"><a href="createaccount.php">Create new account</a></button>
        </div>
    </div>
    <footer class="About_us">
        <a href=""> About Us</a>
    </footer>

    <script>
        function togglePassword(button) {
            const input = button.previousElementSibling;
            if (input.type === 'password') {
                input.type = 'text';
                button.textContent = '🔒';
            } else {
                input.type = 'password';
                button.textContent = '👁️';
            }
        }
    </script>
</body>

</html>