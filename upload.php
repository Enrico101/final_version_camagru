<?php
    include ('connect.php');
    session_start();
    if (isset($_FILES))
    {
        if (strlen($_FILES['image']['name']) > 0)
        {
            $imageName = $_FILES['image']['name'];
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imagePath = "Uploads/$imageName";
            $result = $db->prepare("INSERT INTO camagru.images (`Image`, `User_ID`) VALUES (?, ?)");
            $result->bindValue(1, $imagePath);
            $result->bindValue(2, $_SESSION['User_ID']);
            $result->execute();
            move_uploaded_file($imageTmpName, $imagePath);
        }
    }
    header ("location: webcam.php");
?>