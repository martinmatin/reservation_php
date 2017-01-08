<?php
session_start();
require  '../model/tickets.php';
require  '../model/person.php';
require  '../view/view.php';

   if(isset($_SESSION["reservationModel"])){
       $localTicket = unserialize($_SESSION["reservationModel"]);

   } else {
       $localTicket = new Ticket();
   }

$view = new View();


$mysqli = new mysqli("localhost", "root", "", "database");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    return;
}


  echo "isUpdateMode" .$localTicket->isUpdateMode()."<br /><hr/>"; // we check if it is in update mode
if($localTicket->isUpdateMode()){ // If it is, we make an UPDATE, if not, an INSERT

  $sqlReservation = "UPDATE `database`.`reservation` set destination='".$localTicket->getDestination()."', assurance='".$localTicket->getCancelInssurance()."', total=".$localTicket->totalPrice()." WHERE id=".$localTicket->getId().";";

  if (! $mysqli->query($sqlReservation) ) {
    echo "Error updating record reservation:" . $mysqli->error;
    return;
  }


  foreach($localTicket->getPeople() as $person){

    $sqlPeople = "UPDATE INTO `database`.`people` set nom='".$person->getName()."',age=". $person->getAge()." where id=". $person->getId() ." and id_reservation=". $localTicket->getId() .")";

    if (! $mysqli->query($sqlPeople) ) {
      echo "Error updating record peole:" . $mysqli->error;
      return;
    }

  }



} else {

  $sqlReservation = "INSERT INTO `database`.`reservation` (`destination`,`assurance`,`total`) VALUES('".$localTicket->getDestination()."','".$localTicket->getCancelInssurance()."',".$localTicket->totalPrice().");";
  echo "sqlReservation: " . $sqlReservation."<br /><hr/>";;
  if (! $mysqli->query($sqlReservation) ) {
    echo "Error inserting record reservation:" . $mysqli->error;
    return;
  }


  $id_insert_reservation = $mysqli->insert_id;

  foreach($localTicket->getPeople() as $person){

    $sqlPeople = "INSERT INTO `database`.`people` (`nom`,`age`, `id_reservation`) VALUES('".$person->getName()."',". $person->getAge() .", '$id_insert_reservation');";
    echo "sqlPeople: " . $sqlPeople."<br /><hr/>";;


    if (! $mysqli->query($sqlPeople) ) {
      echo "Error inserting record peole:" . $mysqli->error;
      return;
    }

  }


}








$view = new View();
echo $view->render('finish_order.php', array('modelTicket' => $localTicket));

session_destroy();

?>
