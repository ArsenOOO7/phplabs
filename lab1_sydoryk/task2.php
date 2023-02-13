<?php
require("../config.php");
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<form action="task2_post.php" method="post">

    <select name="task_number" id="">
        <option value="1">Обчислення максимальної температури</option>
        <option value="2">Об-лення мінімальної т-ри</option>
        <option value="3">Об-лення середньої т-ри</option>
    </select>
    
    <p>
        <input type="text" name="temp_f" placeholder="Перше значення...">
    </p>

    <p>
        <input type="text" name="temp_s" placeholder="Друге значення...">
    </p>

    <p>
        <input type="text" name="temp_t" placeholder="Третє значення...">
    </p>

    <p>
        <input type="submit" value="Send">
    </p>

</form>

</body>
</html>