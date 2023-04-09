<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Using foreach loop</h1>
<?php

$names = [];
$names["Бойчук"] = "Іван";
$names["Мельник"] = "Борис";
$names["Швець"] = "Антон";

foreach($names as $surname => $name){
    echo "<b>{$name} {$surname}</b><br>";
}
?>
</body>
</html>