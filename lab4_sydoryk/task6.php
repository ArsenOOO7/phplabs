<?php
require "../config.php";
?>

<form action="register_form.php" method="post">

    <p>
        <label for="">Name</label>
        <input type="text" name="name" required>
    </p>

    <p>
        <label for="">Surname</label>
        <input type="text" name="surname" required>
    </p>

    <p>
        <label for="">Email</label>
        <input type="email" name="email" required>
    </p>

    <p>
        <label for="">Password</label>
        <input type="password" name="password" required>
    </p>

    <p>
        <label for="">Repeat password</label>
        <input type="password" name="repeat_password" required>
    </p>

    <p>
        <input type="submit">
    </p>

</form>
