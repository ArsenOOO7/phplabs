<?php
require "../config.php";

$file = fopen("files/tag1.txt", 'r');

$counter = 0;
$line = "";
?>
<table border="1px">
    <tr>
        <td>Tag</td>
        <td>Description</td>
    </tr>
    <?php while(!feof($file)):

        if($counter == 0){
            echo "<tr>";
        }

        $line = fgets($file, 1024);
        if($counter == 0) {
            $line = htmlspecialchars("<" . trim($line) . ">");
        }

        echo "<td> " . $line . "</td>";

        ++$counter;
        if($counter == 2){
            $counter = 0;
            echo "</tr>";
        }

    endwhile;
    ?>
</table>
