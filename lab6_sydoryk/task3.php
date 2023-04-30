<?php
require "../config.php";


$text = file_get_contents("./files/my_text.txt");
$regex = "/<\/?\w+>/ui";
$content = preg_replace($regex, " ", $text);

echo str_replace("  ", " ", htmlspecialchars($content));
