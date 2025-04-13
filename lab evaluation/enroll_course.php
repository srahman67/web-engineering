<?php
$conn = new mysqli('localhost', 'root', '', 'diu_lab');
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = trim($_POST['student_id']);
    $course_code = trim($_POST['course_code']);

    if (!empty($student_id) && !empty($course_code)) {
        $stmt = $conn->prepare("INSERT INTO enrollments (student_id, course_code, course_title, semester) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $student_id, $_POST['course_code'], $_POST['course_title'], $_POST['semester']);
        $stmt->execute();
        $message = "<div class='success'>Enrollment successful.</div>";
    } else {
        $message = "<div class='error'>Student ID and Course Code are required fields.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Enrollment</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        header { background: #004080; color: white; text-align: center; padding: 20px 0; }
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
        nav a:hover { background: #2980b9; }
        .container {
            max-width: 700px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h2 { margin-bottom: 20px; color: #333; }
        form label { display: block; margin-bottom: 6px; font-weight: bold; }
        form input, form select {
            width: 100%; padding: 10px; margin-bottom: 20px;
            border-radius: 5px; border: 1px solid #ccc;
        }
        form input[type="submit"] {
            background: #3498db; color: white; cursor: pointer; width: auto;
        }
        form input[type="submit"]:hover { background: #2980b9; }
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
    <h1>Course Enrollment</h1>
</header>

<nav>
    <a href="add_student.php">Add Student</a>
    <a href="student_list.php">Student List</a>
    <a href="enroll_course.php">Enroll in Course</a>
    <a href="enrollment_history.php">Enrollment History</a>
</nav>

<div class="container">
    <h2>Enroll in a Course</h2>
    <?= $message ?>
    <form method="post">
        <label for="student_id">Student ID *</label>
        <input type="text" name="student_id" id="student_id" required>

        <label for="course_code">Course Code *</label>
        <input type="text" name="course_code" id="course_code" required>

        <label for="course_title">Course Title</label>
        <input type="text" name="course_title" id="course_title">

        <label for="semester">Semester</label>
        <select name="semester" id="semester">
            <option value="">-- Select Semester --</option>
            <option>Spring</option>
            <option>Summer</option>
            <option>Fall</option>
        </select>

        <input type="submit" value="Enroll">
    </form>
</div>

</body>
</html>
