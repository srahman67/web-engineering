<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }
        h2 {
            color: #333;
        }
        form {
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            width: 30%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input {
            width: 80%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background: rgb(0, 32, 67);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: rgb(0, 64, 128);
        }
    </style>
</head>
<body>
    <h2>Login</h2>
    <form action="validate.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
