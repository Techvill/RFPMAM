<?php
/**
 * Created by PhpStorm.
 * User: Joeln
 * Date: 09-Mar-18
 * Time: 3:10 AM
 */
require 'mail/PHPMailerAutoload.php';

?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title>Raised For A Purpose | Feedback</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="IMedia/logo.png" rel="icon" type="image/png"/>
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
            <a class="navbar-brand" id="back" href="index">
                <!--                RFP MUSIC & ARTS-->

                <!--                <img src="IMedia/logo.png" id="logo" class="img img-responsive" alt="DVM Logo">-->
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                <li><a href="artists/index.php">ARTISTS</a></li>
                <li><a href="albums/index.php">ALBUMS</a></li>
                <li><a href="songs/index.php">SONGS</a></li>
                <li><a href="genres/index.php">GENRES</a></li>
                <li><a href="spoken/index.php">SPOKEN WORD</a></li>


            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="lyrics/index.php">LYRICS</a></li>
                <li><a href="events/index.php">NEWS & EVENTS</a></li>
                <li><a href="trends/index.php">TRENDING</a></li>
                <li>
                    <br/>
                    <form class="form-inline" action="search.php" method="GET">

                        <input type="text" name="search" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2"
                               placeholder="Holy Spirit">


                        <button name="" class="btn btn-primary mb-2" type="">
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
        <div class="col-md-8 col-md-offset-2" id="white-back">
            <h4 class="text-center">Provide Us With Feedback.</h4>
            <hr/>


            <div class="col-md-offset-2">
                <?php

                if (isset($_POST['sendMsg'])) {

                    $FullName = htmlentities($_POST['fname'], ENT_QUOTES, "UTF-8");
                    $Email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
                    $Message = htmlentities($_POST['msg'], ENT_QUOTES, "UTF-8");


                    if ($FullName < 0) {
                        $Error [] = "Full name is empty";
                    }
                    if ($Email < 0) {
                        $Error [] = "Email is empty";
                    }
                    if ($Message < 0) {
                        $Error [] = "Your feedback message is empty";
                    }

                    if (empty($Error)) {
                        $mail = new PHPMailer;

                        //From email address and name
                        $mail->From = $Email;
                        $mail->FromName = "Feedback Message From {$FullName}";

                        //To address and name


                        $mail->addAddress("feedback@rfpmam.com"); //Recipient name is optional

                        //Address to which recipient will reply
                        $mail->addReplyTo($Email, "Reply");
                        //Send HTML or Plain Text email
                        $mail->isHTML(true);

                        $mail->Subject = "Feedback Message From {$FullName}";
                        $mail->Body =
                            "<p>Hello <strong>RFP MAM</strong> you have a new feedback message from {$FullName}</p>
                            <p>The person wrote the following  message :<br/><strong>
                        {$Message}
                    </strong>
                    </p>";


                        $mail->AltBody = "If you cant view this email please open the email with an app or a pc browser.";

                        if (!$mail->send()) {
                            $Error[] = "<p class=\"user_error home-text\">There was an error in processing your request.</p>";
                        } else {

                            $mail = new PHPMailer;

                            //From email address and name
                            $mail->From = "feedback@rfpmam.com";
                            $mail->FromName = "Raised For a Purpose";

                            //To address and name

                            $mail->addAddress($Email); //Recipient name is optional

                            //Address to which recipient will reply
                            $mail->addReplyTo("feedback@rfpmam.com", "Reply");
                            //Send HTML or Plain Text email
                            $mail->isHTML(true);

                            $mail->Subject = "Raised For a Purpose";
                            $mail->Body = "<div><p><b>Feedback Received</b></p><br/>"
                                . ""
                                . "<p>Thank you for your feedback.</p>";
                            $mail->AltBody = "Thank you for your feedback";

                            if (!$mail->send()) {
                                $Error[] = "<p class=\"user_error home-text\">There was an error in processing your request.</p>";
                            } else {

                                echo "<h5 class='text-center text-success'> We have received your feedback</h5>";

                            }
                        }
                    }

                    if (isset($Error)) {
                        echo "<p class='text-center text-danger'>$Error</p>";
                    }

                }


                ?>
                <form id="reg-user" autocomplete="on" role="form" method="POST" action=""
                      class="form-horizontal">


                    <div class="form-group">
                        <label class="col-sm-2" for="contact_phone">Full Name</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="" value="" name='fname'
                                   placeholder="Enter Full Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="inputEmail1">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" id="" value="" name='email'
                                   placeholder="Enter Email" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2" for="inputEmail1">Your Message</label>
                        <div class="col-sm-7">
                           <textarea name="msg" class="form-control" rows="6">

                           </textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2" for="TextArea"></label>
                        <div class="col-sm-7">
                            <button id="reg-btn" type="" name="sendMsg" class="col-xs-12 btn btn-success">
                                Send Feedback
                            </button>
                        </div>
                    </div>
                </form>

            </div>

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

