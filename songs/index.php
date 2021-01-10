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

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>RFP Music And Arts | Music Library</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../IMedia/logo.png" rel="icon" type="image/png"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../IMedia/logo.png" rel="icon" type="image/png"/>

    <meta property="og:site_name" content="RFP Music and Arts | Our Songs Library. "/>
    <meta property="og:title"
          content="Download and view our artists profiles"/>
    <meta property="og:description" content="Download music from our music library "/>
    <meta property="og:image" content="http://www.rfpmam.com/IMedia/logo.png">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.rfpmam.com/songs/index.php"/>
    <meta property="fb:app_id" content="138681726961769"/>


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
                <li><a href="../artists/index.php">ARTISTS</a></li>
                <li><a href="../albums/index.php">ALBUMS</a></li>
                <li class="active"><a href="index.php">SONGS</a></li>
                <li class=""><a href="../genres/index.php">GENRES</a></li>
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


                        <button name="" class="btn btn-primary mb-2" type="">
                            <span><i class="fa fa-search" aria-hidden="true"></i></span>
                        </button>
                    </form>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<div class="row">
    <div class="col-md-7">
        <h4 class="text-center">TRENDING SONGS</h4>
        <hr/>

        <?php
        $song_id = "";
        $url = "";
        $PreparedStatement = "SELECT * FROM trending, artists,songs WHERE trending.artist_id = artists.artists_id 
                                    AND trending.artist_id = songs.artist_id ORDER BY RAND();";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {


            foreach ($ResultSet as $feed) {

                $id = $feed['artist_id'];
                $song_id = $feed['song_id'];
                $artist = $feed['name'];
                $song_name = $feed['song_name'];
                $downloads = $feed['downloads'];
                $photo = $feed['song_art'];
                $trimmed = substr($song_name, 0, 10) . "..";
                $url = $feed['url'];

                echo "<div class=\"col-md-3 col-xs-6\" id='' >
                        <div class='col-md-12' id=\"white-back\">
                    <h5 class='text-center'><a href='../artists/view.php?id=$id'>$artist</a> </h5>
                    <img src='../IMedia/art/$photo' id='art-work' class='img center-block img-responsive'>
                    <h5 class='text-center'>$trimmed</h5>
                    <h6 class=\"text-center\">$downloads downloads</h6>
                    
                    <div class='col-md-12 text-center'>
                    <hr/>
                        <div class=\"col-md-6 col-xs-6\">
                            <a href='download.php?uid=$song_id'> <span><i class='fa fa-download' aria-hidden='true'></i></span></a> 
                        </div>
                       <div class=\"col-md-6 col-xs-6\">
                            <a href='../play.php?uid=$song_id'><i class=\"fa fa-play\" aria-hidden=\"true\"></i></a>
                        </div>
                        <div class='clearfix'></div>
                    </div>
                </div>
                <div class='clearfix'></div>
                </div>";


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

                echo $downloads += 1;;

                SongsModel::setDownloads($downloads);
//
                SongsModel::setSongID($song_id);
                SongsAdapter::UpdateSongDownloads();
                $Result = SongsModel::getResult();
                if ($Result == "TRUE") {

                    echo "<meta http-equiv='refresh' content='1;url=../DL/songs/$url'>";
                    echo "<p> Your download will start in a second. If not, use this link to download the
                                        <a download='true' href='../DL/albums/$url'>Download</a></p>";

                }
            }

        } else {
            echo "<h4 class='text-center text-warning'>There are no trending artists available.</h4>";
        }


        ?>


    </div>
    <div class="col-md-5" id="">
        <h4 class="text-center">NEWLY RELEASED TRACKS</h4>

        <hr/>

        <?php

        SongsAdapter::FetchNewTopTenReleases();

        $RES = SongsModel::getResult();

        if ($RES == "TRUE") {

            $JSON = SongsModel::getJSONFEED();
            $json_a = json_decode($JSON, true);
            echo " <table class=\"table table-striped\" id='white-back'><thead>
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
                        <th scope=\"col\">  <a href='download.php?uid=$song_id'><i class=
                        'fa fa-download' aria-hidden='true'></i></a></th>
                      
                    </tr>";

            }
            echo "</tbody></table>";

            if (isset($_POST['download_song'])) {

                SongsModel::setSongID($song_id);
                SongsAdapter::CheckDownloads();
                $Dl = SongsModel::getJSONFEED();
                $Data = json_decode($Dl, true);


                $Downloads = '';
                foreach ($Data as $datum) {
                    $Downloads = $datum['downloads'];

                }

                SongsModel::setDownloads($Downloads + 1);

                SongsModel::setSongID($song_id);
                SongsAdapter::UpdateSongDownloads();
                $Result = SongsModel::getResult();
                if ($Result == "TRUE") {

                    echo "<meta http-equiv='refresh' content='1;url=../DL/songs/$song_url'>";
                    echo "<p> Your download will start in a second. If not, use this link to download the
                                        <a download='true' href='../DL/songs/$song_url'>Download</a></p>";

                }


            }
        } else {
            echo "<h4 class='text-center text-danger'>There are no newly added tracks!!</h4>";
        }
        ?>
    </div>


</div>

