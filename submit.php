<?php
// Database connection info
$servername = "localhost";
$username = "root"; // use your MySQL user (probably 'root')
$password = "140712";     // use your MySQL password
$database = "sample_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check for connection error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO users (name, email, age) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $name, $email, $age);

// Execute and check result
if ($stmt->execute()) {
    echo "Form submitted and data inserted successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
