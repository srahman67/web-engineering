<!-- delete.php - Delete Student -->
<?php
include 'students.php';
array_splice($students, $_GET['no'], 1);
saveData($students);
header("Location: index.php");
?>