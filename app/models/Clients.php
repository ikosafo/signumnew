<?php

class Clients extends tableDataObject
{
    const TABLENAME = 'clients';
 
    public static function clientDetails($clientid) {
        global $healthdb;
    
        $getList = "SELECT * FROM `clients` WHERE `clientid` = '$clientid' OR `uuid` = '$clientid'";
        $healthdb->prepare($getList);
        $resultRec = $healthdb->singleRecord();
    
        return [
            'clientType' => $resultRec->clientType,
            'ownershipType' => $resultRec->ownershipType,
            'fullName' => $resultRec->fullName,
            'emailAddress' => $resultRec->emailAddress,
            'phoneNumber' => $resultRec->phoneNumber,
            'altPhoneNumber' => $resultRec->altPhoneNumber,
            'residentialAddress' => $resultRec->residentialAddress,
            'nationality' => $resultRec->nationality,
            'birthDate' => $resultRec->birthDate,
            'gender' => $resultRec->gender,
            'maritalStatus' => $resultRec->maritalStatus,
            'occupation' => $resultRec->occupation,
            'employersName' => $resultRec->employersName,
            'employersPhone' => $resultRec->employersPhone,
            'emergencyName' => $resultRec->emergencyName,
            'emergencyPhone' => $resultRec->emergencyPhone,
            'uuid' => $resultRec->uuid,
            'propertyid' => $resultRec->propertyid,
            'contractType' => $resultRec->contractType

        ];
    }

    public static function deleteClient($clientid) {

        global $healthdb;
            $query = "UPDATE `clients` 
            SET `status` = 0,
            `updatedAt` = NOW()
            WHERE `clientid` = '$clientid'";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1;  // Successfully updated
       
    }
 
    public static function saveClientDetails(
                            $fullName,
                            $emailAddress,
                            $phoneNumber,
                            $altPhoneNumber,
                            $residentialAddress,
                            $nationality,
                            $birthDate,
                            $gender,
                            $maritalStatus,
                            $occupation,
                            $employerName,
                            $employerContact,
                            $emergencyName,
                            $emergencyContact,
                            $ownershipType,
                            $uuid,
                            $clientType,
                            $propertyId,
                            $contractType
                                    ) {

        global $healthdb;

        $chkuuid = "SELECT * from `clients` WHERE `uuid` = '$uuid'";
        $healthdb->prepare($chkuuid);
        $resultuuid = $healthdb->singleRecord();

        if ($resultuuid) {

            // If no conflict, update the existing record
        $query = "UPDATE `clients` 
        SET  `clientType` = '$clientType',
            `updatedAt` =   NOW(),
            `ownershipType` = '$ownershipType',
            `fullName` = '$fullName',
            `emailAddress` = '$emailAddress',
            `phoneNumber` = '$phoneNumber',
            `altPhoneNumber` = '$altPhoneNumber',
            `residentialAddress` = '$residentialAddress',
            `nationality` = '$nationality',
            `birthDate` = '$birthDate',
            `gender` = '$gender',
            `maritalStatus` = '$maritalStatus',
            `occupation` = '$occupation',
            `employersName` = '$employerName',
            `employersPhone` = '$employerContact',
            `emergencyName` = '$emergencyName',
            `emergencyPhone` = '$emergencyContact',
            `propertyid` = '$propertyId',
            `contractType` = $contractType

            WHERE `uuid` = '$uuid'";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1;  // Successfully updated      

        }
        else {
            $query = "INSERT INTO `clients`
            (`clientType`,
             `uuid`,
             `createdAt`,
             `ownershipType`,
             `fullName`,
             `emailAddress`,
             `phoneNumber`,
             `altPhoneNumber`,
             `residentialAddress`,
             `nationality`,
             `birthDate`,
             `gender`,
             `maritalStatus`,
             `occupation`,
             `employersName`,
             `employersPhone`,
             `emergencyName`,
             `emergencyPhone`,
             `propertyid`,
             `contractType`
             )
            VALUES ('$clientType',
                    '$uuid',
                    NOW(),
                    '$ownershipType',
                    '$fullName',
                    '$emailAddress',
                    '$phoneNumber',
                    '$altPhoneNumber',
                    '$residentialAddress',
                    '$nationality',
                    '$birthDate',
                    '$gender',
                    '$maritalStatus',
                    '$occupation',
                    '$employerName',
                    '$employerContact',
                    '$emergencyName',
                    '$emergencyContact',
                    '$propertyId',
                    '$contractType'
                    )";

                    $healthdb->prepare($query);
                    $healthdb->execute();
                    echo 3;  // Successfully inserted
        }

       

    }


}