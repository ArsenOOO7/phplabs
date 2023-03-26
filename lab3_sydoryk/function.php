<?php
function create_table2($data, $border=1, $cellpadding=4, $cellspacing=4)
{
    echo "<h4> Результат виклику функції create_table2: </h4> border=$border";
    echo "<table border=$border  cellpadding=$cellpadding cellspacing=$cellspacing>\n";
    reset($data); //    встановлює покажчик масиву на його початок
    $value=current($data);//current повертає поточний елемент масиву
    while($value)
    {
        echo "<tr><td>$value</td></tr>\n";
        $value = next($data);
        //next - переміщують показник на елемент вперед на один елемент;
        //next – спочатку змінює покажчик, потім – повертає значення, each–навпаки;
    }
    echo '</table>';
    echo"<div>Кількість параметрів:". func_num_args()."<br />";
    //Функція func_num_args() визначає, скільки аргументів було передано функції користувача
    $args = func_get_args();
    //func_get_args() повертає масив, який містить ці аргументи
    foreach ($args as $arg)
        var_dump($arg);
    echo "</div>";
}


function generateRandomArray(){
    $array = [];
    for($i = 0; $i < 10; ++$i){
        $array[] = mt_rand(1, (9 + 10));
    }
    return $array;
}

function squareArray(...$values){
    foreach($values as &$value){
        $value *= $value;
    }
    return $values;
}

function sumOfEvenAndProductOfOdd(){
    $array = [
      "sum" => 0,
      "product" => 1
    ];
    for($i = 0; $i <= 20; ++$i){
        if($i % 2 == 0){
            $array["sum"] += $i;
        }else{
            $array["product"] *= $i;
        }
    }
    return $array;
}

function valueOfFunctionTwoX(){
    $array = [];
    for($x = 0; $x <= 4; $x += 0.5){
        $array[$x] = 2 * $x;
    }
    return $array;
}

function getLine(){
    $array = [];
    for($i = 0; $i < 20; ++$i){
        if(($i+1) % 3 == 0){
            $array[] = "?";
        }else{
            $array[] = "*";
        }
    }
    return implode("", $array);
}

function printArrayOriginReverse(...$values){
    printArray($values);
    echo "<br>Reverse:<br>";
    printArray(array_reverse($values));
}

function printArrayOriginReverseWithArray($values){
    printArray($values);
    echo "<br>Reverse:<br>";
    printArray(array_reverse($values, true));
}

function printArray($array){
    foreach($array as $key => $value){
        echo $key . ": " . $value . "<br>";
    }
}

function create2DArray(){
    $N = ( 9 % 10 + 1 ) * 2;
    $array = [];
    for($i = 0; $i < $N; ++$i){
        for($j = 0; $j < $N; ++$j){
            $array[$i][$j] = mt_rand(1, 100);
        }
    }
    return $array;
}

function print2DArray($array){
    $minimalValues = [];
    $lastColumn = [];
    $last = 0;
    for($i = 0; $i < count($array); ++$i){
        $minimalValues[$i] = PHP_INT_MAX;
        for($j = 0; $j < count($array[$i]); ++$j){
            echo $array[$i][$j] . " ";
            if($array[$i][$j] < $minimalValues[$i]){
                $minimalValues[$i] = $array[$i][$j];
            }
            $last = $array[$i][$j];
        }
        $lastColumn[] = $last;
        echo "<br>";
    }

    echo "<br>Min elements of rows: <br>";
    printArray($minimalValues);

    echo "<br>Last column:<br>";
    printArray($lastColumn);

}

function squares($n){
    $array = range(1, $n);
    foreach($array as &$value){
        $value *= $value;
    }
    return $array;
}