<?php

/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 05-Feb-18
 * Time: 9:48 AM
 */
class EventsAdapter
{
    public static function GetUpdates()
    {
        $PreparedStatement = "SELECT * FROM news_events ORDER BY id DESC";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        if ($ResultSet->rowCount() > 0) {
            EventsModel::setResult("TRUE");
            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                EventsModel::setJSONFEED($data);

            }
        } else {
            EventsModel::setResult("FALSE");
        }
    }

    public static function GetHomeUpdates()
    {
        $PreparedStatement = "SELECT * FROM news_events ORDER BY id DESC LIMIT 4";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        if ($ResultSet->rowCount() > 0) {
            EventsModel::setResult("TRUE");
            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                EventsModel::setJSONFEED($data);

            }
        } else {
            EventsModel::setResult("FALSE");
        }
    }

    public static function GetNewsByID($ID)
    {
        $PreparedStatement = "SELECT * FROM news_events WHERE id='$ID'";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        if ($ResultSet->rowCount() > 0) {
            EventsModel::setResult("TRUE");
            while ($row = $ResultSet->fetchAll()) {
                $output[] = $row;
                $data = json_encode($row, TRUE);

                EventsModel::setJSONFEED($data);

            }
        } else {
            EventsModel::setResult("FALSE");
        }
    }

}