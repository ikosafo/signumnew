<?php

class Billings extends tableDataObject
{
    const TABLENAME = 'payments';


    public static function getBillingGoodStandingNumber(){
        global $healthdb;
    
        $getnum = "SELECT COUNT(*) AS count FROM `billing` WHERE `paymentStatus` = 'success' 
                AND `status` = 1 
                AND MONTH(`updatedAt`) = MONTH(CURRENT_DATE()) 
                AND YEAR(`updatedAt`) = YEAR(CURRENT_DATE())";

        $healthdb->prepare($getnum);
        $result = $healthdb->singleRecord();
        return $result->count;
    }

    
    public static function saveBillingOld(
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

        if ($billType === 'Maintenance') {
            $lastOutstandingBillid = Tools::lastOutstandingBillid($clientid);
            if ($lastOutstandingBillid) {
                    
                $updateRent = "UPDATE `billing`
                SET `updatedAt` = NOW(),
                `paymentStatus` = 'success'
                WHERE `billid` = '$lastOutstandingBillid'";

                $healthdb->prepare($updateRent);
                $healthdb->execute();
            }
            else {
                echo 2;
                return;
            }
        }
            
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


    public static function generateRentInvoice($rentid) {
        global $healthdb;
    
        $clientid = Tools::getClientfromRent($rentid);
        $subject = "Rent Invoice";
        $fullName = Tools::clientName($clientid);
        $emailAddress = Tools::clientEmail($clientid);
        $rentInfo = Properties::rentInfo($rentid);
    
        // Generate the email message
        $message = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Rent Invoice</title>
            <style>
                .receipt-footer {
                    text-align: center;
                    margin-top: 20px;
                    font-size: 12px;
                    color: #888;
                }
                .table {
                    width: 100%;
                    margin-bottom: 20px;
                    border-collapse: collapse;
                }
                .table th, .table td {
                    padding: 8px 12px;
                    border: 1px solid #ddd;
                    text-align: left;
                }
                .table th {
                    background-color: #f4f4f4;
                }
                .right {
                    text-align: right;
                }
                .center {
                    text-align: center;
                }
                .address-container {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 20px;
                    margin-bottom: 20px;
                }
                .address-section {
                    width: 48%;
                    padding: 10px;
                    /* border: 0.2px solid #ddd; */
                }
                .address-section h6 {
                    margin-top: 0;
                    font-weight: bold;
                }
                .detail-item {
                    margin-bottom: 5px;
                }
            </style>
        </head>
        <body>
            <div style='font-family: Arial, sans-serif;'>
                <p>Dear " . $fullName . ",</p>
                <p>We hope this message finds you well. Please find below the details of your rent invoice for the current period:</p>
    
                <!-- Address Section: From and To -->
                <div class='address-container'>
                  <div class='address-section'>
                        <h6>Invoice</h6>
                        <div class='detail-item'><span>Date:</span><span>" . (new DateTime($rentInfo['createdAt']))->format('F j, Y') . "</span></div>
                        <div class='detail-item'><span>Invoice No:</span><span>" . Tools::generateReceiptNumber($rentInfo['createdAt']) . "</span></div>
                        <div class='detail-item'><span>Customer Name:</span><span>" . Tools::clientName($rentInfo['clientid']) . "</span></div>
                    </div>
                </div>
                <div class='address-container'>
                    <div class='address-section'>
                        <h6>From:</h6>
                        <div><strong>Signum Properties</strong></div>
                        <div class='detail-item'>Address: [Your Address Here]</div>
                        <div class='detail-item'>Email: info@signumproperties.com</div>
                        <div class='detail-item'>Phone: +233 123 456 7890</div>
                    </div>
    
                    <div class='address-section'>
                        <h6>To:</h6>
                        <div><strong>" . Tools::clientName($rentInfo['clientid']) . "</strong></div>
                        <div class='detail-item'>" . Tools::clientAddress($rentInfo['clientid']) . "</div>
                        <div class='detail-item'>Email: " . Tools::clientEmail($rentInfo['clientid']) . "</div>
                        <div class='detail-item'>Phone: " . Tools::clientPhone($rentInfo['clientid']) . "</div>
                    </div>

                </div>
    
    
                <div class='table-responsive'>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th class='center'>#</th>
                                <th>Description</th>
                                <th>Rent Amount</th>
                                <th>Security</th>
                                <th>Penalty</th>
                                <th class='right'>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong class='text-black'>1</strong></td>
                                <td>Rent</td>
                                <td>" . number_format($rentInfo['rentAmount'], 2) . "</td>
                                <td>" . number_format($rentInfo['securityAmount'], 2) . "</td>
                                <td>" . number_format($rentInfo['penaltyAmount'], 2) . "</td>
                                <td class='right'><strong>" . number_format($rentInfo['rentAmount'] + $rentInfo['securityAmount'] + $rentInfo['penaltyAmount'], 2) . "</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
    
                <div class='row'>
                    <div class='col-lg-4 col-sm-5'> </div>
                    <div class='col-xl-4 col-lg-4 col-sm-7 ms-auto'>
                        <table class='table'>
                            <tbody>
                                <tr>
                                    <td class='left'>Subtotal</td>
                                    <td class='right'>" . number_format($rentInfo['rentAmount'] + $rentInfo['securityAmount'] + $rentInfo['penaltyAmount'], 2) . "</td>
                                </tr>
                                <tr>
                                    <td class='left'><strong class='text-black'>Total</strong></td>
                                    <td class='right'><strong class='text-black'>" . number_format($rentInfo['rentAmount'] + $rentInfo['securityAmount'] + $rentInfo['penaltyAmount'], 2) . "</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class='receipt-footer'>
                        <p>This is a computer-generated invoice. No signature required.</p>
                    </div>
                </div>
            </div>
        </body>
        </html>";
    
        // Send email and handle potential errors
        try {
            if (SendEmail::compose($emailAddress, $subject, $message)) {
                //echo "Email sent successfully.\n";
                echo 1;
            } else {
                echo "Failed to send email.\n";
            }
        } catch (Exception $e) {
            echo "Error sending email: " . $e->getMessage() . "\n";
        }
    
    }


    public static function listCurrentMaintenance() {
        global $healthdb;

        $getList = "SELECT * 
                    FROM `billing` 
                    WHERE `status` = 1 
                    AND `billType` = 'Maintenance' 
                    AND MONTH(`dateDue`) = MONTH(CURDATE()) 
                    AND YEAR(`dateDue`) = YEAR(CURDATE()) 
                    ORDER BY `createdAt` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function clientMaintenanceAmount($phaseid) {
        global $healthdb;

        $getNumber = "SELECT SUM(amount) AS sumAmount FROM `maintenancefee` WHERE `status` = 1 AND phaseid = '$phaseid'";
        $healthdb->prepare($getNumber);
        $resultNumber = $healthdb->singleRecord();
        $phaseAmount= $resultNumber->sumAmount;

        //get number of clients in the phase
        $getnum = "SELECT COUNT(*) AS count FROM `clients` WHERE `phaseid` = '$phaseid' AND `status` = 1";
        $healthdb->prepare($getnum);
        $result = $healthdb->singleRecord();
        $phaseNumber = $result->count;

        if ($phaseNumber == 0) {
            return null;
        } else {
            return $phaseAmount / $phaseNumber;
        }
         

        
    }
    

    public static function saveBilling($amountPaid,
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
    
        // Handle maintenance bill updates
        if ($billType === 'Maintenance') {
            $lastOutstandingBillid = Tools::lastOutstandingBillid($clientid);
            if ($lastOutstandingBillid) {
                $updateRent = "UPDATE `billing` SET `updatedAt` = NOW(), `paymentStatus` = 'success' WHERE `billid` = '$lastOutstandingBillid'";
                $healthdb->prepare($updateRent);
                $healthdb->execute();
            } else {
                echo "No outstanding maintenance bill.";
                return;
            }
        }
    
        // Check if payment exists
        $getByUUID = "SELECT * FROM `payments` WHERE `uuid` = '$uuid'";
        //$existingPayment = $healthdb->singleRecord($getByUUID);
        $healthdb->prepare($getByUUID);
        $existingPayment = $healthdb->singleRecord();
    
        if ($existingPayment) {
            // Update payment
            $query = "UPDATE `payments` SET `amountPaid` = '$amountPaid', `datePaid` = '$billDate', `updatedAt` = NOW(), 
                      `paymentMethod` = '$paymentMethod', `billType` = '$billType', `paymentDescription` = '$paymentDescription', 
                      `serialNumber` = '$serialNumber', `paymentStatus` = '$paymentStatus', 
                      `propertyid` = '$propertyid', `clientid` = '$clientid' WHERE `uuid` = '$uuid'";

                        $healthdb->prepare($query);
                        $healthdb->execute();
                        echo 1;  
                        
                        
        } else {
            // Insert payment
            $query = "INSERT INTO `payments` (`amountPaid`, `datePaid`, `createdAt`, `paymentMethod`, `billType`, `paymentDescription`, 
                      `serialNumber`, `paymentStatus`, `uuid`, `propertyid`, `clientid`, `receivedBy`) 
                      VALUES ('$amountPaid', '$billDate', NOW(), '$paymentMethod', '$billType', '$paymentDescription', 
                      '$serialNumber', '$paymentStatus', '$uuid', '$propertyid', '$clientid', 'Admin')";
                        $healthdb->prepare($query);
                        $healthdb->execute();


                             // Email details
                    $subject = "$billType Payment Successful";
                    $fullName = Tools::clientName($clientid);
                    $emailAddress = Tools::clientEmail($clientid);
                    $propertyName = Tools::propertyClient($propertyid);
                    $transactionID = 'PT-' . uniqid();
                    $paymentDate = date('F j, Y');
                    $amountPaid = number_format($amountPaid, 2); // Format amount with 2 decimal places

                    // Validate email address
                    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
                        echo "Invalid email address: $emailAddress\n";
                        return; // Exit if email is invalid
                    }

                    // Email message
                    $message = "
                    <!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Payment Receipt</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                margin: 0;
                                padding: 0;
                                background-color: #f9f9f9;
                                color: #333;
                            }
                            .container {
                                max-width: 600px;
                                margin: 20px auto;
                                background-color: #fff;
                                padding: 20px;
                                border-radius: 8px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                            .header {
                                text-align: center;
                                border-bottom: 2px solid #4CAF50;
                                margin-bottom: 20px;
                            }
                            .header h1 {
                                color: #4CAF50;
                                margin: 0;
                            }
                            .content {
                                line-height: 1.6;
                            }
                            .content p {
                                margin: 10px 0;
                            }
                            .footer {
                                text-align: center;
                                margin-top: 20px;
                                font-size: 0.9em;
                                color: #777;
                            }
                            .details-table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-top: 20px;
                            }
                            .details-table th, .details-table td {
                                border: 1px solid #ddd;
                                padding: 8px;
                                text-align: left;
                            }
                            .details-table th {
                                background-color: #f2f2f2;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <div class='header'>
                                <h1>Payment Receipt</h1>
                                <p>Thank you for your payment!</p>
                            </div>
                            <div class='content'>
                                <p>Dear $fullName,</p>
                                <p>We are pleased to confirm the successful payment for your property ($billType). Below are the payment details:</p>
                                <table class='details-table'>
                                    <tr>
                                        <th>Property</th>
                                        <td>$propertyName</td>
                                    </tr>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <td>$transactionID</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Payment</th>
                                        <td>$paymentDate</td>
                                    </tr>
                                    <tr>
                                        <th>Amount Paid</th>
                                        <td>GHC $amountPaid</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Method</th>
                                        <td>$paymentMethod</td>
                                    </tr>
                                </table>
                                <p>If you have any questions or need further assistance, please contact us at support@signumproperties.com or call +233 557 232 232.</p>
                            </div>
                            <div class='footer'>
                                <p>&copy; 2024 Signum Properties. All rights reserved.</p>
                            </div>
                        </div>
                    </body>
                    </html>";

                    // Send email and handle potential errors
                    try {
                        if (SendEmail::compose($emailAddress, $subject, $message)) {
                            echo "Email sent successfully.\n";
                        } else {
                            echo "Failed to send email.\n";
                        }
                    } catch (Exception $e) {
                        echo "Error sending email: " . $e->getMessage() . "\n";
                    }

                    echo 1; 
           
        }
    }
    

