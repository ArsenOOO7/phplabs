<?php
require "../config.php";
include_once "function.php";

echo "Values: 2, 3, 4, 5, 6, 7, 8, 9, 10 <br>";
$squaredArray = squareArray(2, 3, 4, 5, 6, 7, 8, 9, 10);
var_dump($squaredArray);