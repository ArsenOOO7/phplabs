<?php

if(!isset($_GET["id"])){
    die("Undefined ID");
}
require_once __DIR__ . "/../db.php";

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
    <div class="image_block"><img src="<?php echo BASE . '/files/' . $row['file']; ?>" alt=""></div>
    <div class="info">
        <h4>Кількість: <?php echo htmlspecialchars($row['amount']);  ?></h4>
        <h4>Ціна: <?php echo htmlspecialchars($row['price']);  ?></h4>
    </div>
</div>

<form method="post" action="<?php echo BASE . "/storage/buy_product.php"; ?>">

    <input type="number" name="id" value="<?php echo $id; ?>" hidden>
    <p>
        <label for="">Кількість</label>
        <input type="number" name="amount" <?php if(!isset($_SESSION["user"])) echo "disabled"; ?>>
    </p>
    <p>
        <input type="submit" value="Купити" <?php if(!isset($_SESSION["user"])) echo "disabled"; ?>>
    </p>

    <?php if(!isset($_SESSION["user"])) echo "<p> Для покупки вам необхідно ввійти!</p>"; ?>

</form>

<?php
if(isset($_SESSION["product_message"])){
    echo "<ul><li style='color:red;'>{$_SESSION['product_message']}</li></ul>";
    unset($_SESSION["product_message"]);
}
?>

<p>
    <a href=<?php echo BASE ?>>Назад</a>
</p>