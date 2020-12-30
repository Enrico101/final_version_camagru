<?php
    session_start();
    include ("Connect.php");
        $user = $_POST['name'];
        if (isset($_POST['Newpass']))
        {
            if (preg_match("/(?=.*[A-Z0-9])(?=.*[a-z]).{8,}/", $_POST['Newpass']))
            {
                $pass_hash = hash("whirlpool", $_POST['Newpass']);
                $result = $db->prepare("UPDATE camagru.users SET Password=? WHERE Username=?;");
                $result->bindValue(1, $pass_hash);
                $result->bindValue(2, $user);
                $result->execute();
                header("location: index.php"); 
            }
            else
                header("location: pass_reset.php"); 
        }
        else
            header("location: pass_reset.php"); 
?>