<?php
/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 26-Jan-18
 * Time: 2:41 AM
 */


require '../InfinityFramework/DSN/DBH.php';
require_once '../InfinityFramework/MODEL/ArtistsModel.php';
require_once '../InfinityFramework/MODEL/SpokenWordModel.php';
require_once '../InfinityFramework/MODEL/AlbumsModel.php';
require_once '../InfinityFramework/POHO/SpokenWordAdapter.php';

$ID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");

$ArtistID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");
$photo = "";
$name = "";

$PreparedStatement = "SELECT * FROM  spoken_word_artists WHERE artist_id ='$ArtistID'";

$ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

$Rows = $ResultSet->rowCount();

if ($Rows > 0) {
    foreach ($ResultSet as $feed) {
        $name = $feed['artist_name'];

        $photo = $feed['pic'];
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

    echo "<link href='../IMedia/spoken/$photo' rel='icon' type='image/png'/>";

    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta property="og:site_name" content="Raised For a Purpose Music and Arts Ministry. "/>
    <meta property="og:title"
          content="<?php echo "$name music and bio   | RFP Music and Arts " ?>"/>
    <meta property="og:description"
          content="<?php echo " $name music and bio | RFP Music and Arts " ?>"/>
    <?php

    echo "<meta property='og:image' content='http://www.rfpmam.com/IMedia/spoken/$photo'/>";
    echo "<meta property='og:url' content='http://www.rfpmam.com/spoken/view.php?id=$ArtistID'/>";

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
                <li class="active"><a href="index.php">SPOKEN WORD</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../lyrics/index.php">LYRICS</a></li>
                <li><a href="../events/index.php">NEWS & EVENTS</a></li>
                <li><a href="../trends/index.php">TRENDING</a></li>
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
        <div class="col-md-12">
            <h4 class="text-center">VIEW ARTISTS PROFILE</h4>
            <hr/>
            <ul class="pager">
                <li>
                    <a href="index.php">Back</a>
                </li>
            </ul>
            <div class="col-md-5" id="">
                <div class="col-lg-12" id="white-back">
                    <br/>
                    <br/>
                    <h4 class="text-center">PROFILE</h4>
                    <hr/>
                    <?php

                    if (isset($error)) {
                        foreach ($error as $err) {
                            echo "<p class='text-danger text-center'>$err</p>";
                        }

                    }
                    if (isset($info)) {
                        foreach ($info as $item) {
                            echo "<p class='text-center text-blue'>$item</p>";
                        }
                    }


                    ?>

                    <?php


                    if (empty($ID)) {
                        echo "<h4 class='text-center '>The artist you are looking for was not found in our system</h4>";
                    } else {
                        $PreparedStatement = "SELECT * FROM spoken_word_artists WHERE artist_id='$ID'";
                        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);


                        if ($ResultSet->rowCount() > 0) {


                            foreach ($ResultSet as $feed) {
                                $name = $feed['artist_name'];

                                $bio = $feed['bio'];
                                $photo = $feed['pic'];
                                $fb = $feed['facebook'];
                                $twitter = $feed['twitter'];
                                echo "<div class='col-md-8 col-md-offset-2' id='white-back'>";

                                echo " <img src='../IMedia/spoken/$photo' id='profile-pic' class='img img-responsive center-block '><br/>
 
                    <h5 class='text-center'>$name</h5> <hr/>
                    <p>$bio</p>  <hr/>
                    <p class='text-center'> <a href='$fb' target='_blank'>Facebook Page</a></p>
                    <p class='text-center'> <a href='$twitter' target='_blank'>Twitter Page</a>  </p>
                 
                   ";

                                echo "</div>";
                            }

                        } else {
                            echo "<h4>Artist Not Found</h4>";
                        }


                    }


                    ?>
                </div>
            </div>
            <div class="col-md-7" id="">
                <div class="col-lg-12" id="white-back">
                    <br/>
                    <br/>
                    <h4 class="text-center">SPOKEN WORD SONGS BY ARTIST</h4>
                    <hr/>
                    <?php


                    $ST = "SELECT * FROM spoken_words WHERE artist_id ='$ID'";

                    $RS = DBH::getInstance()->CRUD($ST);

                    if ($RS->rowCount() > 0) {
                        echo " <table class=\"table table-striped\" id='white-back'><thead>
                                    <tr class=\"text-primary\">
                                   
                                        <th>Song Name</th>
                                        <th> Downloads</th>
                                        <th> Play</th>
                                        <th> Download</th>
                                
                                       
                                      
                                       
                                    </tr>
                                    </thead><tbody>";

                        foreach ($RS as $feed) {

                            $artist_id = $feed['artist_id'];
                            $name = $feed['song_name'];
                            $downloads = $feed['downloads'];
                            $song_id = $feed['id'];
                            $song_url = $feed['url'];
                            $lyrics = $feed['lyrics'];
                            echo " <tr>
                        
                        <th scope=\"row\">$name</th>
                        <td>$downloads</td>
                         <td><a href='play.php?uid=$song_id' ><span><i class='fa fa-play' aria-hidden='true'></i></a></td>
                        <td><a href='download.php?uid=$song_id' ><span><i class=\"fa fa-download\" aria-hidden=\"true\"></i></a></td> 
                       
                        
                      
                    </tr>";

                        }
                        echo "</tbody></table>";
                    } else {
                        echo "There are no spoken word songs for this artist";
                    }

                    ?>
                </div>
            </div>

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

