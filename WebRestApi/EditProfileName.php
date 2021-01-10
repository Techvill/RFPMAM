<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 2/15/2019
 * Time: 11:24 AM
 */


require '../InfinityFramework/DSN/DBH.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $UserID = htmlentities($_POST['ID'], ENT_QUOTES, "UTF-8");
    $NewNAme = htmlentities($_POST['NewNAme'], ENT_QUOTES, "UTF-8");


    $PST = "UPDATE users SET fullname= '$NewNAme' WHERE user_id='$IDerID'";


    $RST = DBH::getInstance()->CRUD($PST);

    if ($RST->rowCount() > 0) {
        echo "SUCCESS";
    } else {
        echo "ERROR";
    }


} else {
    echo "Bad Request";
}