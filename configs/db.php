<?php

// Данные для подключения к БД


// Данные для хостинга
// $server = "localhost";
// $username = "f6793849_12345";
// $password = "7bi%iAvY";
// $dbname = "f6793849_12345";

// Данные для локального сервера
$server = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// подключения к БД "shop"
// $conn = new mysqli($server, $username, $password, $dbname);

// if($conn->connect_error)
// {
// 	die("Connection failed: " . $conn->connect_error);
// }



$connect = mysqli_connect($server, $username, $password, $dbname);
// кодировка БД
mysqli_set_charset($connect, "utf8");

?>