    public static function paymentHistory() {
        global $healthdb;

        $getList = "SELECT * FROM `payments` where `status` = 1 ORDER BY `createdAt` DESC, `updatedAt` DESC";
        $healthdb->prepare($getList);
        $resultList = $healthdb->resultSet();
        return $resultList;
    }


    public static function clientPaymentHistoy($clientid) {
        global $healthdb;

        $getList = "SELECT * FROM `payments` where `status` = 1 AND `clientid` = '$clientid' ORDER BY `createdAt` DESC, `updatedAt` DESC";
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
                    `paymentMethod`,
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
                    'PayStack',
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

                       // Email details
                    $subject = "Rent Payment Successful";
                    $fullName = Tools::clientName($clientid);
                    $emailAddress = Tools::clientEmail($clientid);
                    $transactionID = 'RNT-' . uniqid();
                    $paymentDate = date('F j, Y');
                    $amountPaid = number_format($updatedAmt, 2); // Format amount with 2 decimal places

                    // Validate email address
                    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
                        echo "Invalid email address: $emailAddress\n";
                        return; // Exit if email is invalid
                    }

                    // Email message
                    $message = "
                    <!DOCTYPE html>
                    <html lang='en'>
                    <head>
                        <meta charset='UTF-8'>
                        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        <title>Payment Receipt</title>
                        <style>
                            body {
                                font-family: Arial, sans-serif;
                                margin: 0;
                                padding: 0;
                                background-color: #f9f9f9;
                                color: #333;
                            }
                            .container {
                                max-width: 600px;
                                margin: 20px auto;
                                background-color: #fff;
                                padding: 20px;
                                border-radius: 8px;
                                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            }
                            .header {
                                text-align: center;
                                border-bottom: 2px solid #4CAF50;
                                margin-bottom: 20px;
                            }
                            .header h1 {
                                color: #4CAF50;
                                margin: 0;
                            }
                            .content {
                                line-height: 1.6;
                            }
                            .content p {
                                margin: 10px 0;
                            }
                            .footer {
                                text-align: center;
                                margin-top: 20px;
                                font-size: 0.9em;
                                color: #777;
                            }
                            .details-table {
                                width: 100%;
                                border-collapse: collapse;
                                margin-top: 20px;
                            }
                            .details-table th, .details-table td {
                                border: 1px solid #ddd;
                                padding: 8px;
                                text-align: left;
                            }
                            .details-table th {
                                background-color: #f2f2f2;
                            }
                        </style>
                    </head>
                    <body>
                        <div class='container'>
                            <div class='header'>
                                <h1>Payment Receipt</h1>
                                <p>Thank you for your payment!</p>
                            </div>
                            <div class='content'>
                                <p>Dear $fullName,</p>
                                <p>We are pleased to confirm the successful payment for your property rent. Below are the payment details:</p>
                                <table class='details-table'>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <td>$transactionID</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Payment</th>
                                        <td>$paymentDate</td>
                                    </tr>
                                    <tr>
                                        <th>Amount Paid</th>
                                        <td>$$amountPaid</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Method</th>
                                        <td>Paystack</td>
                                    </tr>
                                </table>
                                <p>If you have any questions or need further assistance, please contact us at support@signumproperties.com or call +1 (123) 456-7890.</p>
                            </div>
                            <div class='footer'>
                                <p>&copy; 2024 Signum Properties. All rights reserved.</p>
                            </div>
                        </div>
                    </body>
                    </html>";

