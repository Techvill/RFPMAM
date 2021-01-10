<?php

/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 05-Feb-18
 * Time: 5:47 AM
 */
class LyricsAdapter
{
    public static function FetchLyrics()
    {
        $PreparedStatement = "SELECT * FROM songs,artists WHERE songs.artist_id=artists.artists_id AND lyrics!='' ORDER  BY song_id DESC;";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            Lyrics::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                Lyrics::setJSONFEED($data);

            }
        } else {
            Lyrics::setResult("FALSE");
        }

    }

    public static function FetchSongLyrics()
    {
        $id = Lyrics::getSongId();
        $PreparedStatement = "SELECT * FROM songs,artists WHERE songs.artist_id=artists.artists_id AND songs.song_id='$id' ORDER  BY song_id DESC;";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            Lyrics::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                Lyrics::setJSONFEED($data);

            }
        } else {
            Lyrics::setResult("FALSE");
        }

    }

}