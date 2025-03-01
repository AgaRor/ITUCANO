<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Initialize the session variable for the icon if not set
if (!isset($_SESSION['selected_icon'])) {
    $_SESSION['selected_icon'] = 'icon/default.png'; // Default icon
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Icon Selector</title>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-image: url('img/cover.png');
        background-color: #f4f4f4;
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.9);
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        text-align: center;
        max-width: 500px;
        width: 100%;
    }

    h1 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 20px;
    }

    h2 {
        font-size: 1.8rem;
        color: #555;
        margin-bottom: 15px;
    }

    .icon-selector {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-bottom: 30px;
    }

    .icon {
        cursor: pointer;
        border: 3px solid #ddd;
        border-radius: 50%;
        padding: 10px;
        transition: all 0.3s ease;
    }

    .icon:hover {
        border-color: #007bff;
        transform: scale(1.1);
        box-shadow: 0 0 15px rgba(0, 123, 255, 0.3);
    }

    .icon img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .profile-icon {
        margin-bottom: 20px;
    }

    .profile-icon img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        border: 3px solid #007bff;
        transition: all 0.3s ease;
    }

    .profile-icon img:hover {
        transform: scale(1.05);
        box-shadow: 0 0 20px rgba(0, 123, 255, 0.4);
    }

    .enter-username {
        width: 100%;
        border-radius: 15px;
        background-color: #fff;
        border: 2px solid #ddd;
        box-sizing: border-box;
        height: 75px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
        padding: 0 20px;
        text-align: left;
        font-size: 1.2rem;
        color: #bebebe;
        transition: border-color 0.3s ease;
        margin-bottom: 20px;
        
    }

    .enter-username input {
        width: 100%;
        border: none;
        outline: none;
        font-size: 1.2rem;
        color: #333;
        background: transparent;
    }

    .enter-username input::placeholder {
        color: #bebebe;
    }

    .enter-username:focus-within {
        border-color: #007bff;
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);
    }

    .save-button {
        width: 100%;
        border-radius: 10px;
        background-color: #fabc3f;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: #151d3b;
        font-family: Inter, sans-serif;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
    }

    .save-button:hover {
        background-color: #e0a800;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .save-button:active {
        background-color: #d39e00;
        transform: translateY(0);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }
</style>

<body>
    <div class="container">
        <h1>Select Your Icon</h1>
        <div class="icon-selector">
            <div class="icon" data-icon="icon/green.png"><img src="icon/green.png" alt="Icon 1"></div>
            <div class="icon" data-icon="icon/ibon.png"><img src="icon/ibon.png" alt="Icon 2"></div>
            <div class="icon" data-icon="icon/kalabaw.png"><img src="icon/kalabaw.png" alt="Icon 3"></div>
            <div class="icon" data-icon="icon/mango.png"><img src="icon/mango.png" alt="Icon 3"></div>
            <!-- Add more icons as needed -->
        </div>
        <div class="profile">
            <h2><?php echo htmlspecialchars($_SESSION['firstname']) . " "; ?></h2> <!-- Display the first name -->
            <div class="profile-icon">
                <img id="profile-icon" src="<?php echo $_SESSION['selected_icon']; ?>" alt="Profile Icon">
            </div>
            <div class="enter-username">
                <form id="username-form" action="update_username.php" method="POST">
                    <input type="text" name="username" placeholder="Username"
                        value="<?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?>">
            </div>
            <div class="save-button">
                <button type="submit" class="save-button">Save</button> <!-- Visible submit button -->
            </div>
            </form>
        </div>
    </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const usernameForm = document.getElementById('username-form');
            const usernameInput = usernameForm.querySelector('input[name="username"]');

            // Optional: Submit the form when the user presses "Enter"
            usernameInput.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault(); // Prevent default form submission
                    usernameForm.submit();
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const icons = document.querySelectorAll('.icon');
            const profileIcon = document.getElementById('profile-icon');

            icons.forEach(icon => {
                icon.addEventListener('click', function () {
                    const selectedIcon = this.getAttribute('data-icon');
                    profileIcon.setAttribute('src', selectedIcon);

                    // Send the selected icon to the server to store in the session and database
                    fetch('save_icon.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            icon: selectedIcon
                        }),
                    });
                });
            });
        });
    </script>
</body>

</html>
