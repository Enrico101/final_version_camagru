<!DOCTYPE html>
<html>
    <head>
        <title>
            Forgot password
        </title>
        <link rel="stylesheet" href="CSS\forgot_password.css">
    </head>
    <body>
        <header class="head">
            <p>Welcome to Camagry</p>
        </header>
        <form action="pass_auth.php" method="post">
            <br />
            <fieldset class="border">
                <legend>Forgot Password</legend>
                <img class="logo" src="Pictures/Untitled.png">
                <p><input class="bs" type="text" name="Email" Placeholder=" Enter Email" pattern="{1,}" title="Email is not valid" required></p>
                <input class="submit" type="submit" name="Submit" value="Send Link">
            </fieldset>
        </form>
        <section class="bs_2">
            <div class="bs_3">Dont have an account?
                <a href="index.php">Sign Up</a></div>
        </section>
        <footer class="foot">
            @CAMAGRU BY ENRADCLI
        </footer>
    </body>
</html>