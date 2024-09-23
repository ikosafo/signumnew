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

}
