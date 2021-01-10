<?php

/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 05-Feb-18
 * Time: 5:45 AM
 */
class Lyrics
{
    private static $SongId, $Lyrics, $JSONFEED, $Result, $Name, $Artist;

    /**
     * @return mixed
     */
    public static function getSongId()
    {
        return self::$SongId;
    }

    /**
     * @param mixed $SongId
     */
    public static function setSongId($SongId)
    {
        self::$SongId = $SongId;
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
    public static function getArtist()
    {
        return self::$Artist;
    }

    /**
     * @param mixed $Artist
     */
    public static function setArtist($Artist)
    {
        self::$Artist = $Artist;
    }

}