<?php
/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 02-Mar-18
 * Time: 3:52 AM
 */


require '../InfinityFramework/DSN/DBH.php';
require_once '../InfinityFramework/MODEL/EventsModel.php';

require_once '../InfinityFramework/POHO/EventsAdapter.php';


?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>RFP Music And Arts | Music Genres</title>


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../IMedia/logo.png" rel="icon" type="image/png"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../IMedia/logo.png" rel="icon" type="image/png"/>

    <meta property="og:site_name" content="RFP Music and Arts | Our Music Genres Library. "/>
    <meta property="og:title"
          content="Download and view our artists profiles"/>
    <meta property="og:description" content="Download, listen to music from our different music genre library "/>
    <meta property="og:image" content="http://www.rfpmam.com/IMedia/logo.png">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.rfpmam.com/genres/index.php"/>
    <meta property="fb:app_id" content="138681726961769"/>

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
                <li class="active"><a href="index.php">GENRES</a></li>
                <li><a href="../spoken/index.php">SPOKEN WORD</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../lyrics/index.php">LYRICS</a></li>
                <li class=""><a href="../events/index.php">NEWS & EVENTS</a></li>
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

<h4 class="text-center">MUSIC GENRES</h4>
<hr/>
<div class="row">

    <div class="col-md-6" id="">
        <div class="col-md-12" id="white-back">


            <h4 class="text-center">RnB</h4>

            <hr/>

            <?php

            $PST = "SELECT * FROM songs WHERE genre='rnb' ORDER BY RAND() LIMIT 10";
            $RST = DBH::getInstance()->CRUD($PST);


            if ($RST->rowCount() > 0) {


                echo " <div class=\"table-responsive col-md-12 col-sm-12 col-lg-12\"><table class=\"table
             table-bordered table-striped table-condensed\" id='white-back'><thead>
                                                <tr class=\"text-primary\">
                                                    <th>Song Name</th>
            
                                                    <th>Download</th>
                                                    <th>Play</th>
                                                    <th> Downloads</th>
            
                                                    <th>Lyrics </th>
            
            
            
                                                </tr>
                                                </thead><tbody>";

                foreach ($RST as $feed) {
                    $name = $feed['song_name'];
                    $downloads = $feed['downloads'];
                    $song_id = $feed['song_id'];
                    $song_url = $feed['url'];
                    $lyrics = $feed['lyrics'];
                    echo " <tr>
                                    <th scope=\"row\">$name</th>
                                     <th><a href='download.php?uid=$song_id'>
                                     <span><i class='fa fa-download' aria-hidden='true'></i></span></a></th> 
                                           <th><a href='../play.php?uid=$song_id'>
                                     <span><i class='fa fa-play' aria-hidden='true'></i></span></a></th>
            
                                    <td>$downloads</td>
                                    <td><a href='../lyrics/view.php?id=$song_id' >Lyrics</a></td>
            
            
                                </tr>";

                }
                echo "</tbody></table>
<p class='text-center'><a href='all.php?gen=rnb'>View All</a> </p></div>";


            } else {
                echo "<h5 class='text-center text-danger'>There are no songs in this genre!!</h5>";
            }
            ?>

        </div>

    </div>
    <div class="col-md-6" id="white-back">
        <h4 class="text-center">Hip Hop</h4>

        <hr/>

        <?php

        $PST = "SELECT * FROM songs WHERE genre='hiphop' ORDER BY RAND() LIMIT 10";
        $RST = DBH::getInstance()->CRUD($PST);


        if ($RST->rowCount() > 0) {


            echo " <div class=\"table-responsive col-md-12 col-sm-12 col-lg-12\"><table class=\"table
             table-bordered table-striped table-condensed\" id='white-back'><thead>
                                                <tr class=\"text-primary\">
                                                    <th>Song Name</th>
            
                                                    <th>Download</th>
                                                    <th>Play</th>
                                                    <th> Downloads</th>
            
                                                    <th>Lyrics </th>
            
            
            
                                                </tr>
                                                </thead><tbody>";

            foreach ($RST as $feed) {
                $name = $feed['song_name'];
                $downloads = $feed['downloads'];
                $song_id = $feed['song_id'];
                $song_url = $feed['url'];
                $lyrics = $feed['lyrics'];
                echo " <tr>
                                    <th scope=\"row\">$name</th>
                                     <th><a href='download.php?uid=$song_id'>
                                     <span><i class='fa fa-download' aria-hidden='true'></i></span></a></th>
            <th><a href='../play.php?uid=$song_id'>
                                     <span><i class='fa fa-play' aria-hidden='true'></i></span></a></th>
                                    <td>$downloads</td>
                                    <td><a href='../lyrics/view.php?id=$song_id' >Lyrics</a></td>
            
            
                                </tr>";

            }
            echo "</tbody></table>
<p class='text-center'><a href='all.php?gen=hiphop'>View All</a> </p></div>";


        } else {
            echo "<h5 class='text-center text-danger'>There are no songs in this genre!!</h5>";
        }
        ?>
    </div>


