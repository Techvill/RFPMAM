<?php

require 'InfinityFramework/DSN/DBH.php';
require_once 'InfinityFramework/MODEL/ArtistsModel.php';
require_once 'InfinityFramework/MODEL/SongsModel.php';
require_once 'InfinityFramework/MODEL/SpokenWordModel.php';
require_once 'InfinityFramework/MODEL/AlbumsModel.php';
require_once 'InfinityFramework/POHO/ArtistsAdapter.php';
require_once 'InfinityFramework/POHO/SongsAdapter.php';
require_once 'InfinityFramework/POHO/AlbumsAdapter.php';
require_once 'InfinityFramework/POHO/SpokenWordAdapter.php';
require_once 'InfinityFramework/MODEL/EventsModel.php';
require_once 'InfinityFramework/POHO/EventsAdapter.php';

if (isset($_POST['login'])) {
    $email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
    $password = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

    if (empty($email)) {
        $error[] = "Email address is blank";

    }
    if (empty($password)) {
        $error[] = "Password is blank";

    }

    if (empty($error)) {
        $PST = "SELECT * FROM management WHERE email ='$email'";

        $RST = DBH::getInstance()->CRUD($PST);


        if ($RST->rowCount() > 0) {
            foreach ($RST as $row) {
                $dbPassword = $row['password'];

                if (password_verify($password, $dbPassword)) {
                    @session_start();
                    $_SESSION['admin_email'] = $email;
                    header("location:dashboard/index.php");
                } else {
                    $error[] = "User credentials are wrong";
                }
            }
        } else {
            $error[] = "The details provided are wrong";
        }
    }
}

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>RFP Music and Arts | Manage </title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!--Cascading style sheet-->


    <!--End of css calling-->

    <!--online resources-->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <link rel="stylesheet" href="IUX/UserInterface/bootstrap.css"/>
    <link rel="stylesheet" href="IUX/UserInterface/infix.css"/>


    <script src="IUX/UserExperience/jquery-3.2.1.min.js"></script>
    <script src="IUX/UserExperience/jquery.bxslider.js"></script>
    <script src="IUX/UserExperience/bootstrap.js"></script>


    <meta property="og:site_name" content="TECULES - Technologically Customized Learning Systems. "/>
    <meta property="og:title"
          content="Technologically Customized Learning Systems, E-Learning, E-Books, Education For All."/>
    <meta property="og:description" content="Technologically Customized Learning Systems."/>
    <meta property="og:image" content="http://www.tecules.com/Tecules.jpg">
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.tecules.com"/>
    <style>
        fieldset, label {
            margin: 0;
            padding: 0;
        }

        .rating {
            border: none;
            float: left;
        }

        .rating > input {
            display: none;
        }

        .rating > label:before {
            margin: 5px;
            font-size: 1.25em;
            font-family: FontAwesome;
            display: inline-block;
            content: "\f005";
        }

        .rating > .half:before {
            content: "\f089";
            position: absolute;
        }

        .rating > label {
            color: #ddd;
            float: right;
        }

        .rating > input:checked ~ label,
        .rating:not(:checked) > label:hover,
        .rating:not(:checked) > label:hover ~ label {
            color: #FFD700;
        }

        .rating > input:checked + label:hover,
        .rating > input:checked ~ label:hover,
        .rating > label:hover ~ input:checked ~ label,
        .rating > input:checked ~ label:hover ~ label {
            color: #ff6b3d;
        }

    </style>

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
            <a class="navbar-brand" href="index">RFP MUSIC & ARTS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li><a href="artists/index.php">ARTISTS</a></li>
                <li><a href="albums/index.php">ALBUMS</a></li>
                <li><a href="songs/index.php">SONGS</a></li>
                <li><a href="spoken/index.php">SPOKEN WORD</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="lyrics/index.php">LYRICS</a></li>
                <li><a href="events/index.php">NEWS & EVENTS</a></li>
                <li><a href="trends/index.php">TRENDING</a></li>
                <li>

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
        <div class="col-md-6 col-md-offset-3" id="white-back">
            <ul class="pager">
                <li>
                    <a href="index.php">Back</a>
                </li>
            </ul>
            <h4 class="text-center">LOGIN NOW </h4>
            <hr/>
            <?php
            if (isset($error)) {
                foreach ($error as $er) {
                    echo "<p class='text-center text-danger'>$er</p>";
                }
            }
            ?>
            <form id="login-form" autocomplete="on" role="form" method="POST" action="" class="form-horizontal">


                <div class="form-group">
                    <label class="col-sm-4" for="inputEmail1">Email</label>
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="InputEmailSecond" value="" name='email'
                               placeholder="Enter Email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4" for="Password">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="Password" value="" name='password'
                               placeholder="Enter Password" required>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-4" for="Services"></label>
                    <div class="col-sm-6">
                        <button id="reg-btn" type="submit" name="login"
                                class="col-md-12 col-xs-12 btn btn-info">Login
                        </button>
                    </div>
                </div>
            </form>


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
            <p><a href="about.php">About</a></p>
            <p><a href="policy.php">Contacts</a></p>
            <p><a href="rights.php">Rights Policy</a></p>

        </div>


    </div>
    <div class="col-md-12">
        <hr/>
        <h6 class="text-center"> Raised For a Purpose | 2018 </h6>
    </div>
</div>

</body>
</html>
