<?php

//////
   // $hostUserName   = 'root';
  // $hostPassword   = '';
  //  $root           = 'localhost';
   // $dataBaseName   = 'registrationdb';

   $hostUserName   = 'DevRichie';
   $hostPassword   = 'MnCYHnt4uAcu92Pc';
   $root           = "localhost";
   $dataBaseName   = 'devrichi_AppDB';


class FORM_SUBMISSION
{
    const POST_FORM_SUBMITTED_ALIAS         = 'FormType';
    const LOGIN_FORM_SUBMITTED              = 'Login';
    const REGISTER_FORM_SUBMITTED           = 'Register';
}



class FILE_LAYOUT
{
    const MAP_FILE_EXTENSTION               = ".txt";
    const RANDOM_FILE_NAME_SIZE             = 10;
    const FILE_PATH_DIRECTORY_SIZE          = 5;
    const FILE_MAX_MAP_SIZE                 = 500000; //500 kb
    
    const FILES_MAIN_DIRECTORY              = "/uploads/";    
}



class VITAL_INFORMATION
{
    
    const ERROR_FLAG = -1;
    
    const FILES_MAP_ALIAS                   = "MapFileToUpload";
    
    
    const FILE_TABLE                        = 'FileTable';
    const FILE_TABLE_USER_ID_ROW            = 'userID';
    const FILE_TABLE_ID_ROW                 = 'fileID';
    const FILE_TABLE_FILE_LOCATION_ROW      = 'fileLocation';
    const FILE_TABLE_FILE_TYPE_ROW          = 'fileType';
    
    
    const USER_TABLE                        = 'UserTable';
    const USER_TABLE_ID_ROW                 = 'id';
    const USER_TABLE_USER_ROW               = 'username';
    const USER_TABLE_PWORD_ROW              = 'password';
    const USER_TABLE_FIRST_NAME_ROW         = 'fname';
    const USER_TABLE_LAST_NAME_ROW          = 'lname';
    const USER_TABLE_DESCRIPTION_ROW        = 'description';
    const USER_TABLE_EMAIL_ROW              = 'email';
    
    
    
    const FRIEND_TABLE                  = 'FriendTable';
    const FRIEND_TABLE_FIRST_USER       = 'firstUser';
    const FRIEND_TABLE_SECOND_USER      = 'secondUser';
    
    
    const FRIEND_REQUEST_TABLE          = 'FriendRequestTable';    
    const FRIEND_REQUEST_TABLE_SENDER   = 'sender';
    const FRIEND_REQUEST_TABLE_RECIEVER = 'reciever';
    
    
    
    
    
    
    const SESSION_CURRENT_USER              = 'currentUser';
    

    const POST_USER_REGISTRATION_USER       = 'userRegistration';
    const POST_USER_REGISTRATION_PWORD_CONFIRM = 'passComfirmRegistration';
    const POST_USER_REGISTRATION_PWORD      = 'passRegistration';
    const POST_USER_REGISTRATION_EMAIL      = 'emailRegistration';  
    const POST_USER_REGISTRATION_FIRST_NAME = 'fnameRegistration';
    const POST_USER_REGISTRATION_LAST_NAME  = 'lnameRegistration';


    const POST_USER_LOGIN_USER              = 'userLogin';
    const POST_USER_LOGIN_PWORD             = 'passLogin';

    
    const TIME_CREATED = 'reg_date';
}



