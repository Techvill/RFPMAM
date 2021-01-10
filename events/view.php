<?php
/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 26-Jan-18
 * Time: 2:41 AM
 */

require '../InfinityFramework/DSN/DBH.php';
require_once '../InfinityFramework/MODEL/EventsModel.php';

require_once '../InfinityFramework/POHO/EventsAdapter.php';

$ID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");


$PreparedStatement = "SELECT * FROM news_events WHERE id='$ID'";

$ResultSet = DBH::getInstance()->CRUD($PreparedStatement);

$Title = "";
$pic = "";
if ($ResultSet->rowCount() > 0) {

    foreach ($ResultSet as $item) {
        $Title = $item['title'];

        $pic = $item['pic'];
    }
  
}
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo "$Title | RFP Music and Arts " ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php

    echo "<link href='../IMedia/events/$pic' rel='icon' type='image/png'/>";

    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta property="og:site_name" content="Raised For a Purpose Music and Arts Ministry. "/>
    <meta property="og:title"
          content="<?php echo "$Title | RFP Music and Arts " ?>"/>
    <meta property="og:description"
          content="<?php echo "$Title | RFP Music and Arts " ?>"/>
    <?php

    echo "<meta property='og:image' content='http://www.rfpmam.com/IMedia/events/$pic'/>";
    echo "<meta property='og:url' content='http://www.rfpmam.com/events/view.php?id=$ID'/>";

    ?>
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
                <li><a href="../genres/index.php">GENRES</a></li>
                <li><a href="../spoken/index.php">SPOKEN WORD</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../lyrics/index.php">LYRICS</a></li>
                <li class="active"><a href="index.php">NEWS & EVENTS</a></li>
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
        <div class="col-md-12 text-center">
            <h4 class="text-center">NEWS AND UPDATES</h4>
            <ul class="pager">
                <li>
                    <a href="index.php">BAck</a>
                </li>
            </ul>

            <hr/>

            <?php

            EventsAdapter::GetNewsByID($ID);
            if (EventsModel::getResult() == "TRUE") {


                $Decoded = json_decode(EventsModel::getJSONFEED(), true);

                foreach ($Decoded as $item) {
                    $ID = $item['id'];
                    $Title = $item['title'];
                    $Content = $item['content'];
                    $Date = $item['date'];
                    $pic = $item['pic'];

                    echo "<div class='col-md-12' >
                    <div id='white-back'>
                    <h2 class='text-center'>$Title</h2>
                          <hr/>
                       <img src='../IMedia/events/$pic' id='news_event' class='img img-responsive center-block'>
              
                        <pre class='text-justify'>$Content</pre>
                    
                    
                    
                    </div>
                 
                   
                </div>";

                }


            } else {
                echo "<div class='col-md-4 col-md-offset-4' id='white-back'>
                        <h4 class='text-center text-warning'>No news and updates available.</h4>
                      </div>";
            }

            ?>


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

