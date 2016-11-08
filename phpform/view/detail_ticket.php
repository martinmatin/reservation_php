
<?php
session_start();
require  '../model/tickets.php';
if(isset($_SESSION["reservationModel"])){ //$session could be replace by an access to an DB
    $localTicket = unserialize($_SESSION["reservationModel"]);
    //the object is stored as a string in $SESSSION
    //so we need to transform it back as object
} else {
    $localTicket = new Ticket(); //else empty input
}  ?>
<!DOCTYPE html>
<meta charset="UTF-8"> 
<link rel="stylesheet" type="text/css" href="../style/design.css">

<div class="container">

    <form id="signup"  >

        <div class="header">

            <h3>DETAILS DES RESERVATIONS</h3>

            <?php  print($localTicket->afficherCommande()); ?>

        </div>

        <div class="sep"></div>

        <div class="inputs" >

            <form method="post" action="verif.php">
                      </form>


                      <a href="form_detail.php" class="button">Prev</a>




        </div>

    </form>

</div>
