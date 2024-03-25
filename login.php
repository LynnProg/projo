<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "motivation"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate user credentials
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // User found, redirect to home page or any other page
        $_SESSION["loggedin"] = true;
        header("Location: home.php");
        exit();
    } else {
        // Invalid credentials
        echo "Invalid email or password.";
    }
}

$conn->close();
?>
