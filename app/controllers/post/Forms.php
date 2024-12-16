<?php

class Forms extends PostController
{
    public function propertyCategoriesEdit()
    {
        $catid = $_POST['catid'];
        $categoryDetails = Properties::categoryDetails($catid);
        $categoryName = $categoryDetails['categoryName'];
        $description = $categoryDetails['description'];
        $uuid = $categoryDetails['uuid'];
        $this->view("forms/propertyCategoriesEdit", [
            'categoryName' => $categoryName,
            'description' => $description,
            'catid' => $catid,
            'uuid' => $uuid,
         ]);
    }


    public function complaintCategoriesEdit()
    {
        $catid = $_POST['catid'];
        $categoryDetails = Complaints::categoryDetails($catid);
        $categoryName = $categoryDetails['categoryName'];
        $description = $categoryDetails['description'];
        $uuid = $categoryDetails['uuid'];
        $this->view("forms/complaintCategoriesEdit", [
            'categoryName' => $categoryName,
            'description' => $description,
            'catid' => $catid,
            'uuid' => $uuid,
         ]);
    }


    public function propertyPhasesEdit()
    {
        $phaseid = $_POST['phaseid'];
        $phaseDetails = Properties::phaseDetails($phaseid);
        $phaseName = $phaseDetails['phaseName'];
        $description = $phaseDetails['description'];
        $uuid = $phaseDetails['uuid'];
        $this->view("forms/propertyPhasesEdit", [
            'phaseName' => $phaseName,
            'description' => $description,
            'phaseid' => $phaseid,
            'uuid' => $uuid
         ]);
    }


    public function propertyActivitiesEdit()
    {
        $activityid = $_POST['activityid'];
        $activityDetails = Properties::activityDetails($activityid);
        $activityName = $activityDetails['activityName'];
        $description = $activityDetails['description'];
        $uuid = $activityDetails['uuid'];
        $this->view("forms/propertyActivitiesEdit", [
            'activityName' => $activityName,
            'description' => $description,
            'activityid' => $activityid,
            'uuid' => $uuid
         ]);
    }



    public function companyDepartmentsEdit()
    {
        $deptid = $_POST['deptid'];
        $departmentDetails = Institution::departmentDetails($deptid);
        $departmentName = $departmentDetails['departmentName'];
        $description = $departmentDetails['description'];
        $uuid = $departmentDetails['uuid'];
        $this->view("forms/companyDepartmentsEdit", [
            'departmentName' => $departmentName,
            'description' => $description,
            'deptid' => $deptid,
            'uuid' => $uuid
         ]);
    }


    public function adminUserDetails()
    {
        $uuid = $_POST['uuid'] ?? null;
        $userid = $_POST['userid'] ?? null;

        if (empty($uuid) && empty($userid)) {
            throw new Exception("UUID or UserID is required.");
        }
        if (empty($uuid) && !empty($userid)) {
            $uuid = Tools::getUUIDbyid($userid);
        }

        if (!empty($userid)) {
            $userDetails = Institution::userDetails($userid);
        } else {
            $userDetails = Institution::userDetails($uuid); 
        }
        $userPermissions = Tools::getUserPermissions($uuid);
        $this->view("forms/adminUserDetails", 
        [
            'userDetails' =>  $userDetails,
            'userPermissions' =>  $userPermissions
        ]);
    }


    public function verifyResolution()
    {
        $id_index = $_POST['id_index'];
        $this->view("forms/verifyResolution",['id_index' => $id_index]);
    }


    public function updateResolution()
    {
        $id_index = $_POST['id_index'];
        $this->view("forms/updateResolution",['id_index' => $id_index]);
    }


    public function viewResolution()
    {
        $id_index = $_POST['id_index'];
        $complaintDetails = Complaints::complaintDetails($id_index);
        $this->view("forms/viewResolution",['complaintDetails' => $complaintDetails]);
    }


    public function printReceipt()
    {
        $id_index = $_POST['id_index'];
        $paymentDetails = Billings::paymentDetails($id_index);
        $this->view("forms/printReceipt",['paymentDetails' => $paymentDetails]);
    }  


    public function generateInvoice()
    {
        $rentid = $_POST['rentid'];
        $rentInfo = Properties::rentInfo($rentid);
        $this->view("forms/generateInvoice",['rentInfo' => $rentInfo]);
    }  


