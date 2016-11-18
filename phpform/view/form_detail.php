
<?php
session_start();
require  '../model/tickets.php';
require  '../model/person.php';

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
            <p style="color:red;"><?php  print($localTicket->getError()); ?></p>


        </div>

        <div class="sep"></div>

        <div class="inputs" >

            <form method="post" action="verif.php">
                      </form>


          <form method="post" action="../controller/addDetailController.php">
            <input type="hidden" name="reservation"/>



            <?php for ($i = 1; $i <= $localTicket->getNbPlace(); $i++){ ?>

           

            <?php  

              $nameVal = '';
              $ageVal = '';
              $personObj = $localTicket->getPeopleIndex($i);
              if(isset($personObj)){
                $nameVal = $personObj->getName();
                $ageVal =  $personObj->getAge();
              } 

              ?>

              <p>Personne <?php print($i); ?> </p>
              <input type="text" name="name[<?php print($i); ?>]" placeholder="Nom"  value="<?php print($nameVal); ?> " ><br>
              <input type="text" name="age[<?php print($i); ?>]" placeholder="Age" value="<?php print($ageVal); ?> " >
              <div class="sep"></div>

            <?php } ?>

            <a><input id="submit" type="submit" class="button" value="Next" ><a/>
          </form>
                      <a href="form_reservation.php" class="button">Précédent</a>
                                            <a href="cancel_order.php" class="button">Cancel</a>



        </div>

    </form>

</div>
