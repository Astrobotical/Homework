<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'no-reply@homework.romarioburke.com';
    $mail->Password = 'Mishaivey11';
    $mail->setFrom('no-reply@homework.romarioburke.com', 'Romario burke');
    $mail->addReplyTo('test@hostinger-tutorials.com', 'Your Name');
    $mail->addAddress('Romari123456789@gmail.com', 'Next me');
    $mail->Subject = 'Testing PHPMailer';
    //il->msgHTML(file_get_contents('message.html'), __DIR__);
    $mail->Body = 'This is a plain text message body';
    //$mail->addAttachment('test.txt');
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'The email message was sent.';
    }
?>