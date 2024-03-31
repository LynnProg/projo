<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "motivation";

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
        // User found
        $row = $result->fetch_assoc();
        $_SESSION["loggedin"] = true;

        // Check if the logged-in user is an admin
        if ($row['is_admin'] == 1) {
            // Redirect admin to admin.php
            echo "Welcome Admin";
            header("refresh:3;url=motivation.html");
            exit();
        } else {
            // Redirect non-admin to home.php
            header("Location: home.php");
            exit();
        }
    } else {
        // Invalid credentials
        echo "Invalid email or password.";
    }
}

$conn->close();
