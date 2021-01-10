<?php
/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 22-Aug-17
 * Time: 3:54 AM
 */

$validation_type = 1;

if ($validation_type == 1) {
    $mime = array('audio/gif' => 'gif',
        'image/jpeg' => 'jpeg',
        'image/png' => 'png',
        'application/x-shockwave-flash' => 'swf',
        'image/psd' => 'psd',
        'image/bmp' => 'bmp',
        'image/tiff' => 'tiff',
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

$upload_image_to_folder = '../../Imedia/';
$audio_folder = '../../media/audio/';