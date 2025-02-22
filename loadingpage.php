<?php
session_start();
if (!isset($_SESSION['firstname'])) {
    echo "Session variable 'firstname' is not set!";
    exit();
}

$username = htmlspecialchars($_SESSION['firstname']);
$icon = $_SESSION['selected_icon'] ?? 'icon/default.png'; //default icon if not selected
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('img/welcomebackground.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }

        .welcome-container {
            text-align: center;
            opacity: 0;
            animation: fadeIn 2s ease-in-out forwards;
            background-image: radial-gradient(circle, red, yellow, green);
            padding: 2.5rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            max-width: 90%;
            width: 400px;
        }

        .welcome-container h1 {
            color: white;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 0 4px 10px rgba(255, 255, 255, 0.5);
            animation: glow 2s infinite alternate;
        }

        .user-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.5);
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .user-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.8);
        }

        .welcome-image {
            width: 100%;
            max-width: 300px;
            margin: 1.5rem auto;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .welcome-image:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.8);
        }

        .continue-button {
            display: inline-block;
            margin-top: 1.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 1.2rem;
            color: white;
            background: linear-gradient(45deg, rgb(53, 185, 125), rgb(93, 202, 106));
            border-radius: 25px;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .continue-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 123, 255, 0.7);
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes glow {
            0% {
                text-shadow: 0 0 10px rgba(202, 175, 175, 0.5);
            }

            100% {
                text-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
            }
        }

        @media (max-width: 600px) {
            .welcome-container {
                padding: 1.5rem;
                width: 90%;
            }

            .welcome-container h1 {
                font-size: 2rem;
            }

            .continue-button {
                font-size: 1rem;
            }
        }


        footer {
            background-image: -moz-linear-gradient(top, #c7abab 0%, #6371b6 100%);
            color: -moz-linear-gradient(top, #c7abab 0%, #6371b6 100%);
            text-align: right;
            padding: 1.0px 5;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .About_us a {
            color: rgb(230, 201, 218);
            font-style;
            italic;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

        }

        a:hover {
            color: rgb(236, 233, 6);
        }
    </style>
</head>

<body>
    <div class="welcome-container">
        <h1>
            <img src="<?php echo $icon; ?>" alt="User Icon" class="user-icon">
            WELCOME, <?php echo $username; ?>!
        </h1>
        <img src="img/welcome.png" alt="Welcome Image" class="welcome-image">
        <a href="mainmenu.php" class="continue-button">Continue to Main Menu</a>
    </div>

    <footer class="About_us">
        <a href=""> About Us</a>
    </footer>
</body>

</html>