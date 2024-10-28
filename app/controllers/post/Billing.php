<?php

class Billing extends PostController
{
    public function saveBillPayment()
    {
        $amountPaid = $_POST['amountPaid'];
        $billDate = $_POST['billDate'];
        $billType = $_POST['billType'];
        $paymentMethod = $_POST['paymentMethod'];
        $paymentStatus = $_POST['paymentStatus'];
        $paymentDescription = $_POST['paymentDescription'];
        $serialNumber = $_POST['serialNumber'];
        $uuid = $_POST['uuid'];
        $propertyid = $_POST['propertyid'];
        $clientid = $_POST['clientid'];
    
        Billings::saveBilling(
            $amountPaid,
            $billDate,
            $billType,
            $paymentMethod,
            $paymentStatus,
            $paymentDescription,
            $serialNumber,
            $uuid,
            $propertyid,
            $clientid
        );
    }
    

    


}
