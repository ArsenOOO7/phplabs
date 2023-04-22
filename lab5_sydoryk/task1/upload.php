<?php
require "../../config.php";

$subdir = $_GET["subdir"] ?? "";
echo "Subdir: {$subdir}<br>";

?>

<form action="upload.php?subdir=<?php echo $subdir; ?>" method="post" enctype="multipart/form-data">

    <p>
        <label for="">File upload</label>
        <input type="file" name="uploadfile">
    </p>

    <p>
        <input type="submit">
    </p>

</form>

<?php

if(empty($_FILES)){
    return;
}

$uploadDir = __DIR__ . "/files/{$subdir}/";

if(!is_dir($uploadDir)){
    mkdir($uploadDir);
}

echo "Upload dir: " . $uploadDir . "<br>";
$uploadFile = $uploadDir . basename($_FILES['uploadfile']['name']);
echo "Upload file: " . $uploadFile . "<br>";

if(copy($_FILES["uploadfile"]["tmp_name"], $uploadFile)){
    echo "File is loaded! <br>";
}else{
    echo "File is not loaded! <br>";
}

echo "<p>Оригінальна назва: ".$_FILES['uploadfile']['name']."</p>";
echo "<p>Тип файлу: ".$_FILES['uploadfile']['type']."</p>";
echo "<p>Розмір: ".$_FILES['uploadfile']['size']."</p>";
echo "<p>Тимчасове ім'я: "  .$_FILES['uploadfile']['tmp_name']."</p>";