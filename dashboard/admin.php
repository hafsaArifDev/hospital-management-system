<?php
session_start();
include '../config/db.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>👩‍💼 Admin Dashboard</h2>

    <hr>

    <h3>Manage System</h3>
    <ul>
        <li><a href="../admin/manage_doctors.php">👨‍⚕️ Manage Doctors</a></li>
        <li><a href="../admin/manage_patients.php">🧑‍🦰 Manage Patients</a></li>
        <li><a href="../appointments/view.php">📅 View All Appointments</a></li>
        <li><a href="../prescriptions/view.php">💊 View All Prescriptions</a></li>
        <li><a href="../logout.php">🚪 Logout</a></li>
    </ul>
</body>
</html>
