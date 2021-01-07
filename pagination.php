<?php
    session_start();
        include ("connect.php");
        //for default value display
        $total_items_per_page_default = 5;
        $result_set_default = $db->query("SELECT * FROM camagru.images;");
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
            $statement = $db->query("SELECT Image_ID, Image, User_ID FROM camagru.Images LIMIT $offset, $total_items_per_page;");
            $items_array = $statement->fetchall();
            //var_dump($items_array);
            //get the total number of pages.
            $result_set = $db->query("SELECT * FROM camagru.Images;");
            $array = $result_set->fetchall();
            $total_items = count($array);
            $total_pages = ceil($total_items / $total_items_per_page);
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS\pagination.css">
    </head>
    <body>
        <header class="heading">
            <img class="logo" src="Pictures/Untitled.png">
            <?php 
            if (isset($_SESSION['Username']))
            { ?>
            <a class="logout" href="log_user_off.php">logout</a>
            <?php }?>
        </header>
            <nav>
                <?php if (isset($_SESSION['Username'])) { ?>
                <a class="cam" href="webcam.php">CAMERA</a>
                <a class="gal" href="pagination.php">GALLERY</a>
                <a class="user_gal" href="my_gallery.php">MY_GALLERY</a>
                <a class="user_gal" href="edit_info.php">EDIT_INFO</a>
                <?php } else {?>
                <a class="gal" href="pagination.php">GALLERY</a>
                <a class="gal" href="sign_up.php">SIGNUP</a>
                <a class="gal" href="login.php">LOGIN</a>
                <?php }?>
            </nav>
            <main id="content">
                    <form id="dot_buttons" action="pagination.php" method="get">
                        <?php
                        if (count($array_default) > 0)
                        {
                        $x = 1;
                        $y = 1;
                        $x = $total_pages;
                        if ($x >= 1)
                        {?>
                        <input class="upload_button" type="submit" value='<?php echo $x?>' name="page"/>
                        <?php
                        $x--;
                        }?>
                    </form>
                <div id="image_rack">
                    <?php
                        $y = count($items_array);
                        $y--;
                        while ($y >= 0)
                        {
                    ?>
                    <a href='comment_likes.php?pic=<?php echo $items_array[$y]['Image_ID']?>' target='_self'><img style="padding: 1px;"width="160px" height="156px" src='<?php echo $items_array[$y]['Image'];?>'></a>
                    <?php
                        $y--;
                        }
                        }
                    ?>
                </div>
            </main>
            <footer class="foot">
            @CAMAGRU BY ENRADCLI
        </footer>
        </body>
    </body>
</html>