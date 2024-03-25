<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer autoload file
require 'vendor/autoload.php';

// Sender's email and name
$fromEmail = "lynnchepngeno45@gmail.com";
$fromName = "Lynn";

// Recipient's email address
$toEmail = "kida8152@gmail.com"; // Change this to the recipient's email address

// Subject and body of the email
$subject = "Test Email via Gmail SMTP";
$body = "This is a test email sent via Gmail's SMTP server.";

// SMTP configuration
$smtpUsername = "lynnchepngeno45@gmail.com";
$smtpPassword = "tgvc ocqu yhcf dwwh"; // Use the provided SMTP password
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
