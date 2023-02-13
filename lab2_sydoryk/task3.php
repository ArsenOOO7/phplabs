<?php

require "../config.php";
if(!empty($_POST)){

    list($x, $y) = array_values($_POST);


    if(!is_numeric($x) || !is_numeric($y)){
        die("ONLY NUMBERS!!");
    }

    $result = 0;
    if($y > 3 and $x > 0){
        $result = 2 * sqrt($x) * $y;
    }else if((($y * $x * $x) / 2) > (3*$x) or ($x * $x) > (2 * $y)){
        $result = $x / ($y * $y);
    }else{
        $result = ($x * $x) / $y;
    }

    echo "<p> The result is: ". $result ." </p>";
    echo "<hr>";
}

?>

<form action="task3.php" method="post">

    <p>
        <label for="">X</label>
        <input type="text" name="x">
    </p>

    <p>
        <label for="">Y</label>
        <input type="text" name="y">
    </p>

    <p>
        <input type="submit" value="Send">
    </p>

</form>
