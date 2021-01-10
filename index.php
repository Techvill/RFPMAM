<?php

require 'InfinityFramework/DSN/DBH.php';
require_once 'InfinityFramework/MODEL/ArtistsModel.php';
require_once 'InfinityFramework/MODEL/SongsModel.php';
require_once 'InfinityFramework/MODEL/SpokenWordModel.php';
require_once 'InfinityFramework/MODEL/AlbumsModel.php';
require_once 'InfinityFramework/POHO/ArtistsAdapter.php';
require_once 'InfinityFramework/POHO/SongsAdapter.php';
require_once 'InfinityFramework/POHO/AlbumsAdapter.php';
require_once 'InfinityFramework/POHO/SpokenWordAdapter.php';
require_once 'InfinityFramework/MODEL/EventsModel.php';
require_once 'InfinityFramework/POHO/EventsAdapter.php';


?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>RFP Music And Arts | Home</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="IMedia/logo.png" rel="icon" type="image/png"/>


    <meta property="og:site_name" content="Raised For a Purpose Music and Arts Minisitry. "/>
    <meta property="og:title"
          content="Welcome to RFP Music and Arts Ministry Website"/>
    <meta property="og:description" content="Welcome to RFP Music and Arts Ministry Website"/>
    <meta property="og:image" content="http://www.rfpmam.com/IMedia/logo.png">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.rfpmam.com"/>
    <meta property="fb:app_id" content="138681726961769"/>


    <!--Cascading style sheet-->


    <!--End of css calling-->

    <!--online resources-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <link rel="stylesheet" href="IUX/UserInterface/bootstrap.css"/>
    <link rel="stylesheet" href="IUX/UserInterface/infix.css"/>


    <script src="IUX/UserExperience/jquery-3.2.1.min.js"></script>
    <script src="IUX/UserExperience/bootstrap.js"></script>
    <script src="IUX/UserExperience/jssor.slider-27.0.3.min.js"></script>


    <script type="text/javascript">
        jssor_1_slider_init = function () {

            var jssor_1_SlideoTransitions = [
                [{b: -1, d: 1, o: -0.7}],
                [{b: 900, d: 2000, x: -379, e: {x: 7}}],
                [{b: 900, d: 2000, x: -379, e: {x: 7}}],
                [{b: -1, d: 1, o: -1, sX: 2, sY: 2}, {
                    b: 0,
                    d: 900,
                    x: -171,
                    y: -341,
                    o: 1,
                    sX: -2,
                    sY: -2,
                    e: {x: 3, y: 3, sX: 3, sY: 3}
                }, {b: 900, d: 1600, x: -283, o: -1, e: {x: 16}}]
            ];

            var jssor_1_options = {
                $AutoPlay: 1,
                $SlideDuration: 800,
                $SlideEasing: $Jease$.$OutQuint,
                $Cols: 1,
                $Align: 0,
                $CaptionSliderOptions: {
                    $Class: $JssorCaptionSlideo$,
                    $Transitions: jssor_1_SlideoTransitions
                },
                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$
                },
                $BulletNavigatorOptions: {
                    $Class: $JssorBulletNavigator$
                }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 3000;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic"
          rel="stylesheet" type="text/css"/>
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        /*jssor slider bullet skin 032 css*/
        .jssorb032 {
            position: absolute;
        }

        .jssorb032 .i {
            position: absolute;
            cursor: pointer;
        }

        .jssorb032 .i .b {
            fill: #fff;
            fill-opacity: 0.7;
            stroke: #000;
            stroke-width: 1200;
            stroke-miterlimit: 10;
            stroke-opacity: 0.25;
        }

        .jssorb032 .i:hover .b {
            fill: #000;
            fill-opacity: .6;
            stroke: #fff;
            stroke-opacity: .35;
        }

        .jssorb032 .iav .b {
            fill: #000;
            fill-opacity: 1;
            stroke: #fff;
            stroke-opacity: .35;
        }

        .jssorb032 .i.idn {
            opacity: .3;
        }

        /*jssor slider arrow skin 051 css*/
        .jssora051 {
            display: block;
            position: absolute;
            cursor: pointer;
        }

        .jssora051 .a {
            fill: none;
            stroke: #fff;
            stroke-width: 360;
            stroke-miterlimit: 10;
        }

        .jssora051:hover {
            opacity: .8;
        }

        .jssora051.jssora051dn {
            opacity: .5;
        }

        .jssora051.jssora051ds {
            opacity: .3;
            pointer-events: none;
        }

    </style>


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
            <a class="navbar-brand" id="back" href="index">
                <!--                <img src="IMedia/logo.png" class="img img-responsive"/>-->

            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li><a href="artists/index.php">ARTISTS</a></li>
                <li><a href="albums/index.php">ALBUMS</a></li>
                <li><a href="songs/index.php">SONGS</a></li>
                <li><a href="genres/index.php">GENRES</a></li>
                <li><a href="spoken/index.php">SPOKEN WORD</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="lyrics/index.php">LYRICS</a></li>
                <li><a href="events/index.php">NEWS & EVENTS</a></li>
                <li><a href="trends/index.php">TRENDING</a></li>
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

<div id="jssor_1"
     style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
    <!-- Loading Screen -->
    <div data-u="loading" class="jssorl-009-spin"
         style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
        <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg"/>
    </div>
    <div data-u="slides"
         style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">

        <?php
        EventsAdapter::GetUpdates();
        if (EventsModel::getResult() == "TRUE") {


            $Decoded = json_decode(EventsModel::getJSONFEED(), true);

            foreach ($Decoded as $item) {
                $ID = $item['id'];
                $Title = $item['title'];
                $Content = $item['content'];
                $Date = $item['date'];
                $pic = $item['pic'];
                echo " <div data-p=\"225.00\">";
                echo "<a href='events/view.php?id=$ID'> <img data-u='image' src='IMedia/events/$pic'/></a>";
//                echo "<div
//                 style=\"position:absolute;top:380px;left:45px;width:1200px;height:40px;background-color:rgba(62,154,255,0.8);font-family:'Roboto Condensed',sans-serif;color:#000000;padding:5px 5px 5px 5px;box-sizing:border-box;\">
//                     ";
//                echo "<p class='text-center'><a class='text-white' href='events/view.php?id=$ID'>$Title</a></p>";
                echo "</div>";
            }
        }

        ?>
        <!--        <div data-p="225.00">-->
        <!--            <img data-u="image" src="IMedia/events/lake.jpg"/>-->
        <!---->
        <!--            <div class="text-center"-->
        <!--                 style="position:absolute;top:300px;left:30px;width:1200px;height:80px;background-color:rgba(62,154,255,0.8);font-family:'Roboto Condensed',sans-serif;font-size:30px;color:#000000;padding:5px 5px 5px 5px;box-sizing:border-box;">-->
        <!--                Build your slider with anything, includes image, svg, text, html, photo, picture content-->
        <!--            </div>-->
        <!--        </div>-->
    </div>
    <!-- Bullet Navigator -->
    <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1"
         data-scale="0.5" data-scale-bottom="0.75">
        <div data-u="prototype" class="i" style="width:16px;height:16px;">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <circle class="b" cx="8000" cy="8000" r="5800"></circle>
            </svg>
        </div>
    </div>
    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;" data-autocenter="2"
         data-scale="0.75" data-scale-left="0.75">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
        </svg>
    </div>
    <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;" data-autocenter="2"
         data-scale="0.75" data-scale-right="0.75">
        <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
            <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
        </svg>
    </div>
</div>


<div class="row">
    <div class="col-md-7" id="">
        <div class="col-md-12" id="white-back">
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
                    $trimmed = substr($song_name, 0, 10) . "..";
                    $downloads = $feed['downloads'];
                    $photo = $feed['song_art'];
                    $url = $feed['url'];

                    echo "<div class=\"col-md-3 col-xs-6\" id='' >
                        <div class='col-md-12' id=\"white-back\">
                    <h5 class='text-center'><a href='artists/view.php?id=$id'>$artist</a> </h5>
                    <img src='IMedia/art/$photo' id='art-work' class='img center-block img-responsive'>
                    <h5 class='text-center'>$trimmed</h5>
                    <h6 class=\"text-center\">$downloads downloads</h6>
                    
                    <div class='col-md-12 text-center'>
                    <hr/>
                        <div class=\"col-md-6 col-xs-6\">
                            <a href='download.php?uid=$song_id'> <span><i class='fa fa-download' aria-hidden='true'></i></span></a> 
                        </div>
                       <div class=\"col-md-6 col-xs-6\">
                            <a href='play.php?uid=$song_id'><i class=\"fa fa-play\" aria-hidden=\"true\"></i></a>
                        </div>
                        <div class='clearfix'></div>
                    </div>
                </div>
                <div class='clearfix'></div>
                </div></div>";


                }


            } else {
                echo "<h4 class='text-center text-warning'>There are no trending songs available.</h4>";
            }


            ?>

            <div class="clearfix"></div>

        </div>

    </div>
    <div class="col-md-5" id="white-back">
        <h4 class="text-center">TOP TWENTY DOWNLOADS</h4>

        <hr/>

        <?php


        SongsAdapter::TopTenDownloads();
        $Res = SongsModel::getResult();
        if ($Res == "TRUE") {
            echo "<div class=\"table-responsive col-md-12 col-sm-12 col-lg-12 col-xs-12\"> <table class=\"table
                                               table-bordered table-striped table-condensed\"><thead>
                                    <tr class=\"text-primary\">
                                        <th>Artist </th>
                                        <th>Song</th>
                                   
                                   
                                        <th>Download</th>
                                        <th>Downloads </th>
                                 
                                      
                                       
                                    </tr>
                                    </thead><tbody>";
            $JSON = SongsModel::getJSONFEED();
            $DECODED_JSON = json_decode($JSON, true);
            foreach ($DECODED_JSON as $item) {
                $Name = $item['name'];
                $song_id = $item['song_id'];
                $alb_id = $item['song_id'];
                $alb = $item['name_alb'];

                $ID = $item['artists_id'];

                $song_nm = $item['song_name'];

                $downloads_songs = $item['downloads'];


                echo " <tr>
                                            <th scope=\"row\"><a href='artists/view.php?id=$ID'>$Name</a> </th>
                                            <td>$song_nm</td>
                                          
                                                 <td>
                                            <a href='download.php?uid=$song_id'> <span><i class=\"fa fa-download\" aria-hidden=\"true\"></i></span></a> </td>
                                           
                                          
                                             
                          <td>$downloads_songs</td> 
                                           
                                           
                                            
                                          
                                        </tr>";

            }

            echo "</tbody></table></div>
                                        <a href='songs/all-songs.php' class='btn btn-primary btn-sm'>VIEW ALL</a>";
        } else {
            echo "<h4 class='text-center text-warning'>There are no new artists!.</h4>";
        }


        ?>
    </div>


