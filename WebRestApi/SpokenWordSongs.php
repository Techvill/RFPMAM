<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 6/29/2018
 * Time: 2:22 AM
 */
require '../InfinityFramework/DSN/DBH.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ID = htmlentities($_POST['id'], ENT_QUOTES, "UTF-8");
    $PreparedStatement = "SELECT * FROM  spoken_words, spoken_word_artists WHERE spoken_word_artists.`artist_id`=spoken_words.`artist_id` AND spoken_words.artist_id ='$ID'";

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

