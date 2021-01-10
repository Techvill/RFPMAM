<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 2/15/2019
 * Time: 11:24 AM
 */


require '../InfinityFramework/DSN/DBH.php';


function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $UserID = htmlentities($_POST['ID'], ENT_QUOTES, "UTF-8");
    $pic = $_POST['pic'];
    $img_name = generateRandomString(16) . ".jpeg";
    $data = "data:image/jpeg;base64, {$pic}";

    list($type, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);
    $data = base64_decode($data);
    $PST = "UPDATE users SET picture='$img_name'  WHERE user_id='$UserID'";


    $RST = DBH::getInstance()->CRUD($PST);

    if ($RST->rowCount() > 0) {
        echo "SUCCESS";
    } else {
        echo "ERROR";
    }


} else {
    echo "Bad Request";
}