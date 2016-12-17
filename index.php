<?php
//connexion et séletion de la base
// $mysqli = new mysqli("localhost", "root", "", "database");
// if ($mysqli->connect_errno) {
//     echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
// }
// echo $mysqli->host_info . "\n";
//
// //Exécuter des requêtes SQL
// $query = "SELECT * FROM reservation";
// $result = $mysqli->query($query) or die('Query failed');
//
// if ($result->num_rows ==0) {
//   echo "Aucune ligne trouvée, rien à afficher";
//
// }
//
// //Insertion d'un enregistrement
// $sql = "INSERT INTO `database`.`reservation` (`id`,`destination`,`assurance`,`total`) VALUES(1,'Bruxelles',TR);";
//
// echo "lol";
// if ($mysqli->query($sql) === TRUE) {
//   echo "Record updated successfully";
//   $id_insert = $mysqli->insert_id;
// }
// else {
//   echo "Error inserting record" . $mysqli->error;
// }
// //libération des résultats
// $result->close();
//
// //Fermeture de la connexion
// $mysqli->close();

session_start();
header('Location: ../reservation_php/controller/loadBookingController.php');
?>
