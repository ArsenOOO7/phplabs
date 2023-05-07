<?php
require "../config.php";

class Student{

    private $name;
    private $surname;
    private $group;

    /**
     * @param $name
     * @param $surname
     * @param $group
     */
    public function __construct($name, $surname, $group)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->group = $group;
    }


    public function getInfo(){
        return
            "<tr>" .
            "<td>".$this->name."</td>" .
            "<td>".$this->surname."</td>" .
            "<td>".$this->group."</td>" .
            "</tr>";
    }

}
$students = [
    new Student("Name1", "Surname1", "ІПЗ-23"),
    new Student("Name2", "Surname2", "ІПЗ-23"),
    new Student("Name3", "Surname3", "ІПЗ-21")
];
?>

<table>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Group</th>
    </tr>
    <?php  foreach($students as $student):
        echo $student->getInfo();
    endforeach; ?>
</table>
