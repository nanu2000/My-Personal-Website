<?php
    include 'Global.php';
    include 'registrationHelper.php';
    
    $database       = new dataBaseHandler($root, $hostUserName, $hostPassword, $dataBaseName);

    if ($_POST) 
    {
        
        $registrationPost   = new RegisterPost();
        $flag = false;
        
        if($registrationPost->validateUserInput($database->getDataBase()))
        {
            $registrationPost->createNewUser($database->getDataBase());
            $flag = true;
        }
        else
        {        
            $flag = false;
        }
        
        $data = array
        (
            JSON_INFORMATION::SUCCESSFUL_FLAG => (bool)$flag,
            JSON_INFORMATION::ERROR_ARRAY => $registrationPost->getErrors()
        );    
        
        echo(json_encode($data));
        
    }

    
?>