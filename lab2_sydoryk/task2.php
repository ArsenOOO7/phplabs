<?php

require "../config.php";

function check_if_natural($value){
    return is_int($value) && $value > 0;
}

if(!empty($_GET)) {


    list($x, $y, $z) = array_values($_GET);

    if(!check_if_natural($x) || !check_if_natural($y) || !check_if_natural($z)){
        die("ONLY NATURAL NUMBERS!!!");
    }

    echo "<p>X: {$x}, Y: ${y}, Z: {$z}</p>";
    $result = ($x * $y) + ($x * $z) - ($y * $z);

    echo "<p> Result: " . $result . "</p>";
    echo "<hr>";
}

?>

<form action="task2.php" method="get">

    <p>
        <label for="">X</label>
        <input type="text" name="x">
    </p>

    <p>
        <label for="">Y</label>
        <input type="text" name="y">
    </p>

    <p>
        <label for="">Z</label>
        <input type="text" name="z">
    </p>

    <p>
        <input type="submit" value="Send">
    </p>
</form>