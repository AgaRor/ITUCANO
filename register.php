<?php
session_start();
include 'connect.php';

if (isset($_POST['signup'])) {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $username = $_POST['username']; // New username field
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    $nationality = $_POST['nationality'];
    $gender = $_POST['gender'];

    // Validate password match
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Hash the password
    $password = md5($password);

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "Email Already Exists!";
        exit();
    }

    // Check if username already exists
    $checkUsername = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($checkUsername);

    if ($result->num_rows > 0) {
        echo "Username Already Exists!";
        exit();
    }

    // Insert new user into the database
    $insertQuery = "INSERT INTO users (firstName, lastName, email, username, password, month, day, year, nationality, gender, icon_path) 
                    VALUES ('$firstname', '$lastname', '$email', '$username', '$password', '$month', '$day', '$year', '$nationality', '$gender', 'icon/default.png')";

    if ($conn->query($insertQuery) === TRUE) {
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username; // Store username in session
        $_SESSION['firstname'] = $firstname;

        header("Location: usernameprofile.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
