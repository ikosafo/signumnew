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
    

    public function initiatePayment()
    {
        $clientid = $_POST['clientid'];
        $amount = $_POST['amount'];
        $this->view("billing/initiatePayment", [
            'clientid' => $clientid,
            'amount' => $amount
        ]);
    }


    public function verifyPayment()
    {
        $reference = $_POST['reference'];
        $status = $_POST['status'];
        $amount = $_POST['amount'];
        $uid = $_SESSION['uid'];
        $rentid = $_POST['rentid'];
        $uuid = Tools::getUUIDbyid($uid);
        $clientid = Tools::getClientidbyUUID($uuid);
        Billings::updatePayment($reference,$status,$clientid,$amount,$uuid,$rentid);
        $this->view("billing/verifyPayment", [
            'reference' => $reference,
            'clientid' => $clientid,
            'status' => $status
        ]);
    }

    

}
