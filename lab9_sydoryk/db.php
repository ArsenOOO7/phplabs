<?php
require "../config.php";

$datasource = json_decode(file_get_contents("../data/database.json"), true)["datasource"];

if(PATH == "") {
    $datasource["host"] = "localhost";
    $datasource["user"] = "root";
    $datasource["password"] = "";
}

$database = mysqli_connect($datasource["host"], $datasource["user"], $datasource["password"], "epiz_33550669_lab9");
if($database->connect_errno){
    die("Cannot connect to database!");
}

$database->query("SET NAMES utf8");
$database->query("create table if not exists sydoryk_news(" .
    "id integer auto_increment primary key, " .
    "topic varchar(100) not null, " .
    "title varchar(100) unique not null, " .
    "content text not null, " .
    "publish_date DATETIME not null" .
    ") CHARACTER SET utf8mb4 auto_increment=1000");

$result = $database->query("select id from sydoryk_news");
$rows = $result->num_rows;

if(!$rows){

    $file = fopen("./files/news.txt", 'r');
    if(!$file){
        $database->query("drop table if exists sydoryk_news");
        die("Cannot open file!");
    }
    $content = fread($file, filesize("./files/news.txt"));
    $data = explode("&", $content);
    $query = "";
    for($i = 0; $i < count($data); ++$i){
        $data_vidm = explode("~", $data[$i]);
        $query .= "insert into sydoryk_news(topic, title, content, publish_date) 
            values('{$data_vidm[0]}', '{$data_vidm[1]}', '{$data_vidm[2]}', '{$data_vidm[3]}');";
    }

    $database->multi_query($query);

}


echo "<p> Established connection with database! </p>";