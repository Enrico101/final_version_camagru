<?php
    include ('connect.php');
    session_start();
    $array = explode('/', $_SESSION['tmp_loc']);
    $image_name = $array[1];
    $imageTmpName = $_SESSION['tmp_loc'];
    $imagePath = "Uploads/$image_name";
    $result = $db->prepare("INSERT INTO camagru.images (`Image`, `User_ID`) VALUES (?, ?)");
    $result->bindValue(1, $imagePath);
    $result->bindValue(2, $_SESSION['User_ID']);
    $result->execute();
    rename($imageTmpName, $imagePath);
    header ("location: webcam.php");
?>