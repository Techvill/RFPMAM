<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 8/13/2018
 * Time: 11:17 PM
 */

require '../InfinityFramework/DSN/DBH.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $fullname = htmlentities($_POST['full_name'], ENT_QUOTES, "UTF-8");
    $email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
    $password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

    $CHECK = "SELECT email FROM users WHERE email='$email'";

    $CHECK = DBH::getInstance()->CRUD($CHECK);
    if ($CHECK->rowCount() > 0) {
        echo "FOUND";
    } else {
        $NewPassword = password_hash($password, PASSWORD_BCRYPT);

        $PST = "INSERT INTO users(fullname, email, password) VALUES ('$fullname','$email','$NewPassword')";

        $RST = DBH::getInstance()->CRUD($PST);

        if ($RST->rowCount() > 0) {
            echo "SUCCESS";
        } else {
            echo "ERROR";
        }

    }


}
