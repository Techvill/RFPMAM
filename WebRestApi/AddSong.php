<?php
/**
 * Created by PhpStorm.
 * User: JFNgozo
 * Date: 2/15/2019
 * Time: 11:24 AM
 */


require '../InfinityFramework/DSN/DBH.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ListName = htmlentities($_POST['PID'], ENT_QUOTES, "UTF-8");
    $Artist = htmlentities($_POST['ARTIST'], ENT_QUOTES, "UTF-8");
    $SongName = htmlentities($_POST['NAME'], ENT_QUOTES, "UTF-8");
    $URL = htmlentities($_POST['URL'], ENT_QUOTES, "UTF-8");
    $Art = "http://rfpmam.com/IMedia/art/" . $_POST['SONG_ART'];


    $PST = "INSERT INTO playlist_songs(playlist_id, song_artist, song_name, song_url, art) 
          VALUES ('$ListName','$Artist','$SongName','$URL', '$Art')";


    $RST = DBH::getInstance()->CRUD($PST);

    if ($RST->rowCount() > 0) {
        echo "SUCCESS" . " " . $Art;
    } else {
        echo "ERROR";
    }


} else {
    echo "Bad Request";
}