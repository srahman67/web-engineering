<?php
$dataFile = 'data.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $studentId = $_POST['studentId'];

  $student = [
    'firstName' => $firstName,
    'lastName' => $lastName,
    'studentId' => $studentId
  ];

  $students = [];
  if (file_exists($dataFile)) {
    $students = json_decode(file_get_contents($dataFile), true);
  }

  $students[] = $student;
  file_put_contents($dataFile, json_encode($students));

  echo json_encode(['status' => 'success']);
} else {
  echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>
