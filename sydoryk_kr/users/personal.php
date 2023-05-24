<?php

require_once __DIR__ . "/../db.php";

if(!array_key_exists("user", $_SESSION)){
    echo "<p>Увідійтіть в акаунт </p>";
    return;
}

$user = $_SESSION["user"];
?>

<h1>Інформація про <?php echo $user["name"] . " " . $user["surname"]; ?></h1>
<table>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <tr>
        <td><?php echo $user["name"]; ?></td>
        <td><?php echo $user["surname"]; ?></td>
        <td><?php echo $user["login"]; ?></td>
        <td><?php echo $user["password"]; ?></td>
    </tr>
</table>

<p>
    <a href=<?php echo BASE ?>>Назад</a>
</p>
