<?php
require "db.php";

if(!isset($_POST["id"])){
    die("Undefined ID!");
}
if(!in_array($_SERVER["REMOTE_ADDR"], ALLOW_IPS)){
    die("Deleting is no allowed from this IP!");
}


$batch = $database->prepare("delete from storage where id = ?");
$batch->bind_param("i", $_POST["id"]);
$batch->execute();
$batch->close();
$database->close();
header("Location: task5-6.php");