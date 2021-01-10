<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 8/6/2018
 * Time: 11:54 PM
 */

require '../InfinityFramework/DSN/DBH.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//
    $KEY = htmlentities($_POST['key'], ENT_QUOTES, "UTF-8");
    $PST = "SELECT *  FROM songs,albums,artists WHERE songs.song_name
      LIKE'%$KEY%' AND 
         songs.`artist_id`=artists.`artists_id`
         AND songs.`artist_id`=`albums`.`artist_id` GROUP BY songs.`song_id`;";

    $stmt = DBH::getInstance()->CRUD($PreparedStatement);
    $Rows = $stmt->rowCount();
    if ($Rows > 0) {
        while ($row = $stmt->fetchAll()) {
            $output[] = $row;
            print(json_encode($row, TRUE));

        }
    } else {
        echo "NONE";
    }

}
