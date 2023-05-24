<?php
require_once __DIR__ . "/../db.php";

if(isset($_SESSION["user"])){
    header("Location: " . BASE);
}

?>

<form action="" method="post">
    <p>
        <label for="">Email</label>
        <input type="email" name="email">
    </p>
    <p>
        <input type="submit" value="Revise">
    </p>
</form>

<?php

if(!empty($_POST)){
    $email = $_POST["email"];
    $user = $database->query("select password from sydoryk_users where login = '${email}'");
    if(!$user->num_rows){
        echo "<p> User's not found!</p>";
    }else{
        $user = $user->fetch_assoc();
        echo "<p> Your password: {$user['password']} </p>";
    }
}
