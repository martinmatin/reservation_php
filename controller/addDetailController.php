<?php
session_start();
require  '../model/tickets.php';
require  '../model/person.php';
require  '../view/view.php';

if ( isset($_POST['reservation'])  //if I have data from the form
&& isset($_SESSION["reservationModel"])) { //if I have a model

  $localTicket = unserialize($_SESSION["reservationModel"]); //string to object


  foreach ($_POST['name'] as $key=>$name) {
    $age = $_POST['age'][$key];
    $person = new Person($name , $age);
    $localTicket->addPeople($person);
  }


  $_SESSION["reservationModel"] = serialize($localTicket); //object to string


   $view = new View();
   echo $view->render('detail_ticket.php', array('modelTicket' => $localTicket));
}
?>
