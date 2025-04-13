<?php
$conn = new mysqli('localhost', 'root', '', 'diu_lab');
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (!empty($name) && !empty($email)) {
        $stmt = $conn->prepare("INSERT INTO students (name, email, student_id, department, major, dob, address) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $email, $_POST['student_id'], $_POST['department'], $_POST['major'], $_POST['dob'], $_POST['address']);
        $stmt->execute();
        $message = "<div class='success'>Student registered successfully.</div>";
    } else {
        $message = "<div class='error'>Name and Email are required fields.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0; padding: 0;
            background: #f4f4f4;
        }
        header {
            background: #004080;
            color: white;
            text-align: center;
            padding: 20px 0;
        }
        nav {
            background: #e0e0e0;
            padding: 10px;
            text-align: center;
        }
        nav a {
            margin: 0 10px;
            padding: 10px 20px;
            background: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }
        nav a:hover {
            background: #2980b9;
        }
        .container {
            max-width: 700px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        form label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        form input, form select, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        form input[type="submit"] {
            background: #3498db;
            color: white;
            cursor: pointer;
            width: auto;
        }
        form input[type="submit"]:hover {
            background: #2980b9;
        }
        .error {
            background: #f8d7da;
            color: #842029;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #f5c2c7;
            border-radius: 5px;
        }
        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #badbcc;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<header>
    <h1>Student Registration</h1>
</header>

<nav>
    <a href="add_student.php">Add Student</a>
    <a href="student_list.php">Student List</a>
    <a href="enroll_course.php">Enroll in Course</a>
    <a href="enrollment_history.php">Enrollment History</a>
</nav>

<div class="container">
    <h2>Register New Student</h2>
    <?= $message ?>
    <form method="post">
        <label for="name">Name *</label>
        <input type="text" name="name" id="name" required>

        <label for="email">Email *</label>
        <input type="email" name="email" id="email" required>

        <label for="student_id">Student ID</label>
        <input type="text" name="student_id" id="student_id">

        <label for="department">Department</label>
        <select name="department" id="department">
            <option value="">-- Select Department --</option>
            <option value="CSE">CSE</option>
            <option value="EEE">EEE</option>
            <option value="BBA">BBA</option>
        </select>

        <label for="major">Major</label>
        <select name="major" id="major">
            <option value="">-- Select Major --</option>
            <option value="Software">Software</option>
            <option value="Hardware">Hardware</option>
            <option value="Software">CSE</option>
           
        </select>

        <label for="dob">Date of Birth</label>
        <input type="date" name="dob" id="dob">

        <label for="address">Address</label>
        <textarea name="address" id="address" rows="4"></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
