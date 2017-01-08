
<?php
session_start();
require  '../model/tickets.php';
require  '../model/person.php';
require  '../view/view.php';


if(isset($_SESSION["reservationModel"])){
    $localTicket = unserialize($_SESSION["reservationModel"]);

} else {
    $localTicket = new Ticket(); 
}


$view = new View();
echo $view->render('form_detail.php', array('modelTicket' => $localTicket));

?>
