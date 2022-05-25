<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';
Class General
{
    function respond(&$Email, &$Subject, &$Firstname, &$Lastname)
    {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 3;
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = 'example@homework.romarioburke.com';
        $mail->Password = 'Katarina1';
        $Name = ".$Firstname.  .$Lastname.";
        $mail->setFrom('example@homework.romarioburke.com', "Romario Burke's Homework Mailer");
        $mail->addAddress($Email, $Name);
        $mail->Subject = $Subject;
        $mail->Body =  <<<EOT
Hey ! .$Name., <br>
The contact form has been  submitted!
EOT;
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'The email message was sent.';
        }
    }


}

?>