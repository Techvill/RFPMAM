<?php
/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 14-Jan-18
 * Time: 3:37 PM
 */

class UsersClass
{


    /**
     * UsersClass constructor.
     */
    public function __construct()
    {

    }

    public static function CheckDuplicates()
    {
        $Email = UsersModel::getEmail();
        $ID = UsersModel::getID();

        $Statement = "SELECT * FROM conferences_members WHERE email='$Email'  AND id='$ID'";

        $Res = DBH::getInstance()->CRUD($Statement);

        if ($Res->rowCount() > 0) {

            UsersModel::setResult("True");
        } else {
            UsersModel::setResult("False");
        }

    }


    public static function RegisterUser()
    {
        $Phone = UsersModel::getPhone();
        $Email = UsersModel::getEmail();
        $Location = UsersModel::getLocation();
        $FullName = UsersModel::getFullName();
        $ID = UsersModel::getID();
        $Contribution = UsersModel::getContribution();
        $ConferenceName = UsersModel::getConferenceName();

        $PreparedStatement = "INSERT INTO Conferences_Members(id,name,fullname,email,phone,location)
                              VALUES('$ID','$ConferenceName','$FullName','$Email','$Phone','$Location')";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            UsersModel::setResult("True");
        } else {
            UsersModel::setResult("False");
        }

    }

    public static function Contribute()
    {
        $Phone = UsersModel::getPhone();
        $Email = UsersModel::getEmail();
        $Location = UsersModel::getLocation();
        $FullName = UsersModel::getFullName();
        $ID = UsersModel::getID();
        $Contribution = UsersModel::getContribution();
        $ConferenceName = UsersModel::getConferenceName();

        $PreparedStatement = "INSERT INTO contributions(fullname,phone,email,conf_id,name,contribution,location)
                              VALUES('$FullName','$Phone','$Email','$ID','$ConferenceName','$Contribution','$Location')";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            UsersModel::setResult("True");
        } else {
            UsersModel::setResult("False");
        }

    }

    public static function LoginUser()
    {
        $Email = UsersModel::getEmail();
        $Password = UsersModel::getPassword();

        $PreparedStatement = "SELECT * FROM Admin WHERE email ='$Email'";
        $Result = DBH::getInstance()->CRUD($PreparedStatement);

        if ($Result->rowCount() > 0) {
            foreach ($Result as $item) {

                $DatabasePassword = $item['password'];
                if (password_verify($Password, $DatabasePassword)) {
                    UsersModel::setResult("TRUE");

                } else {
                    UsersModel::setResult("WRONG");
                }
            }
        } else {
            UsersModel::setResult("FAIL");
        }


    }


}