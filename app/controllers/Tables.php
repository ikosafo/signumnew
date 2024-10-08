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

}
