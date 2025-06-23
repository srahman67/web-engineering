<?php
// Get user input
$username = $_POST['username'];
$password = $_POST['password'];

// Read and decode JSON files
$teachers = json_decode(file_get_contents('teacherpass.json'), true);
$students = json_decode(file_get_contents('studentpass.json'), true);
$admins = json_decode(file_get_contents('adminpass.json'), true);

// Function to validate login and return user type
function validateLogin($userList, $username, $password) {
    foreach ($userList as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            return true;
        }
    }
    return false;
}

// Check login credentials and redirect based on user type
if (validateLogin($teachers, $username, $password)) {
    // Redirect to teacher landing page
    header("Location: teacherlanding.php");
    exit();
} elseif (validateLogin($students, $username, $password)) {
    // Redirect to student landing page
    header("Location: studentlanding.php");
    exit();
} elseif (validateLogin($admins, $username, $password)) {
    // Redirect to admin landing page
    header("Location: adminlanding.php");
    exit();
} else {
    // Redirect back to login with error
    header("Location: login.php?error=invalid_credentials");
    exit();
}
?>
