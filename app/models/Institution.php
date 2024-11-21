<?php

class Institution extends tableDataObject
{
    const TABLENAME = 'companydepartments';

    public static function listCompanyDepartments() {
        global $healthdb;

        $getList = "SELECT * FROM `companydepartments` where `status` = 1 ORDER BY `departmentId` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }

    public static function listUsers() {
        global $healthdb;

        $getList = "SELECT * FROM `users` where `status` = 1 ORDER BY `createdAt` DESC, `firstName`,`lastName` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }
    
    public static function saveDepartment($departmentName,$description) {
        global $healthdb;

        $getName = "SELECT * FROM `companydepartments` WHERE `departmentName` = '$departmentName' AND `status` = 1";
        $healthdb->prepare($getName);
        $resultName = $healthdb->singleRecord();

        if ($resultName) {
            //Already exists
            echo 2;
        }
        else {
            $query = "INSERT INTO `companydepartments`
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

    public static function editDepartment($departmentName,$description,$deptid) {

        global $healthdb;

        $getName = "SELECT * FROM `companydepartments` WHERE `departmentName` = '$departmentName' AND `status` = 1";
        $healthdb->prepare($getName);
        $resultName = $healthdb->singleRecord();

        if ($resultName) {
            //Already exists
            echo 2;
        }
        else {
            $query = "UPDATE `companydepartments` 
            SET `departmentName` = '$departmentName',
            `updatedAt` = NOW(),
            `description` = '$description'
            WHERE `departmentId` = '$deptid'";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1;  // Successfully updated
        }
       
    }

    public static function deleteDepartment($deptid) {

        global $healthdb;
            $query = "UPDATE `companydepartments` 
            SET `status` = 0,
            `updatedAt` = NOW()
            WHERE `departmentId` = '$deptid'";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1;  // Successfully updated
       
    }
    
    public static function listDepartment() {
        global $healthdb;

        $getList = "SELECT * FROM `companydepartments` where `status` = 1 ORDER BY `departmentId` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }

    public static function saveUser(
                        $firstName,
                        $lastName,
                        $emailAddress,
                        $phoneNumber,
                        $altPhoneNumber,
                        $dateBirth,
                        $department,
                        $address,
                        $jobTitle,
                        $uuid)
                        {

        global $healthdb;

        // Query to check if the UUID already exists
        $getByUuid = "SELECT * FROM `users` WHERE `uuid` = '$uuid'";
        $healthdb->prepare($getByUuid);
        $resultByUuid = $healthdb->singleRecord();

        if ($resultByUuid) {
        // Check if the new user already exists for a different UUID
        $checkNameConflict = "SELECT * FROM `users` WHERE (`emailAddress` = '$emailAddress' OR `phoneNumber` = '$phoneNumber') AND `uuid` != '$uuid'";
        $healthdb->prepare($checkNameConflict);
        $resultNameConflict = $healthdb->singleRecord();

        if ($resultNameConflict) {
            // If the user exists for a different UUID, echo 2
            echo 2;
        } else {
                // If no conflict, update the existing record
                $query = "UPDATE `users` 
                SET `firstName` = '$firstName',
                `lastName` = '$lastName',
                `emailAddress` = '$emailAddress',
                `phoneNumber` = '$phoneNumber',
                `altPhoneNumber` = '$altPhoneNumber',
                `address` = '$address',
                `dateBirth` = '$dateBirth',
                `department` = '$department',
                `updatedAt` = NOW(),
                `jobtitle` = '$jobTitle'

                WHERE `uuid` = '$uuid'";

                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;  // Successfully updated
            }
        } else {
        // Query to check if a user with the same name exists
        $getByName = "SELECT * FROM `users` WHERE (`emailAddress` = '$emailAddress' OR `phoneNumber` = '$phoneNumber')";
        $healthdb->prepare($getByName);
        $resultByName = $healthdb->singleRecord();

        if ($resultByName) {
            // If a different UUID exists but the same user name exists, echo 2
            echo 2;
        } else {
                // Insert new user if no conflicts
                $query = "INSERT INTO `users`
            (`firstName`,
             `lastName`,
             `emailAddress`,
             `phoneNumber`,
             `altPhoneNumber`,
             `address`,
             `dateBirth`,
             `department`,
             `createdAt`,
             `uuid`,
             `jobtitle`)
            VALUES ('$firstName',
                    '$lastName',
                    '$emailAddress',
                    '$phoneNumber',
                    '$altPhoneNumber',
                    '$address',
                    '$dateBirth',
                    '$department',
                    NOW(),
                    '$uuid',
                    '$jobTitle')";

                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;  // Successfully inserted
            }
        }
    }

    public static function saveUserAccount(
                $username,
                $password, 
                $securityQuestion,
                $securityAnswer,
                $uuid
        ) {
        global $healthdb;
    
        $getByUuid = "SELECT * FROM `users` WHERE `uuid` = '$uuid'";
        $healthdb->prepare($getByUuid);
        $resultByUuid = $healthdb->singleRecord();
    
        if ($resultByUuid) {
            $checkNameConflict = "SELECT * FROM `users` WHERE `username` = '$username' AND `uuid` != '$uuid'";
            $healthdb->prepare($checkNameConflict);
            $resultNameConflict = $healthdb->singleRecord();
    
            if ($resultNameConflict) {
                echo 2;
            } else {
                $query = "UPDATE `users` 
                          SET `username` = '$username',
                              `password` = '$password',
                              `securityQuestion` = '$securityQuestion',
                              `securityAnswer` = '$securityAnswer',
                              `updatedAt` = NOW()
                          WHERE `uuid` = '$uuid'";
    
                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;
            }
        } else {
            $getByName = "SELECT * FROM `users` WHERE `username` = '$username'";
            $healthdb->prepare($getByName);
            $resultByName = $healthdb->singleRecord();
    
            if ($resultByName) {
                echo 2;
            } else {
                $query = "UPDATE `users` 
                          SET `username` = '$username',
                              `password` = '$password',
                              `securityQuestion` = '$securityQuestion',
                              `securityAnswer` = '$securityAnswer',
                              `updatedAt` = NOW()
                          WHERE `uuid` = '$uuid'";
    
                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;
            }
        }
    }

    public static function saveRole(
        $userRole,
        $permissions,
        $uuid
        ) {
        global $healthdb;

        $query = "UPDATE `users` SET 
                   `accessLevel` = '$userRole',
                   `updatedAt` = NOW()
                    WHERE `uuid` = '$uuid'";

                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;

        $deleteQuery = "DELETE FROM `permission` WHERE `uuid` = '$uuid'";
        $healthdb->prepare($deleteQuery);
        $healthdb->execute();

        foreach ($permissions as $permission) {
            $insertQuery = "INSERT INTO `permission` (`permission`, `uuid`) 
                            VALUES ('$permission', '$uuid')";
             $healthdb->prepare($insertQuery);
             $healthdb->execute();
        }

        
    }

    public static function userDetails($userid) {
        global $healthdb;
    
        $getList = "SELECT * FROM `users` WHERE `id` = '$userid' OR `uuid` = '$userid'";
        $healthdb->prepare($getList);
        $resultRec = $healthdb->singleRecord();
    
        return [
            'firstName' => $resultRec->firstName,
            'lastName' => $resultRec->lastName,
            'emailAddress' => $resultRec->emailaddress,
            'phoneNumber' => $resultRec->phoneNumber,
            'altPhoneNumber' => $resultRec->altPhoneNumber,
            'address' => $resultRec->address,
            'dateBirth' => $resultRec->dateBirth,
            'username' => $resultRec->username,
            'accessLevel' => $resultRec->accessLevel,
            'department' => $resultRec->department,
            'emergencyContactInfo' => $resultRec->emergencyContactInfo,
            'jobtitle' => $resultRec->jobtitle,
            'securityQuestion' => $resultRec->securityQuestion,
            'securityAnswer' => $resultRec->securityAnswer,
            'createdAt' => $resultRec->createdAt,
            'updatedAt' => $resultRec->updatedAt,
            'uuid' => $resultRec->uuid,
            'accessLevel' => $resultRec->accessLevel
        ];
    }
    

}