    public function generateMaintenanceInvoice()
    {
        $billid = $_POST['billid'];
        $billInfo = Billings::billInfo($billid);
        $clientid = $billInfo['clientid'];
        $listClientMaintenance = Billings::listClientMaintenance($clientid);
        $this->view("forms/generateMaintenanceInvoice",
            [
                'billInfo' => $billInfo,
                'listClientMaintenance' => $listClientMaintenance

            ]
        );
    }  

    
    public function rentalInformation()
    {
        $clientid = $_POST['clientid'];
        $clientDetails = Clients::clientDetails($clientid);
        $this->view("forms/rentalInformation", $clientDetails);
    }


    public function billPayment()
    {
        $clientid = $_POST['clientid'];
        $clientDetails = Clients::clientDetails($clientid);
        $this->view("forms/billPayment", $clientDetails);
    }


    public function billPaymentMaintenance()
    {
        $clientid = $_POST['clientid'];
        $clientDetails = Clients::clientDetails($clientid);
        $this->view("forms/billPaymentMaintenance", $clientDetails);
    }


    public function billPaymentRent()
    {
        $clientid = $_POST['clientid'];
        $clientDetails = Clients::clientDetails($clientid);
        $this->view("forms/billPaymentRent", $clientDetails);
    }


    public function maintenanceRequest()
    {
        $clientid = $_POST['clientid'];
        $clientDetails = Clients::clientDetails($clientid);
        $this->view("forms/maintenanceRequest", $clientDetails);
    }
    

    public function propertyDetails()
    {
        $propertyid = $_POST['propertyid'];
        $userDetails = Properties::propertyDetails($propertyid);
        $this->view("forms/propertyDetails", $userDetails);
    }
    

    public function uploadSingleImg()
    {

        if (!defined('UPLOAD_PATH')) {
            define('UPLOAD_PATH', 'C:/wamp64/www/signum/public/uploads/'); 
            /* define('UPLOAD_PATH', '/home/ahpcgh/public_html/ahpc/ahpcmis/public/uploads/'); */
        }        
    
        foreach ($_POST as $name => $value) {
            $$name = $value;
        }
    
        $name = $_FILES['Filedata']['name'];
        $type = $_FILES['Filedata']['type'];
        $size = $_FILES['Filedata']['size'];
        $uniqueuploadid = $_POST['randno'];
    
        $docdate = date("Y-m-d");
        $uploads = new Uploads();
        $uploads->filename = $_FILES['Filedata'];
        $uploads->target_dir = UPLOAD_PATH;
        $uploadresponse = $uploads->upLoadFile();
    
        if ($uploadresponse['status'] == 'SUCCESS') {
            $newname = $uploadresponse['filename'];
            Documents::insertSingleImg($newname,$name,$type,$size,$uniqueuploadid);
    
         /* 
            $docdata = new Documents();
            $doc = &$docdata->recordObject;
            $doc->newname = $newname;
            $doc->name = $name;
            $doc->type = $type;
            $doc->size = $size;
            $doc->randomnumber = $uniqueuploadid;
            $doc->docdate = $docdate;
            $docdata->store(); */
        } else {
            echo 'Error Uploading File';
        }
    }


    public function uploadMultiImg()
    {

        if (!defined('UPLOAD_PATH')) {
            define('UPLOAD_PATH', 'C:/wamp64/www/signum/public/uploads/');
        }        
    
        foreach ($_POST as $name => $value) {
            $$name = $value;
        }
    
        $name = $_FILES['Filedata']['name'];
        $type = $_FILES['Filedata']['type'];
        $size = $_FILES['Filedata']['size'];
        $uniqueuploadid = $_POST['randno'];
    
        $docdate = date("Y-m-d");
        $uploads = new Uploads();
        $uploads->filename = $_FILES['Filedata'];
        $uploads->target_dir = UPLOAD_PATH;
        $uploadresponse = $uploads->upLoadFile();
    
        if ($uploadresponse['status'] == 'SUCCESS') {
            $newname = $uploadresponse['filename'];
            Documents::insertMultiImg($newname,$name,$type,$size,$uniqueuploadid);
        } else {
            echo 'Error Uploading File';
        }
    }
    


    

}
