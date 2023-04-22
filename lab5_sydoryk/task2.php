<?php
require "../config.php";

$files = scandir(__DIR__);
echo "Files: <ul>";
foreach($files as $file){
    if(is_file($file)){
        echo "<li> " . $file . "</li>";
    }
}
echo "</ul><br>";
?>
<form action="task2.php" method="get">
    <p>
        <label for="">Filename</label>
        <input type="text" name="filename">
    </p>

    <p>
        <input type="submit">
    </p>
</form>

<?php

$file = $_GET["filename"] ?? "";
if(!empty($file)) {
    if (file_exists($file)) {
        echo "{$file} - " . (is_file($file) ? "" : "не ") . "файл<br>";
        echo "{$file} - " . (is_dir($file) ? "" : "не ") . "каталог<br>";
        echo "{$file} " . (is_readable($file) ? "" : "не ") . "доступний для читання<br>";
        echo "{$file} " . (is_writable($file) ? "" : "не ") . "доступний для запису<br>";
        echo "размір {$file} в байтах - " . (filesize($file)) . "<br>";
        echo "остання зміна {$file} - " . (date("d MYH:i", filemtime($file))) . "<br>";
        echo "останнє звернення до {$file} - " . (date("d MYH:i", fileatime($file))) . "<br>";
    } else {
        echo "File is not found!";
    }
}