<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <style>
        *{
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group button {
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Contact Form</h2>
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile:</label>
                <input type="text" id="mobile" name="mobile" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>

    <?php
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    // // Load Composer's autoloader
    // require 'vendor/autoload.php';

    // // Function to send email
    // function sendEmail($firstName, $lastName, $email, $contactNo, $subject, $message)
    // {
    //     $mail = new PHPMailer(true);

    //     try {
    //         // Server settings
    //         $mail->isSMTP();
    //         $mail->Host = 'smtp.gmail.com';
    //         $mail->SMTPAuth = true;
    //         $mail->Username = 'kmsr2524@gmail.com'; // Replace with your Gmail address
    //         $mail->Password = 'krrb stbx flxs illp'; // Replace with your Gmail password
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //         $mail->Port = 587;

    //         // Additional options
    //         $mail->SMTPOptions = array(
    //             'ssl' => array(
    //                 'verify_peer' => false,
    //                 'verify_peer_name' => false,
    //                 'allow_self_signed' => true,
    //             ),
    //         );

    //         // Recipients
    //         $mail->setFrom($email, "$firstName $lastName");
    //         $mail->addAddress('kmsr2524@gmail.com'); // Replace with the actual recipient email address
    //         // Content
    //         $mail->isHTML(true);
    //         $mail->Subject = $subject;
    //         $mail->Body = "
    //         <html>
    //         <head>
    //             <title>$subject</title>
    //         </head>
    //         <body>
    //             <p><strong>First Name:</strong> $firstName</p>
    //             <p><strong>Last Name:</strong> $lastName</p>
    //             <p><strong>Email:</strong> $email</p>
    //             <p><strong>Contact No:</strong> $contactNo</p>
    //             <p><strong>Message:</strong></p>
    //             <p>$message</p>
    //         </body>
    //         </html>
    //         ";

    //         // Send email
    //         $mail->send();
    //         echo 'Email sent successfully!';
    //     } catch (Exception $e) {
    //         echo "Failed to send email. Mailer Error: {$mail->ErrorInfo}";
    //     }
    // }

    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //     $firstName = $_POST['firstName'];
    //     $lastName = $_POST['lastName'];
    //     $email = $_POST['email'];
    //     $mobile = $_POST['mobile'];
    //     $message = $_POST['message'];

    //     // Call the sendEmail function
    //     sendEmail($firstName, $lastName, $email, $mobile, "Contact Form Submission", $message);

    //     echo "<div class='container'><p>Thank you, $firstName! Your message has been sent.</p></div>";
    // }

<?php

require 'vendor/autoload.php';

use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;

$logOutput = "";

function logMessage($message)
{
    global $logOutput;
    $timestamp = date('Y-m-d H:i:s');
    $logOutput .= "<p><strong>[$timestamp]</strong> $message</p>";
}

function sendEmail($firstName, $lastName, $email, $contactNo, $subject, $message)
{
    logMessage("Preparing to send email from $email ($firstName $lastName)");

    $dsn = 'smtp://kmsr2425@gmail.com:your_app_password@smtp.gmail.com:587';
    logMessage("Using DSN: smtp://your_email@gmail.com:***@smtp.gmail.com:587");

    $transport = Transport::fromDsn($dsn);
    $mailer = new Mailer($transport);

    $htmlBody = "
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
        </html>
    ";

    logMessage("Email body prepared.");

    $emailMessage = (new Email())
        ->from('your_email@gmail.com')
        ->replyTo($email)
        ->to('your_target_email@example.com')
        ->subject($subject)
        ->html($htmlBody);

    try {
        $mailer->send($emailMessage);
        logMessage("✅ Email sent successfully to your_target_email@example.com");
        echo "<div class='container'><p>Thank you, $firstName! Your message has been sent.</p></div>";
    } catch (\Exception $e) {
        logMessage("❌ Failed to send email: " . $e->getMessage());
        echo "<div class='container'><p>Failed to send email. Error: {$e->getMessage()}</p></div>";
    }
}

$request = Request::createFromGlobals();

if ($request->isMethod('POST')) {
    $firstName = $request->request->get('firstName');
    $lastName = $request->request->get('lastName');
    $email = $request->request->get('email');
    $contactNo = $request->request->get('mobile');
    $message = $request->request->get('message');

    logMessage("Received POST data: firstName=$firstName, lastName=$lastName, email=$email, mobile=$contactNo");

    sendEmail($firstName, $lastName, $email, $contactNo, "Contact Form Submission", $message);

    echo "<hr><div class='log-output'><h3>Debug Log:</h3>$logOutput</div>";
}
?>
    ?>
</body>

</html>
