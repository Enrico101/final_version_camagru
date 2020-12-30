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
        <link rel="stylesheet" href="CSS\process_tmp_img.css">
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
        <br>
        <br>
        <br>
        <div id="image_container">
            <?php
               // session_start();
                include "connect.php";
            ?>
            <img class="img_filter" src='<?php echo $_SESSION['tmp_loc'];?>'>
        </div>
        <br>
        <div id="button_container">
            <button id="just_button"><a href="upload_2.php"><img id="img_pref_2" src="Pictures\—Pngtree—file upload icon_4646955.png"></a></button>
            <br>
            <button  id="just_button"><a id="go_back" href="webcam.php">Go Back</a></button>
            <form action="" method="post">
                <button  id="just_button" name="sticker" type="submit" value="Happy Emoji"><img id="img_pref" src="stickers\stickers_1.png"></button>
            </form>
            <form action="" method="post">
                <button  id="just_button" name="sticker" type="submit" value="Angry Emoji"><img id="img_pref" src="stickers\stickers_2.png"></button>
            </form>
            <form action="" method="post">
                <button  id="just_button" name="sticker" type="submit" value="Sick Emoji"><img id="img_pref" src="stickers\stickers_3.png"></button>
            </form>
        </div>
    </body>
</html>
