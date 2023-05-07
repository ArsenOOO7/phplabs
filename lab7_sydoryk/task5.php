<?php
require "../config.php";

class Table{

    private $element;

    public function __construct($element = 1){
        $this->element = $element;
    }


    public function calculate(){
        $values = range(1, 9);
        $result = [];
        foreach($values as $value){
            $result[$value] = $value * $this->element;
        }
        return $result;
    }

    /**
     * @return int|mixed
     */
    public function getElement()
    {
        return $this->element;
    }
}

class Controller{
    public static function printRows(Table $table){
        $print = "";
        $result = $table->calculate();
        $element = $table->getElement();
        foreach($result as $key => $value){
            $print .= "<tr><td>{$element} x {$key} = {$value}</td></tr>";
        }
        echo $print;
    }
    public static function printTable(Table $table){
        echo "<table>";
        Controller::printRows($table);
        echo "</table><hr>";
    }
}

$sample = range(1, 9);
foreach($sample as $value):
    Controller::printTable(new Table($value));
endforeach;