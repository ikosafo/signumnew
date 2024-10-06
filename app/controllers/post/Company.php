<?php

class Company extends PostController
{

    public function saveDepartment()
    {
        $departmentName = $_POST['departmentName'];
        $description = $_POST['description'];
        Institution::saveDepartment($departmentName,$description);
    }

    public function editDepartment()
    {
        $deptid = $_POST['deptid'];
        $departmentName = $_POST['departmentName'];
        $description = $_POST['description'];
        Institution::editDepartment($departmentName,$description,$deptid);
    }

}
