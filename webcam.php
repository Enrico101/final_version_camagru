<?php
    session_start();
    if (isset($_SESSION['Username']))
    {
        include ("connect.php");
        //for default value display
        $total_items_per_page_default = 5;
        $result_set_default = $db->query("SELECT * FROM camagru.images");
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
            $statement = $db->query("SELECT Image_ID, Image, User_ID FROM camagru.images LIMIT $offset, $total_items_per_page");
            if ($statement)
            {
                $items_array = $statement->fetchall();
                //var_dump($items_array);
                //get the total number of pages.
                $result_set = $db->query("SELECT * FROM camagru.images");
                $array = $result_set->fetchall();
                $total_items = count($array);
                $total_pages = ceil($total_items / $total_items_per_page);
            }
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS\webcam.css">
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
            <button id="pic_button"><a href="#"><img id="img-cam" src="Pictures\—Pngtree—camera glyph black icon_3754744.png"></a></button>
            <p id="OR">OR</p>
            <form action="upload.php" method="post" enctype="multipart/form-data">
                    <input id="external_source" class="upload" type="file" name="image" required>
                    <input class="upload" type="submit" name="submit">
                </form>
            <img id="image" src="" hidden>
        </div>
        <br />
        <div >
            <div id="booth_2">
                <form action="process_img.php" method="post" onsubmit="upload_img();">
                    <input id="img_sub" name="img" type="hidden" value="">
                    <button id="img_upload" type="submit" value="Upload"><img id="img-cam" src="Pictures\—Pngtree—file upload icon_4646955.png"></img></button>
                </form>
                <br />
                <form action="process_tmp_img.php" method="post" onsubmit="tmp_upload();">
                    <input  id="tmp_img" name="s1" type="hidden" value="">
                    <button id="tmp_buttons" type="submit"><img id="img-sticker" src="stickers\stickers_1.png"></img></button>
                </form>
                <br />
                <form action="process_tmp_img.php" method="post" onsubmit="tmp_u2();">
                    <input  id="tmp_i2" name="s2" type="hidden" value="">
                    <button id="tmp_buttons" type="submit"><img id="img-sticker" src="stickers\stickers_2.png"></img></button>
                </form>
                <br/>
                <form action="process_tmp_img.php" method="post" onsubmit="tmp_u3();">
                    <input  id="tmp_i3" name="s3" type="hidden" value="">
                    <button id="tmp_buttons" type="submit"><img id="img-sticker" src="stickers\stickers_3.png"></img></button>
                </form>
            </div>
        </div>
        <br>
        <div id="booth_3">
                <form style="margin-left: 30px" action="" method="get">
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
                <div id="image_rack">
                    <?php
                        $y = count($items_array);
                        $y--;
                        while ($y >= 0)
                        {
                            if ($_SESSION['User_ID'] == $items_array[$y]['User_ID'])
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