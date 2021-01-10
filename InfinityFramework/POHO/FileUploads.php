<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 11/2/2018
 * Time: 12:29 PM
 */

class FileUploads
{
    public static $SongDirectory = "../../DL/songs/";

    public static function UploadSingles($SongURL)
    {
//        $move_file_pic = move_uploaded_file($pro_image['tmp_name'], $song_covers . $profile_picture_url);
        $move_song = move_uploaded_file($_FILES["song"]['tmp_name'], self::getSongDirectory() . $SongURL);

        try {
            if ($move_song) {
                echo "Hello";
            }
        } catch (Exception $e) {

        }

    }

    /**
     * @return string
     */
    public static function getSongDirectory()
    {
        return self::$SongDirectory;
    }

    /**
     * @param string $SongDirectory
     */
    public static function setSongDirectory($SongDirectory)
    {
        self::$SongDirectory = $SongDirectory;
    }

}