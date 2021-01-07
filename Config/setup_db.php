<?php
    //session_start();
    //$username = $_SESSION["Username"];
    //include ("connect.php");
    include ("database.php");
    try {
        $db = new PDO($DB_DSN_2, $DB_USER, $DB_PASSWORD);
    }
     catch (exception $e) {
        echo $e;
    }


    $q = "CREATE DATABASE IF NOT EXISTS Camagru;";
    $q_one = "CREATE TABLE IF NOT EXISTS `Camagru`.`Users` ( `User_ID` INT NOT NULL UNIQUE AUTO_INCREMENT , `Username` VARCHAR(255) NOT NULL , `Password` VARCHAR(1000) NOT NULL , `Email` VARCHAR(60) NOT NULL , `Token` VARCHAR(20) NOT NULL , `Status` VARCHAR(20) NOT NULL , `Connection` VARCHAR(20) NOT NULL , `Notifications` VARCHAR(20) NOT NULL , PRIMARY KEY (`User_ID`));";
    $q_two = "CREATE TABLE IF NOT EXISTS `Camagru`.`Images` ( `Image_ID` INT NOT NULL UNIQUE AUTO_INCREMENT , `User_ID` INT, `Image` VARCHAR(1000) NOT NULL , PRIMARY KEY (`Image_ID`), FOREIGN KEY (`User_ID`) REFERENCES Users(`User_ID`));";
    $q_three = "CREATE TABLE IF NOT EXISTS `Camagru`.`Likes` ( `User_ID` INT , `Image_ID` INT, FOREIGN KEY (`User_ID`) REFERENCES Users(User_ID), FOREIGN KEY (`Image_ID`)REFERENCES Images(Image_ID));";
    $q_four = "CREATE TABLE IF NOT EXISTS `Camagru`.`Comments` ( `Comment` VARCHAR(1000) NOT NULL , `User_ID` INT, `Image_ID` INT, FOREIGN KEY (`User_ID`) REFERENCES Users(`User_ID`), FOREIGN KEY (`Image_ID`) REFERENCES Images(`Image_ID`));";
    
    $rs = $db->prepare($q);
    $rs->execute();

    $rs2 = $db->prepare($q_one);
    $rs2->execute();

    $rs3 = $db->prepare($q_two);
    $rs3->execute();

    $rs4 = $db->prepare($q_three);
    $rs4->execute();

    $rs5 = $db->prepare($q_four);
    $rs5->execute();
?>
