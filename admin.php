<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - S4 Computer Engineering Results</title>
    <style>
        body { font-family: sans-serif; }
        .container {  margin: 0 auto; }
        .error { color: red; }
        label { display: block; margin-bottom: 5px; }

        .logout {  margin-bottom:20px; }
        .header { text-align: center; margin-bottom: 20px; }
        .header img { max-width: 100px; height: auto; }

        .container{width:95%}
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .logout {
            text-align:center;
            display:block;
            width:100%;
        }

        @media (min-width: 768px) {
            .container {
                width: 80%;
            }
            input[type="text"], input[type="number"], select {
                width: 100%;
            }

             button {
                width: auto;
            }
            .logout{
                float:right;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0pJeo2Z8yv_7jYXkXVTv4-2O-j3PTnhLQbA&s" alt="Logo">
            <h1>S4 Computer Engineering Results</h1>
            <h3>Admin Panel</h3>
            <a href="logout.php" class="logout">Logout</a>
        </div>


        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'config.php';
            $prn = mysqli_real_escape_string($conn, $_POST['prn']);
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $internal_type = $_POST['internal_type'];
            $oop = (int)$_POST['oop'];
            $ccn = (int)$_POST['ccn'];
            $ds = (int)$_POST['ds'];
            $csiks = (int)$_POST['csiks'];

            $totalMarks = $oop + $ccn + $ds + $csiks;
            $status = ($oop >= 8 && $ccn >= 8 && $ds >= 8 && $csiks >= 8) ? 'Pass' : 'Fail';

            $sql = "INSERT INTO results (prn, name, internal_type, oop, ccn, ds, csiks, status) VALUES ('$prn', '$name', '$internal_type', $oop, $ccn, $ds, $csiks, '$status')";


            if (mysqli_query($conn, $sql)) {
                echo "<p>Result added successfully!</p>";
            } else {
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
            mysqli_close($conn);
        }
        ?>
        <form method="post">
            <label for="prn">PRN:</label>
            <input type="text" name="prn" id="prn" required>

            <label for="name">Student Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="internal_type">Internal Type:</label>
            <select name="internal_type" id="internal_type" required>
                <option value="1st">1st Internal</option>
                <option value="2nd">2nd Internal</option>
            </select>

            <label for="oop">Object Oriented Programming:</label>
            <input type="number" name="oop" id="oop" min="0" max="20" required>

            <label for="ccn">Computer Communication and Networks:</label>
            <input type="number" name="ccn" id="ccn" min="0" max="20" required>

            <label for="ds">Data Structures:</label>
            <input type="number" name="ds" id="ds" min="0" max="20" required>

            <label for="csiks">Community Skills in Indian Knowledge System:</label>
            <input type="number" name="csiks" id="csiks" min="0" max="20" required>

            <button type="submit">Add Result</button>
        </form>
    </div>
</body>
</html>