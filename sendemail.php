<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'emailserver/Exception.php';
require 'emailserver/PHPMailer.php';
require 'emailserver/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your_email@gmail.com';  // Your Gmail address
    $mail->Password   = 'your_password';         // Your 2 setup verification Gmail password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Recipients
    $mail->setFrom('your_email@gmail.com', 'Website Contact Form');
    $mail->addAddress('your_email@gmail.com');  // Add a recipient (This is your email where you will receive messages)

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'New Contact Request from Website';
    $mail->Body    = "Name: {$_POST['username']}<br>Email: {$_POST['email']}<br>Message: {$_POST['message']}";
    $mail->AltBody = "Name: {$_POST['username']}\nEmail: {$_POST['email']}\nMessage: {$_POST['message']}";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>