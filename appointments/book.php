<?php
session_start();
include '../config/db.php';

// Check if user is logged in and is a patient
if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'patient') {
    header('Location: ../login.php');
    exit();
}

// Handle appointment booking form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_id = $_SESSION['user_id'];
    $doctor_id = $_POST['doctor_id'];
    $appointment_date = $_POST['appointment_date'];
    $reason = $_POST['reason'];

    $query = "INSERT INTO appointments (patient_id, doctor_id, appointment_date, reason) 
              VALUES ('$patient_id', '$doctor_id', '$appointment_date', '$reason')";
    if (mysqli_query($conn, $query)) {
        $success = "Appointment booked successfully!";
    } else {
        $error = "Error booking appointment: " . mysqli_error($conn);
    }
}

// Fetch all doctors for dropdown
$doctors = mysqli_query($conn, "SELECT id, name FROM doctors");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Appointment</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>📅 Book an Appointment</h2>

    <?php if (isset($success)) echo "<p style='color: green;'>$success</p>"; ?>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>

    <form method="POST" action="">
        <label for="doctor_id">Select Doctor:</label>
        <select name="doctor_id" required>
            <option value="">--Choose--</option>
            <?php while ($row = mysqli_fetch_assoc($doctors)) { ?>
                <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
            <?php } ?>
        </select><br><br>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" name="appointment_date" required><br><br>

        <label for="reason">Reason:</label><br>
        <textarea name="reason" rows="
