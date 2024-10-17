<?php

class Tenant extends PostController
{

    public function saveTenant()
    {
        $fullName = $_POST['fullName'];
        $birthDate = $_POST['birthDate'];
        $gender = $_POST['gender'];
        $emailAddress = $_POST['emailAddress'];
        $phoneNumber = $_POST['phoneNumber'];
        $altPhoneNumber = $_POST['altPhoneNumber'];
        $residentialAddress = $_POST['residentialAddress'];
        $nationality = $_POST['nationality'];
        $nationalId = $_POST['nationalId'];
        $maritalStatus = $_POST['maritalStatus'];
        $emergencyName = $_POST['emergencyName'];
        $emergencyContact = $_POST['emergencyContact'];
        $occupation = $_POST['occupation'];
        $employerName = $_POST['employerName'];
        $employerContact = $_POST['employerContact'];
        $uuid = $_POST['uuid'];

        Tenants::saveTenant(
            $fullName,
            $birthDate,
            $gender,
            $emailAddress,
            $phoneNumber,
            $altPhoneNumber,
            $residentialAddress,
            $nationality,
            $nationalId,
            $maritalStatus,
            $emergencyName,
            $emergencyContact,
            $occupation,
            $employerName,
            $employerContact,
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
