<?php

class Property extends PostController
{

    public function saveProperty()
    {
        $propertyName = $_POST['propertyName'];
        $propertyType = $_POST['propertyType'];
        $propertyCategory = $_POST['propertyCategory'];
        $propertyAddress = $_POST['propertyAddress'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $numberOfUnits = $_POST['numberOfUnits'];
        $propertySize = $_POST['propertySize'];
        $furnishingStatus = $_POST['furnishingStatus'];
        $propertyManager = $_POST['propertyManager'];
        $selectedFacilities = $_POST['selectedFacilities'];
        $uuid = $_POST['uuid'];

        Properties::saveProperty(
            $propertyName,
            $propertyType,
            $propertyCategory,
            $propertyAddress,
            $location,
            $description,
            $numberOfUnits,
            $propertySize,
            $furnishingStatus,
            $propertyManager,
            $selectedFacilities,
            $uuid
        );

    }

    public function saveCategory()
    {
        $categoryName = $_POST['categoryName'];
        $description = $_POST['description'];
        Properties::saveCategory($categoryName,$description);
    }

    public function editCategory()
    {
        $catid = $_POST['catid'];
        $categoryName = $_POST['categoryName'];
        $description = $_POST['description'];
        Properties::editCategory($categoryName,$description,$catid);
    }

    public function saveOwnerDetails()
    {
        $ownerFullName = $_POST['ownerFullName'];
        $ownerEmail = $_POST['ownerEmail'];
        $ownerPhone = $_POST['ownerPhone'];
        $ownerAddress = $_POST['ownerAddress'];
        $ownerCity = $_POST['ownerCity'];
        $ownershipType = $_POST['ownershipType'];
        $ownerComments = $_POST['ownerComments'];
        $uuid = $_POST['uuid'];

        Properties::saveOwnerDetails(
            $ownerFullName,
            $ownerEmail,
            $ownerPhone,
            $ownerAddress,
            $ownerCity,
            $ownershipType,
            $ownerComments,
            $uuid
        );

    }

    public function saveRentalDetails()
    {
        $rentAmount = $_POST['rentAmount'];
        $depositAmount = $_POST['depositAmount'];
        $leasePeriod = $_POST['leasePeriod'];
        $availabilityDate = $_POST['availabilityDate'];
        $utilitiesIncluded = $_POST['utilitiesIncluded'];
        $paymentFrequency = $_POST['paymentFrequency'];
        $uuid = $_POST['uuid'];

        Properties::saveRentalDetails(
            $rentAmount,
            $depositAmount,
            $leasePeriod,
            $availabilityDate,
            $utilitiesIncluded,
            $paymentFrequency,
            $uuid
        );
    }


}