                    // Send email and handle potential errors
                    try {
                        if (SendEmail::compose($emailAddress, $subject, $message)) {
                            echo "Email sent successfully.\n";
                        } else {
                            echo "Failed to send email.\n";
                        }
                    } catch (Exception $e) {
                        echo "Error sending email: " . $e->getMessage() . "\n";
                    }

                                        

    }


    public static function updateMaintenancePayment($reference,$status,$clientid,$amount,$uuid,$billid) {
        global $healthdb;

        $updatedAmt = $amount / 100;

        $query = "INSERT INTO `payments`
                    (`amountPaid`,
                    `datePaid`,
                    `createdAt`,
                    `billType`,
                    `paymentMethod`,
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
                    'Maintenance',
                    'PayStack',
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


                $updateRent = "UPDATE `billing`
                        SET `updatedAt` = NOW(),
                        `paymentStatus` = '$status'
                        WHERE `billid` = '$billid'";

                    $healthdb->prepare($updateRent);
                    $healthdb->execute();
                    echo 1;  // Successfully updated

                       // Email details
                    $subject = "Maintenance Payment Successful";
                    $fullName = Tools::clientName($clientid);
                    $emailAddress = Tools::clientEmail($clientid);
                    $transactionID = 'RNT-' . uniqid();
                    $paymentDate = date('F j, Y');
                    $amountPaid = number_format($updatedAmt, 2); // Format amount with 2 decimal places

                    // Validate email address
                    if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
                        echo "Invalid email address: $emailAddress\n";
                        return; // Exit if email is invalid
                    }

                    // Email message
                    $message = "
                    <div class='container'>
                            <div class='header'>
                                <h1>Payment Receipt</h1>
                                <p>Thank you for your payment!</p>
                            </div>
                            <div class='content'>
                                <p>Dear $fullName,</p>
                                <p>We are pleased to confirm the successful payment for your property rent. Below are the payment details:</p>
                                <table class='details-table'>
                                    <tr>
                                        <th>Transaction ID</th>
                                        <td>$transactionID</td>
                                    </tr>
                                    <tr>
                                        <th>Date of Payment</th>
                                        <td>$paymentDate</td>
                                    </tr>
                                    <tr>
                                        <th>Amount Paid</th>
                                        <td>$$amountPaid</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Method</th>
                                        <td>Paystack</td>
                                    </tr>
                                </table>
                                <p>If you have any questions or need further assistance, please contact us at support@signumproperties.com or call +1 (123) 456-7890.</p>
                            </div>
                            <div class='footer'>
                                <p>&copy; 2024 Signum Properties. All rights reserved.</p>
                            </div>
                        </div>";

                    // Send email and handle potential errors
                   /*  try {
                        if (SendEmail::compose($emailAddress, $subject, $message)) {
                            echo "Email sent successfully.\n";
                        } else {
                            echo "Failed to send email.\n";
                        }
                    } catch (Exception $e) {
                        echo "Error sending email: " . $e->getMessage() . "\n";
                    } */

                                        

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
            'receivedBy' => $resultRec->receivedBy,
            'createdAt' => $resultRec->createdAt

        ];
    }

}