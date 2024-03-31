<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motivation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];

// SQL query to insert data into the database
$sql = "INSERT INTO users (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')";

if ($conn->query($sql) === TRUE) {
	header("refresh:3;url=home.php");
    echo "Information received successfully, you will be redirected back to home page shortly .";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
