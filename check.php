<?php
    session_start();
    include ("connect.php");
    //header("location: create.php");
    if (isset($_POST['Username']))
    {
        if (!empty($_POST['Username']))
            $username = $_POST['Username'];
        else
            header("location: sign_up.php");
    }
    else
        header("location: sign_up.php");
    if (isset($_POST['Password']))
    {
        if (!empty($_POST['Password']))
            $password = $_POST['Password'];
        else
            header("location: sign_up.php");
    }
    if (isset($_POST['Email']))
    {
        if (!empty($_POST['Email']))
            $email = $_POST['Email'];
        else
            header("location: sign_up.php");
    }
    else
        header("location: sign_up.php");
    $result = $db->prepare("SELECT Username FROM camagru.users WHERE Username=?");
    $result->bindValue(1, $username);
    $result->execute();
    $check_username = $result->fetch();
    $results = $db->prepare("SELECT Email FROM camagru.users WHERE Email=?");
    $results->bindValue(1, $email);
    $results->execute();
    $check_email = $results->fetch();
    if ($check_username)
    {
        header("location: signup_02.php");
    }
    elseif (!preg_match("/(?=.*[A-Z0-9])(?=.*[a-z]).{8,}/", $password))
    {
        header("location: sign_up.php");
    }
    elseif ($check_email)
    {
        header("location: signup_03.php");
    }
    else
    {
        $_SESSION['POST_USERNAME'] = $_POST['Username'];
        $_SESSION['POST_PASSWORD'] = $_POST['Password'];
        $_SESSION['POST_EMAIL'] = $_POST['Email'];
        header("location: create.php");
    }
?>