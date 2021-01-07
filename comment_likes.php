<?php
    include ("connect.php");
    session_start();
    
    //for deleting images
        $set = $db->prepare("SELECT image FROM camagru.images WHERE Image_ID=?");
        $set->bindValue(1, $_GET['pic']);
        $set->execute();
        $image_delete_loc = $set->fetch();
        $_SESSION['pic_loc'] = $image_delete_loc['image'];
        $_SESSION['pic_id'] = $_GET['pic'];
    //
    if (isset($_POST['comment']))
    {
        //mailing the notification on comment.
        $result_set = $db->prepare("SELECT * FROM camagru.users INNER JOIN camagru.images ON camagru.users.User_ID = camagru.images.User_ID WHERE Image_ID = ?");
        $result_set->bindValue(1, $_GET['pic']);
        $result_set->execute();
        $results_array = $result_set->fetchAll();
        $image_owner = $results_array[0]['Username'];
        $email = $results_array[0]['Email'];
        $commentor = $_SESSION['Username'];
        $subject = "Recent activity";
        $msg = "$commentor has recently commented on your image";
        mail($email, $subject, $msg);
        //storing comments in database.
        $result = $db->prepare("INSERT INTO camagru.comments (`Comment`, `User_ID`, `Image_ID`) VALUES (?, ?, ?)");
        $result->bindValue(1, $_POST['comment']);
        $result->bindValue(2, $_SESSION['User_ID']);
        $result->bindValue(3, $results_array[0]['Image_ID']);
        $result->execute();
    }

    $result_01 = $db->prepare("SELECT * FROM camagru.likes WHERE Image_ID = ?");
    $result_01->bindValue(1, $_GET['pic']);
    $result_01->execute();
    $amount = $result_01->fetchAll();
    $likes = count($amount);
    if (isset($_POST['like']))
    {
        //sending likes notification.
        $result_set_2 = $db->prepare("SELECT * FROM camagru.users INNER JOIN camagru.images ON camagru.users.User_ID = camagru.images.User_ID WHERE Image_ID = ?");
        $result_set_2->bindValue(1, $_GET['pic']);
        $result_set_2->execute();
        $results_array_2 = $result_set_2->fetchAll();
        $image_path_2 = $results_array_2[0]['Image'];
        $image_owner_2 = $results_array_2[0]['Username'];
        $email_2 = $results_array_2[0]['Email'];
        $liker = $_SESSION['Username'];
        $subject = "Recent activity";
        $msg = "$liker has recently liked your image";
        mail($email_2, $subject, $msg);
        //storing likes
        $result_00 = $db->prepare("INSERT INTO camagru.likes (`User_ID`, `ImAGE_id`) VALUES (?, ?)");
        $result_00->bindValue(1, $_SESSION['User_ID']);
        $result_00->bindValue(2, $results_array_2[0]['Image_ID']);
        $result_00->execute();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS\comment_likes.css">
    </head>
    <body>
        <header class="heading">
            <img class="logo" src="Pictures/Untitled.png">
            <?php if (isset($_SESSION['Username'])) {?>
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
            <?php
            }
            ?>
        </nav>
        <br>
        <br>
        <main>
            <?php 
            $result_sets = $db->prepare("SELECT * FROM camagru.images WHERE Image_ID=?");
            $result_sets->bindValue(1, $_GET['pic']);
            $result_sets->execute();
            $image_results = $result_sets->fetchAll();
            ?>
            <br>
            <div id="main_pic_div">
                <img id="main_pic" witdh="350px" height="350px" src='<?php echo $image_results[0]['Image']?>'>
            </div>
            <br>
            <?php 
            if (isset($_SESSION['Username'])) {
            ?>
            <div id="like_stuff">
                <form action="" method="post">
                    <input id="comment_box" type="text" name="comment" placeholder="Enter a comment" style="float: left; width: 270px;">
                </form>
                <?php if ($_SESSION)
                { 
                    if (count($image_results) > 0)
                    {
                        if (isset($_SESSION['User_ID']))
                        {
                            if ($_SESSION['User_ID'] == $image_results[0]['User_ID'])
                            {
                    ?> 
                    <span id="delet_button">
                        <form action="my_gallery.php" method="post">
                            <button type="submit" name="delete" value="delete"><img id="trash_icon" src="Pictures\trash.png"></button>
                        </form>
                    </span>
                    <?php
                            }
                        }
                    }
                }?>
                <form action="" method="post">
                    <button type="submit" name="like" value="like"><img id="trash_icon" src="Pictures\heart.png"></button>
                    <span id="like_count"><?php
                            if($likes != 0)
                            {
                                echo $likes;
                            }
                        ?>
                    </span>
                </form>
                <?php 
                }?>
                <?php
    if (isset($_SESSION['Username']))
    {
        $result_01 = $db->prepare("SELECT * FROM camagru.users INNER JOIN camagru.comments ON camagru.users.User_ID = camagru.comments.User_ID WHERE camagru.comments.Image_ID = ?");
        $result_01->bindValue(1, $_GET['pic']);
        $result_01->execute();
        $array = $result_01->fetchAll();
        if (count($array) > 0)
        {
            echo '<html>';
            echo '<textarea id="comments" rows="4" cols="60" style="" readonly>';
            $x = 0;
            while ($x < count($array)) {
                echo "\n";
                echo "\n";
                echo $array[$x]['Username'] . ": " . $array[$x]['Comment'];
                echo "\n";
                $x++;
            }
            echo '</textarea>';
            echo '';
            echo '</html>';
        }
    }
?>
                <br>
                <br>
            </div>
        </main>
    </body>
</html>
<html>
    <body>
         <footer class="foot">
            @CAMAGRU BY ENRADCLI
        </footer>
    </body>
</html>