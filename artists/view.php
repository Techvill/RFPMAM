<?php
/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 26-Jan-18
 * Time: 2:41 AM
 */


require '../InfinityFramework/DSN/DBH.php';
require_once '../InfinityFramework/MODEL/ArtistsModel.php';
require_once '../InfinityFramework/MODEL/SongsModel.php';
require_once '../InfinityFramework/MODEL/AlbumsModel.php';
require_once '../InfinityFramework/POHO/ArtistsAdapter.php';
require_once '../InfinityFramework/POHO/SongsAdapter.php';
require_once '../InfinityFramework/POHO/AlbumsAdapter.php';
$ArtistID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
$photo = "";
$name = "";

$PreparedStatement = "SELECT * FROM  artists WHERE artists_id ='$ArtistID'";

$ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

$Rows = $ResultSet->rowCount();

if ($Rows > 0) {
    foreach ($ResultSet as $feed) {
        $name = $feed['name'];
        $songs = $feed['songs'];
        $albums = $feed['albums'];
        $photo = $feed['profile_pic'];
    }
}
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta lang="en">


    <title><?php echo "$name music and bio | RFP Music and Arts " ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php

    echo "<link href='../IMedia/artists_pics/$photo' rel='icon' type='image/png'/>";

    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta property="og:site_name" content="Raised For a Purpose Music and Arts Ministry. "/>
    <meta property="og:title"
          content="<?php echo "$name music and bio   | RFP Music and Arts " ?>"/>
    <meta property="og:description"
          content="<?php echo " $name music and bio | RFP Music and Arts " ?>"/>
    <?php

    echo "<meta property='og:image' content='http://www.rfpmam.com/IMedia/artists_pics/$photo'/>";
    echo "<meta property='og:url' content='http://www.rfpmam.com/artists/view.php?id=$ArtistID'/>";

    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <!--End of css calling-->

    <!--online resources-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <link rel="stylesheet" href="../IUX/UserInterface/bootstrap.css"/>
    <link rel="stylesheet" href="../IUX/UserInterface/infix.css"/>
    <script src="../IUX/UserExperience/jquery-3.2.1.min.js"></script>
    <script src="../IUX/UserExperience/jquery.bxslider.js"></script>
    <script src="../IUX/UserExperience/bootstrap.js"></script>


    <!--end of online resources-->


</head>
<body>

<nav class="navbar navbar-default">
    <div class="">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i> <span class="text-white">Menu</span>
            </button>
            <a class="navbar-brand" id="back" href="../index"> </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="../index.php"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li class="active"><a href="index.php">ARTISTS</a></li>
                <li><a href="../albums/index.php">ALBUMS</a></li>
                <li><a href="../songs/index.php">SONGS</a></li>
                <li><a href="../genres/index.php">GENRES</a></li>
                <li><a href="../spoken/index.php">SPOKEN WORD</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../lyrics/index.php">LYRICS</a></li>
                <li><a href="../events/index.php">NEWS & EVENTS</a></li>
                <li><a href="../trends/index.php">TRENDING</a></li>
                <li>
                    <br/>
                    <form class="form-inline" action="search.php" method="GET">

                        <input type="text" name="search" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                               placeholder="Holy Spirit">


                        <button class="btn btn-primary mb-2" type="">
                            <span><i class="fa fa-search" aria-hidden="true"></i></span>
                        </button>
                    </form>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">
    <div class="container">
        <div class="col-md-12">
            <h4 class="text-center">VIEW ARTISTS PROFILE</h4>
            <hr/>
            <ul class="pager">
                <li>
                    <a href="index.php">Back</a>
                </li>
            </ul>

            <?php


            if (empty($ArtistID)) {
                echo "<h4 class='text-center '>The artist you are looking for was not found in our system</h4>";
            } else {
                ArtistsModel::setID($ArtistID);
                ArtistsAdapter::ArtistsProfileData();

                $RES = ArtistsModel::getResult();

                if ($RES == "TRUE") {
                    $JSON = ArtistsModel::getJSONFEED();
                    $json_a = json_decode($JSON, true);

                    foreach ($json_a as $feed) {
                        $name = $feed['name'];
                        $songs = $feed['songs'];
                        $albums = $feed['albums'];
                        $photo = $feed['profile_pic'];

                        $name = $feed['name'];
                        $songs = $feed['songs'];
                        $albums = $feed['albums'];
                        $bio = $feed['bio'];
                        $photo = $feed['profile_pic'];
                        $fb = $feed['facebook'];
                        $twitter = $feed['twitter'];
                        echo "<div class='col-md-8 col-md-offset-2' id='white-back'>";

                        echo " <img src='../IMedia/artists_pics/$photo' id='profile-pic' class='img img-responsive center-block '><br/>
 
                    <h4 class='text-center'>$name </h4> <hr/>
                    <p>$bio</p> <hr/>
                    <p class='text-center'> <a href='$fb' target='_blank'>Facebook Page</a> </p>
                    <p  class='text-center'> <a href='$twitter' target='_blank'>Twitter Page</a>  </p>
                    
                 ";

                        echo "</div>";
                    }

                } else {
                    echo "<h4 class='text-center text-warning'>Artist does not exist</h4>";
                }


            }


            ?>


        </div>

    </div>
    <div class="clearfix"></div>


