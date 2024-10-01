<?php

class Institution extends tableDataObject
{
    const TABLENAME = 'companyDepartments';

    public static function listCompanyDepartments() {
        global $healthdb;

        $getList = "SELECT * FROM `companyDepartments` where `status` = 1 ORDER BY `departmentId` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }

    
    public static function saveDepartment($departmentName,$description) {
        global $healthdb;

        $getName = "SELECT * FROM `companyDepartments` WHERE `departmentName` = '$departmentName' AND `status` = 1";
        $healthdb->prepare($getName);
        $resultName = $healthdb->singleRecord();

        if ($resultName) {
            //Already exists
            echo 2;
        }
        else {
            $query = "INSERT INTO `companyDepartments`
            (`departmentName`,
             `description`,
              `createdAt`
             )
            VALUES ('$departmentName',
                    '$description',
                    NOW()
                    )";

                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;  // Successfully inserted
        }
       
    }


    public static function departmentDetails($deptid) {
        global $healthdb;

        $getList = "SELECT * FROM `companydepartments` where `departmentId` = '$deptid'";
        $healthdb->prepare($getList);
        $resultRec = $healthdb->singleRecord();
        $departmentName = $resultRec->departmentName;
        $description = $resultRec->description;
        return [
            'departmentName' => $departmentName,
            'description' => $description
        ];
    }

}