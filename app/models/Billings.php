<?php

class Billings extends tableDataObject
{
    const TABLENAME = 'payments';
    
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
                `clientid`,
                `receivedBy`
                )
                VALUES (
                '$amountPaid',
                '$billDate',
                NOW(),
                '$paymentMethod',
                '$billType',
                '$paymentDescription',
                '$serialNumber',
                '$paymentStatus',
                '$uuid',
                '$propertyid',
                '$clientid',
                'Admin'
                )";

            $healthdb->prepare($query);
            $healthdb->execute();
            echo 1;  // Successfully inserted
        
        }
    
    }

    public static function paymentHistory() {
        global $healthdb;

        $getList = "SELECT * FROM `payments` where `status` = 1 ORDER BY `createdAt` DESC, `updatedAt` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function updatePayment($reference,$status,$clientid,$amount,$uuid,$rentid) {
        global $healthdb;

        $updatedAmt = $amount / 100;

        $query = "INSERT INTO `payments`
                    (`amountPaid`,
                    `datePaid`,
                    `createdAt`,
                    `billType`,
                    `paymentDescription`,
                    `serialNumber`,
                    `paymentStatus`,
                    `uuid`,
                    `clientid`,
                    `receivedBy`
                )
                VALUES (
                    '$updatedAmt',
                    NOW(),
                    NOW(),
                    'Rent',
                    '$status',
                    '$reference',
                    '$status',
                    '$uuid',
                    '$clientid',
                    'Client Portal'
                )";

                $healthdb->prepare($query);
                $healthdb->execute();
                echo 1;  // Successfully inserted


                $updateRent = "UPDATE `rentinfo`
                        SET `updatedAt` = NOW(),
                        `paymentStatus` = '$status'
                        WHERE `rentid` = '$rentid'";

                    $healthdb->prepare($updateRent);
                    $healthdb->execute();
                    echo 1;  // Successfully updated

    }


    public static function paymentDetails($paymentid) {
        global $healthdb;
    
        $getList = "SELECT * FROM `payments` WHERE `payid` = '$paymentid'";
        $healthdb->prepare($getList);
        $resultRec = $healthdb->singleRecord();
    
        return [
            'amountPaid' => $resultRec->amountPaid,
            'datePaid' => $resultRec->datePaid,
            'paymentMethod' => $resultRec->paymentMethod,
            'billType' => $resultRec->billType,
            'paymentDescription' => $resultRec->paymentDescription,
            'serialNumber' => $resultRec->serialNumber,
            'paymentStatus' => $resultRec->paymentStatus,
            'propertyid' => $resultRec->propertyid,
            'clientid' => $resultRec->clientid,
            'receivedBy' => $resultRec->receivedBy

        ];
    }

}