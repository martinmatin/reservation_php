<?php
session_start();
//print_r($_SESSION);
require  '../model/tickets.php';
require  '../model/person.php';
require  '../view/view.php';

$localTicket = new Ticket();

// connection to database
$mysqli = new mysqli("localhost", "root", "", "database");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


// Concatanate the table of reservation and people to display it on the list
$query = "SELECT GROUP_CONCAT(people.nom SEPARATOR ', ') as name, GROUP_CONCAT(people.age SEPARATOR ', ') as age, reservation.id as id_reservation, reservation.destination, reservation.assurance, reservation.total FROM people JOIN reservation ON people.id_reservation = reservation.id GROUP BY reservation.id";
$result = $mysqli->query($query) or die('Query failed');


if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = null;
}

/** gets the id from the query if we want to edit or delete a reservation
 *  the id help us to know which reservation we are editing or deleting
 */
if (isset($_GET['id'])) {
    $_SESSION["id"] = $_GET['id'];
}
if ($action =='delete'){
  $mysqli->query("DELETE FROM reservation WHERE id=" . $_SESSION["id"] . "");
  $mysqli->query("DELETE FROM people WHERE id=" . $_SESSION["id"] . "");

  $query = "SELECT * FROM reservation";
  $result = $mysqli->query($query) or die('Query failed');

  $query = "SELECT * FROM people";
  $people = $mysqli->query($query) or die('Query failed');

}

if ($action =='edit'){
  $localTicket = new Ticket(); //else empty input

  $localTicket->setId($_SESSION["id"]);


  $res = $mysqli->query("SELECT id,destination FROM reservation WHERE id = " . $_SESSION["id"] . "");
  $row = $res->fetch_assoc();
  $localTicket->setDestination($row['destination']);
  $localTicket->setId($row['id']);

  $res = $mysqli->query("SELECT id,nom,age,id_reservation FROM people WHERE id = " . $_SESSION["id"] . "");
  $nombre_place=0;
  while ($row = $res->fetch_assoc()) {

    $person = new Person($row['nom'] ,$row['age']);
    $person->setId($row['id']);
    $person->setIdReservation($row['id_reservation']);

    $localTicket->addPeople($person);

    $nombre_place+=1;

  }


  $localTicket->setNbPlace($nombre_place);
  $_SESSION["reservationModel"] = serialize($localTicket);



  $view = new View();
  echo $view->render('form_reservation.php', array('modelTicket' => $localTicket));
}


else{
$view = new View();
//TODO result should be an array of ticket but no time
echo $view->render('reservation_table.php', array('modelReservation' => $result));
}
?>
