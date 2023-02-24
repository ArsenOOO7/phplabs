<?php

require "../config.php";
require "images.php";

$values = getRandomImages();
$to_select = array_rand($values);
?>

    <style>
        img{
            width: 100px;
            height: auto;
        }
    </style>

    <h1>Select fruit <?php echo  $to_select; ?></h1>
<?php
foreach($values as $name => $image_data):
    ?>
    <p><a href = "<?php echo $image_data[0]. "&right=" . $to_select;; ?>"><img src="<?php echo $image_data[1]; ?>"</a></p>
<?php
endforeach;
?>