<?php
session_start();

// Hardcoded admin credentials (replace with database or secure method)
$adminUsername = "admin";
$adminPassword = "admin123";

// Get the submitted username and password
$username = $_POST['username'];
$password = $_POST['password'];

if ($username === $adminUsername && $password === $adminPassword) {
    $_SESSION['admin_logged_in'] = true;
    header("Location: admin_panel.php");
} else {
    echo "<script>alert('Invalid credentials!'); window.location.href='admin_login.php';</script>";
}
?>
