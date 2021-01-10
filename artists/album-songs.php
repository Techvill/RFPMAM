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

$id = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");

$id = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
$name = '';
$photo = "";
$PreparedStatement = "SELECT * FROM  albums,songs WHERE albums.`artist_id`= songs.`artist_id` AND songs.alb_id='$id'";

$ResultSet = DBH::getInstance()->CRUD($PreparedStatement);


if ($ResultSet->rowCount() > 0) {

    foreach ($ResultSet as $row) {
        $name = $row['name_alb'];
        $photo = $row['cover'];
    }

}

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo "Download songs from the album  $name | RFP Music and Arts " ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php

    echo "<link href='../IMedia/covers/$photo' rel='icon' type='image/png'/>";

    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta property="og:site_name" content="Raised For a Purpose Music and Arts Ministry. "/>
    <meta property="og:title"
          content="<?php echo "Download songs from the album  $name  | RFP Music and Arts " ?>"/>
    <meta property="og:description"
          content="<?php echo "Stream and download music  from the album $name | RFP Music and Arts " ?>"/>
    <?php

    echo "<meta property='og:image' content='http://www.rfpmam.com/IMedia/covers/$photo'/>";
    echo "<meta property='og:url' content='http://www.rfpmam.com/albums/album-songs.php?id=$id'/>";

    ?>


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!--Cascading style sheet-->


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


<div class="col-md-12" id="white-back">
    <h4 class="text-center">RFP MUSIC ARTISTS</h4>
    <ul class="pager">
        <li>
            <a href="javascript:history.go(-1)">Back</a>
        </li>
    </ul>


    <div class="col-md-12">
        <hr/>
        <?php

        if (isset($id) && !empty($id)) {

            SongsModel::setAlbumID($id);

            ArtistsAdapter::GetAlbumSongsForArtist();
            $RES = ArtistsModel::getResult();
            if ($RES == "TRUE") {

                $JSON = ArtistsModel::getJSONFEED();
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

                foreach ($json_a as $feed) {
                    $name = $feed['song_name'];
                    $downloads = $feed['downloads'];
                    $id = $feed['song_id'];
                    $url = $feed['url'];
                    $lyrics = $feed['lyrics'];
                    echo " <tr>
                        <th scope=\"row\">$name</th>
                        <td>$downloads</td>
                        <td><a href='../lyrics/view.php?id=$id'>Lyrics</a></td>
                        <th scope=\"col\"><a href='../DL/songs/$url'><i class=\"fa fa-play\" aria-hidden=\"true\"></i></a></th>
                        <th scope=\"col\">
                            <a href='download.php?uid=$id'><span><i class=\"fa fa-download\" aria-hidden=\"true\"></i></span></a>
                      </th>
                      
                    </tr>";

                    if (isset($_POST['download'])) {

                        SongsModel::setSongID($id);
                        SongsAdapter::CheckDownloads();
                        $Dl = SongsModel::getJSONFEED();
                        $Data = json_decode($Dl, true);

                        $Downloads = '';
                        foreach ($Data as $datum) {
                            $Downloads = $datum['downloads'];

                        }

                        SongsModel::setDownloads($Downloads + 1);

                        SongsModel::setSongID($id);
                        SongsAdapter::UpdateSongDownloads();
                        $Result = SongsModel::getResult();
                        if ($Result == "TRUE") {

                            echo "<meta http-equiv='refresh' content='1;url=../DL/songs/$url'>";
                            echo "<p class='text-center'> Your download will start in a second. If not, use this link to download the 
                                        <a download='true' href='../DL/songs/$url'>Download</a></p>";

                        }


                    }
                }

                echo "</tbody></table>";
            } else {
                echo "<h4 class='text-danger text-center'>There are no songs for this artist.</h4>";
            }

        } else {

            echo "<h4 class='text-center text-danger'>Sorry, this link seems to be broken. <a href='index.php'>Back</a> </h4>";

        }
        ?>
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

