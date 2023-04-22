<?php
require "../config.php";

$file = "files/task5.txt";
$contents = file_get_contents($file);
$oldContent = $contents;
$fop = fopen($file, 'r');

echo "<p>TEXT: {$contents} </p>";

echo "<p> 5.1 Функція, що виводить слова заданого тексту (файл last_name_text.txt) у
алфавітному порядку (для розбиття тексту на окремі елементи можна
скористатися функцією explode). </p>";

function getWords($fop){
    $array = [];
    while (($line = fgets($fop)) !== false) {
        $split = explode(" ", $line);
        foreach ($split as $word) {
            $word = trim($word);
            if (mb_strlen($word) >= 2) {
                $array[] = str_replace([",", ".", ":"], "", mb_strtolower($word));
            }
        }
    }
    return $array;
}

$array = getWords($fop);

//$array = array_unique($array);
sort($array, SORT_LOCALE_STRING);

echo "<ul>" . implode("<br>", $array) . "</ul>";

echo "<p> 5.2. Задано текст (файл last_name_text.txt). Вивести список двох слів, які
найчастіше зустрічаються у тексті.</p>";

$map = [];
foreach($array as $word){
    if(!array_key_exists($word, $map)){
        $map[$word] = 0;
    }
    ++$map[$word];
}

arsort($map);
$map = array_slice($map, 0, 2);
echo "<ul>";
foreach($map as $word => $count){
    echo "<li>" . $word . " => " . $count . "</li>";
}
echo "</ul>";

echo "<p>5.3. Задано текст (файл last_name_text.txt). Вивести найдовше слово тексту і його
довжину, якщо декілька слів мають найбільшу довжину, то вивести всі з них.</p>";

$longest_words = [];
$longest_word = "";
foreach($array as $word){
    if(mb_strlen($word) > mb_strlen($longest_word)){
        $longest_word = $word;
    }
}
foreach($array as $word){
    if(mb_strlen($word) == mb_strlen($longest_word)){
        $longest_words[] = $word;
    }
}

echo "<ul>";
foreach($longest_words as $word){
    echo "<li> {$word} => " . mb_strlen($word) . "</li>";
}
echo "</ul>";

echo "<p>5.4. Задано текст (файл last_name_text.txt). Вивести найкоротше слово тексту і
його довжину, якщо декілька слів мають найкоротшу довжину, то вивести всі з
них.</p>";

$shortest_words = [];
$shortest_word = $array[0];
foreach($array as $word){
    if(mb_strlen($word) < mb_strlen($shortest_word)){
        $shortest_word = $word;
    }
}
foreach($array as $word){
    if(mb_strlen($word) == mb_strlen($shortest_word)){
        $shortest_words[] = $word;
    }
}

echo "<ul>";
foreach($shortest_words as $word){
    echo "<li> {$word} => " . mb_strlen($word) . "</li>";
}
echo "</ul>";

echo "<p>5.5. Знайти в тексті (файл last_name_text.txt) всі слова, які починаються на першу
літеру вашого імені. Якщо таких слів не буде, то додайте до тексту будь-яке
речення, яке містить необхідні слова.</p>";

function search($array){
    $myNameWords = [];
    foreach($array as $word){
        if(mb_strtolower(mb_substr($word, 0, 1)) == 'а'){
            $myNameWords[] = $word;
        }
    }
    return $myNameWords;
}

$result = search($array);
if(empty($result)) {
    $contents .= " У PHP існує можливість створення асоціативних масивів.";
    fclose($fop);
    file_put_contents("files/task5.txt", $contents);
    $fop = fopen("files/task5.txt", 'r');
    $array = getWords($fop);
}
$result = search($array);

echo "Буква: 'А'<ul>";
foreach($result as $word){
    echo "<li> ". ucfirst($word) ." => " . mb_strlen($word) . "</li>";
}
echo "</ul>";

echo "<p>5.6. В тексті (файл last_name_text.txt) замінити всі малі літери “о” на великі “О”.</p>";
$contents = str_replace("о", "О", $contents);
file_put_contents("files/task5.txt", $contents);
echo $contents . "<br>";

fclose($fop);
file_put_contents("files/task5.txt", $oldContent);

echo "<p>5.7.Створити РНР-сценарій, який випадковим чином виводить абзац тексту з
п’яти заданих абзаців (текст візьміть зі свого варіанту + текст із наступних 4-х
варіантів).</p>";

$file_open = fopen("files/task57.txt", 'r');
$paras = [];
$text = "";

$line = "";
while (($line = fgets($file_open)) !== false) {
    if($line == PHP_EOL){
        $paras[] = $text;
        $text = "";
    }else{
        $text .= "<br>".$line;
    }
}

$paras[] = $text;
echo "<p>" . $paras[mt_rand(0, count($paras) - 1)] . "</p>";