function getRandomStringArray($size = 5)
{
    return str_split(substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"),0,$size));
}
function getRandomString($length = 5) 
{
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
    

class JSON_INFORMATION
{
    const ERROR_ARRAY           = 'errorStringArray';
    const SUCCESSFUL_FLAG       = 'success';
    const USER_NAME             = 'username';
    const USER_ID               = 'ID';
    const EMAIL                 = 'email';
    const FIRST_NAME            = 'firstName';
    const LAST_NAME             = 'lastName';
    const FRIEND_ID_ARRAY       = 'friends';
    const FRIEND_REQUESTS_ARRAY = 'friendRequests';
}




class dataBaseHandler
{
    
    public function getDataBase()
    {
        return $this->database;
    }
    public function __construct($root, $hostUserName, $hostPassword, $dataBaseName)
    {
        $this->database = $this->connectToDb($root, $hostUserName, $hostPassword, $dataBaseName);
        $this->createNeededTables($this->database);   
    }
    
    function __destruct() 
    {
    }
    
    private $database;

    private function connectToDb($root, $host, $pass, $db)
    {    
    
        
        try
        {
            $database = new PDO("mysql:host=".$root.";dbname=".$db."", $host, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(PDOException $ex)
        {
            die("Unable to connect to " . $root);
        }
        
        return $database;
    }
    private function tableExists($table) 
    {
        try 
        {
            $result = $this->database->query("SELECT 1 FROM $table LIMIT 1");
        } 
        catch (Exception $e) 
        {
            return false;
        }

        return $result !== false;
    }
    
    private function createNeededTables($database)
    {
        
        if($this->tableExists(VITAL_INFORMATION::USER_TABLE) === false)
        {
            $sqlStatement = $database->prepare
            (
                "CREATE TABLE ". VITAL_INFORMATION::USER_TABLE ." (
                ".VITAL_INFORMATION::USER_TABLE_ID_ROW." INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                ".VITAL_INFORMATION::USER_TABLE_FIRST_NAME_ROW." VARCHAR(100),
                ".VITAL_INFORMATION::USER_TABLE_LAST_NAME_ROW." VARCHAR(100),
                ".VITAL_INFORMATION::USER_TABLE_DESCRIPTION_ROW." VARCHAR(1024),
                ".VITAL_INFORMATION::USER_TABLE_USER_ROW." VARCHAR(100),
                ".VITAL_INFORMATION::USER_TABLE_PWORD_ROW." VARCHAR(100) NOT NULL,
                ".VITAL_INFORMATION::USER_TABLE_EMAIL_ROW." VARCHAR(100) NOT NULL,
                ".VITAL_INFORMATION::TIME_CREATED." TIMESTAMP )"
            );
            $sqlStatement->execute();    
        }
        
        if($this->tableExists(VITAL_INFORMATION::FRIEND_TABLE) === false)
        {
            $sqlStatement = $database->prepare
            (
                "CREATE TABLE ". VITAL_INFORMATION::FRIEND_TABLE ." (
                ".VITAL_INFORMATION::FRIEND_TABLE_FIRST_USER." INT(6),
                ".VITAL_INFORMATION::FRIEND_TABLE_SECOND_USER." INT(6),
                ".VITAL_INFORMATION::TIME_CREATED." TIMESTAMP)"
            );

            $sqlStatement->execute();    
        }
        
        if($this->tableExists(VITAL_INFORMATION::FRIEND_REQUEST_TABLE) === false)
        {
            $sqlStatement = $database->prepare
            (
                "CREATE TABLE ". VITAL_INFORMATION::FRIEND_REQUEST_TABLE ." (
                ".VITAL_INFORMATION::FRIEND_REQUEST_TABLE_SENDER." INT(6),
                ".VITAL_INFORMATION::FRIEND_REQUEST_TABLE_RECIEVER." INT(6),
                ".VITAL_INFORMATION::TIME_CREATED." TIMESTAMP)"
            );

            $sqlStatement->execute();    
        }
      
        if($this->tableExists(VITAL_INFORMATION::FILE_TABLE) === false)
        {
            $sqlStatement = $database->prepare
            (
                "CREATE TABLE ". VITAL_INFORMATION::FILE_TABLE ." (
                ".VITAL_INFORMATION::FILE_TABLE_ID_ROW." INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                ".VITAL_INFORMATION::FILE_TABLE_USER_ID_ROW." INT(6),
                ".VITAL_INFORMATION::FILE_TABLE_FILE_LOCATION_ROW." VARCHAR(100) NOT NULL,
                ".VITAL_INFORMATION::FILE_TABLE_FILE_TYPE_ROW." VARCHAR(100) NOT NULL,
                ".VITAL_INFORMATION::TIME_CREATED." TIMESTAMP)"
            );

            $sqlStatement->execute();    
        }
        
    }

}

function pageRefresh()
{    
    header("Location: " . $_SERVER['REQUEST_URI']);
    die();
}


function getPostVariable($location)
{
    if($_POST)
    {
        if(isset($_POST[$location]))
        {
            return $_POST[$location];
        }
    }
    
    return VITAL_INFORMATION::ERROR_FLAG;
}


