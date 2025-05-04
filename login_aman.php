<?php
$conn = mysqli_connect("localhost", "root", "", "database_login");

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        echo "<div class='message success'>Login Berhasil (Secure)!</div>";
    } else {
        echo "<div class='message error'>Username atau Password salah!</div>";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Aman</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #2193b0, #6dd5ed);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2193b0;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #2193b0;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #19779e;
        }

        .message {
            text-align: center;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <form method="POST">
        <h2>Login Aman</h2>
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>
