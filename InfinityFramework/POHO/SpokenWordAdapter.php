<?php

/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 05-Feb-18
 * Time: 10:50 AM
 */
class SpokenWordAdapter
{
    public static function ArtistsProfileData()
    {
        $ID = SpokenWordModel::getID();


        $PreparedStatement = "SELECT * FROM  spoken_word_artists WHERE artist_id ='$ID'";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            SpokenWordModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                SpokenWordModel::setJSONFEED($data);

            }
        } else {
            SpokenWordModel::setResult("FALSE");
        }

    }

    public static function FetchAllSongs()
    {
        $PreparedStatement = "SELECT * FROM spoken_word_artists,spoken_words WHERE spoken_word_artists.artist_id = spoken_words.artist_id ORDER BY RAND() ;";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {
            SpokenWordModel::setResult("TRUE");

            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                SpokenWordModel::setJSONFEED($data);

            }
        } else {
            SpokenWordModel::setResult("FALSE");
        }

    }
}