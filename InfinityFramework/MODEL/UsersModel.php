<?php
/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 14-Jan-18
 * Time: 3:35 PM
 */

class UsersModel
{

    private static $Phone, $Email, $Location, $FullName, $Contribution, $Result, $ID, $ConferenceName, $Password;

    /**
     * @return mixed
     */
    public static function getPassword()
    {
        return self::$Password;
    }

    /**
     * @param mixed $Password
     */
    public static function setPassword($Password)
    {
        self::$Password = $Password;
    }

    /**
     * @return mixed
     */
    public static function getConferenceName()
    {
        return self::$ConferenceName;
    }

    /**
     * @param mixed $ConferenceName
     */
    public static function setConferenceName($ConferenceName)
    {
        self::$ConferenceName = $ConferenceName;
    }

    /**
     * @return mixed
     */
    public static function getID()
    {
        return self::$ID;
    }

    /**
     * @param mixed $ID
     */
    public static function setID($ID)
    {
        self::$ID = $ID;
    }

    /**
     * @return mixed
     */
    public static function getPhone()
    {
        return self::$Phone;
    }

    /**
     * @param mixed $Phone
     */
    public static function setPhone($Phone)
    {
        self::$Phone = $Phone;
    }

    /**
     * @return mixed
     */
    public static function getEmail()
    {
        return self::$Email;
    }

    /**
     * @param mixed $Email
     */
    public static function setEmail($Email)
    {
        self::$Email = $Email;
    }

    /**
     * @return mixed
     */
    public static function getLocation()
    {
        return self::$Location;
    }

    /**
     * @param mixed $Location
     */
    public static function setLocation($Location)
    {
        self::$Location = $Location;
    }

    /**
     * @return mixed
     */
    public static function getFullName()
    {
        return self::$FullName;
    }

    /**
     * @param mixed $FullName
     */
    public static function setFullName($FullName)
    {
        self::$FullName = $FullName;
    }

    /**
     * @return mixed
     */
    public static function getContribution()
    {
        return self::$Contribution;
    }

    /**
     * @param mixed $Contribution
     */
    public static function setContribution($Contribution)
    {
        self::$Contribution = $Contribution;
    }

    /**
     * @return mixed
     */
    public static function getResult()
    {
        return self::$Result;
    }

    /**
     * @param mixed $Result
     */
    public static function setResult($Result)
    {
        self::$Result = $Result;
    }
}