<?php
class Person
{


    private $name;
    private $age;
    private $id;
    private $id_reservation;



    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
        $this->id = "";
        $this->id_reservation = "";

    }


    public function getName(){
        return $this->name;
    }

    public function setId($id){
        return $this->id = $id;
    }

    public function setIdReservation($id_reservation){
        return $this->id_reservation = $id_reservation;
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

    public function toString() {  //To display the information of a people


        $data = "Information client: <ul>";

        $data .=  "<li>Nom: ".$this->name."</li>";

        $data .=  "<li>Age: ".$this->age."</li>";

        $data .=  "</ul>";

        return $data;

    }

}
