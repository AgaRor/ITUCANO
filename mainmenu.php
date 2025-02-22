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
            background-color: #c01414;
            color: #333;
        }

        .container {
            display: flex;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
            background-image: url('img/welcomebackground.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
        }


        .sidebar {
            width: 250px;
            background-color: #ab886d;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .profile-icon {
            width: 70px;
            height: 70px;
            background-color: #6cd89e;
            border-radius: 50%;
            margin: 0 auto 20px;
        }

        .sidebar h1 {
            text-align: center;
            font-size: 1.5em;
            margin-bottom: 71px;
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
            color: #fff;
            background-color: #db0c2e;
            border: none;
            cursor: pointer;
            margin-top: 170px;
        }

        #logout-button:hover {
            background-color: rgb(200, 141, 141);
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
            gap: 20px;
            margin-bottom: 20px;
        }

        .games button {
            padding: 20px 40px;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="profile-icon"></div>
            <h1>Username</h1>
            <button class="menu-button">Account</button>
            <button class="menu-button">Lessons</button>
            <button class="menu-button">History Progress</button>
            <button id="logout-button">Log out</button>
        </div>
        <div class="main-content">
            <div class="games">
                <button id="ceb"></button>
                <button id="Aba"></button>
                <button id="Pag-bigkas"></button>
            </div>
            <button class="quiz-button">QUIZ BEE</button>
        </div>
    </div>
</body>

</html>