<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hospital Management System</title>
    <link rel="stylesheet" href="/hospital-system/assets/css/style.css">
</head>
<body>

<header>
    <h1>🏥 Hospital Management System</h1>
    <?php if (isset($_SESSION['user_role'])): ?>
        <nav>
            <ul>
                <li><a href="/hospital-system/dashboard/<?php echo $_SESSION['user_role']; ?>.php">Dashboard</a></li>
                <li><a href="/hospital-system/appointments/view.php">Appointments</a></li>
                <li><a href="/hospital-system/prescriptions/view.php">Prescriptions</a></li>
                <li><a href="/hospital-system/logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php else: ?>
        <nav>
            <ul>
                <li><a href="/hospital-system/login.php">Login</a></li>
                <li><a href="/hospital-system/register.php">Register</a></li>
            </ul>
        </nav>
    <?php endif; ?>
</header>

<main>
