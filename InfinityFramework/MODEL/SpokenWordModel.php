<?php

/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 05-Feb-18
 * Time: 10:49 AM
 */
class SpokenWordModel
{

    private static $ArtistName, $ID, $Albums, $Songs, $Bio, $Picture, $Result, $JSONFEED;

    /**
     * @return mixed
     */
    public static function getArtistName()
    {
        return self::$ArtistName;
    }

    /**
     * @param mixed $ArtistName
     */
    public static function setArtistName($ArtistName)
    {
        self::$ArtistName = $ArtistName;
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
    public static function getAlbums()
    {
        return self::$Albums;
    }

    /**
     * @param mixed $Albums
     */
    public static function setAlbums($Albums)
    {
        self::$Albums = $Albums;
    }

    /**
     * @return mixed
     */
    public static function getSongs()
    {
        return self::$Songs;
    }

    /**
     * @param mixed $Songs
     */
    public static function setSongs($Songs)
    {
        self::$Songs = $Songs;
    }

    /**
     * @return mixed
     */
    public static function getBio()
    {
        return self::$Bio;
    }

    /**
     * @param mixed $Bio
     */
    public static function setBio($Bio)
    {
        self::$Bio = $Bio;
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
}