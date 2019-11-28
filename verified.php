  
<?php
    include ("connect.php");
    if (isset($_GET['vkey']))
    {
        $vkey =  $_GET['vkey'];
        $results = $db->prepare("SELECT Token FROM camagru_users.users WHERE Token=?");
        $results->bindValue(1, $vkey);
        $results->execute();
        $result_set = $results->fetch();
        if ($result_set)
        {
            $statemnet = $db->prepare("UPDATE camagru_users.users SET Status='Active', Token='Done' WHERE Token=?");
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
        <style>
            .heading {
                border-bottom: 1px solid #cac6c6;
                background-color: white;
            }
            body {
                background-color: #f3f2f2;
                margin: 0px;
            }
            .logo {
                margin-left: 20px;
                width: 90px;
            }
            .user_name {
                float: right;
                margin-top: 35px;
                margin-right: 30px;
            }
            .logout {
                float: right;
                margin-top: 35px;
                margin-right: 45px;
            }
            .gallery {
                width: 40px;
                position: relative;
                left: 75px;
                top: -23px;
            }
            a:link {
                text-decoration: none;
                font-family: monospace;
                font-size: 17px;
            }
            .post {
                font-size: 30px;
                color: #2f2e2f;
                position: relative;
                top: 12px;
                margin-left: 15px;
                float: left;
            }
            .cam {
                font-size: 30px;
                color: #2f2e2f;
                position: relative;
                top: 12px;
                margin-left: 15px;
                float: left;
            }
            .upload {
                margin-top: 120px;
                position: relative;
                left: -322px;
            }
            .upload_button {
                margin-top: 120px;
                margin-left: 10px;
                position: relative;
                left: -350px;
            }
            .gal {
                font-size: 30px;
                color: #2f2e2f;
                position: relative;
                top: 12px;
                margin-left: 15px;
                float: left;
            }
               .user_gal {
                font-size: 30px;
                color: #2f2e2f;
                position: relative;
                top: 12px;
                margin-left: 15px;
                float: left;
            }
            .veri {
                color: #2f2e2f;
                width: 380px;
                height: 150px;
                text-align: center;
                margin: auto;
                font-family: monospace;
                background-color: #fdffff;
                font-size: 20px;
                border: 1px solid #cac5c5;
                position: relative;
                top: 230px;
                box-shadow: 5px 5px  5px #888888;
            }
        </style>
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