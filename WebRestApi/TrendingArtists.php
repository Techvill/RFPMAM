<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 4/19/2018
 * Time: 10:31 PM
 */
require '../InfinityFramework/DSN/DBH.php';
$PreparedStatement = "SELECT * FROM trending, artists WHERE trending.artist_id = artists.artists_id ORDER BY RAND()";

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


}

