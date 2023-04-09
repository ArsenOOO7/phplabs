<?php
require "../config.php";
include_once "function.php";

$authors = createAuthorsArray();
?>
<style>
    #populated{
        background-color: darkviolet;
        color: white;
    }
</style>
<table border="1">

    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Books</th>
    </tr>
    <?php foreach($authors as $author): ?>

        <tr>
            <td><?php echo $author["name"]; ?></td>
            <td><?php echo $author["surname"]; ?></td>
            <td><?php echo $author["books"]; ?></td>
        </tr>

    <?php endforeach; ?>
</table>
<br>

<?php
echo count(array_filter($authors, function($array){
    return $array["books"] > 2;
}, ARRAY_FILTER_USE_BOTH)) . " authors have > 2 books<br>";

$cities = createCitiesArray();
?>

<hr>

<table border="1">

    <?php foreach($cities as $city => $values): ?>
        <?php $maxPop = getMaxStreetPopulation($values["streets"]); ?>
        <tr>

            <td colspan="2"><?php echo $city; ?></td>
        </tr>
            <?php foreach($values["streets"] as $street => $pop): ?>
                <tr>
                    <td> <?php echo $street; ?></td>
                    <td <?php if($maxPop == $pop) echo "id='populated'"; ?>> <?php echo $pop; ?></td>
                </tr>
            <?php endforeach; ?>

    <?php endforeach; ?>

</table>

<?php foreach($cities as $city => $values): ?>

    <p><?php echo $city . ": " . countPopulationOfCity($values); ?></p>

<?php endforeach; ?>
