<?php
require "../config.php";

$datasource = json_decode(file_get_contents("../data/database.json"), true)["datasource"];

if(PATH == "") {
    $datasource["host"] = "localhost";
    $datasource["user"] = "root";
    $datasource["password"] = "";
}

$database = mysqli_connect($datasource["host"], $datasource["user"], $datasource["password"], "epiz_33550669_lab8");
if($database->connect_errno){
    die("Cannot connect to database!");
}

$database->query("SET NAMES utf8");

echo "<p> Established connection with database! </p>";