<?php
require "db.php";
mysqli_query($database, "create table if not exists users(
    id integer primary key not null auto_increment,
    login varchar(56) not null,
    password varchar(56) not null)");

?>
<form action="register_user.php" method="post">
    <p>
        <label for="">Login</label>
        <input type="text" name="login">
    </p>

    <p>
        <label for="">Password</label>
        <input type="password" name="password">
    </p>

    <p>
        <input type="submit">
    </p>
</form>

<?php

$query = mysqli_query($database, "select * from users");
?>
<table>
    <tr>
        <th>Login</th>
        <th>Password</th>
    </tr>
    <?php while($row = mysqli_fetch_row($query)): ?>
        <tr>
            <td><?php echo htmlspecialchars($row[1]); ?></td>
            <td><?php echo htmlspecialchars($row[2]); ?></td>
        </tr>
    <?php endwhile; ?>
</table>
    <p>
        <a href="<?php echo PATH . "/sublist.php?lab=8" ?>">Назад</a>

    </p>


<?php
mysqli_close($database);