<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contact Us - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">
    <link rel="stylesheet" href="assets/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/smoothproducts.css">
</head>

<body>
<?php include('pagelayout/navagationbar.php');?>
    <main class="page contact-us-page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Contact Us</h2>
                    <p></p>
                </div>
                <form method="post">
                    <div class="form-group"><label class="form-label" for="name">Name</label><input class="form-control item" type="text" name="name" id="name"></div>
                    <div class="form-group"><label class="form-label" for="subject">Subject</label><input class="form-control item" type="text" name="subject"id="subject"></div>
                    <div class="form-group"><label class="form-label" for="Email">Email</label><input class="form-control item" type="email"name="Email"id="Enail"></div>
                    <div class="form-group"><label class="form-label" for="Body">Message</label><textarea class="form-control item"name="Body" id="Body"></textarea></div><br>
                    <div class="form-group"><button class="btn btn-primary" name="submit">Send</button>
                </form>
            </div>
        </section>
    </main>
    <?php include('pagelayout/footer.php');?>
    <script src="assests/js/Contact.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script src="assets/js/smoothproducts.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>