<?php

class Complaint extends PostController
{

    public function saveCategory()
    {
        $categoryName = $_POST['categoryName'];
        $description = $_POST['description'];
        $uuid = $_POST['uuid'];
        Complaints::saveCategory($categoryName,$uuid,$description);
    }


}
