<?php
require "./db.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $database->query("delete from sydoryk_news where id = 5");
}
header("Location: task.php");