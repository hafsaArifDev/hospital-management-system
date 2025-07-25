<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['user_role'])) {
    header('Location: ../login.php');
    exit();
}

$role = $_SESSION['user_role'];
$user_id = $_SESSION['user_id'];

// Query appointments based on role
if ($role === 'patient') {
    $query = "SELECT a.*, d.name AS doctor_name 
              FROM appointments a 
              JOIN doctors d ON a.doctor_id = d.id 
              WHERE a.patient_id = :user_id 
              ORDER BY a.appointment_date DESC";
} elseif ($role === 'doctor') {
    $query = "SELECT a.*, p.name AS patient_name 
              FROM appointments a 
              JOIN patients p ON a.patient_id = p.id 
              WHERE a.doctor_id = :user_id 
              ORDER BY a.appointment_date DESC";
} elseif ($role === 'admin') {
    $query = "SELECT a.*, p.name AS patient_name, d.name AS doctor_name 
              FROM appointments a 
              JOIN patients p ON a.patient_id = p.id 
              JOIN doctors d ON a.doctor_id = d.id 
              ORDER BY a.appointment_date DESC";
} else {
    die("Unauthorized access.");
}

$stmt = $conn->prepare($query);

// Bind parameter only if not admin
if ($role !== 'admin') {
    $stmt->bindParam(':user_id', $user_id);
}

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Appointments</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>📋 Your Appointments</h2>

    <?php if (count($result) === 0): ?>
        <p>No appointments found.</p>
    <?php else: ?>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <?php if ($role === 'admin' || $role === 'patient'): ?>
                        <th>Doctor Name</th>
                    <?php endif; ?>
                    <?php if ($role === 'admin' || $role === 'doctor'): ?>
                        <th>Patient Name</th>
                    <?php endif; ?>
                    <th>Appointment Date</th>
                    <th>Reason</th>
                    <?php if ($role === 'doctor'): ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                    <tr>
                        <?php if ($role === 'admin' || $role === 'patient'): ?>
                            <td><?= htmlspecialchars($row['doctor_name']) ?></td>
                        <?php endif; ?>
                        <?php if ($role === 'admin' || $role === 'doctor'): ?>
                            <td><?= htmlspecialchars($row['patient_name']) ?></td>
                        <?php endif; ?>
                        <td><?= htmlspecialchars($row['appointment_date']) ?></td>
                        <td><?= htmlspecialchars($row['reason'] ?? 'N/A') ?></td>
                        <?php if ($role === 'doctor'): ?>
                            <td>
                                <a href="../prescription/add.php?patient_id=<?= $row['patient_id'] ?>">
                                    🖊️ Write Prescription
                                </a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
