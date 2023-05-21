<?php
require "./db.php";

if(empty($_GET) || !isset($_GET["topic"])){
    die("Get is empty!");
}

$topic = $_GET["topic"];
$result = $database->query("select * from sydoryk_news where topic = '${topic}' order by publish_date desc ");

?>
<h1><?php echo $topic; ?></h1>
<ul>
    <?php while($news = $result->fetch_assoc()): ?>
        <li>
            <?php echo htmlspecialchars($news['publish_date']); ?>

            <a href="show_news.php?id=<?php echo $news['id']; ?>"><?php echo htmlspecialchars($news['title']); ?></a>
        </li>
    <?php endwhile; ?>
</ul>

<p><a href="task.php">Назад</a></p>