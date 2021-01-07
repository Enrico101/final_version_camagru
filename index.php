<?php
    //Destroy any sessions that are still active
    session_start();
    if (isset($_SESSION['Username']))
    {
        session_destroy();
        header("location: index.php");
    }
?> 
<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="CSS\index.css">
    </head>
    <body>
        <header class="heading">
            <img class="logo" src="Pictures/Untitled.png">
        </header>
        <body>
            <nav>
                <a class="gal" href="pagination.php">GALLERY</a>
                <a class="gal" href="sign_up.php">SIGNUP</a>
                <a class="gal" href="login.php">LOGIN</a>
            </nav>
            <main>
            </main>
        </body>
    </body>
</html>