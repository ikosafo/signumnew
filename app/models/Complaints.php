<?php

class Complaints extends tableDataObject
{
    const TABLENAME = 'complaints';
    
    public static function listComplaints($status) {
        global $healthdb;
    
        if (empty($status) || $status == "Pending") {
            $getList = "SELECT * FROM `complaints` WHERE `status` = 1 AND `resolution` IS NULL ORDER BY `createdAt` DESC";
            $healthdb->prepare($getList);
        } else {
            $getList = "SELECT * FROM `complaints` WHERE `status` = 1 AND `resolution` = ? ORDER BY `createdAt` DESC";
            $healthdb->prepare($getList);
            $healthdb->bind(1, $status);
        }
    
        $resultList = $healthdb->resultSet();
        return $resultList;
    }
    


    public static function complaintDetails($complaintid) {
        global $healthdb;
    
        $getList = "SELECT * FROM `complaints` WHERE `complaintid` = '$complaintid'";
        $healthdb->prepare($getList);
        $resultRec = $healthdb->singleRecord();
    
        return [
            'propertyid' => $resultRec->propertyid,
            'apartment' => $resultRec->apartment,
            'location' => $resultRec->location,
            'complaintType' => $resultRec->complaintType,
            'issueCategory' => $resultRec->issueCategory,
            'resolutionTime' => $resultRec->resolutionTime,
            'incidentSeverity' => $resultRec->incidentSeverity,
            'compliantPriority' => $resultRec->compliantPriority,
            'contactMethod' => $resultRec->contactMethod,
            'previousIssue' => $resultRec->previousIssue,
            'issueDescription' => $resultRec->issueDescription,
            'stepsTaken' => $resultRec->stepsTaken,
            'additionalComments' => $resultRec->additionalComments,
            'createdAt' => $resultRec->createdAt,
            'updatedAt' => $resultRec->updatedAt,
            'uuid' => $resultRec->uuid,
            'clientid' => $resultRec->clientid,
            'status' => $resultRec->status,
            'complaintid' => $resultRec->complaintid,
            'resolution' => $resultRec->resolution,
            'verifyRemarks' => $resultRec->verifyRemarks,
            'verifyFeedback' => $resultRec->verifyFeedback
        ];
    }

}