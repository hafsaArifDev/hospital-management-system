<?php
session_start();
require_once "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST['user_type'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query preparation
    if ($user_type === "patient") {
        $stmt = $conn->prepare("SELECT * FROM patients WHERE email = ?");
    } elseif ($user_type === "doctor") {
        $stmt = $conn->prepare("SELECT * FROM doctors WHERE email = ?");
    } else {
        $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ?");
    }

    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_type'] = $user_type;
        $_SESSION['user_role'] = $user_type; // ✅ اب user_role بھی سیٹ کیا جا رہا ہے

        // ✅ متعلقہ ڈیش بورڈ پر ری ڈائریکٹ کریں
        if ($user_type === "patient") {
            header("Location: dashboard/patients.php");
        } elseif ($user_type === "doctor") {
            header("Location: dashboard/doctors.php");
        } else {
            header("Location: dashboard/admin.php");
        }
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>User Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST">
        <label>User Type:</label>
        <select name="user_type" required>
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
            <option value="admin">Admin</option>
        </select><br><br>

        <label>Email:</label>
        <input type="email" name="email" required /><br><br>

        <label>Password:</label>
        <input type="password" name="password" required /><br><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