</div>
<div class="row">

    <div class="col-md-6" id="">
        <div class="col-md-12" id="white-back">


            <h4 class="text-center">Rock</h4>

            <hr/>

            <?php

            $PST = "SELECT * FROM songs WHERE genre='rock' ORDER BY RAND() LIMIT 10";
            $RST = DBH::getInstance()->CRUD($PST);


            if ($RST->rowCount() > 0) {


                echo " <div class=\"table-responsive col-md-12 col-sm-12 col-lg-12\"><table class=\"table
             table-bordered table-striped table-condensed\" id='white-back'><thead>
                                                <tr class=\"text-primary\">
                                                    <th>Song Name</th>
            
                                                    <th>Download</th>
                                                    <th>Play</th>
                                                    <th> Downloads</th>
            
                                                    <th>Lyrics </th>
            
            
            
                                                </tr>
                                                </thead><tbody>";

                foreach ($RST as $feed) {
                    $name = $feed['song_name'];
                    $downloads = $feed['downloads'];
                    $song_id = $feed['song_id'];
                    $song_url = $feed['url'];
                    $lyrics = $feed['lyrics'];
                    echo " <tr>
                                    <th scope=\"row\">$name</th>
                                     <th><a href='download.php?uid=$song_id'>
                                     <span><i class='fa fa-download' aria-hidden='true'></i></span></a></th>
            
            <th><a href='../play.php?uid=$song_id'>
                                     <span><i class='fa fa-play' aria-hidden='true'></i></span></a></th>
                                    <td>$downloads</td>
                                    <td><a href='../lyrics/view.php?id=$song_id' >Lyrics</a></td>
            
            
                                </tr>";

                }
                echo "</tbody></table>
<p class='text-center'><a href='all.php?gen=rock'>View All</a> </p></div>";


            } else {
                echo "<h5 class='text-center text-danger'>There are no songs in this genre!!</h5>";
            }
            ?>

        </div>

    </div>
    <div class="col-md-6" id="white-back">
        <h4 class="text-center">Afro Pop</h4>

        <hr/>

        <?php

        $PST = "SELECT * FROM songs WHERE genre='afropop' ORDER BY RAND() LIMIT 10";
        $RST = DBH::getInstance()->CRUD($PST);


        if ($RST->rowCount() > 0) {


            echo " <div class=\"table-responsive col-md-12 col-sm-12 col-lg-12\"><table class=\"table
             table-bordered table-striped table-condensed\" id='white-back'><thead>
                                                <tr class=\"text-primary\">
                                                    <th>Song Name</th>
            
                                                    <th>Download</th>
                                                    <th>Play</th>
                                                    <th> Downloads</th>
            
                                                    <th>Lyrics </th>
            
            
            
                                                </tr>
                                                </thead><tbody>";

            foreach ($RST as $feed) {
                $name = $feed['song_name'];
                $downloads = $feed['downloads'];
                $song_id = $feed['song_id'];
                $song_url = $feed['url'];
                $lyrics = $feed['lyrics'];
                echo " <tr>
                                    <th scope=\"row\">$name</th>
                                     <th><a href='download.php?uid=$song_id'>
                                     <span><i class='fa fa-download' aria-hidden='true'></i></span></a></th>
            <th><a href='../play.php?uid=$song_id'>
                                     <span><i class='fa fa-play' aria-hidden='true'></i></span></a></th>
                                    <td>$downloads</td>
                                    <td><a href='../lyrics/view.php?id=$song_id' >Lyrics</a></td>
            
            
                                </tr>";

            }
            echo "</tbody></table>
<p class='text-center'><a href='all.php?gen=afropop'>View All</a> </p></div>";


        } else {
            echo "<h5 class='text-center text-danger'>There are no songs in this genre!!</h5>";
        }
        ?>
    </div>


</div>
<div class="row">

    <div class="col-md-8 col-md-offset-2" id="">
        <div class="col-md-12" id="white-back">


            <h4 class="text-center">Others</h4>

            <hr/>

            <?php

            $PST = "SELECT * FROM songs WHERE genre='others' ORDER BY RAND() LIMIT 10";
            $RST = DBH::getInstance()->CRUD($PST);


            if ($RST->rowCount() > 0) {


                echo " <div class=\"table-responsive col-md-12 col-sm-12 col-lg-12\"><table class=\"table
             table-bordered table-striped table-condensed\" id='white-back'><thead>
                                                <tr class=\"text-primary\">
                                                    <th>Song Name</th>
            
                                                    <th>Download</th>
                                                    <th>Play</th>
                                                    <th> Downloads</th>
            
                                                    <th>Lyrics </th>
            
            
            
                                                </tr>
                                                </thead><tbody>";

                foreach ($RST as $feed) {
                    $name = $feed['song_name'];
                    $downloads = $feed['downloads'];
                    $song_id = $feed['song_id'];
                    $song_url = $feed['url'];
                    $lyrics = $feed['lyrics'];
                    echo " <tr>
                                    <th scope=\"row\">$name</th>
                                     <th><a href='download.php?uid=$song_id'>
                                     <span><i class='fa fa-download' aria-hidden='true'></i></span></a></th>
            <th><a href='../play.php?uid=$song_id'>
                                     <span><i class='fa fa-play' aria-hidden='true'></i></span></a></th>
                                    <td>$downloads</td>
                                    <td><a href='../lyrics/view.php?id=$song_id' >Lyrics</a></td>
            
            
                                </tr>";

                }
                echo "</tbody></table>
                <p class='text-center'><a href='all.php?gen=others'>View All</a> </p></div>";


            } else {
                echo "<h5 class='text-center text-danger'>There are no songs in this genre!!</h5>";
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


