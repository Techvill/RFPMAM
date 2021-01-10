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
require_once '../../InfinityFramework/MODEL/Lyrics.php';

require_once '../../InfinityFramework/POHO/LyricsAdapter.php';

if (isset($_POST['save'])) {
    $desc = htmlentities($_POST['desc'], ENT_QUOTES, "UTF-8");
    $song_id = htmlentities($_POST['song_id'], ENT_QUOTES, "UTF-8");

    $PST = "UPDATE songs SET lyrics='$desc' WHERE song_id='$song_id'";

    $RST = DBH::getInstance()->CRUD($PST);

    if ($RST->rowCount() > 0) {
        $info [] = "Lyrics added successfully.";
    } else {
        $error[] = "There was an error saving these lyrics.";
    }


}


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
                <li><a href="../songs/index.php">SONGS & ALBUMS</a></li>
                <li><a href="../spoken/index.php">SPOKEN WORD</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="active"><a href="index.php">LYRICS</a></li>
                <li><a href="../events/index.php">NEWS & EVENTS</a></li>
                <li><a href="../trends/index.php">TRENDING</a></li>
                <li><a href="../logout.php">LOGOUT</a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container-fluid">
    <div class="col-md-12">
        <h4 class="text-center">FEATURED LYRICS</h4>
        <ul class="pager">
            <li>
                <a href="index.php">Back</a>
            </li>
        </ul>
        <hr/>
        <div class="col-md-8 col-md-offset-2" id="white-back">
            <br/>
            <br/>
            <h4 class="text-center">Add New Lyrics</h4>
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
            <form id="login-form" autocomplete="on" enctype="multipart/form-data" role="form" method="POST" action=""
                  class="form-horizontal">


                <div class="form-group">
                    <label class="col-sm-4" for="inputEmail1">Song & Artist</label>
                    <div class="col-sm-8">
                        <select required class="select form-control" id="country" name="song_id">

                            <?php


                            echo $STMT = "SELECT * FROM artists, songs WHERE songs.artist_id=artists.artists_id AND songs.lyrics=''";

                            $ST = DBH::getInstance()->CRUD($STMT);

                            if ($ST->rowCount() > 0) {


                                foreach ($ST as $row) {
                                    $name = $row['name'];
                                    $song_name = $row['song_name'];
                                    $id = $row['song_id'];
                                    echo "<option value='$id'>$song_name by $name</option>";

                                }
                            } else {
                                echo "<option disabled>No songs found</option>";
                            }

                            ?>


                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-4" for="inputEmail1">Lyrics</label>
                    <div class="col-sm-8">

                        <textarea name='desc' placeholder="" class='form-control' rows='8'>

                                    </textarea>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-4" for="Services"></label>
                    <div class="col-sm-8">
                        <button id="reg-btn" type="submit" name="save"
                                class="col-md-12 col-xs-12 btn btn-info">Save
                        </button>
                    </div>
                </div>
            </form>

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

