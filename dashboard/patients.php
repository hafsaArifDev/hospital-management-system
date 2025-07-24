<?php 
session_start();
include '../config/db.php';

// ✅ سیشن چیک
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'patient') {
    header('Location: ../login.php');
    exit();
}

// ✅ ڈیٹا لوڈ کرنا
$patient_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM patients WHERE id = ?");
$stmt->execute([$patient_id]);
$patient = $stmt->fetch(PDO::FETCH_ASSOC);
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
        <li><a href="../prescription/view.php">💊 View Prescriptions</a></li>
        <li><a href="../login.php">🚪 Logout</a></li>
    </ul>
</body>
</html>
