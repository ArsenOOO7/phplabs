<?php
require_once "../config.php";

if(isset($_GET["func"])){
    $func = $_GET["func"];
    switch($func){
        case 1:
            echo "Викликати функцію func1<br>";
            break;

        case 2:
            echo "Викликати функцію func2<br>";
            break;
        case 3:
            echo "Викликати функцію func3<br>";
            break;
        default:
            echo "Некоректні дані";
    }
}

$random = mt_rand(1, 6);
echo "<p><a href = 'task7.php?func={$random}'>Task 7</a></p>";