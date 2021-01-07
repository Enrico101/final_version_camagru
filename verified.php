  
<?php
    include ("connect.php");
    if (isset($_GET['vkey']))
    {
        $vkey =  $_GET['vkey'];
        $results = $db->prepare("SELECT Token FROM camagru.users WHERE Token=?");
        $results->bindValue(1, $vkey);
        $results->execute();
        $result_set = $results->fetch();
        if ($result_set)
        {
            $statemnet = $db->prepare("UPDATE camagru.users SET Status='Active', Token='Done' WHERE Token=?");
            $statemnet->bindValue(1, $vkey);
            $statemnet->execute();
        }
    }
    else
    {
        header("location: index.php");
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS\verified.css">
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
                <div class="veri">
                <br />
                <p>Your account has been verified. You can login at the login page!</p>
                </div>
            </main>
        </body>
    </body>
</html>