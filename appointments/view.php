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
              WHERE a.patient_id = '$user_id' 
              ORDER BY a.appointment_date DESC";
} elseif ($role === 'doctor') {
    $query = "SELECT a.*, p.name AS patient_name 
              FROM appointments a 
              JOIN patients p ON a.patient_id = p.id 
              WHERE a.doctor_id = '$user_id' 
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

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<he
