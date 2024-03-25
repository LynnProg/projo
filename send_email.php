<?php
// Database connection
$servername = "localhost"; // Change to your MySQL server name
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "motivation"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get quote from POST request
$quote = $_POST['quote'];

// Retrieve registered emails from users table
$sql = "SELECT email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Loop through each row and send the quote to the email
    while($row = $result->fetch_assoc()) {
        $to = $row["email"];
        $subject = "Motivational Quote";
        $message = "Here is your daily motivational quote: \n\n" . $quote;
        $headers = "From: your_email@example.com"; // Change to your email address

        // Send email
        if (mail($to, $subject, $message, $headers)) {
            echo "Quote sent to: " . $to . "<br>";
        } else {
            echo "Failed to send quote to: " . $to . "<br>";
        }
    }
} else {
    echo "No registered users found.";
}

// Close connection
$conn->close();
?>
