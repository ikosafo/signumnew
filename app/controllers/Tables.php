<?php

class Tables extends Controller
{

    public function propertyCategories()
    {
        $listPropertyCategory = Properties::listPropertyCategory();
        $this->view("tables/propertyCategories",['listPropertyCategory' => $listPropertyCategory]);
    }

    public function companyDepartments()
    {
        $listCompanyDepartments = Institution::listCompanyDepartments();
        $this->view("tables/companyDepartments",['listCompanyDepartments' => $listCompanyDepartments]);
    }

    public function adminUsers()
    {
        $listAdminUsers = Institution::listUsers();
        $this->view("tables/adminUsers",['listAdminUsers' => $listAdminUsers]);
    }

    public function properties()
    {
        $listProperties = Properties::listProperties();
        $this->view("tables/properties",['listProperties' => $listProperties]);
    }

    public function clients()
    {
        $listClients = Properties::listClients();
        $this->view("tables/clients",['listClients' => $listClients]);
    }

    public function rentInformation()
    {
        $listClients = Properties::listClients();
        $this->view("tables/rentInformation",['listClients' => $listClients]);
    }

    public function addRentInfo()
    {
        $listRentInformation = Properties::listRentInformation();
        $this->view("tables/addRentInfo",['listRentInformation' => $listRentInformation]);
    }
    
    public function billPayment()
    {
        $listClients = Properties::listClients();
        $this->view("tables/billPayment",['listClients' => $listClients]);
    }


    public function billPaymentClient() {
        new Guard();
        $uid = $_SESSION['uid'];
        $uuid = Tools::getUUIDbyid($uid);
        $clientid = Tools::getClientidbyUUID($uuid);
        $listRentDue = Properties::listRentDue($clientid);
        $this->view("tables/billPaymentClient",['listRentDue' => $listRentDue]);
    } 

    public function paymentHistory()
    {
        $paymentHistory = Billings::paymentHistory();
        $this->view("tables/paymentHistory",['paymentHistory' => $paymentHistory]);
    }

    public function complaints() {
        new Guard();
        $listComplaints = Complaints::listComplaints($status = null);
        $this->view("tables/complaints",[
            'listComplaints' => $listComplaints
        ]);
    }  

    public function complaintStatuses() {
        new Guard();
        
        $status = isset($_GET['status']) ? htmlspecialchars($_GET['status']) : null;
        $listComplaints = Complaints::listComplaints($status);       
        $this->view("tables/complaintStatuses", [
            'listComplaints' => $listComplaints,
            'status' => $status
        ]);
    }
      


}
