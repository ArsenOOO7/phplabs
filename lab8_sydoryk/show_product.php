<?php

if(!isset($_GET["id"])){
    die("Undefined ID");
}
require "db.php";

$id = $_GET["id"];
$data = $database->query("select * from storage where id = {$id}");
$row = $data->fetch_assoc();

?>

<style>
    .product{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    .info{
        width: 100%;
        display: flex;
        flex-direction: column;
    }
    .image_block{
        width: 50%;
    }
    img{
        width: 150px;
        height: 150px;
    }
    li{
        list-style: none;
    }
</style>

<h4><?php echo htmlspecialchars($row['title']); ?></h4>
<div class="product">
    <div class="image_block"><img src="./files/<?php echo $row['file']; ?>" alt=""></div>
    <div class="info">
        <h4>Кількість: <?php echo $row['amount'];  ?></h4>
        <h4>Ціна: <?php echo $row['price'];  ?></h4>
    </div>
</div>

<form action="buy_product.php" method="post">
    <input type="number" name="id" value="<?php echo $id; ?>" hidden>
    <p>
        <label for="">Кількість</label>
        <input type="number" name="amount">
    </p>
    <p>
        <input type="submit" value="Купити">
    </p>
</form>

<?php
if(isset($_GET["message"])){
    echo "<ul><li style='color:red;'>{$_GET['message']}</li></ul>";
}
?>

<p>
    <a href="task5-6.php">Назад</a>
</p>
