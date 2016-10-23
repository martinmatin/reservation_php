
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
<link rel="stylesheet" type="text/css" href="../style/design.css">

<div class="container">

    <form id="signup"  >

        <div class="header">

            <h3>DETAILS DES RESERVATIONS</h3>

            <p>Leoooooooooluros.<br></p>
            <p>Le prix de l'assurance annulation est de 20 euros quel que soit le nombre de voyageurs.</p>

        </div>

        <div class="sep"></div>

        <div class="inputs" >

            <form method="post" action="verif.php">
                      </form>




          <form method="post" action="../controller/addDetailController.php">
            <input type="hidden" name="reservation"/>
            <input type="text" name="name" placeholder="Name"  value="<?php  print($localTicket->getName()); ?>" ><br>
            <input type="text" name="age" placeholder="Age" value="<?php  print($localTicket->getAge()); ?>" >
            <a><input id="submit" type="submit" class="button" value="Next" ><a/>

          </form>

                      <a href="form_reservation.php" class="button">Prev</a>




        </div>

    </form>

</div>
