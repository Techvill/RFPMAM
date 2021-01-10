<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 8/13/2018
 * Time: 11:44 PM
 */

require '../InfinityFramework/DSN/DBH.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
    $password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

    $CHECK = "SELECT * FROM users WHERE email='$email' LIMIT 1";

    $CHECK = DBH::getInstance()->CRUD($CHECK);
    if ($CHECK->rowCount() > 0) {
        $PST = $CHECK->fetch();


        $DBPASS = $PST['password'];


        if (password_verify($password, $DBPASS)) {
            $output[] = $PST;
            print(json_encode($output, TRUE));
            header("HTTP/1.1 200 OK");
        } else {
            echo "PASSWORD_ERROR";
            header("HTTP/1.1 404 OK");
        }

    } else {
        echo "NO_ACCOUNT";
        header("HTTP/1.1 404 OK");
    }

} else {

    echo "ERROR";
    header("HTTP/1.1 400 OK");


}

