<?php

class FILE_UPLOAD_ERRORS
{
    const FILE_TO_BIG           = "The file being uploaded is to big.";
    const UNKNOWN_ERROR         = "Undefined error.";
    const NOT_PROPER_EXTENSION  = "The file being uploaded does not have the proper file extension.";    
}


class FileUploadHelper
{
    
    //Directory should be "/abx/dsgsdgf/"
    //and file name should not have slashed. file name must include extenstion.
    //Full path including extension = directory + nameOfFile.
    
    function upload($filePath, $fileName, $FILES_Alias, $acceptedExtension, $maxFileSize)
    {
        
        if( '.' . pathinfo($_FILES[$FILES_Alias]["name"], PATHINFO_EXTENSION) != $acceptedExtension)
        {
            array_push($this->errors, FILE_UPLOAD_ERRORS::NOT_PROPER_EXTENSION);
        }

        if($_FILES[$FILES_Alias]["size"] > $maxFileSize)
        {
            array_push($this->errors, FILE_UPLOAD_ERRORS::FILE_TO_BIG);
        }
        
        if($this->errorsExist() == false)
        {
            mkdir($filePath , 0777, true);

            if (move_uploaded_file($_FILES[$FILES_Alias]["tmp_name"], $filePath . $fileName)) 
            {
                return true; //no error.
            } 
            else 
            {
                array_push($this->errors, FILE_UPLOAD_ERRORS::UNKNOWN_ERROR);
            }
        }
        return false; //error occured.
        
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