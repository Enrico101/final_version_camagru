<?php

?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Signup
        </title>
        <link rel="stylesheet" href="CSS/signup.css">
    </head>
    <body>
        <header class="head">
            <p>Welcome to Camagry</p>
        </header>
        <form action="check.php" method="post">
            <br />
            <fieldset class="border">
                <legend>Signup</legend>
                <img class="logo" src="Pictures/Untitled.png">
                <p class="tcs">By signing up, you agree to our Terms and Conditions.</p>
                <p><input class="bs" type="text" name="Username" placeholder=" Enter Username" pattern="[^]{1,}" title="Username is not valid" required></p>
                <p><input class="bs" type="password" name="Password" placeholder=" Enter Password" pattern="(?=.*[A-Z0-9])(?=.*[a-z]).{8,}" title="Password not valid" required></p>
                <P><input class="bs" type="email" name="Email"   placeholder="Enter Email" pattern="[a-zA-Z0-9]+@+[a-zA-Z]+\.{1, }" title="incorrect format" required></P>
                <input class="submit" type="submit" name="Submit" value="Sign Up">
            </fieldset>
        </form>
        <section class="bs_2">
            <div class="bs_3">Have an account already?
                <a href="login.php">Login</a></div>
        </section>
        <footer class="foot">
            @CAMAGRU BY ENRADCLI
        </footer>
    </body>
</html>