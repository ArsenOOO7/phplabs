<?php
require "../config.php";

$elements = [];
$inputs = [
    "name" => "text",
    "surname" => "text",
    "login" => "text",
    "password" => "password",
    "repeat_password" => "password",
    "email" => "email"
];
if(!empty($_POST)) {
    $regex = [
        "name" => "/([A-ZА-ЯІЇ]){1}([a-zа-яії]+)/u",
        "surname" => "/([A-ZА-ЯІЇ]){1}([a-zа-яії]+)/u",
        "login" => "/[a-z]/",
        "password" => "/(?=.*[a-z])(?=.*\d)[a-zA-Z\d]{6,}/",
        "repeat_password" => "/(?=.*[a-z])(?=.*\d)[a-zA-Z\d]{6,}/",
        "email" => "/([a-zA-Z\d]+)(\.[a-zA-Z\d]+)*@([a-zA-Z\d]+)(\.[a-zA-Z\d]+)*/"
    ];

    $image_source = "https://upload.wikimedia.org/wikipedia/commons/thumb/3/3b/Eo_circle_green_checkmark.svg/2048px-Eo_circle_green_checkmark.svg.png";

    $password = $_POST["password"];
    $repeat_password = $_POST["repeat_password"];

    foreach ($_POST as $key => $value) {
        $elements[$key] = [];
        if (!preg_match($regex[$key], $value)) {
            $elements[$key]["messages"] = "<span>Invalid data!</span>";
            $elements[$key]["class"] = "error-field";
        }else{
            $elements[$key]["messages"] = "<img src = '{$image_source}'>";
        }
    }

    if ($password != $repeat_password) {
        $elements["repeat_password"]["messages"] = "<span>Passwords do not match!</span>";
        $elements["repeat_password"]["class"] = "error-field";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task4</title>
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

</head>
<body>

<form action="task4.php" method="post">
    <?php
    foreach($inputs as $input => $type):
    ?>
        <p>
            <label for="<?php echo $input; ?>"><?php echo ucfirst($input); ?></label>
            <input value="<?php echo $_POST[$input] ?? '' ?>" type="<?php echo $type; ?>" name="<?php echo $input; ?>" id="<?php echo $input; ?>" class="<?php echo $elements[$input]['class'] ?? ''; ?>">
            <?php echo $elements[$input]["messages"] ?? '' ?>
        </p>
    <?php endforeach; ?>
    <p>
        <input type="submit">
    </p>
</form>

</body>
</html>