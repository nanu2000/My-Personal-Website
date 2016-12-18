<?php
session_start();
ob_start();

    include 'Global.php';
    include 'registrationHelper.php';
    include 'LoginHelper.php';
     
    $database       = new dataBaseHandler($root, $hostUserName, $hostPassword, $dataBaseName);

    
    
    if (!isset($_SESSION[VITAL_INFORMATION::SESSION_CURRENT_USER]))
    { 
        $registrationPost = new RegisterPost;
        $loginHelper = new LoginHelper;

        $loginHelper->showLoginForm();
        $registrationPost->displayRegisterFormUser();

        if ($_POST) 
        {
            if($_POST[FORM_SUBMISSION::POST_FORM_SUBMITTED_ALIAS])
            {
                if($_POST[FORM_SUBMISSION::POST_FORM_SUBMITTED_ALIAS] == FORM_SUBMISSION::REGISTER_FORM_SUBMITTED)
                {
                    if($registrationPost->validateUserInput($database->getDataBase()))
                    {
                        $registrationPost->createNewUser($database->getDataBase());
                        echo("Succesfully created new account.!");
                    }
                    else
                    { 
                       $errors = $registrationPost->getErrors();
                       for($i = 0; $i < count($errors); $i++)
                       {
                           echo('<font color="red">*</font> '.$errors[$i].'<br>');
                       }
                    }
                }                
                else if($_POST[FORM_SUBMISSION::POST_FORM_SUBMITTED_ALIAS] == FORM_SUBMISSION::LOGIN_FORM_SUBMITTED)
                {
                    if($loginHelper->enteredCorrectLoginInformation($database->getDataBase()))
                    {
                        $_SESSION[VITAL_INFORMATION::SESSION_CURRENT_USER] = $loginHelper->getPostUsername();
                    }
                    else
                    {
                        $errors = $loginHelper->getErrors();
                       for($i = 0; $i < count($errors); $i++)
                       {
                           echo('<font color="red">*</font> '.$errors[$i].'<br>');
                       }
                    }
                }
                
                
            }

        }
    }
    if (isset($_SESSION[VITAL_INFORMATION::SESSION_CURRENT_USER]))
    {
        //Bad practice; only temporary.
        ob_end_clean();

        if($userInfo = getUserInfoFromUsername($database->getDataBase(), $_SESSION[VITAL_INFORMATION::SESSION_CURRENT_USER]))
        {   
        

            $name = $userInfo->firstName;

            $userID = $userInfo->userID;

            $email = $userInfo->email;


            if($_POST)
            {

                if(!empty($_POST["friend"]))
                {
                    createFriendRequest($database->getDataBase(), $userID, $_POST["friend"]);
                }

                if(!empty($_POST["logout"]))
                {
                    $_SESSION[VITAL_INFORMATION::SESSION_CURRENT_USER] = null;
                    pageRefresh();
                }
            }     




            echo("Welcome, ");
            echo($name);

            echo('!<br>');
            echo('!<br>');

            echo("User ID = ");
            echo($userID);


            echo('<br>Email = ');
            echo($email);
            echo('<br>Friends<hr>');
            $friends = getFriendsForID($database->getDataBase(), $userID);

            for($i = 0; $i < count($friends); $i++)
            {
                if($friend = getUserInfoFromID($database->getDataBase(), $friends[$i]))
                {
                    echo $friend->username;
                    echo('<br>');
                }
            }

            echo("<hr>");


            echo
            ('
                    <form action="FrontPage.php" method="post">
                        <input type="number" name="friend">
                        <input type="submit"/>
                    </form>  
                    <hr>
            ');

            $friendRequests = getFriendRequestsForID($database->getDataBase(), $userID);
            for($i = 0; $i < count($friendRequests); $i++)
            {
                
                if($friendRequester = getUserInfoFromID($database->getDataBase(), $friendRequests[$i]))
                {
                    
                    $friendRequesterName = $friendRequester->username;
                    echo
                    ('                
                        <form action="processFriends.php" method="post">
                            <input type="hidden" name="friendRequest"  value="'.$friendRequests[$i].'" >
                            <button type="submit">Accept Request From '.$friendRequesterName.'</button>
                            <button name="declineFreindRequest" value="1" type="submit">Decline Request From '.$friendRequesterName.'</button>
                        </form>    
                    ');
                    
                }
                echo('<br>');
            }


            echo('<br>');


            $mapIDs = getFilesForID($database->getDataBase(), $userID);

            for($i = 0; $i < count($mapIDs); $i++)
            {
                echo('<a href = "showMapItem.php?map='. $mapIDs[$i] .'">View Map #' . $i . '</a><br>');
            }



            echo('<br>');

            echo("<hr>");

            echo
            ('
                    <form action="FrontPage.php" method="post">
                        <input name="logout" type="submit" value="logout" />
                    </form>  
            ');

        }
    }
   



?>