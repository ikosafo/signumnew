<?php

class Billings extends tableDataObject
{
    const TABLENAME = 'properties';
    
    public static function saveBilling(
                        $amountPaid,
                        $billDate,
                        $billType,
                        $paymentMethod,
                        $paymentStatus,
                        $paymentDescription,
                        $serialNumber,
                        $uuid,
                        $propertyid,
                        $clientid) {

        global $healthdb;
            
        $getByUUID = "SELECT * FROM `payments` WHERE `uuid` = '$uuid'";
        $healthdb->prepare($getByUUID);
        $resultByUUID = $healthdb->singleRecord();

        if ($resultByUUID) {
            $query = "UPDATE `payments`
                    SET 
                    `amountPaid` = '$amountPaid',
                    `datePaid` = '$billDate',
                    `updatedAt` = NOW(),
                    `paymentMethod` = '$paymentMethod',
                    `billType` = '$billType',
                    `paymentDescription` = '$paymentDescription',
                    `serialNumber` = '$serialNumber',
                    `paymentStatus` = '$paymentStatus',
                    `propertyid` = '$propertyid',
                    `clientid` = '$clientid'

                    WHERE `uuid` = '$uuid'";

                $healthdb->prepare($query);
                $healthdb->execute();
        
            echo 3; // updated
        }
        else {
            $query = "INSERT INTO `payments`
                    (`amountPaid`,
                    `datePaid`,
                    `createdAt`,
                    `paymentMethod`,
                    `billType`,
                    `paymentDescription`,
                    `serialNumber`,
                    `paymentStatus`,
                    `uuid`,
                    `propertyid`,
                    `clientid`
                    )
                    VALUES ('$amountPaid',
                            '$billDate',
                            NOW(),
                            '$paymentMethod',
                            '$billType',
                            '$paymentDescription',
                            '$serialNumber',
                            '$paymentStatus',
                            '$uuid',
                            '$propertyid',
                            '$clientid'
                            )";

                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;  // Successfully inserted
            
            }
        
        }

}