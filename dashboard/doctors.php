<?php
session_start();
include '../config/db.php';

// Check if user is logged in and is a doctor
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'doctor') {
    header('Location: ../login.php');
    exit();
}

// Fetch doctor data
$doctor_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM doctors WHERE id = :id");
$stmt->execute([':id' => $doctor_id]);
$doctor = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>Welcome, Dr. <?php echo htmlspecialchars($doctor['name']); ?> </h2>
    <p><strong>Specialization:</strong> <?php echo htmlspecialchars($doctor['specialization']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($doctor['email']); ?></p>

    <hr>

    <h3>Actions</h3>
    <ul>
        <li><a href="../appointments/view.php">📋 View My Appointments</a></li>
        <li><a href="../prescription/view.php">💊 Manage Prescriptions</a></li>
        <li><a href="../logout.php">🚪 Logout</a></li>
    </ul>
</body>
</html>
