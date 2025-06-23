<?php
include 'students.php';

// Adding the new student with name, id, section, and courses
$students[] = [
    'name' => $_POST['name'], 
    'id' => $_POST['id'], 
    'section' => $_POST['section'], 
    'courses' => $_POST['courses'] // Courses will be stored as a comma-separated string
];

// Save the updated student data
saveData($students);

// Redirect back to the main page
header("Location: index.php");
?>
