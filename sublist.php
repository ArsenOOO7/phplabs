<?php
require "config.php";

$lab_number = $_GET["lab"];
$folder = "lab" . $lab_number . "_sydoryk";

if(!is_dir("./". $folder)){
    die("Undefined lab!");
}

$data = json_decode(file_get_contents("./data/labs.json"), true);
$tasks = $data[$lab_number];


?>
<h1>Лабораторна робота №<?php echo $lab_number ?></h1>

<ul>
    <?php foreach($tasks as $task): ?>

        <?php $link = $folder . "/" . $task . ".php"; ?>
        <li><a href="<?php echo $link; ?>"><h2>Завдання <?php echo $task; ?></h2></a></li>

    <?php endforeach; ?>
</ul>
