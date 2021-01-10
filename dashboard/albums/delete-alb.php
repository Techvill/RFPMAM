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
                <a href="index.php">Back</a>
            </li>

        </ul>


        <div class="col-md-6 col-md-offset-3" id="white-back">
            <h4 class="text-center">ALBUM SONGS</h4>
            <hr/>


            <?php


            $name = htmlentities($_GET['nm'], ENT_QUOTES, "UTF-8");
            $Album = htmlentities($_GET['alb'], ENT_QUOTES, "UTF-8");

            if (!empty($Album) && !empty($Album)) {
                echo "<p>Are you sure you want to delete <strong>$name</strong></p>";
                ?>

                <form id="login-form" autocomplete="on" role="form" method="POST"
                      action=""
                      class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-4" for=""></label>
                        <div class="col-sm-4">
                            <button id="reg-btn" type="submit" name="delete"
                                    class="col-md-12 col-xs-12 btn btn-danger">Delete Album
                            </button>
                        </div>
                    </div>
                </form>
                <?php
            }


            ?>

            <?php

            if (isset($_POST['delete'])) {

                $pst = "DELETE FROM albums USING albums, songs WHERE albums.alb_id = songs.alb_id AND albums.alb_id ='$Album';";

                $rst = DBH::getInstance()->CRUD($pst);

                if ($rst->rowCount() > 0) {
                    echo "<h5 class='text-center'>Album was deleted successfully</h5>";
                } else {
                    echo "<h5 class='text-center'>This album was not found in the system, it may have already been deleted.</h5>";
                }
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

