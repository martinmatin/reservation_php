<!DOCTYPE html>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../style/design.css">
<div class="container">
   <form id="signup"  >
      <div class="header">
         <h3>La commande est validée. </h3>
         Veuillez versez la somme de <?php  print($modelTicket->totalPrice()); ?> euros sur le compte XXX-0000-0000</br>
         Merci et à bientôt.
      </div>
      <div class="sep"></div>
      <div class="inputs" >
   <form method="post" action="">
   </form>
   <a href="../controller/loadBookingController.php" class="button">Home</a>
   </div>
   </form>
</div>
