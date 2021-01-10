<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 4/20/2018
 * Time: 12:12 AM
 */

require '../InfinityFramework/DSN/DBH.php';
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
  AND songs.`artist_id` = artists.`artists_id` ORDER BY  RAND();


";


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
