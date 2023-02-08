<?php
require("../config.php");
include_once("../db.php");
include_once("../function.php");
header("Content-Type: text/html; charset=".$config{'charset'});
/*if (!empty($_GET["zm"])) {echo "Ім'я переданої змінної ".$_GET["zm"];} else {echo "zminna not fount";}
$zm=$_GET["zm"];
if (!empty($_GET["ULogin"])) {echo "<br>Ім'я переданої змінної ULogin ".$_GET["ULogin"];} else {echo "<br>zminna ULogin not fount";}
$ULogin=$_GET["ULogin"];*/
 ?>
<!--<style>h3{text-align: center;}</style> -->
<html>
<title>My JS + Jquery</title> 
<body>
<br>
Це звичайний HTML документ.
<br>
<script language="JavaScript">
document.write("А це JavaScript!")
</script>
<br>
Знову документ HTML.
<br>
<form>
<input type="button" value="Click me" onClick="alert('Привіт')">
</form>
<form>
 <input type="button" value="Calculate (from file my.js)" onClick="calculation()">
</form>
<form id = "main_form">
a<input type="text" id = "t_a" value="10"><br>
b<input type="text" id = "t_b" value="-2"><br>
Результат<input type="text" id = "t_c" value=""><br>
<input type = "button" onClick = "fun();" value = "Розрахувати">
</form>
</form>
<h3 ><a href="../">Повернутися в меню</a><br></h3>
</div>
<script language="JavaScript">

// function calculation() {
//     let x= 12;
//     let y= 5;
//     let result= x + y;
//     alert(result);
//     }

function fun()
{
let a, b, sum=0.0, i=0.0, cur=0.0;
a = parseInt(main_form.t_a.value);
b = parseInt(main_form.t_b.value);
let to4nost = 0.001;
do
{
i++;
let factorial = 1;
for(let j=1;j<=i;j++)
factorial*=j;
cur = (2*a*i*i+i/b)/(factorial*factorial);
sum+=cur;
}while(cur>to4nost)
main_form.t_c.value = "" + sum;
}
</script>


</body>
</html>
