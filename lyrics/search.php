<?php
/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 28-Feb-18
 * Time: 4:10 AM
 */


require '../InfinityFramework/DSN/DBH.php';
require_once '../InfinityFramework/MODEL/Lyrics.php';

require_once '../InfinityFramework/POHO/LyricsAdapter.php';
$KEY = htmlentities($_GET['search'], ENT_QUOTES, "UTF-8");
if (!isset($KEY) && empty($KEY)) {
    $error[] = "You did not enter specify what to search for.";
}

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>RFP Music And Arts </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../IMedia/logo.png" rel="icon" type="image/png"/>
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
                <li><a href="../artists/index.php">ARTISTS</a></li>
                <li><a href="../albums/index.php">ALBUMS</a></li>
                <li><a href="../songs/index.php">SONGS</a></li>
                <li><a href="../genres/index.php">GENRES</a></li>
                <li><a href="../spoken/index.php">SPOKEN WORD</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php">LYRICS</a></li>
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


<div class="container-fluid">
    <div class="col-md-12">
        <div class="col-md-8 col-md-offset-2" id="white-back">
            <ul class="pager">
                <li>
                    <a href="index.php">Back</a>
                </li>
            </ul>
            <h4 class="text-center">Search Results for |<strong> <?php

                    echo $KEY;
                    ?></strong></h4>
            <hr/>

            <?php

            $PST = "SELECT *  FROM songs,albums,artists WHERE songs.song_name
 LIKE'%$KEY%' AND 
 songs.`artist_id`=artists.`artists_id`
 AND songs.`artist_id`=`albums`.`artist_id` GROUP BY songs.`song_id`;";

            $RST = DBH::getInstance()->CRUD($PST);

            if ($RST->rowCount() > 0) {


                foreach ($RST as $item) {
                    $Name = $item['song_name'];
                    $artist = $item['name'];
                    $AID = $item['artists_id'];
                    $Photo = $item['song_art'];
                    $ID = $item['song_id'];
                    echo "<div class='col-md-3 col-xs-6' >
                    <div id='white-back'>
                       <img src='../IMedia/art/$Photo' id='art-work' class='img img-responsive center-block'>
                       <h5 class='text-center'><a class='text-center' href='../artists/view.php?id=$AID'>$artist</a> </h5>
                    <h6 class='text-center'>$Name</h6><hr/>
                    
                    
                    <h6 class='text-center'><a class='btn btn-info' href='view.php?id=$ID'>View Lyrics</a> </h6>
                    
                    </div>
                 
                   
                </div>";
                }
            } else {
                echo "<h4 class='text-center text-warning'>Hello, we did not find anything matching your search</h4>";
            }

            ?>

            <div class="clearfix"></div>

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



