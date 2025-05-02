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
        echo "SMTP enabled<br>";

        $mail->Host = 'smtp.gmail.com';
        echo "Host set<br>";

        $mail->SMTPAuth = true;
        echo "SMTPAuth enabled<br>";

        $mail->Username = 'kmsr2524@gmail.com'; // REPLACE THIS before deployment
        echo "Username set<br>";

        $mail->Password = 'Manu@1234'; // NEVER hardcode sensitive data in production
        echo "Password set<br>";

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        echo "Encryption set<br>";

        $mail->Port = 587;
        echo "Port set<br>";

        // Recipients
        $mail->setFrom($email, "$firstName $lastName");
        echo "Sender set<br>";

        $mail->addAddress('recipient@example.com'); // Update this
        echo "Recipient added<br>";

        // Content
        $mail->isHTML(true);
        echo "HTML mode enabled<br>";

        $mail->Subject = $subject;
        echo "Subject set<br>";

        $mail->Body   = "
        <html>
        <head><title>$subject</title></head>
        <body>
            <p><strong>First Name:</strong> $firstName</p>
            <p><strong>Last Name:</strong> $lastName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Contact No:</strong> $contactNo</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        </body>
        </html>";
        echo "Body set<br>";

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
