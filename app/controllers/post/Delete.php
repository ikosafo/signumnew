<?php

class Delete extends PostController
{

    public function propertyCategory()
    {
        $catid = $_POST['catid'];
        Properties::deleteCategory($catid);
    }

}
