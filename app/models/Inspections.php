<?php

class Inspections extends tableDataObject
{
    const TABLENAME = 'inspections';
 


    public static function saveInspectionDetails(
                            $propertyName,
                            $inspectionDate,
                            $timeUsed,
                            $unitNumber,
                            $phase,
                            $inspectionType,
                            $locationsInspected,
                            $generalCondition,
                            $safetyCompliance,
                            $issuesRepairs,
                            $recommendations,
                            $additionalComments,
                            $selectedFile,
                            $uuid
        ) 
        {
            global $healthdb;

            $userid = $_SESSION['uid'];

            $query = "INSERT INTO `dailyinspections`
                (
                    `propertyid`,
                    `inspectionDate`,
                    `timeUsed`,
                    `unitNumber`,
                    `phase`,
                    `inspectionType`,
                    `locationsInspected`,
                    `generalCondition`,
                    `safetyCompliance`,
                    `issuesRepairs`,
                    `recommendations`,
                    `additionalComments`,
                    `uuid`,
                    `createdAt`,
                    `userid`
                )
                VALUES
                (
                    :propertyName,
                    :inspectionDate,
                    :timeUsed,
                    :unitNumber,
                    :phase,
                    :inspectionType,
                    :locationsInspected,
                    :generalCondition,
                    :safetyCompliance,
                    :issuesRepairs,
                    :recommendations,
                    :additionalComments,
                    :uuid,
                    NOW(),
                    :uid
                )";

            $healthdb->prepare($query);

            // Bind the variables using named parameters
            $healthdb->bind(':propertyName', $propertyName);
            $healthdb->bind(':inspectionDate', $inspectionDate);
            $healthdb->bind(':timeUsed', $timeUsed);
            $healthdb->bind(':unitNumber', $unitNumber);
            $healthdb->bind(':phase', $phase);
            $healthdb->bind(':inspectionType', $inspectionType);
            $healthdb->bind(':locationsInspected', $locationsInspected);
            $healthdb->bind(':generalCondition', $generalCondition);
            $healthdb->bind(':safetyCompliance', $safetyCompliance);
            $healthdb->bind(':issuesRepairs', $issuesRepairs);
            $healthdb->bind(':recommendations', $recommendations);
            $healthdb->bind(':additionalComments', $additionalComments);
            $healthdb->bind(':uuid', $uuid);
            $healthdb->bind(':uid', $userid);
                

            if (!$healthdb->execute()) {
                die('Execute error: ' . $healthdb->error);
            } else {          
                echo 1;
            }
    }


    public static function listInspections($uid) {
        global $healthdb;
    
        
            $getList = "SELECT * FROM `dailyinspections` WHERE `status` = 1 AND `userid` = ? ORDER BY `createdAt` DESC";
            $healthdb->prepare($getList);
            $healthdb->bind(1, $uid);
            $resultList = $healthdb->resultSet();
            return $resultList;
    }


    public static function inspectionDetails($inspectionid) {
        global $healthdb;
    
        $getList = "SELECT * FROM `dailyinspections` WHERE `id` = '$inspectionid'";
        $healthdb->prepare($getList);
        $resultRec = $healthdb->singleRecord();
    
        return [
            'propertyid' => $resultRec->propertyid,
            'inspectionDate' => $resultRec->inspectionDate,
            'timeUsed' => $resultRec->timeUsed,
            'unitNumber' => $resultRec->unitNumber,
            'phase' => $resultRec->phase,
            'inspectionType' => $resultRec->inspectionType,
            'locationsInspected' => $resultRec->locationsInspected,
            'generalCondition' => $resultRec->generalCondition,
            'safetyCompliance' => $resultRec->safetyCompliance,
            'issuesRepairs' => $resultRec->issuesRepairs,
            'recommendations' => $resultRec->recommendations,
            'additionalComments' => $resultRec->additionalComments,
            'createdAt' => $resultRec->createdAt,
            'updatedAt' => $resultRec->updatedAt,
            'uuid' => $resultRec->uuid,
            'userid' => $resultRec->id
            
        ];
    }

}