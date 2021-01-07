<?php
    include ("connect.php");
    session_start();
    if (isset($_SESSION['Username']))
    {
        if (count($_POST) > 0)
        {      
            if (isset($_POST['new_pass']))
            {
                if (preg_match("/(?=.*[A-Z0-9])(?=.*[a-z]).{8,}/", $_POST['new_pass']))
                {
                    if (isset($_POST['old_pass']))
                    {
                        $new_pass = $_POST['new_pass'];
                        $old_pass = $_POST['old_pass'];
                        $User_ID = $_SESSION['User_ID'];
                        $db_pass = $db->prepare("SELECT Password FROM camagru.users WHERE User_ID=?");
                        $db_pass->bindValue(1, $User_ID);
                        $db_pass->execute();
                        $pass = $db_pass->fetch();
                        $hashed_old_pass = hash("whirlpool", $old_pass);
                        if ($pass[0] === $hashed_old_pass)
                        {
                            $result = $db->prepare("UPDATE camagru.users SET Password=? WHERE User_ID=?");
                            $hashed_new_pass = hash("whirlpool", $new_pass);
                            $result->bindValue(1, $hashed_new_pass);
                            $result->bindValue(2, $User_ID);
                            $result->execute();
                            $_SESSION['Password'] = $_POST['new_pass'];
                        }
                        else
                        {
                        }
                    }
                }
                else
                {
                }
            }
            if (isset($_POST['email']))
            {
                $User_ID = $_SESSION['User_ID'];
                $result_set = $db->prepare("SELECT Email FROM camagru.users WHERE User_ID=?");
                $result_set->bindValue(1, $User_ID);
                $result_set->execute();
                $db_email = $result_set->fetch();
                $new_email = $_POST['email'];
                $result = $db->prepare("UPDATE camagru.users SET Email=? WHERE User_ID=?");
                $result->bindValue(1, $new_email);
                $result->bindValue(2, $User_ID);
                $result->execute();
            }
            if (isset($_POST['username']))
            {
                $User_ID = $_SESSION['User_ID'];
                $new_username = $_POST['username'];
                $result = $db->prepare("UPDATE camagru.users SET Username=? WHERE User_ID=?");
                $result->bindValue(1, $new_username);
                $result->bindValue(2, $User_ID);
                $result->execute();
                $_SESSION['Username'] = $new_username;
            }
            if (isset($_POST['notification']))
            {
                $User_ID = $_SESSION['User_ID'];
                $prefence = $_POST['notification'];
                if ($prefence == "Yes")
                {
                    $result = $db->prepare("UPDATE camagru.users SET Notifications=? WHERE User_ID=?");
                    $result->bindValue(1, $prefence);
                    $result->bindValue(2, $User_ID);
                    $result->execute();
                }
                if ($prefence == "No")
                {
                    $result = $db->prepare("UPDATE camagru.users SET Notifications=? WHERE User_ID=?");
                    $result->bindValue(1, $prefence);
                    $result->bindValue(2, $User_ID);
                    $result->execute();
                }
            }
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS\edit_info.css">
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
            <br>
            <br>
            <main>
                <form action="" method="post">
                    <span class="P_title">Edit password</span>
                   <input class="password" type="text" name="new_pass" placeholder="New Password">
                    <input class="password" type="password" name="old_pass" placeholder="Old Password">
                    <input class="password" type="submit" value="submit" value="submit">
                </form>
                <form action="" method="post">
                    <span class="E_title">Edit email</span>
                    <input class="email" class="email" type="email" name="email" placeholder="Enter Email">
                    <input class="email" type="submit" value="submit">
                </form>
                <form action="" method="post">
                    <span class="U_title">Edit username</span>
                    <input class="username" type="text" name="username" placeholder="Enter Username">
                    <input class="username" type="submit" value="submit">
                </form>
                <form action="" method="post">
                    <span class="Pr_title">Email notification</span>
                    <input class="prefence" type="radio" name="notification" value="Yes">
                    <span class="yes">Yes</span>
                    <input class="prefence_2" type="radio" name="notification" value="No">
                    <span class="no">No</span>
                    <input class="enotification" type="submit" name="submit" value="submit">
                </form>
            </main>
            <footer class="foot">
            @CAMAGRU BY ENRADCLI
        </footer>
        </body>
    </body>
</html>
<?php
    }
    else
    {
        header("location: login.php");
    }
?>