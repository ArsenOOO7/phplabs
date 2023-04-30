<?php
require "../config.php";


echo "1. Весь текст: <br>";
$text = file_get_contents("./files/text.txt");
echo htmlspecialchars($text);

echo "<br><br>";

echo "2. Тільки назви відкриваючих тегів:<br>";

$regex = "/<\w*>/";
$matches = [];
preg_match_all($regex, $text, $matches);
foreach($matches as &$match){
    foreach($match as &$tag) {
        $tag = htmlspecialchars(str_replace(["<", ">"], "", $tag));
    }
}
echo implode(", ", $matches[0]);

echo "<br><br>3. Назви відкриваючих тегів разом і кутовими дужками:<br>";
$matches = [];
preg_match_all($regex, $text, $matches);
foreach($matches as &$match){
    foreach($match as &$tag) {
        $tag = htmlspecialchars($tag);
    }
}
echo implode(", ", $matches[0]);