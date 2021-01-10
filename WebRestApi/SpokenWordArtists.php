<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 6/28/2018
 * Time: 10:57 AM
 */

require '../InfinityFramework/DSN/DBH.php';
$PreparedStatement = "SELECT * FROM  spoken_word_artists";

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