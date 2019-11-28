<?php
    session_start();
        include ("connect.php");
        //for default value display
        $total_items_per_page_default = 5;
        $result_set_default = $db->query("SELECT * FROM camagru_users.user_images;");
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
            $statement = $db->query("SELECT ID, Image, Username FROM camagru_users.user_images LIMIT $offset, $total_items_per_page;");
            $items_array = $statement->fetchall();
            //var_dump($items_array);
            //get the total number of pages.
            $result_set = $db->query("SELECT * FROM camagru_users.user_images;");
            $array = $result_set->fetchall();
            $total_items = count($array);
            $total_pages = ceil($total_items / $total_items_per_page);
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
                margin-top: 120px;
                position: relative;
                left: -210px;
            }
            .upload_button {
                margin-top: 120px;
                margin-left: 10px;
                position: relative;
                left: -230px;
                border-radius: 60px;
                width: 7px;
                color: #2f2e2f;
                background-color: #2f2e2f;
                border: 2px solid #2f2e2f;
                height: 19px;
                box-sizing: 40px;
            }
            .gal {
                font-size: 30px;
                color: #2f2e2f;
                position: relative;
                top: 12px;
                margin-left: 15px;
                float: left;
            }
               .user_gal {
                font-size: 30px;
                color: #2f2e2f;
                position: relative;
                top: 12px;
                margin-left: 15px;
                float: left;
            }
            .foot {
                font-size: 10px;
                margin-top: 470px;
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
            <?php 
            if (isset($_SESSION['Username']))
            { ?>
            <a class="logout" href="log_user_off.php">logout</a>
            <?php }?>
        </header>
        <body>
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
            <main>
                <form action="pagination.php" method="get">
                    <?php
                    if (count($array_default) > 0)
                    {
                    $x = 1;
                    $y = 1;
                    $x = $total_pages;
                    while ($x >= 1)
                    {?>
                    <input class="upload_button" type="submit" value='<?php echo $x?>' name="page"/>
                    <?php
                    $x--;
                    }?>
                </form>
                <?php
                    $y = count($items_array);
                    $y--;
                    while ($y >= 0)
                    {
                ?>
                <a href='comment_likes.php?pic=<?php echo $items_array[$y]['ID']?>' target='_self'><img style="padding: 1px;"width="160px" height="156px" src='<?php echo $items_array[$y]['Image'];?>'></a>
                <?php
                     $y--;
                    }
                    }
                ?>
            </main>
            <footer class="foot">
            @CAMAGRU BY ENRADCLI
        </footer>
        </body>
    </body>
</html>