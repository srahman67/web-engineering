<!DOCTYPE html>
<html>
<head>
    <title>DIU Student System</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }
        header {
            background: #004080;
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background: #e0e0e0;
            padding: 10px;
            text-align: center;
        }
        nav a {
            margin: 0 15px;
            padding: 10px 20px;
            background:rgb(107, 149, 177);
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
        }
        nav a:hover {
            background:rgb(117, 151, 173);
        }
        .container {
            margin: 50px auto;
            max-width: 600px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px #ccc;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        p {
            color: #555;
        }
    </style>
</head>
<body>

<header>
    <h1>DIU Student Registration System</h1>
</header>

<nav>
    <a href="add_student.php">Add Student</a>
    <a href="student_list.php">Student List</a>
    <a href="enroll_course.php">Enroll in Course</a>
    <a href="enrollment_history.php">Enrollment History</a>
</nav>

<div class="container">
    <h2>Welcome!</h2>
    <p>This system allows you to manage student records, course enrollments, and view enrollment history.</p>
</div>

</body>
</html>
