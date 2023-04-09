<?php
require "../config.php";

if(empty($_POST)){
    die("Empty form!");
}

$need_values = [
    "name" => "",
    "surname" => "",
    "email" => "",
    "password" => "",
    "repeat_password" => ""
];

foreach($_POST as $key => $value){
    if(array_key_exists($key, $need_values)){
        $need_values[$key] = $value;
    }
}

foreach($need_values as $key => $value){
    if(empty($value)){
        die("Empty value on {$key}");
    }
}

if($need_values["password"] != $need_values["repeat_password"]){
    die("Passwords are not same!");
}

?>
<table border="1">
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Email</th>
        <th>Password</th>
        <th>Repeat password</th>
    </tr>
    <tr>
        <?php foreach($need_values as $value): ?>
            <td><?php echo $value; ?></td>
        <?php endforeach; ?>
    </tr>
</table>
