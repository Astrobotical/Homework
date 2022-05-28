<?php
session_start();
include('totalcontrol.php');
$object = new Plusultra();
$checker = 1;
if(isset($checker)){
    $Query = "Select * from files";
    $Result = $object ->runQuery($Query);
    $response = array();
    $counter = 0;
    if($Result){
        foreach ($Result  as $Key) {
                $ID = (string)$Key['ID'];
                $FileName = $Key['FileName'];
                $Subject = $Key['Subject'];
                $Location = $Key['Location'];
                $id = array('ID' => $ID,
                    'FileName' => $FileName,
                    'Subject' => $Subject,
                    'Location' => $Location);
                array_push($response, $id);

            }
        $responseJSON = json_encode($response);
        $_SESSION['files'] = $responseJSON;
        echo $responseJSON;
    }
    else{
        $return = array('ID' => 'null', 'message' => 'No files found');
        $responseJSON = json_encode($return);
        echo $responseJSON;
    }
}
?>