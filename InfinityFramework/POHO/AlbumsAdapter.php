<?php

/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 26-Jan-18
 * Time: 4:15 AM
 */
class AlbumsAdapter
{
    public static function GetAlbumsForArtist()
    {
        $ID = AlbumsModel::getArtistID();
        $PreparedStatement = "SELECT * FROM  albums WHERE artist_id ='$ID'";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            AlbumsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                AlbumsModel::setJSONFEED($data);

            }
        } else {
            AlbumsModel::setResult("FALSE");
        }
    }

    public static function CheckDownloads()
    {
        $ID = AlbumsModel::getAlbumID();
        $PreparedStatement = "SELECT downloads_alb FROM  albums WHERE alb_id ='$ID'";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            SongsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                AlbumsModel::setJSONFEED($data);

            }
        } else {
            SongsModel::setResult("FALSE");
        }
    }

    public static function UpdateSongDownloads()
    {
        $ID = AlbumsModel::getAlbumID();
        $Downloads = AlbumsModel::getDownloads();
        $PreparedStatement = "UPDATE albums SET downloads_alb ='$Downloads' WHERE alb_id='$ID'";
        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            AlbumsModel::setResult("TRUE");
        } else {
            AlbumsModel::setResult("FALSE");
        }

    }

    public static function LoadAlbumSong()
    {
        $ID = AlbumsModel::getAlbumID();

        $PreparedStatement = "SELECT * FROM  albums,songs WHERE albums.`artist_id`= songs.`artist_id` AND songs.alb_id='$ID'";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            AlbumsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                AlbumsModel::setJSONFEED($data);

            }
        } else {
            SongsModel::setResult("FALSE");
        }

    }

    public static function LoadTopTwentyAllAlbums()
    {

        $PreparedStatement = "SELECT * FROM  albums,artists WHERE albums.`artist_id`= artists.`artists_id` ORDER BY alb_id DESC LIMIT 20";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            AlbumsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                AlbumsModel::setJSONFEED($data);

            }
        } else {
            SongsModel::setResult("FALSE");
        }

    }

}