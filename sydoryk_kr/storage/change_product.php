<?php
require_once __DIR__ . "/../db.php";


if(!isset($_GET["id"])){
    die("Undefined ID");
}

$id = $_GET["id"];
$data = $database->query("select * from storage where id = {$id}");
$row = mysqli_fetch_assoc($data);

?>

    <form action="change_product.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
        <p>
            <label for="">Назва</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']);?>" required>
        </p>
        <p>
            <label for="">Кількість</label>
            <input type="number" name="amount" value="<?php echo htmlspecialchars($row['amount']);?>" required>
        </p>
        <p>
            <label for="">Ціна</label>
            <input type="number" name="price" value="<?php echo htmlspecialchars($row['price']);?>" required>
        </p>
        <p>
            <label for="">Фото</label>
            <input type="file" name="uploadfile" accept=".jpg, .jpeg, .png">
        </p>
        <p>
            <input type="submit">
        </p>
    </form>

    <p>
        <a href="task5-6.php">Назад</a>
    </p>

<?php

if(empty($_POST)){
    return;
}

list($title, $amount, $price) = array_values($_POST);

if(!empty($_FILES) && mb_strlen($_FILES["uploadfile"]["name"]) > 0) {
    $uploadDir = __DIR__ . "/files/";

    $uploadFile = $uploadDir . basename($row['file']);
    copy($_FILES["uploadfile"]["tmp_name"], $uploadFile);

    $fileName = $_FILES['uploadfile']['name'];
}else{
    $fileName = $row['file'];
}

$batch = $database->prepare("update storage set title = ?, amount = ?, price = ?, file = ? where id = ?");
$batch->bind_param("siisi", $title, $amount, $price, $fileName, $row['id']);

$batch->execute();
$batch->close();
$database->close();
header("Location: " . BASE . "/storage/products.php");