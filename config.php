<?php
$config['charset'] = 'utf-8';
$config['default_lng'] = 'ua';
$LastModified_unix = strtotime(date("D, d M Y H:i:s", filectime($_SERVER['SCRIPT_FILENAME'])));
$LastModified = gmdate("D, d M Y H:i:s \G\M\T", $LastModified_unix);
echo "Last modified: $LastModified"."<br>";

?>
    <html>
    <head>
        <meta http-equiv='Content-Type' content='text/html' charset='utf-8'>
        <link rel='stylesheet' href='http://dutchak-mariia.epizy.com/php/css/style.css' type='text/css' media='screen, projection'/>
        <script type='text/javascript' src='http://dutchak-mariia.epizy.com/php/js/jquery-3.6.0.min.js'></script>
        <script type='text/javascript' src='http://dutchak-mariia.epizy.com/php/js/my.js'></script>

    </head>
    <body>
    <p id="main"> <a href='http://dutchak-mariia.epizy.com/php/index.php'>На головну</a> </p>

    </body>
<?php
?>