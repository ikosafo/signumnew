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
        $catid = $_POST['catid'];
        $departmentDetails = Institution::departmentDetails($catid);
        $departmentName = $departmentDetails['departmentName'];
        $description = $departmentDetails['description'];
        $this->view("forms/companyDepartmentsEdit", [
            'departmentName' => $departmentName,
            'description' => $description,
            'catid' => $catid,
         ]);
    }

}
