<?php

class Forms extends Controller
{

    public function propertyCategories()
    {
        $this->view("forms/propertyCategories");
    }

    public function propertyPhases()
    {
        $this->view("forms/propertyPhases");
    }

    public function propertyActivities()
    {
        $this->view("forms/propertyActivities");
    }

    public function maintenanceFee()
    {
        $listProperties = Properties::listProperties();
        $this->view("forms/maintenanceFee",['listProperties' => $listProperties]);
    }

    public function companyDepartments()
    {
        $this->view("forms/companyDepartments");
    }

}