</div>
<div class="row" id="">
    <div class="col-md-6">
        <div class="col-md-12" id="white-back">
            <h4 class="text-center">SONGS BY ARTIST</h4>
            <hr/>

            <?php


            if (empty($ArtistID)) {
                echo "<h4 class='text-center '>This is a broken link.</h4>";
            } else {

                SongsModel::setArtistId($ArtistID);
                SongsAdapter::GetSongsForArtist();

                $RES = SongsModel::getResult();
                $song_id = "";
                if ($RES == "TRUE") {

                    $JSON = SongsModel::getJSONFEED();
                    $json_a = json_decode($JSON, true);
                    echo " <table class=\"table table-striped table-bordered table-striped table-condensed\"><thead>
                                    <tr class=\"text-primary\">
                                        <th>Song Name</th>
                                        <th> Downloads</th>
                                        <th>Lyrics</th>
                                        <th>Play </th>
                                        <th>Download</th>
                                      
                                       
                                    </tr>
                                    </thead><tbody>";
                    $song_id = "";
                    $song_url = "";
                    foreach ($json_a as $feed) {
                        $name = $feed['song_name'];
                        $downloads = $feed['downloads'];
                        $song_id = $feed['song_id'];
                        $song_url = $feed['url'];
                        $lyrics = $feed['lyrics'];
                        echo " <tr>
                        <th scope=\"row\">$name</th>
                        <td>$downloads</td>
                        <td><a href='../lyrics/view.php?id=$song_id'>Lyrics</a></td>
                        <th scope=\"col\"><a href='../play.php?uid=$song_id'><i class=\"fa fa-play\" aria-hidden=\"true\"></i></a></th>
                        <th scope=\"col\">  <a href='download.php?uid=$song_id'><i class='fa fa-download' aria-hidden='true'></i></a></th>
                      
                    </tr>";


                    }

                    echo "</tbody></table>";

                }

                if (isset($_POST['download'])) {

                    SongsModel::setSongID($song_id);
                    SongsAdapter::CheckDownloads();
                    $Dl = SongsModel::getJSONFEED();
                    $Data = json_decode($Dl, true);


                    $Downloads = '';
                    foreach ($Data as $datum) {
                        $Downloads = $datum['downloads'];

                    }

//                    SongsModel::setDownloads($Downloads + 1);
//
//                    SongsModel::setSongID($song_id);
//                    SongsAdapter::UpdateSongDownloads();
//                    $Result = SongsModel::getResult();
//                    if ($Result == "TRUE") {
//
//                        echo "<meta http-equiv='refresh' content='1;url=../DL/songs/$song_url'>";
//                        echo "<p> Your download will start in a second. If not, use this link to download the
//                                        <a download='true' href='../DL/songs/$song_url'>Download</a></p>";
//
//                    }


                }

            }


            ?>


        </div>
        <div id="Lyrics" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Song Lyrics</h4>
                    </div>
                    <div class="modal-body">
                        <?php
                        $PreparedStatement = "SELECT * FROM  songs WHERE artist_id ='$ID'";


                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="col-md-6">
        <div class="col-md-12" id="white-back">
            <h4 class="text-center">ALBUMS BY ARTIST </h4>
            <hr/>

            <?php

            $alb_id = "";
            $url_zip = "";
            if (empty($ArtistID)) {
                echo "<h4 class='text-center '>This is a broken link.</h4>";
            } else {
                AlbumsModel::setArtistId($ArtistID);
                AlbumsAdapter::GetAlbumsForArtist();

                $RES = AlbumsModel::getResult();

                if ($RES == "TRUE") {

                    $JSON = AlbumsModel::getJSONFEED();
                    $json_a = json_decode($JSON, true);

                    foreach ($json_a as $feed) {
                        $name = $feed['name_alb'];
                        $alb_id = $feed['alb_id'];
                        $downloads = $feed['downloads_alb'];
                        $photo = $feed['cover'];
                        $url_zip = $feed['url'];


                        echo "<div class='col-md-4' id='white-back'>
                        <h5 class='text-center'><a href='album-songs.php?id=$alb_id'>$name</a> </h5><hr/>
                    <img src='../IMedia/covers/$photo' class='img img-responsive center-block'>
                    <h5 class='text-center'>$downloads</h5><hr/>
                    <h6 class='text-center'>
                     <a href='download-alb.php?uid=$alb_id'><i class='fa fa-download' aria-hidden='true'></i></a>
                    </h6>
                   
                </div>";

                    }


                } else {
                    echo "<h4 class='text-danger text-center'>No albums available for this artist.</h4>";
                }
            }

            if (isset($_POST['download_alb'])) {

                AlbumsModel::setAlbumID($alb_id);
                AlbumsAdapter::CheckDownloads();
                $Dl = AlbumsModel::getJSONFEED();
                $Data = json_decode($Dl, true);

                $Downloads = '';
                foreach ($Data as $datum) {
                    $Downloads = $datum['downloads_alb'];

                }

                AlbumsModel::setDownloads($Downloads + 1);

                AlbumsModel::setAlbumID($alb_id);
                AlbumsAdapter::UpdateSongDownloads();
                $Result = AlbumsModel::getResult();
                if ($Result == "TRUE") {

                    echo "<meta http-equiv='refresh' content='1;url=../DL/albums/$url_zip'>";
                    echo "<p> Your download will start in a second. If not, use this link to download the 
                                        <a download='true' href='../DL/albums/$url_zip'>Download</a></p>";

                }
            }
            ?>


        </div>


    </div>
