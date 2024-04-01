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
    $sql = "SELECT id, email, password, is_admin FROM users WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password is correct, set session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["user_id"] = $row['id'];

            // Regenerate session ID to prevent session fixation
            session_regenerate_id();

            // Redirect to appropriate page
            if ($row['is_admin'] == 1) {
                header("Location: admin.php");
            } else {
                header("Location: dash.php");
            }
            exit();
        }
    }

    // Invalid credentials
    $error = "Invalid email or password.";
}

$conn->close();
?>