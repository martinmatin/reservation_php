<?php
session_start();
require  '../model/tickets.php';


if (isset($_POST['reservation'])) {

  $localTicket = unserialize($_SESSION["reservationModel"]);

  $name = $_POST['name'];
  $localTicket->setName($name);
  $age = $_POST['age'];
  $localTicket->setAge($age);

  print($localTicket->afficherCommande());


  //print($localTicket->afficherCommande());
    // echo "<script>window.location = 'view/form_detail.php'</script>";
}



 ?>