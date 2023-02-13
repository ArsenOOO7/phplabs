<?php

$host = $_SERVER["HTTP_HOST"];
if(strpos($host, "localhost") !== false){
    $host = "";
}else{
    $host = "/php";
}

define("PATH", $host);

$config = [];
$config['charset'] = 'utf-8';
$config['default_lng'] = 'ua';

$LastModified_unix = strtotime(date("D, d M Y H:i:s", filectime($_SERVER['SCRIPT_FILENAME'])));
$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
echo "Last modified: $LastModified"."<br>";

?>
    <html>
    <head>
        <meta http-equiv='Content-Type' content='text/html' charset='utf-8'>

    </head>
    <body>
    <p id="main"> <a href='<?php echo $host ?>'>На головну</a> </p>

    </body>
<?php
?>