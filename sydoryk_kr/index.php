<?php
require_once "db.php";
?>

<h1>Інтернет-Магазин. Сидорик Арсен Юрійович №9 (тема - Овочі)</h1>

<?php

if(isset($_SESSION["register"])){
    echo "<p>Ви успішно зареєструвалися</p>";
    unset($_SESSION["register"]);
}

if(isset($_SESSION["logout"])){
    echo "<p>Ви успішно вийшли з акаунта</p>";
    unset($_SESSION["logout"]);
}

require_once "./storage/products.php";
