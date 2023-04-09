<?php
require "../config.php";

if(empty($_POST)){
    die("Empty form!!");
}

$questions = [
    "Select language:", "Select fruit:", "Select day:", "Select days:"
];
$days = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday"
];

$values = [
    "language" => "",
    "fruit" => [],
    "day_s" => "",
    "day_m" => []
];

foreach($_POST as $key => $value){
    if(array_key_exists($key, $values)){
        $values[$key] = $value;
    }
}

$i = 0;
foreach($values as $key => $value){
    if(empty($value)){
        die("Answer on '{$questions[$i]}' is empty!");
    }
    $i++;
}

$i = 0;
?>
<table>

    <tr>
        <th>Question</th>
        <th>Answer(s)</th>
    </tr>

    <?php foreacH($values as $key => $value): ?>

    <tr>
        <td> <?php echo $questions[$i++]; ?> </td>
        <td><?php

            $answer = "";
            if(!is_array($value)){
                if($key == "day_s"){
                    $value = $days[$value];
                }
                $answer = $value;
            }else{
                if($key == "day_m"){
                    $day_values = [];
                    foreach($value as $day_key){
                        $day_values[] = $days[$day_key];
                    }
                    $answer = implode(", ", $day_values);
                }else{
                    $answer = implode(", ", $value);
                }
            }

            echo $answer;
        ?></td>
    </tr>
    <?php endforeach; ?>
</table>
