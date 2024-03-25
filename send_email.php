<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer autoload file
require 'vendor/autoload.php';

// Sender's email and name
$fromEmail = "lynnchepngeno45@gmail.com";
$fromName = "Lynn Chepngeno";

// Recipient's email address
$toEmail = "babyanonymouse2@gmail.com";

// Subject and body of the email
$subject = "Test Email via Gmail SMTP";
$body = "This is a test email sent via Gmail's SMTP server.";

// SMTP configuration
$smtpUsername = "your.email@gmail.com";
$smtpPassword = "tgvc ocqu yhcf dwwh"; // Use the app-specific password generated earlier
$smtpHost = "smtp.gmail.com";
$smtpPort = 587; // TLS port

// Create PHPMailer object
$mail = new PHPMailer(true);

try {
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
    $mail->addAddress($toEmail);
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Send email
    $mail->send();
    echo "Email sent successfully!";
} catch (Exception $e) {
    echo "Error: " . $mail->ErrorInfo;
}
?>
