<?php
    session_start();
    include ("connect.php");
    if (isset($_POST['Username']) && isset($_POST['Password']))
    {
        if (!empty($_POST['Username']) && !empty($_POST['Password']))
        {
            $_SESSION["Username"] = $_POST["Username"];
            $_SESSION["Password"] = $_POST["Password"];
            $password_hash = hash("whirlpool", $_POST["Password"]);
            $statement = $db->prepare("SELECT User_ID, Username, Password, Status FROM camagru.users WHERE Username=?");
            $statement->bindValue(1, $_SESSION["Username"]);
            $statement->execute();
            $authenticate = $statement->fetch();
            if ($_POST["Username"] == $authenticate["Username"])
            {
                if ($password_hash == $authenticate["Password"])
                {
                    if ($authenticate["Status"] == "Active")
                    {
                        $_SESSION["User_ID"] = $authenticate["User_ID"];
                        header("location: pagination.php");
                    }
                    else
                        header("location: index.php");
                }
                else
                    header("location: index.php");
            }
            else
                header("location: index.php");
        }
    }
    else
    {
        header("location: index.php");
    }
?>