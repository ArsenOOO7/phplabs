<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Використання include, що повертає значення</title>
</head>
<body>

<?php
require "../../config.php";

$a = include "top2.php";
echo "<h2> Included file returns {$a}</h2>";
?>

</body>
</html>