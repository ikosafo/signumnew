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

    public function propertyDetails()
    {
        $propertyid = $_POST['propertyid'];
        $userDetails = Properties::propertyDetails($propertyid);
        $this->view("forms/propertyDetails", $userDetails);
    }
    
    

}
