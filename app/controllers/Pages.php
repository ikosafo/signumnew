<?php

class Pages extends Controller
{

    public function forgetPassword()
    {
        $this->view("pages/auth/forgotpassword");
    }
    

    public function index()
    {
        new Guard();
        $this->view("pages/index");
    }


    public function addProperty() {
        new Guard();
        $listPropertyCategory = Properties::listPropertyCategory();
        $listUsers = Users::listUsers();
        $this->view("pages/addProperty",[
            'listPropertyCategory' => $listPropertyCategory,
            'listUsers' => $listUsers
        ]);
    }  


    public function addUser() {
        new Guard();
        $listUsers = Users::listUsers();
        $listDepartment = Institution::listDepartment();
        $this->view("pages/addUser",[
            'listUsers' => $listUsers,
            'listDepartment' => $listDepartment
        ]);
    }  


    public function addTenant() {
        new Guard();
        $listUsers = Users::listUsers();
        $listDepartment = Institution::listDepartment();
        $listProperties = Properties::listProperties();
        $this->view("pages/addTenant",[
            'listUsers' => $listUsers,
            'listDepartment' => $listDepartment,
            'listProperties' => $listProperties
        ]);
    }  


    public function editUser() {
        new Guard();

        $listUsers = Users::listUsers();
        $encryptedId = $_GET['userid'];
        $decryptedUserId = Tools::unlock($encryptedId);
        $userDetails = Institution::userDetails($decryptedUserId);
        $uuid = $userDetails['uuid'];
        $userPermissions = Users::userPermissions($uuid);
        $listDepartment = Institution::listDepartment();

        $this->view("pages/editUser",[
            'listUsers' => $listUsers,
            'listDepartment' => $listDepartment,
            'userid' => $decryptedUserId,
            'userDetails' => $userDetails,
            'userPermissions' => $userPermissions
        ]);
    } 
    

    public function editProperty() {
        new Guard();

        $listUsers = Users::listUsers();
        $listProperties = Properties::listProperties();
        $listPropertyCategory = Properties::listPropertyCategory();
        $encryptedId = $_GET['propertyid'];
        $decryptedUserId = Tools::unlock($encryptedId);
        $propertyDetails = Properties::propertyDetails($decryptedUserId);
        $uuid = $propertyDetails['uuid'];

        $this->view("pages/editProperty",[
            'listProperties' => $listProperties,
            'userid' => $decryptedUserId,
            'uuid' => $uuid,
            'propertyDetails' => $propertyDetails,
            'listPropertyCategory' => $listPropertyCategory,
            'listUsers' => $listUsers
        ]);
    } 


    public function listUsers() {
        new Guard();
        $listUsers = Users::listUsers();
        $this->view("pages/listUsers",[
            'listUsers' => $listUsers
        ]);
    }  


    public function listClients() {
        new Guard();
        $listClients = Properties::listClients();
        $this->view("pages/listClients",[
            'listClients' => $listClients
        ]);
    }  

    
    public function addClient() {
        new Guard();
        $listProperties = Properties::listProperties();
        $this->view("pages/addClient",[
            'listProperties' => $listProperties
        ]);
    }  


    public function rentInformation() {
        new Guard();
        $listProperties = Properties::listProperties();
        $this->view("pages/rentInformation",[
            'listProperties' => $listProperties
        ]);
    }  

    
    public function viewClient() {
        new Guard();

        $encryptedId = $_GET['clientid'];
        $decryptedClientId = Tools::unlock($encryptedId);
        $clientDetails = Clients::clientDetails($decryptedClientId);
        $propertyid = $clientDetails['propertyid'];
        $propertyName = Tools::propertyClient($propertyid);
        $uuid = $clientDetails['uuid'];

        $this->view("pages/viewClient",[
            'uuid' => $uuid,
            'clientDetails' => $clientDetails,
            'propertyName' => $propertyName
        ]);
    } 


    public function viewRentInfo() {
        new Guard();

        $encryptedId = $_GET['rentid'];
        $decryptedClientId = Tools::unlock($encryptedId);
        $rentInfo = Properties::rentInfo($decryptedClientId);

        $this->view("pages/viewRentInfo",[
            'rentInfo' => $rentInfo
        ]);
    } 


    public function editClient() {
        new Guard();

        $encryptedId = $_GET['clientid'];
        $decryptedClientId = Tools::unlock($encryptedId);
        $clientDetails = Clients::clientDetails($decryptedClientId);
        $propertyid = $clientDetails['propertyid'];
        $propertyName = Tools::propertyClient($propertyid);
        $listProperties = Properties::listProperties();
        $uuid = $clientDetails['uuid'];

        $this->view("pages/editClient",[
            'uuid' => $uuid,
            'clientDetails' => $clientDetails,
            'propertyName' => $propertyName,
            'listProperties' => $listProperties
        ]);
    } 


    public function editRentInfo() {
        new Guard();

        $encryptedId = $_GET['rentid'];
        $decryptedClientId = Tools::unlock($encryptedId);
        $rentInfo = Properties::rentInfo($decryptedClientId);

        $this->view("pages/editRentInfo",[
            'rentInfo' => $rentInfo
        ]);
    } 


    public function viewProperty() {
        new Guard();

        $encryptedId = $_GET['propertyid'];
        $decryptedClientId = Tools::unlock($encryptedId);
        $propertyDetails = Properties::propertyDetails($decryptedClientId);
        $ownerDetails = Properties::ownerDetails($decryptedClientId);
        $uuid = $propertyDetails['uuid'];

        $this->view("pages/viewProperty",[
            'uuid' => $uuid,
            'propertyDetails' => $propertyDetails,
            'ownerDetails' => $ownerDetails
        ]);
    } 


    public function listProperties() {
        new Guard();
        $listProperties = Properties::listProperties();
        $this->view("pages/listProperties",[
            'listProperties' => $listProperties
        ]);
    }  


    public function listRentInformation() {
        new Guard();
        $listRentInformation = Properties::listRentInformation();
        $this->view("pages/listRentInformation",[
            'listRentInformation' => $listRentInformation
        ]);
    } 
    

    public function propertyCategories() {
        new Guard();  
        $this->view("pages/propertyCategories");
    }  


    public function companyDepartments() {
        new Guard();  
        $this->view("pages/companyDepartments");
    } 
    

    public function lock()
    {
        new Guard();
        $data = array(
            'username' => $_SESSION['username'],
            'name' => $_SESSION['name'],
            'mainaccesslevel' => $_SESSION['mainaccesslevel']
        );
        unset($_SESSION['uid']);
        session_destroy();
        $this->view('pages/lock', $data);
    }


    public function locked()
    {
        $this->view('pages/locked');
    }
  
   /*  public function mail()
    {
        print_r(SendEmail::compose('yawshadi23@gmail.com', 'hello', 'how are you doing today'));
    } */

}
