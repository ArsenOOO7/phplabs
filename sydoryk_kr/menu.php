<?php

$logged = $_SESSION["user"] ?? false;

?>

<ul>
    <li><a href="<?php echo BASE . '/storage/products.php'; ?>">Товари</a></li>
    <li><a href="<?php echo BASE . '/users/check_all.php'; ?>">Усі користувачі</a></li>
    <?php if(!$logged): ?>
        <li>Режим гостя</li>
        <li><a href="<?php echo BASE . '/users/login.php'; ?>">Вхід</a></li>
        <li><a href="<?php echo BASE . '/users/register.php'; ?>">Реєстрація</a></li>
        <li><a href="<?php echo BASE . '/users/forget_password.php'; ?>">Забули пароль?</a></li>
    <?php else: ?>
        <li>Вітаємо! <?php echo $_SESSION["user"]["name"]; ?> (операції з товарами ПРАЦЮЮТЬ)</li>
        <li><a href="<?php echo BASE . '/users/personal.php'; ?>">Інформація про акаунт</a></li>
        <li><a href="<?php echo BASE . '/users/logout.php'; ?>">Вихід з акаунта</a></li>
        <li><a href="<?php echo BASE . '/users/show_buys.php'; ?>">Покупки</a></li>
    <?php endif; ?>
</ul>