</div>
<div class="row">
    <div class="col-md-7" id="">
        <div class="col-md-12" id="white-back">


            <h4 class="text-center">NEWLY RELEASED TRACKS</h4>

            <hr/>

            <?php

            SongsAdapter::FetchNewTopTenReleases();

            $RES = SongsModel::getResult();

            if ($RES == "TRUE") {

                $JSON = SongsModel::getJSONFEED();
                $json_a = json_decode($JSON, true);
                echo " <div class=\"table-responsive col-md-12 col-sm-12 col-lg-12\"><table class=\"table 
 table-bordered table-striped table-condensed\" id='white-back'><thead>
                                    <tr class=\"text-primary\">
                                        <th>Song Name</th>  
                                        
                                        <th>Download</th>
                                        <th> Downloads</th>
                                        
                                        <th>Lyrics </th>
                                      
                                      
                                       
                                    </tr>
                                    </thead><tbody>";

                foreach ($json_a as $feed) {
                    $name = $feed['song_name'];
                    $downloads = $feed['downloads'];
                    $song_id = $feed['song_id'];
                    $song_url = $feed['url'];
                    $lyrics = $feed['lyrics'];
                    echo " <tr>
                        <th scope=\"row\">$name</th>
                         <th><a href='download.php?uid=$song_id'>
                         <span><i class='fa fa-download' aria-hidden='true'></i></span></a></th>
                      
                        <td>$downloads</td>
                        <td><a href='lyrics/view.php?id=$song_id' >Lyrics</a></td>
                        
                       
                    </tr>";

                }
                echo "</tbody></table></div>";


            } else {
                echo "<h4 class='text-center text-danger'>There are no newly added tracks!!</h4>";
            }
            ?>

        </div>

    </div>
    <div class="col-md-5" id="white-back">
        <h4 class="text-center">SPOKEN WORD</h4>

        <hr/>

        <?php


        SpokenWordAdapter::FetchAllSongs();

        if (SpokenWordModel::getResult() == "TRUE") {
            $Data = json_decode(SpokenWordModel::getJSONFEED(), true);


            $Data = json_decode(SpokenWordModel::getJSONFEED(), true);

            echo "<div class=\"table-responsive col-md-12 col-sm-12 col-lg-12\"> <table class=\"table
 table-bordered table-striped table-condensed\" id='white-back'><thead>
                                    <tr class=\"text-primary\">
                                   
                                        <th>Artist</th>
                                        <th>Song Name</th>
                                        <th> Downloads</th>
                                        <th>Play </th>
                                        <th>Download</th>
                                      
                                       
                                    </tr>
                                    </thead><tbody>";

            foreach ($Data as $feed) {

                $artist_id = $feed['artist_id'];
                $artist = $feed['artist_name'];
                $name = $feed['song_name'];
                $downloads = $feed['downloads'];
                $song_id = $feed['id'];
                $song_url = $feed['url'];
                $lyrics = $feed['lyrics'];
                echo " <tr>
                        
                        <th scope=\"row\">$artist</th>
                        <th scope=\"row\">$name</th>
                        <td>$downloads</td>
                        
                        <th scope=\"col\"><a href='spoken/play.php?uid=$song_id'><i class=\"fa fa-play\" aria-hidden=\"true\"></i></a></th>
                        <th scope=\"col\">
                            <a href='spoken/download.php?uid=$song_id'><span><i class=\"fa fa-download\" aria-hidden=\"true\"></i></span></a>
                      </th>
                      
                    </tr>";

            }
            echo "</tbody></table></div>";

        } else {
            echo "<h4 class='text-danger text-center'>There are no spoken word.</h4>";


        }


        ?>
    </div>


