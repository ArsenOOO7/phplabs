<?php
require "../config.php";

$message = "";
if(!empty($_POST)){

    $regex = "/^[1-7]\d{3}$/";
    $value = $_POST["post_code"];
    $message = !preg_match($regex, $value) ? "Неправильний код!" : "Правильно!";

}

?>

<p>
    Країна: Македонія
</p>
<p>
    Чотири цифри. Перша від 1 до 7
</p>
<p>
    Зразки: 1484, 7225, 2330
</p>

<form action="task5.php" method="post">
    <p>
        <label for="post_code"></label>
        <input type="text" name="post_code" id="post_code">
    </p>
    <p>
        <input type="submit">
        <span><?php echo $message; ?></span>
    </p>
</form>
