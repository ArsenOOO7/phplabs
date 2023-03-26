<?php
require "../config.php";
include_once "function.php";

echo "Знайти та роздрукувати суму всіх парних та добуток непарних цілих чисел в
діапазоні від 0 до 20.<br>";
var_dump(sumOfEvenAndProductOfOdd());

echo "<br><br>Знайти та вивести на екран у вигляді таблиці значення функції у=2*х при
х=[0..4] з кроком 0.5.<br>";
echo "X | Y<br>";
foreach(valueOfFunctionTwoX() as $x => $y){
    echo $x . " | " . $y . "<br>";
}


echo "<br><br>Вивести на екран лінію, яка буде складатися з 20 символів «*», замінюючи
кожен третій символ на знак «?».<br>";
echo getLine();


