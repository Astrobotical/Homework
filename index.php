<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            .Box{
            display: grid;
            grid-template-columns: 280px 280px 280px 280px;
            grid-gap: 80px;
            padding-left:25px;
        }
            footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
        </style>
    </head>
    <body>
        <div class="m-4">
            <?php include('pages/Navbar.php');?>
            </div>
            <div class="m-3" id="Top">
                <?php include('pages/contentview.php');?>
            </div>
            <div class="m-3" id="Projects">
        <?php include('pages/projects.php');?></div>
        </div>
        <br><br>
        <?php include('pages/footer.php');?></div>
    </body>
</html>