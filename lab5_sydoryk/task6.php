<?php
require "../config.php";
file_put_contents("files/task6_done.txt", file_get_contents("files/task6.txt"));

echo "<p>Здійснити заміну символів
&#39;:&#39; на &#39;,&#39; в <b>першому</b> рядку,
починаючи з п&#39;ятої позиції.</p>";

$file = "files/task6_done.txt";
$fop = fopen($file, 'r+');

fseek($fop, 5);
$current = "";
while($current = fread($fop, 1)){
    if($current == ":"){
        fseek($fop, -1, SEEK_CUR);
        fwrite($fop, ",", 1);
    }else if($current == "\n"){
        break;
    }
}

$line = "";
$fop = fopen("files/task6.txt", 'r');
while (($line = fgets($fop)) !== false) {
    echo $line . "<br>";
}

echo "<br> Modified </br>";
$fop = fopen("files/task6_done.txt", 'r');
while (($line = fgets($fop)) !== false) {
    echo $line . "<br>";
}