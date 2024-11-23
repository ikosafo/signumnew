<?php

class Inspection extends PostController
{

    public function saveInspectionDetails()
    {
        $propertyName = $_POST['propertyName'];
        $inspectionDate = $_POST['inspectionDate'];
        $timeUsed = $_POST['timeUsed'];
        $unitNumber = $_POST['unitNumber'];
        $phase = $_POST['phase'];
        $inspectionType = $_POST['inspectionType'];
        $locationsInspected = $_POST['locationsInspected'];
        $generalCondition = $_POST['generalCondition'];
        $safetyCompliance = $_POST['safetyCompliance'];
        $issuesRepairs = $_POST['issuesRepairs'];
        $recommendations = $_POST['recommendations'];
        $additionalComments = $_POST['additionalComments'];
        $selectedFile = $_POST['selectedFile'];
        $uuid = $_POST['uuid'];
    
        // Pass all values to the saveInspectionDetails method
        Inspections::saveInspectionDetails(
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
        );
    }
    

}
