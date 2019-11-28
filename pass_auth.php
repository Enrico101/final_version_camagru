<?php
    session_start();
    include ("connect.php");
    if (isset($_POST["Email"]))
    {
        if (!empty($_POST["Email"]))
        {
            $_SESSION["Email_P"] = $_POST["Email"];
            $to = $_SESSION["Email_P"];
            $subject = "Password Reset Link";
            $host = $_SERVER["HTTP_HOST"];
            $msg = "Click on the link below to reset password:\n http://$host/pass_reset.php";
            mail($to, $subject, $msg);
            header("location: link_pass.php");
        }
        else
            header ("location: forgot_password.php");
    }
    else
        header ("location: forgot_password.php");
?>