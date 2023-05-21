<?php
require "./db.php";

if(empty($_GET) || !isset($_GET["id"])){
    die("Get is empty!");
}

$id = $_GET["id"];
$result = $database->query("select * from sydoryk_news where id = '${id}'");

if(!$result){
    die("Undefined news!");
}

$fetch = $result->fetch_assoc();
?>
<h1><?php echo htmlspecialchars($fetch["title"]); ?></h1>
<p><?php echo htmlspecialchars($fetch["content"]); ?></p>

<p><a href="task.php">Назад</a></p>