<?php
include('config.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantity = $_POST['quantity'];
    $material = $_POST['material'];
    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE users SET recycled = recycled + $quantity WHERE id = $user_id";
    if ($conn->query($sql)) {
        header('Location: dashboard.php');
    } else {
        echo "Error updating recycling: " . $conn->error;
    }
}
?>
