<?php
require "../config.php";
include_once "function.php";

echo "<h1> 5.1 Функція, що виводить заданий масив чисел разом із індексами в заданому і
оберненому порядку. Задану послідовність вказати при виклику функції.</h1><br>";

printArrayOriginReverse(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
echo "<br><hr><br>";
printArrayOriginReverseWithArray([
    0 => 1,
    "two" => 2,
    "three" => 3,
    "index" => 65,
    100 => 0,
    "cat" => 90,
    80 => "dog"
]);


echo "<h1> 5.2. Для двовимірного масиву NxN, де N=(a%10+1)*2, значення згенерувати
випадковим чином з діапазону від 1 до 100. Створити функцію, що виводить
переданий в неї двовимірний масив у вигляді таблиці і два одновимірні масиви:
елементами першого є мінімальні значення рядків вхідного масиву, а другого —
числа, які знаходяться в останньому стовпці.</h1>";

print2DArray(create2DArray());