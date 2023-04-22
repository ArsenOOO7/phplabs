<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Read lines from file</title>
</head>
<body>

<?php
require "../../config.php";

$file = fopen("ex1.txt", 'r') or die("Cannot open a file!");
while(!feof($file)){
    echo fgets($file, 1024) . "<br>";
}

?>

</body>
</html>