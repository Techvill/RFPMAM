<?php

/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 26-Jan-18
 * Time: 3:39 AM
 */
class SongsModel
{
    private static $SongID, $Name, $URL, $ArtistId, $AlbumID, $Downloads, $Lyrics, $Result, $JSONFEED;

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
    public static function getSongID()
    {
        return self::$SongID;
    }

    /**
     * @param mixed $SongID
     */
    public static function setSongID($SongID)
    {
        self::$SongID = $SongID;
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
    public static function getArtistId()
    {
        return self::$ArtistId;
    }

    /**
     * @param mixed $ArtistId
     */
    public static function setArtistId($ArtistId)
    {
        self::$ArtistId = $ArtistId;
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

    /**
     * @return mixed
     */
    public static function getLyrics()
    {
        return self::$Lyrics;
    }

    /**
     * @param mixed $Lyrics
     */
    public static function setLyrics($Lyrics)
    {
        self::$Lyrics = $Lyrics;
    }

}