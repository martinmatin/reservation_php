<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../style/design.css">

<div class="container">

    <form id="signup"  >

        <div class="header">

            <h3>DETAILS DES RESERVATIONS</h3>

            <p><br></p>

        </div>

        <div class="sep"></div>

        <div class="inputs" >

            <form method="post" action="verif.php">
                      </form>




          <form method="post" action="../controller/addDetailController.php">
            <?php for($i=0;$i<$tickets->getNbplace();$i++){ ?>
              <div class="sep"></div>
              <?php } ?>
            <input type="hidden" name="reservation">
            <input type="text" name="name" placeholder="Name" ><br>
            <input type="text" name="age" placeholder="Age">
            <a><input id="submit" type="submit" value="OK" ><a/>

          </form>



        </div>

    </form>

</div>
