<?php
require "./db.php";
$existsWithFiveId = $database->query("select * from sydoryk_news where id = 5")->fetch_assoc();
?>

<form action="" method="post">

    <p>
        <label for="">Розділ</label>
        <select name="topic">
            <option value="Політика">Політика</option>
            <option value="Освіта">Освіта</option>
            <option value="Економіка">Економіка</option>
            <option value="Технології">Технології</option>
            <option value="Наука">Наука</option>
            <option value="Події">Події</option>
        </select>
    </p>

    <p>
        <label for="">Заголовок</label>
        <input type="text" name="title">
    </p>

    <p>
        <label for="">Новина</label>
        <textarea name="content" cols="100" rows="30" style="resize: none"></textarea>
    </p>

    <?php if($existsWithFiveId == null): ?>
    <p>
        <label for="">Поставити 5 айді?</label>
        <input type="checkbox" value="false" name="five_id">
    </p>
    <?php endif; ?>

    <p>
        <input type="submit">
    </p>

</form>
<p><a href="task.php">Назад</a></p>
<?php

if(empty($_POST)){
    return;
}

$topic = trim($_POST["topic"]);
$title = trim($_POST["title"]);
$content = trim($_POST["content"]);
$id = $_POST["five_id"] ?? false;

$topics = [
        "Політика", "Освіта", "Економіка", "Технології", "Події", "Наука"
];

if(!in_array($topic, $topics)){
    die("Undefined topic!");
}

if(!$id) {
    $statement = $database->prepare("insert into sydoryk_news(title, topic, content, publish_date) values(?, ?, ?, now())");
    $statement->bind_param("sss", $title, $topic, $content);
}else{
    $statement = $database->prepare("insert into sydoryk_news(id, title, topic, content, publish_date) values(5, ?, ?, ?, now())");
    $statement->bind_param("sss", $title, $topic, $content);
}

$statement->execute();
$statement->close();

$database->close();

header("Location: task.php");