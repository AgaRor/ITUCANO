<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buttonized Paragraphs</title>
    <style>
        body {
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(255, 218, 0, 0.5886729691876751) 82%, rgba(208, 205, 202, 0.3225665266106442) 96%);
            margin: 0;
            overflow-x: hidden;
        }

        /* Back Button Styling */
        .back-button {
            text-align: right;
            position: absolute;
            top: 20px;
            left: 20px;
            width: 90px;
            height: 90px;
            background-image: url("img/back 1.png");
            background-repeat: no-repeat;
            background-position: center;
            border: none;
            border-radius: 200%;
            cursor: pointer;
            opacity: 100%;
            transition: transform 0.2s ease;
            box-shadow: 0 50px 30px rgba(5, 2, 2, 0.61);
        }

        .back-button:hover {
            transform: scale(1.1);
        }

        .back-button:active {
            transform: scale(1);
        }

        /* Main Container for Both Input Containers */
        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 80px;
            margin-top: 200px;
            margin-right: 90px;
        }

        .input-container,
        .input-container1 {
            margin-top: 90px;
            width: 35%;
            padding: 30px;
            background-color: whitesmoke;
            border-radius: 10px;
            box-shadow: 0 50px 30px rgba(5, 2, 2, 0.61);
        }

        .button-container {
            display: flex;
            gap: 10px;
        }

        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            font-family: 'Inter', sans-serif;
            color: #050505ce;
            font-weight: bolder;
            background-color: transparent;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Hover Effect */
        .button-container button:hover {
            background-color: #939496;
            transform: translateY(-2px);
        }

        /* Active Effect */
        .button-container button:active {
            transform: translateY(0);
        }

        /* Input Field Styling */
        .input-box1 {
            margin-top: 50px;
            width: 95%;
            height: 150px;
            padding: 15px;
            font-size: 16px;
            font-family: 'Inter', sans-serif;
            color: #080808;
            background-color: #bead60e5;
            border: 1px solid #8f6e6e;
            border-radius: 8px;
            resize: none;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .input-box {
            margin-top: 50px;
            width: 95%;
            height: 150px;
            padding: 15px;
            font-size: 16px;
            font-family: 'Inter', sans-serif;
            color: #080808;
            background-color: #c4c4c4e5;
            border: 1px solid #8f6e6e;
            border-radius: 8px;
            resize: none;
            outline: none;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }


        .input-box::placeholder,
        .input-box1::placeholder {
            color: #999;
        }

        /* Focus Effect */
        .input-box:focus,
        .input-box1:focus {
            border-color: #1a73e8;
            box-shadow: 0 0 0 2px rgba(26, 115, 232, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .button-container {
                flex-direction: column;
                align-items: center;
            }
        }

        /* History and Favorites Buttons */
        .history-btn,
        .fav-btn {
            position: fixed;
            margin-top: 90px;
            bottom: unset;
            width: 50px;
            height: 50px;
            background-size: 200px;
            background-repeat: no-repeat;
            background-position: center;
            border: none;
            border-radius: 100px;
            cursor: pointer;
            opacity: 50%;
            transition: opacity 0.3s ease, transform 0.2s ease;
            box-shadow: 0 50px 30px rgba(5, 2, 2, 0.61);
        }

        .history-btn {
            margin-left: 700px;
            background-image: url("img/history 1.png");
        }

        .fav-btn {
            margin-left: 900px;
            background-image: url("img/fav 1.png");
            background-size: 150px;
        }

        /* Hover Effect */
        .history-btn:hover,
        .fav-btn:hover {
            opacity: 100%;
            transform: scale(1.4);
        }

        /* Active Effect */
        .history-btn:active,
        .fav-btn:active {
            transform: scale(1);
        }

        /* Pop-up Text Styling */
        .popup-text {
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 14px;
            font-family: Arial, sans-serif;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
            pointer-events: none;
        }

        /* Show Pop-up Text on Hover */
        .history-btn:hover .popup-text,
        .fav-btn:hover .popup-text {
            opacity: 1;
            visibility: visible;
        }

        /* Sidebar Styling */
        .sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            /* Hidden by default */
            width: 400px;
            height: 100%;
            background-color: #c9c99d;
            opacity: 80%;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.2);
            transition: right 0.3s ease;
            z-index: 1000;
            padding: 20px;
            box-sizing: border-box;
        }

        .sidebar.active {
            right: 0;
            /* Slide in */
        }

        .sidebar h2 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }

        .sidebar-content {
            margin-top: 20px;
            font-size: 16px;
            color: #000000;
        }

        /* Overlay Styling */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        .overlay.active {
            opacity: 1;
            visibility: visible;
        }
    </style>
</head>

<body>

    <a href="mainmenu.php">
        <button class="back-button"> BACK</button>
    </a>

    <div class="main-container">
        <div class="input-container">
            <div class="button-container">
                <button>English</button>
                <button>Cebuano</button>
                <button>Filipino</button>
            </div>
            <textarea class="input-box" placeholder="Enter text..."></textarea>
        </div>

        <div class="input-container1">
            <div class="button-container">
                <button>English</button>
                <button>Cebuano</button>
                <button>Filipino</button>
            </div>
            <textarea class="input-box1" placeholder="Enter text..."></textarea>
        </div>
    </div>
    <div>
        <button class="history-btn">
            <span class="popup-text">History</span>
        </button>
    </div>
    <div>
        <button class="fav-btn">
            <span class="popup-text">Favorites</span>
        </button>
    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h2 id="sidebar-title">Sidebar Title</h2>
        <div class="sidebar-content" id="sidebar-content">
            <!-- Content will be dynamically added here -->
        </div>
    </div>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>





    <script>
        const historyBtn = document.querySelector('.history-btn');
        const favBtn = document.querySelector('.fav-btn');
        const sidebar = document.getElementById('sidebar');
        const sidebarTitle = document.getElementById('sidebar-title');
        const sidebarContent = document.getElementById('sidebar-content');
        const overlay = document.getElementById('overlay');

        //  to open the sidebar
        function openSidebar(title, content) {
            sidebarTitle.textContent = title;
            sidebarContent.innerHTML = content;
            sidebar.classList.add('active');
            overlay.classList.add('active');
        }

        //  to close the sidebar
        function closeSidebar() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
        }

        // Event listeners for buttons
        historyBtn.addEventListener('click', () => {
            openSidebar('History', '<p>Echo yung History nila.</p>');
        });

        favBtn.addEventListener('click', () => {
            openSidebar('Favorites', '<p>Echo yung favorites word.</p>');
        });

        // Close sidebar when clicking outside
        overlay.addEventListener('click', closeSidebar);
    </script>
</body>

</html>