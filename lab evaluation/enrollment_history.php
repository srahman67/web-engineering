<?php
$conn = new mysqli('localhost', 'root', '', 'diu_lab');
$history = [];
$searched = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = $_POST['student_id'];
    $searched = true;

    $stmt = $conn->prepare("SELECT course_code, course_title, semester, grade FROM enrollments WHERE student_id = ?");
    $stmt->bind_param("s", $student_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $history = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enrollment History</title>
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
            max-width: 800px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h2 { margin-bottom: 20px; color: #333; }
        form input[type="text"] {
            width: 60%;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        form input[type="submit"] {
            padding: 10px 20px;
            background: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        form input[type="submit"]:hover { background: #2980b9; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
        .no-data {
            padding: 15px;
            background: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <h1>Enrollment History</h1>
</header>

<nav>
    <a href="add_student.php">Add Student</a>
    <a href="student_list.php">Student List</a>
    <a href="enroll_course.php">Enroll in Course</a>
    <a href="enrollment_history.php">Enrollment History</a>
</nav>

<div class="container">
    <h2>Search by Student ID</h2>
    <form method="post">
        <input type="text" name="student_id" placeholder="Enter Student ID" required>
        <input type="submit" value="Search">
    </form>

    <?php if ($searched): ?>
        <?php if (count($history) > 0): ?>
            <table>
                <tr><th>Course Code</th><th>Course Title</th><th>Semester</th><th>Grade</th></tr>
                <?php foreach ($history as $row): ?>
                <tr>
                    <td><?= $row['course_code'] ?></td>
                    <td><?= $row['course_title'] ?></td>
                    <td><?= $row['semester'] ?></td>
                    <td><?= $row['grade'] ?? 'N/A' ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <div class="no-data">No data available.</div>
        <?php endif; ?>
    <?php endif; ?>
</div>

</body>
</html>
