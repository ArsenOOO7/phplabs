<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Printing second part of file</title>
</head>
<body>

<?php
require "../../config.php";


$file = "ex1.txt";
$fop = fopen($file, 'r') or die("Cannot open file!");
$fsize = filesize($file);
$half = (int) ($fsize / 2);
fseek($fop, $half);
echo fread($fop, ($fsize - $half));

?>

</body>
</html>