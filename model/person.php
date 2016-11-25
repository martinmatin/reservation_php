<?php
class Person
{


    private $name;
    private $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }


    public function getName(){
        return $this->name;
    }


    public function getAge(){
        return $this->age;
    }

    public function getPrice(){
      if(($this->age)>12){
        return 15;
      }
      else{
        return 10;
      }
    }

    public function toString() {


        $data = "Information client: <ul>";

        $data .=  "<li>Nom: ".$this->name."</li>";

        $data .=  "<li>Age: ".$this->age."</li>";

        $data .=  "</ul>";

        return $data;

    }

}
