<?php
require "../config.php";
include_once "function.php";

$countries = createCountriesArray();
?>

<table border="1">
    <tr>
        <th>Назва</th>
        <th>Столиця</th>
        <th>Населення</th>
    </tr>
    <?php foreach($countries as $country): ?>
        <tr>
            <td> <?php echo $country["name"]; ?> </td>
            <td> <?php echo $country["capital"]; ?> </td>
            <td> <?php echo number_format($country["population"]); ?> </td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<hr>
<br>

<?php foreach($countries as $country): ?>
    <p>Capital of <?php echo $country["name"]; ?> - <?php echo $country["capital"]; ?>,
        population - <?php echo number_format($country["population"]); ?></p>
<?php endforeach; ?>

<br>
<hr>
<br>

<?php
arsort($countries);
foreach($countries as $key => $values){
    echo "<p>";
    echo $key . ":<br>";
    foreach($values as $subkey => $value){
        echo $subkey . " => " . $value . "<br>";
    }
    echo "</p>";
}
?>


<br>
<hr>
<br>

<?php print_r($countries);