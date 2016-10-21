<?php
session_start();
include  '../model/tickets.php';

if(!isset($_SESSION["reservationModel"])){
	$_SESSION["reservationModel"] = serialize(new Ticket());
}

if (isset($_POST['reservation'])) {

    $localTicket = new Ticket();


  $destination = $_POST['destination'];
  $localTicket->setDestination($destination);
  $nombre_place = $_POST['nombre_place'];
  $localTicket->setNbPlace($nombre_place);

  if(isset($_POST['check_assurance'])){
    $check_assurance = $_POST['check_assurance'];
  }else{
    $check_assurance = "no";
  }


  $localTicket->setCancelInssurance($check_assurance);

    $_SESSION["reservationModel"] = serialize($localTicket);



    header('Location: ../view/form_detail.php');


 // print($localTicket->afficherCommande());
    // echo "<script>window.location = 'view/form_detail.php'</script>";
}



 ?>