</div>


<div class="row">
    <div class="col-md-12" id="">
        <h4 class="text-center">TRENDING ALBUMS</h4>
        <hr/>

        <?php
        $alb_id = "";
        $url_zip = "";
        $PreparedStatement = "SELECT * FROM trending, artists,albums WHERE trending.artist_id = artists.artists_id 
                                    AND trending.artist_id = albums.artist_id;";

        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

        $Rows = $ResultSet->rowCount();

        if ($Rows > 0) {

            echo "<div class='col-md-12'>";
            foreach ($ResultSet as $feed) {
                $name = $feed['name_alb'];
                $id = $feed['artist_id'];
                $artist = $feed['name'];
                $alb_id = $feed['alb_id'];
                $downloads = $feed['downloads_alb'];
                $photo = $feed['cover'];
                $url_zip = $feed['url'];


                echo "<div class='col-md-2' id='white-back'>
                        <h5 class='text-center'><a href='albums/album-songs.php?id=$alb_id'>$name</a> </h5><hr/>
                        <h5 class='text-center'><a href='artists/view.php?id=$id'>$artist</a> </h5>
                    <img src='IMedia/covers/$photo' id='art' class='img img-responsive center-block'>
                    <h5 class='text-center'>$downloads downloads</h5><hr/>
                    <h6 class='text-center'>
                    <form action='' method='POST'> <button id='no_bg' name='download_alb'>
                            <span><i class=\"fa fa-download\" aria-hidden=\"true\"></i></span>
                        </button></form>
                    </h6>
                   
                </div>";

            }
            echo "</div>";


        } else {
            echo "<h4 class='text-center text-warning'>There are no trending artists available.</h4>";
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

                echo "<meta http-equiv='refresh' content='1;url=DL/albums/$url_zip'>";
                echo "<p> Your download will start in a second. If not, use this link to download the 
                                        <a download='true' href='DL/albums/$url_zip'>Download</a></p>";

            }
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
            <p><a href="about.php">About</a></p>
            <p><a href="policy.php">Contacts</a></p>
            <p><a href="rights.php">Rights Policy</a></p>
            <p><a href="feedback.php">Feedback</a></p>

        </div>


    </div>
    <div class="col-md-12">
        <hr/>
        <h6 class="text-center"> Raised For a Purpose | 2018 </h6>
    </div>
</div>

<script type="text/javascript">jssor_1_slider_init();</script>
</body>
</html>
