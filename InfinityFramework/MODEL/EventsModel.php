<?php

/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 05-Feb-18
 * Time: 9:47 AM
 */
class EventsModel
{
    private static $NewsID, $Content, $Picture, $Date, $JSONFEED, $Title, $Result;

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

    /**
     * @return mixed
     */
    public static function getNewsID()
    {
        return self::$NewsID;
    }

    /**
     * @param mixed $NewsID
     */
    public static function setNewsID($NewsID)
    {
        self::$NewsID = $NewsID;
    }

    /**
     * @return mixed
     */
    public static function getContent()
    {
        return self::$Content;
    }

    /**
     * @param mixed $Content
     */
    public static function setContent($Content)
    {
        self::$Content = $Content;
    }

    /**
     * @return mixed
     */
    public static function getPicture()
    {
        return self::$Picture;
    }

    /**
     * @param mixed $Picture
     */
    public static function setPicture($Picture)
    {
        self::$Picture = $Picture;
    }

    /**
     * @return mixed
     */
    public static function getDate()
    {
        return self::$Date;
    }

    /**
     * @param mixed $Date
     */
    public static function setDate($Date)
    {
        self::$Date = $Date;
    }

    /**
     * @return mixed
     */
    public static function getJSONFEED()
    {
        return self::$JSONFEED;
    }

    /**
     * @param mixed $JSONFEED
     */
    public static function setJSONFEED($JSONFEED)
    {
        self::$JSONFEED = $JSONFEED;
    }

    /**
     * @return mixed
     */
    public static function getTitle()
    {
        return self::$Title;
    }

    /**
     * @param mixed $Title
     */
    public static function setTitle($Title)
    {
        self::$Title = $Title;
    }

}