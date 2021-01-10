<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 5/11/2018
 * Time: 11:01 AM
 */

require '../InfinityFramework/DSN/DBH.php';
$PreparedStatement = "SELECT DISTINCT  genre FROM  songs;";


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