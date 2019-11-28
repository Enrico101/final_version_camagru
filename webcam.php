<?php
    session_start();
    if (isset($_SESSION['Username']))
    {
        include ("connect.php");
        //for default value display
        $total_items_per_page_default = 5;
        $result_set_default = $db->query("SELECT * FROM camagru_users.user_images");
        $array_default = $result_set_default->fetchall();
        if (count($array_default) > 0)
        {
        $total_items_default = count($array_default);
        $total_pages_default = ceil($total_items_default / $total_items_per_page_default);
        if (isset($_SESSION['Username']))
        {
            $user = $_SESSION['Username'];
        }
            $total_items_per_page = 5;
            //get current page.
            if (isset($_GET['page']) && is_numeric($_GET['page']))
            {
                $page_no = $_GET['page'];
            }
            else
            {
                $page_no = $total_pages_default;
            }
            //Set the offset for the query
            $offset = ($page_no - 1) * $total_items_per_page;
            $statement = $db->query("SELECT ID, Image, Username FROM camagru_users.user_images LIMIT $offset, $total_items_per_page");
            if ($statement)
            {
                $items_array = $statement->fetchall();
                //var_dump($items_array);
                //get the total number of pages.
                $result_set = $db->query("SELECT * FROM camagru_users.user_images");
                $array = $result_set->fetchall();
                $total_items = count($array);
                $total_pages = ceil($total_items / $total_items_per_page);
            }
        }
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
                margin-top: 30px;
                position: relative;
                left: -10px;
            }
            .upload_button {
                position: relative;
                left: 385px;
                color: dimgrey;
                border-radius: 20px;
                font-size: 0px;
                height: 15px;
                width: 3px;
                background-color: dimgrey;
                border: 1px solid dimgrey;
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
                width: 887px;
                margin: auto;
                margin-top: 80px;
                text-align: center;
            }
            #pic_button {
            }
            #canvas {
                border: 2px solid grey;
            }
            #image {
                width: 400px;
                height: 300px;
                position: relative;
                top: 40px;
                left: 218px;
            }
               .user_gal {
                font-size: 30px;
                color: #2f2e2f;
                position: relative;
                top: 12px;
                margin-left: 15px;
                float: left;
            }
            #video {
            }
            .thumbnail {
                margin: auto;
            }
            .foot {
                font-size: 10px;
                margin-top: 80px;
                border-top: 1px solid dimgrey;
                padding: 5px;
                background-color: white;
                height: 700px;
            }
        </style>
    </head>
    <body>
        <header class="heading">
            <img class="logo" src="Pictures/Untitled.png">
            <a class="logout" href="log_user_off.php">logout</a>
        </header>
        <nav>
            <a class="cam" href="webcam.php">CAMERA</a>
            <a class="gal" href="pagination.php">GALLERY</a>
            <a class="user_gal" href="my_gallery.php">MY_GALLERY</a>
            <a class="user_gal" href="edit_info.php">EDIT_INFO</a>
        </nav>
        <div class="booth">
            <video id="video" width="400px" height="300px"></video>
            <canvas id="canvas" width="400px" height="300px"></canvas>
            <br />
            <a href="#" id="pic_button">take pic</a>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input class="upload" type="file" name="image" required>
                    <input class="upload" type="submit" name="submit">
                </form>
            <img id="image" src="" hidden>
        </div>
        <br />
        <div style="margin-left: 50%; margin-right: 50%;">
            <form action="process_img.php" method="post" onsubmit="upload_img();">
                <input id="img_sub" name="img" type="hidden" value="">
                 <input id="img_upload" type="submit" value="Upload">
             </form>
               <form action="process_tmp_img.php" method="post" onsubmit="tmp_upload();">
                <input  id="tmp_img" name="s1" type="hidden" value="">
                <input type="submit" value="Happy Emoji">
            </form>
            <form action="process_tmp_img.php" method="post" onsubmit="tmp_u2();">
                <input  id="tmp_i2" name="s2" type="hidden" value="">
                <input type="submit" value="Angry Emoji">
            </form>
            <form action="process_tmp_img.php" method="post" onsubmit="tmp_u3();">
                <input  id="tmp_i3" name="s3" type="hidden" value="">
                <input type="submit" value="Sick Emoji">
            </form>
        </div>
        <div class="thumbnail">
                <form action="" method="get">
                    <?php
                    if (count($array_default) > 0)
                    {
                        if ($statement)
                        {
                            $x = 1;
                            $y = 1;
                            $x = $total_pages;
                            while ($x >= 1)
                            {?>
                    <input class="upload_button" type="submit" value='<?php echo $x?>' name="page"/>
                    <?php
                            $x--;
                            }
                    ?>
                </form>
                <?php
                    $y = count($items_array);
                    $y--;
                    while ($y >= 0)
                    {
                        if ($_SESSION['Username'] == $items_array[$y]['Username'])
                        {
                ?>
                <a href='<?php echo $items_array[$y]['Image'];?>' target='_self'><img style="padding: 1px;"width="160px" height="156px" src='<?php echo $items_array[$y]['Image'];?>'></a>
                <?php
                        }
                     $y--;
                    }
                    }
                    }
                ?>
            </div>
        <script src="photo.js">
        </script>
    </body>
     <footer class="foot">
            @CAMAGRU BY ENRADCLI
        </footer>
</html>
<?php
    }
else
{
    header ("location: login.php");
}
?>