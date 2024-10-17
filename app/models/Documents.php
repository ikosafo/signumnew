<?php

class Documents extends tableDataObject{

    const TABLENAME = 'documents';

    public static function listdocuments($tablename,$randomnumber){
        global $healthdb;
        $listquery="select * from documents join $tablename on documents.randomnumber=$tablename.randomnumber where $tablename.randomnumber='$randomnumber'";
        $healthdb->prepare($listquery);
        return $healthdb->resultSet();
    }

    public static function insertPassport($newname,$name,$type,$size,$uniqueuploadid) {

        global $healthdb;

        $query = "INSERT INTO `documents`
            (`name`,
             `newname`,
             `size`,
             `type`,
             `randomnumber`,
             `docdate`)
            VALUES ('$name',
                    '$newname',
                    '$size',
                    '$type',
                    '$uniqueuploadid',
                    NOW())";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1;  // Successfully inserted
   
    }
}