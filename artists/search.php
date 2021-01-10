<?php
/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 28-Feb-18
 * Time: 3:44 AM
 */


require '../InfinityFramework/DSN/DBH.php';
require_once '../InfinityFramework/MODEL/ArtistsModel.php';
require_once '../InfinityFramework/MODEL/SongsModel.php';
require_once '../InfinityFramework/MODEL/AlbumsModel.php';
require_once '../InfinityFramework/POHO/ArtistsAdapter.php';
require_once '../InfinityFramework/POHO/SongsAdapter.php';
require_once '../InfinityFramework/POHO/AlbumsAdapter.php';

$KEY = htmlentities($_GET['search'], ENT_QUOTES, "UTF-8");
if (!isset($KEY) && empty($KEY)) {
    $error[] = "You did not enter specify what to search for.";
}


?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>RFP Music And Arts </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="../IMedia/logo.png" rel="icon" type="image/png"/>
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
                <li class="active"><a href="index.php">ARTISTS</a></li>
                <li><a href="../albums/index.php">ALBUMS</a></li>
                <li><a href="../songs/index.php">SONGS</a></li>
                <li><a href="../genres/index.php">GENRES</a></li>
                <li><a href="../spoken/index.php">SPOKEN WORD</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../lyrics/index.php">LYRICS</a></li>
                <li><a href="../events/index.php">NEWS & EVENTS</a></li>
                <li><a href="../trends/index.php">TRENDING</a></li>
                <li>
                    <br/>
                    <form class="form-inline" action="search.php" method="GET">

                        <input type="text" name="search" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
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


<div class="col-md-12">
    <div class="col-md-10 col-md-offset-1">
        <ul class="pager">
            <li>
                <a href="index.php">Back</a>
            </li>
        </ul>
        <h4 class="text-center">Search Results for |<strong> <?php

                echo $KEY;
                ?></strong></h4>
        <hr/>

        <?php

        $PST = "SELECT *  FROM artists WHERE NAME LIKE'%$KEY%';";

        $RST = DBH::getInstance()->CRUD($PST);

        if ($RST->rowCount() > 0) {


            foreach ($RST as $row) {


                $Name = $row['name'];
                $Photo = $row['profile_pic'];
                $ID = $row['artists_id'];
                echo "<div class='col-md-3'>
                    <div class='col-md-12' id='white-back'>
                    <img src='../IMedia/artists_pics/$Photo' id='profile-pic' class='img img-responsive center-block '>
                    <h5 class='text-center'>$Name</h5><hr/>
                    <h6 class='text-center'><a class='btn btn-info' href='view.php?id=$ID'>View Profile</a> </h6>
                   
                </div></div>";


            }


        } else {
            echo "<h4 class='text-center text-warning'>Hello, we did not find anything matching your search</h4>";
        }

        ?>

        <div class="clearfix"></div>

    </div>

