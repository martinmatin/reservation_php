<?php

session_start();
require  '../model/tickets.php';
require  '../model/person.php';
require  '../view/view.php';
   if(isset($_SESSION["reservationModel"])){ //$session could be replace by an access to an DB
       $localTicket = unserialize($_SESSION["reservationModel"]);
       //the object is stored as a string in $SESSSION
       //so we need to transform it back as object
   } else {
       $localTicket = new Ticket(); //else empty input
   }

$view = new View();

$dest = (string)($localTicket->getDestination()); //destination
$assurance = (string)($localTicket->getCancelInssurance());
$price = (string)($localTicket->totalPrice());

//connexion et séletion de la base
$mysqli = new mysqli("localhost", "root", "", "database");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

//Exécuter des requêtes SQL
$query = "SELECT * FROM reservation";
$result = $mysqli->query($query) or die('Query failed');


//Insertion d'un enregistrement dans la table de réservation
$sql = "INSERT INTO `database`.`reservation` (`id`,`destination`,`assurance`,`total`)
        VALUES(($result->num_rows +1),'$dest','$assurance','$price');";
if ($mysqli->query($sql) === TRUE) {
  echo "Record updated successfully";
  $id_insert = $mysqli->insert_id;
}
else {
  echo "Error inserting record" . $mysqli->error;
}


//Insertion d'un enregistrement dans la table de people
foreach($localTicket->getPeople() as $person){
  $name = $person->getName();
  $age = $person->getAge();
  $sql = "INSERT INTO `database`.`people` (`id`,`nom`,`age`)
  VALUES(($result->num_rows +1),'$name','$age');";
  if ($mysqli->query($sql) === TRUE) {
    echo "Record updated successfully";
    $id_insert = $mysqli->insert_id;
  }
  else {
    echo "Error inserting record" . $mysqli->error;
  }
}
echo $view->render('detail_ticket.php', array('modelTicket' => $localTicket));

   ?>
