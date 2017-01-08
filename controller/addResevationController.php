<?php
session_start(); //to enable/init the $session
require  '../model/tickets.php';
require  '../model/person.php';
require  '../view/view.php';



if(isset($_SESSION["reservationModel"])){
    $localTicket = unserialize($_SESSION["reservationModel"]);

} else {
    $localTicket = new Ticket(); //else empty input
}


if (isset($_POST['reservation'])) {




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

		$view = new View();
		echo $view->render('form_reservation.php', array('modelTicket' => $localTicket));

   }else{


			$view = new View();
			echo $view->render('form_detail.php', array('modelTicket' => $localTicket));
   }


}



 ?>
