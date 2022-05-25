<?php
include('data/control.php');
$Object = new GOBEYOND();
 if (isset($_REQUEST['submit'])){
     $name = $_POST['name'];
     $email = $_POST['email'];
     $password = $_POST['password'];
     $Datetime = date("Y-m-d H:i:s");
     $Photo=$_FILES["photo"]["name"];
     $Facebook = $_POST['facebook'];
     $Twitter = $_POST['twitter'];
     $Instagram = $_POST['instagram'];
     move_uploaded_file($_FILES["photo"]["tmp_name"],"assets/img/avatars".$_FILES["photo"]["name"]);
     
     $Query = "INSERT INTO users(name,email,password,accountcreation,photo,facebook,twitter,instagram) VALUES ('$name','$email', '$password', '$Datetime','$Photo,'$Facebook','$Twitter','$Instagram)";
     $Queryresult = $Object->Query($Query);
     $Mailer = $Object->Mailer($email);
     if($Queryresult){
         echo  "Successfully Registered";
         $Mailer;
     }else{
         echo "Error";
     }
 }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=4faeaacec36a5fa3686b42fd38ea3ce0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css?h=2528b47b032341ce951bad4eb7bec58f">
</head>

<body>
<?php include('pagelayout/navagationbar.php');?>
    <main class="page registration-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Gimme dat information</h2>
                    <p>Here</p>
                </div>
                <form action='registration.php' method='POST'>
                <div class="form-group">
    
<div class="form-group">
    <label for="Pincode">Upload New Photo  </label>
    <input type="file" class="form-control" id="photo" name="photo" />
  </div>
                    <div class="mb-3"><label class="form-label" for="name">Name</label><input class="form-control item" type="text" name="name"id="name"></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control item" type="password" name="password"id="password"></div>
                    <div class="mb-3"><label class="form-label" for="facebook">Facebook page Link</label><input class="form-control item" type="text" name="facebook"id="facebook"></div>
                    <div class="mb-3"><label class="form-label" for="instagram">instagram page  link</label><input class="form-control item" type="text" name="instagram"id="instagram"></div>
                    <div class="mb-3"><label class="form-label" for="twitterk">Twitter page Link</label><input class="form-control item" type="text" name="twitter"id="twitter"></div>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" name="email" id="email"></div><button class="btn btn-primary" type="submit" name="submit">Sign Up</button>
                </form>
            </div>
        </section>
    </main>
    <?php include('pagelayout/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/script.min.js?h=d28daa69ae332709e94e8243f638cce6"></script>
</body>

</html>