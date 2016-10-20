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




          <form method="post" action="../global.php">
            <input type="hidden" name="reservation"/>
            <input type="text" name="destination" placeholder="Destination" ><br>
            <input type="text" name="nombre_place" placeholder="Nombre de places">
            <div class="checkboxy">
                <input name="check_assurance" id="checky" value="1" type="checkbox" /><label class="terms">Assurance annulation</label>
            </div>
            <a><input id="submit" type="submit" value="OK" ><a/>

          </form>



        </div>

    </form>

</div>
