<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 6/28/2018
 * Time: 10:41 AM
 */
require '../InfinityFramework/DSN/DBH.php';
$PreparedStatement = "SELECT * FROM  artists";

$ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

$Rows = $ResultSet->rowCount();

if ($Rows > 0) {


    $stmt = DBH::getInstance()->CRUD($PreparedStatement);
    $Rows = $stmt->rowCount();
    while ($row = $stmt->fetchAll()) {
        $output[] = $row;
        print(json_encode($row, TRUE));

    }

}else {
    echo "NONE";
}