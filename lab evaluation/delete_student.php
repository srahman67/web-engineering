<?php
$conn = new mysqli('localhost', 'root', '', 'diu_lab');

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete student by ID
    $conn->query("DELETE FROM students WHERE id = $id");

    // Redirect back to student list
    header("Location: student_list.php");
    exit;
} else {
    echo "No student ID provided!";
}
?>
