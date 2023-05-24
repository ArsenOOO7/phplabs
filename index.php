<?php
require "config.php";


$data = json_decode(file_get_contents("./data/config.json"), true);
$labs = array_keys(json_decode(file_get_contents("./data/labs.json"), true));

?>

<h1><?php echo $data["author"]; ?></h1>
<h2><?php echo $data["group"]; ?>. Варіант: <?php echo $data["n"]; ?></h2>

<ul>
<?php foreach($labs as $n => $link): ?>

    <?php $link = PATH . "/sublist.php?lab=".($n+1);
    $n = $n+1;
    echo "<li><a href='{$link}'><h3>Лабораторна робота {$n} </h3></a></li>";

endforeach; ?>
<li><a href="<?php echo PATH."/sydoryk_kr/index.php"; ?>"><h3>Контрольна робота</h3></a></li>
</ul>