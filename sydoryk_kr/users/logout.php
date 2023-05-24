<?php
require_once __DIR__ . "/../db.php";

if(!array_key_exists("user", $_SESSION)){
    header("Location: " . BASE);
}

unset($_SESSION["user"]);
$_SESSION["logout"] = true;
header("Location: " . BASE);