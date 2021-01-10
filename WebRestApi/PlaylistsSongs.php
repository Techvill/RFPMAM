<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 6/11/2018
 * Time: 12:44 AM
 */

require '../InfinityFramework/DSN/DBH.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ID = htmlentities($_POST['ID'], ENT_QUOTES, "UTF-8");
    $PreparedStatement = "SELECT * FROM  playlist_songs WHERE playlist_id ='$ID'";
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
        echo "EMPTY";
    }

} else {
    echo "BAD";
}

