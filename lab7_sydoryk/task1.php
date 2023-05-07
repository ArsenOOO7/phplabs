<?php
require "../config.php";

class Student{

    public $name;
    public $surname;
    public $group;

}
$studentsInfo = [
    ["Name1", "Surname1", "ІПЗ-23"],
    ["Name2", "Surname2", "ІПЗ-23"],
    ["Name3", "Surname3", "ІПЗ-21"]
];

$students = [];
$student = null;
foreach($studentsInfo as $info){
    $student = new Student();
    $student->name = $info[0];
    $student->surname = $info[1];
    $student->group = $info[2];
    $students[] = $student;
}
?>

<table>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Group</th>
    </tr>
    <?php  foreach($students as $student): ?>
    <tr>
        <td><?php echo $student->name; ?></td>
        <td><?php echo $student->surname; ?></td>
        <td><?php echo $student->group; ?></td>
    </tr>
    <?php endforeach; ?>
</table>