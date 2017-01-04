<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../style/design.css">
<div class="container">
  <form id="signup"  >
    <div class="header">
      <h3>DETAILS DES RESERVATIONS</h3>
      <p style="color:red;"><?php  print($modelTicket->getError()); ?></p>
    </div>
    <div class="sep"></div>
    <div class="inputs" >
      <form method="post" action="verif.php">
      </form>
      <form method="post" action="../controller/addDetailController.php">
        <input type="hidden" name="reservation"/>
        <?php for ($i = 1; $i <= $modelTicket->getNbPlace(); $i++){ ?>
          <?php
          $nameVal = '';
          $ageVal = '';
          $personObj = $modelTicket->getPeopleIndex($i-1);
          if(isset($personObj)){
            $nameVal = $personObj->getName();
            
            $ageVal =  $personObj->getAge();
          }

          ?>
          <p>Personne <?php print($i); ?> </p>
          <label class="terms">Nom</label>
          <input type="text" name="name[<?php print($i); ?>]" placeholder="Nom"  value="<?php print($nameVal); ?> " ><br>
          <label class="terms">Age</label>
          <input type="text" name="age[<?php print($i); ?>]" placeholder="Age" value="<?php print($ageVal); ?> " >
          <div class="sep"></div>
          <?php } ?>
          <a><input id="submit" type="submit" class="button" value="Next" ><a/>
          </form>
          <a href="../controller/loadBookingController.php" class="button">Précédent</a>
          <a href="../controller/cancelOrderController.php" class="button">Cancel</a>
        </div>
      </form>
    </div>
