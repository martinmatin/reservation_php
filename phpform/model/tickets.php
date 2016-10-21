<?php
class Ticket
{


    private $destination;
    private $nbPlace;
    private $cancelInssurance;
    private $name;
    private $age;


    public function setDestination($destination){
        $this->destination =  filter_var($destination, FILTER_SANITIZE_STRING);
    }

    public function setNbPlace($nbPlace){
        $this->nbPlace =  filter_var($nbPlace, FILTER_SANITIZE_STRING);
    }

    public function setCancelInssurance($cancelInssurance){
        $this->cancelInssurance =  filter_var($cancelInssurance, FILTER_SANITIZE_STRING);
    }

    public function setName($cancelInssurance){
        $this->name =  filter_var($cancelInssurance, FILTER_SANITIZE_STRING);
    }

    public function setAge($cancelInssurance){
        $this->age =  filter_var($cancelInssurance, FILTER_SANITIZE_STRING);
    }

    public function getNbplace(){
      return $this->$nbPlace;
    }



    public function afficherCommande() {


        $data = ("Résumé, commande du client : ");

        $data .= "<BR>Destination: ".$this->destination;

        $data .=  "<BR>Nb place : ".$this->nbPlace;

        $data .=  "<BR>Cancel inssurance : ".$this->cancelInssurance;

        $data .=  "<BR>Name: ".$this->name;

        $data .=  "<BR>Age: ".$this->age;

        // on peut également appeller des fonctions membres

        $data .=  "<HR />";

        return $data;

    }


}
