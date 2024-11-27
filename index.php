<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
}
?>
<html>
<head>
    <title>Recycle Guide</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <h1>Welcome to Recycle Guide</h1>
    <a href="login.php">Login</a> | <a href="register.php">Register</a>
</body>
</html>
