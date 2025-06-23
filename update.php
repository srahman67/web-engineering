<?php
include 'students.php';

// Retrieve the student index
$no = $_POST['no'];

// Update the student information with new fields
$students[$no] = [
    'name' => $_POST['name'], 
    'id' => $_POST['id'], 
    'section' => $_POST['section'], 
    'courses' => $_POST['courses'] // Storing courses as a comma-separated string
];

// Save the updated student data
saveData($students);

// Redirect back to the main page
header("Location: index.php");
?>
