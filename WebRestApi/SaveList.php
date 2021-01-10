<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 8/13/2018
 * Time: 11:17 PM
 */

require '../InfinityFramework/DSN/DBH.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $Listname = htmlentities($_POST['PlaylistName'], ENT_QUOTES, "UTF-8");
    $Desc = htmlentities($_POST['Desc'], ENT_QUOTES, "UTF-8");
    $UserID = htmlentities($_POST['UserID'], ENT_QUOTES, "UTF-8");
    $Date = date("d-M-Y");

    $CHECK = "SELECT * FROM playlists WHERE user_id='$UserID' AND list_name='$Listname'";

    $CHECK = DBH::getInstance()->CRUD($CHECK);
    if ($CHECK->rowCount() > 0) {
        echo "FOUND";
    } else {

        $PST = "INSERT INTO playlists(list_name,description, user_id, date_created) VALUES ('$Listname','$Desc','$UserID','$Date')";

        $RST = DBH::getInstance()->CRUD($PST);

        if ($RST->rowCount() > 0) {
            echo "SUCCESS";
        } else {
            echo "ERROR";
        }

    }


}
