<?php
class Ticket 
{
   

    private $destination;
    private $nbPlace;
    private $cancelInssurance;
    private $name;
    private $age;
    private $error;

    public function __construct() {
        $this->destination = "";
        $this->nbPlace = "";
        $this->cancelInssurance = "no";
        $this->name = "";
        $this->age = "";
        $this->error = "";

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

    public function getCancelInssurance(){
        return $this->cancelInssurance;   
    }

    public function setName($cancelInssurance){
        $this->name =  filter_var($cancelInssurance, FILTER_SANITIZE_STRING);   
    }

    public function getName(){
        return $this->name;   
    }

    public function setAge($cancelInssurance){
        $this->age =  filter_var($cancelInssurance, FILTER_SANITIZE_STRING);   
    }

    public function getAge(){
        return $this->age;   
    }



    public function afficherCommande() {


        $data = "Résumé, commande du client : <ul>";

        $data .= "<li>Destination: ".$this->destination."</li>";

        $data .=  "<li>Nb place : ".$this->nbPlace."</li>";

        $data .=  "<li>Cancel inssurance : ".$this->cancelInssurance."</li>";

        $data .=  "<li>Name: ".$this->name."</li>";

        $data .=  "<li>Age: ".$this->age."</li>";

        $data .=  "</ul>";

        return $data;

    }
    
    
}