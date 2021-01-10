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
$ID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");

Lyrics::setSongId($ID);
LyricsAdapter::FetchSongLyrics();
$Name = '';
$artist = "";
$lyrics = '';
$Photo = "";
if (Lyrics::getResult() == "TRUE") {
    $Decode = json_decode(Lyrics::getJSONFEED(), true);

    foreach ($Decode as $item) {
        $Name = $item['song_name'];
        $artist = $item['name'];
        $Photo = $item['song_art'];
        $lyrics = $item['lyrics'];
        $ID = $item['song_id'];
    }
}

if (isset($_POST['new_details'])) {


    $code = htmlentities($_POST['desc'], ENT_QUOTES, "UTF-8");


    if (strlen($code) < 0) {
        $error[] = "Please check the new name is empty.";
    }


    if (!isset($error)) {

        $Q = "UPDATE songs SET lyrics ='$code' WHERE song_id='$ID'";
        $RST = DBH::getInstance()->CRUD($Q);
        if ($RST->rowCount() > 0) {


            $info [] = "New artist bio was updated successfully.";
        } else {
            $error[] = "There was an error updating.";
        }
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


        Lyrics::setSongId($ID);
        LyricsAdapter::FetchSongLyrics();
        if (Lyrics::getResult() == "TRUE") {
            $Decode = json_decode(Lyrics::getJSONFEED(), true);

            foreach ($Decode as $item) {
                $Name = $item['song_name'];
                $artist = $item['name'];
                $Photo = $item['song_art'];
                $lyrics = $item['lyrics'];
                if ($lyrics == "") {

                }
                $ID = $item['song_id'];
                echo "<div class='col-md-8 col-md-offset-2' >
                    <div id='white-back'>
                       <img src='../../IMedia/art/$Photo' id='art' class='img img-responsive center-block'>
                       <h3 class='text-center'>$artist</h3>
                    <h4 class='text-center'><strong>$Name Lyrics</strong></h4><hr/>
                    <p class='text-center'><a data-toggle='modal' data-target='#UpdateDetails' class='btn btn-success'>Update Lyrics</a></p>
                    
                    <pre>
                    
                    $lyrics
                    </pre>
                    
                   
                    
                    </div>
                 
                   
                </div>";
            }
        } else {
            echo "<h4 class='text-center text-warning'>There are no lyrics</h4>";
        }


        ?>


    </div>

    <div id="UpdateDetails" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Song Lyrics</h4>
                </div>
                <div class="modal-body">
                    <form role='form' method='post'>

                        <div class='form-group'>
                            <label>New Lyrics</label>
                            <textarea name='desc' placeholder="New bio" class='form-control' rows='8'>

                                    </textarea>
                        </div>


                        <div class='row'>


                            <div class='col-xs-12'>
                                <button type='submit' name='new_details'
                                        class='btn btn-primary btn-block btn-flat'>
                                    Update
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

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

