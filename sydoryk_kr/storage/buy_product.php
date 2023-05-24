<?php
if(empty($_POST)){
    die("Empty data!");
}
require_once __DIR__ . "/../db.php";

list($id, $amount) = array_values($_POST);
$row = $database->query("select * from storage where id = {$id}")->fetch_assoc();
$amount = abs($amount);

if($row["amount"] < $amount || $amount == 0){
    $_SESSION["product_message"] = "Неправильна кількість!";
    header("Location: show_product.php?id={$id}");
    return;
}

$batch = $database->prepare("update storage set amount = amount - ? where id = ?");
$batch->bind_param("ii", $amount, $id);
$batch->execute();
$batch->close();

$prepare = $database->prepare("insert into users_products(user_id, product_id, amount, price) values(?, ?, ?, ?)");
$price = $row["price"] * $amount;
$prepare->bind_param("iiii", $_SESSION["user"]["id"], $row["id"], $amount, $price);
$prepare->execute();
$prepare->close();

$database->close();

$_SESSION["product_message"] = "Ви успішно купили цей товар!!";
header("Location: show_product.php?id={$id}");