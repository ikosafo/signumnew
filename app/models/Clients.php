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
            'contractType' => $resultRec->contractType,
            'clientid' => $resultRec->clientid

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

        $chkEmail = "SELECT * FROM `clients` WHERE `emailAddress` = '$emailAddress' AND `uuid` != '$uuid'";
        $healthdb->prepare($chkEmail);
        $resultEmail = $healthdb->singleRecord();

        if ($resultEmail) {
            // Email already exists for a different UUID
            echo "Email already exists for a different client";
            return;
        }

        if ($resultuuid) {

             // If UUID exists, update the existing record
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
            `contractType` = '$contractType'

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

                    $subject = 'Welcome to Signum Properties - Account Created';

                    $password = Tools::generateRandomPassword();

                    $message = "Dear <span style='text-transform: uppercase'>$fullName</span>, 

                    <p>Welcome to <b>Signum Properties</b>! Your account has been successfully created.</p>
                    <p>You can log in to your portal at <a href='https://signumproperties.com'>https://signumproperties.com</a>.</p>
                    <p><b>Login Credentials:</b><br>
                    Username: <b>$emailAddress</b><br>
                    Password: <b>$password</b></p>

                    <p>Please keep these credentials secure. We recommend updating your password after your first login.</p>
                    <p>Thank you,<br>The Signum Properties Team</p>";

                    SendEmail::compose($emailAddress, $subject, $message);
                   
                    $chkUsername = "SELECT * FROM `users` WHERE `username` = '$emailAddress'";
                    $healthdb->prepare($chkUsername);
                    $resultUsername = $healthdb->singleRecord();

                    if (!$resultUsername) {
                        $insertUser = "INSERT INTO `users` (`username`, `password`, `user_id`, `createdAt`,`accessLevel`) VALUES ('$emailAddress', '" . md5($password) . "', '$uuid', NOW(), 'Client')";
                        $healthdb->prepare($insertUser);
                        $healthdb->execute();
                        echo 3; 
                    } else {
                        echo "Username already exists.";
                    }
  
        }

       

    }

    public static function saveComplaintDetails(
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
    ) {
        global $healthdb;
    
        $query = "INSERT INTO `complaints`
                    (`propertyid`, `apartment`, `location`, `complaintType`, `issueCategory`, 
                    `resolutionTime`, `incidentSeverity`, `compliantPriority`, `contactMethod`, 
                    `previousIssue`, `issueDescription`, `stepsTaken`, `additionalComments`, 
                    `createdAt`, `uuid`, `clientid`)
                  VALUES (
                    :propertyName, :apartmentNumber, :location, :complaintType, :issueCategory,
                    :expectedResolutionTime, :incidentSeverity, :complaintPriority, :contactMethod, 
                    :previousComplaints, :issueDescription, :stepsTaken, :additionalComments,
                    NOW(), :uuid, :clientid)";
    
            $healthdb->prepare($query);
        
            // Bind the variables using named parameters
            $healthdb->bind(':propertyName', $propertyName);
            $healthdb->bind(':apartmentNumber', $apartmentNumber);
            $healthdb->bind(':location', $location);
            $healthdb->bind(':complaintType', $complaintType);
            $healthdb->bind(':issueCategory', $issueCategory);
            $healthdb->bind(':expectedResolutionTime', $expectedResolutionTime);
            $healthdb->bind(':incidentSeverity', $incidentSeverity);
            $healthdb->bind(':complaintPriority', $complaintPriority);
            $healthdb->bind(':contactMethod', $contactMethod);
            $healthdb->bind(':previousComplaints', $previousComplaints);
            $healthdb->bind(':issueDescription', $issueDescription);
            $healthdb->bind(':stepsTaken', $stepsTaken);
            $healthdb->bind(':additionalComments', $additionalComments);
            $healthdb->bind(':uuid', $uuid);
            $healthdb->bind(':clientid', $clientid);

            // Execute the statement and check for errors
            if (!$healthdb->execute()) {
                die('Execute error: ' . $healthdb->error);
            } else {
                echo 1;  // Successfully inserted
            }
        }
    


}