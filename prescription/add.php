<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'doctor') {
    header('Location: ../login.php');
    exit();
}

$doctor_id = $_SESSION['user_id'];
$patient_id = $_GET['patient_id'] ?? null;

if (!$patient_id) {
    die("No patient selected.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date = $_POST['date'];
    $notes = $_POST['notes'];

    $stmt = $conn->prepare("INSERT INTO prescriptions (patient_id, doctor_id, date, notes) 
                            VALUES (:patient_id, :doctor_id, :date, :notes)");
    $stmt->execute([
        ':patient_id' => $patient_id,
        ':doctor_id' => $doctor_id,
        ':date' => $date,
        ':notes' => $notes
    ]);

    header("Location: view.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Write Prescription</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>🖊️ Write Prescription</h2>
    <form method="POST">
        <label>Date:</label><br>
        <input type="date" name="date" required><br><br>

        <label>Notes:</label><br>
        <textarea name="notes" rows="5" cols="40" required></textarea><br><br>

        <input type="submit" value="Save Prescription">
    </form>

    <br>
    <a href="../appointments/view.php">⬅️ Back to Appointments</a>
</body>
</html>
