<?php

class Properties extends tableDataObject
{
    const TABLENAME = 'properties';


    public static function getPropertyNumber(){
        global $healthdb;
    
        $getnum = "SELECT COUNT(*) as count FROM `properties` WHERE `status` = 1";
        $healthdb->prepare($getnum);
        $result = $healthdb->singleRecord();
        return $result->count;
    }


    public static function getApartmentNumber(){
        global $healthdb;
    
        $getnum = "SELECT COUNT(*) as count FROM `properties` WHERE `propertyType` = 'Apartment' AND `status` = 1";
        $healthdb->prepare($getnum);
        $result = $healthdb->singleRecord();
        return $result->count;
    }


    public static function getHouseNumber(){
        global $healthdb;
    
        $getnum = "SELECT COUNT(*) as count FROM `properties` WHERE `propertyType` = 'House' AND `status` = 1";
        $healthdb->prepare($getnum);
        $result = $healthdb->singleRecord();
        return $result->count;
    }


    public static function getCommercialNumber(){
        global $healthdb;
    
        $getnum = "SELECT COUNT(*) as count FROM `properties` WHERE `propertyType` = 'Commercial' AND `status` = 1";
        $healthdb->prepare($getnum);
        $result = $healthdb->singleRecord();
        return $result->count;
    }


    public static function getLandNumber(){
        global $healthdb;
    
        $getnum = "SELECT COUNT(*) as count FROM `properties` WHERE `propertyType` = 'Land' AND `status` = 1";
        $healthdb->prepare($getnum);
        $result = $healthdb->singleRecord();
        return $result->count;
    }


    public static function getFurnishedNumber(){
        global $healthdb;
    
        $getnum = "SELECT COUNT(*) as count FROM `properties` WHERE `furnishingStatus` = 'Furnished' AND `status` = 1";
        $healthdb->prepare($getnum);
        $result = $healthdb->singleRecord();
        return $result->count;
    }


    public static function getUnfurnishedNumber(){
        global $healthdb;
    
        $getnum = "SELECT COUNT(*) as count FROM `properties` WHERE `furnishingStatus` = 'Unfurnished' AND `status` = 1";
        $healthdb->prepare($getnum);
        $result = $healthdb->singleRecord();
        return $result->count;
    }


    public static function getSemifurnishedNumber(){
        global $healthdb;
    
        $getnum = "SELECT COUNT(*) as count FROM `properties` WHERE `furnishingStatus` = 'Semi-Furnished' AND `status` = 1";
        $healthdb->prepare($getnum);
        $result = $healthdb->singleRecord();
        return $result->count;
    }
    

