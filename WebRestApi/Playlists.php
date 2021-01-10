<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 5/11/2018
 * Time: 11:01 AM
 */

require '../InfinityFramework/DSN/DBH.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ID = htmlentities($_POST['UserID'], ENT_QUOTES, "UTF-8");

    $stripped = str_replace(' ', '', $ID);


    $PreparedStatement = "SELECT * FROM playlists WHERE  user_id='$ID'";
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
    echo "BAD REQUEST";
}
