<?php
class Ticket
{


    private $destination;
    private $nbPlace;
    private $cancelInssurance;
    private $people;
    private $error;
    private $id;

    public function __construct() {
        $this->destination = "";
        $this->nbPlace = "";
        $this->cancelInssurance = "Non";
        $this->name = "";
        $this->age = "";
        $this->error = "";
        $this->people = array();
        $this->id = "";



    }

    public function addPeople($person){
        $this->people[] =  $person; //push to array
    }

    public function getPeople(){
        return $this->people;
    }

    public function getPeopleIndex($index){
        if(isset($this->people[$index])){
            return $this->people[$index];
        }
        return null;
    }

    public function addError($error){
        $this->error .=  $error;
    }

    public function getError(){
        return $this->error;
    }

    public function hasError(){
        return (strlen ($this->error ) > 0);
    }

    public function setDestination($destination){
        $this->destination =  filter_var($destination, FILTER_SANITIZE_STRING);
    }

    public function getDestination(){
        return $this->destination;
    }

    public function setNbPlace($nbPlace){
        $this->nbPlace =  filter_var($nbPlace, FILTER_SANITIZE_STRING);
    }

    public function getNbPlace(){
        return $this->nbPlace;
    }

    public function setCancelInssurance($cancelInssurance){
        $this->cancelInssurance =  filter_var($cancelInssurance, FILTER_SANITIZE_STRING);
    }

    public function setId($id){
        $this->id =  filter_var($id, FILTER_SANITIZE_STRING);
    }

    public function getId(){
       return  $this->id;
    }


    public function isUpdateMode(){  //Help us to know if we UPDATE or INSERT to the database
        return !empty($this->id);
    }

    public function getCancelInssurance(){
        return $this->cancelInssurance;
    }



    public function toString() { //To display the information of a ticket


        $data = "<ul>";

        $data .= "<li>Destination: ".$this->destination."</li>";

        $data .=  "<li>Nombre de tickets : ".$this->nbPlace."</li>";

        $data .=  "<li>Assurance annulation : ".$this->cancelInssurance."</li>";

        $price = 0;

        foreach ($this->people as $person) {
            $data .=  $person->toString();
            $price += $person->getPrice();
        }

        $data .=  "</ul>";

        return $data;

    }

    public function totalPrice(){
      $price = 0;

      foreach ($this->people as $person) {
          $price += $person->getPrice();
      }
      return $price;
    }


}