</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 row" id="white-back">
        <h4 class="text-center">RFP MUSIC ARTISTS</h4>
        <div class="col-md-4 col-md-offset-4" id="white-back">
            <form class="form-horizontal text-center" action="" method="POST">
                <br/>
                <select required class="select form-control" id="" name="sort_method">
                    <option>Sort Method</option>
                    <option value="new">New Artists</option>
                    <option value="most_alb">Most Albums</option>
                    <option value="most_songs">Most Songs</option>
                    <option value="most_downloads">Most Downloads</option>
                    <option value="trending">Trending</option>
                </select>


                <button class="btn btn-primary mb-2" name="sort" type="">
                    <span><i class="fa fa-sort" aria-hidden="true"></i></span>
                </button>
            </form>
        </div>


        <div class="col-md-12">
            <hr/>
            <?php

            if (isset($_POST['sort'])) {

                $sort = htmlentities($_POST['sort_method'], ENT_QUOTES, "UTF-8");

                switch ($sort) {
                    case "new":
                        ArtistsAdapter::GetNewArtists();
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
                                        <img src='../IMedia/artists_pics/$Photo' id='profile-pic' class='img img-responsive center-block'>
                                        <h5 class='text-center'>$Name</h5><hr/>
                                        <h6 class='text-center'><a class='btn btn-info' href='view.php?id=$ID'>View Profile</a> </h6>
                                        </div> </div>";
                            }
                            echo "<a href='all.php?type=new' class='btn btn-primary btn-sm'>VIEW ALL</a>";
                        } else {
                            echo "<h4 class='text-center text-warning'>There are no new artists!.</h4>";
                        }
                        break;

                    case "most_alb":
                        ArtistsAdapter::GetMostAlbumsArtists();
                        $Res = ArtistsModel::getResult();
                        if ($Res == "TRUE") {

                            echo " <table class=\"table table-striped\"><thead>
                                    <tr class=\"text-primary\">
                                        <th>Artist Name</th>
                                        <th>Total Albums</th>
                                        <th>Total Downloads</th>
                                        <th>View Artist Profile</th>
                                      
                                       
                                    </tr>
                                    </thead><tbody>";
                            $JSON = ArtistsModel::getJSONFEED();
                            $DECODED_JSON = json_decode($JSON, true);
                            foreach ($DECODED_JSON as $item) {
                                $Name = $item['name'];
                                $Photo = $item['profile_pic'];
                                $ID = $item['artists_id'];

                                $Name = $item['name'];
                                $Photo = $item['profile_pic'];
                                $ID = $item['artists_id'];
                                $albs = $item['albums'];
                                $dls = $item['downloads_alb'];

                                echo " <tr>
                                            <th scope=\"row\">$Name</th>
                                            <td>$albs</td>
                                            <td>$dls</td>
                                           
                                            <th scope=\"col\"><a href='view.php?id=$ID'><i class=\"fa fa-user\" aria-hidden=\"true\"></i></a></th>
                                            
                                          
                                        </tr>";
                            }
                            echo "</tbody></table>
                                            <a href='all.php?type=most_albs' class='btn btn-primary btn-sm'>VIEW ALL</a>";
                        } else {
                            echo "<h4 class='text-center text-warning'>There are no new artists!.</h4>";
                        }
                        break;
                    case "most_songs":
                        ArtistsAdapter::GetMostSongsArtists();
                        $Res = ArtistsModel::getResult();
                        if ($Res == "TRUE") {
                            echo " <table class=\"table table-striped\"><thead>
                                    <tr class=\"text-primary\">
                                        <th>Artist Name</th>
                                        <th>Total Songs</th>
                                        <th>Total Downloads</th>
                                        <th>View Artist Profile</th>
                                      
                                       
                                    </tr>
                                    </thead><tbody>";
                            $JSON = ArtistsModel::getJSONFEED();
                            $DECODED_JSON = json_decode($JSON, true);
                            foreach ($DECODED_JSON as $item) {
                                $Name = $item['name'];
                                $Photo = $item['profile_pic'];
                                $ID = $item['artists_id'];
                                $songs = $item['songs'];
                                $dls = $item['downloads'];

                                echo " <tr>
                                            <th scope=\"row\">$Name</th>
                                            <td>$songs</td>
                                            <td>$dls</td>
                                           
                                            <th scope=\"col\"><a href='view.php?id=$ID'><i class=\"fa fa-user\" aria-hidden=\"true\"></i></a></th>
                                            
                                          
                                        </tr>";
                            }
                            echo "</tbody></table>
                                    <a href='all.php?type=most_songs' class='btn btn-primary btn-sm'>VIEW ALL</a> ";
                        } else {
                            echo "<h4 class='text-center text-warning'>There are no new artists!.</h4>";
                        }
                        break;
                    case "most_downloads":
                        ArtistsAdapter::GetMostDownloadsArtists();
                        $Res = ArtistsModel::getResult();
                        if ($Res == "TRUE") {
                            echo " <table class=\"table table-striped\"><thead>
                                    <tr class=\"text-primary\">
                                        <th>Artist Name</th>
                                        <th>Song Downloads</th>
                                        <th>Album Downloads</th>
                                        <th>View Artist Profile</th>
                                      
                                       
                                    </tr>
                                    </thead><tbody>";
                            $JSON = ArtistsModel::getJSONFEED();
                            $DECODED_JSON = json_decode($JSON, true);
                            foreach ($DECODED_JSON as $item) {
                                $Name = $item['name'];
                                $Photo = $item['profile_pic'];
                                $ID = $item['artists_id'];

                                $downloads_songs = $item['downloads'];
                                $downloads_alb = $item['downloads_alb'];

                                echo " <tr>
                                            <th scope=\"row\">$Name</th>
                                            <td>$downloads_songs</td>
                                            <td>$downloads_alb</td>
                                           
                                            <th scope=\"col\"><a href='view.php?id=$ID'><i class=\"fa fa-user\" aria-hidden=\"true\"></i></a></th>
                                            
                                          
                                        </tr>";

                            }

                            echo "</tbody></table>
                                        <a href='all.php?type=most_downloads' class='btn btn-primary btn-sm'>VIEW ALL</a>";
                        } else {
                            echo "<h4 class='text-center text-warning'>There are no new artists!.</h4>";
                        }
                        break;


                }
            } else {

                ArtistsAdapter::GetAllArtists();

                $Res = ArtistsModel::getResult();

                if ($Res == "TRUE") {
                    $JSON = ArtistsModel::getJSONFEED();

                    $DECODED_JSON = json_decode($JSON, true);

                    foreach ($DECODED_JSON as $item) {
                        $Name = $item['name'];
                        $Photo = $item['profile_pic'];
                        $ID = $item['artists_id'];

                        echo "<div class='col-md-3' id=''>
                                         <div class='col-md-12' id='box-shadow'> 
                                        <img src='../IMedia/artists_pics/$Photo' id='profile-pic' class='img img-responsive center-block'>
                                        <h5 class='text-center'>$Name</h5><hr/>
                                        <h6 class='text-center'><a class='btn btn-info' href='view.php?id=$ID'>View Profile</a> </h6>
                                       
                                        </div> </div>";

                    }
                    echo "<div class='col-md-12'><br/><p class='text-center'><a href='all.php?type=az' class='btn btn-primary btn-sm'>VIEW ALL</a></p></div>";


                } else {
                    echo "<h4 class='text-center'>There are no artists available</h4>";
                }

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


