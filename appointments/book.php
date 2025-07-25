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

    try {
        $stmt = $conn->prepare("INSERT INTO appointments (patient_id, doctor_id, appointment_date, reason) 
                                VALUES (:patient_id, :doctor_id, :appointment_date, :reason)");
        $stmt->execute([
            ':patient_id' => $patient_id,
            ':doctor_id' => $doctor_id,
            ':appointment_date' => $appointment_date,
            ':reason' => $reason
        ]);
        $success = "Appointment booked successfully!";
         header('Location:view.php');

        
    } catch (PDOException $e) {
        $error = "Error booking appointment: " . $e->getMessage();
    }
}

// Fetch all doctors for dropdown
$stmt = $conn->prepare("SELECT id, name FROM doctors");
$stmt->execute();
$doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            <?php foreach ($doctors as $row) { ?>
                <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
            <?php } ?>
        </select><br><br>

        <label for="appointment_date">Appointment Date:</label>
        <input type="date" name="appointment_date" required><br><br>

        <label for="reason">Reason:</label><br>
        <textarea name="reason" rows="4" cols="40" required></textarea><br><br>

        <input type="submit" value="Book Appointment">
    </form>
</body>
</html>
