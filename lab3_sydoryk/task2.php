<?php
require "../config.php";
include_once "function.php";

$array = generateRandomArray();
var_dump($array);
echo "<br>Beautiful print: <br>";
foreach($array as $key => $value){
    echo $key . ": " . $value . "<br>";
}
echo "<br>";

echo "Index of minimal value: " . array_search(min($array), $array) . "<br>";
echo "Index of maximum value: " . array_search(max($array), $array) . "<br>";
echo "Average of array: " . (array_sum($array) / count($array)) . "<br>";