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
require_once '../../InfinityFramework/MODEL/EventsModel.php';

require_once '../../InfinityFramework/POHO/EventsAdapter.php';

require_once '../image_config/config.php';

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

                <li><a href="../lyrics/index.php">LYRICS</a></li>
                <li class="active"><a href="index.php">NEWS & EVENTS</a></li>
                <li><a href="../trends/index.php">TRENDING</a></li>
                <li><a href="../logout.php">LOGOUT</a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container-fluid">
    <div class="col-md-12 text-center">
        <h4 class="text-center">NEWS AND UPDATES</h4>
        <ul class="pager">
            <li>
                <a href="index.php">Back</a>
            </li>
        </ul>

        <hr/>
        <div class="col-md-8 col-md-offset-2" id="white-back">
            <?php

            if (isset($_POST['save'])) {
                $Name = htmlentities($_POST['name'], ENT_QUOTES, "UTF-8");
                $content = htmlentities($_POST['content'], ENT_QUOTES, "UTF-8");
                $date = htmlentities($_POST['date'], ENT_QUOTES, "UTF-8");


                $pro_image = $_FILES['profile'];
                $profile = $pro_image['name'];
                $profile_image_name = $pro_image['name'];


                $ext = strtolower(substr(strrchr($profile_image_name, "."), 1));


                if ($validation_type == 1) {
                    $file_info = getimagesize($_FILES['profile']['tmp_name']);

                    if (empty($file_info)) // No Image?
                    {
                        $error [] = "The uploaded file image doesn't seem to be an image.";
                    } else // An Image?
                    {
                        $file_mime = $file_info['mime'];

                        if ($ext == 'jpc' || $ext == 'jpx' || $ext == 'jb2') {
                            $extension = $ext;
                        } else {
                            $extension = ($mime[$file_mime] == 'jpeg') ? 'jpg' : $mime[$file_mime];
                        }

                        if (!$extension) {
                            $extension = '';
                            $file_name = str_replace('.', '', $file_name);
                        }
                    }
                } else if ($validation_type == 2) {
                    if (!in_array($ext, $image_extensions_allowed)) {
                        $exts = implode(', ', $image_extensions_allowed);
                        $error [] = "You must upload a file with one of the following extensions: " . $exts;
                    }

                    $extension = $ext;
                }

                $ST = "SELECT * FROM news_events WHERE  title='$Name'";
                $RS = DBH::getInstance()->CRUD($ST);

                if ($RS->rowCount() > 0) {
                    {
                        $error[] = "Duplicate entry. There is a post with that title already in the system";
                    }
                }
                if (empty($error)) {

                    $profile_picture_url = strtolower($_FILES['profile']['name']);
                    $profile_picture_url = round(microtime(true)) . '.' . end($profile_picture_url);
                    $profile_picture_url = str_replace(' ', '-', $profile_picture_url);
                    $profile_picture_url = substr($profile_picture_url, 0, -strlen($ext));
                    $profile_picture_url = $profile_picture_url . "." . $extension;

                    $move_file_pic = move_uploaded_file($pro_image['tmp_name'], $news . $profile_picture_url);
                    if ($move_file_pic) {

                        $INSERT = "INSERT INTO news_events(title,content,date,pic) VALUES ('$Name','$content','$date','$profile_picture_url')";
                        $RESULT = DBH::getInstance()->CRUD($INSERT);
                        if ($RESULT->rowCount() > 0) {
                            $info[] = "Post added successfully!!";
                        } else {
                            $error[] = "There was an error in adding a new post. Contact system admin.";
                        }

                    }

                }


                //                ArtistsAdapter::SaveNewArtist();

            }


            if (isset($error)) {

                foreach ($error as $t) {
                    echo "<p class='text-center text-danger'><strong>$t</strong></p>";
                }
            }
            if (isset($info)) {

                foreach ($info as $t) {
                    echo "<p class='text-info text-danger'>$t</p>";
                }
            } ?>
            <form id="login-form" autocomplete="on" enctype="multipart/form-data" role="form" method="POST" action=""
                  class="form-horizontal">


                <div class="form-group">
                    <label class="col-sm-4" for="inputEmail1">Event/Post Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="InputEmailSecond" value="" name='name'
                               placeholder="eg Launch of new album" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4" for="inputEmail1">Event/Post Date</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="InputEmailSecond" value="" name='date'
                               placeholder="eg Singles" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4" for="inputEmail1">Event/Post Pic</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="InputEmailSecond" value="" name='profile'
                               required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-4" for="inputEmail1">Event/Post Content</label>
                    <div class="col-sm-8">

                        <textarea name='content' placeholder="" class='form-control' rows='8'>

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
<div class="clearfix"></div>

<div class="row" id="footer">
    <div class="container">
        <h4 class="text-center">RFP MUSIC AND ARTS MINISTRY | Administration Area</h4>

    </div>
</div>


</body>
</html>

