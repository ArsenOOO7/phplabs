<?php
require "../config.php";
?>

<form action="" method="post">
    <p>
        <label for="">Name</label>
        <input type="text" name="name" required>
    </p>

    <p>
        <label for="">Surname</label>
        <input type="text" name="surname" required>
    </p>

    <p>
        <label for="">Age</label>
        <input type="number" name="age" required>
    </p>

    <p>
        <label for="">Email</label>
        <input type="email" name="email" required>
    </p>
    <p>
        <input type="submit" value="Done">
    </p>
</form>

<?php

if(empty($_POST)){
    return;
}

class User{

    private $name;
    private $surname;
    private $age;
    private $email;


    public function fill($data = []){
        $this->name = $data["name"];
        $this->surname = $data["surname"];
        $this->age = $data["age"];
        $this->email = $data["email"];
    }

    public function show(){
        echo "<table>";
        echo "<tr>";

        echo "<td>Name</td>";
        echo "<td>{$this->name}</td></tr>";

        echo "<tr><td>Surname</td>";
        echo "<td>{$this->surname}</td></tr>";

        echo "<tr><td>Age</td>";
        echo "<td>{$this->age}</td></tr>";

        echo "<tr><td>Email</td>";
        echo "<td>{$this->email}</td></tr>";

        echo "</tr>";
        echo "</table>";
    }
}

$user = new User();
$user->fill($_POST);
$user->show();