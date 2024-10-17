<?php

class Tenants extends tableDataObject
{
    const TABLENAME = 'tenants';

    public static function saveTenant($fullName,
                            $birthDate,
                            $gender,
                            $emailAddress,
                            $phoneNumber,
                            $altPhoneNumber,
                            $residentialAddress,
                            $nationality,
                            $nationalId,
                            $maritalStatus,
                            $emergencyName,
                            $emergencyContact,
                            $occupation,
                            $employerName,
                            $employerContact,
                            $uuid) {

        global $healthdb;

        // Query to check if the UUID already exists
        $getByUuid = "SELECT * FROM `tenants` WHERE `uuid` = '$uuid'";
        $healthdb->prepare($getByUuid);
        $resultByUuid = $healthdb->singleRecord();

        if ($resultByUuid) {
            // Check if the new property name already exists for a different UUID
            $checkNameConflict = "SELECT * FROM `tenants` WHERE `tenantName` = '$fullName' AND `uuid` != '$uuid'";
            $healthdb->prepare($checkNameConflict);
            $resultNameConflict = $healthdb->singleRecord();

            if ($resultNameConflict) {
                // If the tenant name exists for a different UUID, echo 2
                echo 2;
            } else {
                // If no conflict, update the existing record
                $query = "UPDATE `tenants` 
                        SET `tenantName` = '$fullName',
                            `updatedAt` = NOW()
                        WHERE `uuid` = '$uuid'";

                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;  // Successfully updated
            }
        } else {
            // Query to check if a tenant with the same name exists
            $getByName = "SELECT * FROM `tenants` WHERE `tenantName` = '$fullName'";
            $healthdb->prepare($getByName);
            $resultByName = $healthdb->singleRecord();

            if ($resultByName) {
                // If a different UUID exists but the same tenant name exists, echo 2
                echo 2;
            } else {
                // Insert new tenant if no conflicts
                $query = "INSERT INTO `tenants`
                            (`tenantName`,
                            `createdAt`,
                            `uuid`)
                        VALUES ('$fullName',
                                NOW(),
                                '$uuid')";

                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;  // Successfully inserted
            }
        }
    }


}