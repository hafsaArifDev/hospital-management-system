<?php
session_start();
include '../config/db.php';

// Check if user is logged in and is a patient
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'patient') {
    header('Location: ../login.php');
    exit();
}

// Fetch user data
$patient_id = $_SESSION['user_id'];
$sql = "SELECT * FROM patients WHERE id = $patient_id";
$result = mysqli_query($conn, $sql);
$patient = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($patient['name']); ?> 👋</h2>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($patient['email']); ?></p>

    <hr>

    <h3>Actions</h3>
    <ul>
        <li><a href="../appointments/book.php">📅 Book Appointment</a></li>
        <li><a href="../appointments/view.php">🗂 View Appointments</a></li>
        <li><a href="../prescriptions/view.php">💊 View Prescriptions</a></li>
        <li><a href="../logout.php">🚪 Logout</a></li>
    </ul>
</body>
</html>
