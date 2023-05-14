<?php

if(empty($_POST)){
   die("Empty data!");
}
require "db.php";
var_dump($_POST);
list($id, $amount) = array_values($_POST);
$row = $database->query("select * from storage where id = {$id}")->fetch_assoc();
$amount = abs($amount);

if($row["amount"] < $amount || $amount == 0){
    header("Location: show_product.php?id={$id}&message=Неправильна кількість!");
    return;
}

$batch = $database->prepare("update storage set amount = amount - ? where id = ?");
$batch->bind_param("ii", $amount, $id);
$batch->execute();
$batch->close();
$database->close();

header("Location: show_product.php?id={$id}&message=Ви успішно купили цей товар!!");
