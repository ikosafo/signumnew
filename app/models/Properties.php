<?php

class Properties extends tableDataObject
{
    const TABLENAME = 'properties';

    public static function saveProperty($propertyName,
                                    $propertyType,
                                    $propertyCategory,
                                    $propertyAddress,
                                    $location,
                                    $description,
                                    $numberOfUnits,
                                    $propertySize,
                                    $furnishingStatus,
                                    $propertyManager,
                                    $selectedFacilities,
                                    $uuid) {

        global $healthdb;
        $facilitiesString = implode(',', $selectedFacilities);

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
                        SET `propertyName` = '$propertyName',
                            `propertyType` = '$propertyType',
                            `propertyCategory` = '$propertyCategory',
                            `propertyAddress` = '$propertyAddress',
                            `location` = '$location',
                            `description` = '$description',
                            `numberOfUnits` = '$numberOfUnits',
                            `propertySize` = '$propertySize',
                            `furnishingStatus` = '$furnishingStatus',
                            `propertyManager` = '$propertyManager',
                            `facilities` = '$facilitiesString',
                            `updated_at` = NOW()
                        WHERE `uuid` = '$uuid'";

                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;  // Successfully updated
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
                            (`propertyName`,
                            `propertyType`,
                            `propertyCategory`,
                            `propertyAddress`,
                            `location`,
                            `description`,
                            `numberOfUnits`,
                            `propertySize`,
                            `furnishingStatus`,
                            `propertyManager`,
                            `facilities`,
                            `created_at`,
                            `uuid`)
                        VALUES ('$propertyName',
                                '$propertyType',
                                '$propertyCategory',
                                '$propertyAddress',
                                '$location',
                                '$description',
                                '$numberOfUnits',
                                '$propertySize',
                                '$furnishingStatus',
                                '$propertyManager',
                                '$facilitiesString',
                                NOW(),
                                '$uuid')";

                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;  // Successfully inserted
            }
        }
    }


    public static function saveOwnerDetails($ownerFullName,
                                    $ownerEmail,
                                    $ownerPhone,
                                    $ownerAddress,
                                    $ownerCity,
                                    $ownershipType,
                                    $ownerComments,
                                    $uuid) {

        global $healthdb;

        // If no conflict, update the existing record
        $query = "UPDATE `properties` 
        SET `ownerFullName` = '$ownerFullName',
            `ownerEmail` = '$ownerEmail',
            `ownerPhone` = '$ownerPhone',
            `ownerAddress` = '$ownerAddress',
            `ownerCity` = '$ownerCity',
            `ownershipType` = '$ownershipType',
            `ownerComments` = '$ownerComments',
            `updated_at` = NOW()
        WHERE `uuid` = '$uuid'";

        $healthdb->prepare($query);
        $healthdb->execute();
        echo 1;  // Successfully updated

    }
}