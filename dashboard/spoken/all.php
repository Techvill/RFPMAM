<?php
/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 26-Jan-18
 * Time: 2:41 AM
 */
@session_start();

if (!isset($_SESSION['admin_email'])) {

    header("location:../../manage.php");
}
require '../../InfinityFramework/DSN/DBH.php';
require_once '../../InfinityFramework/MODEL/ArtistsModel.php';

require_once '../../InfinityFramework/POHO/ArtistsAdapter.php';


?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>RFP Music And Arts </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--Cascading style sheet-->


    <!--End of css calling-->

    <!--online resources-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../IUX/UserInterface/bootstrap.css"/>
    <link rel="stylesheet" href="../../IUX/UserInterface/infix.css"/>
    <script src="../../IUX/UserExperience/jquery-3.2.1.min.js"></script>
    <script src="../../IUX/UserExperience/jquery.bxslider.js"></script>
    <script src="../../IUX/UserExperience/bootstrap.js"></script>


    <!--end of online resources-->


</head>
<body>

<nav class="navbar navbar-default">
    <div class="">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <i class="fa fa-bars"></i> Menu
            </button>
            <a class="navbar-brand" href="../index.php">DASHBOARD</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">

                <li class=""><a href="../index.php">HOME</a></li>
                <li><a href="../artists/index.php">ARTISTS</a></li>
                <li class="active"><a href="index.php">SONGS & ALBUMS</a></li>
                <li><a href="../spoken/index.php">SPOKEN WORD</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li><a href="../lyrics/index.php">LYRICS</a></li>
                <li><a href="../events/index.php">NEWS & EVENTS</a></li>
                <li><a href="../trends/index.php">TRENDING</a></li>
                <li><a href="../logout.php">LOGOUT</a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container-fluid">
    <div class="col-md-12 text-center">
        <h4 class="text-center">SPOKEN WORD</h4>
        <ul class="pager">
            <li>
                <a href="index.php">Back</a>
            </li>

        </ul>


        <div class="col-md-8 col-md-offset-2">
            <h4 class="text-center">ALL SPOKEN WORD MUSIC</h4>
            <hr/>

            <?php


            $ST = "SELECT * FROM spoken_words,spoken_word_artists WHERE
                    spoken_words.artist_id=spoken_word_artists.artist_id ORDER BY id DESC";

            $RS = DBH::getInstance()->CRUD($ST);

            if ($RS->rowCount() > 0) {
                echo " <table class=\"table table-striped\" id='white-back'><thead>
                                    <tr class=\"text-primary\">
                                   
                                        <th>Artist Name</th>
                                        <th>Song Name</th>
                                      
                                        <th> Downloads</th>
                                        <th>Delete</th>
                                      
                                       
                                    </tr>
                                    </thead><tbody>";

                foreach ($RS as $feed) {

                    $artist = $feed['artist_name'];


                    $artist_id = $feed['artist_id'];
                    $name = $feed['song_name'];
                    $downloads = $feed['downloads'];
                    $song_id = $feed['id'];
                    $song_url = $feed['url'];

                    echo " <tr>
                        
                        <th scope=\"row\">$artist</th>
                        <th scope=\"row\">$name</th>
                       
                        <td>$downloads</td>
                        <td><a href='del_single.php?id=$song_id&nm=$name' >Delete</a></td>
                        
                      
                    </tr>";

                }
                echo "</tbody></table>";
            } else {
                echo "<h4>There are no songs in the system</h4>";
            }

            ?>


        </div>


    </div>

</div>

<div class="row" id="footer">
    <div class="container">
        <h4 class="text-center">RFP MUSIC AND ARTS MINISTRY | Administration Area</h4>

    </div>
</div>


</body>
</html>

