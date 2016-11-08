<?php
session_start();
require  '../model/tickets.php';

if ( isset($_POST['reservation'])  //if I have data from the form
&& isset($_SESSION["reservationModel"])) { //if I have a model

  $localTicket = unserialize($_SESSION["reservationModel"]); //string to object

  $name = $_POST['name'][1];
  $localTicket->setName($name);
  $age = $_POST['age'][1];
  $localTicket->setAge($age);

  for($i=0;$i<$localTicket->getNbPlace();$i++){
    // $name = $_POST['name'][$i];
    // $age = $_POST['age'][$i];
    //   $localTicket->setName($name);
    $name =$localTicket->getName();
    // you can also use insert sql query
  }

  print("    ");
  print($localTicket->getName());
  print($localTicket->getAge());
  $_SESSION["reservationModel"] = serialize($localTicket); //object to string
  // header('Location: ../view/detail_ticket.php');
}
?>
