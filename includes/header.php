<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="/hospital%20management%20system/assets/css/style.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        header {
            background-color: #3498db;
            color: white;
            padding: 15px 30px;
        }
        header h1 {
            margin: 0;
        }
        nav {
            margin-top: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        main {
            padding: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>🏥 Hospital Management System</h1>
    <nav>
        <?php if (isset($_SESSION['user_type'])): ?>
             <a href="/hospital%20management%20system/index.php">Home</a>
            <a href="/hospital%20management%20system/login.php">Login</a>
            <a href="/hospital%20management%20system/register.php">Register</a>
            <a href="/hospital%20management%20system/dashboard/<?php echo $_SESSION['user_type']; ?>.php">Dashboard</a>
            <a href="/hospital%20management%20system/index.php">Logout</a>
        <?php else: ?>
            <a href="/hospital%20management%20system/index.php">Home</a>
            <a href="/hospital%20management%20system/login.php">Login</a>
            <a href="/hospital%20management%20system/register.php">Register</a>
        <?php endif; ?>
    </nav>
</header>

<main>
