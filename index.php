<?php 
    include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Setup</title>
    <style>
        :root {
            --background: #eaeaea;
            --avatar-bg: #d9d9d9;
            --error: #d02020;
            --button-bg: #fabc3f;
            --badge-border: #fabc3f;
            --badge-1-bg: #8fb996;
            --badge-2-bg: #4169e1;
            --badge-3-bg: #fff5b8;
            --badge-4-bg: #ffb5b5;
            --badge-5-bg: #d4af37;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: var(--background);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .container {
            width: 100%;
            max-width: 480px;
            position: relative;
        }

        .avatar-section {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 0 auto 2rem;
        }

        .avatar-upload {
            width: 128px;
            height: 128px;
            background: var(--avatar-bg);
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            overflow: hidden;
        }

        .avatar-upload::before,
        .avatar-upload::after {
            content: '';
            position: absolute;
            background: #939393;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: opacity 0.3s;
        }

        .avatar-upload::before {
            width: 40px;
            height: 2px;
        }

        .avatar-upload::after {
            width: 2px;
            height: 40px;
        }

        .avatar-upload.has-icon::before,
        .avatar-upload.has-icon::after {
            opacity: 0;
        }

        .badge {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid var(--badge-border);
            position: absolute;
            cursor: pointer;
            transition: transform 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .badge img {
            max-width: 70%;
            max-height: 70%;
            object-fit: contain;
        }

        .badge:nth-child(1) { background: var(--badge-1-bg); top: 0; left: 50%; transform: translateX(-50%); }
        .badge:nth-child(2) { background: var(--badge-2-bg); top: 25%; right: 0; }
        .badge:nth-child(3) { background: var(--badge-3-bg); bottom: 25%; right: 0; }
        .badge:nth-child(4) { background: var(--badge-4-bg); bottom: 0; left: 50%; transform: translateX(-50%); }
        .badge:nth-child(5) { background: var(--badge-5-bg); bottom: 25%; left: 0; }
        .badge:nth-child(6) { background: var(--badge-2-bg); top: 25%; left: 0; }

        .badge.selected {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80px;
            height: 80px;
            z-index: 10;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #ccc;
            border-radius: 0.375rem;
            font-size: 1rem;
        }

        input:focus {
            outline: none;
            border-color: var(--button-bg);
        }

        .error-input {
            border-color: var(--error);
        }

        .error-message {
            color: var(--error);
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        button {
            width: 100%;
            padding: 0.875rem;
            background: var(--button-bg);
            border: none;
            border-radius: 0.5rem;
            color: #151d3b;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        button:hover {
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            .avatar-section {
                transform: scale(0.8);
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <form>
            <div class="avatar-section">
                <div class="avatar-upload" id="avatarUpload"></div>
                <div class="badge" data-icon="Image/Anahaw.png"><img src="Anahaw.png" alt="Bull icon"></div>
                <div class="badge" data-icon="Image/Eagle.png" alt="Image/Eagle.png"></div>
                <div class="badge" data-icon=""><img src="" alt="Mango icon"></div>
                <div class="badge" data-icon=""><img src="" alt="Palm leaf icon"></div>
                <div class="badge" data-icon=""><img src="" alt="Bird icon"></div>
            </div>
            
            <div class="form-group">
                <label for="username">Username</label>
                <input 
                    type="text" 
                    id="username" 
                    name="username" 
                    placeholder="Enter username"
                    class="error-input"
                    aria-invalid="true"
                    aria-describedby="username-error"
                >
                <div class="error-message" id="username-error">
                    Someone already has that username. Try another
                </div>
            </div>

            <button type="submit">Done</button>
        </form>
    </div>

    <script>
        const avatarUpload = document.getElementById('avatarUpload');
        const badges = document.querySelectorAll('.badge');

        badges.forEach(badge => {
            badge.addEventListener('click', () => {
                // Remove 'selected' class from all badges
                badges.forEach(b => b.classList.remove('selected'));
                
                // Add 'selected' class to clicked badge
                badge.classList.add('selected');

                // Add 'has-icon' class to avatarUpload
                avatarUpload.classList.add('has-icon');

                // Set the background image of avatarUpload
                avatarUpload.style.backgroundImage = `url(${badge.dataset.icon})`;
                avatarUpload.style.backgroundSize = 'cover';
                avatarUpload.style.backgroundPosition = 'center';
            });
        });

        avatarUpload.addEventListener('click', () => {
            // Remove 'selected' class from all badges
            badges.forEach(badge => badge.classList.remove('selected'));

            // Remove 'has-icon' class and background image from avatarUpload
            avatarUpload.classList.remove('has-icon');
            avatarUpload.style.backgroundImage = 'none';
        });
    </script>
</body>
</html>