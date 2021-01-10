<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 6/10/2018
 * Time: 11:16 PM
 */

require '../InfinityFramework/DSN/DBH.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ID = htmlentities($_POST['id'], ENT_QUOTES, "UTF-8");
    $PreparedStatement = "SELECT
  songs.`url` AS url,
  songs.`song_name` AS song_name,
  songs.`song_art` AS song_art,
  songs.`downloads` AS downloads,
  songs.`song_id` AS song_id,
  artists.`name` AS name,
  albums.`name_alb` AS name_alb
  
FROM
  songs,
  albums,
  artists
WHERE songs.`artist_id` = albums.`artist_id`
  AND songs.`artist_id` = artists.`artists_id`

 AND songs.artist_id ='$ID' GROUP BY songs.song_id";

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

} else {
    echo "Invalid Request detected.";
}

