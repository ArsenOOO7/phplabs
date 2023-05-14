<?php
require "db.php";

$database->query("
    create table if not exists storage(
        id integer primary key auto_increment not null,
        title varchar(56) not null,
        file varchar(256) not null,
        amount integer default 0 not null,
        price integer default 0 not null
    )
");

$data = $database->query("select * from storage");
?>
<table>
    <tr>
        <th>Назва</th>
        <th>Кількість</th>
        <th>Ціна/кг</th>
        <th>Фото</th>
        <th>Змінити</th>
        <th>Видалити</th>
    </tr>
    <?php while($row = $data->fetch_assoc()): ?>
    <tr>
        <td><a href="show_product.php?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row["title"]); ?></a></td>
        <td><?php echo htmlspecialchars($row["amount"]); ?></td>
        <td><?php echo htmlspecialchars($row["price"]); ?></td>
        <td><img src = "./files/<?php echo $row['file']; ?>" width="150px" height="150px" alt="image"></td>
        <td><a href="change_product.php?id=<?php echo $row['id']; ?>"><button>Змінити</button></a></td>
        <td>
            <form action="delete_product.php" method="post">
                <input type="submit" value="Видалити" <?php if(!in_array($_SERVER["REMOTE_ADDR"], ALLOW_IPS)) echo "disable"; ?>">
                <input type="number" name="id" value="<?php echo $row['id']; ?>" hidden>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
    <p>
        <a href="add_product.php">Додати</a>
    </p>
    <p>
        <a href=<?php echo PATH . "/sublist.php?lab=8" ?>>Назад</a>
    </p>

<?php
$database->close();