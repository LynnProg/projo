<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer autoload file
require 'vendor/autoload.php';

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "motivation";

// Sender's email and name
$fromEmail = "lynnchepngeno45@gmail.com";
$fromName = "Lynn";

// SMTP configuration
$smtpUsername = "lynnchepngeno45@gmail.com";
$smtpPassword = "tgvc ocqu yhcf dwwh"; // Use the provided SMTP password
$smtpHost = "smtp.gmail.com";
$smtpPort = 587; // TLS port

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the text entered by the user
    $body = $_POST['message'];
    $subject = $_POST['subject'];

    // Create PHPMailer object
    $mail = new PHPMailer(true);

    try {
        // Database connection
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement to select email addresses from the database
        $stmt = $conn->prepare("SELECT email FROM users");
        $stmt->execute();

        // Fetch all email addresses from the database
        $recipients = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Loop through each recipient and send the email
        foreach ($recipients as $recipientEmail) {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = $smtpHost;
            $mail->SMTPAuth = true;
            $mail->Username = $smtpUsername;
            $mail->Password = $smtpPassword;
            $mail->SMTPSecure = 'tls';
            $mail->Port = $smtpPort;

            // Email content
            $mail->setFrom($fromEmail, $fromName);
            $mail->addAddress($recipientEmail);
            $mail->Subject = $subject;
            $mail->Body = $body;

            // Send email
            $mail->send();
        }

        echo "Email sent successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } catch (Exception $e) {
        echo "Error: " . $mail->ErrorInfo;
    }

    // Close the database connection
    $conn = null;
}
?>
