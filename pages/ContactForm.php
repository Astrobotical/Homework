<?php
    use PHPMailer\PHPMailer\PHPMailer as PHPMailer;
    use PHPMailer\PHPMailer\SMTP as SMTP;
    require __DIR__.'/../vendor/autoload.php';
    
   
$msg = '';
if(isset($_POST['submit'])) {
    global $Firstname, $Lastname, $Email, $Subject,$Message;
    $Firstname = $_POST['firstname'];
    $Lastname = $_POST['lastname'];
    $Email = $_POST['email'];
    $Subject  = $_POST['Subject'];
    $Message  = $_POST['Msg'];
    date_default_timezone_set('Etc/UTC');
 function respond()
    {
        global $Firstname, $Lastname, $Email, $Subject,$Message;
       $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = false;
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
        $mail->Username = 'example@homework.romarioburke.com';
        $mail->Password = 'Katarina1';
         $mail->SMTPAuth = true;
        $Name = ".$Firstname.  .$Lastname.";
        $mail->setFrom('example@homework.romarioburke.com', "Romario Burke's Homework Mailer");
        $mail->addAddress($Email, $Name);
        $mail->Subject = $Subject;
        $mail->isHTML(true);
        $mail->Body =  <<<EOT

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <table style="color:aqua;border:solid 2px brown;border-radius:25px; font-family: 'Lucida Console', 'Courier New','monospace';background-image: url('https://media.giphy.com/media/xTiTnrliW65rlwud8I/giphy.gif');">
            <tr>
                <td colspan="2" style="text-align:center"><h2>Contact Form</h2></td>
            </tr>
                       <tr><td colspan="2"><hr></td></tr>
            <tr>
                <td>Subject:</td>
                <td>$Subject</td>
            </tr>
            <tr>
                <td>Name:</td>
                <td>$Name</td>
            </tr>
            <tr>
                <td>Message that was sent:</td>
                <td>$Message</td>
            </tr>
                <tr>
                <td>   </td>
                <td>  </td>
            </tr>
                            <tr>
                <td>   </td>
                <td>  </td>
            </tr>
                            <tr>
                <td>   </td>
                <td>  </td>
            </tr>
        </table>
    </body>
</html>
EOT;
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
        }
    }
       $mail = new PHPMailer;
       $mail->isSMTP();
        $mail->SMTPDebug = false;
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;
                                //Enable SMTP authentication
    $mail->Username   = 'example@homework.romarioburke.com';                     //SMTP username
    $mail->Password   = 'Katarina1';  
          $mail->SMTPAuth = true;   //SMTP password
    $mail->setFrom('example@homework.romarioburke.com', 'Homework Contact Form');
    $mail->addAddress('romarioburke190@gmail.com', $Firstname);
        $mail->Subject = "New Submission";
        $mail->isHTML(true);
        $mail->Body = <<<EOT
Subject: {$Subject}
Email: {$Email}
Name: {$Firstname} {$Lastname}
Message: {$Message}
EOT;
        if (!$mail->send()) {
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            respond();
            echo "<script> alertify.alert('The Form was submitted');</script>";
            
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact form</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.rtl.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.rtl.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.rtl.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css"/>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <style>

    </style>
</head>
<body>
<div class="container">
     <form action ="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
     <main class="page contact-us-page" style="border: solid;border-radius:25px;border-color: coral;">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Contact Us</h2>
                </div>
                <form  method="post" action="<?php echo htmlentities ($_SERVER['PHP_SELF']) ?>;?>>
                    <div class="mb-3"><label class="form-label" for="name">First name</label><input class="form-control" type="text" id="firstname" name="firstname"></div>
                    <div class="mb-3"><label class="form-label" for="lname">Last Name</label><input class="form-control" type="text" id="lastname" name="lastname"></div>
                    <div class="mb-3"><label class="form-label" for="subject">Subject</label><input class="form-control" type="text" id="subject" name="Subject"></div>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control" type="email" id="email" name="email"></div>
                    <div class="mb-3"><label class="form-label" for="message">Message</label><textarea class="form-control" id="message" name="Msg"></textarea></div>
                    <div class="mb-3"><button class="btn btn-primary" type="submit" name="submit" onclick='alertify.alert("Message Sent!", "Please await a response!");'>Send</button></div>
                </form>
            </div>
        </section>
    </form>
    </main>
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
</body>
</html>