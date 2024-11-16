<?php

class Client extends PostController
{

    public function saveComplaintDetails()
    {
        $propertyName = $_POST['propertyName'];
        $apartmentNumber = $_POST['apartmentNumber'];
        $location = $_POST['location'];
        $complaintType = $_POST['complaintType'];
        $issueCategory = $_POST['issueCategory'];
        $expectedResolutionTime = $_POST['expectedResolutionTime'];
        $incidentSeverity = $_POST['incidentSeverity'];
        $complaintPriority = $_POST['complaintPriority'];
        $contactMethod = $_POST['contactMethod'];
        $previousComplaints = $_POST['previousComplaints'];
        $issueDescription = $_POST['issueDescription'];
        $stepsTaken = $_POST['stepsTaken'];
        $additionalComments = $_POST['additionalComments'];
        $selectedFile = $_POST['selectedFile'];
        $uuid = $_POST['uuid'];
        $clientid = $_POST['clientid'];

        // Pass all values to the saveComplaintDetails method
        Clients::saveComplaintDetails(
            $propertyName,
            $apartmentNumber,
            $location,
            $complaintType,
            $issueCategory,
            $expectedResolutionTime,
            $incidentSeverity,
            $complaintPriority,
            $contactMethod,
            $previousComplaints,
            $issueDescription,
            $stepsTaken,
            $additionalComments,
            $uuid,
            $clientid
        );
    }

    public function saveVerification() {
        $verifyRemarks = $_POST['verifyRemarks'];
        $verifyFeedback = $_POST['verifyFeedback'];
        $idIndex = $_POST['idIndex'];

        Clients::saveVerification(
            $verifyRemarks,
            $verifyFeedback,
            $idIndex
        );
    }


}