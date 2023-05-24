<?php
require_once __DIR__ . "/../db.php";

if(isset($_SESSION["user"])){
    header("Location: " . BASE);
}

$userNotFound = false;
if(!empty($_POST)){

    list($email, $password) = array_values($_POST);
    $prepare = $database->prepare("select * from sydoryk_users where login = ? and password = ?");
    $email = trim($email);
    $password = trim($password);
    $prepare->bind_param("ss", $email, $password);
    $prepare->execute();

    $result = $prepare->get_result();
    if(!$result->num_rows){
        $userNotFound = true;
    }else{
        $user = $result->fetch_assoc();
        $_SESSION["user"] = $user;
        header("Location: " . BASE);
    }

}

?>

<form action="" method="post">
    <p>
        <label for="">Пошта (логін)</label>
        <input type="email" name="login">
    </p>

    <p>
        <label for="">Пароль</label>
        <input type="password" name="password">
    </p>

    <p>
        <input type="submit">
    </p>
</form>

<?php if($userNotFound): ?>
    <p>Введено невірний логін чи пароль</p>
<?php endif; ?>

<p>
    <a href=<?php echo BASE ?>>Назад</a>
</p>
