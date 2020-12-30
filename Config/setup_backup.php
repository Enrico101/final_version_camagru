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
    $db->exec("CREATE DATABASE IF NOT EXISTS camagru_users;");
    $db->exec("CREATE TABLE `camagru_users`.`Users` ( `ID` INT NOT NULL AUTO_INCREMENT , `Username` VARCHAR(255) NOT NULL , `Password` VARCHAR(1000) NOT NULL , `Email` VARCHAR(60) NOT NULL , `Token` VARCHAR(20) NOT NULL , `Status` VARCHAR(20) NOT NULL , `Connection` VARCHAR(20) NOT NULL , `Notifications` VARCHAR(20) NOT NULL , PRIMARY KEY (`ID`));");
    $db->query("CREATE TABLE `camagru_users`.`user_images` ( `ID` INT NOT NULL AUTO_INCREMENT , `Username` VARCHAR(255) NOT NULL , `Image` VARCHAR(1000) NOT NULL , PRIMARY KEY (`ID`));");
    $db->query("CREATE TABLE `camagru_users`.`user_likes` ( `Username` VARCHAR(255) NOT NULL , `Image` VARCHAR(1000) NOT NULL );");
    $db->query("CREATE TABLE `camagru_users`.`user_comments` ( `Comment` VARCHAR(1000) NOT NULL , `Username` VARCHAR(255) NOT NULL , `Image` VARCHAR(1000) NOT NULL );");
   /* $db->exec("CREATE TABLE IF NOT EXISTS `camagru`.users (ID INT NOT NULL AUTO_INCREMENT, Username VARCHAR(255) NOT NULL, Password VARCHAR(255) NOT NULL, Email VARCHAR(255) NOT NULL, Token TEXT(8) NOT NULL, Status VARCHAR(10)NOT NULL, Connection VARCHAR(20) NOT NULL, PRIMARY KEY(ID)) ENGINE = InnoDB;")*/
?>