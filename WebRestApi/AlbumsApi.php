<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 5/21/2018
 * Time: 11:55 AM
 */

require '../InfinityFramework/DSN/DBH.php';
$PreparedStatement = "SELECT * FROM  albums,artists WHERE albums.`artist_id`= artists.`artists_id` ORDER BY alb_id DESC";

$ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

$Rows = $ResultSet->rowCount();

if ($Rows > 0) {


    $stmt = DBH::getInstance()->CRUD($PreparedStatement);
    $Rows = $stmt->rowCount();
    while ($row = $stmt->fetchAll()) {
        $output[] = $row;
        print(json_encode($row, TRUE));

    }

} else {
    echo "NONE";
}