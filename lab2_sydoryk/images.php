<?php

$images = [

    "Apple" => ["task4_get.php?image=apple", "images/apple.png"],
    "Blackberry" => ["task4_get.php?image=blackberry", "images/1.jpg"],
    "Banana" => ["task4_get.php?image=banana", "images/3.jpg"],
    "Lemon" => ["task4_get.php?image=lemon", "images/4.jpg"],
    "Lime" => ["task4_get.php?image=lime", "images/5.jpg"],
    "Avocado" => ["task4_get.php?image=avocado", "images/6.jpg"],
    "Raspberry" => ["task4_get.php?image=raspberry", "images/2.jpg"]

];

function getFirstFour(){
    global $images;
    return array_slice($images, 0, 4, true);
}

function getRandomImages(){
    global $images;
    $image_copy = $images;
    shuffle($image_copy);
    $keys = array_rand($image_copy, 4);

//    var_dump($keys);
    $random_images = [];
    $array_key_list = array_keys($images);

    foreach($keys as $key){
        $random_images[$array_key_list[$key]] = $images[$array_key_list[$key]];
    }

    return $random_images;
}