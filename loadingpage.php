<?php
session_start();
if (!isset($_SESSION['firstname'])) {
    echo "Session variable 'firstname' is not set!";
} else {
    $username = htmlspecialchars($_SESSION['firstname']);
    $icon = isset($_SESSION['selected_icon']) ? $_SESSION['selected_icon'] : 'icon/default.png';
}

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

        
        .welcome {
            text-align: center;
            opacity: 0;
            animation: fadeIn 3s ease-in-out forwards;
            background: rgba(131, 100, 100, 0.7);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            max-width: 40%; /* Limit the width */
            width: 300px; /* Set a fixed width */
        }

    
       
        .welcome img {
            max-width: 20%;
            height: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.93);
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .welcome img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.93);
        }


        
        
        .wilkam{
            text-align: center;
            opacity: 0;
            animation: fadeIn 3s ease-in-out forwards;
            background: rgba(49, 33, 33, 0.7);
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(10px);
            max-width: 100%; /* Limit the width */
            width: 300px; /* Set a fixed width */
        }

    
       
        .wilkam img {
            max-width: 200%;
            height: 50px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.93);
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .wilkam img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(255, 255, 255, 0.93);
        }

        
        h1 {
            color: white;
            font-size: 2.5rem; 
            margin-bottom: 1rem;
            text-shadow: 0 4px 10px rgba(255, 255, 255, 0.5);
            animation: glow 2s infinite alternate;
        }

        
        a {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.75rem 1.5rem;
            font-size: 1.2rem;
            color: white;
            background: linear-gradient(45deg, #007BFF, #00BFFF);
            border-radius: 25px;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        a:hover {
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
                text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
            }

            100% {
                text-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
            }
        }

        
        @media (max-width: 600px) {
            h1 {
                font-size: 2rem; /* Smaller font size for mobile */
            }

            a {
                font-size: 1rem; /* Smaller link size for mobile */
            }
        }
    </style>
</head>

<body>
    <div class="welcome">
        <h1>
            <img src="<?php echo $icon; ?>" alt="User Icon" class="user-icon">
            WELCOME, <?php echo $username; ?>!
        </h1>
        <div class="wilkam"><img src="img/welcome.png" alt="Welcome Image">
        <a href="mainmenu.php"> Continue to main menu...</a>
    </div>
    </div>
</body>

</html>