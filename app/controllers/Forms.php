<?php

class Forms extends Controller
{

    public function propertyCategories()
    {
        $this->view("forms/propertyCategories");
    }


    public function complaintCategories()
    {
        $this->view("forms/complaintCategories");
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
        $listPhase = Properties::listPhase();
        $listActivity = Properties::listActivity();
        $this->view("forms/maintenanceFee",[
            'listPhase' => $listPhase,
            'listActivity' => $listActivity
        ]);
    }

    
    public function companyDepartments()
    {
        $this->view("forms/companyDepartments");
    }

}
