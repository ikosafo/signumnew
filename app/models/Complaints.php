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


    public static function categoryDetails($catid) {
        global $healthdb;

        $getList = "SELECT * FROM `complaintcategory` where `categoryId` = '$catid'";
        $healthdb->prepare($getList);
        $resultRec = $healthdb->singleRecord();
        $categoryName = $resultRec->categoryName;
        $description = $resultRec->description;
        $uuid = $resultRec->uuid;
        return [
            'categoryName' => $categoryName,
            'description' => $description,
            'uuid' => $uuid
        ];
    }
    

    public static function deleteCategory($catid) {

        global $healthdb;
            $query = "UPDATE `complaintcategory` 
            SET `status` = 0,
            `updatedAt` = NOW()
            WHERE `categoryId` = '$catid'";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1;  // Successfully updated
       
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
            'verifyFeedback' => $resultRec->verifyFeedback,
            'resolutionRemarks' => $resultRec->resolutionRemarks
        ];
    }


    public static function listComplaintCategory() {
        global $healthdb;

        $getList = "SELECT * FROM `complaintcategory` where `status` = 1 ORDER BY `categoryId` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function saveCategory($categoryName, $uuid, $description) {

        global $healthdb;
    
        $getName = "SELECT * FROM `complaintcategory` WHERE `categoryName` = '$categoryName' AND `uuid` != '$uuid' AND `status` = 1";
        $healthdb->prepare($getName);
        $resultName = $healthdb->singleRecord();
    
        if ($resultName) {
            // Category already exists
            echo 2;
        } else {
            // Check if the category with the given UUID exists
            $getCategory = "SELECT * FROM `complaintcategory` WHERE `uuid` = '$uuid' AND `status` = 1";
            $healthdb->prepare($getCategory);
            $resultCategory = $healthdb->singleRecord();
    
            if ($resultCategory) {
                // Update existing category
                $updateQuery = "UPDATE `complaintcategory` 
                                SET `categoryName` = '$categoryName',
                                    `description` = '$description', 
                                    `updatedAt` = NOW() 
                                WHERE `uuid` = '$uuid'";
                $healthdb->prepare($updateQuery);
                $healthdb->execute();
                echo 3;  // Successfully updated
            } else {
                // Insert new category
                $query = "INSERT INTO `complaintcategory`
                (
                `categoryName`,
                `uuid`,
                `description`,
                `createdAt`
                )
                VALUES (
                        '$categoryName',
                        '$uuid',
                        '$description',
                        NOW()
                        )";
    
                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;  // Successfully inserted
            }
        }
    }


    public static function listServiceIssues() {
        global $healthdb;

        $getList = "SELECT * FROM `complaintcategory` where `status` = 1 ORDER BY `categoryId` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }

}