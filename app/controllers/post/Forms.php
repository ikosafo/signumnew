<?php

class Forms extends PostController
{
    public function propertyCategoriesEdit()
    {
        $catid = $_POST['catid'];
        $categoryDetails = Properties::categoryDetails($catid);
        $categoryName = $categoryDetails['categoryName'];
        $description = $categoryDetails['description'];
        $this->view("forms/propertyCategoriesEdit", [
            'categoryName' => $categoryName,
            'description' => $description,
            'catid' => $catid,
         ]);
    }


    public function companyDepartmentsEdit()
    {
        $deptid = $_POST['deptid'];
        $departmentDetails = Institution::departmentDetails($deptid);
        $departmentName = $departmentDetails['departmentName'];
        $description = $departmentDetails['description'];
        $this->view("forms/companyDepartmentsEdit", [
            'departmentName' => $departmentName,
            'description' => $description,
            'deptid' => $deptid,
         ]);
    }


    public function adminUserDetails()
    {
        $userid = $_POST['userid'];
        $userDetails = Institution::userDetails($userid);
        $this->view("forms/adminUserDetails", $userDetails);
    }

    public function verifyResolution()
    {
        $id_index = $_POST['id_index'];
        $this->view("forms/verifyResolution",['id_index' => $id_index]);
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
    

    public function propertyDetails()
    {
        $propertyid = $_POST['propertyid'];
        $userDetails = Properties::propertyDetails($propertyid);
        $this->view("forms/propertyDetails", $userDetails);
    }
    

    public function uploadSingleImg()
    {

        if (!defined('UPLOAD_PATH')) {
            define('UPLOAD_PATH', 'C:/wamp64/www/property/public/uploads/'); 
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
            define('UPLOAD_PATH', 'C:/wamp64/www/property/public/uploads/');
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
