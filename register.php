<?php
// Start session
session_start();

// Database connection
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$username = "root"; // Change this if you have a different username for your MySQL server
$password = ""; // Change this if you have set a password for your MySQL server
$database = "motivation";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Encrypt password (You should use more secure methods for password hashing in production)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL query to insert user data into 'users' table
$sql = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    // Registration successful, set session variable and redirect to dash.php
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email; // You may store other user data in session if needed
    header("Location: dash.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
