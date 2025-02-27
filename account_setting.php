<?php
session_start();
include 'connect.php';

// Check if the user is logged in, they have to login first 
if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Fetch user data from the database
$email = $_SESSION['email']; // Use email to fetch the user's data
$sql = "SELECT username, icon_path, firstName, lastName, password FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username']; // Fetch the username from the database
    $icon_path = $row['icon_path']; 
    $firstName = $row['firstName']; 
    $lastName = $row['lastName']; 
} else {
    $username = "Guest"; // Default username if not found
    $icon_path = "icon/default.png"; // Default icon if not found
    $firstName = "";
    $lastName = "";
}

// Handle form submission for updating user details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newFirstName = $_POST['firstName'];
    $newLastName = $_POST['lastName'];
    $newEmail = $_POST['email'];
    $newPassword = $_POST['password'];

    // Hash the new password if provided
    if (!empty($newPassword)) {
        $newPassword = md5($newPassword); // Hash the new password
    } else {
        $newPassword = $row['password']; // Keep the old password if no new password is provided
    }

    // Update the user's details in the database
    $updateSql = "UPDATE users SET firstName = '$newFirstName', lastName = '$newLastName', email = '$newEmail', password = '$newPassword' WHERE email = '$email'";
    if ($conn->query($updateSql)) {
        // Update session variables if email is changed
        if ($newEmail != $email) {
            $_SESSION['email'] = $newEmail;
        }
        echo "<script>alert('Profile updated successfully!');</script>";
    } else {
        echo "<script>alert('Error updating profile: " . $conn->error . "');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account_Settings</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Back button styling */
    .back-button {
        font-family: Inter;
        position: absolute;
        top: 20px;
        left: 20px;
        width: 90px;
        height: 90px;
        background-image: url("img/back 1.png");
        background-repeat: no-repeat;
        background-size: 380px;
        background-position: center;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        opacity: 100%;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .back-button:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
    }

    .back-button:active {
        transform: scale(1);
    }

    /* Main container styling */
    .Account_Container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: radial-gradient(circle, #5c0067 0%, #00d4ff 100%);
        padding: 20px;
    }

    /* Input container styling */
    .input_account {
        background-color: white;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    /* User icon styling */
    .user-icon {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
        border: 3px solid #6cd89e;
    }

    .sidebar {
        background-color: green;
    }

    /* Username styling */
    .sidebar h1 {
        font-size: 1.5em;
        margin-bottom: 20px;
        color: #333;
    }

    /* Input fields styling */
    .input_account input {
        background-color: #d1d1d1;
        width: 100%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 16px;
        transition: border-color 0.3s ease;
    }

    .input_account input::placeholder {
        color: #888;
    }

    .input_account input:focus {
        border-color: #6cd89e;
        outline: none;
    }

    /* Update button styling */
    .update-btn {
        width: 100%;
        padding: 12px;
        margin-top: 20px;
        background-color: rgb(89, 7, 230);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .update-btn:hover {
        background-color: #5bc487;
        transform: scale(1.05);
    }

    .update-btn:active {
        transform: scale(1);
    }

    /* Responsive design for smaller screens */
    @media (max-width: 600px) {
        .Account_Container {
            padding: 10px;
        }

        .input_account {
            padding: 20px;
        }

        .back-button {
            width: 70px;
            height: 70px;
        }

        .user-icon {
            width: 80px;
            height: 80px;
        }
    }
</style>

<body>
    <a href="mainmenu.php">
        <button class="back-button"> BACK</button>
    </a>

    <div class="Account_Container">
        <div class="input_account">
            <div class="sidebar">
                <!-- Display the profile icon dynamically -->
                <img src="<?php echo $icon_path; ?>" alt="User Icon" class="user-icon">
                <!-- Display the username dynamically -->
                <h1><?php echo htmlspecialchars($username); ?></h1>
                <form method="POST" action="">
                    <input type="text" name="firstName" placeholder="Enter First Name"
                        value="<?php echo htmlspecialchars($firstName); ?>">
                    <input type="text" name="lastName" placeholder="Enter Last Name"
                        value="<?php echo htmlspecialchars($lastName); ?>">
                    <input type="email" name="email" placeholder="Enter Email"
                        value="<?php echo htmlspecialchars($email); ?>">
                    <input type="password" name="password" placeholder="Enter New Password">
                    <button type="submit" class="update-btn">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>