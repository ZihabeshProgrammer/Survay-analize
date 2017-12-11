<?php
error_reporting(E_ALL & ~E_NOTICE);

$servername = "localhost";
$username = "root";
$password = NULL;
$dbname = "koski3";


$link = mysqli_connect($servername, $username, $password,$dbname);

if (!$link) {
    die("Connection failed: " . $link->connect_error);
}

mysqli_set_charset($link,"utf8");
?>