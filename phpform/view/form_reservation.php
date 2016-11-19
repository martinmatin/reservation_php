
<?php
session_start(); //to enable/init the $session
require  '../model/tickets.php';
if(isset($_SESSION["reservationModel"])){ //$session could be replace by an access to an DB
    $localTicket = unserialize($_SESSION["reservationModel"]);

} else {
    $localTicket = new Ticket(); //else empty input
}  ?>


<!DOCTYPE html>
<meta charset="UTF-8"> <!-- déclaration encodage pour les caractères spéciaux -->

<link rel="stylesheet" type="text/css" href="../style/design.css">
<div class="container">

    <form id="signup"  >

        <div class="header">

            <h3>RESERVATION  </h3>
            <p>Le prix de la place des de 10 euros jusque 12 ans et ensuite de 15 euros.<br></p>
            <p>Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.</p>


            <p style="color:red;"><?php  print($localTicket->getError()); ?></p>

        </div>

        <div class="sep"></div>

        <div class="inputs" >

            <form method="post" action="verif.php">
                      </form>




          <form method="post" action="../controller/addResevationController.php">

            <input type="hidden" name="reservation"/>
            <input type="text" name="destination" placeholder="Destination" value="<?php  print($localTicket->getDestination()); ?>" ><br>
            <input type="text" name="nombre_place" placeholder="Nombre de places" value="<?php print($localTicket->getNbPlace()); ?>" >
            <div class="checkboxy">
                <input name="check_assurance" id="checky" value="Oui" type="checkbox" /><label class="terms">Assurance annulation </label>
            </div>
            <a><input id="submit" class="button" type="submit" value="Next"><a/>

          </form>

                                                      <a href="cancel_order.php" class="button">Cancel</a>




        </div>

    </form>

</div>
