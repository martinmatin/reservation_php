<?php
session_start();
require  '../model/tickets.php';
require  '../model/person.php';


if ( isset($_POST['reservation'])  //if I have data from the form
&& isset($_SESSION["reservationModel"])) { //if I have a model

  $localTicket = unserialize($_SESSION["reservationModel"]); //string to object

  // $name = $_POST['name'][1];
  // $localTicket->setName($name);
  // $age = $_POST['age'][1];
  // $localTicket->setAge($age);

  // for($i=0;$i<$localTicket->getNbPlace();$i++){
  //   // $name = $_POST['name'][$i];
  //   // $age = $_POST['age'][$i];
  //   //   $localTicket->setName($name);
  //   $name =$localTicket->getName();
  //   // you can also use insert sql query
  // }

  foreach ($_POST['name'] as $key=>$name) {
    //echo "- [Name] $name  [Age] {$_POST['age'][$key]} ; <br />";
    $age = $_POST['age'][$key];
    $person = new Person($name , $age);
    $localTicket->addPeople($person);
  }


  $_SESSION["reservationModel"] = serialize($localTicket); //object to string
   header('Location: ../view/detail_ticket.php');
}
?>
