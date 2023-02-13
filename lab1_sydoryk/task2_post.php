<?php
require "../config.php";

$task_number = $_POST["task_number"];
unset($_POST["task_number"]);
$values = array_values($_POST);

$data = [
    "Обчислення максимальної температури",
    "Об-лення мінімальної т-ри",
    "Об-лення середньої т-ри"
];

$result = 0;
switch($task_number){
    case 1:
        $result = max($values);
    break;

    case 2:
        $result = min($values);
    break;

    case 3:
        $result = array_sum($values) / count($values);
    break;

    default: die("Undefined!");
}

echo "<p> Task is: " . $data[$task_number - 1] . "</p>";
echo "<p> The result is: " . $result . "</p>";