function doesRowExist($table, $var, $db, $col)
{
    
    $exists = false;
    
    if ($stmt = $db->prepare("SELECT * FROM " . $table . " WHERE " . $col . " = :var")) 
    {

        /* bind parameters for markers */
        $stmt->bindParam(":var", $var);

        if ($stmt->execute()) 
        {
            if($fetchRow = $stmt->fetch()) 
            {           
                $exists = true;
            }
        }
    }
  
    return $exists;
}





function getArrayFromTable($db, $select, $from, $where, $equals)
{
    
    $retVal = array();
    
    
    if 
    (        
        $stmt = $db->prepare
        (
            "SELECT "   . $select   . 
            " FROM "    . $from     . 
            " WHERE "   . $where    . " = :equals"
        )
    )
    {

        $stmt->bindParam(":equals", $equals);

        if ($stmt->execute()) 
        {
            while($fetchRow = $stmt->fetch()) 
            {            
                array_push($retVal, $fetchRow[$select]); 
            }
        }
    }    
    
    return $retVal;

}



class UserInfo
{
    public $firstName;
    public $lastName;
    public $username;
    public $userID;
    public $email;
    public $password;
    
}



function getUserInfoFromUsername($db, $username)
{
    $userInfo = null;
    
    if ($stmt = $db->prepare("SELECT * FROM " . VITAL_INFORMATION::USER_TABLE . " WHERE ". VITAL_INFORMATION::USER_TABLE_USER_ROW . " = :username")) 
    {

        $stmt->bindParam(":username", $username);

        if ($stmt->execute()) 
        {
            if($fetchRow = $stmt->fetch()) 
            {            
                $userInfo = new UserInfo();
                $userInfo->firstName    = $fetchRow[VITAL_INFORMATION::USER_TABLE_FIRST_NAME_ROW];
                $userInfo->lastName     = $fetchRow[VITAL_INFORMATION::USER_TABLE_LAST_NAME_ROW];
                $userInfo->email        = $fetchRow[VITAL_INFORMATION::USER_TABLE_EMAIL_ROW];
                $userInfo->password     = $fetchRow[VITAL_INFORMATION::USER_TABLE_PWORD_ROW];
                $userInfo->username     = $username;
                $userInfo->userID       = $fetchRow[VITAL_INFORMATION::USER_TABLE_ID_ROW];
            }
        }
    }    
    
    return $userInfo;
    
}



function getUserInfoFromID($db, $id)
{
    $userInfo = null;
    
    if ($stmt = $db->prepare("SELECT * FROM " . VITAL_INFORMATION::USER_TABLE . " WHERE ". VITAL_INFORMATION::USER_TABLE_ID_ROW . " = :id")) 
    {

        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) 
        {
            if($fetchRow = $stmt->fetch()) 
            {            
                $userInfo = new UserInfo();
                $userInfo->firstName    = $fetchRow[VITAL_INFORMATION::USER_TABLE_FIRST_NAME_ROW];
                $userInfo->lastName     = $fetchRow[VITAL_INFORMATION::USER_TABLE_LAST_NAME_ROW];
                $userInfo->email        = $fetchRow[VITAL_INFORMATION::USER_TABLE_EMAIL_ROW];
                $userInfo->password     = $fetchRow[VITAL_INFORMATION::USER_TABLE_PWORD_ROW];
                $userInfo->username     = $fetchRow[VITAL_INFORMATION::USER_TABLE_USER_ROW];
                $userInfo->userID       = $id;
            }
        }
    }    
    
    return $userInfo;
   
}













function getFriendsForID    ($db, $id)
{                  
    return getArrayFromTable($db, VITAL_INFORMATION::FRIEND_TABLE_SECOND_USER, VITAL_INFORMATION::FRIEND_TABLE, VITAL_INFORMATION::FRIEND_TABLE_FIRST_USER, $id);             
}

function getFriendRequestsForID   ($db, $id)
{     
    return getArrayFromTable($db, VITAL_INFORMATION::FRIEND_REQUEST_TABLE_SENDER, VITAL_INFORMATION::FRIEND_REQUEST_TABLE, VITAL_INFORMATION::FRIEND_REQUEST_TABLE_RECIEVER, $id);             
}

function getFilesForID    ($db, $id)
{     
    return getArrayFromTable($db, VITAL_INFORMATION::FILE_TABLE_ID_ROW, VITAL_INFORMATION::FILE_TABLE, VITAL_INFORMATION::FILE_TABLE_USER_ID_ROW, $id);   
}
















