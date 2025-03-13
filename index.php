<!DOCTYPE html>
<html>
<head>
    <title>S4 Computer Engineering Results</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 95%; margin: 0 auto; }
        .error { color: red; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 20px; }
        .header img { max-width: 100px; height: auto; }

        input[type="text"] {
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

        @media (min-width: 768px) {
            .container {
                width: 80%;
            }
            input[type="text"] {
                width: auto;
                max-width: 300px;
            }
             button {
                width: auto;
             }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT0pJeo2Z8yv_7jYXkXVTv4-2O-j3PTnhLQbA&s" alt="Logo">
            <h1>S4 Computer Engineering Results</h1>
        </div>
        <form method="post">
            <label for="prn">Enter PRN:</label>
            <input type="text" name="prn" id="prn" required>
            <button type="submit">View Result</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include 'config.php';
            $prn = mysqli_real_escape_string($conn, $_POST['prn']);

            $sql = "SELECT * FROM results WHERE prn = '$prn'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)){
                    echo "<h2>Result for PRN: " . $row['prn'] . "</h2>";
                    echo "<table>";
                    echo "<tr><th>PRN</th><td>" . $row['prn'] . "</td></tr>";
                    echo "<tr><th>Name</th><td>" . $row['name'] . "</td></tr>";
                    echo "<tr><th>Internal Type</th><td>" . $row['internal_type'] . "</td></tr>";
                    echo "<tr><th>Object Oriented Programming</th><td>" . $row['oop'] . "</td></tr>";
                    echo "<tr><th>Computer Communication and Networks</th><td>" . $row['ccn'] . "</td></tr>";
                    echo "<tr><th>Data Structures</th><td>" . $row['ds'] . "</td></tr>";
                    echo "<tr><th>Community Skills in Indian Knowledge System</th><td>" . $row['csiks'] . "</td></tr>";
                   echo "<tr><th>Status</th><td>". $row['status'] . "</td></tr>";
                    echo "</table>";
                }
            } else {
                echo "<p class='error'>No results found for this PRN.</p>";
            }
            mysqli_close($conn);
        }
        ?>
    </div>
</body>
</html>