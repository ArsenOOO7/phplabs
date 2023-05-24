<?php
require_once __DIR__ . "/../db.php";
if(!array_key_exists("user", $_SESSION)){
    echo "<p>Увідійтіть в акаунт </p>";
    return;
}

?>

<form action="add_product.php" method="post" enctype="multipart/form-data">
    <p>
        <label for="">Назва</label>
        <input type="text" name="title" required>
    </p>
    <p>
        <label for="">Кількість</label>
        <input type="number" name="amount" required>
    </p>
    <p>
        <label for="">Ціна</label>
        <input type="number" name="price" required>
    </p>
    <p>
        <label for="">Фото</label>
        <input type="file" name="uploadfile" accept=".jpg, .jpeg, .png" required>
    </p>
    <p>
        <input type="submit">
    </p>
</form>

<p>
    <a href=<?php echo BASE ?>>Назад</a>
</p>

<?php

if(empty($_POST)){
    return;
}
if(empty($_FILES)){
    return;
}

list($title, $amount, $price) = array_values($_POST);

$uploadDir = __DIR__ . "/../files/";

$uploadFile = $uploadDir . basename($_FILES['uploadfile']['name']);
copy($_FILES["uploadfile"]["tmp_name"], $uploadFile);

$fileName = $_FILES['uploadfile']['name'];

$batch = $database->prepare("insert into storage(title, amount, price, file) values(?, ?, ?, ?)");
$batch->bind_param("siis", $title, $amount, $price, $fileName);

$batch->execute();
$batch->close();
$database->close();
header("Location: " . BASE . "/storage/products.php");