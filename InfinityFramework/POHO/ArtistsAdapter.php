<?php

/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 26-Jan-18
 * Time: 3:17 AM
 */
class ArtistsAdapter
{

    public static function ArtistsProfileData()
    {
        $ID = ArtistsModel::getID();


        $PreparedStatement = "SELECT * FROM  artists WHERE artists_id ='$ID'";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                ArtistsModel::setJSONFEED($data);

            }
        } else {
            ArtistsModel::setResult("FALSE");
        }

    }

    public static function SaveNewArtist()
    {

        $facebook = ArtistsModel::getFBURL();
        $Name = ArtistsModel::getArtistName();
        $twitter = ArtistsModel::getTWITTERURL();
        $Profile = ArtistsModel::getPicture();
        $Bio = ArtistsModel::getBio();
        $PreparedStatement = "INSERT INTO artists(name,bio,profile_pic,facebook,twitter) 
                              VALUES('$Name','$Bio','$Profile','$facebook','$twitter')";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

        } else {
            ArtistsModel::setResult("FALSE");
        }

    }

    public static function CheckDuplicates()
    {
        $Name = ArtistsModel::getArtistName();

        $PreparedStatement = "SELECT * FROM artists WHERE name ='$Name'";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

        } else {
            ArtistsModel::setResult("FALSE");
        }

    }

    public static function CheckDuplicatesSongs()
    {
        $Name = ArtistsModel::getArtistName();

        $PreparedStatement = "SELECT * FROM songs  WHERE  ='$Name'";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

        } else {
            ArtistsModel::setResult("FALSE");
        }

    }

    public static function GetAllArtists()
    {
        $PreparedStatement = "SELECT * FROM  artists ORDER BY name ASC LIMIT 24";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                ArtistsModel::setJSONFEED($data);

            }
        } else {
            ArtistsModel::setResult("FALSE");
        }
    }

    public static function GetAllArtistsUnlimited()
    {
        $PreparedStatement = "SELECT * FROM  artists ORDER BY name ASC";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                ArtistsModel::setJSONFEED($data);

            }
        } else {
            ArtistsModel::setResult("FALSE");
        }
    }

    public static function GetNewArtists()
    {
        $PreparedStatement = "SELECT * FROM  artists ORDER BY artists_id DESC LIMIT 18";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                ArtistsModel::setJSONFEED($data);

            }
        } else {
            ArtistsModel::setResult("FALSE");
        }
    }

    public static function GetNewArtistsUnlimited()
    {
        $PreparedStatement = "SELECT * FROM  artists ORDER BY artists_id DESC";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                ArtistsModel::setJSONFEED($data);

            }
        } else {
            ArtistsModel::setResult("FALSE");
        }
    }

    public static function GetMostAlbumsArtists()
    {
        $PreparedStatement = "SELECT * FROM  artists,albums WHERE artists.`artists_id`= albums.`artist_id` ORDER BY songs ASC LIMIT 18";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                ArtistsModel::setJSONFEED($data);

            }
        } else {
            ArtistsModel::setResult("FALSE");
        }
    }

    public static function GetMostAlbumsArtistsUnlimited()
    {
        $PreparedStatement = "SELECT * FROM  artists,albums WHERE artists.`artists_id`= albums.`artist_id` ORDER BY songs ASC";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                ArtistsModel::setJSONFEED($data);

            }
        } else {
            ArtistsModel::setResult("FALSE");
        }
    }

    public static function GetMostSongsArtists()
    {
        $PreparedStatement = "SELECT * FROM  artists,songs WHERE artists.`artists_id`= songs.`artist_id` GROUP BY 
                             artists.artists_id ORDER BY songs DESC LIMIT 18";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                ArtistsModel::setJSONFEED($data);

            }
        } else {
            ArtistsModel::setResult("FALSE");
        }
    }

    public static function GetMostSongsArtistsUnlimited()
    {
        $PreparedStatement = "SELECT * FROM  artists,songs WHERE artists.`artists_id`= songs.`artist_id` GROUP BY 
                             artists.artists_id ORDER BY songs DESC";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                ArtistsModel::setJSONFEED($data);

            }
        } else {
            ArtistsModel::setResult("FALSE");
        }
    }

    public static function GetMostDownloadsArtists()
    {
        $PreparedStatement = "SELECT DISTINCT  * FROM  artists,songs,albums WHERE songs.artist_id=artists.artists_id  
                             AND albums.artist_id = artists.artists_id  GROUP BY artists.name   ORDER BY
                               songs.downloads AND albums.downloads_alb ASC LIMIT 18";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                ArtistsModel::setJSONFEED($data);

            }
        } else {
            ArtistsModel::setResult("FALSE");
        }
    }

    public static function GetMostDownloadsArtistsUnlimited()
    {
        $PreparedStatement = "SELECT DISTINCT  * FROM  artists,songs,albums WHERE songs.artist_id=artists.artists_id  
                             AND albums.artist_id = artists.artists_id  GROUP BY artists.name   ORDER BY
                               songs.downloads AND albums.downloads_alb ASC";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                ArtistsModel::setJSONFEED($data);

            }
        } else {
            ArtistsModel::setResult("FALSE");
        }
    }

    public static function GetAlbumSongsForArtist()
    {
        $ID = SongsModel::getAlbumID();
        $PreparedStatement = "SELECT  * FROM  songs WHERE alb_id ='$ID'";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            ArtistsModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                ArtistsModel::setJSONFEED($data);

            }
        } else {
            ArtistsModel::setResult("FALSE");
        }
    }

}