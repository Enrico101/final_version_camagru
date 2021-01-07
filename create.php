<?php
    session_start();
    include ("connect.php");
    if (isset($_SESSION['POST_USERNAME']) && isset($_SESSION['POST_PASSWORD']) && isset($_SESSION['POST_EMAIL']))
    {
        $username = $_SESSION['POST_USERNAME'];
        $email = $_SESSION['POST_EMAIL'];
        $check = $db->query("SELECT Username, Email FROM camagru.users;");
        $results = $check->fetchall();
        $username = $_SESSION['POST_USERNAME'];
        $password_hash = hash("whirlpool", $_SESSION['POST_PASSWORD']);
        //
        $str = "1234567890abcdefghigjlmnopqrstuvwxyzABCDEFGHIJKLMNOPRSTUVWXYZ";
        $vkey = substr(str_shuffle($str), 0, 8);
        $statement = $db->prepare("INSERT INTO camagru.users (`Username`, `Password`, `Email`, `Token`, `Status`, `Connection`, `Notifications`) VALUES (?, ?, ?, ?, ?, ?, ?);");
        $statement->bindValue(1, $_SESSION['POST_USERNAME']);
        $statement->bindValue(2, $password_hash);
        $statement->bindValue(3, $_SESSION['POST_EMAIL']);
        $str = "1234567890abcdefghigjlmnopqrstuvwxyzABCDEFGHIJKLMNOPRSTUVWXYZ";
        $vkey = substr(str_shuffle($str), 0, 8);
        $statement->bindValue(4, $vkey);
        $statement->bindvALUE(5, "Inactive");
        $statement->bindValue(6, "Offline");
        $statement->bindValue(7, "Yes");
        $statement->execute();
        $to = $_SESSION["POST_EMAIL"];
        $host = $_SERVER['HTTP_HOST'];
        $subject = "Verification link";
        $msg = "Click on the link below to verify email:\n http://$host/verified.php?vkey=$vkey";
        mail($to, $subject, $msg);
        header("location: confirmation.php");
    }
    else
    {
        header("location: index.php");
    }
?>