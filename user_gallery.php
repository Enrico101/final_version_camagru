<?php
    session_start();
    if (isset($_SESSION['Username']))
    {
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
            .head {
                font-family: monospace;
                text-align: center;
                font-size: 30px;
                border-bottom: 1px solid dimgrey;
            }
            .foot {
                height: 400px;
                font-size: 10px;
                margin-top: 630px;
                border-top: 1px solid dimgrey;
                padding: 5px;
                background-color: white;
            }
        </style>
    </head>
    <body>
        <header class="heading">
            <img class="logo" src="Pictures/Untitled.png">
            <a class="logout" href="log_user_off.php">logout</a>
        </header>
        <body>
            <nav>
                <a class="cam" href="webcam.php">CAMERA</a>
                <a class="gal" href="pagination.php">GALLERY</a>
                <a class="user_gal" href="my_gallery.php">MY_GALLERY</a>
                <a class="user_gal" href="edit_info.php">EDIT_INFO</a>
            </nav>
        </body>
    </body>
    <footer class="foot">
            @CAMAGRU BY ENRADCLI
        </footer>
</html>
<?php
    }
else
{
    header("location: login.php");
}
?>