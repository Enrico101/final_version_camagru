<?php
    include ("connect.php");
   // include ("delete_info.php");
    session_start();
    
    //$_SESSION['pic_loc'] = $_GET['pic'];
    //for deleting images
        $set = $db->prepare("SELECT image FROM camagru_users.user_images WHERE ID=?");
        $set->bindValue(1, $_GET['pic']);
        $set->execute();
        $image_delete_loc = $set->fetch();
        $_SESSION['pic_loc'] = $image_delete_loc['image'];
    //
    if (isset($_POST['comment']))
    {
        //mailing the notification on comment.
        //$image = $_GET['pic'];
        $result_sets = $db->prepare("SELECT image FROM camagru_users.user_images WHERE ID=?");
        $result_sets->bindValue(1, $_GET['pic']);
        $result_sets->execute();
        $image = $result_sets->fetch();
        $result_set = $db->prepare("SELECT Username FROM camagru_users.user_images WHERE Image=?");
        $result_set->bindValue(1, $image['image']);
        $result_set->execute();
        $image_owner = $result_set->fetch();
        $result_set_01 = $db->prepare("SELECT Email FROM camagru_users.users WHERE Username=?");
        $result_set_01->bindValue(1, $image_owner[0]);
        $result_set_01->execute();
        $email = $result_set_01->fetch();
        $commentor = $_SESSION['Username'];
        $subject = "Recent activity";
        $msg = "$commentor has recently commented on your image";
        mail($email[0], $subject, $msg);
        //storing comments in database.
        $result = $db->prepare("INSERT INTO camagru_users.user_comments (`Comment`, `Username`, `Image`) VALUES (?, ?, ?)");
        $result->bindValue(1, $_POST['comment']);
        $result->bindValue(2, $_SESSION['Username']);
        $result->bindValue(3, $image['image']);
        $result->execute();
    }
    //$img = $_GET['pic'];
    $result_sets = $db->prepare("SELECT image FROM camagru_users.user_images WHERE ID=?");
    $result_sets->bindValue(1, $_GET['pic']);
    $result_sets->execute();
    $image_path_likes = $result_sets->fetch();
    $img = $image_path_likes['image'];
    $result_01 = $db->query("SELECT * FROM camagru_users.user_likes WHERE Image='$img'");
    $amount = $result_01->fetchall();
    $likes = count($amount);
    if (isset($_POST['like']))
    {
        //sending likes notification.
        //$image = $_GET['pic'];
        $result_sets = $db->prepare("SELECT image FROM camagru_users.user_images WHERE ID=?");
        $result_sets->bindValue(1, $_GET['pic']);
        $result_sets->execute();
        $image_path = $result_sets->fetch();
        $image = $image_path['image'];
        $result_set = $db->prepare("SELECT Username FROM camagru_users.user_images WHERE Image=?");
        $result_set->bindValue(1, $image);
        $result_set->execute();
        $image_owner = $result_set->fetch();
        $result_set_01 = $db->prepare("SELECT Email FROM camagru_users.users WHERE Username=?");
        $result_set_01->bindValue(1, $image_owner[0]);
        $result_set->execute();
        $email = $result_set_01->fetch();
        $liker = $_SESSION['Username'];
        $subject = "Recent activity";
        $msg = "$liker has recently liked your image";
        mail($email[0], $subject, $msg);
        //storing likes/
        $result_00 = $db->prepare("INSERT INTO camagru_users.user_likes (`Username`, `Image`) VALUES (?, ?)");
        $result_00->bindValue(1, $_SESSION['Username']);
        $result_00->bindValue(2, $image);
        $result_00->execute();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
             .gal {
                font-size: 30px;
                color: #2f2e2f;
                position: relative;
                top: 12px;
                margin-left: 15px;
                float: left;
            }
            .post {
                font-size: 30px;
                color: #2f2e2f;
                position: relative;
                top: 12px;
                margin-left: 15px;
                float: left;
            }
            gallery {
                width: 40px;
                position: relative;
                left: 75px;
                top: -23px;
            }
            .cam {
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
            .foot {
                font-size: 10px;
                margin-top: 190px;
                background-color: white;
                height: 700px;
                border-top: 1px solid dimgrey;
                padding: 5px;
            }
        </style>
    </head>
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
            <?php
            }
            ?>
        </nav>
        <header class="heading">
            <img class="logo" src="Pictures/Untitled.png">
            <?php if (isset($_SESSION['Username'])) {?>
            <a class="logout" href="log_user_off.php">logout</a>
            <?php }?>
        </header>
        <main >
            <?php 
            $result_sets = $db->prepare("SELECT image FROM camagru_users.user_images WHERE ID=?");
            $result_sets->bindValue(1, $_GET['pic']);
            $result_sets->execute();
            $image_path = $result_sets->fetch();
            ?>
            <img witdh="350px" height="350px" src='<?php echo $image_path['image']?>'>
            <?php 
            if (isset($_SESSION['Username'])) {
            ?>
            <form action="" method="post">
                <input type="text" name="comment" placeholder="Enter a comment" style="float: left; width: 270px;">
            </form>
            <?php if ($_SESSION)
            { 
                $image_05 = $image_path['image'];
                $result_set = $db->query("SELECT Username FROM camagru_users.user_images WHERE Image='$image_05'");
                $array = $result_set->fetchall();
                if (count($array) > 0)
                {
                    if (isset($_SESSION['Username']))
                    {
                        if ($_SESSION['Username'] == $array[0]['Username'])
                        {
                ?>
                <form action="my_gallery.php" method="post">
                    <input type="submit" name="delete" value="delete">
                </form>
                <?php
                        }
                    }
                }
            }?>
            <form action="" method="post">
                <input type="submit" name="like" value="like" style="margin-left: 20px; width: 60px;">
                
                <span><?php 
                        if($likes != 0)
                        {
                            echo $likes;
                        }
                       ?>
                </span>
            </form>
            <?php 
            }?>
        </main>
    </body>
</html>
<?php
    if (isset($_SESSION['Username']))
    {
        //$image = $_GET['pic'];
        $result_01 = $db->prepare("SELECT Comment, Username FROM camagru_users.user_comments WHERE Image=?");
        $result_01->bindValue(1, $image_05);
        $result_01->execute();
        $array = $result_01->fetchall();
        echo '<html>';
        echo '<textarea rows="4" cols="60" style="margin-top: 5px;" readonly>';
                    $x = 0;
                    while ($x < count($array))
                    {
                        echo $array[$x]['Username'].": ".$array[$x]['Comment'];
                        echo "\n";
                        $x++;
                    }
        echo '</textarea>';
        echo '';
        echo '</html>';
    }
?>
<html>
    <body>
         <footer class="foot">
            @CAMAGRU BY ENRADCLI
        </footer>
    </body>
</html>