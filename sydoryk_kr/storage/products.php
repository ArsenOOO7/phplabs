<?php
require_once __DIR__ . "/../db.php";
$data = $database->query("select * from storage");
?>
<table>
    <tr>
        <th>Назва</th>
        <th>Кількість</th>
        <th>Ціна/кг</th>
        <th>Фото</th>
        <?php if(isset($_SESSION["user"])): ?>
            <th>Змінити</th>
            <th>Видалити</th>
        <?php endif; ?>
    </tr>
    <?php while($row = $data->fetch_assoc()): ?>
        <tr>
            <td><a href="<?php echo BASE . "/storage/show_product.php?id=".$row['id']; ?>"><?php echo htmlspecialchars($row["title"]); ?></a></td>
            <td><?php echo htmlspecialchars($row["amount"]); ?></td>
            <td><?php echo htmlspecialchars($row["price"]); ?></td>
            <td><img src = "<?php echo BASE . '/files/' . $row['file']; ?>" width="150px" height="150px" alt="image"></td>
            <?php if(isset($_SESSION["user"])): ?>
                <td><a href="<?php echo BASE . '/storage/change_product.php?id='.$row['id']; ?>"><button>Змінити</button></a></td>

            <td>
                <form action="<?php echo BASE . '/storage/delete_product.php'; ?>" method="post">
                    <input type="submit" value="Видалити" <?php if(!in_array($_SERVER["REMOTE_ADDR"], ALLOW_IPS)) echo "disable"; ?>">
                    <input type="number" name="id" value="<?php echo $row['id']; ?>" hidden>
                </form>
            </td>

            <?php endif; ?>
        </tr>
    <?php endwhile; ?>
</table>
<p>
    <?php if(isset($_SESSION["user"])): ?>
        <a href="<?php echo BASE . '/storage/add_product.php'; ?>">Додати</a>
    <?php endif; ?>
</p>
<?php if($_SERVER["REQUEST_URI"] !== "/php".INDEX):?>
    <p>
        <a href=<?php echo BASE ?>>Назад</a>
    </p>
<?php endif; ?>
