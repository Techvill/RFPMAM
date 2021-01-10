<?php

/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 26-Jan-18
 * Time: 4:15 AM
 */
class AlbumsModel
{
    private static $AlbumID, $Name, $URL, $ArtistID, $Downloads, $Result, $Cover, $JSONFEED;

    /**
     * @return mixed
     */
    public static function getCover()
    {
        return self::$Cover;
    }

    /**
     * @param mixed $Cover
     */
    public static function setCover($Cover)
    {
        self::$Cover = $Cover;
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

    /**
     * @return mixed
     */
    public static function getAlbumID()
    {
        return self::$AlbumID;
    }

    /**
     * @param mixed $AlbumID
     */
    public static function setAlbumID($AlbumID)
    {
        self::$AlbumID = $AlbumID;
    }

    /**
     * @return mixed
     */
    public static function getName()
    {
        return self::$Name;
    }

    /**
     * @param mixed $Name
     */
    public static function setName($Name)
    {
        self::$Name = $Name;
    }

    /**
     * @return mixed
     */
    public static function getURL()
    {
        return self::$URL;
    }

    /**
     * @param mixed $URL
     */
    public static function setURL($URL)
    {
        self::$URL = $URL;
    }

    /**
     * @return mixed
     */
    public static function getArtistID()
    {
        return self::$ArtistID;
    }

    /**
     * @param mixed $ArtistID
     */
    public static function setArtistID($ArtistID)
    {
        self::$ArtistID = $ArtistID;
    }

    /**
     * @return mixed
     */
    public static function getDownloads()
    {
        return self::$Downloads;
    }

    /**
     * @param mixed $Downloads
     */
    public static function setDownloads($Downloads)
    {
        self::$Downloads = $Downloads;
    }

}