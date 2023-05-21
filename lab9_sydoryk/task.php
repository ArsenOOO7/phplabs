<?php
require "./db.php";

$result = $database->query("select * from sydoryk_news order by publish_date desc");

$mapped = [
    "Політика" => [],
    "Економіка" => [],
    "Події" => [],
    "Технології" => [],
    "Наука" => [],
    "Освіта" => []
];

$news_count = 0;
while($fetch = $result->fetch_assoc()){
    ++$news_count;
    $topic = trim($fetch["topic"]);
    if(count($mapped[$topic]) >= 3){
        continue;
    }
    $mapped[$topic][] = [$fetch["id"], trim($fetch["title"]), $fetch["publish_date"]];
}

file_put_contents("./files/out.txt", $news_count);

?>

<p>
    <a href="add_news.php"><button>Додати новину</button></a>
</p>

    <style>
        li{
            list-style: none;
        }
    </style>

<?php
foreach($mapped as $topic => $newsArray):
    if(empty($newsArray)){
        continue;
    }
?>

<div class="">
    <h3><a href="show_all_news.php?topic=<?php echo $topic; ?>"><?php echo htmlspecialchars($topic); ?></a></h3>
    <ul>
        <?php foreach($newsArray as $news): ?>
            <li>
                <?php echo htmlspecialchars($news[2]); ?>

                <a href="show_news.php?id=<?php echo $news[0]; ?>"><?php echo htmlspecialchars($news[1]); ?></a>
            </li>
        <?php endforeach; ?>
        <li><p><a href="show_all_news.php?topic=<?php echo $topic; ?>">Показати всі новини розділу</a></p></li>
    </ul>
</div>

<?php
endforeach;
$database->close();
?>

<p>
<form action="delete_news.php" method="post">
    <button type="submit">Delete news with 5 id</button>
</form>
</p>
