<?php
    session_start();
    include ("connect.php");
    if (array_key_exists("s1", $_POST))
    {
        if (strlen($_POST['s1']) > 0)
        {
            $img = $_POST['s1'];
            $src = imagecreatefrompng("stickers/stickers_1.png");
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = 'tmp_img/img'.date('YmdHis').'.png';   
            file_put_contents($file, $data);
            $_SESSION['tmp_loc'] = $file;
            $dst = imagecreatefrompng($file);
            imagecopymerge($dst, $src, 0, 0, 0, 0, 50, 50, 100);
            imagepng($dst, $file);
            imagedestroy($dst);
            imagedestroy($src);
        }
        else
        {
            header("location: webcam.php");
        }
    }
    if (array_key_exists("s2", $_POST))
    {
        if (strlen($_POST['s2']) > 0)
        {
            $img = $_POST['s2'];
            $src = imagecreatefrompng("stickers/stickers_2.png");
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = 'tmp_img/img'.date('YmdHis').'.png';   
            file_put_contents($file, $data);
            $_SESSION['tmp_loc'] = $file;
            $dst = imagecreatefrompng($file);
            imagecopymerge($dst, $src, 0, 0, -360, 0, 400, 300, 100);
            imagepng($dst, $file);
            imagedestroy($dst);
            imagedestroy($src);
        }
        else
        {
            header("location: webcam.php");
        }
    }
   if (array_key_exists("s3", $_POST))
    {
        if (strlen($_POST['s3']) > 0)
        {
            $img = $_POST['s3'];
            $src = imagecreatefrompng("stickers/stickers_3.png");
            $img = str_replace('data:image/png;base64,', '', $img);
            $img = str_replace(' ', '+', $img);
            $data = base64_decode($img);
            $file = 'tmp_img/img'.date('YmdHis').'.png';   
            file_put_contents($file, $data);
            $_SESSION['tmp_loc'] = $file;
            $dst = imagecreatefrompng($file);
            imagecopymerge($dst, $src, 0, 0, -13, -260, 400, 400, 100);
            imagepng($dst, $file);
            imagedestroy($dst);
            imagedestroy($src);
        }
        else
        {
            header("location: webcam.php");
        }
    }
  /*  $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    $file = 'tmp_img/img'.date('YmdHis').'.png';   
    file_put_contents($file, $data);
    $_SESSION['tmp_loc'] = $file;
    $dst = imagecreatefrompng($file);
    elseif (array_key_exists("s2", $_POST))
        $src = imagecreatefrompng("stickers/stickers_2.png");
    elseif (array_key_exists("s3", $_POST))
        $src = imagecreatefrompng("stickers/stickers_3.png");
    if (array_key_exists("s1", $_POST))
        imagecopymerge($dst, $src, 0, 0, 0, 0, 50, 50, 100);
    elseif (array_key_exists("s2", $_POST))
        imagecopymerge($dst, $src, 0, 0, -360, 0, 400, 300, 100);
    elseif (array_key_exists("s3", $_POST))
        imagecopymerge($dst, $src, 0, 0, 10, 10, 50, 50, 100);
   // header("location: filter_up.php");
    imagepng($dst, $file);
    imagedestroy($dst);
    imagedestroy($src);*/
    if (array_key_exists("sticker", $_POST))
    {
        if (in_array("Happy Emoji", $_POST))
        {
            $dst = imagecreatefrompng($_SESSION['tmp_loc']);
            $src = imagecreatefrompng("stickers/stickers_1.png");
            imagecopymerge($dst, $src, 0, 0, 0, 0, 50, 50, 100);
            imagepng($dst, $_SESSION['tmp_loc']);
            imagedestroy($dst);
            imagedestroy($src);
        }
        elseif (in_array("Angry Emoji", $_POST))
        {
            $dst = imagecreatefrompng($_SESSION['tmp_loc']);
            $src = imagecreatefrompng("stickers/stickers_2.png");
            imagecopymerge($dst, $src, 0, 0, -360, 0, 400, 300, 100);
            imagepng($dst, $_SESSION['tmp_loc']);
            imagedestroy($dst);
            imagedestroy($src);
        }
        elseif (in_array("Sick Emoji", $_POST))
        {
            $dst = imagecreatefrompng($_SESSION['tmp_loc']);
            $src = imagecreatefrompng("stickers/stickers_3.png");
            imagecopymerge($dst, $src, 0, 0, -13, -260, 400, 400, 100);
            imagepng($dst, $_SESSION['tmp_loc']);
            imagedestroy($dst);
            imagedestroy($src);
        }
    }
    ///header("location: filter_1.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            .heading {
                border-bottom: 1px solid #cac6c6;
                background-color: white;
            }
            body {
                background-color: #f3f2f2;
                margin: 0px;
            }
            .logo {
                margin-left: 20px;
                width: 90px;
            }
            .user_name {
                float: right;
                margin-top: 35px;
                margin-right: 30px;
            }
            .logout {
                float: right;
                margin-top: 35px;
                margin-right: 45px;
            }
            .gallery {
                width: 40px;
                position: relative;
                left: 75px;
                top: -23px;
            }
            a:link {
                text-decoration: none;
                font-family: monospace;
                font-size: 17px;
            }
            .post {
                font-size: 30px;
                color: #2f2e2f;
                position: relative;
                top: 12px;
                margin-left: 15px;
                float: left;
            }
            .cam {
                font-size: 30px;
                color: #2f2e2f;
                position: relative;
                top: 12px;
                margin-left: 15px;
                float: left;
            }
            .upload {
                margin-top: 120px;
                position: relative;
                left: -210px;
            }
            .upload_button {
                margin-top: 120px;
                margin-left: 10px;
                position: relative;
                left: -230px;
            }
            .gal {
                font-size: 30px;
                color: #2f2e2f;
                position: relative;
                top: 12px;
                margin-left: 15px;
                float: left;
            }
            .booth {
                position: relative;
                top: 45px;
                left: -200px;
            }
            .pic_button {
                position: relative;
                top: 30px;
                left: -250px;
            }
            #canvas {
                width: 400px;
                height: 300px;
                position: relative;
                top: 40px;
                left: 218px;
                border: 2px solid black;
                display: none;
            }
            #image {
                width: 400px;
                height: 300px;
                position: relative;
                top: 40px;
                left: 218px;
                border: 2px solid black;
            }
            .img_filter {
                position: relative;
                left: -205px;
                top: 50px;
            }
            .upload_b {
                position: relative;
                top: 55px;
                left: 12px;
            }
            .go_back {
                position: relative;
                top: 55px;
                left: 60px;
            }
            .add {
                font-family: monospace;
                position: relative;
                top: 90px;
                left: 10px;
            }
        </style>
    </head>
    <body>
        <header class="heading">
            <img class="logo" src="Pictures/Untitled.png">
            <a href="user_gallery.php"><img class="gallery" src="Pictures/gallery.png"></a>
            <a class="logout" href="log_user_off.php">logout</a>
        </header>
        <nav>
            <a class="post" href="user_gallery.php">POST</a>
            <a class="cam" href="webcam.php">CAMERA</a>
            <a class="gal" href="pagination.php">GALLERY</a>
        </nav>
        <div>
            <?php
               // session_start();
                include "connect.php";
            ?>
            <img class="img_filter" src='<?php echo $_SESSION['tmp_loc'];?>'>
            <br />
            <a class="upload_b" href="upload_2.php">upload</a>
            <a class="go_back" href="webcam.php">Go Back</a>
        </div>
        <div>
            <form action="" method="post">
                <input class="add" name="sticker" type="submit" value="Happy Emoji">
            </form>
            <form action="" method="post">
                <input class="add" name="sticker" type="submit" value="Angry Emoji">
            </form>
            <form action="" method="post">
                <input class="add" name="sticker" type="submit" value="Sick Emoji">
            </form>
        </div>
    </body>
</html>
