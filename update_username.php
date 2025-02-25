<?php
session_start();
include 'connect.php';

if (!isset($_SESSION['email'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['username'];

    // Validate the new username (e.g., check if it's not empty)
    if (empty($newUsername)) {
        echo "Username cannot be empty.";
        exit();
    }

    // Check if the new username already exists in the database
    $checkUsername = "SELECT * FROM users WHERE username = '$newUsername'";
    $result = $conn->query($checkUsername);

    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose a different one.";
        exit();
    }

    // Update the username in the database
    $email = $_SESSION['email'];
    $updateQuery = "UPDATE users SET username = '$newUsername' WHERE email = '$email'";

    if ($conn->query($updateQuery) === TRUE) {
        // Update the session variable
        $_SESSION['username'] = $newUsername;

        // Redirect to loading.php after successful update
        header("Location: loadingpage.php");
        exit();
    } else {
        echo "Error updating username: " . $conn->error;
    }
}
?>