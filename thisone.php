<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    require 'vendor/autoload.php';
    
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;
    $mail->Host = 'smtp.hostinger.com';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username = 'example@homework.romarioburke.com';
    $mail->Password = 'Katarina1';
    $mail->setFrom('example@homework.romarioburke.com', 'Romario Burke');
    $mail->addReplyTo('example@homework.romarioburke.com', 'Who knows');
    $mail->addAddress('romari123456789@gmail.com', 'random tag');
    $mail->Subject = 'retry';
    //$mail->msgHTML(file_get_contents('message.html'), __DIR__);
    $mail->Body = 'This is a plain text message body';
    //$mail->addAttachment('test.txt');
    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'The email message was sent.';
    }
?>
