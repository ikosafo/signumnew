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


    public function listProperties() {
        new Guard();
        $listProperties = Properties::listProperties();
        $this->view("pages/listProperties",[
            'listProperties' => $listProperties
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
