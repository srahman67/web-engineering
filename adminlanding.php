<!-- index.php - Main Page -->
<?php include 'students.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
            background-color: #f8f9fa;
        }
        h1, h3 {
            color: #333;
        }
        form {
            width: 30%;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            margin-top: 15px;
            padding: 10px;
            background: rgb(0, 32, 67);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: rgb(0, 32, 67);
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }
        th {
            background: rgb(0, 32, 67);
            color: white;
        }
        a {
            padding: 5px 10px;
            text-decoration: none;
            background: #28a745;
            color: white;
            border-radius: 5px;
            margin-right: 5px;
        }
        a.delete {
            background: #dc3545;
        }
        a:hover {
            opacity: 0.8;
        }
        h1{
            background-color:rgb(0, 32, 67);
            color: #f8f9fa;
            padding: 10px 0px;
        }
    </style>
</head>
<body>
    <h1>Student Registration Management System</h1>
    <h3>Add Student</h3>
    <form action="add.php" method="POST">
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="id" placeholder="Student ID" required>
        <input type="text" name="section" placeholder="Section" required>
        <input type="text" name="courses" placeholder="Courses (comma-separated)" required>
        <button type="submit">Assign</button>
    </form>
    
    <h3>Student List</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>ID</th>
            <th>Section</th>
            <th>Courses</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($students as $index => $student) { ?>
            <tr>
                <td><?php echo $index + 1; ?></td>
                <td><?php echo $student['name']; ?></td>
                <td><?php echo $student['id']; ?></td>
                <td><?php echo $student['section']; ?></td>
                <td><?php echo $student['courses']; ?></td>
                <td>
                    <a href='edit.php?no=<?php echo $index; ?>'>Update</a>
                </td>
                <td>
                <a href='delete.php?no=<?php echo $index; ?>' class="delete">Delete</a>
                <td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>