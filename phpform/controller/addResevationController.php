<?php
session_start();
require  '../model/tickets.php';

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
    $localTicket->addError("Number of place should be a number");
  }
 
 
  if(isset($_POST['check_assurance'])){
    $check_assurance = $_POST['check_assurance'];
  }else{
    $check_assurance = "no";
  }


  $localTicket->setCancelInssurance($check_assurance);

    $_SESSION["reservationModel"] = serialize($localTicket); //object to string

  if($localTicket->hasError()){
    header('Location: ../view/form_reservation.php');  
  }else{
     header('Location: ../view/form_detail.php');  
  }

   


 // print($localTicket->afficherCommande());
    // echo "<script>window.location = 'view/form_detail.php'</script>";
}



 ?>