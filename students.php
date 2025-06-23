<?php
// students.php - Data Storage (Array-based)
$students = json_decode(file_get_contents('students.json'), true) ?? [];
function saveData($students) {
    file_put_contents('students.json', json_encode($students, JSON_PRETTY_PRINT));
}
?>