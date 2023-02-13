<?php

require "../config.php";
if(!empty($_GET)){

    $image = $_GET["image"];
    $possible_images = ["apple.png", "cucumber.jpg", "potato.jpg", "pumpkin.jpg"];

    if(!in_array($image, $possible_images)){
        die("UNDEFINED IMAGE!!!");
    }

    echo "<p><img src='images/{$image}' width='100px' height='auto'> </p>";
    if(strpos( $image, "apple") !== false){
        echo "<p> This is correct image! </p>";
    }else{
        echo "<p> This is incorrect image! </p>";
    }

}