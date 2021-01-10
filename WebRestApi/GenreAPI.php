<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 8/6/2018
 * Time: 11:20 PM
 */

require '../InfinityFramework/DSN/DBH.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $gen = htmlentities($_POST['id'], ENT_QUOTES, "UTF-8");
    $PST = "SELECT * FROM songs WHERE genre='$gen' ORDER BY song_id DESC";

    $stmt = DBH::getInstance()->CRUD($PreparedStatement);
    $Rows = $stmt->rowCount();
    if ($Rows > 0) {
        while ($row = $stmt->fetchAll()) {
            $output[] = $row;
            print(json_encode($row, TRUE));

        }
    }else {
        echo "NONE";
    }
}
