<?php
    include 'Global.php';
    include 'LoginHelper.php';
    include 'FileUploadHelper.php';
    

    $database       = new dataBaseHandler($root, $hostUserName, $hostPassword, $dataBaseName);


    
    
    
    function getRandomUploadDirectoryWithoutName($fileName, $startingDirectory)
    {
        $fullFilePath = "";
        
        do
        {

            $arr = getRandomStringArray(FILE_LAYOUT::FILE_PATH_DIRECTORY_SIZE);

            for($i = 0; $i < count($arr); $i++)
            {
               $startingDirectory .= $arr[$i] . '/';
            }

            $fullFilePath = $startingDirectory  . $fileName;

        } while(file_exists ($fullFilePath));
            
        return $startingDirectory;
    }
        
    
    if ($_POST) 
    {
        
        $loginHelper        = new LoginHelper;
        $data               = array();
        
        if($loginHelper->enteredCorrectLoginInformation($database->getDataBase()))
        {        

            $userName       = $loginHelper->getPostUsername();
            //Get the user's ID.

            if($userInfo = getUserInfoFromUsername($database->getDataBase(), $userName))
            {   
                
                $fileUploader = new FileUploadHelper();


                $fileName = 
                        getRandomString(FILE_LAYOUT::RANDOM_FILE_NAME_SIZE) .     //Get a random file name
                        FILE_LAYOUT::MAP_FILE_EXTENSTION;                         //Append file extension.


                //Get the new directory that's going to be created.
                $filePath = getRandomUploadDirectoryWithoutName($fileName, dirname(__FILE__). FILE_LAYOUT::FILES_MAIN_DIRECTORY);

                //The full path == filepath + filename.
                $fullFilePath = $filePath . $fileName;

                //upload the file to the specified directory.
                $fileUploader->upload
                (
                    $filePath,
                    $fileName,
                    VITAL_INFORMATION::FILES_MAP_ALIAS,
                    FILE_LAYOUT::MAP_FILE_EXTENSTION,
                    FILE_LAYOUT::FILE_MAX_MAP_SIZE 
                );


                //Add errors to data array if they exist.
                if($fileUploader->errorsExist())
                {
                    $data = array
                    (
                        $fileUploader->getErrors()
                    );
                }
                else //if there where no errors uploading the file, store the path into the database. 
                {
                    addNewFileToDatabase($database->getDataBase(), $userInfo->userID, $fullFilePath, FILE_LAYOUT::MAP_FILE_EXTENSTION);
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
        
    }

    
    
    
    
    
?>