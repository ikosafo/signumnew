<?php

class Complaints extends tableDataObject
{
    const TABLENAME = 'complaints';


    public static function getOpenIssueNumber(){
        global $healthdb;
    
        $getnum = "SELECT COUNT(*) as count FROM `complaints` WHERE `status` = 1 AND `resolution` != 'Resolved'";
        $healthdb->prepare($getnum);
        $result = $healthdb->singleRecord();
        return $result->count;
    }

    
    public static function listComplaints($status,$clientid) {
        global $healthdb;
    
        if (empty($status) || $status == "Pending") {
            $getList = "SELECT * FROM `complaints` WHERE `status` = 1 AND `clientid` = '$clientid' AND `resolution` IS NULL ORDER BY `createdAt` DESC";
            $healthdb->prepare($getList);
        } 
        else if ($status == "All") {
            $getList = "SELECT * FROM `complaints` WHERE `status` = 1 AND `clientid` = '$clientid' ORDER BY `createdAt` DESC";
            $healthdb->prepare($getList);
        } else {
            $getList = "SELECT * FROM `complaints` WHERE `status` = 1 AND `clientid` = '$clientid' AND `resolution` = ? ORDER BY `createdAt` DESC";
            $healthdb->prepare($getList);
            $healthdb->bind(1, $status);
        }
    
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function listMaintenanceTasks() {
        global $healthdb;
    
        $getList = "SELECT * FROM `complaints` WHERE `status` = 1 ORDER BY `createdAt` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }



    public static function listClientComplaints($clientid) {
        global $healthdb;
    
        
            $getList = "SELECT * FROM `complaints` WHERE `status` = 1 AND `clientid` = ? ORDER BY `createdAt` DESC";
            $healthdb->prepare($getList);
            $healthdb->bind(1, $clientid);
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