<?php

class Forms extends Controller
{

    public function propertyCategories()
    {
        $this->view("forms/propertyCategories");
    }

    public function companyDepartments()
    {
        $this->view("forms/companyDepartments");
    }

}
