<?php
require_once __DIR__ . "/../db.php";

if(!array_key_exists("user", $_SESSION)){
    echo "<p>Увідійтіть в акаунт </p>";
    return;
}

$user = $_SESSION["user"];

$result = $database->query("select pr.id, pr.title, pr.file, up.amount, up.price, up.buy_date from users_products up
    inner join storage pr on pr.id = up.product_id
    where up.user_id = " . $user["id"]);


?>
<h1>Ваші покупки:</h1>
<table>
    <tr>
        <th>Назва</th>
        <th>Фото</th>
        <th>Кількість</th>
        <th>Ціна</th>
        <th>Час</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><a href="<?php echo BASE . "/storage/show_product.php?id=".$row['id']; ?>"><?php echo htmlspecialchars($row["title"]); ?></a></td>
            <td><img src = "<?php echo BASE . '/files/' . $row['file']; ?>" width="150px" height="150px" alt="image"></td>
            <td><?php echo htmlspecialchars($row["amount"]); ?></td>
            <td><?php echo htmlspecialchars($row["price"]); ?></td>
            <td><?php echo htmlspecialchars($row["buy_date"]); ?></td>
        </tr>
    <?php endwhile; ?>
</table>
