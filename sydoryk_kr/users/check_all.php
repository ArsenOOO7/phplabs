<?php
require_once __DIR__ . "/../db.php";

$data = $database->query("select * from sydoryk_users");
?>

<table>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <?php while($row = $data->fetch_assoc()): ?>
        <tr>
            <td><?php echo htmlspecialchars($row["name"]); ?></td>
            <td><?php echo htmlspecialchars($row["surname"]); ?></td>
            <td><?php echo htmlspecialchars($row["login"]); ?></td>
            <td><?php echo htmlspecialchars($row["password"]); ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<p>
    <a href=<?php echo BASE ?>>Назад</a>
</p>