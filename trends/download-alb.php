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

$id = htmlentities($_GET['uid'], ENT_QUOTES, "UTF-8");

$AlbumName = '';
$URL = '';
$Downloads = "";
$Artist = "";
$ArtistID = '';
$Cover = '';

$PST = "SELECT name_alb,url,downloads_alb,artist_id,cover,name  FROM  artists,albums WHERE albums.artist_id=artists.artists_id  
                             AND alb_id ='$id' ";

$RST = DBH::getInstance()->CRUD($PST);

if ($RST->rowCount() > 0) {
    foreach ($RST as $row) {
        $AlbumName = $row['name_alb'];
        $Artist = $row['name'];
        $Cover = $row['cover'];
        $Downloads = $row['downloads_alb'];
        $URL = $row['url'];
    }

}


?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo "Download songs from the album $AlbumName by $Artist | RFP Music and Arts " ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php

    echo "<link href='../IMedia/covers/$Cover' rel='icon' type='image/png'/>";

    ?>

    <meta property="og:site_name" content="Raised For a Purpose Music and Arts Ministry. "/>
    <meta property="og:title"
          content="<?php echo "Download  $AlbumName by $Artist | RFP Music and Arts " ?>"/>
    <meta property="og:description"
          content="<?php echo "Stream and download music  by $Artist | RFP Music and Arts " ?>"/>
    <?php

    echo "<meta property='og:image' content='http://www.rfpmam.com/IMedia/covers/$Cover'/>";
    echo "<meta property='og:url' content='http://www.rfpmam.com/trends/download-alb.php?uid=$id'/>";

    ?>
    <!--End of css calling-->

    <!--online resources-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <link rel="stylesheet" href="../IUX/UserInterface/bootstrap.css"/>
    <link rel="stylesheet" href="../IUX/UserInterface/infix.css"/>
    <script src="../IUX/UserExperience/jquery-3.2.1.min.js"></script>
    <script src="../IUX/UserExperience/jquery.bxslider.js"></script>
    <script src="../IUX/UserExperience/bootstrap.js"></script>


    <!--end of online resources-->
    <style>
        fieldset, label {
            margin: 0;
            padding: 0;
        }

        .rating {
            border: none;
            float: left;
        }

        .rating > input {
            display: none;
        }

        .rating > label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating > .half:before {
            content: "\f089";
            position: absolute;
        }

        .rating > label {
            color: #ddd;
            float: right;
        }

        .rating > input:checked ~ label,
        .rating:not(:checked) > label:hover,
        .rating:not(:checked) > label:hover ~ label {
            color: #FFD700;
        }

        .rating > input:checked + label:hover,
        .rating > input:checked ~ label:hover,
        .rating > label:hover ~ input:checked ~ label,
        .rating > input:checked ~ label:hover ~ label {
            color: #ff6b3d;
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
                <li><a href="../lyrics/index.php">LYRICS</a></li>
                <li><a href="../events/index.php">NEWS & EVENTS</a></li>
                <li class="active"><a href="index.php">TRENDING</a></li>
                <li>
                    <br/>
                    <form class="form-inline" action="" method="POST">

                        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
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
        <div class="col-md-6 col-md-offset-3" id="white-back">
            <ul class="pager">
                <li>
                    <a href="index.php">Back</a>
                </li>
            </ul>
            <h4 class="text-center">Download <?php echo $AlbumName . " by " . $Artist ?> </h4>
            <hr/>


            <?php
            if (isset($_POST['download'])) {
                $FinalDownloadCounter = $Downloads + 1;
                $UPDATE = "UPDATE albums SET downloads_alb ='$FinalDownloadCounter' WHERE alb_id ='$id'";
                $PUPST = DBH::getInstance()->CRUD($UPDATE);

                if ($PUPST->rowCount() > 0) {
                    echo "<meta http-equiv='refresh' content='1;url=../DL/albums/$URL'>";
                    echo "<p class='text-center'> Your download will start in a second. If not, use this link to download the
                                        <a download='true' href='../DL/albums/$URL'>Download</a></p>";
                }

            }

            echo "<img src='../IMedia/covers/$Cover' id='art' class='img-responsive center-block'/><br/>";
            echo "<p class='text-center'>$Downloads downloads</p>";
            echo "<div class='col-md-6 col-md-offset-4'><fieldset id='demo1' class=\"rating text-center\">
                        <input class=\"stars\" type=\"radio\" id=\"star5\" name=\"rating\" value=\"5\" />
                        <label class = \"full\" for=\"star5\" title=\"Awesome - 5 stars\"></label>
                        <input class=\"stars\" type=\"radio\" id=\"star4\" name=\"rating\" value=\"4\" />
                        <label class = \"full\" for=\"star4\" title=\"Pretty good - 4 stars\"></label>
                        <input class=\"stars\" type=\"radio\" id=\"star3\" name=\"rating\" value=\"3\" />
                        <label class = \"full\" for=\"star3\" title=\"Meh - 3 stars\"></label>
                        <input class=\"stars\" type=\"radio\" id=\"star2\" name=\"rating\" value=\"2\" />
                        <label class = \"full\" for=\"star2\" title=\"Kinda bad - 2 stars\"></label>
                        <input class=\"stars\" type=\"radio\" id=\"star1\" name=\"rating\" value=\"1\" />
                        <label class = \"full\" for=\"star1\" title=\"Sucks big time - 1 star\"></label>
 
                    </fieldset></div>";
            echo "<div class='col-md-12'><p class='text-center'>
<form class=\"form-horizontal center-block text-center\" action=\"\" method=\"POST\">

                                               <button name='download' class=\"btn btn-default\" type=\"\">
                            <span><i class=\"fa fa-download\" aria-hidden=\"true\"></i></span>
                        </button>
                    </form></p></div>";

            ?>

            <div class="col-md-8 col-md-offset-2 a2a_kit a2a_kit_size_32 a2a_default_style">

                <a class="a2a_button_facebook"></a>
                <a class="a2a_button_twitter"></a>
                <a class="a2a_button_google_plus"></a>
                <a class="a2a_button_whatsapp"></a>
                <a class="a2a_button_linkedin"></a>
                <a class="a2a_button_skype"></a>
                <a class="a2a_button_telegram"></a>
                <a class="a2a_button_sms"></a>

                <a class="a2a_button_wechat"></a>

            </div>
            <script async src="https://static.addtoany.com/menu/page.js"></script>

        </div>

    </div>
    <div class="clearfix"></div>


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

