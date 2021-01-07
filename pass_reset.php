<!DOCTYPE html>
<html>
    <head>
        <title>
            password reset
        </title>
        <link rel="stylesheet" href="CSS\pass_reset.css">
    </head>
    <body>
        <form action="reset.php" method="post">
            <br />
            <fieldset class="border">
                <legend>Reset Password</legend>
                <img class="logo" src="Pictures/Untitled.png">
                <input class="bs" type="text" name="name" placeholder=" Enter Username" required> 
                <p><input class="bs" type="password" name="Newpass" Placeholder=" New Password" pattern="(?=.*[A-Z0-9])(?=.*[a-z]).{8,}" title="password is not valid" required></p>
                <input class="submit" type="submit" name="Submit" value="Reset Password">
            </fieldset>
        </form>
        <section class="bs_2">
            <div class="bs_3">Dont have an account?
                <a href="index.php">Sign Up</a></div>
        </section>
    </body>
</html>