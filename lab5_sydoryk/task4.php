<?php
require "../config.php";

$file = fopen("files/tag2.txt", 'r');

$line = "";
$counter = 0;
?>
<table border="1px">
    <tr>
        <td>Tag</td>
        <td>Description</td>
    </tr>
    <?php while(!feof($file)):

        echo "<tr>";

        ++$counter;
        $line = fgets($file, 1024);
        $explode = explode(" ", $line, 2);

        echo "<td> " . htmlspecialchars($explode[0]) . "</td>";
        echo "<td> " . $explode[1] . "</td>";
        echo "</tr>";

    endwhile;
    ?>
</table>

<?php

file_put_contents("files/out.txt", "Всього у файлі tag2.txt описано {$counter} тегів!");
echo "<br>Вміст out.txt: " . file_get_contents("files/out.txt") . "<br>";
