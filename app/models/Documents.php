<?php

class Documents extends tableDataObject{

    const TABLENAME = 'documents';

    public static function listdocuments($tablename,$randomnumber){
        global $healthdb;
        $listquery="select * from documents join $tablename on documents.randomnumber=$tablename.randomnumber where $tablename.randomnumber='$randomnumber'";
        $healthdb->prepare($listquery);
        return $healthdb->resultSet();
    }

    public static function insertSingleImg($newname, $name, $type, $size, $uniqueuploadid)
    {
        global $healthdb;
    
        // Check if a record with the same unique ID exists
        $chkunique = "SELECT `newname`, `randomnumber` FROM `documents` WHERE `randomnumber` = '$uniqueuploadid'";
        $healthdb->prepare($chkunique);
        $resultunique = $healthdb->singleRecord();
    
        if ($resultunique) {
            $oldImage = $resultunique->newname;
    
            // Unlink (delete) the old image from the server
            if (file_exists(UPLOAD_PATH . $oldImage)) {
                unlink(UPLOAD_PATH . $oldImage); 
            }
    
            $query = "UPDATE `documents`
                      SET `name` = '$name',
                          `newname` = '$newname',
                          `size` = '$size',
                          `type` = '$type',
                          `docdate` = NOW()
                      WHERE `randomnumber` = '$uniqueuploadid'";
    
            $healthdb->prepare($query);
            $healthdb->execute();
    
            echo 2;
    
        } else {
            $query = "INSERT INTO `documents`
                      (`name`, `newname`, `size`, `type`, `randomnumber`, `docdate`)
                      VALUES ('$name', '$newname', '$size', '$type', '$uniqueuploadid', NOW())";
    
            $healthdb->prepare($query);
            $healthdb->execute();
    
            echo 1; 
        }
    }
 
    
    public static function insertMultiImg($newname, $name, $type, $size, $uniqueuploadid)
    {
        global $healthdb;
    
        // Check if a record with the same unique ID exists
        $chkunique = "SELECT `newname`, `randomnumber` FROM `documents` WHERE `randomnumber` = '$uniqueuploadid'";
        $healthdb->prepare($chkunique);
        $resultunique = $healthdb->singleRecord();
    
        $query = "INSERT INTO `documents`
                    (`name`, `newname`, `size`, `type`, `randomnumber`, `docdate`)
                    VALUES ('$name', '$newname', '$size', '$type', '$uniqueuploadid', NOW())";

        $healthdb->prepare($query);
        $healthdb->execute();

        echo 1; 
        
    }
 
}