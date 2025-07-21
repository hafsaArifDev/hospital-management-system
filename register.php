<?php
require_once "config/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_type = $_POST['user_type'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if ($user_type === "patient") {
        $stmt = $conn->prepare("INSERT INTO patients (name, email, password) VALUES (?, ?, ?)");
    } else {
        $stmt = $conn->prepare("INSERT INTO doctors (name, email, password) VALUES (?, ?, ?)");
    }

    if ($stmt->execute([$name, $email, $password])) {
        echo "Registration successful!";
    } else {
        echo "Error occurred during registration.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h2>User Registration</h2>
    <form method="POST">
        <label>User Type:</label>
        <select name="user_type" required>
            <option value="patient">Patient</option>
            <option value="doctor">Doctor</option>
        </select><br><br>

        <label>Name:</label>
        <input type="text" name="name" required /><br><br>

        <label>Email:</label>
        <input type="email" name="email" required /><br><br>

        <label>Password:</label>
        <input type="password" name="password" required /><br><br>

        <button type="submit">Register</button>
    </form>
</body>
</html>
