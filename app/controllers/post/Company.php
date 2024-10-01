<?php

class Company extends PostController
{

    public function saveDepartment()
    {
        $departmentName = $_POST['departmentName'];
        $description = $_POST['description'];
        Institution::saveDepartment($departmentName,$description);
    }

}
