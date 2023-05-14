<?php
require "db.php";

$database->query("create table if not exists dusc(id integer primary key auto_increment, name_d varchar(100) unique, key_concept varchar(250))");
$database->query( "insert into dusc (name_d, key_concept) values ('Networks', 'HTTPS')");
$database->query("insert into dusc (name_d, key_concept) values ('AI','Modeling')");

?>

<html>
    <head> <title>LAB8- TASK 1-3</title></head>

    <body>
        <table border="2">
        <h2>Fetch result:</h2>
            <tr><th>Name</th><th>Key concept</th></tr>
            <?php
                $query_res = $database->query("select * from dusc");

                if (mysqli_num_rows($query_res) > 0) {
                    while($row = mysqli_fetch_row($query_res)) {
                       echo "<tr><td>" . $row[1]. "</td><td>".$row[2]."</td></tr>";
                    }
                } else {
                    echo "0 results";
                }
                $database->close();
            ?>
        </table>
        <h3 class='back'><a href=<?php echo PATH . "/sublist.php?lab=8" ?>>Назад</a></h3>
    </body>
</html>