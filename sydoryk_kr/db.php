<?php
session_start();
require __DIR__."/../config.php";

define("BASE", PATH . "/sydoryk_kr");
define("INDEX", "/sydoryk_kr/");

$datasource = json_decode(file_get_contents(__DIR__ . "/../data/database.json"), true)["datasource"];

if(PATH == "") {
    $datasource["host"] = "localhost";
    $datasource["user"] = "root";
    $datasource["password"] = "";
}

$database = mysqli_connect($datasource["host"], $datasource["user"], $datasource["password"], "epiz_33550669_kr");
if($database->connect_errno){
    die("Cannot connect to database!");
}

$database->query("SET NAMES utf8");
$database->query("create table if not exists sydoryk_users(
    id integer primary key auto_increment not null ,
    name varchar(255) not null ,
    surname varchar(255) not null,
    login varchar(255) unique not null ,
    password varchar(255) not null
) CHARACTER SET utf8mb4");


$database->query("
    create table if not exists storage(
        id integer primary key auto_increment not null,
        title varchar(56) not null,
        file varchar(256) not null,
        amount integer default 0 not null,
        price integer default 0 not null
    ) CHARACTER SET utf8mb4
");

$database->query("create table if not exists users_products(
    user_id integer not null ,
    product_id integer not null ,
    amount integer not null,
    price integer not null,
    buy_date datetime default now(),
    foreign key (user_id) references sydoryk_users(id) on delete cascade,
    foreign key (product_id) references storage(id) on delete cascade
) CHARACTER SET utf8mb4");

require_once "menu.php";
