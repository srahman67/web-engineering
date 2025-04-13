<?php
$conn = new mysqli('localhost', 'root', '', 'diu_lab');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $student = $conn->query("SELECT * FROM students WHERE id = $id")->fetch_assoc();

    if (!$student) {
        echo "Student not found!";
        exit;
    }
} else {
    echo "No student ID provided!";
    exit;
}

// Handle form submission
if (isset($_POST['update'])) {
    $stmt = $conn->prepare("UPDATE students SET name=?, email=?, student_id=?, department=?, major=?, dob=?, address=? WHERE id=?");
    $stmt->bind_param("sssssssi", $_POST['name'], $_POST['email'], $_POST['student_id'], $_POST['department'], $_POST['major'], $_POST['dob'], $_POST['address'], $id);
    $stmt->execute();
    header("Location: student_list.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; }
        .container {
            max-width: 600px;
            background: white;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h2 { margin-bottom: 20px; }
        label { font-weight: bold; display: block; margin-top: 15px; }
        input, select, textarea {
            width: 100%; padding: 10px;
            margin-top: 5px; border: 1px solid #ccc; border-radius: 5px;
        }
        input[type="submit"] {
            margin-top: 20px;
            background: #3498db; color: white;
            border: none; cursor: pointer;
        }
        input[type="submit"]:hover { background: #2980b9; }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Student Information</h2>
    <form method="post">
        <label>Name *</label>
        <input type="text" name="name" value="<?= $student['name'] ?>" required>

        <label>Email *</label>
        <input type="email" name="email" value="<?= $student['email'] ?>" required>

        <label>Student ID</label>
        <input type="text" name="student_id" value="<?= $student['student_id'] ?>">

        <label>Department</label>
        <input type="text" name="department" value="<?= $student['department'] ?>">

        <label>Major</label>
        <input type="text" name="major" value="<?= $student['major'] ?>">

        <label>Date of Birth</label>
        <input type="date" name="dob" value="<?= $student['dob'] ?>">

        <label>Address</label>
        <textarea name="address"><?= $student['address'] ?></textarea>

        <input type="submit" name="update" value="Update Student">
    </form>
</div>
</body>
</html>
