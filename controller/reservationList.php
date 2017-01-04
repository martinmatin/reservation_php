<?php
session_start();
require  '../model/tickets.php';
require  '../model/person.php';
require  '../view/view.php';

$localTicket = new Ticket();

// connexion et séletion de la base
$mysqli = new mysqli("localhost", "root", "", "database");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
// echo $mysqli->host_info . "\n"

//Exécuter des requêtes SQL
$query = "SELECT * FROM reservation";
$result = $mysqli->query($query) or die('Query failed');

$query = "SELECT * FROM people";
$people = $mysqli->query($query) or die('Query failed');

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
  session_destroy();
  $localTicket = new Ticket(); //else empty input

  // $query = "SELECT * FROM reservation";
  // $result = $mysqli->query($query) or die('Query failed');

  $res = $mysqli->query("SELECT id,destination FROM reservation WHERE id = " . $_SESSION["id"] . "");
  $row = $res->fetch_assoc();
  $localTicket->setDestination($row['destination']);

  $res = $mysqli->query("SELECT id,nom,age FROM people WHERE id = " . $_SESSION["id"] . "");
  $nombre_place=0;
  while ($row = $res->fetch_assoc()) {
    // echo($row['id']);
    // echo($row['nom']);
    // echo($row['age']);
    //
    $person = new Person($row['nom'] ,$row['age']);
    $localTicket->addPeople($person);

    $nombre_place+=1;

  }
  $localTicket->setNbPlace($nombre_place);
  $view = new View();
  echo $view->render('form_reservation.php', array('modelTicket' => $localTicket));
}
// print($action);
// print($_SESSION["id"]);
// Numeric array
// Associative array
// $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
// printf ("%s (%s)\n",$row["id"],$row["destination"]);

else{
$view = new View();

echo $view->render('reservation_table.php', array('modelReservation' => $result),array('people' => $people));
}
?>
