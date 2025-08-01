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
      header {
    background-color: #3498db;
    color: white;
    padding: 15px 30px;
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

.logo h1 {
    margin: 0;
    font-size: 28px;
}

.navigation a {
    color: white;
    text-decoration: none;
    margin-left: 25px;
    font-weight: bold;
    font-size: 16px;
}

.navigation a:hover {
    text-decoration: underline;
}

.contact-btn {
    background-color: #3498db;
    color: #3498db;
    padding: 6px 14px;
    border-radius: 5px;
    font-weight: bold;
}



    </style>
</head>
<body>

<header>
    <div class="header-container">
        <div class="logo">
            <h1>🏥 Hospital Management System</h1>
        </div>
        <nav class="navigation">
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
            <a href="/hospital%20management%20system/contact.php" class="contact-btn">Contact</a>
        </nav>
    </div>
</header>

<main>
