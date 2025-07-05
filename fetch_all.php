<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$database = "users"; // Change if your DB is named differently

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all data from the users table
$sql = "SELECT * FROM users";  // Gets all rows and columns
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <style>
        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #444;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>All User Records</h2>
    <table>
        <tr>
            <?php
            // Show column headers dynamically
            if ($result->num_rows > 0) {
                // Fetch the first row to get column names
                $firstRow = $result->fetch_assoc();
                foreach ($firstRow as $col => $val) {
                    echo "<th>" . htmlspecialchars($col) . "</th>";
                }
                echo "</tr><tr>";

                // Output the first row again
                foreach ($firstRow as $val) {
                    echo "<td>" . htmlspecialchars($val) . "</td>";
                }

                // Output the rest of the rows
                while ($row = $result->fetch_assoc()) {
                    echo "</tr><tr>";
                    foreach ($row as $val) {
                        echo "<td>" . htmlspecialchars($val) . "</td>";
                    }
                }
            } else {
                echo "<td colspan='100%'>No records found.</td>";
            }
            ?>
        </tr>
    </table>
</body>
</html>

<?php
$conn->close();
?>
