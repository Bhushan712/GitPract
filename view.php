<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "140712";
$database = "users"; // or "sample_db" if that's what you used

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the users table
$sql = "SELECT category_id, name, email, age FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
    <style>
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #eee;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Registered Users</h2>
    <table>
        <tr>
            <th>CATEGORY_ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["category_id"] . "</td>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["age"] . "</td>
                    </tr>";
            }
        } else{
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
