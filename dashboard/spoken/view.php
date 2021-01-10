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
require_once '../image_config/config.php';
$ID = htmlentities($_GET['id'], ENT_QUOTES, "UTF-8");


if (isset($_POST['SaveNeImg'])) {


    $product_image = $_FILES['product_pic'];

    $product_image_name = $product_image['name'];


    $ext = strtolower(substr(strrchr($product_image_name, "."), 1));
    if ($validation_type == 1) {
        $file_info = getimagesize($_FILES['product_pic']['tmp_name']);

        if (empty($file_info)) // No Image?
        {
            $error [] = "The uploaded file for product image doesn't seem to be an image.";
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


    $new_prod_image = strtolower($_FILES['product_pic']['name']);
    $new_prod_image = round(microtime(true)) . '.' . end($new_prod_image);
    $new_prod_image = str_replace(' ', '-', $new_prod_image);
    $new_prod_image = substr($new_prod_image, 0, -strlen($ext));
    $new_prod_image = $new_prod_image . "." . $extension;


    $move_prod_pic = move_uploaded_file($product_image['tmp_name'], $spoken_pics . $new_prod_image);

    if ($move_prod_pic) {

        $PreparedStatement = "UPDATE spoken_word_artists SET pic='$new_prod_image' WHERE artist_id='$ID' ";
        $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);
        if ($ResultSet->rowCount() > 0) {
            $info[] = "Profile picture updated successfully";
        } else {
            $error[] = "There was an error. Try again.";
        }
    }

}
if (isset($_POST['SaveNewName'])) {


    $code = htmlentities($_POST['new_name'], ENT_QUOTES, "UTF-8");


    if (strlen($code) < 0) {
        $error[] = "Please check the new name is empty.";
    }


    if (!isset($error)) {

        $Q = "UPDATE spoken_word_artists SET artist_name ='$code' WHERE artist_id='$ID'";
        $RST = DBH::getInstance()->CRUD($Q);
        if ($RST->rowCount() > 0) {


            $info [] = "New artist name was updated successfully.";
        } else {
            $error[] = "There was an error updating.";
        }
    }


}
if (isset($_POST['new_details'])) {


    $code = htmlentities($_POST['desc'], ENT_QUOTES, "UTF-8");


    if (strlen($code) < 0) {
        $error[] = "Please check the new name is empty.";
    }


    if (!isset($error)) {

        $Q = "UPDATE spoken_word_artists SET bio ='$code' WHERE artist_id='$ID'";
        $RST = DBH::getInstance()->CRUD($Q);
        if ($RST->rowCount() > 0) {


            $info [] = "New artist bio was updated successfully.";
        } else {
            $error[] = "There was an error updating.";
        }
    }


}
if (isset($_POST['SaveTwitter'])) {


    $code = htmlentities($_POST['new_twitter'], ENT_QUOTES, "UTF-8");


    if (strlen($code) < 0) {
        $error[] = "Please check the new twitter URL is empty.";
    }


    if (!isset($error)) {

        $Q = "UPDATE spoken_word_artists SET twitter ='$code' WHERE artist_id='$ID'";
        $RST = DBH::getInstance()->CRUD($Q);
        if ($RST->rowCount() > 0) {


            $info [] = "New artist Twitter URL was updated successfully.";
        } else {
            $error[] = "There was an error updating.";
        }
    }


}
if (isset($_POST['SaveFacebook'])) {


    $code = htmlentities($_POST['fb'], ENT_QUOTES, "UTF-8");


    if (strlen($code) < 0) {
        $error[] = "Please check the new Facebook URL is empty.";
    }


    if (!isset($error)) {

        $Q = "UPDATE spoken_word_artists SET facebook ='$code' WHERE artist_id='$ID'";
        $RST = DBH::getInstance()->CRUD($Q);
        if ($RST->rowCount() > 0) {


            $info [] = "New artist facebook URL  was updated successfully.";
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
                <li><a href="../albums/index.php">SONGS & ALBUMS</a></li>
                <li class="active"><a href="index.php">SPOKEN WORD</a></li>


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
        <h4 class="text-center">RFP SPOKEN WORD ARTISTS</h4>

        <hr/>
        <ul class="pager">
            <li>
                <a href="index.php">Back</a>
            </li>
        </ul>


        <div class="col-md-4" id="">
            <div class="col-lg-12" id="white-back">
                <br/>
                <br/>
                <h4>PROFILE</h4>
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


                if (empty($ID)) {
                    echo "<h4 class='text-center '>The artist you are looking for was not found in our system</h4>";
                } else {
                    $PreparedStatement = "SELECT * FROM spoken_word_artists WHERE artist_id='$ID'";
                    $ResultSet = DBH::getInstance()->CRUD($PreparedStatement);


                    if ($ResultSet->rowCount() > 0) {


                        foreach ($ResultSet as $feed) {
                            $name = $feed['artist_name'];

                            $bio = $feed['bio'];
                            $photo = $feed['pic'];
                            $fb = $feed['facebook'];
                            $twitter = $feed['twitter'];
                            echo "<div class='col-md-8 col-md-offset-2' id='white-back'>";

                            echo " <img src='../../IMedia/spoken/$photo' id='profile-pic' class='img img-responsive center-block '><br/>
 <a data-toggle='modal' data-target='#UpdatePic'>Edit Picture</a>
                    <h5 class='text-center'>$name | <a  data-toggle='modal' data-target='#UpdateName'>Edit</a></h5> <hr/>
                    <p>$bio</p>  <a data-toggle='modal' data-target='#UpdateDetails'>Edit Bio</a><hr/>
                    <p class='text-center'> <a href='$fb' target='_blank'>Facebook Page</a> | <a data-toggle='modal' data-target='#UpdateFB'>Edit</a> </p>
                    <p> <a href='$twitter' target='_blank'>Twitter Page</a> | <a data-toggle='modal' data-target='#UpdateTwitter'>Edit</a> </p>
                 
                    <a href='delete.php?id=$ID&nm=$name' class='btn btn-danger'>Delete Artist</a> ";

                            echo "</div>";
                        }

                    } else {
                        echo "<h4>Artist Not Found</h4>";
                    }


                }


                ?>
            </div>
        </div>
        <div class="col-md-8" id="">
            <div class="col-lg-12" id="white-back">
                <br/>
                <br/>
                <h4>SPOKEN WORD SONGS BY ARTIST</h4>
                <hr/>
                <?php


                $ST = "SELECT * FROM spoken_words WHERE artist_id ='$ID'";

                $RS = DBH::getInstance()->CRUD($ST);

                if ($RS->rowCount() > 0) {
                    echo " <table class=\"table table-striped\" id='white-back'><thead>
                                    <tr class=\"text-primary\">
                                   
                                        <th>Song Name</th>
                                        <th> Downloads</th>
                                
                                        <th>Delete</th>
                                      
                                       
                                    </tr>
                                    </thead><tbody>";

                    foreach ($RS as $feed) {

                        $artist_id = $feed['artist_id'];
                        $name = $feed['song_name'];
                        $downloads = $feed['downloads'];
                        $song_id = $feed['id'];
                        $song_url = $feed['url'];
                        $lyrics = $feed['lyrics'];
                        echo " <tr>
                        
                        <th scope=\"row\">$name</th>
                        <td>$downloads</td>
                        <td><a href='del_single.php?id=$song_id&nm=$name' >Delete</a></td>
                        
                      
                    </tr>";

                    }
                    echo "</tbody></table>";
                } else {
                    echo "There are no spoken word songs for this artist";
                }

                ?>
            </div>
        </div>


    </div>


    <div id="UpdatePic" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Profile Picture</h4>
                </div>
                <div class="modal-body">
                    <form role='form' enctype="multipart/form-data" method='post'>

                        <div class='form-group'>
                            <label>New Picture</label>
                            <input type='file' name='product_pic' value='' class='form-control'
                                   placeholder='New Product Name'>
                        </div>


                        <div class='row'>


                            <div class='col-xs-12'>
                                <button type='submit' name='SaveNeImg'
                                        class='btn btn-primary btn-block btn-flat'>
                                    Update
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div id="UpdateName" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Artist Name</h4>
                </div>
                <div class="modal-body">
                    <form role='form' method='post'>

                        <div class='form-group'>
                            <label>New Name</label>
                            <input type='text' name='new_name' value='' class='form-control'
                                   placeholder='New Artist Name'>
                        </div>


                        <div class='row'>


                            <div class='col-xs-12'>
                                <button type='submit' name='SaveNewName'
                                        class='btn btn-primary btn-block btn-flat'>
                                    Update
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div id="UpdateTwitter" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Twitter URL</h4>
                </div>
                <div class="modal-body">
                    <form role='form' method='post'>

                        <div class='form-group'>
                            <label>New Twitter URL</label>
                            <input type='url' name='new_twitter' value='' class='form-control'
                                   placeholder='New twitter'>
                        </div>


                        <div class='row'>


                            <div class='col-xs-12'>
                                <button type='submit' name='SaveTwitter'
                                        class='btn btn-primary btn-block btn-flat'>
                                    Update
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div id="UpdateFB" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Facebook URL</h4>
                </div>
                <div class="modal-body">
                    <form role='form' method='post'>

                        <div class='form-group'>
                            <label>New Facebook URL</label>
                            <input type='url' name='fb' value='' class='form-control'
                                   placeholder='New Facebook'>
                        </div>


                        <div class='row'>


                            <div class='col-xs-12'>
                                <button type='submit' name='SaveFacebook'
                                        class='btn btn-primary btn-block btn-flat'>
                                    Update
                                </button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div id="UpdateDetails" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Update Artist Bio</h4>
                </div>
                <div class="modal-body">
                    <form role='form' method='post'>

                        <div class='form-group'>
                            <label>New Bio</label>
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