    public static function saveProperty($propertyName,
                                    $propertyType,
                                    $propertyCategory,
                                    $propertyAddress,
                                    $location,
                                    $description,
                                    $numberOfTenants,
                                    $propertySize,
                                    $furnishingStatus,
                                    $propertyManager,
                                    $selectedFacilities,
                                    $uuid) {

        global $healthdb;
        $facilitiesString = implode(',', $selectedFacilities);
        $propertyManagerString = implode(',', $propertyManager);

        // Query to check if the UUID already exists
        $getByUuid = "SELECT * FROM `properties` WHERE `uuid` = '$uuid'";
        $healthdb->prepare($getByUuid);
        $resultByUuid = $healthdb->singleRecord();

        if ($resultByUuid) {
            // Check if the new property name already exists for a different UUID
            $checkNameConflict = "SELECT * FROM `properties` WHERE `propertyName` = '$propertyName' AND `uuid` != '$uuid'";
            $healthdb->prepare($checkNameConflict);
            $resultNameConflict = $healthdb->singleRecord();

            if ($resultNameConflict) {
                // If the property name exists for a different UUID, echo 2
                echo 2;
            } else {
                // If no conflict, update the existing record
                $query = "UPDATE `properties` 
            SET `propertyName` = :propertyName,
                `propertyType` = :propertyType,
                `propertyCategory` = :propertyCategory,
                `propertyAddress` = :propertyAddress,
                `location` = :location,
                `description` = :description,
                `numberOfTenants` = :numberOfTenants,
                `propertySize` = :propertySize,
                `furnishingStatus` = :furnishingStatus,
                `propertyManager` = :propertyManager,
                `facilities` = :facilities,
                `updatedAt` = NOW()
            WHERE `uuid` = :uuid";

                $healthdb->prepare($query);
                $healthdb->bind(':propertyName', $propertyName);
                $healthdb->bind(':propertyType', $propertyType);
                $healthdb->bind(':propertyCategory', $propertyCategory);
                $healthdb->bind(':propertyAddress', $propertyAddress);
                $healthdb->bind(':location', $location);
                $healthdb->bind(':description', $description);
                $healthdb->bind(':numberOfTenants', $numberOfTenants);
                $healthdb->bind(':propertySize', $propertySize);
                $healthdb->bind(':furnishingStatus', $furnishingStatus);
                $healthdb->bind(':propertyManager', $propertyManagerString);
                $healthdb->bind(':facilities', $facilitiesString);
                $healthdb->bind(':uuid', $uuid);

                // Execute the statement and check for errors
                if (!$healthdb->execute()) {
                    die('Execute error: ' . $healthdb->error);
                } else {
                    echo 3;  // Print success message
                }

            }
        } else {
            // Query to check if a property with the same name exists
            $getByName = "SELECT * FROM `properties` WHERE `propertyName` = '$propertyName'";
            $healthdb->prepare($getByName);
            $resultByName = $healthdb->singleRecord();

            if ($resultByName) {
                // If a different UUID exists but the same property name exists, echo 2
                echo 2;
            } else {
                // Insert new property if no conflicts
                $query = "INSERT INTO `properties`
                    (`propertyName`, `propertyType`, `propertyCategory`, `propertyAddress`, `location`, `description`, `numberOfTenants`, `propertySize`, `furnishingStatus`, `propertyManager`, `facilities`, `createdAt`, `uuid`)
                    VALUES (:propertyName, :propertyType, :propertyCategory, :propertyAddress, :location, :description, :numberOfTenants, :propertySize, :furnishingStatus, :propertyManager, :facilities, NOW(), :uuid)";

                    $healthdb->prepare($query);

                    // Bind the variables using named parameters
                    $healthdb->bind(':propertyName', $propertyName);
                    $healthdb->bind(':propertyType', $propertyType);
                    $healthdb->bind(':propertyCategory', $propertyCategory);
                    $healthdb->bind(':propertyAddress', $propertyAddress);
                    $healthdb->bind(':location', $location);
                    $healthdb->bind(':description', $description);
                    $healthdb->bind(':numberOfTenants', $numberOfTenants);
                    $healthdb->bind(':propertySize', $propertySize);
                    $healthdb->bind(':furnishingStatus', $furnishingStatus);
                    $healthdb->bind(':propertyManager', $propertyManagerString);
                    $healthdb->bind(':facilities', $facilitiesString);
                    $healthdb->bind(':uuid', $uuid);

                    // Execute the statement and check for errors
                    if (!$healthdb->execute()) {
                        die('Execute error: ' . $healthdb->error);
                    } else {
                        echo 1;  // Successfully inserted
                    }

                

                $logInsQ = "insert into systemlog (logcategory,user,logmessage,diagnostic)
					values ('debug','AD API',:message,:logdiag)";

                    $healthdb->prepare($facilitiesString);
                    $healthdb->bind(':pin', $propertyManagerString);
            }
        }
    }


