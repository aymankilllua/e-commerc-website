<?php

$data ="mysql:host=localhost;dbname=tecommerc_data";
$dbuser = "root";
$pass = "";
$option = array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8");

try {
    $con = new PDO($data , $dbuser , $pass , $option);
    $con->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );
} catch (PDOException $e) {
    echo "faild connection",$e;
}