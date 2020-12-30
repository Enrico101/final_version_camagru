<?php
    session_start();
    include ("connect.php");
    $statement = $db->prepare("UPDATE camagru.users SET Connection='Offline' WHERE User_ID=?");
    $statement->bindValue(1, $_SESSION["User_ID"]);
    $statement->execute();
    session_destroy();
    $host = $_SERVER["HTTP_HOST"];
    header("location: http://$host/index.php");
?>