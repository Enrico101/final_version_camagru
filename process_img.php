<?php
    session_start();
    include ("connect.php");
    $img = $_POST['img'];
    if (strlen($_POST['img']) > 0)
    {
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $file = 'Uploads/img'.date('YmdHis').'.png';
        $result = $db->prepare("INSERT INTO camagru.images (`Image`, `User_ID`) VALUES (?, ?)");
        $result->bindValue(1, $file);
        $result->bindValue(2, $_SESSION['User_ID']);
        $result->execute();
        file_put_contents($file, $data);
        header("location: webcam.php");
    }
    else
    {
        header("location: webcam.php");
    }
?>