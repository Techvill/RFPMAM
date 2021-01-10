<?php

/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 26-Jan-18
 * Time: 3:41 AM
 */
class SongsAdapter
{
    public static function GetSongsForArtist()
    {
        $ID = ArtistsModel::getID();
        $PreparedStatement = "SELECT * FROM  songs WHERE artist_id ='$ID'";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            SongsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                SongsModel::setJSONFEED($data);

            }
        } else {
            SongsModel::setResult("FALSE");
        }
    }

    public static function CheckDownloads()
    {
        $ID = SongsModel::getSongID();
        $PreparedStatement = "SELECT downloads FROM  songs WHERE song_id ='$ID'";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            SongsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                SongsModel::setJSONFEED($data);

            }
        } else {
            SongsModel::setResult("FALSE");
        }
    }

    public static function UpdateSongDownloads()
    {
        $ID = SongsModel::getSongID();
        $Downloads = SongsModel::getDownloads();
        $PreparedStatement = "UPDATE songs SET downloads ='$Downloads' WHERE song_id='$ID'";
        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            SongsModel::setResult("TRUE");
        } else {
            SongsModel::setResult("FALSE");
        }

    }


    public static function FetchNewTopTenReleases()
    {

        $PreparedStatement = "SELECT * FROM  songs ORDER BY song_id DESC LIMIT 15";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            SongsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                SongsModel::setJSONFEED($data);

            }
        } else {
            SongsModel::setResult("FALSE");
        }
    }

    public static function FetchTop50Songs()
    {
        $PreparedStatement = "SELECT * FROM artists,songs WHERE artists.artists_id = songs.artist_id ORDER BY RAND() LIMIT 50;";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            SongsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                SongsModel::setJSONFEED($data);

            }
        } else {
            SongsModel::setResult("FALSE");
        }

    }

    public static function FetchAllSongs()
    {
        $PreparedStatement = "SELECT * FROM artists,songs WHERE artists.artists_id = songs.artist_id ORDER BY name ASC ;";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            SongsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                SongsModel::setJSONFEED($data);

            }
        } else {
            SongsModel::setResult("FALSE");
        }

    }

    public static function FetchSpecific($Letter)
    {
        $PreparedStatement = "SELECT * FROM songs,artists WHERE songs.`song_name` REGEXP '^[$Letter].*$' AND artists.artists_id = songs.artist_id";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            SongsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                SongsModel::setJSONFEED($data);

            }
        } else {
            SongsModel::setResult("FALSE");
        }

    }

    public static function TopTenDownloads()
    {
        $PreparedStatement = "SELECT DISTINCT name_alb,artists_id,name,downloads,song_name,song_id,songs.alb_id  FROM  artists,songs,albums WHERE songs.artist_id=artists.artists_id  
                                GROUP BY songs.song_id  ORDER BY
                               songs.downloads DESC LIMIT 20";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            SongsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                SongsModel::setJSONFEED($data);

            }
        } else {
            SongsModel::setResult("FALSE");
        }

    }
}