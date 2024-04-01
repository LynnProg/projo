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
$email = $_POST['email'];
$password = $_POST['password'];

// Check if the provided credentials match those of the admin
if ($email === 'lynn@admin.com' && $password === 'admin') {
    // Admin login successful, set session variables
    $_SESSION['loggedin'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['admin'] = true;
    header("Location: admin.php"); // Redirect to dashboard
    exit();
}

// If the provided credentials do not match admin credentials, check the users table
// SQL query to fetch user data based on email
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User found, verify password
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Password is correct, set session variables
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email; // You may store other user data in session if needed
        
        // Check if the user is an admin
        if ($row['is_admin'] == 1) {
            $_SESSION['admin'] = true;
        } else {
            $_SESSION['admin'] = false;
        }
        
        header("Location: dash.php"); // Redirect to dashboard
        exit();
    } else {
        // Password is incorrect
        echo "Invalid email or password";
    }
} else {
    // User not found
    echo "User not found";
}

$conn->close();
?>
