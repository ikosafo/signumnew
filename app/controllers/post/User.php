<?php

class User extends PostController
{
    public function saveUser()
    {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $emailAddress = $_POST['emailAddress'];
        $phoneNumber = $_POST['phoneNumber'];
        $altPhoneNumber = $_POST['altPhoneNumber'];
        $dateBirth = $_POST['dateBirth'];
        $department = $_POST['department'];
        $address = $_POST['address'];
        $jobTitle = $_POST['jobTitle'];
        $uuid = $_POST['uuid'];

        Institution::saveUser(
            $firstName,
            $lastName,
            $emailAddress,
            $phoneNumber,
            $altPhoneNumber,
            $dateBirth,
            $department,
            $address,
            $jobTitle,
            $uuid
        );

    }

    public function saveUserAccount()
    {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $confirmPassword = $_POST['confirmPassword'];
        $securityQuestion = $_POST['securityQuestion'];
        $securityAnswer = $_POST['securityAnswer'];
        $uuid = $_POST['uuid'];
        
        Institution::saveUserAccount(
            $username,
            $password, 
            $securityQuestion,
            $securityAnswer,
            $uuid
        );
    }


    public function savePassword() {
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $uid = $_POST['uid'];

        Users::savePassword(
            $currentPassword,
            $newPassword,
            $uid
        );
    }

    public function saveRole()
    {
        $userRole = $_POST['userRole'];
        $permissions = $_POST['permissions'];
        $uuid = $_POST['uuid'];
        
        Institution::saveRole(
            $userRole,
            $permissions,
            $uuid
        );
    }
    
}
