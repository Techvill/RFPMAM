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
                <li class="active"><a href="index.php">ARTISTS</a></li>
                <li><a href="../albums/index.php">SONGS & ALBUMS</a></li>
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
        <h4 class="text-center">RFP MUSIC ARTISTS</h4>

        <hr/>
        <ul class="pager">
            <li>
                <a href="add_new.php">Add New Artist</a>
            </li>
        </ul>

        <?php

        ArtistsAdapter::GetAllArtists();

        $Res = ArtistsModel::getResult();

        if ($Res == "TRUE") {
            $JSON = ArtistsModel::getJSONFEED();

            $DECODED_JSON = json_decode($JSON, true);

            foreach ($DECODED_JSON as $item) {
                $Name = $item['name'];
                $Photo = $item['profile_pic'];
                $ID = $item['artists_id'];

                echo "<div class='col-md-2' id=''>
                                     <div class='col-md-12' id='white-back'>
                                        <img src='../../IMedia/artists_pics/$Photo' id='art' class='img img-responsive center-block '>
                                        <h5 class='text-center'>$Name</h5><hr/>
                                        <h6 class='text-center'><a class='btn btn-info' href='view.php?id=$ID'>View Profile</a> </h6>
                                       
</div>
                                         </div>";

            }


        } else {
            echo "False";
        }


        ?>


    </div>

</div>

<div class="row" id="footer">
    <div class="container">
        <h4 class="text-center">RFP MUSIC AND ARTS MINISTRY | Administration Area</h4>

    </div>
</div>


</body>
</html>

