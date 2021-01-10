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
        <h4 class="text-center">ALBUMS</h4>
        <ul class="pager">
            <li>
                <a href="add_new.php">Add New Album</a>
            </li>
            <li>
                <a href="all.php">All Songs</a>
            </li>
            <li>
                <a href="search.php">Search Songs</a>
            </li>

        </ul>


        <div class="col-md-12">
            <h4 class="text-center">ALL ALBUMS</h4>
            <hr/>

            <?php
            $alb_id = "";
            $url_zip = "";
            $PreparedStatement = "SELECT * FROM  artists,albums WHERE albums.artist_id = artists.artists_id 
                                   ;";

            $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

            $Rows = $ResultSet->rowCount();

            if ($Rows > 0) {


                foreach ($ResultSet as $feed) {
                    $name = $feed['name_alb'];
                    $id = $feed['artist_id'];
                    $artist = $feed['name'];
                    $alb_id = $feed['alb_id'];
                    $downloads = $feed['downloads_alb'];
                    $photo = $feed['cover'];
                    $url_zip = $feed['url'];


                    echo "<div class='col-md-2' id='box-shadow'>
                        <h5 class='text-center'><a href='album-songs.php?id=$alb_id&nm=$name&art=$artist'>$name</a> </h5><hr/>
                        <h5 class='text-center'>$artist</h5>
                    <img src='../../IMedia/covers/$photo' class='img img-responsive center-block'>
                    <h5 class='text-center'>$downloads downloads</h5><hr/>
                    <h6 class='text-center'>
                    <a href='add_singles.php?a=$artist&alb=$name&id=$alb_id&art_id=$id'>Add Song</a> |
                    <a href='add_zip.php?a=$artist&alb=$name&id=$alb_id&art_id=$id'>Add Zip Folder</a>
                    </h6>
                     <h6 class='text-center'>
                      <a href='delete-alb.php?nm=$name&alb=$alb_id'>Delete</a>
                    </h6>
                   
                </div>";

                }


            } else {
                echo "<h4 class='text-center text-warning'>There are no trending artists available.</h4>";
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

