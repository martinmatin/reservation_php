<?php
session_start();
require  '../model/tickets.php';
require  '../model/person.php';


if(!isset($_SESSION["reservationModel"])){
	$_SESSION["reservationModel"] = serialize(new Ticket());
}

if (isset($_POST['reservation'])) {

    $localTicket = new Ticket();


  $destination = $_POST['destination'];
  $localTicket->setDestination($destination);
  $nombre_place = $_POST['nombre_place'];
  if(is_numeric($nombre_place)){
    $localTicket->setNbPlace($nombre_place);
  }else{
    $localTicket->addError("Le nombre de place doit être un nombre");
  }


  if(isset($_POST['check_assurance'])){
    $check_assurance = $_POST['check_assurance'];
  }else{
    $check_assurance = "Non";
  }


  $localTicket->setCancelInssurance($check_assurance);

    $_SESSION["reservationModel"] = serialize($localTicket); //object to string

  if($localTicket->hasError()){
    header('Location: loadBookingController.php');
  }else{
     header('Location: loadDetailController.php');
  }




 // print($localTicket->toString());
    // echo "<script>window.location = 'view/form_detail.php'</script>";
}



 ?>
