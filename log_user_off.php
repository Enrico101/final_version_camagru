<?php
    session_start();
    include ("connect.php");
    $statement = $db->prepare("UPDATE camagru_users.users SET Connection='Offline' WHERE Username=?");
    $statement->bindValue(1, $_SESSION["Username"]);
    $statement->execute();
    session_destroy();
    $host = $_SERVER["HTTP_HOST"];
    header("location: http://$host/index.php");
?>