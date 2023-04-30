<?php
require "../config.php";

?>

    <form action="task2.php" method="get">
        <p>
            <label for="">Word</label>
            <input type="text" name="word">
        </p>
        <p>
            <input type="submit">
        </p>
    </form>

<?php

$word = "";
if(isset($_GET["word"])){
    $word = "|" . $_GET["word"];
}

$regex = "/([a-zа-яії]+)*((<?html>?|тег{$word})([\-a-zа-яії]+)*)/ui";
$replacement = "<b>".htmlspecialchars("$0")."</b>";
$text = file_get_contents("./files/text.txt");
$uploaded_text = htmlspecialchars($text);

$content = preg_replace($regex, $replacement, $uploaded_text);
echo $content;
echo "<br>";
echo "<br>";

$sentences = explode(".", $uploaded_text);
$rate = [];

foreach($sentences as $sentence){
    $matches = [];
    preg_match_all($regex, $sentence, $matches);

    $amount = count($matches[0]);
    if($amount > 0) {
        $rate[preg_replace($regex, $replacement, $sentence)] = $amount;
    }
}

arsort($rate);
foreach($rate as $sentence => $amount){
    echo $amount . ": " . $sentence . "<br><br>";
}