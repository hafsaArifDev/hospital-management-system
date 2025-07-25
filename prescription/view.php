<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['user_role'])) {
    header('Location: ../login.php');
    exit();
}

$role = $_SESSION['user_role'];
$user_id = $_SESSION['user_id'];

// Build query based on role
if ($role === 'patient') {
    $query = "SELECT pr.*, d.name AS doctor_name 
              FROM prescriptions pr 
              JOIN doctors d ON pr.doctor_id = d.id 
              WHERE pr.patient_id = :user_id 
              ORDER BY pr.date DESC";
} elseif ($role === 'doctor') {
    $query = "SELECT pr.*, p.name AS patient_name 
              FROM prescriptions pr 
              JOIN patients p ON pr.patient_id = p.id 
              WHERE pr.doctor_id = :user_id 
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

// Run query with PDO
$stmt = $conn->prepare($query);

// Bind :user_id only if role is not admin
if ($role !== 'admin') {
    $stmt->bindParam(':user_id', $user_id);
}

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Prescriptions</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>💊 Prescription History</h2>

    <?php if (count($result) === 0): ?>
        <p>No prescriptions found.</p>
    <?php else: ?>
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
                <?php foreach ($result as $row): ?>
                    <tr>
                        <?php if ($role !== 'patient') echo "<td>" . htmlspecialchars($row['patient_name'] ?? 'N/A') . "</td>"; ?>
                        <?php if ($role !== 'doctor') echo "<td>" . htmlspecialchars($row['doctor_name'] ?? 'N/A') . "</td>"; ?>
                        <td><?= htmlspecialchars($row['date']) ?></td>
                        <td><?= nl2br(htmlspecialchars($row['notes'])) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <br>
    <a href="../dashboard/<?= $role ?>.php">⬅️ Back to Dashboard</a>
</body>
</html>
