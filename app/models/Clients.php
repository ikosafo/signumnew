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
            'propertyid' =>$resultRec->propertyid

        ];
    }

}