<?php
session_start();
include('totalcontrol.php');
if(isset($_POST['submit'])) {
    $Objects = new Plusultra;
$ConnectionString = $Objects->Connectionstring();
    $Name = $_POST['Fname'];
    $Subject = $_POST['Subject'];
    $Msg = $_POST['Msg'];
    $Message = "";
    $A = null;
    $Filetype = filter_input(INPUT_POST, 'Type', FILTER_SANITIZE_STRING);
    $FileChange = filter_input(INPUT_POST, 'Exist', FILTER_SANITIZE_STRING);
    $files = filter_input(INPUT_POST, 'files', FILTER_SANITIZE_STRING);
    function savefile()
    {
            global $Message;
        $filetype = ".txt";
        global $Name, $Msg, $Subject;
        $Msg = $Msg . $Subject .
            $Name = $Name . $filetype;
        $handler = fopen($Name, "w");
        fwrite($handler, $Msg);
        fclose($handler);
        $Message ='<script type="text/javascript">alertify.alert("File Uploaded Successfully!", function(){ alertify.success("Ok"); });</script>';
    }
    function saveCD(&$Name, &$Subject)
    {
        global $folderPath;
        $location = $folderPath . DIRECTORY_SEPARATOR .$Name;
        $Reallocation =$location;
        global $ConnectionString;
        $query = "INSERT INTO files (FileName, Subject, Location) VALUES ('$Name','$Subject','$Reallocation')";

        $result = mysqli_query($ConnectionString,$query);
        mysqli_close($ConnectionString);
    }
    function writeFile()
    {
        global $Filetype, $Name, $Msg, $Subject,$folderPath;
        switch ($Filetype) {
            case "txt":
                $Filetype = ".txt";
                $Msg = $Msg . $Subject;
                $Name = $Name . $Filetype;
                if (strlen($Name) > 0) {
                    $folderPath = 'files/Textfiles/';
                    if (!file_exists($folderPath)) {
                        mkdir($folderPath);
                    }
                    $file = fopen( $folderPath . DIRECTORY_SEPARATOR .$Name, "w");
                    if ($file != false) {
                        fwrite($file, $Msg);
                        saveCD($Name, $Subject);
                        fclose($file);
                    }
                }
                break;
            case "csv":
                global $Filetype, $Name, $Msg, $Subject;
                $Filetype = ".csv";
                $Name = $Name . $Filetype;
                $students = array(
                    array('Subject', 'File Name', 'Message'),
                    array($Subject, $Name, $Msg)
                );
                if (strlen($Name) > 0) {
                    $folderPath = 'files/Csvfiles/';
                    if (!file_exists($folderPath)) {
                        mkdir($folderPath);
                    }

                    $fp = fopen($folderPath . DIRECTORY_SEPARATOR . $Name, 'w');
                    if ($fp != false) {
                        foreach ($students as $fields) {
                            fputcsv($fp, $fields);
                        }
                        saveCD($Name, $Subject);
                        fclose($fp);
                        break;
                    }
                }
        }
    }
     function getfile(){
         global $files;
         $jsonData = json_decode($_SESSION['files'] ,true);
         //print_r($jsonData[1]['Location']);
         for( $i = 0; $i < count($jsonData); $i++){
             if($jsonData[$i]['ID'] == $files){

                  $files = $jsonData[i]['Location'];
                 $File = fopen($jsonData[i]['Location'] ,"r") or die("Unable to open file!");
                 while (!feof($File)){
                     $data = fgets($File);
                     echo "<br>".$data;
                 }
                 fclose($File);
                 break;
             }
         }
    }
    function FileReading()
    {
        global $files;
        //$file = getfile();
        getfile();
       // print_r($file);
      /*  $File = fopen("$files" ,"r");
        while (!feof($File)){
            $data = fgets($File);
            echo "<br>".$data;
        }
        fclose($File); */
    }
    function appendFile()
    {
        global $files,$Msg;
        $file = fopen("$files", "a+") or die("File not found!");
        $content = $Msg;
        fwrite($file, $content);

        echo fread($file, filesize($files));

        fclose($file);

    }
    function Editfile()
    {
        global $FileChange;
        switch ($FileChange)
        {
            case "Read":
                FileReading();
                break;
            case "Append":
                appendFile();
                break;
        }
    }
    writeFile();
    Editfile();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> File Generator</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
 <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <style>
    #Container{
        display: grid;
        align-items: baseline;
        grid-template-columns: 350px;

    }
    *,form{
   padding-left: 10px;
    }
    input[type=text]{
        margin-top: 5px;
        border: solid rebeccapurple;
    }
    form{
        border: solid blue;
        border-radius: 25px;
        background-color: rgba(87,87,87,0.58)
    }
    form,label{
        padding-right: 10px;
    }
