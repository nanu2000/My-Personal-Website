<?php
session_start();

/*
 *
 * To Retrieve a users map file, set GET[MAP_ID] to the index of the map you would like to retrieve.
 * Only retrieve maps that have the same user ID as the session user ID.
 *  
 *  */




    include 'Global.php';
    include 'LoginHelper.php';
    

    $database       = new dataBaseHandler($root, $hostUserName, $hostPassword, $dataBaseName);

    if (!isset($_SESSION[VITAL_INFORMATION::SESSION_CURRENT_USER]))
    { 
        
        echo("Please Login to continue.");
        
    }
    else
    {
        
        if($userInfo = getUserInfoFromUsername($database->getDataBase(), $_SESSION[VITAL_INFORMATION::SESSION_CURRENT_USER]))
        {   
            $userID = $userInfo->userID;


            if(getUserIDFromMap($database->getDataBase(), $_GET["map"]) === $userID)
            {
                $mapPath = getFileURLFromID($database->getDataBase(), $_GET["map"]);

                if($mapPath !== VITAL_INFORMATION::ERROR_FLAG)
                {
                    echo("File Path: " . $mapPath . "<br>");
                    echo file_get_contents( $mapPath );
                }
            }
        }
        
        
        
        
        
    }
    
    

    
?>