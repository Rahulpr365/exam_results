<!DOCTYPE html>
<html>
<head>
    <title>Admin Login - S4 Computer Engineering Results</title>
    <style>
        body { font-family: sans-serif; }
        .container {  margin: 100px auto; }
        .error { color: red; }
        label { display: block; margin-bottom: 5px; }

        button { padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        .header { text-align: center; margin-bottom: 20px; }
        .header img { max-width: 100px; height: auto; }

        .container { width: 95%; }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
       button {width: 100%;}

        @media (min-width: 768px) {
            .container { width: 300px; }
            input[type="text"], input[type="password"]{width:100%;}
             button {width: auto;}
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
             <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0pJeo2Z8yv_7jYXkXVTv4-2O-j3PTnhLQbA&s" alt="Logo">
            <h1>S4 Computer Engineering Results</h1>
            <h3>Admin Login</h3>
        </div>

        <?php
        session_start();
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            header("location: admin.php");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'config.php';
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $sql = "SELECT id FROM users WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) == 1) {
                $_SESSION['loggedin'] = true;
                header("location: admin.php");
                exit;
            } else {
                echo "<p class='error'>Invalid username or password.</p>";
            }
            mysqli_close($conn);
        }
        ?>
        <form method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>