td,textarea{
    width: 100%;
    height: 90px;
    padding-top: 2px;
    resize: none;
    padding-left: 0;
    border-color: red;

}
button{
    background-color: #7f54ff;
    height:50px;
    width: 50px;
    color:gold;
    border-radius: 30px;
    border:  solid limegreen;
}
button:hover{
    background-color: dodgerblue;
}

</style>
</head>
<body>
<?php  if(!isset($Message)){}else{echo $Message;}?></tr>
<div id="Container">
<form action ="<?php echo $_SERVER["PHP_SELF"];?>" method ="POST">
<table>
    <tr>
        <td><label for="Check">File Origins :</label></td>
    <td><select name="Check" id="Check" onchange="Change()">
            <option value="None">Select an Option</option>
            <option value="0">New </option>
            <option value="1">Existing</option>
        </select></td></tr>
    <tr class="B">
        <td class ="B"><label for="Exist">File Action :</label></td>
            <td class = "B"><select name="Exist" id="Exist" onchange="Update()">
                <option value="None">Select an Option</option>
                <option value="Read">Read File </option>
                <option value="Append">Append File</option>
            </select></td></tr>
    </tr>
    <tr class ="D">
        <td class ="D"><label for ="files">Choose the file: </label>
            <td class="D"> <select name=files" id="files" >
            </select>
        </td>

    </tr>
    <tr class = "C">
        <td colspan="2" class ="C"><textarea id="UpdateMsg" col name="UpdatedMsg" placeholder="Enter the msg"></textarea></td></tr>
    <tr class="A">
        <td class="A">File Name: </td>
        <td  class="A"><input type="text" id="Fname" name="Fname"></td></tr><tr class ="A"><td>File types : </td>
        <td><select name="Type" Class="A">

                <option value="None">Pick  a file type</option>
                <option value="txt">Text File</option>
                <option value="csv">CSV File</option>
            </select></td>
    </tr><tr class ="A">
        <td>Subject:</td>
        <td><input type="text" id="Subject" name="Subject"></td></tr>
    <tr class = "A">
        <td colspan="2"><textarea id="Msg" col name="Msg" placeholder="Enter the msg"></textarea></td></tr>
    <tr class = "B">

    </tr>
    <tr class = "go">
        <td class = "go"><button type="submit" name="submit" </button>Send</td></tr>
</table>
</form>
</div>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<script>
    function getfiles(){
        var  selectedarea = document.getElementById("files");
        $.ajax({
            url: 'getfiles.php',
            type: 'GET',
            success: function(data){
                //console.log(data);
                const obj = JSON.parse(data)
                console.log(obj[0].ID);
                for(var i = 0; i < obj.length; i++){
                    var option = document.createElement('option');
                    option.c
                    option.value = obj[i].ID;
                    option.innerHTML = obj[i].FileName;
                    selectedarea.append(option)
                }
            }
        });
    }
    var A =document.querySelectorAll(".A");
    var B = document.querySelectorAll(".B");
    var C = document.querySelectorAll(".C");
    var D= document.querySelectorAll(".D");
    var button = document.querySelectorAll(".go");
    window.onload = function() {
        $(A).hide();
        $(B).hide();
        $(C).hide();
        $(D).hide()
        $(button).hide();
    }
    function AAA(){
            //Swal.fire('Any fool can use a computer')
        alertify.alert('Alert Title', 'Alert Message!', function(){ alertify.success('Ok'); });
    }
    function Change(){

        const Check = document.getElementById("Check").selectedIndex;
        if(Check === 0) {
            $(A).hide();
            $(B).hide();
            $(C).hide();
            $(D).hide();
            $(button).hide();
        }
        else
        if(Check === 1) {
            $(A).show();
            $(B).hide();
            $(C).hide();
            $(D).hide();
            $(button).show();
        }else
        if(Check === 2){
            $(A).hide();
            $(B).show();
            $(D).hide();
            $(button).hide();
        }}
    function Update() {
        const Next = document.getElementById("Exist").selectedIndex;
        if (Next === 0) {
            $(A).hide();
            $(B).show();
            $(D).hide();
            $(button).hide();
        } else if (Next === 1) {
            $(A).hide();
            $(B).show();
            $(C).hide();
            $(D).show();
            getfiles();
            $(button).show();
        } else if (Next === 2) {
            $(A).hide();
            $(B).show();
            $(C).show();
            $(D).show();
            getfiles();
            $(button).show();
        }
    }
    function requestfiles(){
        
    }
</script>
</body>
</html>