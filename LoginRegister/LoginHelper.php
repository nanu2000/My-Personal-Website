<?php


class LOGIN_ERRORS
{
    const INCORRECT_USER_OR_PASS    = "Incorrect username or password.";
    const NO_PASSWORD_ENTERED       = "No password was entered.";
    const NO_USERNAME_ENTERED       = "No username was entered.";
    const NO_POST_DATA              = "No POST data exists. (Internal error)";
    const UNKNOWN_ERROR             = "Undefined error.";
}



class LoginHelper
{
    public function showLoginForm()
    {
            
        echo
        ('
          <legend>Login</legend>
            <form action="FrontPage.php" method="post">
                    
                <input type="text" size="30" placeholder="Username" name="'. VITAL_INFORMATION::POST_USER_LOGIN_USER .'">

                <input type="password" size="30" placeholder="Password" name="'. VITAL_INFORMATION::POST_USER_LOGIN_PWORD .'">

                <input type="submit" name = "'.FORM_SUBMISSION::POST_FORM_SUBMITTED_ALIAS.'" value = "'.FORM_SUBMISSION::LOGIN_FORM_SUBMITTED.'">
                
            </form>   
        ');

        echo('</form>');
        
    }


    private function succesfulLogin($db)
    {        
       
        if($userInfo = getUserInfoFromUsername($db, $this->getPostUsername()))
        {   
            if( $userInfo->password === crypt($this->getPostPassword(), $userInfo->password))
            {
               return true;
            }
        }
        
        array_push($this->errors, LOGIN_ERRORS::INCORRECT_USER_OR_PASS);
        return false;

    }
    
    public function enteredCorrectLoginInformation($database)
    {
        if ($_POST) 
        {
            if($this->isPostUserAndPassSet())
            {
                if($this->succesfulLogin($database))
                {
                    return true;
                }
            }
        }   
        else
        {            
            array_push($this->errors, LOGIN_ERRORS::NO_POST_DATA);
        }
        
        if($this->errorsExist() == false)
        {            
            array_push($this->errors, LOGIN_ERRORS::UNKNOWN_ERROR);
        }
        
        return false;
    }
    
    private function isPostUserAndPassSet()
    {
        $flag = true;
        if(!isset($_POST[VITAL_INFORMATION::POST_USER_LOGIN_USER]) || empty($_POST[VITAL_INFORMATION::POST_USER_LOGIN_USER]))
        {
            $flag = false;
            array_push($this->errors, LOGIN_ERRORS::NO_USERNAME_ENTERED);
        }
        
        if(!isset($_POST[VITAL_INFORMATION::POST_USER_LOGIN_PWORD]) || empty($_POST[VITAL_INFORMATION::POST_USER_LOGIN_PWORD]))
        {
            $flag = false;
            array_push($this->errors, LOGIN_ERRORS::NO_PASSWORD_ENTERED);
        }
        return $flag;
    }
    
    
    function getPostUsername()
    {
        return $_POST[VITAL_INFORMATION::POST_USER_LOGIN_USER];
    }    
    function getPostPassword()
    {
        return $_POST[VITAL_INFORMATION::POST_USER_LOGIN_PWORD];        
    }

    function errorsExist()
    {
        return count($this->errors) > 0;
    }
    function getErrors()
    {
        return $this->errors;
    }
    
    private $errors = array();
    
}

?>