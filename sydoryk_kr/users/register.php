<?php
require_once __DIR__ . "/../db.php";

if(array_key_exists("user", $_SESSION)){
    header("Location: " . BASE);
}

$elements = [];
$inputs = [
    "full_name" => "text",
    "password" => "password",
    "repeat_password" => "password",
    "email" => "email"
];

if(!empty($_POST)) {
    $regex = [
        "name" => "/([A-ZА-ЯІЇЄ]){1}([a-zа-яії]+)/u",
        "surname" => "/([A-ZА-ЯІЇ]){1}([a-zа-яії]+)/u",
        "password" => "/(?=.*[a-z])(?=.*\d)[a-zA-Z\d](?=.*[@$!%*#?&]){8,}/",
        "repeat_password" => "/(?=.*[a-z])(?=.*\d)[a-zA-Z\d]{6,}/",
        "email" => "/([a-zA-Z\d]+)(\.[a-zA-Z\d]+)*@pnu.edu.ua*/"
    ];

    $fullName = explode(" ", trim($_POST["full_name"]));
    $_POST["name"] = $fullName[0];
    $_POST["surname"] = $fullName[1];

    unset($_POST["full_name"]);
    $elements["full_name"] = [];

    $image_source = "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/Eo_circle_green_checkmark.svg/2048px-Eo_circle_green_checkmark.svg.png";

    $password = $_POST["password"];
    $repeat_password = $_POST["repeat_password"];

    $data = [];
    $error_messages = [
        "full_name" => "Два слова в одному полі, які починаються з великої літери;",
        "email" => "Email @pnu.edu.ua!",
        "password" => "має містити мінімум 8 символів, серед
них мінімум одну літеру, одну цифру і один із спеціальних символів, таких як
_ - . @ # $ % ^ &amp; ! ? *"
    ];

    $errors = 0;
    foreach ($_POST as $key => $value) {
        $elements[$key] = [];
        if (!preg_match($regex[$key], $value)) {
            $key = ($key == "name" or $key == "surname") ? $key = "full_name" : $key;
            $elements[$key]["messages"] = "<span>".$error_messages[$key]."</span>";
            $elements[$key]["class"] = "error-field";
            ++$errors;
        }else{
            $data[$key] = htmlspecialchars(trim($value));
        }
    }

    if ($password != $repeat_password) {
        $elements["repeat_password"]["messages"] = "<span>Passwords do not match!</span>";
        $elements["repeat_password"]["class"] = "error-field";
    }

    $check = $database->query("select id from sydoryk_users where login = '".$data["email"]."'");

    if($check->num_rows > 0){
        $elements["email"]["messages"] = "<span>Користувач з такою поштою уже існує!</span>";
        $elements["email"]["class"] = "error-field";
        ++$errors;
    }

    if($errors == 0 && count($data) == count($regex)) {
        $prepare = $database->prepare("insert into sydoryk_users(name, surname, login, password) values(?, ?, ?, ?)");
        $prepare->bind_param("ssss", $data["name"], $data["surname"], $data["email"], $data["password"]);
        $prepare->execute();
        $prepare->close();
        $_SESSION["register"] = true;
        header("Location: " . BASE);
    }
}
?>
<style>
    img{
        width: 20px;
        height: auto;
    }
    span{
        color: red;
    }
    .error-field{
        border: 4px solid red;
        color: red;
    }
</style>

<form action="" method="post">
    <?php
    foreach($inputs as $input => $type):
        ?>
        <p>
            <label for="<?php echo $input; ?>"><?php echo $input == "full_name" ? 'Name Surname' : ucfirst($input); ?></label>
            <input value="<?php echo $_POST[$input] ?? '' ?>" type="<?php echo $type; ?>" name="<?php echo $input; ?>" id="<?php echo $input; ?>" class="<?php echo $elements[$input]['class'] ?? ''; ?>">
            <?php echo $elements[$input]["messages"] ?? '' ?>
        </p>
    <?php endforeach; ?>
    <p>
        <input type="submit">
    </p>
</form>

<p>
    <a href=<?php echo BASE ?>>Назад</a>
</p>
