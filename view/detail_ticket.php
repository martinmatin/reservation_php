<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../style/design.css">
<div class="container">
   <form id="signup"  >
      <div class="header">
         <h3>DETAILS DES RESERVATIONS</h3>
         <?php  print($modelTicket->toString()); ?>
      </div>
      <div class="sep"></div>
      <div class="inputs" >
   <form method="post" action="verif.php">
   </form>
   <a href="../controller/loadDetailController.php" class="button">Prev</a>
   <a href="../controller/finishOrderController.php" class="button">Finish</a>
   </div>
   </form>
</div>