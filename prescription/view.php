<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['user_role'])) {
    header('Location: ../login.php');
    exit();
}

$role = $_SESSION['user_role'];
$user_id = $_SESSION['user_id'];

if ($role === 'patient') {
    $query = "SELECT pr.*, d.name AS doctor_name 
              FROM prescriptions pr 
              JOIN doctors d ON pr.doctor_id = d.id 
              WHERE pr.patient_id = '$user_id' 
              ORDER BY pr.date DESC";
} elseif ($role === 'doctor') {
    $query = "SELECT pr.*, p.name AS patient_name 
              FROM prescriptions pr 
              JOIN patients p ON pr.patient_id = p.id 
              WHERE pr.doctor_id = '$user_id' 
              ORDER BY pr.date DESC";
} elseif ($role === 'admin') {
    $query = "SELECT pr.*, p.name AS patient_name, d.name AS doctor_name 
              FROM prescriptions pr 
              JOIN patients p ON pr.patient_id = p.id 
              JOIN doctors d ON pr.doctor_id = d.id 
              ORDER BY pr.date DESC";
} else {
    die("Unauthorized access.");
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Prescriptions</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>💊 Prescription History</h2>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <?php if ($role !== 'patient') echo "<th>Patient</th>"; ?>
                <?php if ($role !== 'doctor') echo "<th>Doctor</th>"; ?>
                <th>Date</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <?php if ($role !== 'patient') echo "<td>{$row['patient_name']}</td>"; ?>
                    <?php if ($role !== 'doctor') echo "<td>{$row['doctor_name']}</td>"; ?>
                    <td><?= $row['date']; ?></td>
                    <td><?= $row['notes']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <br>
    <a href="../dashboard/<?= $role ?>.php">⬅️ Back to Dashboard</a>
</body>
</html>
