<?php
require "../config.php";
include_once "function.php";

$firstArray = fillArray(10, 20, 2);
$secondArray = fillArray(1, 10, 3);

$merged = array_merge($firstArray, $secondArray);
print_r($merged);