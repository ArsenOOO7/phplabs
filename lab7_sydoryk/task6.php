<?php
require "../config.php";

class Country{

    private $country;
    private $population;
    private $capital;

    public function __construct($country, $population, $capital)
    {
        $this->country = $country;
        $this->population = $population;
        $this->capital = $capital;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @return mixed
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * @return mixed
     */
    public function getCapital()
    {
        return $this->capital;
    }

    public function show(){
        $table = "<table>";

        $table .= "<tr>";
        $table .= "<td>country</td>";
        $table .= "<td>{$this->country}</td>";
        $table .= "</tr>";

        $table .= "<tr>";
        $table .= "<td>population</td>";
        $table .= "<td>{$this->population}</td>";
        $table .= "</tr>";

        $table .= "<tr>";
        $table .= "<td>capital</td>";
        $table .= "<td>{$this->capital}</td>";
        $table .= "</tr>";

        $table .= "</table><hr>";
        echo $table;
    }
}


$contries = [
    new Country("Austria", 9_000_000, "Vienna"),
    new Country("Australia", 25_690_000, "Canberra"),
    new Country("Argentina", 45_810_000, "Buenos Aires"),
    new Country("Afghanistan", 40_000_000, "Kabul"),
    new Country("Angola", 34_500_000, "Luanda"),
    new Country("Albania", 2_812_000, "Tirana"),
    new Country("Andorra", 79_034, "Andorra la Vella")
];

foreach($contries as $country){
    $country->show();
}