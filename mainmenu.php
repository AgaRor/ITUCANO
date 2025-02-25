<?php
session_start();
include 'connect.php';

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch user data from the database
$email = $_SESSION['email']; // Use email to fetch the user's data
$sql = "SELECT username, icon_path FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username']; // Fetch the username from the database
    $icon_path = $row['icon_path']; // Fetch the icon path from the database
} else {
    $username = "Guest"; // Default username if not found
    $icon_path = "icon/default.png"; // Default icon if not found
}

// Store the username in the session (optional, if you want to use it later)
$_SESSION['username'] = $username;
$_SESSION['selected_icon'] = $icon_path;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: aliceblue;
            color: #333;

        }

        .container {
            display: flex;
            min-height: 100vh;
            height: 100px;
            justify-content: center;
            align-items: center;
            background-color: aliceblue;

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }


        .sidebar {
            width: 300px;
            background-color: #ab886d;
            opacity: 100%;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .profile-icon {

            width: 70px;
            height: 70px;
            background-color: #6cd89e;
            border-radius: 50%;
            margin-bottom: 100px;
        }

        .sidebar h1 {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 95px;
            color: #fff;
        }

        .menu-button {
            width: 100%;
            border-radius: 100px;
            background-color: #dadbbd;
            border: 1px solid rgba(0, 0, 0, 0.15);
            height: 71px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: #000;
            font-family: Inter;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
        }

        .menu-button:hover {
            background-color: #90ee90;
        }

        #logout-button {
            width: 100%;
            border-radius: 100px;
            height: 67px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: #000;
            background-color: #db0c2e;
            border: none;
            cursor: pointer;
            text-align: center;
            font-family: Inter;
            font-style: normal;
            font-weight: 700;
            line-height: normal;
            letter-spacing: 1.5px;
            margin-top: 350px;

        }

        #logout-button a {
            color: #000;
            text-decoration: none;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #logout-button:hover {
            background-color: rgba(240, 5, 5, 0.49);
            color: #fff;
        }

        .main-content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 50px;
        }

        .games {
            display: flex;
            gap: 100px;
            margin-bottom: 20px;
        }

        .games button {
            padding: 0px 40px;
            border: none;
            border-radius: 10px;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            font-size: 1.2em;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 190px;
            height: 100px;
        }

        .games button:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        #ceb {
            background-image: url('img/CEB.png');
        }

        #Aba {
            background-image: url('img/ABAKA.png');
        }

        #Pag-bigkas {
            background-image: url('img/PAg.png');
        }

        .quiz-button {
            padding: 10px 20px;
            background-color: #a8dadc;
            border: none;
            border-radius: 5px;
            font-size: 1em;
            color: #333;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .quiz-button:hover {
            background-color: #90ee90;
        }

        .user-icon {
            margin-top: 60px;
            width: 80px;
            height: 80px;
            border-radius: 50%;
            box-shadow: 0 4px 15px rgba(255, 255, 255, 0.5);
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <!-- Display the profile icon dynamically -->
            <img src="<?php echo $icon_path; ?>" alt="User Icon" class="user-icon">
            <!-- Display the username dynamically -->
            <h1><?php echo htmlspecialchars($username); ?></h1>
            <button class="menu-button">Account</button>
            <button class="menu-button">Lessons</button>
            <button class="menu-button">History Progress</button>
            <button id="logout-button"> <a href="Login.php">Logout</a></button>
        </div>
        <div class="main-content">
            <div class="games">
                <a href="Ceb_Fil_Translator.php"><button id="ceb"></button></a>
                <button id="Aba"></button>
                <button id="Pag-bigkas"></button>
            </div>
            <button class="quiz-button">QUIZ BUTTON</button>
        </div>
    </div>
</body>

</html>
