<?php
require("config.php");
#include_once("db.php");
header("Content-Type: text/html; charset=".$config{'charset'});
?>
<html>
<title> My PHP</title> 
<form action="lab1/lab1.php">
<table border=0><tr><td>Login:</td><td><input type='text' name='ULogin'></td><tr>
<tr><td>Пароль:</td><td><input type='password' name='Passw'></td><tr>
<tr><td><input type='submit' value='Go' name='Send'></td><td>&nbsp</td></td></tr> </table>
</form>
<?php
$zm=10;
echo "<h2>Програмування мовою PHP</h2>
<h3>Перелік лабораторних робіт</h3>
<div class=list>
<a href=lab1/lab1.php?zm=$zm>PHP: lab1.php</a><br>
<a href=lab2/lab2.php?zm=".$zm.">PHP: lab2.php</a><br>
<a href=PHP_JQ/phpJQ.php>PHP+JQ</a><br>
<a href=labBD/lab8.php>PHP+BD MySQL</a><br>";
echo "</div>";
echo "zm=$zm <br>";
echo "Zm=$Zm <br>";
echo 'zm=$zm <br>';

?>

</html>
