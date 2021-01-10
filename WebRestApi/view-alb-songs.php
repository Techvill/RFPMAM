<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 6/8/2018
 * Time: 10:34 PM
 */

require '../InfinityFramework/DSN/DBH.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ID = htmlentities($_POST['id'], ENT_QUOTES, "UTF-8");

    $PreparedStatement = "SELECT * FROM  albums,songs WHERE albums.`artist_id`= songs.`artist_id` AND songs.alb_id='$ID'";
    $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);


    $Rows = $ResultSet->rowCount();

    if ($Rows > 0) {


        $stmt = DBH::getInstance()->CRUD($PreparedStatement);
        $Rows = $stmt->rowCount();
        if ($Rows > 0) {
            while ($row = $stmt->fetchAll()) {
                $output[] = $row;
                print(json_encode($row, TRUE));

            }
        } else {
            echo "NONE";
        }


    } else {
        echo "No songs in this album";
    }
}

