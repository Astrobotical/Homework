<?php
$Variable  = "Second test";
$list = array(
    'first','second','third','fourth'
);
$objects = array( 'name' =>"Romario Burke",'Des' => "I enjoy exploring the taste and the creation of food",'three'=> 3);
$num ="three";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity 1</title>
    <style>
        p{
          text-align: center;
           
        }
    </style>
</head>
<body> <?php echo"<h2>Activity 1</h2><br><hr>"?>
    <?php echo "<strong>First test</strong> <br> $Variable <br> $list[3]<br> $objects[$num]";?>
    <?php echo '<h1>Headtag1</h1><hr>' ?>
    <?php echo "<p>I am $objects[name] and $objects[Des]</p>"
    //Single line Comment 
    /*Multi -
    line Comment*/?> 
</body>
</html>