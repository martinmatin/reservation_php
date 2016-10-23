<?php
session_start();
require  '../model/tickets.php';


if ( isset($_POST['reservation'])  //if I have data from the form
  && isset($_SESSION["reservationModel"])) { //if I have a model

  $localTicket = unserialize($_SESSION["reservationModel"]); //string to object

  $name = $_POST['name'];
  $localTicket->setName($name);
  $age = $_POST['age'];
  $localTicket->setAge($age);

      $_SESSION["reservationModel"] = serialize($localTicket); //object to string


      header('Location: ../view/detail_ticket.php');  



}



 ?>