<?php
session_start(); 
include 'connect.php';

if (isset($_POST['signup'])) {
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
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
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "Email Already Exists!";
    } else {
        // Insert new user into the database
        $insertQuery = "INSERT INTO users (firstName, lastName, email, password, month, day, year, nationality, gender) 
                         VALUES ('$firstname', '$lastname', '$email', '$password', '$month', '$day', '$year', '$nationality', '$gender')";
        
        if ($conn->query($insertQuery) === TRUE) {
            $_SESSION['email'] = $email;
            $_SESSION['firstname'] = $firstname;

            header("Location: usernameprofile.php");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>