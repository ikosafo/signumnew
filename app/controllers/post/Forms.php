<?php

class Forms extends PostController
{
    public function propertyCategoriesEdit()
    {
        $catid = $_POST['catid'];
        $categoryDetails = Properties::categoryDetails($catid);
        $categoryName = $categoryDetails['categoryName'];
        $description = $categoryDetails['description'];
        $this->view("forms/propertyCategoriesEdit", [
            'categoryName' => $categoryName,
            'description' => $description,
            'catid' => $catid,
         ]);
    }

}
