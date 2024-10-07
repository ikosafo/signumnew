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
        $this->view("pages/addProperty",[
            'listPropertyCategory' => $listPropertyCategory
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


    public function listUsers() {
        new Guard();
        $listUsers = Users::listUsers();
        $this->view("pages/listUsers",[
            'listUsers' => $listUsers
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
