<?php  
session_start();
include 'Global.php';
if($_POST)
{            
        
    $database       = new dataBaseHandler($root, $hostUserName, $hostPassword, $dataBaseName);
    
    if($user = getUserInfoFromUsername($database->getDataBase(),  $_SESSION[VITAL_INFORMATION::SESSION_CURRENT_USER]))
    {
        $userID = $user->userID;

        if(!empty($_POST["friendRequest"]))
        {

            $friendRequests = getFriendRequestsForID($database->getDataBase(), $userID);
            if(in_array($_POST["friendRequest"], $friendRequests) == true)
            {


                if(empty($_POST["declineFreindRequest"]))
                {                    
                    $friends = getFriendsForID($database->getDataBase(), $userID);
                    if(in_array($_POST["friendRequest"], $friends) == false)
                    {    
                        addNewFriend($database->getDataBase(), $userID, $_POST["friendRequest"]);
                    }
                }

            }
                removeFriendRequest($database->getDataBase(), $_POST["friendRequest"], $userID);
        }

        echo('Succefully Accepted/Declined Friendships! Click <a href="FrontPage.php">Here</a> to go back!.');
    }
}
?>

