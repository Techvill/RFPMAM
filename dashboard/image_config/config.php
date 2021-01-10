<?php
/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 02-Jan-18
 * Time: 7:58 AM
 */


$validation_type = 1;

if ($validation_type == 1) {
    $mime = array('image/gif' => 'gif',
        'image/jpeg' => 'jpeg',
        'image/png' => 'png',
        'application/x-shockwave-flash' => 'swf',
        'image/psd' => 'psd',
        'image/bmp' => 'bmp',
        'image/tiff' => 'tiff',
        'image/jp2' => 'jp2',
        'image/iff' => 'iff',
        'image/vnd.wap.wbmp' => 'bmp',
        'image/xbm' => 'xbm',
        'image/vnd.microsoft.icon' => 'ico');
} else if ($validation_type == 2) // Second choice? Set the extensions
{
    $image_extensions_allowed = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
}

$artists_pics = '../../IMedia/artists_pics/';
$spoken_pics = '../../IMedia/spoken/';
$alb_covers = '../../IMedia/covers/';
$news = '../../IMedia/events/';
$song_covers = '../../IMedia/art/';
$albums_url = '../../DL/albums/';
$song_url = '../../DL/songs/';
$songURL = '../../../DL/songs/';
$spoken_url = '../../DL/spoken/';



