<?php
// Redirect if already logged in
session_start();
if (isset($_SESSION['user_role'])) {
    header("Location: dashboard/" . $_SESSION['user_role'] . ".php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Management System</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <div class="container">
    <h1>Welcome to the Hospital Management System</h1>
    <p>Please select your role:</p>
    <a href="login.php?role=patient">Patient Login</a><br>
    <a href="login.php?role=doctor">Doctor Login</a><br>
    <a href="login.php?role=admin">Admin Login</a><br><br>
    <a href="register.php">New? Register here</a>
  </div>
</body>
</html>
