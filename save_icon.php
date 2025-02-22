<?php
session_start();
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['icon'])) {
        $icon = $data['icon'];
        $email = $_SESSION['email'];

        // Update the user's icon path in the database
        $sql = "UPDATE users SET icon_path='$icon' WHERE email='$email'";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['selected_icon'] = $icon;
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to update icon']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Icon not provided']);
    }
}
?>