</div>


<div class="row" id="footer">
    <div class="container">
        <div class="col-md-4 col-sm-6">
            <h5>Contacts</h5>
            <hr/>

            <p>Raised For a Purpose Ministries</p>
            <p>P.O Box 5210</p>
            <p>Limbe, Malawi</p>
            <p>+265 992 115 302 </p>
            <p> +265 888 071 734</p>
            <p> mam@rfpministries.com</p>
        </div>
        <div class="col-md-4 col-sm-6">
            <h5>SOCIAL MEDIA</h5>
            <hr/>

            <p><a href="https://www.facebook.com/rfp.musicandarts/"><i class="fa fa-facebook" aria-hidden="true"></i>
                    &nbsp; | Music and Arts</a></p>
            <p><a href="https://twitter.com/RFPMinistries"><i class="fa fa-twitter" aria-hidden="true"></i>
                    &nbsp; | RFP Ministries</a></p>
            <p><a href="https://www.facebook.com/RFPMinistriesNews"><i class="fa fa-facebook" aria-hidden="true"></i>
                    &nbsp; | RFP News</a></p>
            <p><a href="https://www.youtube.com/channel/UC1NC0ZJbmWjE4rkOqMzw4aQ
"><i class="fa fa-youtube" aria-hidden="true"></i>&nbsp; | Youtube</a></p>

        </div>
        <div class="col-md-4 col-sm-12">
            <h5>OTHER LINKS</h5>
            <hr/>
            <p><a href="http://www.rfpministries.com">RFP Ministries</a></p>
            <p><a href="../about.php">About</a></p>
            <p><a href="../policy.php">Contacts</a></p>
            <p><a href="../rights.php">Rights Policy</a></p>

        </div>


    </div>
    <div class="col-md-12">
        <hr/>
        <h6 class="text-center"> Raised For a Purpose | 2018 </h6>
    </div>
</div>


</body>
</html>