<div class="row">
    <div class="col-md-12">
        <div class="clearfix"></div>
        <div class="col-md-12" id="">
            <div class="col-md-12" id="white-back">
                <h4 class="text-center">ALL SONGS</h4>
                <div class="col-md-10 col-md-offset-2">
                    <div class="btn-toolbar center-block">
                        <div class="btn-group center-block btn-group-sm">
                            <a href="songs.php?id=A" class="btn btn-default">A</a>
                            <a href="songs.php?id=B" class="btn btn-default">B</a>
                            <a href="songs.php?id=C" class="btn btn-default">C</a>
                            <a href="songs.php?id=D" class="btn btn-default">D</a>
                            <a href="songs.php?id=E" class="btn btn-default">E</a>
                            <a href="songs.php?id=F" class="btn btn-default">F</a>
                            <a href="songs.php?id=G" class="btn btn-default">G</a>
                            <a href="songs.php?id=H" class="btn btn-default">H</a>
                            <a href="songs.php?id=I" class="btn btn-default">I</a>
                            <a href="songs.php?id=J" class="btn btn-default">J</a>
                            <a href="songs.php?id=K" class="btn btn-default">K</a>
                            <a href="songs.php?id=L" class="btn btn-default">L</a>
                            <a href="songs.php?id=M" class="btn btn-default">M</a>
                            <a href="songs.php?id=N" class="btn btn-default">N</a>
                            <a href="songs.php?id=O" class="btn btn-default">O</a>
                            <a href="songs.php?id=P" class="btn btn-default">P</a>
                            <a href="songs.php?id=Q" class="btn btn-default">Q</a>
                            <a href="songs.php?id=R" class="btn btn-default">R</a>
                            <a href="songs.php?id=S" class="btn btn-default">S</a>
                            <a href="songs.php?id=T" class="btn btn-default">T</a>
                            <a href="songs.php?id=U" class="btn btn-default">U</a>
                            <a href="songs.php?id=V" class="btn btn-default">V</a>
                            <a href="songs.php?id=W" class="btn btn-default">W</a>
                            <a href="songs.php?id=X" class="btn btn-default">X</a>
                            <a href="songs.php?id=Y" class="btn btn-default">Y</a>
                            <a href="songs.php?id=Z" class="btn btn-default">Z</a>

                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-md-offset-4">
                    <form class="form-horizontal text-center" action="" method="POST">
                        <br/>
                        <select required class="select form-control" id="" name="sort_method">
                            <option>Sort Method</option>
                            <option value="new">New Artists</option>
                            <option value="most_alb">Most Downloaded Albums</option>
                        </select>


                        <button class="btn btn-primary mb-2" name="sort" type="">
                            <span><i class="fa fa-sort" aria-hidden="true"></i></span>
                        </button>
                    </form>
                </div>
                <div class="clearfix"></div>


            </div>
            <div class="col-md-12 col-xs-12">
                <div class="clearfix"></div>
                <hr/>
                <?php

                SongsAdapter::FetchTop50Songs();

                $FeedResponse = SongsModel::getResult();

                if ($FeedResponse == "TRUE") {
                    SongsModel::getJSONFEED();

                    $DecodedFeed = json_decode(SongsModel::getJSONFEED(), true);

                    foreach ($DecodedFeed as $item) {

                        $id = $item['artist_id'];
                        $song_id = $item['song_id'];
                        $artist = $item['name'];
                        $song_name = $item['song_name'];
                        $downloads = $item['downloads'];
                        $photo = $item['song_art'];
                        $url = $item['url'];

                        echo "<div class=\"col-md-2 col-xs-6\" id='' >
                        <div class='col-md-12' id=\"white-back\">
                    <h5 class='text-center'><a href='../artists/view.php?id=$id'>$artist</a> </h5>
                    <img src='../IMedia/art/$photo' id='art-work' class='img center-block img-responsive img-circle'>
                    <h5 class='text-center'>$song_name</h5>
                    <h6 class=\"text-center\">$downloads downloads</h6>
                    
                    <div class='col-md-12 text-center'>
                    <hr/>
                        <div class=\"col-md-6 col-xs-6\">
                            <a href='download.php?uid=$song_id'><i class='fa fa-download' aria-hidden='true'></i></a>
                        </div>
                        <div class=\"col-md-6 col-xs-6\">
                            <a href='../play.php?uid=$song_id'><i class=\"fa fa-play\" aria-hidden=\"true\"></i></a>
                        </div>
                        <div class='clearfix'></div>
                    </div>
                </div>
                </div>";
                    }
                }

                if (isset($_POST['all_dl'])) {


                    SongsModel::setSongID($song_id);
                    SongsAdapter::CheckDownloads();
                    $Dl = SongsModel::getJSONFEED();
                    $Data = json_decode($Dl, true);

                    $Downloads = '';
                    foreach ($Data as $datum) {
                        $Downloads = $datum['downloads'];

                    }

                    echo $downloads += 1;;

                    SongsModel::setDownloads($downloads);
//
                    SongsModel::setSongID($song_id);
                    SongsAdapter::UpdateSongDownloads();
                    $Result = SongsModel::getResult();
                    if ($Result == "TRUE") {

                        echo "<meta http-equiv='refresh' content='1;url=../DL/songs/$url'>";
                        echo "<p> Your download will start in a second. If not, use this link to download the
                                        <a download='true' href='../DL/albums/$url'>Download</a></p>";

                    }
                }

                ?>

            </div>
            <div class='col-md-12'><a href='all-songs.php'>View all</a></div>

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


