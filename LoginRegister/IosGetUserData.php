<?php
    include 'Global.php';
    include 'LoginHelper.php';
    

    $database       = new dataBaseHandler($root, $hostUserName, $hostPassword, $dataBaseName);





    
    
    if ($_POST) 
    {
        
        $loginHelper        = new LoginHelper;
        $data               = array();
        
        if($loginHelper->enteredCorrectLoginInformation($database->getDataBase()))
        {        

            if($user = getUserInfoFromUsername($database->getDataBase(),  $loginHelper->getPostUsername()))
            {
                

                $userName       = $loginHelper->getPostUsername();
                $userID         = $user->userID;
                $email          = $user->email;
                $friends        = getFriendsForID       ($database->getDataBase(), $userID);
                $friendRequests = getFriendRequestsForID($database->getDataBase(), $userID);
                $firstName      = $user->firstName;
                $lastName       = $user->lastName;

                $data = array
                (
                    JSON_INFORMATION::ERROR_ARRAY               => $loginHelper->getErrors(),
                    JSON_INFORMATION::USER_NAME                 => (string)$userName,
                    JSON_INFORMATION::USER_ID                   => (int)$userID,
                    JSON_INFORMATION::EMAIL                     => (string)$email,
                    JSON_INFORMATION::FIRST_NAME                => (string)$firstName,
                    JSON_INFORMATION::LAST_NAME                 => (string)$lastName,
                    JSON_INFORMATION::FRIEND_ID_ARRAY           => $friends,
                    JSON_INFORMATION::FRIEND_REQUESTS_ARRAY     => $friendRequests
                );

            }
            else
            {
                $data = array
                (
                    JSON_INFORMATION::ERROR_ARRAY => array( (string)"Undefined Error" )
                );    
            }


        }
        else
        {        
            $data = array
            (
                JSON_INFORMATION::ERROR_ARRAY => $loginHelper->getErrors()
            );    
        }
            
        echo(json_encode($data));
        
    }

    
?>