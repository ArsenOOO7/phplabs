<?php

require "../config.php";
if(!empty($_GET)) {


    list($x, $y, $z) = array_values($_GET);

    if(!is_numeric($x) || !is_numeric($y) || !is_numeric($z)){
        die("ONLY NUMBERS!!!");
    }

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