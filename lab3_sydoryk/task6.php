<?php
require "../config.php";
include_once "function.php";

if(isset($_GET["variable"])){
    $variable = $_GET["variable"];
    if((int)$variable == $variable && $variable > 0){
        printArray(squares($variable));
    }else{
        echo "Не натуральне!<br>";
    }
}
?>

<form action="">
    <p>
        <label for="">Enter value</label>
        <input type="number" name="variable" placeholder="1">
    </p>
    <p>
        <input type="submit">
    </p>
</form>

<?php
include_once "task7.php";