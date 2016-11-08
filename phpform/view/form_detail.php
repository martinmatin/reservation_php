
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


        </div>

        <div class="sep"></div>

        <div class="inputs" >

            <form method="post" action="verif.php">
                      </form>


          <form method="post" action="../controller/addDetailController.php">
            <input type="hidden" name="reservation"/>
            <?php for ($i = 0; $i < $localTicket->getNbPlace(); ++$i): ?>
              <p>Personne <?php print($i+1); ?> </p>
              <input type="text" name="name[]" placeholder="Nom"  value="<?php  print($localTicket->getName()); ?>" ><br>
              <input type="text" name="age[]" placeholder="Age" value="<?php  print($localTicket->getAge()); ?>" >
                <div class="sep"></div>

            <?php endfor; ?>

            <a><input id="submit" type="submit" class="button" value="Next" ><a/>
          </form>
                      <a href="form_reservation.php" class="button">Précédent</a>


        </div>

    </form>

</div>
