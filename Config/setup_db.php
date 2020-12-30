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
    $db->exec("CREATE DATABASE IF NOT EXISTS Camagru;");
    $db->exec("CREATE TABLE `Camagru`.`Users` ( `User_ID` INT NOT NULL AUTO_INCREMENT , `Username` VARCHAR(255) NOT NULL , `Password` VARCHAR(1000) NOT NULL , `Email` VARCHAR(60) NOT NULL , `Token` VARCHAR(20) NOT NULL , `Status` VARCHAR(20) NOT NULL , `Connection` VARCHAR(20) NOT NULL , `Notifications` VARCHAR(20) NOT NULL , PRIMARY KEY (`User_ID`));");
    $db->query("CREATE TABLE `Camagru`.`Images` ( `Image_ID` INT NOT NULL AUTO_INCREMENT , `User_ID` INT, `Image` VARCHAR(1000) NOT NULL , PRIMARY KEY (`Image_ID`), FOREIGN KEY (`User_ID`) REFERENCES Users(`User_ID`));");
    $db->query("CREATE TABLE `Camagru`.`Likes` ( `User_ID` INT , `Image_ID` INT, FOREIGN KEY (`User_ID`) REFERENCES Users(User_ID), FOREIGN KEY (`Image_ID`)REFERENCES Images(Image_ID));");
    $db->query("CREATE TABLE `Camagru`.`Comments` ( `Comment` VARCHAR(1000) NOT NULL , `User_ID` INT, `Image_ID` INT, FOREIGN KEY (`User_ID`) REFERENCES Users(`User_ID`), FOREIGN KEY (`Image_ID`) REFERENCES Images(`Image_ID`));");
   /* $db->exec("CREATE TABLE IF NOT EXISTS `camagru`.users (ID INT NOT NULL AUTO_INCREMENT, Username VARCHAR(255) NOT NULL, Password VARCHAR(255) NOT NULL, Email VARCHAR(255) NOT NULL, Token TEXT(8) NOT NULL, Status VARCHAR(10)NOT NULL, Connection VARCHAR(20) NOT NULL, PRIMARY KEY(ID)) ENGINE = InnoDB;")*/
?>