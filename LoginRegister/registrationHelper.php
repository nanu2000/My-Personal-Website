<?php
    
    class REGISTER_ERRORS
    {
        const INVALID_EMAIL                     = "The email you entered is invalid.";
        const NO_EMAIL                          = "No email was entered.";
        const USERNAME_ALREADY_EXISTS           = "The username entered already exists.";
        const USERNAME_CONTAINS_INVALID_CHARS   = "The username entered contains invalid characters.";
        const TO_LITTLE_USERNAME                = "The username entered must be greater than or equal to 4 characters in length.";
        const COMFORMATION_PASSWORD_MUST_MATCH  = "The password confirmation and password must match.";
        const NO_FIRST_NAME                     = "No first name was entered.";
        const NO_LAST_NAME                      = "No Last name was entered.";
        const NO_PASSWORD_ENTERED               = "No password was entered.";
        const PASSWORD_TO_SHORT                 = "The password entered must be greater than or equal to 5 characters in length.";
        const NO_CONFIRM_PASSWORD_ENTERED       = "No confirmation password was entered.";
        const NO_USERNAME_ENTERED               = "No username was entered.";
        const NO_POST_DATA                      = "No POST data exists. (Internal error)";
        const UNKNOWN_ERROR                     = "Undefined error.";
    }


    class RegisterPost
    {

        
        public function createNewUser($database)
        {
            
            $sqlStatement = $database->prepare
            (
                "INSERT INTO ". 
                    VITAL_INFORMATION::USER_TABLE 
                    ." (".
                    VITAL_INFORMATION::USER_TABLE_USER_ROW
                    .", ".
                    VITAL_INFORMATION::USER_TABLE_PWORD_ROW
                    .", ".
                    VITAL_INFORMATION::USER_TABLE_FIRST_NAME_ROW
                    .", ".
                    VITAL_INFORMATION::USER_TABLE_LAST_NAME_ROW
                    .", ".
                    VITAL_INFORMATION::USER_TABLE_EMAIL_ROW
                    .") VALUES (:usr, :pword, :fname, :lname, :email)"
            );


            $cost = 10;
            $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
            $salt = sprintf("$2a$%02d$", $cost) . $salt;
            
            $sqlStatement->bindParam(":usr", $this->getPostRegisterUser());
            $sqlStatement->bindParam(":pword", crypt($this->getPostRegisterPass(), $salt));
            $sqlStatement->bindParam(":fname", $this->getPostRegisterFirstName());
            $sqlStatement->bindParam(":lname", $this->getPostRegisterLastName());
            $sqlStatement->bindParam(":email", $this->getPostRegisterEmail());
            
            $sqlStatement->execute();    
            
        }
        
        public function validateUserInput($database)
        {
            
            
            $valid = true; 
            
            if(isset($_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_USER]) == false || $_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_USER] == "")
            { 
                $valid = false;
                array_push($this->errors, REGISTER_ERRORS::NO_USERNAME_ENTERED);
            }
            
            if(isset($_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_PWORD]) == false || $_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_PWORD] == "")
            {
                $valid = false;
                array_push($this->errors, REGISTER_ERRORS::NO_PASSWORD_ENTERED);
            }
            
            if(isset($_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_PWORD_CONFIRM]) == false || $_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_PWORD_CONFIRM] == "")
            {
                $valid = false;
                array_push($this->errors, REGISTER_ERRORS::NO_CONFIRM_PASSWORD_ENTERED);
            }
            
            if(isset($_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_EMAIL]) == false || $_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_EMAIL] == "")
            {
                $valid = false;
                array_push($this->errors, REGISTER_ERRORS::NO_EMAIL);
            }
            
            if(isset($_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_FIRST_NAME]) == false || $_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_FIRST_NAME] == "")
            {
                $valid = false;
                array_push($this->errors, REGISTER_ERRORS::NO_FIRST_NAME);
            }
            
            if(isset($_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_LAST_NAME]) == false || $_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_LAST_NAME] == "")
            {
                $valid = false;
                array_push($this->errors, REGISTER_ERRORS::NO_LAST_NAME);
            }
            
            
            if
            (
                    $valid &
                    $this->isUsernameValid($database) & 
                    $this->isPasswordValid($database) &
                    $this->isEmailValid()
            )
            {      
                return true;                                   
            }
            
            
            
            

            return false;

        }
        
        public function displayRegisterFormUser()
        {

            echo
            ('
             <legend>Register</legend>
                <form action="FrontPage.php" method="post">
                    <input type="text" size="30" placeholder="Username" name="'.        VITAL_INFORMATION::POST_USER_REGISTRATION_USER .'">
                    <input type="password" size="30" placeholder="Password" name="'.    VITAL_INFORMATION::POST_USER_REGISTRATION_PWORD .'">
                    <input type="password" size="30" placeholder="Confirm Password" name="'.    VITAL_INFORMATION::POST_USER_REGISTRATION_PWORD_CONFIRM .'">
                    <input type="text" size="30" placeholder="Email" name="'.           VITAL_INFORMATION::POST_USER_REGISTRATION_EMAIL .'">
                    <input type="text" size="30" placeholder="First Name" name="'.      VITAL_INFORMATION::POST_USER_REGISTRATION_FIRST_NAME .'">
                    <input type="text" size="30" placeholder="Last Name" name="'.      VITAL_INFORMATION::POST_USER_REGISTRATION_LAST_NAME .'">
                    <input type="submit" name = "'.FORM_SUBMISSION::POST_FORM_SUBMITTED_ALIAS.'" value = "'.FORM_SUBMISSION::REGISTER_FORM_SUBMITTED.'">

                </form>   
            ');

            echo('</form>');

        }
         
        
            

        private function isUsernameValid($db)
        {
            $retVal = true;
            if(strlen($this->getPostRegisterUser()) < 4)
            {
                array_push($this->errors, REGISTER_ERRORS::TO_LITTLE_USERNAME);
                $retVal = false;               
            }

            $username = getPostVariable(VITAL_INFORMATION::POST_USER_REGISTRATION_USER);
            if($username !== VITAL_INFORMATION::ERROR_FLAG)
            {
                if(doesRowExist(VITAL_INFORMATION::USER_TABLE, $username , $db, VITAL_INFORMATION::USER_TABLE_USER_ROW))
                {
                    array_push($this->errors, REGISTER_ERRORS::USERNAME_ALREADY_EXISTS);
                    $retVal = false;               
                }

                if(preg_match('/\s/', $this->getPostRegisterUser()) )
                {
                    array_push($this->errors, REGISTER_ERRORS::USERNAME_CONTAINS_INVALID_CHARS);
                    $retVal = false;                           
                }
            }
            else
            {
                array_push($this->errors, REGISTER_ERRORS::UNKNOWN_ERROR);
                $retVal = false;           
            }
            
            return $retVal;

        }    

        private function isEmailValid()
        {

            if (!filter_var($this->getPostRegisterEmail(), FILTER_VALIDATE_EMAIL)) 
            {
                array_push($this->errors, REGISTER_ERRORS::INVALID_EMAIL);
                return false;
            }
            return true;

        }

        private function isPasswordValid($db)
        {
            $noError = true;
            
            if($this->getPostRegisterPass() !== $this->getPostRegisterPassConfirm())
            {
                array_push($this->errors, REGISTER_ERRORS::COMFORMATION_PASSWORD_MUST_MATCH);
                $noError = false;               
            }
            if(strlen($this->getPostRegisterPass()) < 5)
            {
                array_push($this->errors, REGISTER_ERRORS::PASSWORD_TO_SHORT);
                $noError = false;               
            }

            return $noError;

        }
        
        
        
        public function getPostRegisterUser()
        {
            return ($_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_USER]);
        }        
        public function getPostRegisterFirstName()
        {
            return ($_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_FIRST_NAME]);
        }        
        public function getPostRegisterLastName()
        {
            return ($_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_LAST_NAME]);
        }
        public function getPostRegisterPass()
        {
            return ($_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_PWORD]);
        }
        public function getPostRegisterEmail()
        {
            return ($_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_EMAIL]);
        }
        public function getPostRegisterPassConfirm()
        {
            return ($_POST[VITAL_INFORMATION::POST_USER_REGISTRATION_PWORD_CONFIRM]);
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