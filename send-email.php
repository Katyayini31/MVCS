<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
 
// Load Composer's autoloader
require 'vendor/autoload.php';
 
// Function to send email
function sendEmail($firstName, $lastName, $email, $contactNo, $subject, $message) {
    $mail = new PHPMailer(true);
 
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@gmail.com'; // Replace with your Gmail address
        $mail->Password = 'your-email-password'; // Replace with your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
 
        // Recipients
        $mail->setFrom($email, "$firstName $lastName");
        $mail->addAddress('recipient@example.com'); // Replace with the actual recipient email address
 
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body   = "
        <html>
        <head>
            <title>$subject</title>
        </head>
        <body>
            <p><strong>First Name:</strong> $firstName</p>
            <p><strong>Last Name:</strong> $lastName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Contact No:</strong> $contactNo</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        </body>
        </html>
        ";
 
        // Send email
        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo "Failed to send email. Mailer Error: {$mail->ErrorInfo}";
    }
}
 
// Example usage
$firstName = 'John';
$lastName = 'Doe';
$email = 'john.doe@example.com';
$contactNo = '1234567890';
$subject = 'Test Subject';
$message = 'This is a test message.';
 
sendEmail($firstName, $lastName, $email, $contactNo, $subject, $message);
?>
