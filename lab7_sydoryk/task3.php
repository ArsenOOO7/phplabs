<?php
require "../config.php";

class Student
{

    public $name;
    public $surname;
    public $group;

    /**
     * @param $name
     * @param $surname
     * @param $group
     */
    public function __construct($name = "DefaultName", $surname = "DefaultSurname", $group = "DefaultGroup")
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->group = $group;
    }

    /**
     * @return mixed|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed|string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed|string
     */
    public function getGroup()
    {
        return $this->group;
    }

}

$studentsInfo = [
    ["Name1", "Surname1", "ІПЗ-23"],
    ["Name2", "Surname2", "ІПЗ-23"],
    ["Name3", "Surname3", "ІПЗ-21"]
];

$studentsViaConstructor = [
    ["Name4", "Surname5", "ІПЗ-23"],
    ["Name5", "Surname6", "ІПЗ-23"],
    ["Name6", "Surname7", "ІПЗ-21"]
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

foreach($studentsViaConstructor as $info) {
    $students[] = new Student(...$info);
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
            <td><?php echo $student->getName(); ?></td>
            <td><?php echo $student->getSurname(); ?></td>
            <td><?php echo $student->getGroup(); ?></td>
        </tr>
    <?php endforeach; ?>
</table>
