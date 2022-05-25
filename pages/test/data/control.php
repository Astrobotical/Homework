<?php
class GOBEYOND{
private $hostname = "sql5.freesqldatabase.com";
private $Username = "sql5460664";
private $Password = "ma1GMyxems";
 private $databaseName = "sql5460664";
    private $Connection;
    function __construct() {
        $this->Connection = $this->Connectionstring();
    }
    function Connectionstring(){

        $Connection = mysqli_connect($this->hostname, $this->Username, $this->Password, $this->databaseName);
        return $Connection;
    }
    function Query($Query){
        $result = mysqli_query($this->Connection, $Query);
        return $result;
    }
    function runQuery($query) {
        $result = mysqli_query($this->Connection,$query);
        while($row=mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }
    function Mailer($to)
    {
    ini_set( 'display_errors', 1 );
     error_reporting( E_ALL );
     $from = "noreply@wotr.romarioburke.com";
     $subject = "Welcome, sign up was sucesful";
     $message = "Registration was a success";
     $headers = "From:" . $from;
     if(mail($to,$subject,$message, $headers)) {
         echo "The email message was sent.";
        } else{   echo "The email message was not sent.";
        }
    }
}
?>