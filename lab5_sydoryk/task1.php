<?php
require "../config.php";

$files = scandir("./task1");
echo "<h1> Task 1 </h1>";
echo "<ul>";
foreach($files as $file){
    if(strpos($file, "example") !== false || strpos($file, "upload") !== false){
        echo "<li><a href = './task1/{$file}'>". ucfirst(substr($file, 0, strpos($file, "."))) ."</a></li>";
    }
}
echo "</ul>";
