<?php
    session_start();
    if (isset($_SESSION['Username']))
    {
        header("location: user_gallery.php");
    }
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>
            Login
        </title>
        <link rel="stylesheet" href="CSS\login.css">
    </head>
    <body>
        <header class="head">
            <p>Welcome to Camagry</p>
        </header>
        <form action="Auth.php" method="post">
            <br />
            <fieldset class="border">
                <legend>Login</legend>
                <img class="logo" src="Pictures/Untitled.png">
                <p><input class="bs" type="text" name="Username" placeholder=" Enter Username" pattern="[^]{1,}" title="Username is not valid" required></p>
                <p><input class="bs" type="password" name="Password" placeholder=" Enter Password" pattern="{1,}" title="Password not valid" required></p>
                <input class="submit" type="submit" name="Submit" value="Login">
                <p class="bs_3">OR</p>
                <a style="font-family: monospace; position: relative; left: 102px; font-size: 15px" href="forgot_password.php">forgot password</a>
            </fieldset>
        </form>
        <section class="bs_2">
            <div class="example">Do nots have an account yet?
                <a href="sign_up.php">Sign Up</a></div>
        </section>
        <footer class="foot">
            @CAMAGRU BY ENRADCLI
        </footer>
    </body>
</html>