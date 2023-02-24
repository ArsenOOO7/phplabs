<?php

require "../config.php";
require "images.php";

if(!empty($_GET)){

    $image = $_GET["image"];

    $array_key = mb_strtoupper($image[0]) . substr(mb_strtolower($image), 1);

    $to_select = $_GET["right"];
    $keys = array_keys($images);

    if(!in_array($array_key, $keys)){
        die("UNDEFINED IMAGE!!!");
    }

    echo "<p><img src='{$images[$array_key][1]}' width='100px' height='auto'> </p>";
    if(strpos( $image, mb_strtolower($to_select)) !== false){
        echo "<p> This is correct image! </p>";
    }else{
        echo "<p> This is incorrect image! </p>";
    }

}