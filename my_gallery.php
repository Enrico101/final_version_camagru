<?php
    session_start();
    if (isset($_SESSION['Username']))
    {
        include ("connect.php");
        if (isset($_POST['delete']))
        {
            $new_path = explode('/', $_SESSION['pic_loc']);
            rename($_SESSION['pic_loc'], "Trash/$new_path[1]");
            $result_set = $db->prepare("DELETE FROM camagru.comments WHERE Image_ID=?");
            $result_set->bindValue(1, $_SESSION['pic_id']);
            $result_set->execute();
            $result_set_1 = $db->prepare("DELETE FROM camagru.likes WHERE Image_ID=?");
            $result_set_1->bindValue(1, $_SESSION['pic_id']);
            $result_set_1->execute();
            $result_set_2 = $db->prepare("DELETE FROM camagru.images WHERE Image=?");
            $result_set_2->bindValue(1, $_SESSION['pic_loc']);
            $result_set_2->execute();
        }
        $user = $_SESSION['User_ID'];
        $total_items_per_page = 10;
        //get current page.
        if (isset($_GET['page']))
        {
            $page_no = $_GET['page'];
        }
        else
        {
            $page_no = 1;
        }
        //Set the offset for the query
        $statement = $db->prepare("SELECT Image_ID, Image FROM camagru.images WHERE User_ID=?");
        $statement->bindValue(1, $user);
        $statement->execute();
        $items_array = $statement->fetchall();
?><!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS\my_gallery.css">
    </head>
    <body>
        <header class="heading">
            <img class="logo" src="Pictures/Untitled.png">
            <a class="logout" href="log_user_off.php">logout</a>
        </header>
        <body>
            <nav>
                <a class="cam" href="webcam.php">CAMERA</a>
                <a class="gal" href="pagination.php">GALLERY</a>
                <a class="user_gal" href="my_gallery.php">MY_GALLERY</a>
                <a class="user_gal" href="edit_info.php">EDIT_INFO</a>
            </nav>
            <main>
                <?php
                    $y = 0;
                    while ($y < count($items_array))
                    {
                ?>
                <a href='comment_likes.php?pic=<?php echo $items_array[$y]['Image_ID']?>' target='_self'><img style="padding: 1px;"width="160px" height="156px" src='<?php echo $items_array[$y]['Image'];?>'></a>
                <?php
                     $y++;
                    }
                ?>
            </main>
        </body>
        <footer class="foot">
            @CAMAGRU BY ENRADCLI
        </footer>
    </body>
</html>
<?php
    }
    else
    {
       header("location: login.php");
    }
?>