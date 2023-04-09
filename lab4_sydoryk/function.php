<?php

function fillArray($from, $to, $power){
    $array = [];
    for($i = $from; $i <= $to; ++$i){
        $array[] = pow($i, $power);
    }
    return $array;
}

function createFruitsArray(){
    return [
        2 => "Apple",
        3 => "Lemon",
        4 => "Pineapple",
        5 => "Blackberry"
    ];
}

function createCountriesArray(){
    return [
        "Ukraine" => [
            "name" => "Ukraine",
            "capital" => "Kyiv",
            "population" => 45e6
        ],
        "Poland" => [
            "name" => "Poland",
            "capital" => "Warsaw",
            "population" => 37.75e6
        ],
        "UK" => [
            "name" => "The United Kingdom",
            "capital" => "London",
            "population" => 67.33e6
        ]
    ];
}

function createAuthorsArray(){
    return [
        [
            "name" => "Arthur",
            "surname" => "Conan Doyle",
            "books" => 10
        ],
        [
            "name" => "George",
            "surname" => "Orwell",
            "books" => 3
        ],
        [
            "name" => "John",
            "surname" => "Tolkien",
            "books" => 45
        ],
        [
            "name" => "Walter",
            "surname" => "Scott",
            "books" => 51
        ],
        [
            "name" => "Agatha",
            "surname" => "Christie",
            "books" => 75
        ]
    ];
}

function createCitiesArray(){
    return [
        "Ivano-Frankivsk" => [
            "streets" => [
                "Chornovola" => 9000,
                "Konovaltsya" => 10000,
                "Hotkevycha" => 11000
            ]
        ],
        "Lviv" => [
            "streets" => [
                "Autumn Courtyard" => 4000,
                "Arthur Cedars" => 10000,
                "Roding Way" => 12000
            ]
        ],
        "Kyiv" => [
            "streets" => [
                "Thomson Lea" => 5000,
                "Jones Down" => 7000,
                "Jo Biden Avenue" => 10000
            ]
        ]
    ];
}

function countPopulationOfCity($city){
    return array_sum($city["streets"]);
}

function getMaxStreetPopulation($streets){
    return max(array_values($streets));
}