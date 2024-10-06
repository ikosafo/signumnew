<?php

class Delete extends PostController
{

    public function propertyCategory()
    {
        $catid = $_POST['catid'];
        Properties::deleteCategory($catid);
    }

    public function companyDepartment()
    {
        $deptid = $_POST['deptid'];
        Institution::deleteDepartment($deptid);
    }

    

}
