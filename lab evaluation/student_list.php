<?php
$conn = new mysqli('localhost', 'root', '', 'diu_lab');
$result = $conn->query("SELECT id, name, student_id, department, major, email FROM students"); // added 'id'
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
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
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h2 { margin-bottom: 20px; color: #333; }
        table {
            width: 100%;
            border-collapse: collapse;
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
        }
        .action-links a {
            margin-right: 10px;
            text-decoration: none;
            font-weight: bold;
        }
        .edit-link { color: green; }
        .delete-link { color: red; }
    </style>
</head>
<body>

<header>
    <h1>Student List</h1>
</header>

<nav>
    <a href="add_student.php">Add Student</a>
    <a href="student_list.php">Student List</a>
    <a href="enroll_course.php">Enroll in Course</a>
    <a href="enrollment_history.php">Enrollment History</a>
</nav>

<div class="container">
    <h2>All Registered Students</h2>
    <?php if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Student ID</th>
            <th>Department</th>
            <th>Major</th>
            <th>Email</th>
            <th>Action</th> <!-- Added this column -->
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['student_id'] ?></td>
            <td><?= $row['department'] ?></td>
            <td><?= $row['major'] ?></td>
            <td><?= $row['email'] ?></td>
            <td class="action-links">
                <a href="edit_student.php?id=<?= $row['id'] ?>" class="edit-link">Edit</a>
                <a href="delete_student.php?id=<?= $row['id'] ?>" class="delete-link" onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
    <div class="no-data">No data in the table.</div>
    <?php endif; ?>
</div>

</body>
</html>
