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

    public function adminUser()
    {
        $userid = $_POST['userid'];
        Users::deleteAdminUser($userid);
    }

    public function maintenancefee()
    {
        $feeid = $_POST['feeid'];
        Properties::deleteMaintenanceFee($feeid);
    }

    public function userPermission()
    {
        $id = $_POST['id'];
        Users::deleteUserPermission($id);
    }

    public function client()
    {
        $clientid = $_POST['clientid'];
        Clients::deleteClient($clientid);
    }

    public function property()
    {
        $propertyid = $_POST['propertyid'];
        Properties::deleteProperty($propertyid);
    }

    public function rentInfo()
    {
        $rentid = $_POST['rentid'];
        Properties::deleteRentInfo($rentid);
    }

    

}