function createFriendRequest($db, $id, $friendID)
{
     $stmt = $db->prepare
    (
        "INSERT INTO ". 
        VITAL_INFORMATION::FRIEND_REQUEST_TABLE
        ." (".
        VITAL_INFORMATION::FRIEND_REQUEST_TABLE_SENDER
        .", ".
        VITAL_INFORMATION::FRIEND_REQUEST_TABLE_RECIEVER
        .") VALUES (:id, :friend)"
    );


    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":friend", $friendID);

    $stmt->execute();    

}

function removeFriendRequest($database, $sender, $id)
{
     $stmt = $database->prepare
    (
        "DELETE FROM ".              
        VITAL_INFORMATION::FRIEND_REQUEST_TABLE.
        " WHERE ".VITAL_INFORMATION::FRIEND_REQUEST_TABLE_SENDER." = :id AND "
        .VITAL_INFORMATION::FRIEND_REQUEST_TABLE_RECIEVER." = :friend;"
    );


    $stmt->bindParam(":id", $sender);
    $stmt->bindParam(":friend", $id);

    $stmt->execute();    
     

}





function addNewFriend($database, $id, $friendID)
{
     $stmt = $database->prepare
    (
        "INSERT INTO ". 
        VITAL_INFORMATION::FRIEND_TABLE
        ." (".
        VITAL_INFORMATION::FRIEND_TABLE_FIRST_USER
        .", ".
        VITAL_INFORMATION::FRIEND_TABLE_SECOND_USER
        .") VALUES (:id, :friend)"
    );


    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":friend", $friendID);

    $stmt->execute();    
    
    $stmt->bindParam(":id", $friendID);
    $stmt->bindParam(":friend", $id);

    $stmt->execute();     


}


function addNewFileToDatabase($database, $userID, $fullFilePath, $fileExtenstion)
{
     $stmt = $database->prepare
    (
        "INSERT INTO ". 
        VITAL_INFORMATION::FILE_TABLE
        ." (".
        VITAL_INFORMATION::FILE_TABLE_FILE_LOCATION_ROW
        .", ".
        VITAL_INFORMATION::FILE_TABLE_FILE_TYPE_ROW
        .", ".
        VITAL_INFORMATION::FILE_TABLE_USER_ID_ROW
        .") VALUES (:path, :ext, :userID)"
    );

    $stmt->bindParam(":path", $fullFilePath);
    $stmt->bindParam(":ext", $fileExtenstion);
    $stmt->bindParam(":userID", $userID);

    $stmt->execute();     

}



function getUserIDFromMap    ($db, $mapID)
{     
        
    $retVal = VITAL_INFORMATION::ERROR_FLAG;
        
    if ($stmt = $db->prepare("SELECT " . VITAL_INFORMATION::FILE_TABLE_USER_ID_ROW . " FROM " . VITAL_INFORMATION::FILE_TABLE . " WHERE ". VITAL_INFORMATION::FILE_TABLE_ID_ROW . " = :fileID"))
    {

        $stmt->bindParam(":fileID", $mapID);

        if ($stmt->execute()) 
        {
            if($fetchRow = $stmt->fetch()) 
            {            
                $retVal = $fetchRow[VITAL_INFORMATION::FILE_TABLE_USER_ID_ROW];
            }
        }
    }    
    
    return $retVal;
    
    
}

function getFileURLFromID    ($db, $mapID)
{     
    
    
    
    $retVal = VITAL_INFORMATION::ERROR_FLAG;
        
    if ($stmt = $db->prepare("SELECT " . VITAL_INFORMATION::FILE_TABLE_FILE_LOCATION_ROW . " FROM " . VITAL_INFORMATION::FILE_TABLE . " WHERE ". VITAL_INFORMATION::FILE_TABLE_ID_ROW . " = :fileID"))
    {

        $stmt->bindParam(":fileID", $mapID);

        if ($stmt->execute()) 
        {
            if($fetchRow = $stmt->fetch()) 
            {            
                $retVal = $fetchRow[VITAL_INFORMATION::FILE_TABLE_FILE_LOCATION_ROW];
            }
        }
    }    
    
    return $retVal;
    
    
}


?>
