<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File information</title>
</head>
<body>

<?php
require "../../config.php";


$file = "top1.php";
infoFile($file);

function infoFile($file){
    if(!file_exists($file)){
        echo $file . " not found!";
        return;
    }

    echo "{$file} - ".( is_file( $file ) ? "" : "не " )."файл<br>";
    echo "{$file} - ".( is_dir( $file ) ? "" : "не " )."каталог<br>";
    echo "{$file} ".( is_readable( $file ) ? "" : "не " )."доступний для читання<br>";
    echo "{$file} ".( is_writable( $file ) ? "" : "не " )."доступний для запису<br>";
    echo "размір {$file} в байтах - ".( filesize( $file ) )."<br>";
    echo "остання зміна {$file} - ".( date( "d MYH:i", filemtime( $file ) ) )."<br>";
    echo "останнє звернення до {$file} - ".( date( "d MYH:i", fileatime( $file ) ) )."<br>";
}

?>

</body>
</html>