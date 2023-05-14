<?php

if(empty($_POST)){
    die("Empty data!");
}
require "db.php";

$login = $_POST["login"];
$password = $_POST["password"];

$prepare = $database->prepare("insert into users(login, password) values(?, ?)");
$prepare->bind_param("ss", $login, $password);

$prepare->execute();
$prepare->close();

$database->close();
header("Location: task4.php");