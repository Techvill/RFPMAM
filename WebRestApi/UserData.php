<?php


require '../InfinityFramework/DSN/DBH.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");


    $CHECK = "SELECT * FROM users WHERE email='$email'";

    $stmt = DBH::getInstance()->CRUD($CHECK);
    $Rows = $stmt->rowCount();
    if ($Rows > 0) {
        while ($row = $stmt->fetchAll()) {
            $output[] = $row;
            print(json_encode($row, TRUE));

        }
    } else {
        echo "FALSE";
    }


} else {

    echo "ERROR";


}
