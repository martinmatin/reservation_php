
<?php
session_start(); //to enable/init the $session
require  '../model/tickets.php';
require  '../model/person.php';
require  '../view/view.php';

if(isset($_SESSION["reservationModel"])){ //$session could be replace by an access to an DB
    $localTicket = unserialize($_SESSION["reservationModel"]);
    //the object is stored as a string in $SESSSION
    //so we need to transform it back as object
} else {
    $localTicket = new Ticket(); //else empty input
}  

$view = new View();
echo $view->render('form_reservation.php', array('modelTicket' => $localTicket));

?>