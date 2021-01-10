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
                <li class=""><a href="../artists/index.php">ARTISTS</a></li>
                <li><a href="../albums/index.php">SONGS & ALBUMS</a></li>
                <li><a href="../spoken/index.php">SPOKEN WORD</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../lyrics/index.php">LYRICS</a></li>
                <li><a href="../events/index.php">NEWS & EVENTS</a></li>
                <li class="active"><a href="index.php">TRENDING</a></li>
                <li><a href="../logout.php">LOGOUT</a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>


<div class="container-fluid">
    <div class="col-md-12 text-center">
        <h4 class="text-center">TRENDING ARTISTS</h4>

        <hr/>
        <ul class="pager">
            <li>
                <a href="index.php">Set Artist as trending</a>
            </li>
        </ul>

        <div class="col-md-6 col-md-offset-3" id="white-back">
            <br/>
            <h4>SELECT ARTIST</h4>
            <p>Note that, when you set an artist as trending all their content(songs and albums) automatically goes on
                trending too.</p>
            <?php

            if (isset($_POST['save'])) {
                $ArtistID = htmlentities($_POST['artist_id'], ENT_QUOTES, "UTF-8");

                $CHECK = "SELECT * FROM trending  WHERE artist_id='$ArtistID'";
                $CHECK = DBH::getInstance()->CRUD($CHECK);

                if ($CHECK->rowCount() > 0) {
                    echo "<h5 class='text-danger'>Sorry but this artist is already on trending.</h5>";
                } else {


                    $PST = "INSERT INTO trending (artist_id) VALUE ('$ArtistID')";
                    $RST = DBH::getInstance()->CRUD($PST);

                    if ($RST->rowCount() > 0) {
                        echo "<h5 class='text-info'>You have set this artist as trending.</h5>";
                    } else {
                        echo "<h5 class='text-danger'>There was an error setting this artist as trending.</h5>";

                    }
                }
            }
            ?>
            <form id="login-form" autocomplete="on" enctype="multipart/form-data" role="form" method="POST" action=""
                  class="form-horizontal">


                <div class="form-group">
                    <label class="col-sm-4" for="inputEmail1">Artist</label>
                    <div class="col-sm-8">
                        <select required class="select form-control" id="country" name="artist_id">

                            <?php


                            echo $STMT = "SELECT * FROM artists";

                            $ST = DBH::getInstance()->CRUD($STMT);

                            if ($ST->rowCount() > 0) {


                                foreach ($ST as $row) {
                                    $name = $row['name'];
                                    $id = $row['artists_id'];
                                    echo "<option value='$id'>$name</option>";

                                }
                            } else {
                                echo "<option disabled></option>";
                            }

                            ?>


                        </select>
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

