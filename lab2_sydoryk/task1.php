<?php

require "../config.php";

if(!empty($_GET)){

    list($a, $action, $b) = array_values($_GET);

    if(!is_numeric($a) || !is_numeric($b)){
        die("ONLY NUMBERS!!!");
    }

    $result = 0;
    switch($action){

        case 1:
            $result = $a - $b;
        break;

        case 2:
            $result = $a*$b;
        break;

        case 3:
            $result = $a % $b;
        break;

        default: die("UNDEFINED!!!");

    }

    echo "<p> The result is: " . $result . "</p>";
    echo "<hr>";

}

?>

<form action="task1.php">

    <p>
        <input type="text" name="a">
        <select name="action">
            <option value="1">-</option>
            <option value="2">*</option>
            <option value="3">%</option>
        </select>
        <input type="text" name="b">
    </p>
    <p>
        <input type="submit" value="Send">
    </p>
</form>