    public static function saveCategory($categoryName, $uuid, $description) {

        global $healthdb;
    
        $getName = "SELECT * FROM `propertycategory` WHERE `categoryName` = '$categoryName' AND `uuid` != '$uuid' AND `status` = 1";
        $healthdb->prepare($getName);
        $resultName = $healthdb->singleRecord();
    
        if ($resultName) {
            // Category already exists
            echo 2;
        } else {
            // Check if the category with the given UUID exists
            $getCategory = "SELECT * FROM `propertycategory` WHERE `uuid` = '$uuid' AND `status` = 1";
            $healthdb->prepare($getCategory);
            $resultCategory = $healthdb->singleRecord();
    
            if ($resultCategory) {
                // Update existing category
                $updateQuery = "UPDATE `propertycategory` 
                                SET `categoryName` = '$categoryName',
                                    `description` = '$description', 
                                    `updatedAt` = NOW() 
                                WHERE `uuid` = '$uuid'";
                $healthdb->prepare($updateQuery);
                $healthdb->execute();
                echo 3;  // Successfully updated
            } else {
                // Insert new category
                $query = "INSERT INTO `propertycategory`
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
    
    

    public static function savePhase($phaseName, $uuid, $description) {

        global $healthdb;
    
        $getName = "SELECT * FROM `propertyphase` WHERE `phaseName` = '$phaseName' AND `uuid` != '$uuid' AND `status` = 1";
        $healthdb->prepare($getName);
        $resultName = $healthdb->singleRecord();
    
        if ($resultName) {
            echo 2; 
        } else {
            $getPhase = "SELECT * FROM `propertyphase` WHERE `uuid` = '$uuid' AND `status` = 1";
            $healthdb->prepare($getPhase);
            $resultPhase = $healthdb->singleRecord();
    
            if ($resultPhase) {
                $updateQuery = "UPDATE `propertyphase` 
                                SET `phaseName` = '$phaseName',
                                    `description` = '$description', 
                                    `updatedAt` = NOW() 
                                WHERE `uuid` = '$uuid'";
                $healthdb->prepare($updateQuery);
                $healthdb->execute();
                echo 3; 
            } else {
                $query = "INSERT INTO `propertyphase`
                (
                `phaseName`,
                `uuid`,
                `description`,
                `createdAt`
                )
                VALUES (
                        '$phaseName',
                        '$uuid',
                        '$description',
                        NOW()
                        )";
    
                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;
            }
        }
    }


    public static function saveActivity($activityName, $uuid, $description) {

        global $healthdb;
    
        $getName = "SELECT * FROM `propertyactivity` WHERE `activityName` = '$activityName' AND `uuid` != '$uuid' AND `status` = 1";
        $healthdb->prepare($getName);
        $resultName = $healthdb->singleRecord();
    
        if ($resultName) {
            echo 2;
        } else {
            $getActivity = "SELECT * FROM `propertyactivity` WHERE `uuid` = '$uuid' AND `status` = 1";
            $healthdb->prepare($getActivity);
            $resultActivity = $healthdb->singleRecord();
    
            if ($resultActivity) {
                $updateQuery = "UPDATE `propertyactivity` 
                                SET `activityName` = '$activityName', 
                                    `description` = '$description', 
                                    `updatedAt` = NOW() 
                                WHERE `uuid` = '$uuid'";
                $healthdb->prepare($updateQuery);
                $healthdb->execute();
                echo 3; // Successfully updated
            } else {
                // Insert new activity
                $query = "INSERT INTO `propertyactivity`
                (
                `activityName`,
                `uuid`,
                `description`,
                `createdAt`
                )
                VALUES (
                        '$activityName',
                        '$uuid',
                        '$description',
                        NOW()
                        )";
    
                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1; // Successfully inserted
            }
        }
    }    


    public static function deleteMaintenanceFee($feeid) {
        global $healthdb;
        $query = "UPDATE `maintenancefee` 
        SET `status` = 0,
        `updatedAt` = NOW()
        WHERE `feeid` = '$feeid'";

        $healthdb->prepare($query);
        $healthdb->execute();
        echo 1;  // Successfully updated
       
    }


    public static function saveMaintenanceFee($phaseName,$activityName,$details,$uuid,$amount) {

        global $healthdb;
    
        $getName = "SELECT * FROM `maintenancefee` WHERE 
        `phaseid` = '$phaseName' AND `activityid` = '$activityName' AND
        `details` = '$details' AND `uuid` != '$uuid' AND `status` = 1";
        $healthdb->prepare($getName);
        $resultName = $healthdb->singleRecord();
    
        if ($resultName) {
            echo 2; 
        } else {
            $getPhase = "SELECT * FROM `maintenancefee` WHERE `uuid` = '$uuid' AND `status` = 1";
            $healthdb->prepare($getPhase);
            $resultPhase = $healthdb->singleRecord();
    
            if ($resultPhase) {
                $updateQuery = "UPDATE `maintenancefee` 
                                SET `phaseid` = '$phaseName',
                                    `activityid` = '$activityName',
                                    `details` = '$details', 
                                    `amount` = '$amount',
                                    `updatedAt` = NOW() 
                                WHERE `uuid` = '$uuid'";
                $healthdb->prepare($updateQuery);
                $healthdb->execute();
                echo 3; 
            } else {
                $query = "INSERT INTO `maintenancefee`
                (
                `phaseid`,
                `activityid`,
                `details`,
                `amount`,
                `uuid`,
                `createdAt`
                )
                VALUES (
                        '$phaseName',
                        '$activityName',
                        '$details',
                        '$amount',
                        '$uuid',
                        NOW()
                        )";
    
                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;
            }
        }
    }
    

    
    public static function editCategory($categoryName,$description,$catid) {

        global $healthdb;

        $getName = "SELECT * FROM `propertycategory` WHERE `categoryName` = '$categoryName' AND `status` = 1";
        $healthdb->prepare($getName);
        $resultName = $healthdb->singleRecord();

        if ($resultName) {
            //Already exists
            echo 2;
        }
        else {
            $query = "UPDATE `propertycategory` 
            SET `categoryName` = '$categoryName',
            `updatedAt` = NOW(),
            `description` = '$description'
            WHERE `categoryId` = '$catid'";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1;  // Successfully updated
        }
       
    }

    
    public static function deleteCategory($catid) {

        global $healthdb;
            $query = "UPDATE `propertycategory` 
            SET `status` = 0,
            `updatedAt` = NOW()
            WHERE `categoryId` = '$catid'";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1;  // Successfully updated
       
    }


    public static function deletePhase($phaseid) {

        global $healthdb;
            $query = "UPDATE `propertyphase` 
            SET `status` = 0,
            `updatedAt` = NOW()
            WHERE `phaseId` = '$phaseid'";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1;  // Successfully updated
       
    }


    public static function deleteActivity($activityid) {

        global $healthdb;
            $query = "UPDATE `propertyactivity` 
            SET `status` = 0,
            `updatedAt` = NOW()
            WHERE `activityId` = '$activityid'";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1;  // Successfully updated
       
    }


    public static function deleteProperty($propertyid) {

        global $healthdb;
            $query = "UPDATE `properties` 
            SET `status` = 0,
            `updatedAt` = NOW()
            WHERE `propertyId` = '$propertyid'";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1; 
       
    }


    public static function deleteRentInfo($rentid) {

        global $healthdb;
            $query = "UPDATE `rentinfo` 
            SET `status` = 0,
            `updatedAt` = NOW()
            WHERE `rentid` = '$rentid'";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1; 
       
    }


    public static function saveRentalDetails(
                                $rentAmount,
                                $depositAmount,
                                $leasePeriod,
                                $availabilityDate,
                                $utilitiesIncluded,
                                $paymentFrequency,
                                $uuid,
                                $numberRooms
                                ) {

        global $healthdb;

        //$rentAmountString = implode(',', $rentAmount);
        $numberRoomsString = implode(',', $numberRooms);

        // If no conflict, update the existing record
        $query = "UPDATE `properties` 
        SET `rentAmount` = :rentAmount,
            `depositAmount` = :depositAmount,
            `leasePeriod` = :leasePeriod,
            `availabilityDate` = :availabilityDate,
            `utilitiesIncluded` = :utilitiesIncluded,
            `paymentFrequency` = :paymentFrequency,
            `numberRooms` = :numberRooms,
            `updatedAt` = NOW()
        WHERE `uuid` = :uuid";

        // Prepare the query
        $healthdb->prepare($query);

        // Bind parameters to the query
        $healthdb->bind(':rentAmount', $rentAmount);
        $healthdb->bind(':depositAmount', $depositAmount);
        $healthdb->bind(':leasePeriod', $leasePeriod);
        $healthdb->bind(':availabilityDate', $availabilityDate);
        $healthdb->bind(':utilitiesIncluded', $utilitiesIncluded);
        $healthdb->bind(':paymentFrequency', $paymentFrequency);
        $healthdb->bind(':numberRooms', $numberRoomsString);
        $healthdb->bind(':uuid', $uuid);

        // Execute and check for errors
        if (!$healthdb->execute()) {
            die('Execute error: ' . $healthdb->error);
        } else {
            echo 1;  // Indicate success
        }

    }


    public static function saveRentInfo(
        $rentAmount,
        $phaseid,
        $securityDeposit,
        $penaltyAmount,
        $startDate,
        $endDate,
        $leaseType,
        $bedroomNumber,
        $leaseRenewable,
        $additionalDescription,
        $additionalCharges,
        $uuid,
        $propertyid,
        $clientid
        ) {
        global $healthdb;
    
        $getByUUID = "SELECT * FROM `rentinfo` WHERE `clientid` = '$clientid' AND `uuid` = '$uuid'";
        $healthdb->prepare($getByUUID);
        $resultByUUID = $healthdb->singleRecord();
    
        if ($resultByUUID) {
            $query = "UPDATE `rentinfo`
                SET 
                    `propertyid` = '$propertyid',
                    `rentAmount` = '$rentAmount',
                    `securityAmount` = '$securityDeposit',
                    `penaltyAmount` = '$penaltyAmount',
                    `startDate` = '$startDate',
                    `endDate` = '$endDate',
                    `leaseType` = '$leaseType',
                    `numberRoom` = '$bedroomNumber',
                    `renewable` = '$leaseRenewable',
                    `description` = '$additionalDescription',
                    `addCharges` = '$additionalCharges',
                    `updatedAt` = NOW(),
                    `phaseid` = '$phaseid'
                WHERE `uuid` = '$uuid'";
    
            $healthdb->prepare($query);
            $healthdb->execute();
    
            echo 3; // Updated
        } else {
            $getByClient = "SELECT * FROM `rentinfo` WHERE `clientid` = '$clientid' AND `endDate` >= NOW()";
            $healthdb->prepare($getByClient);
            $resultByClient = $healthdb->singleRecord();
    
            if ($resultByClient) {
                echo 2; // Another active lease exists
            } else {
                $query = "INSERT INTO `rentinfo` (
                        `propertyid`,
                        `phaseid`,
                        `clientid`,
                        `rentAmount`,
                        `securityAmount`,
                        `penaltyAmount`,
                        `startDate`,
                        `endDate`,
                        `leaseType`,
                        `numberRoom`,
                        `renewable`,
                        `description`,
                        `addCharges`,
                        `uuid`,
                        `createdAt`
                    )
                    VALUES (
                        '$propertyid',
                        '$phaseid',
                        '$clientid',
                        '$rentAmount',
                        '$securityDeposit',
                        '$penaltyAmount',
                        '$startDate',
                        '$endDate',
                        '$leaseType',
                        '$bedroomNumber',
                        '$leaseRenewable',
                        '$additionalDescription',
                        '$additionalCharges',
                        '$uuid',
                        NOW()
                    )";
    
                $healthdb->prepare($query);
                $healthdb->execute();
    
                // Add billing rows
                self::generateMonthlyBills($startDate, $endDate, $uuid, $clientid);

                $subject = 'Rent Agreement Confirmation and Details';
                $fullName = Tools::clientName($clientid);
                $emailAddress = Tools::clientEmail($clientid);
                $propertyName = Tools::propertyClient($propertyid);
                $phaseName = Tools::propertyPhase($phaseid);

                $message = "<p>Dear $fullName,</p>

                <p>We are pleased to confirm that your rent agreement has been successfully recorded in our system. Below are the details of your rent agreement:</p>

                <table style='border-collapse: collapse; width: 70%;'>
                    <tr>
                        <td><strong>Property Name:</strong></td>
                        <td>$propertyName</td>
                    </tr>
                    <tr>
                        <td><strong>Phase:</strong></td>
                        <td>$phaseName</td>
                    </tr>
                    <tr>
                        <td><strong>Bedroom Number:</strong></td>
                        <td>$bedroomNumber</td>
                    </tr>
                    <tr>
                        <td><strong>Rent Amount:</strong></td>
                        <td>$rentAmount</td>
                    </tr>
                    <tr>
                        <td><strong>Security Deposit:</strong></td>
                        <td>$securityDeposit</td>
                    </tr>
                    <tr>
                        <td><strong>Penalty:</strong></td>
                        <td>$penaltyAmount</td>
                    </tr>
                    <tr>
                        <td><strong>Lease Start Date:</strong></td>
                        <td>$startDate</td>
                    </tr>
                    <tr>
                        <td><strong>Lease End Date:</strong></td>
                        <td>$endDate</td>
                    </tr>
                    <tr>
                        <td><strong>Lease Type:</strong></td>
                        <td>$leaseType</td>
                    </tr>
                    <tr>
                        <td><strong>Renewable:</strong></td>
                        <td>$leaseRenewable</td>
                    </tr>
                    <tr>
                        <td><strong>Additional Charges:</strong></td>
                        <td>$additionalCharges</td>
                    </tr>
                    <tr>
                        <td><strong>Description:</strong></td>
                        <td>$additionalDescription</td>
                    </tr>
                </table>

                <p>Please review these details and notify us immediately if there are any discrepancies. We value your tenancy and are committed to ensuring a smooth rental experience.</p>

                <p>If you have any questions or need further assistance, please contact us at support@signumproperties.com or call +233 557 232 232.</p>

                <p>Thank you for choosing our services, and we look forward to serving you better.</p>

                <p>Best regards,</p>
                <p>The Signum Properties Team</p>";


                SendEmail::compose($emailAddress, $subject, $message);
    
                echo 1; // Successfully inserted
            }
        }
    }
   
    

    // Generate monthly billing records
    public static function generateMonthlyBills($startDate, $endDate, $uuid, $clientid)
    {
        global $healthdb;

        //$rentAmount = Tools::getMaintenanceFee($clientid);
    
        // Convert dates to DateTime objects
        $start = new DateTime($startDate);
        $end = new DateTime($endDate);
    
        // Set to the first day of the month
        $start->modify('first day of this month');
    
        // Loop through each month until the end date
        while ($start <= $end) {
            $dateDue = $start->format('Y-m-d');
    
            // Prepare the insert query for billing
            $query = "INSERT INTO `billing` (
                    `billType`,
                    `clientid`,
                    `createdAt`,
                    `uuid`,
                    `description`,
                    `dateDue`
                )
                VALUES (
                    'Maintenance', 
                    '$clientid',
                    NOW(),
                    '$uuid',
                    'Monthly rent due',
                    '$dateDue'
                )";
    
                $healthdb->prepare($query);
                $healthdb->execute();
    
            // Move to the next month
            $start->modify('+1 month');
        }
    }
    


    public static function listPropertyCategory() {
        global $healthdb;

        $getList = "SELECT * FROM `propertycategory` where `status` = 1 ORDER BY `categoryId` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function listPropertyActivity() {
        global $healthdb;

        $getList = "SELECT * FROM `propertyactivity` where `status` = 1 ORDER BY `activityId` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function listPropertyPhase() {
        global $healthdb;

        $getList = "SELECT * FROM `propertyphase` where `status` = 1 ORDER BY `phaseId` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function listMaintenanceFee() {
        global $healthdb;

        $getList = "SELECT * FROM `maintenancefee` where `status` = 1 ORDER BY `feeid` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }

    
    public static function listRentInformation() {
        global $healthdb;

        $getList = "SELECT * FROM `rentinfo` where `status` = 1 ORDER BY `createdAt` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }
    
    
    public static function categoryDetails($catid) {
        global $healthdb;

        $getList = "SELECT * FROM `propertycategory` where `categoryId` = '$catid'";
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


    public static function phaseDetails($phaseid) {
        global $healthdb;

        $getList = "SELECT * FROM `propertyphase` where `phaseId` = '$phaseid'";
        $healthdb->prepare($getList);
        $resultRec = $healthdb->singleRecord();
        $phaseName = $resultRec->phaseName;
        $uuid = $resultRec->uuid;
        $description = $resultRec->description;
        return [
            'phaseName' => $phaseName,
            'uuid' => $uuid,
            'description' => $description
        ];
    }


    public static function activityDetails($activityid) {
        global $healthdb;

        $getList = "SELECT * FROM `propertyactivity` where `activityId` = '$activityid'";
        $healthdb->prepare($getList);
        $resultRec = $healthdb->singleRecord();
        $activityName = $resultRec->activityName;
        $uuid = $resultRec->uuid;
        $description = $resultRec->description;
        return [
            'activityName' => $activityName,
            'uuid' => $uuid,
            'description' => $description
        ];
    }


    public static function listProperties() {
        global $healthdb;

        $getList = "SELECT * FROM `properties` where `status` = 1 ORDER BY createdAt DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function listPhases() {
        global $healthdb;

        $getList = "SELECT * FROM `propertyphase` where `status` = 1 ORDER BY createdAt DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }
    

    public static function listPhase() {
        global $healthdb;

        $getList = "SELECT * FROM `propertyphase` where `status` = 1 ORDER BY createdAt DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function listActivity() {
        global $healthdb;

        $getList = "SELECT * FROM `propertyactivity` where `status` = 1 ORDER BY createdAt DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }

    
    public static function listClients() {
        global $healthdb;

        $getList = "SELECT * FROM `clients` where `status` = 1 ORDER BY `createdAt` DESC, `updatedAt` DESC, fullName";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function listClientsProp($propertyId) {
        global $healthdb;

        $getList = "SELECT * FROM `clients` where `status` = 1 AND propertyid = '$propertyId' ORDER BY `createdAt` DESC, `updatedAt` DESC, fullName";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function listRentDue($clientid) {
        global $healthdb;

        $getList = "SELECT * FROM `rentinfo` WHERE `clientid` = '$clientid' AND `status` = 1 ORDER BY `createdAt` DESC, `updatedAt` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function listMaintenanceDue($clientid) {
        global $healthdb;

        $getList = "SELECT * FROM `billing` WHERE `clientid` = '$clientid' AND `status` = 1 ORDER BY `createdAt` DESC, `updatedAt` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function previousRent($clientid,$lastRentId) {
        global $healthdb;

        $getList = "SELECT * FROM `rentinfo` WHERE `clientid` = '$clientid' AND `rentid` != '$lastRentId' AND `status` = 1 ORDER BY `createdAt` DESC, `updatedAt` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }
    
 
    public static function propertyDetails($propertyid) {
        global $healthdb;
    
        $getList = "SELECT * FROM `properties` WHERE `propertyId` = '$propertyid' OR `uuid` = '$propertyid'";
        $healthdb->prepare($getList);
        $resultRec = $healthdb->singleRecord();
    
        return [
            'propertyName' => $resultRec->propertyName,
            'propertyType' => $resultRec->propertyType,
            'propertyCategory' => $resultRec->propertyCategory,
            'propertyAddress' => $resultRec->propertyAddress,
            'location' => $resultRec->location,
            'description' => $resultRec->description,
            'numberOfTenants' => $resultRec->numberOfTenants,
            'propertySize' => $resultRec->propertySize,
            'furnishingStatus' => $resultRec->furnishingStatus,
            'propertyManager' => $resultRec->propertyManager,
            'createdAt' => $resultRec->createdAt,
            'updatedAt' => $resultRec->updatedAt,
            'uuid' => $resultRec->uuid,
            'facilities' => $resultRec->facilities,
            'status' => $resultRec->status,
            'rentAmount' => $resultRec->rentAmount,
            'depositAmount' => $resultRec->depositAmount,
            'leasePeriod' => $resultRec->leasePeriod,
            'availabilityDate' => $resultRec->availabilityDate,
            'utilitiesIncluded' => $resultRec->utilitiesIncluded,
            'paymentFrequency' => $resultRec->paymentFrequency,
            'propertyId' => $resultRec->propertyId,
            'numberRooms' => $resultRec->numberRooms

        ];
    }


    public static function ownerDetails($propertyid) {
        global $healthdb;
    
        $getList = "SELECT * FROM `clients` WHERE `propertyid` = '$propertyid'";
        $healthdb->prepare($getList);
        $resultRec = $healthdb->singleRecord();
    
        return [
            'clientType' => @$resultRec->clientType,
            'ownershipType' => @$resultRec->ownershipType,
            'fullName' => @$resultRec->fullName,
            'emailAddress' => @$resultRec->emailAddress,
            'phoneNumber' => @$resultRec->phoneNumber,
            'altPhoneNumber' => @$resultRec->altPhoneNumber,
            'residentialAddress' => @$resultRec->residentialAddress,
            'nationality' => @$resultRec->nationality,
            'birthDate' => @$resultRec->birthDate,
            'gender' => @$resultRec->gender,
            'maritalStatus' => @$resultRec->maritalStatus,
            'occupation' => @$resultRec->occupation,
            'employersName' => @$resultRec->employersName,
            'employersPhone' => @$resultRec->employersPhone,
            'emergencyName' => @$resultRec->emergencyName,
            'emergencyPhone' => @$resultRec->emergencyPhone,
            'uuid' => @$resultRec->uuid,
            'propertyid' => @$resultRec->propertyid,
            'contractType' => @$resultRec->contractType

        ];
    }

    
    public static function rentInfo($rentid) {
        global $healthdb;
    
        $getList = "SELECT * FROM `rentinfo` WHERE `rentid` = '$rentid'";
        $healthdb->prepare($getList);
        $resultRec = $healthdb->singleRecord();
    
        return [
            'rentAmount' => $resultRec->rentAmount,
            'securityAmount' => $resultRec->securityAmount,
            'penaltyAmount' => $resultRec->penaltyAmount,
            'startDate' => $resultRec->startDate,
            'endDate' => $resultRec->endDate,
            'leaseType' => $resultRec->leaseType,
            'numberRoom' => $resultRec->numberRoom,
            'renewable' => $resultRec->renewable,
            'description' => $resultRec->description,
            'addCharges' => $resultRec->addCharges,
            'clientid' => $resultRec->clientid,
            'propertyid' => $resultRec->propertyid,
            'uuid' => $resultRec->uuid,
            'phaseid' => $resultRec->phaseid,
            'createdAt' => $resultRec->createdAt,
            'rentid' => $resultRec->rentid
        ];
    }

}