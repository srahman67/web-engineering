<?php
$role = $_GET['role'] ?? 'guest';

echo "<h1>Welcome to the Student Management System</h1>";

if ($role == 'admin') {
    echo "<h2>Hello, Admin! You have full access.</h2>";
} elseif ($role == 'student') {
    echo "<h2>Hello, Student! Here is your dashboard.</h2>";
} elseif ($role == 'teacher') {
    echo "<h2>Hello, Teacher! Manage your classes here.</h2>";
} else {
    echo "<h2>Please login to access your account.</h2>";
}
?>
