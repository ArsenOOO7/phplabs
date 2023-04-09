<?php
require "../config.php";
include_once "function.php";

$myTopic = createFruitsArray();
print_r($myTopic);
echo "<br>Shuffled array: <br>";

$keys = array_keys($myTopic);
$values = array_values($myTopic);

shuffle($keys);
shuffle($values);

$i = 0;
$shuffledTopic = [];
foreach($keys as $key){
    $shuffledTopic[$key] = $values[$i++];
}

print_r($shuffledTopic);