<?php
session_start();
require_once _DIR_ . '/vendor/autoload.php';

use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

function sendEmailWithSymfonyMailer($firstName, $lastName, $email, $mobile, $subject, $message): string
{
    $dsn = 'smtp://kmsr2524@gmail.com:krrbstbxflxsillp@smtp.gmail.com:587'; // Replace with your SMTP DSN
    $transport = Transport::fromDsn($dsn);
    $mailer = new Mailer($transport);

    $emailMessage = (new Email())
        ->from('kmsr2524@gmail.com') // Replace with your verified sender
        ->to('kaustubh.mishra22@gmail.com') // Replace with your recipient
        ->subject($subject)
        ->html("
            <p><strong>First Name:</strong> $firstName</p>
            <p><strong>Last Name:</strong> $lastName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Mobile:</strong> $mobile</p>
            <p><strong>Message:</strong><br>$message</p>
        ");

    try {
        $mailer->send($emailMessage);
        return "✅ Email sent successfully!";
    } catch (\Exception $e) {
        return "❌ Failed to send email: " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $response = sendEmailWithSymfonyMailer(
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['telephone'],
        $_POST['subject'],
        $_POST['comments']
    );
    echo "<div style='padding: 20px; background: #f0f0f0;'>$response</div>";
//header("Location: contact.php?response1=" . urlencode($response));
//exit;

session_start(); // Start session to store the message
$_SESSION['response1'] = $response;
header("Location: contact.php"); // Clean redirect
exit;
}
?>
