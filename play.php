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
require_once 'InfinityFramework/MODEL/Lyrics.php';

require_once 'InfinityFramework/POHO/LyricsAdapter.php';


$id = htmlentities($_GET['uid'], ENT_QUOTES, "UTF-8");

$songName = '';
$URL = '';
$Downloads = "";
$Artist = "";
$ArtistID = '';
$SongArt = '';


$PST = "SELECT song_name,url,downloads,artist_id,song_art,name  FROM  artists,songs WHERE songs.artist_id=artists.artists_id  
                             AND song_id ='$id' ";

$RST = DBH::getInstance()->CRUD($PST);

if ($RST->rowCount() > 0) {
    foreach ($RST as $row) {
        $songName = $row['song_name'];
        $Artist = $row['name'];
        $SongArt = $row['song_art'];
        $Downloads = $row['downloads'];
        $URL = $row['url'];
    }

}

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo "Stream live $songName by $Artist | RFP Music and Arts " ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="IMedia/logo.png" rel="icon" type="image/png"/>

    <?php

    echo "<link href='IMedia/art/$SongArt' rel='icon' type='image/png'/>";

    ?>
    <!--Cascading style sheet-->


    <!--End of css calling-->

    <!--online resources-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <link rel="stylesheet" href="IUX/UserInterface/bootstrap.css"/>
    <link rel="stylesheet" href="IUX/UserInterface/infix.css"/>


    <script src="IUX/UserExperience/jquery-3.2.1.min.js"></script>
    <script src="IUX/UserExperience/jquery.bxslider.js"></script>
    <script src="IUX/UserExperience/bootstrap.js"></script>
    <link rel="stylesheet" href="css/style.css">


    <meta property="og:site_name" content="Raised For a Purpose Music and Arts Ministry. "/>
    <meta property="og:title"
          content="<?php echo "Stream  $songName by $Artist | RFP Music and Arts " ?>"/>
    <meta property="og:description" content="<?php echo "Stream live music  by $Artist | RFP Music and Arts " ?>"/>
    <?php

    echo "<meta property='og:image' content='http://www.rfpmam.com/IMedia/art/$SongArt'/>";
    echo "<meta property='og:url' content='http://www.rfpmam.com/play.php?uid=$id'/>";

    ?>

    <meta property="og:type" content="website"/>
    <meta property="fb:app_id" content="138681726961769"/>


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
                <!--                RFP MUSIC & ARTS-->

                <!--                <img src="IMedia/logo.png" id="logo" class="img img-responsive" alt="DVM Logo">-->
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
<div class="container">

    <h2 class="text-center">RFP MUSIC PLAYER</h2>

    <audio class="hidden" id="audio">

        <?php

        echo "<source src='DL/songs/$URL'>";
        ?>


    </audio>

    <div class="col-md-8 col-md-offset-2" id="white-back">
        <ul class="pager">
            <li>
                <a href="javascript:history.back()">Back</a>
            </li>
        </ul>
        <div class="info">
            <?php


            echo "<h2 class='text-center'>" . $songName . " by " . $Artist . "</h2>";
            echo "<img src='IMedia/art/$SongArt' id='art' class='img-responsive center-block'/>";


            ?>


            <p id="timeleft">00:00</p>
            <div class="progressbar_slide">
                <div class="progressbar_range"></div>
            </div>
        </div>
        <div class="controls">
            <div class="controls_plays">


                <svg id="plays_btn" viewBox="0 0 24.5 30.9">
                    <g id="play_btn">
                        <path d="M0,30.9L0,0l24.5,15.4L0,30.9z"/>
                    </g>
                    <g id="pause_btn">
                        <rect x="0" y="0" width="8.2" height="30.9"/>
                        <rect x="16.2" y="0" width="8.2" height="30.9"/>
                    </g>
                </svg>


            </div>

        </div>

        <hr/>
        <h4 class="text-center">LYRICS</h4>

        <div class="col-md-12">

            <?php
            Lyrics::setSongId($id);
            LyricsAdapter::FetchSongLyrics();
            if (Lyrics::getResult() == "TRUE") {
                $Decode = json_decode(Lyrics::getJSONFEED(), true);

                foreach ($Decode as $item) {
                    $Name = $item['song_name'];
                    $AID = $item['artists_id'];
                    $artist = $item['name'];
                    $Photo = $item['song_art'];
                    $lyrics = $item['lyrics'];
                    $ID = $item['song_id'];
                    echo "
                    <pre class='text-justify'>
                    $lyrics
                    </pre>
                    
                   
                 ";
                }
            } else {
                echo "<h4 class='text-center text-warning'>There are no lyrics</h4>";
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
            <p><a href="about.php">About</a></p>
            <p><a href="policy.php">Contacts</a></p>
            <p><a href="rights.php">Rights Policy</a></p>

        </div>


    </div>
    <div class="col-md-12">
        <hr/>
        <h6 class="text-center"> Raised For a Purpose | 2018 </h6>
    </div>
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>
</body>
</html>
