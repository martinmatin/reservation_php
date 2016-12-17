<?php
session_start();
require  '../model/tickets.php';
require  '../model/person.php';
require  '../view/ShowTable.php';

// connexion et séletion de la base
$mysqli = new mysqli("localhost", "root", "", "database");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

//Exécuter des requêtes SQL
$query = "SELECT * FROM reservation";
$result = $mysqli->query($query) or die('Query failed');


$ShowTable = new ShowTable();
echo $ShowTable->render('reservation_table.php',$result);

?>
